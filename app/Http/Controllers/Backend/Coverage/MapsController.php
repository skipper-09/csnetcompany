<?php

namespace App\Http\Controllers\Backend\Coverage;

use App\Http\Controllers\Controller;
use App\Models\Odp;
use Illuminate\Http\Request;

class MapsController extends Controller
{
    public function index(){
        $data = [
            'sidebar' => 'Odp',
            'page_name' => 'Maps Odp',
            'maps'=>Odp::all()
        ];
        return view('backend.coverage.maps.index', $data);
    }
}
