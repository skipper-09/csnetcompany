<?php

namespace App\Http\Controllers\Front_End\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'page_name' => 'Home',
        ];
        return view('front-end.page.home.index', $data);
    }
}
