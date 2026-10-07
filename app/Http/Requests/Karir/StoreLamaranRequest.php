<?php

namespace App\Http\Requests\Karir;

use App\Enums\Karir\JenisDokumen;
use App\Enums\Karir\JenjangPendidikan;
use App\Models\Lowongan;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreLamaranRequest extends FormRequest
{
    private bool $lowonganLoaded = false;
    private ?int $lowonganId = null;

    public function authorize(): bool
    {
        return true;
    }

    public function lowonganId(): ?int
    {
        if (! $this->lowonganLoaded) {
            $this->lowonganId = Lowongan::aktif()->where('slug', $this->input('lowongan_slug'))->value('id');
            $this->lowonganLoaded = true;
        }

        return $this->lowonganId;
    }

    public function rules(): array
    {
        $lowonganId = $this->lowonganId();

        $rules = [
            'lowongan_slug' => ['required', function ($attr, $value, $fail) use ($lowonganId) {
                if (! $lowonganId) {
                    $fail('Lowongan tidak ditemukan atau sudah ditutup.');
                }
            }],

            // Step 1
            'nama_lengkap'  => 'required|string|max:255',
            'email'         => [
                'required', 'email:rfc', 'max:255',
                Rule::unique('lamarans', 'email')->where(fn ($q) => $q
                    ->where('lowongan_id', $lowonganId)
                    ->whereNull('deleted_at')),
            ],
            'telepon'       => ['required', 'regex:/^0?8[0-9\s\-]{7,13}$/'],
            'tempat_lahir'  => 'required|string|max:100',
            'tanggal_lahir' => 'required|date|before:today',
            'jenis_kelamin' => 'required|in:L,P',
            'domisili'      => ['required', Rule::in(config('karir.domisili'))],
            'linkedin_url'  => 'nullable|url|max:255',

            // Step 2
            'pendidikan_terakhir' => ['required', Rule::enum(JenjangPendidikan::class)],
            'nama_institusi'      => 'required|string|max:255',
            'jurusan'             => 'required|string|max:255',
            'tahun_masuk'         => 'nullable|digits:4',
            'tahun_lulus'         => array_filter(['nullable', 'digits:4', $this->filled('tahun_masuk') ? 'gte:tahun_masuk' : null]),
            'ipk'                 => 'nullable|numeric|between:0,4',
            'pendidikan_lainnya'                  => 'nullable|array',
            'pendidikan_lainnya.*.jenjang'        => ['required', Rule::enum(JenjangPendidikan::class)],
            'pendidikan_lainnya.*.nama_institusi' => 'required|string|max:255',
            'pendidikan_lainnya.*.jurusan'        => 'nullable|string|max:255',
            'pendidikan_lainnya.*.tahun_lulus'    => 'nullable|digits:4',

            // Step 3
            'punya_pengalaman'             => 'required|in:0,1',
            'pengalaman'                   => 'required_if:punya_pengalaman,1|array',
            'pengalaman.*.nama_perusahaan' => 'required|string|max:255',
            'pengalaman.*.posisi'          => 'required|string|max:255',
            'pengalaman.*.mulai'           => 'required|date_format:Y-m',
            'pengalaman.*.selesai'         => 'nullable|required_without:pengalaman.*.masih_bekerja|date_format:Y-m',
            'pengalaman.*.masih_bekerja'   => 'nullable|in:1',
            'pengalaman.*.deskripsi'       => 'nullable|string|max:500',

            // Step 5
            'pernyataan' => 'accepted',
        ];

        // Step 4 - dokumen dari enum
        foreach (JenisDokumen::cases() as $jenis) {
            $rules["dokumen.{$jenis->value}"] = [
                $jenis->wajib() ? 'required' : 'nullable', 'file', 'mimes:pdf,doc,docx', 'max:5120',
            ];
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'required'                => ':attribute wajib diisi.',
            'required_if'             => ':attribute wajib diisi.',
            'required_without'        => ':attribute wajib diisi.',
            'email'                   => 'Format email tidak valid.',
            'email.unique'            => 'Email ini sudah pernah melamar posisi ini.',
            'url'                     => 'Format URL tidak valid.',
            'max'                     => ':attribute maksimal :max karakter.',
            'digits'                  => ':attribute harus :digits digit.',
            'in'                      => ':attribute tidak valid.',
            'enum'                    => ':attribute tidak valid.',
            'date_format'             => 'Format :attribute tidak valid.',
            'gte'                     => ':attribute tidak boleh lebih kecil dari tahun masuk.',
            'telepon.regex'           => 'Nomor telepon tidak valid. Contoh: 812 3456 7890',
            'tanggal_lahir.before'    => 'Tanggal lahir tidak valid.',
            'ipk.between'             => 'IPK harus di antara 0 - 4.',
            'dokumen.*.required'      => ':attribute wajib diunggah.',
            'dokumen.*.max'           => 'Ukuran file maksimal 5 MB.',
            'dokumen.*.mimes'         => 'Format file harus PDF, DOC, atau DOCX.',
            'pernyataan.accepted'     => 'Anda harus menyetujui pernyataan ini.',
        ];
    }

    public function attributes(): array
    {
        $dokumen = collect(JenisDokumen::cases())
            ->mapWithKeys(fn (JenisDokumen $j) => ["dokumen.{$j->value}" => $j->label()])
            ->all();

        return array_merge([
            'nama_lengkap'                        => 'Nama lengkap',
            'telepon'                             => 'No. telepon',
            'tempat_lahir'                        => 'Tempat lahir',
            'tanggal_lahir'                       => 'Tanggal lahir',
            'jenis_kelamin'                       => 'Jenis kelamin',
            'linkedin_url'                        => 'LinkedIn',
            'pendidikan_terakhir'                 => 'Pendidikan terakhir',
            'nama_institusi'                      => 'Nama institusi',
            'tahun_masuk'                         => 'Tahun masuk',
            'tahun_lulus'                         => 'Tahun lulus',
            'ipk'                                 => 'IPK',
            'pendidikan_lainnya.*.jenjang'        => 'Jenjang',
            'pendidikan_lainnya.*.nama_institusi' => 'Nama institusi',
            'pendidikan_lainnya.*.tahun_lulus'    => 'Tahun lulus',
            'pengalaman'                          => 'Pengalaman kerja',
            'pengalaman.*.nama_perusahaan'        => 'Nama perusahaan',
            'pengalaman.*.posisi'                 => 'Posisi',
            'pengalaman.*.mulai'                  => 'Periode mulai',
            'pengalaman.*.selesai'                => 'Periode selesai',
            'pengalaman.*.deskripsi'              => 'Deskripsi',
        ], $dokumen);
    }
}