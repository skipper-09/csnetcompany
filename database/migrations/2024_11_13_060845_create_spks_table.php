<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('spks', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->date('date_install');
            $table->string('technician_name');
            $table->string('technician_position');
            $table->string('client_name');
            $table->string('client_nik');
            $table->text('client_address');
            $table->string('client_whatsapp');
            $table->string('package');
            $table->string('modem_serial');
            $table->text('cable_details');
            $table->enum('stb_status', ['Ada', 'Tidak']);
            $table->string('stb_mac_address')->nullable();
            $table->string('pdf_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spks');
    }
};