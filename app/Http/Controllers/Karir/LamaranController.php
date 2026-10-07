<?php

namespace App\Http\Controllers\Karir;

use App\Enums\Karir\StatusLamaran;
use App\Http\Controllers\Controller;
use App\Http\Requests\Karir\StoreLamaranRequest;
use App\Models\Lamaran;
use App\Models\Lowongan;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class LamaranController extends Controller
{
    public function store(StoreLamaranRequest $request): JsonResponse
    {
        $data     = $request->validated();
        $lowongan = Lowongan::findOrFail($request->lowonganId());
        $punya    = $data['punya_pengalaman'] === '1';

        $lamaran = DB::transaction(function () use ($request, $data, $lowongan, $punya) {
            $lamaran = Lamaran::create([
                'lowongan_id'         => $lowongan->id,
                'nama_lengkap'        => $data['nama_lengkap'],
                'email'               => strtolower($data['email']),
                'telepon'             => '+62' . ltrim(preg_replace('/\D/', '', $data['telepon']), '0'),
                'tempat_lahir'        => $data['tempat_lahir'],
                'tanggal_lahir'       => $data['tanggal_lahir'],
                'jenis_kelamin'       => $data['jenis_kelamin'],
                'domisili'            => $data['domisili'],
                'linkedin_url'        => $data['linkedin_url'] ?? null,
                'pendidikan_terakhir' => $data['pendidikan_terakhir'],
                'nama_institusi'      => $data['nama_institusi'],
                'jurusan'             => $data['jurusan'],
                'tahun_masuk'         => $data['tahun_masuk'] ?? null,
                'tahun_lulus'         => $data['tahun_lulus'] ?? null,
                'ipk'                 => $data['ipk'] ?? null,
                'pendidikan_lainnya'  => array_values($data['pendidikan_lainnya'] ?? []) ?: null,
                'punya_pengalaman'    => $punya,
                'pengalaman'          => $punya
                    ? collect($data['pengalaman'])->values()->map(fn ($p) => [
                        'nama_perusahaan' => $p['nama_perusahaan'],
                        'posisi'          => $p['posisi'],
                        'mulai'           => $p['mulai'],
                        'selesai'         => ! empty($p['masih_bekerja']) ? null : ($p['selesai'] ?? null),
                        'deskripsi'       => $p['deskripsi'] ?? null,
                    ])->all()
                    : null,
                'status'              => StatusLamaran::Baru,
                'dikirim_at'          => now(),
            ]);

            $paths = [];
            foreach ($request->file('dokumen', []) as $jenis => $file) {
                $nama = $jenis . '.' . $file->getClientOriginalExtension();
                $paths[$jenis] = $file->storeAs("lamaran/{$lamaran->kode}", $nama, 'local');
            }

            $lamaran->update(['dokumen' => $paths]);

            return $lamaran;
        });

        return response()->json([
            'kode'   => $lamaran->kode,
            'posisi' => $lowongan->judul,
        ]);
    }
}