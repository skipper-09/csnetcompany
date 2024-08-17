<?php

namespace App\Http\Controllers\Front_End\Packet;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\packet;
use Illuminate\Http\Request;

class DedicatedController extends Controller
{
    public function index()
    {
        $data = [
            'navlight' => true,
            'page_name' => 'Dedicated',
            'faq'=>Faq::where('type','Dedicated')->limit(5)->get(),
        ];
        return view('front-end.page.packet.dedicated.index', $data);
    }
}
