<?php

namespace App\Http\Controllers\Front_End\Home;

use App\Http\Controllers\Controller;
use App\Models\partner;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'page_name' => 'Home',
            'partner' => partner::all()
        ];
        return view('front-end.page.home.index', $data);
    }
}
