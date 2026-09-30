<?php

namespace App\Http\Controllers\Front_End\PreRegister;

use App\Http\Controllers\Controller;

class PreRegisterBisnisController extends Controller
{
    public function index()
    {

        $data = [
            'page_name' => 'Preregister Bisnis',
            'navlight' => true,
        ];
        return view('front-end.page.preregister.index_bisnis', $data);
    }
}
