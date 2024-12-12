<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Kelas;
use App\Models\MataPelajaran;
use App\Models\Siswa;
use App\Models\Absensi;
use App\Models\LogAktivitas;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Menambahkan data user, kelas, mata pelajaran, siswa, absensi, log aktivitas, pengaturan
         // Buat beberapa user dengan role 'guru'
        User::factory()->count(10)->state(['role' => 'guru'])->create();
        Kelas::factory(2)->create();
        MataPelajaran::factory(5)->create();
        Siswa::factory(50)->create();
        Absensi::factory(100)->create();
    }
}

