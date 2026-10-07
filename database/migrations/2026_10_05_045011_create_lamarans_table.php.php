<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lamarans', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 20)->unique();           

            $table->foreignId('lowongan_id')->nullable()->constrained('lowongans')->nullOnDelete();
            $table->string('posisi_diminati')->nullable();   
            $table->text('pesan')->nullable();               

            $table->string('nama_lengkap');
            $table->string('email');
            $table->string('telepon', 20);
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('jenis_kelamin', ['L', 'P'])->nullable();
            $table->string('domisili')->nullable();
            $table->string('linkedin_url')->nullable();

            $table->string('pendidikan_terakhir', 20)->nullable(); 
            $table->string('nama_institusi')->nullable();
            $table->string('jurusan')->nullable();
            $table->year('tahun_masuk')->nullable();
            $table->year('tahun_lulus')->nullable();
            $table->decimal('ipk', 3, 2)->nullable();
            $table->json('pendidikan_lainnya')->nullable();

            $table->boolean('punya_pengalaman')->default(false);
            $table->json('pengalaman')->nullable();

            $table->json('dokumen')->nullable();

            $table->string('status', 30)->default('baru')->index(); 
            $table->text('catatan_hr')->nullable();
            $table->timestamp('dikirim_at')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->index('email');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lamarans');
    }
};