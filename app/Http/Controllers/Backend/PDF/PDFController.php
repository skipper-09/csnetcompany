<?php

namespace App\Http\Controllers\Backend\PDF;

use App\Http\Controllers\Controller;
use Dompdf\Options;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Carbon;

class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'sidebar' => 'Informasi',
            'page_name' => 'Surat Tugas Pemasangan Retail',
        ];
        return view('backend.spk.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'sidebar' => 'Informasi',
            'page_name' => 'Surat Tugas Pemasangan Retail',
        ];

        return view('backend.spk.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'technician_name' => 'required|string',
            'technician_position' => 'required|string',
            'client_name' => 'required|string',
            'client_nik' => 'required|string',
            'client_address' => 'required|string',
            'client_whatsapp' => 'required|string',
            'package' => 'required|string',
            'modem_serial' => 'required|string',
            'cable_details' => 'required|string',
            'stb_status' => 'required|in:Ada,Tidak',
            'stb_mac_address' => 'nullable|required_if:stb_status,Ada',
        ]);

        $options = new Options();

        $options->set('isRemoteEnabled', true);

        // Menentukan jumlah angka yang ingin dihasilkan
        $jumlahAngka = 100;

        // Menghasilkan angka acak dalam rentang tertentu, misalnya 001 hingga 999
        $randomNumber = str_pad(rand(1, $jumlahAngka), 3, '0', STR_PAD_LEFT);

        // Menggabungkan angka acak dengan format yang diinginkan
        $letter_number = $randomNumber . "/BWI/" . date('Y');

        $pdf = Pdf::loadView('backend.spk.pdf', [
            'data' => $validated,
            'letter_number' => $letter_number,
        ]);

        $name = Carbon::now()->format('Y-m-d') . '-Surat Tugas Pemasangan Retail-' . Str::random(10) . '.pdf';


        return $pdf->download($name);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
