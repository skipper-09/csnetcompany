<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryJob extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    protected $primaryKey = 'id';

    public function hiring()
    {
        return $this->hasMany(Hiring::class);
    }
}
