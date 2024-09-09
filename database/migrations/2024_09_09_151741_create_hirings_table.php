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
        Schema::create('hirings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('qualification');
            $table->string('slug');
            $table->unsignedBigInteger('category_job');
            $table->unsignedBigInteger('job_location');
            $table->foreign('category_job')->references('id')->on('category_jobs')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('job_location')->references('id')->on('job_locations')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hirings');
    }
};
