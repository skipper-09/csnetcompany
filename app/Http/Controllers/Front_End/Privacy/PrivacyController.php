<?php

namespace App\Http\Controllers\Front_End\Privacy;

use App\Http\Controllers\Controller;
use App\Models\PrivacyPolicy;
use Illuminate\Http\Request;

class PrivacyController extends Controller
{
    
        public function index()
    {
        $data = [
            'page_name' => 'Syarat dan Ketentuan',
            'privacy' =>PrivacyPolicy::all(),
        ];
        return view('front-end.page.privacy.index', $data);
    }
    
}
