<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class packet extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'category_id',
        'price',
        'is_active',
        'best_seller',
        'duration',
        'speed'
    ];
    protected $primaryKey = 'id';


    public function categori()
    {
        return $this->belongsTo(CategoryPacket::class, 'category_id', 'id');
    }

    public function packetDescription()
    {
        return $this->hasMany(Description::class);
    }

    public function packetpromo()
    {
        return $this->hasMany(promo_paket::class);
    }
}
