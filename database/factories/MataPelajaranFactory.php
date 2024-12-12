<?php

namespace Database\Factories;

use Faker\Factory as Faker;
use App\Models\MataPelajaran;
use App\Models\Kelas;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MataPelajaranFactory extends Factory
{
    protected $model = MataPelajaran::class;

    private static $counter = 1; // Menyimpan counter untuk angka berurutan
    

    public function definition()
    {
        $kelas_id = Kelas::pluck('id')->toArray();
        return [
            'kode_mapel' => $this->faker->unique()->regexify('[A-Z]{3}[0-9]{2}'), // Contoh format unik
            'nama_mapel' => $this->faker->word(),
            'kelas_id' => $this->faker->randomElement( $kelas_id),
        ];
    }
}
