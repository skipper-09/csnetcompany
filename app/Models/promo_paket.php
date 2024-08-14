<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class promo_paket extends Model
{
    use HasFactory;
    protected $fillable = [
        'promotion_id',
        'packet_id',
        'discount_type',
        'discount_amount',
        'discounted_price',
        'status'
    ];
    protected $primaryKey = 'id';


    public function promo()
    {
        return $this->belongsTo(Promo::class, 'promotion_id', 'id');
    }
    public function paket()
    {
        return $this->belongsTo(packet::class, 'packet_id', 'id');
    }
}
