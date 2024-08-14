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
        Schema::create('promo_pakets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('promotion_id');
            $table->unsignedBigInteger('packet_id');
            $table->enum('discount_type', ['percent', 'fixed_amount']);
            $table->integer('discount_amount');
            $table->integer('discounted_price');
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->foreign('promotion_id')->references('id')->on('promos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('packet_id')->references('id')->on('packets')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promo_pakets');
    }
};
