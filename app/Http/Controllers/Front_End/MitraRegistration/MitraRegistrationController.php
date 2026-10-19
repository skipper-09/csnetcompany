<?php

namespace App\Http\Controllers\Front_End\MitraRegistration;

use App\Http\Controllers\Controller;
use App\Models\MitraRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class MitraRegistrationController extends Controller
{
    private const SESSION = 'mitra_registration';
    private const VIEW = 'front-end.page.mitra.';

    private function page(string $view, string $title, array $data = [])
{
    return view(self::VIEW . $view, [...$data, 'page_name' => $title]);
}


    // 1. Landing page
    public function landing()
    {
return $this->page('landing', 'Program Mitra', ['categories' => array_keys(MitraRegistration::CATEGORIES)]);
    }

    // 2. Pilih jenis pendaftaran
    public function chooseType()
    {
        return $this->page('choose-type', 'Pilih Jenis Pendaftaran', ['selected' => session(self::SESSION . '.type')]);
    }

    public function storeType(Request $request)
    {
        $data = $request->validate([
            'type' => ['required', Rule::in(MitraRegistration::TYPES)],
        ], ['type.required' => 'Silakan pilih jenis pendaftaran.']);

        // Ganti jenis = mulai ulang form
        if (session(self::SESSION . '.type') !== $data['type']) {
            $this->clearSession();
        }

        session([self::SESSION . '.type' => $data['type']]);

        return redirect()->route('mitra.step', 1);
    }

    // 3-5. Step 1, 2, 3
    public function showStep(int $step)
    {
        if ($redirect = $this->guard($step)) {
            return $redirect;
        }

     $titles = [1 => 'Informasi Perusahaan', 2 => 'Detail Usaha', 3 => 'Upload Dokumen'];
return $this->page("step{$step}", $titles[$step], [
    'data'       => session(self::SESSION . ".step{$step}", []),
    'type'       => session(self::SESSION . '.type'),
    'entities'   => MitraRegistration::BUSINESS_ENTITIES,
    'categories' => MitraRegistration::CATEGORIES,
    'areas'      => MitraRegistration::SERVICE_AREAS,
    'documents'  => MitraRegistration::DOCUMENTS,
]);
    }

    public function storeStep(Request $request, int $step)
    {
        if ($redirect = $this->guard($step)) {
            return $redirect;
        }

        $data = match ($step) {
            1 => $this->validateStep1($request),
            2 => $this->validateStep2($request),
            3 => $this->handleUploads($request),
        };

        session([self::SESSION . ".step{$step}" => $data]);

        return $step < 3
            ? redirect()->route('mitra.step', $step + 1)
            : redirect()->route('mitra.review');
    }

    // 6. Review & kirim
   public function review()
{
    if ($redirect = $this->guard(4)) {
        return $redirect;
    }

    $s = session(self::SESSION);

    return $this->page('review', 'Review Pendaftaran', [
        'type'      => $s['type'],
        'company'   => $s['step1'],
        'business'  => $s['step2'],
        'files'     => array_filter($s['step3']),
        'entities'  => MitraRegistration::BUSINESS_ENTITIES,
        'documents' => MitraRegistration::DOCUMENTS,
    ]);
}

    public function submit(Request $request)
    {
        if ($redirect = $this->guard(4)) {
            return $redirect;
        }

        $request->validate(
            ['agreement' => 'accepted'],
            ['agreement.accepted' => 'Anda harus menyetujui pernyataan kebenaran data.']
        );

        $s      = session(self::SESSION);
        $number = MitraRegistration::generateNumber();

        $registration = DB::transaction(function () use ($s, $number) {
            // Pindahkan file dari folder tmp ke folder permanen
            $docs = [];
            foreach ($s['step3'] as $field => $tmpPath) {
                if (! $tmpPath) {
                    continue;
                }
                $newPath = "mitra/{$number}/{$field}.pdf";
                Storage::disk('local')->move($tmpPath, $newPath);
                $docs[$field] = $newPath;
            }

            return MitraRegistration::create([
                'registration_number' => $number,
                'type'                => $s['type'],
                ...$s['step1'],
                ...$s['step2'],
                ...$docs,
            ]);
        });

        $this->clearSession(deleteFiles: false);

        // TODO: kirim notifikasi email / WhatsApp ke pendaftar & tim purchasing

        return redirect()->route('mitra.success')
            ->with('registration_number', $registration->registration_number)
            ->with('registration_email', $registration->email);
    }

    // 7. Halaman sukses
    public function success()
    {
        if (! session('registration_number')) {
            return redirect()->route('mitra.landing');
        }

       return $this->page('success', 'Pendaftaran Berhasil', [
    'number' => session('registration_number'),
    'email'  => session('registration_email'),
]);
    }

    // 8. Cek status pendaftaran (?nomor=...&email=...)
    public function status(Request $request)
    {
        $registration = null;

        if ($request->filled(['nomor', 'email'])) {
            $request->validate([
                'nomor' => 'required|string|max:30',
                'email' => 'required|email',
            ]);

            $registration = MitraRegistration::where('registration_number', strtoupper(trim($request->nomor)))
                ->where('email', $request->email)
                ->first();

            if (! $registration) {
                return back()->withInput()->withErrors(['nomor' => 'Data pendaftaran tidak ditemukan.']);
            }
        }

        return $this->page('status', 'Status Pendaftaran', [
    'registration' => $registration,
    'timeline'     => $registration?->timeline() ?? [],
]);
    }

    // ================= Helper =================

    /** Pastikan step sebelumnya sudah diisi */
    private function guard(int $step)
    {
        if (! session()->has(self::SESSION . '.type')) {
            return redirect()->route('mitra.type');
        }

        for ($i = 1; $i < $step; $i++) {
            if (! session()->has(self::SESSION . ".step{$i}")) {
                return redirect()->route('mitra.step', $i)
                    ->with('warning', 'Silakan lengkapi langkah ini terlebih dahulu.');
            }
        }

        return null;
    }

    private function validateStep1(Request $request): array
    {
        $type = session(self::SESSION . '.type');

        return $request->validate([
            'company_name'     => 'required|string|max:150',
            'business_entity'  => ['required', Rule::in(array_keys(MitraRegistration::BUSINESS_ENTITIES))],
            'npwp'             => [
                'required', 'regex:/^[0-9.\-]{15,20}$/',
                // NPWP yang sama boleh daftar sebagai supplier & vendor, dan boleh daftar ulang jika ditolak
                Rule::unique('mitra_registrations', 'npwp')->where(fn ($q) => $q
                    ->where('type', $type)
                    ->where('status', '!=', MitraRegistration::STATUS_REJECTED)),
            ],
            'nib'              => 'required|digits:13',
            'address'          => 'required|string|max:300',
            'province'         => 'required|string|max:100',
            'city'             => 'required|string|max:100',
            'website'          => 'nullable|url|max:150',
            'established_year' => 'nullable|integer|min:1900|max:' . now()->year,
            'pic_name'         => 'required|string|max:100',
            'email'            => 'required|email|max:150',
            'phone'            => ['required', 'regex:/^(\+62|62|0)8[0-9]{7,12}$/'],
        ], [
            'npwp.unique'  => 'NPWP ini sudah terdaftar sebagai ' . $type . ' dan sedang/sudah diproses.',
            'npwp.regex'   => 'Format NPWP tidak valid.',
            'nib.digits'   => 'NIB harus 13 digit angka.',
            'phone.regex'  => 'Nomor WhatsApp tidak valid (contoh: 081234567890).',
        ], [
            'company_name'     => 'nama perusahaan',
            'business_entity'  => 'bentuk badan usaha',
            'address'          => 'alamat kantor',
            'province'         => 'provinsi',
            'city'             => 'kota / kabupaten',
            'established_year' => 'tahun berdiri',
            'pic_name'         => 'nama PIC',
            'phone'            => 'nomor WhatsApp',
        ]);
    }

    private function validateStep2(Request $request): array
    {
        $categories = MitraRegistration::CATEGORIES;

        return $request->validate([
            'main_category'     => ['required', Rule::in(array_keys($categories))],
            'sub_category'      => ['required', Rule::in($categories[$request->main_category] ?? [])],
            'description'       => 'required|string|max:500',
            'products_services' => 'required|string|max:500',
            'service_area'      => ['required', Rule::in(MitraRegistration::SERVICE_AREAS)],
            'supply_capacity'   => 'nullable|string|max:150',
            'main_clients'      => 'nullable|string|max:255',
            'certifications'    => 'nullable|string|max:255',
        ], [], [
            'main_category'     => 'kategori utama',
            'sub_category'      => 'sub kategori',
            'description'       => 'deskripsi perusahaan',
            'products_services' => 'produk / layanan',
            'service_area'      => 'area layanan',
        ]);
    }

    private function handleUploads(Request $request): array
    {
        $existing = session(self::SESSION . '.step3', []);
        $rules    = [];
        $labels   = [];

        foreach (MitraRegistration::DOCUMENTS as $field => $doc) {
            // Wajib hanya jika belum pernah diupload sebelumnya
            $required        = $doc['required'] && empty($existing[$field]);
            $rules[$field]   = [$required ? 'required' : 'nullable', 'file', 'mimes:pdf', 'max:' . ($doc['max_mb'] * 1024)];
            $labels[$field]  = $doc['label'];
        }

        $request->validate($rules, [], $labels);

        foreach (array_keys(MitraRegistration::DOCUMENTS) as $field) {
            if ($request->hasFile($field)) {
                if (! empty($existing[$field])) {
                    Storage::disk('local')->delete($existing[$field]);
                }
                $existing[$field] = $request->file($field)->store('mitra/tmp', 'local');
            }
            $existing[$field] ??= null;
        }

        return $existing;
    }

    private function clearSession(bool $deleteFiles = true): void
    {
        if ($deleteFiles) {
            foreach (array_filter(session(self::SESSION . '.step3', [])) as $path) {
                Storage::disk('local')->delete($path);
            }
        }

        session()->forget(self::SESSION);
    }
}