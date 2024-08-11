<?php

namespace App\Http\Controllers\Front_End\Help;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $data=[
            'page_name'=> 'FAQ',
            'faq' =>Faq::all(),
        ];
        return view('front-end.page.help.faq.index',$data);
    }
}
