<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kementerian extends Model
{
    use HasFactory;

    /**
     * Nama tabel di database
     */
    protected $table = 'kementerian';

    /**
     * Kolom yang boleh diisi
     */
    protected $fillable = [
        'id_kemenkoan', // Foreign Key wajib masuk fillable
        'nama',
        'alias',
        'deskripsi',
        'logo',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELASI (Relationships)
    |--------------------------------------------------------------------------
    */

    /**
     * Kementerian berada di bawah satu Kemenkoan (Bisa NULL jika independen)
     */
    public function kemenkoan(): BelongsTo
    {
        // Parameter ke-2 adalah Foreign Key di tabel ini
        return $this->belongsTo(Kemenkoan::class, 'id_kemenkoan');
    }

    /**
     * Kementerian memiliki banyak Anggota (Menteri & Staff)
     */
    public function profilAnggota(): HasMany
    {
        return $this->hasMany(ProfilAnggota::class, 'id_kementerian');
    }

    // --- Relasi Tambahan (Untuk Tabel yang akan dibuat nanti) ---

    /**
     * Kementerian memiliki banyak Tupoksi
     */
    public function tupoksi(): HasMany
    {
        // Asumsi nama model Tupoksi
        return $this->hasMany(Tupoksi::class, 'id_kementerian');
    }

    /**
     * Kementerian memiliki banyak Aktivitas Kerja
     */
    public function aktivitasKerja(): HasMany
    {
        // Asumsi nama model AktivitasKerja
        return $this->hasMany(AktivitasKerja::class, 'id_kementerian');
    }
    
    /**
     * Kementerian bertanggung jawab atas Program Kerja (Global)
     */
    public function programKerja(): HasMany
    {
        // Asumsi nama model ProgramKerja
        return $this->hasMany(ProgramKerja::class, 'id_kementerian');
    }
}