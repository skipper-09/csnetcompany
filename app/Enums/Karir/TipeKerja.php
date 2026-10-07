<?php

namespace App\Enums\Karir;

enum TipeKerja: string
{
    case FullTime   = 'full_time';
    case PartTime   = 'part_time';
    case Kontrak    = 'kontrak';
    case Magang     = 'magang';
    case Freelance  = 'freelance';

    public function label(): string
    {
        return match ($this) {
            self::FullTime  => 'Full Time',
            self::PartTime  => 'Part Time',
            self::Kontrak   => 'Kontrak',
            self::Magang    => 'Magang',
            self::Freelance => 'Freelance',
        };
    }
}