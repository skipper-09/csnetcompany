<?php

namespace App\Http\Controllers\Backend\Coverage;

use App\Http\Controllers\Controller;
use App\Http\Requests\AreaRequest;
use App\Models\Area;
use App\Models\CategoryPacket;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'sidebar' => 'Odp',
            'page_name' => 'Area',
        ];
        return view('backend.coverage.area.index', $data);
    }


    public function getData()
    {
        $query = Area::all();
        return DataTables::of($query)->addIndexColumn()->addColumn('action', function ($query) {
            $button = '';
            $button .= ' <a href="' . route('backend.area.edit', ['id' => $query->id]) . '" class="btn btn-sm btn-success action " data-id=' . $query->id . ' data-type="edit" data-toggle="tooltip" data-placement="bottom" title="Edit Data"><i
                                                        class="fas fa-pen"></i></a>';

            $button .= '<button class="btn btn-sm btn-danger action" data-id=' . $query->id . ' data-type="delete" data-route="' . route('backend.area.delete', ['id' => $query->id]) . '" data-toggle="tooltip" data-placement="bottom" title="Delete Data"><i
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
            'sidebar' => 'Odp',
            'page_name' => 'Area',
        ];
        return view('backend.coverage.area.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AreaRequest $request)
    {
        $data = $request->validated();
        Area::create($data);
        return redirect()->route('backend.area')->with(['success' => 'Berhasil Menambahkan Area']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = [
            'sidebar' => 'Odp',
            'page_name' => 'Area',
            'area' => Area::findOrFail($id)
        ];
        return view('backend.coverage.area.edit', $data);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(AreaRequest $request, string $id)
    {
        try {
            $request->validated();
        $data = Area::findOrFail($id);
        $data->update([
            'name' => $request->name,
            'kode_pos' => $request->kode_pos,
        ]);
        return redirect()->route('backend.area')->with(['success' => 'Berhasil Mengubah Area']);
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
            Area::where('id', $id)->delete();
            //return response
            return response()->json([
                'status' => 'success',
                'success' => true,
                'message' => 'Area Berhasil Dihapus!.',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Area Tidak Bisa Dihapus Karena Masih digunakan!',
                'trace' => $e->getTrace()
            ]);
        }
    }
}
