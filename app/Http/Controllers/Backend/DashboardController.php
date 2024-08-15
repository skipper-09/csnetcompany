<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Odp;
use App\Models\packet;
use App\Models\Promo;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data=[
            'sidebar'=> 'dashboard',
            'page_name'=> 'Dashboard',
            'paket'=>packet::all(),
            'promo'=>Promo::all(),
            'odp'=>Odp::all()
        ];
        return view('backend.dashboard.index',$data);
    }
}
