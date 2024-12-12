<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_mapel',
        'nama_mapel',
        'kelas_id',
        'guru_id',
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function User()
    {
        return $this->hasMany(User::class);
    }

    public function absensi()
    {
        return $this->hasMany(Absensi::class);
    }

    public static function boot()
    {
        parent::boot();
        static::creating(function ($mataPelajaran) {
            if (!Kelas::find($mataPelajaran->kelas_id)) {
                throw new \Exception('Kelas tidak valid.');
            }
        });
    }
}
