<?php

namespace Database\Factories;

use App\Models\Absensi;
use App\Models\Siswa;
use App\Models\MataPelajaran;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AbsensiFactory extends Factory
{
    protected $model = Absensi::class;

    public function definition()
    {
        // $dicatat_oleh = User::where('role', 'guru')->pluck('id')->toArray();
        $mata_pelajaran_id = MataPelajaran::pluck('id')->toArray();
        $siswa_id = MataPelajaran::pluck('id')->toArray();
        return [
            'siswa_id' => $this->faker->randomElement( $siswa_id),
            'mata_pelajaran_id' => $this->faker->randomElement( $mata_pelajaran_id),
            'tanggal' => $this->faker->date(),
            'jam_ke' => $this->faker->numberBetween(1, 10),
            'status_kehadiran' => $this->faker->randomElement(['hadir', 'sakit', 'izin', 'alfa']),
            'keterangan' => $this->faker->randomElement(['Ayah belum bangun', 'Motor ayah rusak', 'kesiangan']),
            // 'dicatat_oleh' => User::factory(),
        ];
    }
}

