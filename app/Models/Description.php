<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
    use HasFactory;
    protected $table = 'description_packets';
    protected $fillable = [
        'name', 'logo', 'packet_id'
    ];
    protected $primaryKey = 'id';

    
    public function Paket()
    {
        return $this->hasOne(packet::class, 'packet_id', 'id');
    }
}
