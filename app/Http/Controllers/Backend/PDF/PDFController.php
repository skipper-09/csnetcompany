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
use Intervention\Image\ImageManager;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Colors\Rgb\Channels\Red;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Laravel\Facades\Image;

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
                $button .= ' <a href="' . route('backend.spk.edit', ['id' => $row->id]) . '" class="btn btn-sm btn-success action " data-id=' . $row->id . ' data-type="edit" data-toggle="tooltip" data-placement="bottom" title="Edit Data"><i
                                                            class="fas fa-pen"></i></a>';
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
        $request->merge([
            'stb_status' => $request->get('stb_status', 'Tidak'),
        ]);

        // First validate non-signature fields
        $validated = $request->validate([
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

        // Validate signatures separately with custom error messages
        $request->validate([
            'client_signature' => 'required|string',
            'technician_signature' => 'required|string'
        ], [
            'client_signature.required' => 'Tanda tangan klien wajib diisi',
            'technician_signature.required' => 'Tanda tangan teknisi wajib diisi'
        ]);

        try {
            // Process and save signatures
            $clientSignaturePath = null;
            $technicianSignaturePath = null;

            if ($request->client_signature) {
                $clientSignaturePath = $this->saveSignature($request->client_signature, 'client');
            }

            if ($request->technician_signature) {
                $technicianSignaturePath = $this->saveSignature($request->technician_signature, 'technician');
            }

            // Generate letter number
            $randomNumber = str_pad(rand(1, 100), 3, '0', STR_PAD_LEFT);
            $letter_number = $randomNumber . "/BWI/" . date('Y');

            // Set up PDF options
            $options = new Options();
            $options->set('isRemoteEnabled', true);

            // Load the view with signatures
            $pdf = Pdf::loadView('backend.spk.pdf', [
                'data' => array_merge($validated, [
                    'date' => Carbon::now(),
                    'client_signature_path' => $clientSignaturePath,
                    'technician_signature_path' => $technicianSignaturePath,
                ]),
                'letter_number' => $letter_number,
            ]);

            // Generate PDF filename
            $filename = Carbon::now()->format('Y-m-d') . '-Surat-Tugas-Pemasangan-Retail-' . Str::random(10) . '.pdf';

            // Store the PDF
            Storage::disk('public')->put('spk/' . $filename, $pdf->output());

            // Create SPK record
            $spk = SPK::create([
                ...$validated,
                'date' => Carbon::now(),
                'pdf_path' => 'spk/' . $filename,
                'client_signature_path' => $clientSignaturePath,
                'technician_signature_path' => $technicianSignaturePath,
            ]);

            return redirect()->route('backend.spk')->with(['success' => 'Data SPK Berhasil Dibuat!']);
        } catch (Exception $e) {
            // Clean up any saved files if an error occurs
            if (isset($clientSignaturePath) && Storage::disk('public')->exists($clientSignaturePath)) {
                Storage::disk('public')->delete($clientSignaturePath);
            }
            if (isset($technicianSignaturePath) && Storage::disk('public')->exists($technicianSignaturePath)) {
                Storage::disk('public')->delete($technicianSignaturePath);
            }

            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => 'Terjadi kesalahan saat menyimpan SPK: ' . $e->getMessage()]);
        }
    }

    public function show($id)
    {
        $data = [
            'sidebar' => 'Informasi',
            'page_name' => 'Surat Tugas Pemasangan Retail',
            'spk' => SPK::find($id)
        ];
        return view('backend.spk.edit', $data);
    }

    public function update(Request $request, $id)
    {
        // Merge default values for stb_status
        $request->merge([
            'stb_status' => $request->get('stb_status', 'Tidak'),
        ]);

        // Validate the non-signature fields
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

        try {
            // Find the SPK record by ID
            $spk = SPK::findOrFail($id);

            // Get current signature paths
            $clientSignaturePath = $spk->client_signature_path;
            $technicianSignaturePath = $spk->technician_signature_path;

            // Update only the non-signature fields
            $spk->update([
                'date' => $validated['date'],
                'date_install' => $validated['date_install'],
                'technician_name' => $validated['technician_name'],
                'technician_position' => $validated['technician_position'],
                'client_name' => $validated['client_name'],
                'client_nik' => $validated['client_nik'],
                'client_address' => $validated['client_address'],
                'client_whatsapp' => $validated['client_whatsapp'],
                'package' => $validated['package'],
                'modem_serial' => $validated['modem_serial'],
                'cable_details' => $validated['cable_details'],
                'stb_status' => $validated['stb_status'],
                'stb_mac_address' => $validated['stb_mac_address'] ?? null,
            ]);

            // Generate letter number (same as store)
            $randomNumber = str_pad(rand(1, 100), 3, '0', STR_PAD_LEFT);
            $letter_number = $randomNumber . "/BWI/" . date('Y');

            // Set up PDF options (for DOMPDF)
            $options = new Options();
            $options->set('isRemoteEnabled', true);

            // Load the updated data and existing signature paths
            $pdf = Pdf::loadView('backend.spk.pdf', [
                'data' => array_merge($validated, [
                    'client_signature_path' => $clientSignaturePath, // Keep existing signature
                    'technician_signature_path' => $technicianSignaturePath, // Keep existing signature
                ]),
                'letter_number' => $letter_number,
            ]);

            // Generate PDF filename (overwrite existing one)
            $filename = Carbon::now()->format('Y-m-d') . '-Surat-Tugas-Pemasangan-Retail-' . Str::random(10) . '.pdf';

            // Store the new PDF file (this will overwrite the old one)
            Storage::disk('public')->put('spk/' . $filename, $pdf->output());

            // Update the SPK record with the new PDF path
            $spk->update([
                'pdf_path' => 'spk/' . $filename,
            ]);

            // Return success message
            return redirect()->route('backend.spk')->with(['success' => 'Data SPK Berhasil Diperbarui dan PDF Diperbarui!']);
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat memperbarui SPK: ' . $e->getMessage()]);
        }
    }


    private function saveSignature($base64Signature, $type)
    {
        try {
            // Check if the signature is empty or invalid
            if (empty($base64Signature)) {
                throw new Exception('Tanda tangan tidak boleh kosong');
            }

            // Check if it's a valid base64 image string
            if (!preg_match('/^data:image\/(\w+);base64,/', $base64Signature)) {
                throw new Exception('Format tanda tangan tidak valid');
            }

            // Get image data and decode base64
            $imageData = base64_decode(preg_replace('/^data:image\/\w+;base64,/', '', $base64Signature));

            if (!$imageData) {
                throw new Exception('Gagal decode data tanda tangan');
            }

            // Generate filename
            $filename = $type . '_signature_' . time() . '_' . Str::random(10) . '.png';
            $path = 'signatures/' . $filename;

            // Save image directly from binary data
            if (!Storage::disk('public')->put($path, $imageData)) {
                throw new Exception('Gagal menyimpan file tanda tangan');
            }

            return $path;
        } catch (Exception $e) {
            throw new Exception('Gagal menyimpan tanda tangan: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $spk = SPK::findOrFail($id);

            // Delete PDF file
            $pdfPath = str_replace('storage/', '', $spk->pdf_path);
            if ($pdfPath && Storage::disk('public')->exists($pdfPath)) {
                Storage::disk('public')->delete($pdfPath);
            }

            // Delete signature files
            if ($spk->client_signature_path && Storage::disk('public')->exists($spk->client_signature_path)) {
                Storage::disk('public')->delete($spk->client_signature_path);
            }
            if ($spk->technician_signature_path && Storage::disk('public')->exists($spk->technician_signature_path)) {
                Storage::disk('public')->delete($spk->technician_signature_path);
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
