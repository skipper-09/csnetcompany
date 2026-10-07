<?php

namespace App\Enums\Karir;

enum StatusLowongan: string
{
    case Draft   = 'draft';
    case Aktif   = 'aktif';
    case Ditutup = 'ditutup';

    public function label(): string
    {
        return match ($this) {
            self::Draft   => 'Draft',
            self::Aktif   => 'Aktif',
            self::Ditutup => 'Ditutup',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::Draft   => 'gray',
            self::Aktif   => 'green',
            self::Ditutup => 'red',
        };
    }
}