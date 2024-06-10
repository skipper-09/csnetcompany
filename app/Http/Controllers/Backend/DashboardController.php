<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data=[
            'sidebar'=> 'dashboard',
            'page_name'=> 'Dashboard',
        ];
        return view('backend.dashboard.index',$data);
    }
}
