<?php

namespace Database\Factories;

use App\Models\Siswa;
use App\Models\Kelas;
use Illuminate\Database\Eloquent\Factories\Factory;

class SiswaFactory extends Factory
{
    protected $model = Siswa::class;

    public function definition()
    {
        $kelas_id = Kelas::pluck('id')->toArray();
        return [
            'nis' => $this->faker->unique()->numerify('NIS#####'),
            'nama' => $this->faker->name(),
            'kelas_id' => $this->faker->randomElement( $kelas_id),
            'jenis_kelamin' => $this->faker->randomElement(['L', 'P']),
            'alamat' => $this->faker->address(),
            'nama_orangtua' => $this->faker->name(),
            'telepon_orangtua' => $this->faker->phoneNumber(),
            'status' => $this->faker->randomElement(['aktif', 'tidak_aktif']),
        ];
    }
}
