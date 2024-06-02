<?php

namespace App\Http\Controllers\Front_End\Packet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RitelController extends Controller
{
    public function index(){
        return view('front-end.page.packet.ritel.index');
    }
}
