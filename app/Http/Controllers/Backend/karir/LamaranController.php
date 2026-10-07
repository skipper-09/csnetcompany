<?php

namespace App\Http\Controllers\Backend\karir;

use App\Enums\Karir\StatusLamaran;
use App\Http\Controllers\Controller;
use App\Http\Requests\Karir\LamaranAdminRequest;
use App\Models\Lamaran;
use App\Models\Lowongan;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;
use App\Enums\Karir\JenjangPendidikan;

class LamaranController extends Controller
{
    // Sesuaikan dengan StoreLamaranRequest (form publik)
    public const JENIS_KELAMIN = ['L' => 'Laki-laki', 'P' => 'Perempuan'];
    public const DOKUMEN = [
        'cv' => 'CV',
        'ktp' => 'KTP',
        'ijazah' => 'Ijazah',
        'transkrip' => 'Transkrip Nilai',
        'foto' => 'Pas Foto',
    ];

    public function index()
    {
        return view('backend.karir.lamaran.index', [
            'sidebar' => 'karir',
            'page_name' => 'Lamaran Masuk',
            'lowongans' => Lowongan::withTrashed()
                ->orderBy('judul')
                ->get(['id', 'judul']),
            'statuses' => StatusLamaran::cases(),
        ]);
    }

    public function getData(Request $request)
    {
        $query = Lamaran::query()
            ->with(['lowongan' => fn($q) => $q->withTrashed()->select('id', 'judul')])
            ->when($request->filled('lowongan_id'), fn($q) => $q->where('lowongan_id', $request->lowongan_id))
            ->when($request->filled('status'), fn($q) => $q->where('status', $request->status))
            ->latest('id');

        return DataTables::eloquent($query)
            ->addIndexColumn()
            ->editColumn(
                'nama_lengkap',
                fn($row) => '<div class="fw-semibold">' .
                    e($row->nama_lengkap) .
                    '</div>
                 <small class="text-muted">' .
                    e($row->email) .
                    '</small>',
            )
            ->addColumn('lowongan', fn($row) => e($row->lowongan?->judul ?? '-'))
            ->editColumn('status', fn($row) => '<span class="badge ' . self::badge($row->status) . '">' . e(Str::headline($row->status?->name)) . '</span>')
            ->editColumn('dikirim_at', fn($row) => $row->dikirim_at ? Carbon::parse($row->dikirim_at)->format('d M Y H:i') : '-')
            ->addColumn(
                'action',
                fn($row) => '
                <div class="d-flex gap-1">
                    <a href="' .
                    route('admin.karir.lamaran.show', $row) .
                    '" class="btn btn-sm btn-info" title="Detail"><i class="bx bx-show"></i></a>
                    <a href="' .
                    route('admin.karir.lamaran.edit', $row) .
                    '" class="btn btn-sm btn-warning" title="Edit"><i class="bx bx-edit"></i></a>
                    <button type="button" class="btn btn-sm btn-danger btn-delete"
                        data-url="' .
                    route('admin.karir.lamaran.destroy', $row) .
                    '"
                        data-name="' .
                    e($row->nama_lengkap) .
                    '" title="Hapus"><i class="bx bx-trash"></i></button>
                </div>',
            )
            ->filterColumn('lowongan', fn($q, $kw) => $q->whereHas('lowongan', fn($q) => $q->where('judul', 'like', "%{$kw}%")))
            ->filterColumn('nama_lengkap', fn($q, $kw) => $q->where(fn($q) => $q->where('nama_lengkap', 'like', "%{$kw}%")->orWhere('email', 'like', "%{$kw}%")))
            ->rawColumns(['nama_lengkap', 'status', 'action'])
            ->make(true);
    }

    public function create()
    {
        return view(
            'backend.karir.lamaran.create',
            $this->formData(
                new Lamaran([
                    'status' => StatusLamaran::Baru,
                ]),
            ),
        );
    }

    public function store(LamaranAdminRequest $request)
    {
        $lamaran = $this->simpan($request, new Lamaran());

        return redirect()->route('admin.karir.lamaran.show', $lamaran)->with('success', 'Lamaran berhasil ditambahkan.');
    }

    public function show(Lamaran $lamaran)
    {
        $lamaran->load(['lowongan' => fn($q) => $q->withTrashed()]);

        return view('backend.karir.lamaran.show', [
            'sidebar' => 'karir',
            'page_name' => 'Lamaran Masuk',
            'lamaran' => $lamaran,
            'statuses' => StatusLamaran::cases(),
            'dokumenLabel' => self::DOKUMEN,
            'jenisKelamin' => self::JENIS_KELAMIN,
        ]);
    }

    public function edit(Lamaran $lamaran)
    {
        return view('backend.karir.lamaran.edit', $this->formData($lamaran));
    }

    public function update(LamaranAdminRequest $request, Lamaran $lamaran)
    {
        $this->simpan($request, $lamaran);

        return redirect()->route('admin.karir.lamaran.show', $lamaran)->with('success', 'Lamaran berhasil diperbarui.');
    }

