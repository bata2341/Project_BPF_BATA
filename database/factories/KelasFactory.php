<?php

namespace Database\Factories;
use App\Models\User;
use App\Models\Kelas;
use Illuminate\Database\Eloquent\Factories\Factory;

class KelasFactory extends Factory
{
    protected $model = Kelas::class;
    

    public function definition()
    {
        $wali_kelas_id = User::where('role', 'guru')->pluck('id')->toArray();
        return [
            'nama_kelas' => $this->faker->word(),
            'tingkat' => $this->faker->numberBetween(1, 6),
            'wali_kelas_id' => $this->faker->randomElement( $wali_kelas_id), // Menggunakan factory User untuk wali kelas
        ];
    }
}
