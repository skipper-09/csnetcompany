<?php

namespace App\Http\Controllers\Front_End\TremOfService;

use App\Http\Controllers\Controller;
use App\Models\TremofService;
use Illuminate\Http\Request;

class TremOfServiceController extends Controller
{
    public function index()
    {
        $data = [
            'page_name' => 'Syarat dan Ketentuan',
            'tremofservice' =>TremofService::all(),
        ];
        return view('front-end.page.tremofservice.index', $data);
    }
}
