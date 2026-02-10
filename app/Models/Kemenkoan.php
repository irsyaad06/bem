<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kemenkoan extends Model
{
    use HasFactory;

    /**
     * Nama tabel di database (Override default Laravel)
     */
    protected $table = 'kemenkoan';

    /**
     * Kolom yang boleh diisi (Mass Assignment)
     */
    protected $fillable = [
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
     * Satu Kemenkoan membawahi banyak Kementerian
     */
    public function kementerian(): HasMany
    {
        // Parameter ke-2 adalah Foreign Key di tabel anak (kementerian)
        // Parameter ke-3 adalah Primary Key di tabel induk (kemenkoan)
        return $this->hasMany(Kementerian::class, 'id_kemenkoan', 'id');
    }

    /**
     * Satu Kemenkoan memiliki banyak Anggota/Staff (Menko & Staff Ahli Kemenko)
     * (Relasi ke ProfilAnggota yang kita buat sebelumnya)
     */
    public function profilAnggota(): HasMany
    {
        return $this->hasMany(ProfilAnggota::class, 'id_kemenkoan', 'id');
    }
}