<?php

namespace App\Http\Controllers\Front_End\Career;

use App\Http\Controllers\Controller;
use App\Models\Hiring;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function index()
    {
        $data = [
            'page_name' => 'Career',
            'navlight' => true,
            'job' => Hiring::with(['categoryjob', 'joblocation'])->get(),
        ];
        return view('front-end.page.career.index', $data);
    }
}
