<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'peran', // Wajib ditambahkan agar kolom 'peran' bisa diisi
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Relasi ke Profil Anggota
     * Satu User memiliki Satu Profil Anggota
     */
    public function profilAnggota(): HasOne
    {
        // 'id_user' adalah foreign key di tabel profil_anggota
        return $this->hasOne(ProfilAnggota::class, 'id_user');
    }

    /**
     * Helper untuk cek apakah user adalah admin
     */
    public function isAdmin(): bool
    {
        return $this->peran === 'admin';
    }
}