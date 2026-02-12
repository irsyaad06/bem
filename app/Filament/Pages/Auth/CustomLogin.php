<?php

namespace App\Filament\Pages\Auth;

// 1. IMPORT PARENT CLASS & INTERFACE
use Filament\Auth\Pages\Login as BaseLogin;
use Filament\Auth\Http\Responses\Contracts\LoginResponse;

use Illuminate\Validation\ValidationException;
use Filament\Models\Contracts\FilamentUser;

class CustomLogin extends BaseLogin
{
    public function authenticate(): ?LoginResponse
    {
        try {
            // A. Jalankan proses login standar (Cek kecocokan Email & Password)
            $data = $this->form->getState();

            if (! filament()->auth()->attempt($this->getCredentialsFromFormData($data), $data['remember'] ?? false)) {
                $this->throwFailureValidationException();
            }

            // B. Ambil User yang baru saja berhasil login password
            $user = filament()->auth()->user();

            // --- VALIDASI CUSTOM DIMULAI DI SINI ---

            // 1. BYPASS SUPER ADMIN (Opsional tapi PENTING)
            // Agar kamu tidak ikut terkunci jika data profilmu error.
            // Ganti 'admin@gmail.com' dengan email asli Super Admin.
            if ($user->email === 'admin@gmail.com') {
                session()->regenerate();
                return app(LoginResponse::class);
            }

            // 2. CEK VERIFIED_AT (Validasi Utama)
            // Menangani user yang belum di-ACC atau di-nonaktifkan manual via tabel users
            if ($user->email_verified_at === null) {
                filament()->auth()->logout();
                throw ValidationException::withMessages([
                    'data.email' => 'Akun Anda belum diverifikasi atau telah dibekukan.',
                ]);
            }

            // 3. CEK KEBERADAAN PROFIL (Safety Net)
            // Menangani kekhawatiranmu: "User menghapus profile atau Admin menghapus profile"
            // Jika user login tapi tidak punya data profil anggota, tolak!
            if (! $user->profilAnggota) {
                filament()->auth()->logout();
                throw ValidationException::withMessages([
                    'data.email' => 'Data profil anggota tidak ditemukan (Mungkin telah dihapus). Hubungi Admin.',
                ]);
            }

            // 4. CEK STATUS AKTIF DI PROFIL (Validasi Sekunder)
            // Jika profil ada, pastikan status keaktifannya true
            if (! $user->profilAnggota->aktif) {
                filament()->auth()->logout();
                throw ValidationException::withMessages([
                    'data.email' => 'Status keanggotaan Anda sedang tidak aktif.',
                ]);
            }

            // --- VALIDASI SELESAI ---

            // C. Jika lolos semua validasi, regenerasi session dan masuk
            session()->regenerate();

            return app(LoginResponse::class);

        } catch (ValidationException $exception) {
            // Biarkan error validasi muncul di form login
            throw $exception;
        }
    }
}