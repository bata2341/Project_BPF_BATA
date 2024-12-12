<?php

namespace Database\Factories;

use App\Models\LogAktivitas;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class LogAktivitasFactory extends Factory
{
    protected $model = LogAktivitas::class;

    public function definition()
    {
        $user_id = User::where('role', 'guru')->pluck('id')->toArray();
        return [
            'user_id' => $this->faker->randomElement( $user_id),
            'aktivitas' => $this->faker->sentence(),
            'deskripsi' => $this->faker->paragraph(),
            'ip_address' => $this->faker->ipv4(),
        ];
    }
}
