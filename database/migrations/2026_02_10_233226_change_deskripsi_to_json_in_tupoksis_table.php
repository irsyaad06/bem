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
        Schema::table('tupoksi', function (Blueprint $table) {
            // Ubah jadi JSON agar bisa simpan Array
            $table->json('deskripsi')->change();
        });
    }

    public function down(): void
    {
        Schema::table('tupoksi', function (Blueprint $table) {
            $table->text('deskripsi')->change();
        });
    }
};
