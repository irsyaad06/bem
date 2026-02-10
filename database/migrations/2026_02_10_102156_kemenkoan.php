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
        Schema::create('kemenkoan', function (Blueprint $table) {
            $table->id();
            $table->string('nama'); // Contoh: "Kemenko Pergerakan Mahasiswa"
            $table->string('alias')->nullable(); // Contoh: "KEMENKO PERMA"
            $table->text('deskripsi')->nullable();

            // LOGO KEMENKOAN
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
