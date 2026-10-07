<?php

namespace App\Http\Controllers\Front_End\Karir;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class KarirController extends Controller
{
    public function index()
    {

        $data = [
            'page_name' => 'Karir',
        ];

        return view('front-end.page.karir.index', $data);
    }
}
