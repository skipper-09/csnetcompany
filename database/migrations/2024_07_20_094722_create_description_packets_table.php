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
        Schema::create('description_packets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('packet_id');
            $table->string('name');
            $table->string('logo');
            $table->timestamps();
            $table->foreign('packet_id')->references('id')->on('packets')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('description_packets');
    }
};
