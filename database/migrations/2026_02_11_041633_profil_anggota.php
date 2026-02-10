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
        Schema::create('profil_anggota', function (Blueprint $table) {
            $table->id();

            // Relasi ke User Login
            $table->foreignId('id_user')->constrained('users')->cascadeOnDelete();

            // --- STRUKTUR ORGANISASI (NULLABLE) ---
            // Diisi jika dia MENKO atau STAFF MENKO
            $table->foreignId('id_kemenkoan')
                ->nullable()
                ->constrained('kemenkoan')
                ->nullOnDelete();

            // Diisi jika dia MENTERI atau STAFF KEMENTERIAN
            $table->foreignId('id_kementerian')
                ->nullable()
                ->constrained('kementerian')
                ->nullOnDelete();



            // --- DATA PRIBADI ---
            $table->string('nama_lengkap');
            $table->string('nama_panggilan')->nullable();
            $table->string('nim')->nullable();
            $table->string('angkatan', 4)->nullable(); // 2024
            $table->foreignId('id_fakultas')
                ->nullable()
                ->constrained('fakultas')
                ->nullOnDelete();

            $table->foreignId('id_jurusan')
                ->nullable()
                ->constrained('jurusans')
                ->nullOnDelete();
            // --- JABATAN ---
            $table->string('nama_jabatan'); // Contoh: "Presiden Mahasiswa", "Dirjen", "Staff Muda"

            // LEVEL JABATAN (Untuk logika hak akses):
            // 1 = Presiden / Wapres
            // 2 = Menko
            // 3 = Menteri / Kepala Biro
            // 4 = Staff
            $table->integer('level_jabatan')->default(4);

            // STATUS AKUN
            // true = Aktif (Sudah di-acc)
            // false = Pending (Baru daftar)
            $table->boolean('aktif')->default(false);

            // DATA TAMBAHAN
            $table->string('nomor_telepon')->nullable();
            $table->string('foto_profil')->nullable();
            $table->string('kata_kata')->nullable();
            $table->string('username_instagram')->nullable();
            $table->string('username_tiktok')->nullable();
            $table->string('username_linkedin')->nullable();
            $table->text('bio_singkat')->nullable();

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
