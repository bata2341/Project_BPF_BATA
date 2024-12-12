<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nis',
        'nama',
        'kelas_id',
        'jenis_kelamin',
        'alamat',
        'nama_orangtua',
        'telepon_orangtua',
        'status',
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function absensi()
    {
        return $this->hasMany(Absensi::class);
    }

    public static function boot()
    {
        parent::boot();
        static::creating(function ($siswa) {
            if (!Kelas::find($siswa->kelas_id)) {
                throw new \Exception('Kelas tidak valid.');
            }
        });
    }
}
