<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class packet extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'category_id', 'price', 'is_active', 'best_seller', 'duration', 'description'
    ];
    protected $primaryKey = 'id';


    public function Categori()
    {
        return $this->hasOne(CategoryPacket::class, 'category_id', 'id');
    }
}
