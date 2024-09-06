<?php

namespace App\Http\Controllers\Backend\Media;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Exception;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Str;

class MediaController extends Controller
{
    public function index()
    {
        $data = [
            'sidebar' => 'media',
            'page_name' => 'Media',
            'media'=>Media::all()
        ];
        return view('backend.media.index', $data);
    }


    public function detail($slug){
        $query = Media::where('slug',$slug)->get();
        $data = [
            'sidebar' => 'media',
            'page_name' => 'Media',
            'media'=>$query
        ];
        return view('backend.media.detail', $data);
    }



    public function create()
    {
        $data = [
            'sidebar' => 'media',
            'page_name' => 'Media',
            'role'=>Role::whereNotIn('name',['Developer'])->get()
        ];
        return view('backend.media.add', $data);
    }

    public function store(Request $request) {
        try {
            // $request->validate([
            //     ''
            // ]);
            
            $filename = '';
            if ($request->hasFile('file')) {
                $file  = $request->file('file');
                $filename = 'file_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('storage/file/'), $filename);
            }
            $slug = Str::slug($request->name);
            Media::create([
                'name'=>$request->name,
                'type' =>$request->type,
                'pdf' =>$filename,
                'url'=>$request->url,
                'usertype'=>$request->usertype,
                'slug'=>$slug
            ]);
            return redirect()->route('backend.media')->with(['success' => 'Berhasil Menambahkan Media!']);
        }catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'trace' => $e->getTrace()
            ]);
        }
    }
}
