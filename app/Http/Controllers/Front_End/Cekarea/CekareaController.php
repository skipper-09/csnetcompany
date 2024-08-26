<?php

namespace App\Http\Controllers\Front_End\Cekarea;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Jalan;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Kota;
use App\Models\partner;
use Illuminate\Http\Request;

class CekareaController extends Controller
{
    public function index()
    {

        $data = [
            'page_name' => 'Cek Area Cakupan',
            'navlight' => true,
            'kota' => Kota::all(),
        ];
        return view('front-end.page.cekarea.index', $data);
    }

    public function getKecamatan($kota_id)
    {
        $kecamatans = Kecamatan::where('kota_id', $kota_id)->get();
        return response()->json($kecamatans);
    }
    public function getKelurahan($kecamatan_id)
    {
        $kelurahans = Kelurahan::where('kecamatan_id', $kecamatan_id)->get();
        return response()->json($kelurahans);
    }
    public function getJalan($kelurahan_id)
    {

        $jalans = Jalan::where('kelurahan_id', $kelurahan_id)->get();
        return response()->json($jalans);
    }
}
