<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tupoksi extends Model
{
    use HasFactory;

    /**
     * Nama tabel eksplisit
     */
    protected $table = 'tupoksi';

    /**
     * Kolom yang aman untuk diisi (Mass Assignment)
     */
    protected $fillable = [
        'id_kementerian',
        'deskripsi',
    ];

    /**
     * Relasi: Tupoksi milik satu Kementerian
     */
    public function kementerian(): BelongsTo
    {
        return $this->belongsTo(Kementerian::class, 'id_kementerian');
    }
}