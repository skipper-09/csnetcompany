<?php

namespace App\Http\Controllers\Backend\Career;

use App\Http\Controllers\Controller;
use App\Http\Requests\HiringRequest;
use App\Models\CategoryJob;
use App\Models\Hiring;
use App\Models\JobLocation;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;

class HiringJobController extends Controller
{
    public function index()
    {
        $data = [
            'sidebar' => 'job',
            'page_name' => 'Pekerjaan',
        ];
        return view('backend.career.hiring.index', $data);
    }

    public function getData()
    {
        $query = Hiring::with(['categoryjob', 'joblocation'])->get();
        return DataTables::of($query)->addIndexColumn()->addColumn('action', function ($query) {
            $button = '';
            $button .= ' <a href="' . route('backend.hiring.edit',['id'=>$query->id]) . '" class="btn btn-sm btn-success action " data-id=' . $query->id . ' data-type="edit" data-toggle="tooltip" data-placement="bottom" title="Edit Data"><i
                                                        class="fas fa-pen"></i></a>';
            $button .= '<button class="btn btn-sm btn-danger action" data-id=' . $query->id . ' data-type="delete" data-route="' . route('backend.hiring.delete', ['id' => $query->id]) . '" data-toggle="tooltip" data-placement="bottom" title="Delete Data"><i
                                                            class="fas fa-trash"></i></button>';
            return '<div class="d-flex gap-1">' . $button . '</div>';
        })->editColumn('category',function($data){
            return $data->categoryjob->name;
        })->editColumn('joblocation',function($data){
            return $data->joblocation->name;
        })->rawColumns(['action','category','joblocation'])->make(true);
    }


    public function create()
    {
        $data = [
            'sidebar' => 'job',
            'page_name' => 'Pekerjaan',
            'categori' => CategoryJob::all(),
            'location' => JobLocation::all() ,
        ];
        return view('backend.career.hiring.add', $data);
    }


    public function store(HiringRequest $request){
        try {
            $request->validated();
            $slug = Str::slug($request->name);
            Hiring::insert([
                'name' => $request->name, 
                'qualification' => $request->qualification, 
                'category_job' => $request->category_job, 
                'job_location' => $request->job_location, 
                'slug' => $slug,
            ]); 
            return redirect()->route('backend.hiring')->with(['success' => 'Berhasil Menambahkan Pekerjaan!']);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'trace' => $e->getTrace()
            ]);
        }
    }


    public function edit($id)
    {
        $data = [
            'sidebar' => 'job',
            'page_name' => 'Pekerjaan',
            'categori' => CategoryJob::all(),
            'location' => JobLocation::all(),
            'hiring'=> Hiring::findOrFail($id)
        ];
        return view('backend.career.hiring.edit', $data);
    }


    public function update(HiringRequest $request,$id){
        try {
            $hiring = Hiring::find($id);
            $request->validated();
            $slug = Str::slug($request->name);
            $hiring->update([
                'name' => $request->name, 
                'qualification' => $request->qualification, 
                'category_job' => $request->category_job, 
                'job_location' => $request->job_location, 
                'slug' => $slug,
            ]); 
            return redirect()->route('backend.hiring')->with(['success' => 'Berhasil Update Pekerjaan!']);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'trace' => $e->getTrace()
            ]);
        }
    }


    public function destroy($id){
        try {
            Hiring::where('id', $id)->delete();
            //return response
            return response()->json([
                'status' => 'success',
                'success' => true,
                'message' => 'Pekerjaan Berhasil Dihapus!.',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Pekerjaan Tidak Bisa Dihapus',
                'trace' => $e->getTrace()
            ]);
        }
    }
    
}
