<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProfilAnggota extends Model
{
    use HasFactory;

    /**
     * Menentukan nama tabel secara eksplisit karena formatnya bahasa Indonesia
     */
    protected $table = 'profil_anggota';

    /**
     * Daftar kolom yang aman untuk diisi secara massal (Mass Assignment)
     */
    protected $fillable = [
        'id_user',
        'id_kemenkoan',
        'id_kementerian',
        'nama_lengkap',
        'nama_panggilan',
        'nim',
        'fakultas',
        'prodi',
        'angkatan',
        'nama_jabatan',
        'level_jabatan',
        'aktif',
        'nomor_telepon',
        'foto_profil',
        'kata_kata',
        'username_instagram',
        'username_tiktok',
        'username_linkedin',
        'bio_singkat',
    ];

    /**
     * Konversi tipe data otomatis
     */
    protected $casts = [
        'aktif' => 'boolean',        // Konversi 1/0 ke true/false
        'level_jabatan' => 'integer', // Pastikan selalu integer
    ];

    /*
    |--------------------------------------------------------------------------
    | RELASI (Relationships)
    |--------------------------------------------------------------------------
    */

    /**
     * Relasi ke User (Akun Login)
     * Foreign Key: id_user
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    /**
     * Relasi ke Kemenkoan
     * Foreign Key: id_kemenkoan
     */
    public function kemenkoan(): BelongsTo
    {
        return $this->belongsTo(Kemenkoan::class, 'id_kemenkoan');
    }

    /**
     * Relasi ke Kementerian
     * Foreign Key: id_kementerian
     */
    public function kementerian(): BelongsTo
    {
        return $this->belongsTo(Kementerian::class, 'id_kementerian');
    }

    /*
    |--------------------------------------------------------------------------
    | HELPER METHODS (Opsional)
    |--------------------------------------------------------------------------
    | Memudahkan pengecekan jabatan di controller/view
    */

    public function isPresidenAtauWapres(): bool
    {
        return $this->level_jabatan === 1;
    }

    public function isMenko(): bool
    {
        return $this->level_jabatan === 2;
    }

    public function isMenteri(): bool
    {
        return $this->level_jabatan === 3;
    }

    public function isStaff(): bool
    {
        return $this->level_jabatan === 4;
    }
}