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
        Schema::create('packets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->string('name');
            $table->integer('price');
            $table->boolean('is_active')->default(true);
            $table->boolean('best_seller')->default(false);
            $table->enum('duration', ['Bulan', 'Tahun'])->default('Bulan');
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('category_packets')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packets');
    }
};
