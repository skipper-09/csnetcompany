<?php

namespace App\Http\Controllers\Backend\Career;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryJobRequest;
use App\Models\CategoryJob;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CategoryJobController extends Controller
{
    public function index()
    {
        $data = [
            'sidebar' => 'job',
            'page_name' => 'Kategori',
        ];
        return view('backend.career.categoryjob.index', $data);
    }


    public function getData()
    {
        $query = CategoryJob::all();
        return DataTables::of($query)->addIndexColumn()->addColumn('action', function ($query) {
            $button = '';
            $button .= ' <a href="' . route('backend.categoryjob.edit',['id'=>$query->id]) . '" class="btn btn-sm btn-success action " data-id=' . $query->id . ' data-type="edit" data-toggle="tooltip" data-placement="bottom" title="Edit Data"><i
                                                        class="fas fa-pen"></i></a>';
            $button .= '<button class="btn btn-sm btn-danger action" data-id=' . $query->id . ' data-type="delete" data-route="' . route('backend.categoryjob.delete', ['id' => $query->id]) . '" data-toggle="tooltip" data-placement="bottom" title="Delete Data"><i
                                                            class="fas fa-trash"></i></button>';
            return '<div class="d-flex gap-1">' . $button . '</div>';
        })->make(true);
    }


    public function create()
    {
        $data = [
            'sidebar' => 'job',
            'page_name' => 'Kategori',
        ];
        return view('backend.career.categoryjob.add', $data);
    }


    public function store(CategoryJobRequest $request){
        try {
            $request->validated();

            CategoryJob::insert([
                'name'=>$request->name
            ]);
            return redirect()->route('backend.categoryjob')->with(['success' => 'Berhasil Menambahkan Kategori!']);
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
            'page_name' => 'Kategori',
            'categori'=> CategoryJob::find($id),
        ];
        return view('backend.career.categoryjob.edit', $data);
    }


    public function update(CategoryJobRequest $request,$id){
        try {
            $categori = CategoryJob::find($id);
            $request->validated();

            $categori->update([
                'name'=>$request->name
            ]);
            return redirect()->route('backend.categoryjob')->with(['success' => 'Berhasil Menambahkan Kategori!']);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'trace' => $e->getTrace()
            ]); 
        }
    }


    public function destroy($id){
        try {
            CategoryJob::where('id', $id)->delete();
            //return response
            return response()->json([
                'status' => 'success',
                'success' => true,
                'message' => 'Data Kategori Berhasil Dihapus!.',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Data Kategori Tidak Bisa Dihapus',
                'trace' => $e->getTrace()
            ]);
        }
    }
}
