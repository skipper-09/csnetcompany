<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PreRegisterRequest extends FormRequest
{
    /** Pilihan rentang jam pemasangan. */
    public const SLOT_JAM = [
        '00:00 - 02:00',
        '02:00 - 04:00',
        '04:00 - 06:00',
        '06:00 - 08:00',
        '08:00 - 10:00',
        '10:00 - 12:00',
        '12:00 - 14:00',
        '14:00 - 16:00',
        '16:00 - 18:00',
        '18:00 - 20:00',
        '20:00 - 22:00',
        '22:00 - 00:00',
    ];

    public function authorize(): bool
    {
        return true;
    }

    /** Catat setiap pengajuan yang masuk, sebelum divalidasi. */
    protected function prepareForValidation(): void
    {
        // ID ini ikut di semua log request yang sama, supaya alurnya bisa dilacak.
        Log::withContext(['pengajuan_id' => Str::random(8)]);

        // Data pribadi (nama, NIK, nomor HP, alamat, foto) sengaja tidak dicatat.
        Log::info('PreRegister: pengajuan diterima', [
            'ip' => $this->ip(),
            'perangkat' => $this->userAgent(),
            'ukuran_kb' => (int) ceil((int) $this->server('CONTENT_LENGTH') / 1024),
            'paket' => $this->input('paket'),
            'kode_marketing' => $this->input('kode_marketing'),
        ]);
    }

    protected function failedValidation(Validator $validator): void
    {
        // Hanya nama field & pesannya, bukan nilai yang diisi.
        Log::warning('PreRegister: validasi gagal', ['errors' => $validator->errors()->toArray()]);

        parent::failedValidation($validator);
    }

    public function rules(): array
    {
        $foto = ['required', 'file', 'mimes:jpg,jpeg,png', 'max:5120'];

        return [
            'nama_lengkap' => ['required', 'string', 'max:255'],
            'nik' => ['required', 'digits:16'],
            'jenis_kelamin' => ['required', Rule::in(['Laki-laki', 'Perempuan'])],
            'tanggal_lahir' => ['required', 'date', 'before:today'],
            'whatsapp' => ['required', 'regex:/^[0-9]{9,13}$/'],
            'email' => ['nullable', 'email', 'max:255'],
            'ktp' => $foto,
            'foto_rumah' => $foto,

            'alamat_lengkap' => ['required', 'string', 'max:1000'],
            'rt' => ['required', 'string', 'max:5'],
            'rw' => ['required', 'string', 'max:5'],
            'kode_pos' => ['nullable', 'string', 'max:10'],
            'provinsi' => ['required', 'string'],
            'kota' => ['required', 'string'],
            'kecamatan' => ['required', 'string'],
            'kelurahan' => ['required', 'string'],
            'latitude' => ['nullable', 'numeric', 'between:-90,90'],
            'longitude' => ['nullable', 'numeric', 'between:-180,180'],
            'odp_name' => ['nullable', 'string', 'max:255'],
            'odp_distance' => ['nullable', 'string', 'max:50'],
            'tanggal_pemasangan' => ['nullable', 'date', 'after_or_equal:today'],
            'jam_pemasangan' => ['nullable', Rule::in(self::SLOT_JAM)],
            'catatan_lokasi' => ['nullable', 'string', 'max:500'],
            'kode_marketing' => ['nullable', 'string', 'max:20'],

            'paket' => ['required', 'string'],
            'terms' => ['accepted'],
        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute wajib diisi.',
            'digits' => ':attribute harus :digits digit angka.',
            'email' => 'Format :attribute tidak valid.',
            'date' => ':attribute bukan tanggal yang valid.',
            'numeric' => ':attribute harus berupa angka.',
            'between' => ':attribute di luar rentang yang diizinkan.',
            'in' => ':attribute tidak valid.',
            'mimes' => ':attribute harus berformat JPG, JPEG, atau PNG.',
            'max.file' => 'Ukuran :attribute maksimal 5 MB.',
            'max.string' => ':attribute maksimal :max karakter.',
            'uploaded' => ':attribute gagal diunggah. Maksimal 5 MB.',
            'whatsapp.regex' => 'Nomor WhatsApp harus 9–13 digit angka.',
            'tanggal_lahir.before' => 'Tanggal lahir harus sebelum hari ini.',
            'tanggal_pemasangan.after_or_equal' => 'Tanggal pemasangan tidak boleh sebelum hari ini.',
            'paket.required' => 'Silakan pilih paket layanan.',
            'terms.accepted' => 'Harap setujui Syarat & Ketentuan berlangganan.',
        ];
    }

    public function attributes(): array
    {
        return [
            'nama_lengkap' => 'Nama lengkap',
            'nik' => 'NIK',
            'jenis_kelamin' => 'Jenis kelamin',
            'tanggal_lahir' => 'Tanggal lahir',
            'whatsapp' => 'Nomor WhatsApp',
            'email' => 'Email',
            'ktp' => 'Foto e-KTP',
            'foto_rumah' => 'Foto rumah',
            'alamat_lengkap' => 'Alamat lengkap',
            'rt' => 'RT',
            'rw' => 'RW',
            'kode_pos' => 'Kode pos',
            'provinsi' => 'Provinsi',
            'kota' => 'Kabupaten/Kota',
            'kecamatan' => 'Kecamatan',
            'kelurahan' => 'Kelurahan/Desa',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'tanggal_pemasangan' => 'Tanggal pemasangan',
            'jam_pemasangan' => 'Jam pemasangan',
            'catatan_lokasi' => 'Catatan lokasi',
            'kode_marketing' => 'Kode marketing',
        ];
    }
}
