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
        Schema::create('program_kerja', function (Blueprint $table) {
            $table->id();

            // Penanggung Jawab (Opsional, bisa NULL jika proker bersama/BPH)
            $table->foreignId('id_kementerian')
                ->nullable()
                ->constrained('kementerian')
                ->nullOnDelete();

            $table->string('judul'); // Contoh: "Festival Budaya UNIKOM 2026"
            $table->string('slug')->unique();
            $table->text('deskripsi')->nullable();


            $table->string('lokasi');
            $table->string('link_lokasi')->nullable();

            // Waktu & Status
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai')->nullable();

            $table->enum('status', ['segera_hadir', 'berlangsung', 'terlaksana'])
                ->default('segera_hadir');

            // Dokumentasi Global
            $table->string('poster_utama')->nullable();
            $table->string('proposal_kegiatan')->nullable(); // Link File
            $table->string('laporan_pertanggungjawaban')->nullable(); // Link File

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
