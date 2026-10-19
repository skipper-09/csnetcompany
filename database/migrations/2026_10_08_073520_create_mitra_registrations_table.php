<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mitra_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('registration_number')->unique();
            $table->enum('type', ['supplier', 'vendor']);

            // Step 1 - Informasi Perusahaan
            $table->string('company_name');
            $table->string('business_entity', 30);
            $table->string('npwp', 30)->index();
            $table->string('nib', 20);
            $table->text('address');
            $table->string('province');
            $table->string('city');
            $table->string('website')->nullable();
            $table->year('established_year')->nullable();
            $table->string('pic_name');
            $table->string('email');
            $table->string('phone', 20);

            // Step 2 - Detail Usaha
            $table->string('main_category');
            $table->string('sub_category');
            $table->text('description');
            $table->text('products_services');
            $table->string('service_area');
            $table->string('supply_capacity')->nullable();
            $table->string('main_clients')->nullable();
            $table->string('certifications')->nullable();

            // Step 3 - Dokumen (path file)
            $table->string('doc_akta');
            $table->string('doc_npwp');
            $table->string('doc_nib');
            $table->string('doc_company_profile')->nullable();
            $table->string('doc_certificate')->nullable();
            $table->string('doc_reference')->nullable();

            // Status & proses
            $table->string('status', 20)->default('verifikasi')->index();
            $table->text('admin_notes')->nullable();
            $table->timestamp('verified_at')->nullable();
            $table->timestamp('evaluated_at')->nullable();
            $table->timestamp('decided_at')->nullable();

            // Akun vendor setelah disetujui (untuk dashboard)
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mitra_registrations');
    }
};