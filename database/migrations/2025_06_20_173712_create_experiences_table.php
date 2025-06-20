<?php

// database/migrations/YYYY_MM_DD_HHMMSS_create_experiences_table.php

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
        Schema::create('experiences', function (Blueprint $table) {
            $table->id(); // Primary key (auto-incrementing)

            // Foreign key ke tabel users
            // user_id ini akan tahu pengalaman ini milik user siapa
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->string('job_title'); // Contoh: "Junior Web Developer", "Intern Data Analyst"
            $table->string('company');   // Contoh: "PT. Teknologi Maju"
            $table->string('location')->nullable(); // Contoh: "Jakarta, Indonesia"
            $table->date('start_date'); // Tanggal mulai bekerja/kegiatan
            $table->date('end_date')->nullable(); // Tanggal selesai (nullable jika "Sekarang")
            $table->text('description')->nullable(); // Deskripsi tanggung jawab/pencapaian

            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiences');
    }
};