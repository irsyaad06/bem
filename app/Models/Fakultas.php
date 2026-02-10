<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Fakultas extends Model
{
    protected $table = 'fakultas'; // Pastikan nama tabel benar (jamak/singular)
    protected $guarded = [];

    /**
     * Relasi: Satu Fakultas punya banyak Jurusan
     */
    public function jurusans(): HasMany
    {
        return $this->hasMany(Jurusan::class);
    }

    /**
     * Relasi: Satu Fakultas punya banyak Anggota
     * PENTING: Sebutkan 'id_fakultas' karena bukan default 'fakultas_id'
     */
    public function profilAnggota(): HasMany
    {
        return $this->hasMany(ProfilAnggota::class, 'id_fakultas');
    }

    /**
     * (Opsional) Relasi ke HIMA yang ada di fakultas ini
     */
    public function hima(): HasMany
    {
        return $this->hasMany(Ormawa::class, 'fakultas_id'); // Kalau di tabel ormawa pakainya fakultas_id
    }
}
