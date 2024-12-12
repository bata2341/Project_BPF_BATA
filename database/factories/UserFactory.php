<?php

// namespace Database\Factories;

// use App\Models\User;
// use Illuminate\Database\Eloquent\Factories\Factory;
// use Illuminate\Support\Str;
// use App\Models\MataPelajaran;

// class UserFactory extends Factory
// {
//     protected $model = User::class;

//     public function definition()
//     {
//         $role = $this->faker->randomElement(['admin', 'guru', 'kepala_sekolah']);


//         if ($role === 'guru') {
//             $mata_pelajaran_id = MataPelajaran::pluck('id')->toArray();
//         }

//         return [
//             'username' => $this->faker->unique()->userName,
//             'email' => $this->faker->unique()->safeEmail,
//             'password' => bcrypt('password'), // Default password
//             'name' => $this->faker->name,
//             'role' => $role,
//             'mata_pelajaran_id' => $this->faker->randomElement( $mata_pelajaran_id),
//         ];
//     }
// }
namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\MataPelajaran;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        $role = $this->faker->randomElement(['admin', 'guru', 'kepala_sekolah']);

        $mata_pelajaran_id = null;

        if ($role === 'guru') {
            $mata_pelajaran_id = MataPelajaran::pluck('id')->toArray();
        }
        $password_plaintext = 'password1234'; // This is the plaintext password
        $password_encrypted = bcrypt($password_plaintext); // Hashing the password with bcrypt


        return [
            'username' => $this->faker->unique()->userName,
            'email' => $this->faker->unique()->safeEmail,
            'password' => $password_encrypted, // Default password
            'name' => $this->faker->name,
            'role' => $role,
            'mata_pelajaran_id' => $role === 'guru' ? $this->faker->randomElement($mata_pelajaran_id) : null,
        ];
    }
}
