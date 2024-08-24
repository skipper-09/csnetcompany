<?php

namespace App\Http\Controllers\Backend\CekCoverage\Jalan;

use App\Http\Controllers\Controller;
use App\Models\Jalan;
use App\Models\Kelurahan;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class JalanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'sidebar' => 'cek coverage',
            'page_name' => 'Jalan',
        ];
        return view('backend.cek_coverage.jalan.index', $data);
    }


    public function getData()
    {
        $query = Jalan::all();
        return DataTables::of($query)->addIndexColumn()->addColumn('action', function ($query) {
            $button = '';
            $button .= ' <a href="' . route('backend.jalan.edit', ['id' => $query->id]) . '" class="btn btn-sm btn-success action " data-id=' . $query->id . ' data-type="edit" data-toggle="tooltip" data-placement="bottom" title="Edit Data"><i
                                                        class="fas fa-pen"></i></a>';

            $button .= '<button class="btn btn-sm btn-danger action" data-id=' . $query->id . ' data-type="delete" data-route="' . route('backend.jalan.delete', ['id' => $query->id]) . '" data-toggle="tooltip" data-placement="bottom" title="Delete Data"><i
                                                            class="fas fa-trash"></i></button>';
            return '<div class="d-flex gap-1">' . $button . '</div>';
        })->editColumn('kelurahan_id', function ($query) {
            return $query->kelurahan->name;
        })->rawColumns(['kelurahan_id', 'action'])->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'sidebar' => 'cek coverage',
            'page_name' => 'Jalan',
            'kelurahan'=>Kelurahan::all()
        ];
        return view('backend.cek_coverage.jalan.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Jalan::insert([
            'name' => $request->name,
            'kelurahan_id'=>$request->kelurahan_id
        ]);
        return redirect()->route('backend.jalan')->with(['success' => 'Berhasil Menambahkan Jalan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = [
            'sidebar' => 'cek coverage',
            'page_name' => 'Jalan',
            'kelurahan' => Kelurahan::all(),
            'jalan'=>Jalan::findOrFail($id)
        ];
        return view('backend.cek_coverage.jalan.edit', $data);
    }

 

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Jalan::find($id);
        $data->update([
            'name' => $request->name,
            'kelurahan_id'=>$request->kelurahan_id
        ]);
        return redirect()->route('backend.jalan')->with(['success' => 'Berhasil Merubah Jalan!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Jalan::where('id', $id)->delete();
            //return response
            return response()->json([
                'status' => 'success',
                'success' => true,
                'message' => 'Jalan Berhasil Dihapus!.',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Jalan Tidak Bisa Dihapus Karena Masih digunakan!',
                'trace' => $e->getTrace()
            ]);
        }
    }
}
