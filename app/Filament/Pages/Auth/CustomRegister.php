<?php

namespace App\Filament\Pages\Auth;

use Filament\Auth\Pages\Register as BaseRegister;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProfilAnggota;
use App\Models\Kementerian;
use Filament\Notifications\Notification;
use DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException;

// --- INI KUNCI PERBAIKANNYA (IMPORT INTERFACE INI) ---
use Filament\Auth\Http\Responses\Contracts\RegistrationResponse; 
// -----------------------------------------------------

class CustomRegister extends BaseRegister
{
    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                $this->getNameFormComponent(),
                $this->getEmailFormComponent(),

                TextInput::make('nim')
                    ->label('NIM')
                    ->required()
                    ->numeric()
                    ->unique('profil_anggota', 'nim'), // Pastikan nama tabel benar (profil_anggotas)

                Select::make('id_kementerian')
                    ->label('Kementerian / Dinas Tujuan')
                    ->options(Kementerian::query()->pluck('nama', 'id'))
                    ->searchable()
                    ->preload()
                    ->required()
                    ->placeholder('Pilih kementerian yang Anda daftar...'),

                $this->getPasswordFormComponent(),
                $this->getPasswordConfirmationFormComponent(),
            ]);
    }

    protected function handleRegistration(array $data): Model
    {
        return DB::transaction(function () use ($data) {
            $user = $this->getUserModel()::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $data['password'],
                'peran' => 'staff',
            ]);

            ProfilAnggota::create([
                'id_user' => $user->id,
                'id_kementerian' => $data['id_kementerian'],
                'nama_lengkap' => $data['name'],
                'nim' => $data['nim'],
                'nama_jabatan' => 'Staff Muda (Menunggu ACC)',
                'level_jabatan' => 5,
                'aktif' => false,
            ]);

            return $user;
        });
    }

    // --- PERBAIKAN DI SINI ---
    // Return Type harus persis: ?RegistrationResponse
    public function register(): ?RegistrationResponse
    {
        try {
            $this->rateLimit(2);
        } catch (TooManyRequestsException $exception) {
            $this->addError('form', __('filament::register.messages.throttled', [
                'seconds' => $exception->secondsUntilAvailable,
                'minutes' => ceil($exception->secondsUntilAvailable / 60),
            ]));

            return null;
        }

        $data = $this->form->getState();

        // 1. Simpan Data
        $this->handleRegistration($data); 

        // 2. Notifikasi Sukses
        Notification::make()
            ->title('Registrasi Berhasil')
            ->body('Akun berhasil dibuat, tunggu diterima oleh sekretaris menteri ya!')
            ->success()
            ->persistent()
            ->send();

        // 3. Redirect Manual & Return Null
        // Kita return null karena kita melakukan redirect paksa, 
        // dan tipe datanya nullable (?RegistrationResponse) jadi aman.
        $this->redirect(route('filament.internal-bem.auth.login'));
        
        return null;
    }
}