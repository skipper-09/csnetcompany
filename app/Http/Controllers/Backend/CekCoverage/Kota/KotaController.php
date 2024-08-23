<?php

namespace App\Http\Controllers\Backend\CekCoverage\Kota;

use App\Http\Controllers\Controller;
use App\Models\Kota;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class KotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'sidebar' => 'cek coverage',
            'page_name' => 'Kota',
        ];
        return view('backend.cek_coverage.kota.index', $data);
    }


    public function getData()
    {
        $query = Kota::all();
        return DataTables::of($query)->addIndexColumn()->addColumn('action', function ($query) {
            $button = '';
            $button .= ' <a href="' . route('backend.kota.edit', ['id' => $query->id]) . '" class="btn btn-sm btn-success action " data-id=' . $query->id . ' data-type="edit" data-toggle="tooltip" data-placement="bottom" title="Edit Data"><i
                                                        class="fas fa-pen"></i></a>';

            $button .= '<button class="btn btn-sm btn-danger action" data-id=' . $query->id . ' data-type="delete" data-route="' . route('backend.kota.delete', ['id' => $query->id]) . '" data-toggle="tooltip" data-placement="bottom" title="Delete Data"><i
                                                            class="fas fa-trash"></i></button>';
            return '<div class="d-flex gap-1">' . $button . '</div>';
        })->make(true);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'sidebar' => 'cek coverage',
            'page_name' => 'Kota',
        ];
        return view('backend.cek_coverage.kota.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        Kota::insert([
            'name' => $request->name,
        ]);
        return redirect()->route('backend.kota')->with(['success' => 'Berhasil Menambahkan Kota!']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = [
            'sidebar' => 'cek coverage',
            'page_name' => 'Kota',
            'kota' => Kota::findOrFail($id)
        ];
        return view('backend.cek_coverage.kota.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Kota::findOrFail($id);
        $data->update([
            'name' => $request->name,
        ]);
        return redirect()->route('backend.kota')->with(['success' => 'Berhasil Merubah Kota!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Kota::where('id', $id)->delete();
            //return response
            return response()->json([
                'status' => 'success',
                'success' => true,
                'message' => 'Kota Berhasil Dihapus!.',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Kota Tidak Bisa Dihapus Karena Masih digunakan!',
                'trace' => $e->getTrace()
            ]);
        }
    }
}
