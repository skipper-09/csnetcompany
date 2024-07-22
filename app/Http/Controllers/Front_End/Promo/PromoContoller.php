<?php

namespace App\Http\Controllers\Front_End\Promo;

use App\Http\Controllers\Controller;
use App\Models\packet;
use App\Models\Promo;
use Illuminate\Http\Request;

class PromoContoller extends Controller
{
    public function index()
    {
        $data = [
            'page_name' => 'Promo',
            'packet' => packet::with('packetDescription')->where('is_active', true)->where('category_id', 3)->get(),
            'promo' => Promo::where('is_active', true)->get(),
        ];
        return view('front-end.page.promo.index', $data);
    }
}
