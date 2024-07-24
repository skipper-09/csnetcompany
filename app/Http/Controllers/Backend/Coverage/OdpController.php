<?php

namespace App\Http\Controllers\Backend\Coverage;

use App\Http\Controllers\Controller;
use App\Http\Requests\OdpRequest;
use App\Models\Area;
use App\Models\Odp;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class OdpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'sidebar' => 'Odp',
            'page_name' => 'Odp',
        ];
        return view('backend.coverage.odp.index', $data);
    }


    public function getData()
    {
        $query = Odp::all();
        return DataTables::of($query)->addIndexColumn()->addColumn('action', function ($query) {
            $button = '';
            $button .= ' <a href="' . route('backend.odp.edit', ['id' => $query->id]) . '" class="btn btn-sm btn-success action " data-id=' . $query->id . ' data-type="edit" data-toggle="tooltip" data-placement="bottom" title="Edit Data"><i
                                                        class="fas fa-pen"></i></a>';

            $button .= '<button class="btn btn-sm btn-danger action" data-id=' . $query->id . ' data-type="delete" data-route="' . route('backend.odp.delete', ['id' => $query->id]) . '" data-toggle="tooltip" data-placement="bottom" title="Delete Data"><i
                                                            class="fas fa-trash"></i></button>';
            return '<div class="d-flex gap-1">' . $button . '</div>';
        })->editColumn('area_id', function ($query) {
            return $query->arae->name;
        })->addColumn('latlong', function ($query) {
            $btn = '<span class="badge bg-label-primary"><a href="https://maps.google.com/?q=' . $query->latitude . ',' . $query->longitude . '">Lihat Maps</a></span>';
            return  $btn;
        })->rawColumns(['action', 'area_id', 'latlong'])->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'sidebar' => 'Odp',
            'page_name' => 'Odp',
            'area' => Area::all(),
        ];
        return view('backend.coverage.odp.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OdpRequest $request)
    {
        $request->validated();
        Odp::create([
            'name' => $request->name,
            'area_id' => $request->area_id,
            'splitter' => $request->splitter,
            'port' => $request->splitter,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);
        return redirect()->route('backend.odp')->with(['success' => 'Berhasil Menambahkan Odp']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = [
            'sidebar' => 'Odp',
            'page_name' => 'Odp',
            'area' => Area::all(),
            'odp' => Odp::find($id)
        ];

        return view('backend.coverage.odp.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OdpRequest $request, string $id)
    {
        try {
            $request->validated();

            $data = Odp::find($id);
            $data->update(
                [
                    'name' => $request->name,
                    'area_id' => $request->area_id,
                    'splitter' => $request->splitter,
                    'port' => $request->splitter,
                    'latitude' => $request->latitude,
                    'longitude' => $request->longitude,
                ]
            );
            return redirect()->route('backend.odp')->with(['success' => 'Berhasil Edit Odp']);
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
            Odp::where('id', $id)->delete();
            //return response
            return response()->json([
                'status' => 'success',
                'success' => true,
                'message' => 'Odp Berhasil Dihapus!.',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Odp Tidak Bisa Dihapus Karena Masih digunakan!',
                'trace' => $e->getTrace()
            ]);
        }
    }
}
