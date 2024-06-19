<?php

namespace App\Http\Controllers\Front_End\Packet;

use App\Http\Controllers\Controller;
use App\Models\packet;
use Illuminate\Http\Request;

class RitelController extends Controller
{
    public function index(){
        $data=[
            'page_name' => 'Broadband',
            'packet'=> packet::all(),
        ];
        return view('front-end.page.packet.ritel.index',$data);
    }
}
