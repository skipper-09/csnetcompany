<?php

namespace App\Http\Controllers\Front_End\Home;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\partner;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'page_name' => 'Home',
            'navlight' => true,
            'partner' => partner::all(),
            'faq' => Faq::all()
        ];
        return view('front-end.page.home.index', $data);
    }
}
