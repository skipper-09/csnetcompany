<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class MitraRegistration extends Model
{
    public const TYPES = ['supplier', 'vendor'];

    public const STATUS_VERIFYING = 'verifikasi';
    public const STATUS_EVALUATING = 'evaluasi';
    public const STATUS_APPROVED = 'disetujui';
    public const STATUS_REJECTED = 'ditolak';

    public const STATUSES = [
        self::STATUS_VERIFYING => 'Verifikasi Dokumen',
        self::STATUS_EVALUATING => 'Evaluasi Tim Purchasing',
        self::STATUS_APPROVED => 'Disetujui',
        self::STATUS_REJECTED => 'Ditolak',
    ];

    public const BUSINESS_ENTITIES = [
        'PT' => 'PT (Perseroan Terbatas)',
        'CV' => 'CV (Persekutuan Komanditer)',
        'UD' => 'UD (Usaha Dagang)',
        'Koperasi' => 'Koperasi',
        'Firma' => 'Firma',
        'Perorangan' => 'Perorangan',
    ];

    public const CATEGORIES = [
        'Perangkat Network' => ['Switch', 'Router', 'OLT / ONT', 'Access Point', 'Server'],
        'Fiber Optik & Aksesoris' => ['Kabel FO', 'Patch Cord', 'Splitter', 'ODP / ODC', 'Closure'],
        'OLT / ONT' => ['OLT', 'ONT / ONU', 'Modul SFP'],
        'Kabel & Material Infrastruktur' => ['Tiang', 'Kabel Power', 'Material Pendukung'],
        'Konstruksi FTTH' => ['Penarikan Kabel', 'Pemasangan Tiang', 'Galian'],
        'Splicing & Instalasi' => ['Splicing', 'Instalasi Pelanggan', 'Terminasi'],
        'IT & Software' => ['Software', 'Lisensi', 'Jasa Pengembangan'],
        'Transportasi & Logistik' => ['Ekspedisi', 'Rental Kendaraan'],
        'Barang Operasional' => ['ATK', 'Peralatan Kerja', 'APD'],
        'Jasa Maintenance & Lainnya' => ['Maintenance Jaringan', 'Jasa Lainnya'],
    ];

    public const SERVICE_AREAS = ['Seluruh Indonesia', 'Jawa', 'Sumatera', 'Kalimantan', 'Sulawesi', 'Bali & Nusa Tenggara', 'Papua & Maluku'];

    public const DOCUMENTS = [
        'doc_akta' => ['label' => 'Akta Pendirian Perusahaan', 'required' => true, 'max_mb' => 5],
        'doc_npwp' => ['label' => 'NPWP Perusahaan', 'required' => true, 'max_mb' => 5],
        'doc_nib' => ['label' => 'NIB (Nomor Induk Berusaha)', 'required' => true, 'max_mb' => 5],
        'doc_company_profile' => ['label' => 'Company Profile', 'required' => false, 'max_mb' => 10],
        'doc_certificate' => ['label' => 'Sertifikat / Izin Usaha', 'required' => false, 'max_mb' => 5],
        'doc_reference' => ['label' => 'Referensi Proyek / Klien', 'required' => false, 'max_mb' => 10],
    ];

    protected $fillable = ['registration_number', 'type', 'company_name', 'business_entity', 'npwp', 'nib', 'address', 'province', 'city', 'website', 'established_year', 'pic_name', 'email', 'phone', 'main_category', 'sub_category', 'description', 'products_services', 'service_area', 'supply_capacity', 'main_clients', 'certifications', 'doc_akta', 'doc_npwp', 'doc_nib', 'doc_company_profile', 'doc_certificate', 'doc_reference', 'status', 'admin_notes', 'verified_at', 'evaluated_at', 'decided_at', 'user_id'];

    protected $casts = [
        'verified_at' => 'datetime',
        'evaluated_at' => 'datetime',
        'decided_at' => 'datetime',
    ];

    protected static function booted(): void
    {
        static::creating(function (self $model) {
            $model->registration_number ??= static::generateNumber();
            $model->status ??= self::STATUS_VERIFYING;
        });
    }

    public static function generateNumber(): string
    {
        do {
            $number = 'MTR-' . now()->format('ymd') . '-' . strtoupper(Str::random(5));
        } while (static::where('registration_number', $number)->exists());

        return $number;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getStatusLabelAttribute(): string
    {
        return self::STATUSES[$this->status] ?? $this->status;
    }

    public function getTypeLabelAttribute(): string
    {
        return ucfirst($this->type);
    }

    /** Data timeline untuk halaman Status Pendaftaran */
    public function timeline(): array
    {
        $current = match ($this->status) {
            self::STATUS_VERIFYING => 1,
            self::STATUS_EVALUATING => 2,
            default => 4, // disetujui / ditolak = semua selesai
        };

        $steps = [['label' => 'Pendaftaran Diterima', 'date' => $this->created_at], ['label' => 'Verifikasi Dokumen', 'date' => $this->verified_at], ['label' => 'Evaluasi Tim Purchasing', 'date' => $this->evaluated_at], ['label' => $this->status === self::STATUS_REJECTED ? 'Ditolak' : 'Keputusan', 'date' => $this->decided_at]];

        foreach ($steps as $i => &$step) {
            $step['state'] = $i < $current ? 'done' : ($i === $current ? 'current' : 'pending');
        }

        return $steps;
    }

    // ===== Aksi admin =====

    public function moveToEvaluation(): void
    {
        $this->update(['status' => self::STATUS_EVALUATING, 'verified_at' => now()]);
    }

    public function approve(?string $notes = null): void
    {
        $this->update(['status' => self::STATUS_APPROVED, 'decided_at' => now(), 'evaluated_at' => $this->evaluated_at ?? now(), 'admin_notes' => $notes]);
    }

    public function reject(string $notes): void
    {
        $this->update(['status' => self::STATUS_REJECTED, 'decided_at' => now(), 'admin_notes' => $notes]);
    }

    // Filter untuk admin (dipakai index & export)
    public function scopeFilter($query, array $f)
    {
        return $query
            ->when(
                $f['q'] ?? null,
                fn($q, $s) => $q->where(
                    fn($w) => $w
                        ->where('registration_number', 'like', "%{$s}%")
                        ->orWhere('company_name', 'like', "%{$s}%")
                        ->orWhere('npwp', 'like', "%{$s}%")
                        ->orWhere('email', 'like', "%{$s}%"),
                ),
            )
            ->when($f['type'] ?? null, fn($q, $v) => $q->where('type', $v))
            ->when($f['status'] ?? null, fn($q, $v) => $q->where('status', $v))
            ->when($f['from'] ?? null, fn($q, $v) => $q->whereDate('created_at', '>=', $v))
            ->when($f['to'] ?? null, fn($q, $v) => $q->whereDate('created_at', '<=', $v));
    }

    // Aksi yang boleh dilakukan admin sesuai status saat ini
    public function availableActions(): array
    {
        return match ($this->status) {
            self::STATUS_VERIFYING => [
                self::STATUS_EVALUATING => 'Dokumen Valid, Lanjut Evaluasi',
                self::STATUS_REJECTED => 'Tolak',
            ],
            self::STATUS_EVALUATING => [
                self::STATUS_APPROVED => 'Setujui',
                self::STATUS_REJECTED => 'Tolak',
            ],
            default => [],
        };
    }

    public function getStatusColorAttribute(): string
    {
        return match ($this->status) {
            self::STATUS_VERIFYING => 'warning',
            self::STATUS_EVALUATING => 'info',
            self::STATUS_APPROVED => 'success',
            self::STATUS_REJECTED => 'danger',
            default => 'secondary',
        };
    }
}
