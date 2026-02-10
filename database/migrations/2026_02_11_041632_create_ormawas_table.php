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
        Schema::create('ormawas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('alias')->nullable();
            $table->string('logo')->nullable();

            // Penanda Tipe (UKM atau HIMA)
            $table->enum('jenis', ['ukm', 'hima']);

            // Relasi Khusus HIMA (Nullable, karena UKM tidak punya jurusan)
            $table->foreignId('fakultas_id')->nullable()->constrained('fakultas')->nullOnDelete();
            $table->foreignId('jurusan_id')->nullable()->constrained('jurusans')->nullOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ormawas');
    }
};
