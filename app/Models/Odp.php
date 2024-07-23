<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Odp extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'area_id','splitter','port','latitude','longitude'
    ];
    protected $primaryKey = 'id';

    public function arae()
    {
        return $this->belongsTo(Area::class,'area_id','id');
    }  

}
