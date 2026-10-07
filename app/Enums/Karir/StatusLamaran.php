<?php

namespace App\Enums\Karir;

enum StatusLamaran: string
{
    case Baru       = 'baru';
    case Direview   = 'direview';
    case Interview  = 'interview';
    case Diterima   = 'diterima';
    case Ditolak    = 'ditolak';

    public function label(): string
    {
        return match ($this) {
            self::Baru      => 'Baru',
            self::Direview  => 'Sedang Direview',
            self::Interview => 'Tahap Interview',
            self::Diterima  => 'Diterima',
            self::Ditolak   => 'Ditolak',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::Baru      => 'blue',
            self::Direview  => 'yellow',
            self::Interview => 'purple',
            self::Diterima  => 'green',
            self::Ditolak   => 'red',
        };
    }
}