<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kelas',
        'tingkat',
        'wali_kelas_id',
    ];

    public function waliKelas()
    {
        return $this->belongsTo(User::class, 'wali_kelas_id');
    }

    // public function User()
    // {
    //     return $this->belongsTo(User::class);
    // }

    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }

    public function mataPelajaran()
    {
        return $this->hasMany(MataPelajaran::class);
    }

    // Tambahkan method untuk validasi
    public static function boot()
    {
        parent::boot();

        // Sebelum menyimpan data kelas, cek apakah wali kelas sudah memiliki kelas
        static::updating(function ($kelas) {
            $existingKelas = Kelas::where('wali_kelas_id', $kelas->wali_kelas_id)
                ->where('id', '!=', $kelas->id)
                ->exists();
            if ($existingKelas) {
                throw new \Exception('Wali kelas sudah terdaftar di kelas lain.');
            }
        });
    }
}
