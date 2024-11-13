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

    public function getData(Request $request)
    {
        $query = SPK::all();

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $button = '';
                $button .= ' <button class="btn btn-sm btn-danger action" data-id=' . $row->id . ' data-type="delete" data-route="' . route('backend.spk.delete', ['id' => $row->id]) . '"><i
                class="fas fa-trash"></i></button>';
                return '<div class="d-flex gap-1">' . $button . '</div>';
            })
            ->addColumn('pdf_path', function ($row) {
                return $row->pdf_path 
                    ? '<a href="' . asset('storage/' . $row->pdf_path) . '" target="_blank">View PDF</a>' 
                    : 'No PDF';
            })
            ->addColumn('date', function ($row) {
                return $row->date = Carbon::parse($row->date)->toDateString();
            })
            ->addColumn('date_install', function ($row) {
                return $row->dateInstall = Carbon::parse($row->dateInstall)->toDateString();
            })
            ->rawColumns(['action', 'pdf_path', 'date', 'date_install'])
            ->make(true);
    }

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
        // Validate input fields
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
    
        // Set up PDF generation options (ensure you have this dependency installed)
        $options = new Options();
        $options->set('isRemoteEnabled', true);
    
        // Generate letter number based on random and current year
        $randomNumber = str_pad(rand(1, 100), 3, '0', STR_PAD_LEFT);
        $letter_number = $randomNumber . "/BWI/" . date('Y');
    
        // Load the view to create PDF with the validated data and generated letter number
        $pdf = Pdf::loadView('backend.spk.pdf', [
            'data' => $validated,
            'letter_number' => $letter_number,
        ]);

        $filename = '';
        if ($request->hasFile('pdf_path')) {
            $file  = $request->file('pdf_path');
            // Create a name for the PDF file using the current date and random string
            $filename = Carbon::now()->format('Y-m-d') . '-Surat-Tugas-Pemasangan-Retail-' . Str::random(10) . '.pdf';
            $file->move(public_path('storage/spk/files/'), $filename);
        }
    
        // Store the generated PDF on the 'public' disk in the 'spk' folder
        Storage::disk('public')->put('spk/' . $filename, $pdf->output());
    
        // Store the relative path in the database
        $spk = SPK::create([
            ...$validated,
            'pdf_path' => 'spk/' . $filename,  // Store relative path
        ]);
    
        // Redirect back with success message
        return redirect()->route('backend.spk')->with(['success' => 'Data SPK Berhasil Dibuat!']);
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
