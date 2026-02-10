<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Jurusan extends Model
{
    protected $guarded = [];

    /**
     * Relasi: Jurusan milik satu Fakultas
     */
    public function fakultas(): BelongsTo
    {
        return $this->belongsTo(Fakultas::class);
    }

    /**
     * Relasi: Satu Jurusan punya banyak Anggota
     * PENTING: Sebutkan 'id_jurusan'
     */
    public function profilAnggota(): HasMany
    {
        return $this->hasMany(ProfilAnggota::class, 'id_jurusan');
    }
}
