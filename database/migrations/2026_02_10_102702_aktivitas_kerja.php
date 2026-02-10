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
        Schema::create('aktivitas_kerja', function (Blueprint $table) {
            $table->id();

            // WAJIB: Aktivitas ini milik kementerian mana?
            $table->foreignId('id_kementerian')
                ->constrained('kementerian')
                ->cascadeOnDelete();

            // Detail Aktivitas
            $table->string('nama_aktivitas');
            $table->string('slug')->unique();
            $table->text('deskripsi')->nullable();

            $table->string('lokasi');
            $table->string('link_lokasi')->nullable();
            $table->date('tanggal');

            // Status Penyelesaian
            $table->enum('status', ['segera_hadir','berlangsung', 'terlaksana'])
                ->default('segera_hadir');

            // Bukti Fisik
            $table->string('foto_dokumentasi')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
