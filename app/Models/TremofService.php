<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TremofService extends Model
{
    use HasFactory;
    protected $fillable = [
        'tremofservice',
    ];
    protected $primaryKey = 'id';
}
