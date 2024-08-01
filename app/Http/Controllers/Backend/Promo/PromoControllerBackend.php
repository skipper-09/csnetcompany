<?php

namespace App\Http\Controllers\Backend\Promo;

use App\Http\Controllers\Controller;
use App\Http\Requests\PromoRequest;
use App\Models\packet;
use App\Models\Promo;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Number;
use Yajra\DataTables\DataTables;

class PromoControllerBackend extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'sidebar' => 'Promo',
            'page_name' => 'Promo',
        ];
        return view('backend.promo.index', $data);
    }



    public function getData()
    {
        $query = Promo::all();
        return DataTables::of($query)->addIndexColumn()->addColumn('action', function ($query) {
            $button = '';
            $button .= ' <a href="' . route('backend.promo.edit', ['id' => $query->id]) . '" class="btn btn-sm btn-success action " data-id=' . $query->id . ' data-type="edit" data-toggle="tooltip" data-placement="bottom" title="Edit Data"><i
                                                        class="fas fa-pen"></i></a>';
            $button .= ' <button class="btn btn-sm btn-danger action" data-id=' . $query->id . ' data-type="delete" data-route="' . route('backend.promo.delete', ['id' => $query->id]) . '"><i
                                                            class="fas fa-trash"></i></button>';
            return '<div class="d-flex gap-1">' . $button . '</div>';
        })->addColumn('logo', function ($query) {
            $urlimage = asset("storage/images/promo/$query->logo");
            return '<img src="' . $urlimage . '" border="0" 
        width="50" />';
        })->addColumn('is_active', function ($query) {
            $active = '';
            $query->is_active == 1 ? $active = '<span class="badge bg-label-primary">Aktif</span>' : $active = '<span class="badge bg-label-warning">Tidak</span>';
            return $active;
        })->rawColumns(['action', 'logo', 'is_active'])->make(true);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'sidebar' => 'Promo',
            'page_name' => 'Promo',
        ];
        return view('backend.promo.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PromoRequest $request)
    {
        try {
            $request->validated();
            $filename = '';
            if ($request->hasFile('logo')) {
                $file  = $request->file('logo');
                $filename = 'promo_' . rand(0, 999999999) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('storage/images/promo/'), $filename);
            }
            Promo::create([
                'name' => $request->name,
                'logo' => $filename,
                'is_active' => $request->is_active
            ]);
            return redirect()->route('backend.promo')->with(['success' => 'Berhasil Menambahkan Promo!']);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'trace' => $e->getTrace()
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = [
            'sidebar' => 'Promo',
            'page_name' => 'Promo',
            'promo' => Promo::find($id)
        ];
        return view('backend.promo.edit', $data);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Promo $promo, PromoRequest $request, string $id)
    {
        try {
            $data = Promo::find($id);
            $filename = '';
            if ($request->hasFile('logo')) {
                $file  = $request->file('logo');
                $filename = 'promo_' . rand(0, 999999999) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('storage/images/promo/'), $filename);
                if (file_exists(public_path('storage/images/promo/' . $data->logo))) {
                    File::delete(public_path('storage/images/promo/' . $data->logo));
                }
            } else {
                $filename = $data->logo;
            }

            $data->update([
                'name' => $request->name,
                'packet_id' => $request->packet_id,
                'logo' => $filename
            ]);
            return redirect()->route('backend.promo')->with(['success' => 'Berhasil Edit Promo!']);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'trace' => $e->getTrace()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $promo =  Promo::where('id', $id)->first();
            if (file_exists(public_path('storage/images/promo/' . $promo->logo))) {
                File::delete(public_path('storage/images/promo/' . $promo->logo));
            }
            Promo::where('id', $id)->delete();
            //return response
            return response()->json([
                'status' => 'success',
                'success' => true,
                'message' => 'Data Promo Paket Berhasil Dihapus!.',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'trace' => $e->getTrace()
            ]);
        }
    }
}
