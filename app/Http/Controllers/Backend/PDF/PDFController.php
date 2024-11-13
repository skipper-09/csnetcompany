<?php

namespace App\Http\Controllers\Backend\PDF;

use App\Http\Controllers\Controller;
use App\Models\SPK;
use Dompdf\Options;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Carbon;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;

class PDFController extends Controller
{
    public function index()
    {
        $data = [
            'sidebar' => 'Informasi',
            'page_name' => 'Surat Tugas Pemasangan Retail',
        ];
        return view('backend.spk.index', $data);
    }

    // public function getData(Request $request)
    // {
    //     $query = SPK::all()->map(function ($item) {
    //         $item->date = Carbon::createFromFormat('Y-m-d', $item->date)->format('d/m/Y');
    //         $item->date_install = Carbon::createFromFormat('Y-m-d', $item->date_install)->format('d/m/Y');
    //         return $item;
    //     });

    //     return DataTables::of($query)
    //         ->addIndexColumn()
    //         ->addColumn('action', function ($row) {
    //             $button = '<button class="btn btn-sm btn-danger action" data-id="' . $row->id . '" data-type="delete" data-route="' . route('backend.spk.delete', ['id' => $row->id]) . '"><i class="fas fa-trash"></i></button>';
    //             return '<div class="d-flex gap-1">' . $button . '</div>';
    //         })
    //         ->addColumn('pdf_path', function ($row) {
    //             return $row->pdf_path ? '<a href="' . asset($row->pdf_path) . '" target="_blank">View PDF</a>' : 'No PDF';
    //         })
    //         ->rawColumns(['action', 'pdf_path'])
    //         ->make(true);
    // }

    public function create()
    {
        $data = [
            'sidebar' => 'Informasi',
            'page_name' => 'Surat Tugas Pemasangan Retail',
        ];

        return view('backend.spk.add', $data);
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'date' => 'required|date',
                'date_install' => 'required|date',
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

            $randomNumber = str_pad(rand(1, 100), 3, '0', STR_PAD_LEFT);
            $letter_number = $randomNumber . "/BWI/" . date('Y');

            $pdf = Pdf::loadView('backend.spk.pdf', [
                'data' => $validated,
                'letter_number' => $letter_number,
            ]);

            $name = Carbon::now()->format('Y-m-d') . '-Surat-Tugas-Pemasangan-Retail-' . Str::random(10) . '.pdf';

            // Store the PDF file using the public disk
            Storage::disk('public')->put('pdf/' . $name, $pdf->output());

            $spk = SPK::create([
                ...$validated,
                'pdf_path' => 'storage/pdf/' . $name,
            ]);

            // Return response with download
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil disimpan',
                'pdf_url' => asset('storage/pdf/' . $name)
            ]);
        } catch (Exception $e) {
            // If something goes wrong, delete the PDF if it was created
            if (isset($name) && Storage::disk('public')->exists('pdf/' . $name)) {
                Storage::disk('public')->delete('pdf/' . $name);
            }

            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $spk = SPK::findOrFail($id);

            // Remove 'storage/' from the start of the path if it exists
            $pdfPath = str_replace('storage/', '', $spk->pdf_path);

            if ($pdfPath && Storage::disk('public')->exists($pdfPath)) {
                Storage::disk('public')->delete($pdfPath);
            }

            $spk->delete();

            return response()->json([
                'status' => 'success',
                'success' => true,
                'message' => 'Data SPK Berhasil Dihapus!',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'success' => false,
                'message' => 'Data SPK Tidak Bisa Dihapus Karena Masih Digunakan atau Terjadi Kesalahan!',
                'trace' => $e->getTrace()
            ]);
        }
    }
}
