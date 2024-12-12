<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'username',
        'email',
        'password',
        'name',
        'role',
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'wali_kelas_id');
    }

    public function mataPelajaran()
    {
        return $this->hasMany(MataPelajaran::class, 'guru_id');
    }
    // public function mataPelajaran(){
    //     return $this->hasMany(mataPelajaran::class);
    // }

    public function logAktivitas()
    {
        return $this->hasMany(LogAktivitas::class);
    }
    public static function boot()
    {
        parent::boot();

        // Cek apakah user dengan role guru sudah menjadi wali kelas
        static::creating(function ($user) {
            if ($user->role === 'guru') {
                $existingKelas = Kelas::where('wali_kelas_id', $user->id)->exists();
                if ($existingKelas) {
                    throw new \Exception('Guru ini sudah menjadi wali kelas di kelas lain.');
                }
            }
        });
        
        // Validasi saat mengupdate user
        static::updating(function ($user) {
            if ($user->role === 'guru') {
                $existingKelas = Kelas::where('wali_kelas_id', $user->id)
                    ->where('id', '!=', $user->kelas->id ?? null)
                    ->exists();
                if ($existingKelas) {
                    throw new \Exception('Guru ini sudah menjadi wali kelas di kelas lain.');
                }
            }
        });
    }
}
