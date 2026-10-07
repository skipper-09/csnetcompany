<?php

namespace App\Enums\Karir;

enum JenjangPendidikan: string
{
    case SMA = 'sma';
    case SMK = 'smk';
    case D3  = 'd3';
    case D4  = 'd4';
    case S1  = 's1';
    case S2  = 's2';
    case S3  = 's3';

    public function label(): string
    {
        return match ($this) {
            self::SMA => 'SMA / Sederajat',
            self::SMK => 'SMK',
            self::D3  => 'D3',
            self::D4  => 'D4',
            self::S1  => 'S1',
            self::S2  => 'S2',
            self::S3  => 'S3',
        };
    }
}