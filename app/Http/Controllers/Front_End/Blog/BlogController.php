<?php

namespace App\Http\Controllers\Front_End\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        return view('front-end.page.blog.index');
    }

}
