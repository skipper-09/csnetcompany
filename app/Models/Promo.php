<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'logo','is_active','slug','deskripsi'
    ];
    protected $primaryKey = 'id';

    public function paketpromo()
    {
        return $this->hasMany(promo_paket::class);
    } 
}
