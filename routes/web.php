<?php


use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PasiennController;
use App\Http\Controllers\BukuController;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\PoliController;
use App\Models\Poli;
use App\Http\Controllers\LaporanPasienController;

use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::middleware(['auth'])->group(function () {
    // Routes that require authentication
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    // Define role-specific routes with middleware
    Route::get('/dashboard-admin', [DashboardController::class, 'admin'])->name('dashboardAdmin_index')->middleware('role:admin');
    Route::get('/dashboard-guru', [DashboardController::class, 'guru'])->name('dashboardGuru_index')->middleware('role:guru');
    Route::get('/dashboard-kepsek', [DashboardController::class, 'kepala_sekolah'])->name('dashboardKepsek_index')->middleware('role:kepala_sekolah');
});


// Route::middleware([Authenticate::class])->group(function(){
//     Route::resource('pasien_create', PasiennController::class);
//     Route::resource('poli', PoliController::class);
//     Route::resource('poli', KelasController::class);
//     Route::resource('laporan-pasien', LaporanPasienController::class);
// });

/*
Route::get('profile', [ProfileController::class, 'index'] );
Route::get('profile/create', [ProfileController::class, 'create'] );
Route::get('profile/{nama}/{id}/edit', [ProfileController::class, 'edit'] );*/

//challenge
Route::get('dokterr', [ProfileController::class, 'dokterr'] );
Route::get('dokter/{id}', [ProfileController::class, 'dokter'] );
Route::get('dokter/create', [ProfileController::class, 'create'] );
Route::get('dokter/{id}/edit', [ProfileController::class, 'edit'] );
Route::get('kelas/index', [KelasController::class, 'index'] );

//pasien
Route::resource('pasien_create', PasiennController::class)->middleware(Authenticate::class);
Route::get('pasien/create', [PasiennController::class, 'create'] );
Route::get('pasien/{nama}/{id}/edit', [PasiennController::class, 'edit'] );

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return redirect('login');
});

