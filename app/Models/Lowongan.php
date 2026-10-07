<?php

namespace App\Models;

use App\Enums\Karir\StatusLowongan;
use App\Enums\Karir\TipeKerja;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Lowongan extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'judul', 'slug', 'departemen', 'lokasi', 'tipe_kerja', 'icon',
        'ringkasan', 'deskripsi', 'tanggung_jawab', 'kualifikasi', 'benefit',
        'status', 'published_at', 'ditutup_at',
    ];

    protected function casts(): array
    {
        return [
            'tanggung_jawab' => 'array',
            'kualifikasi'    => 'array',
            'benefit'        => 'array',
            'tipe_kerja'     => TipeKerja::class,
            'status'         => StatusLowongan::class,
            'published_at'   => 'datetime',
            'ditutup_at'     => 'date',
        ];
    }

    protected static function booted(): void
    {
        static::creating(function (Lowongan $lowongan) {
            $lowongan->slug ??= Str::slug($lowongan->judul) . '-' . Str::lower(Str::random(5));
        });
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function lamarans(): HasMany
    {
        return $this->hasMany(Lamaran::class);
    }

    public function scopeAktif(Builder $query): Builder
    {
        return $query->where('status', StatusLowongan::Aktif)
            ->whereNotNull('published_at')
            ->where(fn ($q) => $q->whereNull('ditutup_at')->orWhere('ditutup_at', '>=', today()));
    }

    public function scopeFilter(Builder $query, array $filter): Builder
    {
        return $query
            ->when($filter['cari'] ?? null, fn ($q, $cari) => $q->where(fn ($q) => $q
                ->where('judul', 'like', "%{$cari}%")
                ->orWhere('lokasi', 'like', "%{$cari}%")
                ->orWhere('departemen', 'like', "%{$cari}%")))
            ->when($filter['departemen'] ?? null, fn ($q, $v) => $q->where('departemen', $v))
            ->when($filter['lokasi'] ?? null, fn ($q, $v) => $q->where('lokasi', $v))
            ->when($filter['tipe_kerja'] ?? null, fn ($q, $v) => $q->where('tipe_kerja', $v));
    }
}