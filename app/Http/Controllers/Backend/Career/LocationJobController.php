<?php

namespace App\Http\Controllers\Backend\Career;

use App\Http\Controllers\Controller;
use App\Http\Requests\LocationJobRequest;
use App\Models\JobLocation;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class LocationJobController extends Controller
{

    public function index()
    {
        $data = [
            'sidebar' => 'job',
            'page_name' => 'Lokasi',
        ];
        return view('backend.career.joblocation.index', $data);
    }

    public function getData()
    {
        $query = JobLocation::all();
        return DataTables::of($query)->addIndexColumn()->addColumn('action', function ($query) {
            $button = '';
            $button .= ' <a href="' . route('backend.locationjob.edit',['id'=>$query->id]) . '" class="btn btn-sm btn-success action " data-id=' . $query->id . ' data-type="edit" data-toggle="tooltip" data-placement="bottom" title="Edit Data"><i
                                                        class="fas fa-pen"></i></a>';
            $button .= '<button class="btn btn-sm btn-danger action" data-id=' . $query->id . ' data-type="delete" data-route="' . route('backend.locationjob.delete', ['id' => $query->id]) . '" data-toggle="tooltip" data-placement="bottom" title="Delete Data"><i
                                                            class="fas fa-trash"></i></button>';
            return '<div class="d-flex gap-1">' . $button . '</div>';
        })->make(true);
    }

    public function create()
    {
        $data = [
            'sidebar' => 'job',
            'page_name' => 'Lokasi',
        ];
        return view('backend.career.joblocation.add', $data);
    }


    public function store(LocationJobRequest $request){
        try {
            $request->validated();

            JobLocation::insert([
                'name'=>$request->name
            ]);
            return redirect()->route('backend.locationjob')->with(['success' => 'Berhasil Menambahkan Lokasi!']);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'trace' => $e->getTrace()
            ]); 
        }
    }

    public function show($id)
    {
        $data = [
            'sidebar' => 'job',
            'page_name' => 'Lokasi',
            'lokasi'=> JobLocation::find($id)
        ];
        return view('backend.career.joblocation.edit', $data);
    }

    public function update(LocationJobRequest $request,$id){
        try {
            $lokasi = JobLocation::find($id);
            $request->validated();

            $lokasi->update([
                'name'=>$request->name
            ]);
            return redirect()->route('backend.locationjob')->with(['success' => 'Berhasil Mengubah Lokasi!']);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'trace' => $e->getTrace()
            ]); 
        }
    }


    public function destroy($id){
        try {
            JobLocation::where('id', $id)->delete();
            //return response
            return response()->json([
                'status' => 'success',
                'success' => true,
                'message' => 'Lokasi Berhasil Dihapus!.',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Lokasi Tidak Bisa Dihapus',
                'trace' => $e->getTrace()
            ]);
        }
    }
}
