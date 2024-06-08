<?php

namespace App\Http\Controllers\Front_End\Help;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        return view('front-end.page.help.faq.index');
    }
}
