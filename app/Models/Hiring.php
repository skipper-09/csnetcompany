<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hiring extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'qualification', 'category_job', 'job_location', 'slug'];
    protected $primaryKey = 'id';

    public function categoryjob()
    {
        return $this->belongsTo(CategoryJob::class, 'category_job', 'id');
    }
    public function joblocation()
    {
        return $this->belongsTo(JobLocation::class, 'category_job', 'id');
    }
}
