<?php

namespace App\Http\Controllers\Front_End\Packet;

use App\Http\Controllers\Controller;
use App\Models\packet;
use Illuminate\Http\Request;

class InternettvController extends Controller
{
    public function index(){
        $data=[
            'page_name' => 'Internet&TV',
            'packet'=> packet::with('packetDescription')->where('is_active',true)->where('category_id',2)->get(),
        ];
        return view('front-end.page.packet.internettv.index',$data);
    }
}
