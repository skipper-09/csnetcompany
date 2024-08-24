<?php

namespace App\Http\Controllers\Backend\CekCoverage\Kecamatan;

use App\Http\Controllers\Controller;
use App\Models\Kecamatan;
use App\Models\Kota;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'sidebar' => 'cek coverage',
            'page_name' => 'Kecamatan',
        ];
        return view('backend.cek_coverage.kecamatan.index', $data);
    }


    public function getData()
    {
        $query = Kecamatan::all();
        return DataTables::of($query)->addIndexColumn()->addColumn('action', function ($query) {
            $button = '';
            $button .= ' <a href="' . route('backend.kecamatan.edit', ['id' => $query->id]) . '" class="btn btn-sm btn-success action " data-id=' . $query->id . ' data-type="edit" data-toggle="tooltip" data-placement="bottom" title="Edit Data"><i
                                                        class="fas fa-pen"></i></a>';

            $button .= '<button class="btn btn-sm btn-danger action" data-id=' . $query->id . ' data-type="delete" data-route="' . route('backend.kecamatan.delete', ['id' => $query->id]) . '" data-toggle="tooltip" data-placement="bottom" title="Delete Data"><i
                                                            class="fas fa-trash"></i></button>';
            return '<div class="d-flex gap-1">' . $button . '</div>';
        })->editColumn('kota_id', function ($query) {
            return $query->kota->name;
        })->rawColumns(['kota_id', 'action'])->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'sidebar' => 'cek coverage',
            'page_name' => 'Kecamatan',
            'kota' => Kota::all()
        ];
        return view('backend.cek_coverage.kecamatan.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Kecamatan::insert([
            'name' => $request->name,
            'kota_id'=>$request->kota_id
        ]);
        return redirect()->route('backend.kecamatan')->with(['success' => 'Berhasil Menambahkan Kecamatan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = [
            'sidebar' => 'cek coverage',
            'page_name' => 'Kecamatan',
            'kota' => Kota::all(),
            'kecamatan'=>Kecamatan::findOrFail($id)
        ];
        return view('backend.cek_coverage.kecamatan.edit', $data);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Kecamatan::find($id);
        $data->update([
            'name' => $request->name,
            'kota_id'=>$request->kota_id
        ]);
        return redirect()->route('backend.kecamatan')->with(['success' => 'Berhasil Merubah Kecamatan!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Kecamatan::where('id', $id)->delete();
            //return response
            return response()->json([
                'status' => 'success',
                'success' => true,
                'message' => 'Kecamatan Berhasil Dihapus!.',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'kecamatan Tidak Bisa Dihapus Karena Masih digunakan!',
                'trace' => $e->getTrace()
            ]);
        }
    }
}
