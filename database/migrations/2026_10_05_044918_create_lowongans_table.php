<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lowongans', function (Blueprint $table) {
            $table->id();
            $table->string('judul');                        
            $table->string('slug')->unique();
            $table->string('departemen');                   
            $table->string('lokasi');                     
            $table->string('tipe_kerja', 30);              
            $table->string('icon')->nullable();
            $table->string('ringkasan')->nullable();         
            $table->text('deskripsi');                      
            $table->json('tanggung_jawab')->nullable();     
            $table->json('kualifikasi')->nullable();       
            $table->json('benefit')->nullable();            
            $table->string('status', 30)->default('draft')->index(); 
            $table->timestamp('published_at')->nullable();
            $table->date('ditutup_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['departemen', 'lokasi', 'tipe_kerja']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lowongans');
    }
};