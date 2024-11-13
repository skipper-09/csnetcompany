<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SPK extends Model
{
    use HasFactory;

    protected $table = 'spks';

    protected $fillable = [
        'date',
        'date_install',
        'technician_name',
        'technician_position',
        'client_name',
        'client_nik',
        'client_address',
        'client_whatsapp',
        'package',
        'modem_serial',
        'cable_details',
        'stb_status',
        'stb_mac_address',
        'pdf_path'
    ];

    protected $casts = [
        'date' => 'date',
        'date_install' => 'date',
    ];
}