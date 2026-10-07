<?php

namespace App\Http\Requests\Karir;

use App\Enums\Karir\StatusLowongan;
use App\Enums\Karir\TipeKerja;
use App\Models\Lowongan;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class LowonganRequest extends FormRequest
{
    public const LIST_FIELDS = ['tanggung_jawab', 'kualifikasi'];

    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $data = [];

        // List teks biasa: buang baris kosong
        foreach (self::LIST_FIELDS as $field) {
            $data[$field] = collect((array) $this->input($field, []))
                ->map(fn ($v) => trim((string) $v))
                ->filter()
                ->values()
                ->all();
        }

        // Benefit: [{icon, nama}], icon kosong ditebak otomatis
        $data['benefit'] = collect((array) $this->input('benefit', []))
            ->map(fn ($b) => is_array($b)
                ? ['icon' => trim((string) ($b['icon'] ?? '')), 'nama' => trim((string) ($b['nama'] ?? ''))]
                : ['icon' => '', 'nama' => trim((string) $b)])
            ->filter(fn ($b) => $b['nama'] !== '')
            ->map(fn ($b) => [
                'icon' => $b['icon'] ?: self::tebakIcon($b['nama']),
                'nama' => $b['nama'],
            ])
            ->values()
            ->all();

        if ($this->filled('slug')) {
            $data['slug'] = Str::slug($this->input('slug'));
        }

        $this->merge($data);
    }

    public function rules(): array
    {
        return [
            'judul'        => ['required', 'string', 'max:150'],
            'slug'         => ['nullable', 'alpha_dash', 'max:180',
                               Rule::unique(Lowongan::class, 'slug')->ignore($this->route('lowongan'))],
            'departemen'   => ['required', 'string', 'max:100'],
            'lokasi'       => ['required', 'string', 'max:100'],
            'tipe_kerja'   => ['required', Rule::enum(TipeKerja::class)],
            'icon'         => ['nullable', 'string', 'max:50'],
            'ringkasan'    => ['required', 'string', 'max:255'],
            'deskripsi'    => ['nullable', 'string'],

            'tanggung_jawab'   => ['nullable', 'array'],
            'tanggung_jawab.*' => ['string', 'max:255'],
            'kualifikasi'      => ['nullable', 'array'],
            'kualifikasi.*'    => ['string', 'max:255'],

            'benefit'        => ['nullable', 'array'],
            'benefit.*.nama' => ['required', 'string', 'max:150'],
            'benefit.*.icon' => ['nullable', 'string', 'max:50'],

            'status'       => ['required', Rule::enum(StatusLowongan::class)],
            'published_at' => ['nullable', 'date'],
            'ditutup_at'   => ['nullable', 'date'],
        ];
    }

    public function attributes(): array
    {
        return [
            'tipe_kerja'       => 'tipe kerja',
            'tanggung_jawab.*' => 'tanggung jawab',
            'kualifikasi.*'    => 'kualifikasi',
            'benefit.*.nama'   => 'nama benefit',
            'benefit.*.icon'   => 'icon benefit',
            'published_at'     => 'tanggal publish',
            'ditutup_at'       => 'tanggal ditutup',
        ];
    }

    private static function tebakIcon(string $nama): string
    {
        $nama = Str::lower($nama);

        return match (true) {
            Str::contains($nama, ['gaji', 'bonus', 'tunjangan', 'thr', 'insentif']) => 'wallet',
            Str::contains($nama, ['bpjs', 'asuransi', 'kesehatan'])                  => 'shield',
            Str::contains($nama, ['pelatihan', 'sertifikasi', 'training'])          => 'award',
            Str::contains($nama, ['karir', 'jenjang', 'promosi'])                    => 'chart',
            Str::contains($nama, ['tim', 'team', 'lingkungan', 'keluarga'])          => 'users',
            default                                                                  => 'award',
        };
    }
}