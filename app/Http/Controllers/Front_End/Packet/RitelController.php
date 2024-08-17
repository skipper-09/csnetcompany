<?php

namespace App\Http\Controllers\Front_End\Packet;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\packet;
use App\Models\PacketHasDescription;
use Illuminate\Http\Request;

class RitelController extends Controller
{
    public function index(){
        $data=[
            'page_name' => 'Broadband',
            'packet'=> packet::with('packetDescription')->where('is_active',true)->where('category_id',1)->get(),
            'faq'=>Faq::where('type','Broadband')->limit(5)->get(),
        ];
        return view('front-end.page.packet.ritel.index',$data);
    }
}
