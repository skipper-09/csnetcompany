<?php

namespace App\Http\Controllers\Front_End\Packet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DedicatedController extends Controller
{
    public function index()
    {
        $data = [
            'page_name' => 'Dedicated'
        ];
        return view('front-end.page.packet.dedicated.index', $data);
    }
}
