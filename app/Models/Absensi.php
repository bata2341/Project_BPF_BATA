<?php

namespace App\Models;

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $fillable = [
        'siswa_id',
        'mata_pelajaran_id',
        'tanggal',
        'jam_ke',
        'status_kehadiran',
        'keterangan',
        'dicatat_oleh',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function mataPelajaran()
    {
        return $this->belongsTo(MataPelajaran::class);
    }

    public function dicatatOleh()
    {
        return $this->belongsTo(User::class, 'dicatat_oleh');
    }

    protected static function boot()
    {
        parent::boot();

        // Validasi sebelum membuat absensi
        static::creating(function ($absensi) {
            if (!MataPelajaran::find($absensi->mata_pelajaran_id)) {
                throw new \Exception('Mata pelajaran tidak valid.');
            }

            if (!Siswa::find($absensi->siswa_id)) {
                throw new \Exception('Siswa tidak valid.');
            }
        });
    }
}
