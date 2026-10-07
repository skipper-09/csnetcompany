<?php

namespace App\Models;

use App\Enums\Karir\JenjangPendidikan;
use App\Enums\Karir\StatusLamaran;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lamaran extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'kode', 'lowongan_id', 'posisi_diminati', 'pesan',
        'nama_lengkap', 'email', 'telepon', 'tempat_lahir', 'tanggal_lahir',
        'jenis_kelamin', 'domisili', 'linkedin_url',
        'pendidikan_terakhir', 'nama_institusi', 'jurusan', 'tahun_masuk',
        'tahun_lulus', 'ipk', 'pendidikan_lainnya',
        'punya_pengalaman', 'pengalaman', 'dokumen',
        'status', 'catatan_hr', 'dikirim_at',
    ];

    protected function casts(): array
    {
        return [
            'pendidikan_lainnya'  => 'array',
            'pengalaman'          => 'array',
            'dokumen'             => 'array',
            'pendidikan_terakhir' => JenjangPendidikan::class,
            'status'              => StatusLamaran::class,
            'tanggal_lahir'       => 'date',
            'punya_pengalaman'    => 'boolean',
            'ipk'                 => 'decimal:2',
            'dikirim_at'          => 'datetime',
        ];
    }

    protected static function booted(): void
    {
        static::creating(function (Lamaran $lamaran) {
            $lamaran->kode ??= static::generateKode();
        });
    }

    // Format: LMR-2026-00001
    public static function generateKode(): string
    {
        $tahun  = now()->year;
        $urutan = static::withTrashed()->whereYear('created_at', $tahun)->count() + 1;

        return sprintf('LMR-%d-%05d', $tahun, $urutan);
    }

    public function lowongan(): BelongsTo
    {
        return $this->belongsTo(Lowongan::class);
    }

    public function isSpontan(): bool
    {
        return is_null($this->lowongan_id);
    }

    // Judul posisi untuk ditampilkan (lowongan atau posisi spontan)
    public function getPosisiAttribute(): string
    {
        return $this->lowongan?->judul ?? $this->posisi_diminati ?? 'Lamaran Spontan';
    }
}