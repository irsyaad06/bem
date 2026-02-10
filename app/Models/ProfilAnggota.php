<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProfilAnggota extends Model
{
    use HasFactory;

    protected $table = 'profil_anggota';
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
    protected $casts = [
        'aktif' => 'boolean',
        'level_jabatan' => 'integer',
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function fakultas(): BelongsTo
    {
        return $this->belongsTo(Fakultas::class, 'id_fakultas');
    }

    public function jurusan(): BelongsTo
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan');
    }
    public function kemenkoan(): BelongsTo
    {
        return $this->belongsTo(Kemenkoan::class, 'id_kemenkoan');
    }

    public function kementerian(): BelongsTo
    {
        return $this->belongsTo(Kementerian::class, 'id_kementerian');
    }

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
