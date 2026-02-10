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
        Schema::create('kementerian', function (Blueprint $table) {
            $table->id();

            // Relasi ke Kemenkoan (Foreign Key)
            // id_kemenkoan NULL = Biro Independen (Sesneg/Bendahara/Kominfo jika berdiri sendiri)
            // id_kemenkoan TERISI = Kementerian di bawah naungan Menko
            $table->foreignId('id_kemenkoan')
                ->nullable()
                ->constrained('kemenkoan') // Merujuk ke tabel 'kemenkoan'
                ->nullOnDelete();

            $table->string('nama'); // Contoh: "Kementerian Luar Negeri"
            $table->string('alias')->nullable(); // Contoh: "KEMLU"
            $table->text('deskripsi')->nullable();

            // LOGO KEMENTERIAN
            $table->string('logo')->nullable(); // Path/URL file gambar

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
