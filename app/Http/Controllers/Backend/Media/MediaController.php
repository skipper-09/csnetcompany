<?php

namespace App\Http\Controllers\Backend\Media;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;

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
}
