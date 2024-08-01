<?php

namespace App\Http\Controllers\Backend\Partner;

use App\Http\Controllers\Controller;
use App\Http\Requests\PartnerRequest;
use App\Models\partner;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\DataTables;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'sidebar' => 'Parner',
            'page_name' => 'Partner',
        ];
        return view('backend.partner.index', $data);
    }




    public function getData()
    {
        $query = partner::all();
        return DataTables::of($query)->addIndexColumn()->addColumn('action', function ($query) {
            $button = '';
            $button .= ' <a href="' . route('backend.partner.edit', ['id' => $query->id]) . '" class="btn btn-sm btn-success action " data-id=' . $query->id . ' data-type="edit" data-toggle="tooltip" data-placement="bottom" title="Edit Data"><i
                                                        class="fas fa-pen"></i></a>';
            $button .= ' <button class="btn btn-sm btn-danger action" data-id=' . $query->id . ' data-type="delete" data-route="' . route('backend.partner.delete', ['id' => $query->id]) . '"><i
                                                            class="fas fa-trash"></i></button>';
            return '<div class="d-flex gap-1">' . $button . '</div>';
        })->addColumn('logo', function ($query) {
            $urlimage = asset("storage/images/partner/$query->logo");
            return '<img src="' . $urlimage . '" border="0" 
        width="80" />';
        })->rawColumns(['action', 'logo',])->make(true);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'sidebar' => 'Partner',
            'page_name' => 'Partner',
        ];
        return view('backend.partner.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PartnerRequest $request)
    {
        try {
            $request->validated();
            $filename = '';
            if ($request->hasFile('logo')) {
                $file  = $request->file('logo');
                $filename = 'partner_' . rand(0, 999999999) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('storage/images/partner/'), $filename);
            }
            partner::create([
                'name' => $request->name,
                'logo' => $filename,
            ]);
            return redirect()->route('backend.partner')->with(['success' => 'Berhasil Menambahkan Partner!']);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'trace' => $e->getTrace()
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function show(string $id)
    {
        $data = [
            'sidebar' => 'Partner',
            'page_name' => 'Partner',
            'partner' => partner::find($id)
        ];
        return view('backend.partner.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(partner $partner, PartnerRequest $request, string $id)
    {
        try {
            $data = partner::find($id);
            $filename = '';
            if ($request->hasFile('logo')) {
                $file  = $request->file('logo');
                $filename = 'partner_' . rand(0, 999999999) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('storage/images/partner/'), $filename);
                if (file_exists(public_path('storage/images/partner/' . $data->logo))) {
                    File::delete(public_path('storage/images/partner/' . $data->logo));
                }
            } else {
                $filename = $data->logo;
            }

            $data->update([
                'name' => $request->name,
                'logo' => $filename
            ]);
            return redirect()->route('backend.partner')->with(['success' => 'Berhasil Edit Partner!']);
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
            $partner =  partner::where('id', $id)->first();
            if (file_exists(public_path('storage/images/partner/' . $partner->logo))) {
                File::delete(public_path('storage/images/partner/' . $partner->logo));
            }
            partner::where('id', $id)->delete();
            //return response
            return response()->json([
                'status' => 'success',
                'success' => true,
                'message' => 'Data Partner Berhasil Dihapus!.',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'trace' => $e->getTrace()
            ]);
        }
    }
}
