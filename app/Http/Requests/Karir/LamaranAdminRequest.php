<?php

namespace App\Http\Requests\Karir;

use App\Enums\Karir\StatusLamaran;
use App\Http\Controllers\Backend\karir\LamaranController;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Enums\Karir\JenjangPendidikan;

class LamaranAdminRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        // Buang baris pengalaman yang nama perusahaannya kosong
        $pengalaman = collect((array) $this->input('pengalaman', []))->filter(fn($p) => is_array($p) && trim((string) ($p['nama_perusahaan'] ?? '')) !== '')->values()->all();

        $this->merge([
            'pengalaman' => $pengalaman,
            'punya_pengalaman' => $this->input('punya_pengalaman') === '1',
        ]);
    }

    public function rules(): array
    {
        return [
            'lowongan_id' => ['required', 'exists:lowongans,id'],
            'status' => ['required', Rule::enum(StatusLamaran::class)],

            'nama_lengkap' => ['required', 'string', 'max:150'],
            'email' => ['required', 'email', 'max:150'],
            'telepon' => ['required', 'string', 'max:20'],
            'tempat_lahir' => ['required', 'string', 'max:100'],
            'tanggal_lahir' => ['required', 'date'],
            'jenis_kelamin' => ['required', Rule::in(array_keys(LamaranController::JENIS_KELAMIN))],
            'domisili' => ['required', 'string', 'max:150'],
            'linkedin_url' => ['nullable', 'url', 'max:255'],

            'pendidikan_terakhir' => ['required', Rule::enum(JenjangPendidikan::class)],
            'nama_institusi' => ['required', 'string', 'max:150'],
            'jurusan' => ['required', 'string', 'max:150'],
            'tahun_masuk' => ['nullable', 'digits:4'],
            'tahun_lulus' => ['nullable', 'digits:4'],
            'ipk' => ['nullable', 'numeric', 'between:0,4'],

            'punya_pengalaman' => ['boolean'],
            'pengalaman' => ['nullable', 'array'],
            'pengalaman.*.nama_perusahaan' => ['required', 'string', 'max:150'],
            'pengalaman.*.posisi' => ['required', 'string', 'max:150'],
            'pengalaman.*.mulai' => ['required', 'string', 'max:20'],
            'pengalaman.*.selesai' => ['nullable', 'string', 'max:20'],
            'pengalaman.*.masih_bekerja' => ['nullable'],
            'pengalaman.*.deskripsi' => ['nullable', 'string', 'max:1000'],

            'dokumen' => ['nullable', 'array'],
            'dokumen.*' => ['file', 'mimes:pdf,jpg,jpeg,png', 'max:5120'],
        ];
    }

    public function attributes(): array
    {
        return [
            'lowongan_id' => 'lowongan',
            'nama_lengkap' => 'nama lengkap',
            'tanggal_lahir' => 'tanggal lahir',
            'jenis_kelamin' => 'jenis kelamin',
            'pendidikan_terakhir' => 'pendidikan terakhir',
            'nama_institusi' => 'nama institusi',
            'pengalaman.*.nama_perusahaan' => 'nama perusahaan',
            'pengalaman.*.posisi' => 'posisi',
            'pengalaman.*.mulai' => 'tanggal mulai',
            'dokumen.*' => 'dokumen',
        ];
    }
}
