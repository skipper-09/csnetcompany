<?php

namespace App\Enums\Karir;

enum JenisDokumen: string
{
    case CV           = 'cv';
    case SuratLamaran = 'surat_lamaran';
    case Ijazah       = 'ijazah';
    case Transkrip    = 'transkrip';
    case Sertifikat   = 'sertifikat';
    case Portofolio   = 'portofolio';

    public function label(): string
    {
        return match ($this) {
            self::CV           => 'CV / Curriculum Vitae',
            self::SuratLamaran => 'Surat Lamaran',
            self::Ijazah       => 'Ijazah Terakhir',
            self::Transkrip    => 'Transkrip Nilai',
            self::Sertifikat   => 'Sertifikat',
            self::Portofolio   => 'Portofolio',
        };
    }

    public function wajib(): bool
    {
        return in_array($this, [self::CV, self::SuratLamaran, self::Ijazah, self::Transkrip]);
    }
}