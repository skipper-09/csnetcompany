<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'kode_pos'
    ];
    protected $primaryKey = 'id';

    public function odp()
    {
        return $this->hasMany(Odp::class);
    }
}
