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
        Schema::create('tupoksi', function (Blueprint $table) {
            $table->id();

            // Relasi ke Kementerian
            $table->foreignId('id_kementerian')
                ->constrained('kementerian')
                ->cascadeOnDelete();

            // Isi Poin Tupoksi
            $table->text('deskripsi'); // Contoh: "Mengelola seluruh akun media sosial"

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