    public function updateStatus(Request $request, Lamaran $lamaran)
    {
        $request->validate(['status' => ['required', Rule::enum(StatusLamaran::class)]]);

        $lamaran->update(['status' => $request->status]);

        return back()->with('success', 'Status lamaran diperbarui.');
    }

    public function destroy(Request $request, Lamaran $lamaran)
    {
        $softDelete = in_array(SoftDeletes::class, class_uses_recursive($lamaran));

        $lamaran->delete();

        // Hapus file hanya jika data benar-benar dihapus permanen
        if (!$softDelete && $lamaran->kode) {
            Storage::disk('local')->deleteDirectory("lamaran/{$lamaran->kode}");
        }

        if ($request->expectsJson()) {
            return response()->json(['message' => 'Lamaran berhasil dihapus.']);
        }

        return redirect()->route('admin.karir.lamaran.index')->with('success', 'Lamaran berhasil dihapus.');
    }

    public function dokumen(Lamaran $lamaran, string $jenis)
    {
        $path = $lamaran->dokumen[$jenis] ?? null;

        abort_unless($path && Storage::disk('local')->exists($path), 404);

        return Storage::disk('local')->response($path);
    }

    public static function badge($status): string
    {
        $nama = Str::lower($status?->name ?? '');

        return match (true) {
            Str::contains($nama, ['baru']) => 'bg-label-info',
            Str::contains($nama, ['terima', 'lolos']) => 'bg-label-success',
            Str::contains($nama, ['tolak', 'gagal']) => 'bg-label-danger',
            Str::contains($nama, ['interview', 'wawancara']) => 'bg-label-primary',
            default => 'bg-label-warning',
        };
    }

    private function formData(Lamaran $lamaran): array
    {
        return [
            'sidebar' => 'karir',
            'page_name' => 'Lamaran Masuk',
            'lamaran' => $lamaran,
            'lowongans' => Lowongan::orderBy('judul')->get(['id', 'judul']),
            'statuses' => StatusLamaran::cases(),
            'jenisKelamin' => self::JENIS_KELAMIN,
            'pendidikan' => JenjangPendidikan::cases(),
            'dokumenLabel' => self::DOKUMEN,
        ];
    }

    private function simpan(LamaranAdminRequest $request, Lamaran $lamaran): Lamaran
    {
        $data = $request->validated();
        $punya = (bool) $data['punya_pengalaman'];

        return DB::transaction(function () use ($request, $data, $punya, $lamaran) {
            $lamaran->fill([
                'lowongan_id' => $data['lowongan_id'],
                'status' => $data['status'],
                'nama_lengkap' => $data['nama_lengkap'],
                'email' => strtolower($data['email']),
                'telepon' => $this->normalisasiTelepon($data['telepon']),
                'tempat_lahir' => $data['tempat_lahir'],
                'tanggal_lahir' => $data['tanggal_lahir'],
                'jenis_kelamin' => $data['jenis_kelamin'],
                'domisili' => $data['domisili'],
                'linkedin_url' => $data['linkedin_url'] ?? null,
                'pendidikan_terakhir' => $data['pendidikan_terakhir'],
                'nama_institusi' => $data['nama_institusi'],
                'jurusan' => $data['jurusan'],
                'tahun_masuk' => $data['tahun_masuk'] ?? null,
                'tahun_lulus' => $data['tahun_lulus'] ?? null,
                'ipk' => $data['ipk'] ?? null,
                'punya_pengalaman' => $punya,
                'pengalaman' => $punya
                    ? (collect($data['pengalaman'] ?? [])
                        ->map(
                            fn($p) => [
                                'nama_perusahaan' => $p['nama_perusahaan'],
                                'posisi' => $p['posisi'],
                                'mulai' => $p['mulai'],
                                'selesai' => !empty($p['masih_bekerja']) ? null : $p['selesai'] ?? null,
                                'deskripsi' => $p['deskripsi'] ?? null,
                            ],
                        )
                        ->values()
                        ->all() ?:
                    null)
                    : null,
            ]);

            if (!$lamaran->exists) {
                $lamaran->dikirim_at = now();
            }

            $lamaran->save();

            // Dokumen: file baru menggantikan file lama dengan jenis yang sama
            $paths = $lamaran->dokumen ?? [];

            foreach ($request->file('dokumen', []) as $jenis => $file) {
                if (!empty($paths[$jenis])) {
                    Storage::disk('local')->delete($paths[$jenis]);
                }

                $paths[$jenis] = $file->storeAs("lamaran/{$lamaran->kode}", $jenis . '.' . $file->getClientOriginalExtension(), 'local');
            }

            if ($request->hasFile('dokumen')) {
                $lamaran->update(['dokumen' => $paths]);
            }

            return $lamaran;
        });
    }

    private function normalisasiTelepon(string $telepon): string
    {
        $angka = preg_replace('/\D/', '', $telepon);

        if (str_starts_with($angka, '62')) {
            $angka = substr($angka, 2);
        }

        return '+62' . ltrim($angka, '0');
    }
}
