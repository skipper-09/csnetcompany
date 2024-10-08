<?php

namespace App\Http\Controllers\Front_End\Home;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    public function index()
    {

        $pathjson = public_path('/data/datareviewidnet.json');


        // Baca konten file JSON
        $jsonData = File::get($pathjson);


        // Decode JSON menjadi array
        $datajson = json_decode($jsonData, true);

        // Kirim data ke tampilan Blade
        $data = [
            'page_name' => 'Home',
            'navlight' => true,
            'partner' => partner::all(),
            'faq' => Faq::where('type', 'All')->limit(10)->get(),
            'review' => $datajson
        ];

        return view('front-end.page.home.index', $data);
    }
}
