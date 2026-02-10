<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AktivitasKerja extends Model
{
    use HasFactory;

    protected $table = 'aktivitas_kerja';

    protected $fillable = [
        'id_kementerian',
        'nama_aktivitas',
        'slug',
        'deskripsi',
        'lokasi',
        'link_lokasi',
        'tanggal',
        'status', // 'segera_hadir', 'berlangsung', 'terlaksana'
        'foto_dokumentasi',
    ];

    /**
     * Casting tanggal ke objek Carbon
     */
    protected $casts = [
        'tanggal' => 'date',
    ];

    /**
     * Relasi: Aktivitas Kerja wajib milik satu Kementerian
     */
    public function kementerian(): BelongsTo
    {
        return $this->belongsTo(Kementerian::class, 'id_kementerian');
    }
}