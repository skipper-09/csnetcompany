<?php

namespace App\Http\Controllers\Front_End\Coverage;

use App\Http\Controllers\Controller;
use App\Models\Area;
use Illuminate\Http\Request;

class CoverageController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        $dataarea = Area::with('odp')->where('kode_pos', $query)->get();

        // Initialize the latitude and longitude sums
        $latSum = 0;
        $lonSum = 0;
        $count = 0;

        // Calculate the sum of latitudes and longitudes
        foreach ($dataarea as $area) {
            foreach ($area->odp as $odp) {
                $latSum += $odp->latitude;
                $lonSum += $odp->longitude;
                $count++;
            }
        }

        // Calculate the average latitude and longitude
        $centerLat = $count ? $latSum / $count : 0;
        $centerLon = $count ? $lonSum / $count : 0;

        $data = [
            'page_name' => 'Coverage',
            'area' => $dataarea,
            'centerlat' => $centerLat,
            'centerlon' => $centerLon,
        ];
        return view('front-end.page.coverage.index', $data);
    }
}
