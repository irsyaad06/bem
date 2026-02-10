<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProgramKerja extends Model
{
    use HasFactory;

    protected $table = 'program_kerja';

    protected $fillable = [
        'id_kementerian',
        'judul',
        'slug',
        'deskripsi',
        'lokasi',
        'link_lokasi',
        'tanggal_mulai',
        'tanggal_selesai',
        'status', // 'segera_hadir', 'berlangsung', 'terlaksana'
        'poster_utama',
        'proposal_kegiatan',
        'laporan_pertanggungjawaban',
    ];

    /**
     * Casting tipe data otomatis
     * Agar tanggal langsung jadi objek Carbon (mudah diformat)
     */
    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
    ];

    /**
     * Relasi: Program Kerja mungkin dimiliki Kementerian (PIC), bisa juga null (BPH)
     */
    public function kementerian(): BelongsTo
    {
        return $this->belongsTo(Kementerian::class, 'id_kementerian');
    }
    
    /**
     * Helper untuk cek status (Opsional)
     */
    public function isTerlaksana(): bool
    {
        return $this->status === 'terlaksana';
    }
}