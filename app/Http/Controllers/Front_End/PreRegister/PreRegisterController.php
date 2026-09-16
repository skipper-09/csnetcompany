<?php

namespace App\Http\Controllers\Front_End\PreRegister;

use App\Http\Controllers\Controller;
use App\Models\Jalan;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Kota;


class PreRegisterController extends Controller
{
    public function index()
    {

        $data = [
            'page_name' => 'Preregister',
            'navlight' => true,
        ];
        return view('front-end.page.preregister.index', $data);
    }
}
