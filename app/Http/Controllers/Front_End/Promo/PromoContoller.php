<?php

namespace App\Http\Controllers\Front_End\Promo;

use App\Http\Controllers\Controller;
use App\Models\packet;
use App\Models\Promo;
use App\Models\promo_paket;
use Illuminate\Http\Request;

class PromoContoller extends Controller
{
    public function index()
    {
        $data = [
            'page_name' => 'Promo',
            'packet' => packet::with('packetDescription')->where('is_active', true)->where('category_id', 3)->get(),
            'promo' => Promo::where('is_active', true)->get(),
            'slider'=> Promo::where([['is_active', true],['slider',true]])->get(),
        ];
        return view('front-end.page.promo.index', $data);
    }


    public function detailpromo($slug){
        $promopaket = Promo::where('slug',$slug)->first();
        $data = [
            'page_name' => $promopaket->name,
            'promo' => Promo::where('slug',$slug)->first(),
            'promopaket'=>promo_paket::where([['promotion_id',$promopaket->id],['status',true]])->with('paket')->get()
        ];
        return view('front-end.page.promo.detail', $data);
    }
}
