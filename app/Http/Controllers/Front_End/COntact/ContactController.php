<?php

namespace App\Http\Controllers\Front_End\COntact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $data = [
            'page_name' => 'Hubungi Kami',
        ];
        return view('front-end.page.contact.index', $data);
    }
}
