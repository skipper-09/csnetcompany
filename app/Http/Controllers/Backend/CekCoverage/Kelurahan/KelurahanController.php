<?php

namespace App\Http\Controllers\Backend\CekCoverage\Kelurahan;

use App\Http\Controllers\Controller;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class KelurahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'sidebar' => 'cek coverage',
            'page_name' => 'Kelurahan',
        ];
        return view('backend.cek_coverage.kelurahan.index', $data);
    }


    public function getData()
    {
        $query = Kelurahan::all();
        return DataTables::of($query)->addIndexColumn()->addColumn('action', function ($query) {
            $button = '';
            $button .= ' <a href="' . route('backend.kelurahan.edit', ['id' => $query->id]) . '" class="btn btn-sm btn-success action " data-id=' . $query->id . ' data-type="edit" data-toggle="tooltip" data-placement="bottom" title="Edit Data"><i
                                                        class="fas fa-pen"></i></a>';

            $button .= '<button class="btn btn-sm btn-danger action" data-id=' . $query->id . ' data-type="delete" data-route="' . route('backend.kelurahan.delete', ['id' => $query->id]) . '" data-toggle="tooltip" data-placement="bottom" title="Delete Data"><i
                                                            class="fas fa-trash"></i></button>';
            return '<div class="d-flex gap-1">' . $button . '</div>';
        })->editColumn('kecamatan_id', function ($query) {
            return $query->kecamatan->name;
        })->rawColumns(['kecamatan_id', 'action'])->make(true);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'sidebar' => 'cek coverage',
            'page_name' => 'Kelurahan',
            'kecamatan'=>Kecamatan::all()
        ];
        return view('backend.cek_coverage.kelurahan.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
        $request->validate([
            'name' => 'required',
            'kecamatan_id' => 'required'
        ],
        [
            'name.required' => 'Nama kelurahan Wajib Di Isi.',
            'kecamatan_id.required' => 'Wajib Mengisi Kecamatan.'
        ]);
        Kelurahan::insert([
        'name' => $request->name,
        'kecamatan_id'=>$request->kecamatan_id
    ]);
    return redirect()->route('backend.kelurahan')->with(['success' => 'Berhasil Menambahkan kelurahan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = [
            'sidebar' => 'cek coverage',
            'page_name' => 'Kelurahan',
            'kecamatan'=>Kecamatan::all(),
            'kelurahan'=> Kelurahan::findOrFail($id)
        ];
        return view('backend.cek_coverage.kelurahan.edit', $data);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'kecamatan_id' => 'required'
        ],
        [
            'name.required' => 'Nama kelurahan Wajib Di Isi.',
            'kecamatan_id.required' => 'Wajib Mengisi Kecamatan.'
        ]);
        $data = Kelurahan::find($id);
        $data->update([
            'name' => $request->name,
            'kecamatan'=>$request->kecamatan_id
        ]);
        return redirect()->route('backend.kelurahan')->with(['success' => 'Berhasil Merubah Kelurahan!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Kelurahan::where('id', $id)->delete();
            //return response
            return response()->json([
                'status' => 'success',
                'success' => true,
                'message' => 'Kelurahan Berhasil Dihapus!.',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Kelurahan Tidak Bisa Dihapus Karena Masih digunakan!',
                'trace' => $e->getTrace()
            ]);
        }
    }
}
