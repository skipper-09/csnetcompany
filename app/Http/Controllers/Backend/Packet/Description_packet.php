<?php

namespace App\Http\Controllers\Backend\Packet;

use App\Http\Controllers\Controller;
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
            $button .= ' <a href="' . route('backend.deskription.edit',['id'=>$query->id]) . '" class="btn btn-sm btn-success action " data-id=' . $query->id . ' data-type="edit" data-toggle="tooltip" data-placement="bottom" title="Edit Data"><i
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
    public function create(Request $request,$paketid)
    {
        // $id = $request->query('id');
        $des = packet::FindOrFail($paketid);
        $data = [
            'sidebar' => 'packet',
            'page_name' => 'Tambah Deskripsi Paket' . ' ' . $des->name,
            'idpaket' => $des->id
        ];
        return view('backend.packet.deskripsi.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

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

        return redirect()->route('backend.deskription', ['id' => $request->packet_id])->with(['status' => 'Success!', 'message' => 'Berhasil Menambahkan Paket!']);
    }

   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = [
            'sidebar' => 'packet',
            'page_name' => 'Edit Deskripsi Paket',
            'deskripsi'=> Description::findOrFail($id)
        ];
        return view('backend.packet.deskripsi.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
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
