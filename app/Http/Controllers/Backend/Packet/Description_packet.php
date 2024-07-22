<?php

namespace App\Http\Controllers\Backend\Packet;

use App\Http\Controllers\Controller;
use App\Http\Requests\PacketDescriptionRequest;
use App\Models\Description;
use App\Models\packet;
use App\Models\PacketHasDescription;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\DataTables;

class Description_packet extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'sidebar' => 'packet',
            'page_name' => 'Deskripsi Paket',
        ];
        return view('backend.packet.deskripsi.index', $data);
    }


    public function getData()
    {

        $query = Description::all();

        return DataTables::of($query)->addIndexColumn()->addColumn('action', function ($query) {
            $button = '';
            $button .= ' <a href="' . route('backend.deskription.edit', ['id' => $query->id]) . '" class="btn btn-sm btn-success action " data-id=' . $query->id . ' data-type="edit" data-toggle="tooltip" data-placement="bottom" title="Edit Data"><i
                                                        class="fas fa-pen"></i></a>';
            $button .= ' <button class="btn btn-sm btn-danger action" data-id=' . $query->id . ' data-type="delete" data-route="' . route('backend.deskription.delete', ['id' => $query->id]) . '"><i
                                                            class="fas fa-trash"></i></button>';
            return '<div class="d-flex gap-1">' . $button . '</div>';
        })->addColumn('logo', function ($chanel) {
            $urlimage = asset("storage/images/descrip/$chanel->logo");
            return '<img src="' . $urlimage . '" border="0" 
        width="50" />';
        })->rawColumns(['action', 'logo'])->make(true);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'sidebar' => 'packet',
            'page_name' => 'Tambah Deskripsi Paket',
            'paket' => packet::all()
        ];
        return view('backend.packet.deskripsi.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PacketDescriptionRequest $request)
    {
        $request->validated();
        $filename = '';
        if ($request->hasFile('logo')) {
            $file  = $request->file('logo');
            $filename = 'descrip_' . rand(0, 999999999) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('storage/images/descrip/'), $filename);
        }
        Description::create([
            'name' => $request->name,
            'packet_id' => $request->packet_id,
            'logo' => $filename
        ]);

        return redirect()->route('backend.deskription')->with(['success' => 'Berhasil Menambahkan Deskripsi Paket!']);
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = [
            'sidebar' => 'packet',
            'page_name' => 'Edit Deskripsi Paket',
            'paket' => packet::all(),
            'deskripsi' => Description::findOrFail($id)
        ];
        return view('backend.packet.deskripsi.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Description $descrip, PacketDescriptionRequest $request, string $id)
    {
        try {
            $data = Description::find($id);
            $request->validated();
            $filename = '';
            if ($request->hasFile('logo')) {
                $file  = $request->file('logo');
                $filename = 'descrip_' . rand(0, 999999999) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('storage/images/descrip/'), $filename);
                if (file_exists(public_path('storage/images/descrip/' . $descrip->logo))) {
                    File::delete(public_path('storage/images/descrip/' . $descrip->logo));
                }
            } else {
                $filename = $data->logo;
            }

            $data->update([
                'name' => $request->name,
                'packet_id' => $request->packet_id,
                'logo' => $filename === null ? $data->logo : $filename
            ]);



            return redirect()->route('backend.deskription')->with(['success' => 'Berhasil Edit Deskripsi Paket!']);
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

            $des =  Description::where('id', $id)->first();
            if (file_exists(public_path('storage/images/descrip/' . $des->logo))) {
                File::delete(public_path('storage/images/descrip/' . $des->logo));
            }
            Description::where('id', $id)->delete();
            //return response
            return response()->json([
                'status' => 'success',
                'success' => true,
                'message' => 'Data Deskripsi Paket Berhasil Dihapus!.',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Data Deskripsi Paket Tidak Bisa Dihapus Karena Masih digunakan!',
                'trace' => $e->getTrace()
            ]);
        }
    }
}
