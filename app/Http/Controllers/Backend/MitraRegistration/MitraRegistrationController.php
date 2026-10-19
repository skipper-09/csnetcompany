<?php

namespace App\Http\Controllers\Backend\MitraRegistration;

use App\Http\Controllers\Controller;
use App\Models\MitraRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\StreamedResponse;

class MitraRegistrationController extends Controller
{
    private const VIEW = 'backend.mitra.';
    private const FILTERS = ['q', 'type', 'status', 'from', 'to'];

    public function index(Request $request)
    {
        $filter = $request->only(self::FILTERS);

        $registrations = MitraRegistration::filter($filter)->latest()->paginate(15)->withQueryString();

        $stats = MitraRegistration::selectRaw('status, COUNT(*) as total')->groupBy('status')->pluck('total', 'status');

        $pageName = match ($filter['type'] ?? null) {
            'vendor' => 'Pendaftaran Vendor',
            'supplier' => 'Pendaftaran Supplier',
            default => 'Pendaftaran Mitra',
        };

        return view(self::VIEW . 'index', [
            'sidebar' => 'mitra',
            'page_name' => $pageName,
            'registrations' => $registrations,
            'stats' => $stats,
            'total' => $stats->sum(),
            'filter' => $filter,
            'statuses' => MitraRegistration::STATUSES,
        ]);
    }

    public function show(MitraRegistration $mitra)
    {
        return view(self::VIEW . 'show', [
            'sidebar' => 'mitra',
            'page_name' => 'Detail Pendaftaran ' . $mitra->registration_number,
            'mitra' => $mitra,
            'timeline' => $mitra->timeline(),
            'actions' => $mitra->availableActions(),
            'documents' => MitraRegistration::DOCUMENTS,
            'entities' => MitraRegistration::BUSINESS_ENTITIES,
        ]);
    }

    public function updateStatus(Request $request, MitraRegistration $mitra)
    {
        $data = $request->validate(
            [
                'action' => ['required', Rule::in(array_keys($mitra->availableActions()))],
                'admin_notes' => [Rule::requiredIf($request->action === MitraRegistration::STATUS_REJECTED), 'nullable', 'string', 'max:1000'],
            ],
            [
                'action.in' => 'Aksi tidak valid untuk status saat ini.',
                'admin_notes.required' => 'Alasan penolakan wajib diisi.',
            ],
        );

        match ($data['action']) {
            MitraRegistration::STATUS_EVALUATING => $mitra->moveToEvaluation(),
            MitraRegistration::STATUS_APPROVED => $mitra->approve($data['admin_notes'] ?? null),
            MitraRegistration::STATUS_REJECTED => $mitra->reject($data['admin_notes']),
        };

        // TODO: kirim notifikasi email / WhatsApp ke pendaftar

        return back()->with('success', 'Status diperbarui menjadi "' . $mitra->fresh()->status_label . '".');
    }

    public function document(Request $request, MitraRegistration $mitra, string $field)
    {
        abort_unless(array_key_exists($field, MitraRegistration::DOCUMENTS), 404);

        $path = $mitra->{$field};
        abort_unless($path && Storage::disk('local')->exists($path), 404, 'Dokumen tidak ditemukan.');

        $filename = Str::slug($mitra->company_name) . '-' . Str::after($field, 'doc_') . '.pdf';

        return $request->boolean('download') ? Storage::disk('local')->download($path, $filename) : Storage::disk('local')->response($path, $filename, ['Content-Type' => 'application/pdf']);
    }

    public function destroy(MitraRegistration $mitra)
    {
        Storage::disk('local')->deleteDirectory("mitra/{$mitra->registration_number}");
        $mitra->delete();

        return redirect()->route('admin.mitra.index')->with('success', 'Pendaftaran berhasil dihapus.');
    }

    public function export(Request $request): StreamedResponse
    {
        $filter = $request->only(self::FILTERS);
        $filename = 'pendaftaran-mitra-' . now()->format('Ymd-His') . '.csv';

        return response()->streamDownload(
            function () use ($filter) {
                $out = fopen('php://output', 'w');
                fwrite($out, "\xEF\xBB\xBF"); // BOM agar Excel membaca UTF-8

                fputcsv($out, ['No. Pendaftaran', 'Tanggal', 'Jenis', 'Status', 'Perusahaan', 'Badan Usaha', 'NPWP', 'NIB', 'Kota', 'Provinsi', 'PIC', 'Email', 'WhatsApp', 'Kategori', 'Sub Kategori', 'Area Layanan'], ';');

                MitraRegistration::filter($filter)
                    ->latest()
                    ->chunk(500, function ($rows) use ($out) {
                        foreach ($rows as $r) {
                            fputcsv($out, [$r->registration_number, $r->created_at->format('Y-m-d H:i'), $r->type_label, $r->status_label, $r->company_name, $r->business_entity, $r->npwp, $r->nib, $r->city, $r->province, $r->pic_name, $r->email, $r->phone, $r->main_category, $r->sub_category, $r->service_area], ';');
                        }
                    });

                fclose($out);
            },
            $filename,
            ['Content-Type' => 'text/csv; charset=UTF-8'],
        );
    }
}
