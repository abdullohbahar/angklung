<?php

use App\Http\Controllers\Admin\AuthAdminController;
use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Admin\DataGuruController;
use App\Http\Controllers\Admin\DataSiswaController;
use App\Http\Controllers\Guru\AktivitasBelajarController as GuruAktivitasBelajarController;
use App\Http\Controllers\Guru\AktivitasController;
use App\Http\Controllers\Guru\AuthGuruController;
use App\Http\Controllers\Guru\CapaianPembelajaranController as GuruCapaianPembelajaranController;
use App\Http\Controllers\Guru\DashboardGuruController;
use App\Http\Controllers\Guru\DataSiswaController as GuruDataSiswaController;
use App\Http\Controllers\Guru\FileCapaianPembelajaranController;
use App\Http\Controllers\Guru\MateriController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfilPengembangController;
use App\Http\Controllers\Student\AktivitasBelajarController;
use App\Http\Controllers\Student\CapaianPembelajaranController;
use App\Http\Controllers\Student\LoginStudentController;
use App\Http\Controllers\Student\MainMenuStudentController;
use App\Models\CapaianPembelajaran;
use Illuminate\Support\Facades\Route;
use Bugsnag\BugsnagLaravel\Facades\Bugsnag;

use function Termwind\ask;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [LoginStudentController::class, 'index'])->name('login.student');

Route::prefix('siswa')->group(function () {
    Route::get('/', [MainMenuStudentController::class, 'index']);
    Route::get('/capaian-pembelajaran', [CapaianPembelajaranController::class, 'index']);
    Route::get('/aktivitas-belajar', [AktivitasBelajarController::class, 'index']);
});

Route::get('admin/login', [AuthAdminController::class, 'index'])->name('admin.login');
Route::post('admin/auth', [AuthAdminController::class, 'authenticate'])->name('admin.auth');
Route::get('admin/logout', [AuthAdminController::class, 'logout'])->name('admin.logout');

Route::get('guru/login', [AuthGuruController::class, 'index'])->name('guru.login');
Route::post('guru/auth', [AuthGuruController::class, 'authenticate'])->name('guru.auth');
Route::get('guru/logout', [AuthGuruController::class, 'logout'])->name('guru.logout');

Route::prefix('admin')->group(function () {
    Route::get('dashboard', [DashboardAdminController::class, 'index'])->name('admin.dashboard');

    Route::prefix('data-guru')->group(function () {
        Route::get('/', [DataGuruController::class, 'index'])->name('admin.data.guru');
        Route::get('/tambah', [DataGuruController::class, 'create'])->name('admin.create.data.guru');
        Route::post('/simpan', [DataGuruController::class, 'store'])->name('admin.store.data.guru');
        Route::get('/edit/{id}', [DataGuruController::class, 'edit'])->name('admin.edit.data.guru');
        Route::put('/update/{id}', [DataGuruController::class, 'update'])->name('admin.update.data.guru');
        Route::delete('/destroy/{id}', [DataGuruController::class, 'destroy'])->name('admin.destroy.data.guru');
    });

    Route::prefix('data-siswa')->group(function () {
        Route::get('/', [DataSiswaController::class, 'index'])->name('admin.data.siswa');
    });
});

Route::prefix('guru')->group(function () {
    Route::get('dashboard', [DashboardGuruController::class, 'index'])->name('guru.dashboard');

    Route::prefix('data-siswa')->group(function () {
        Route::get('/', [GuruDataSiswaController::class, 'index'])->name('guru.data.siswa');
        Route::get('/tambah', [GuruDataSiswaController::class, 'create'])->name('guru.create.data.siswa');
        Route::post('/simpan', [GuruDataSiswaController::class, 'store'])->name('guru.store.data.siswa');
        Route::get('/edit/{id}', [GuruDataSiswaController::class, 'edit'])->name('guru.edit.data.siswa');
        Route::put('/update/{id}', [GuruDataSiswaController::class, 'update'])->name('guru.update.data.siswa');
        Route::delete('/destroy/{id}', [GuruDataSiswaController::class, 'destroy'])->name('guru.destroy.data.siswa');
    });

    Route::prefix('capaian-pembelajaran')->group(function () {
        Route::get('/', [GuruCapaianPembelajaranController::class, 'index'])->name('guru.capaian.pembelajaran');
        Route::get('/tambah', [GuruCapaianPembelajaranController::class, 'create'])->name('guru.create.capaian.pembelajaran');
        Route::post('/simpan', [GuruCapaianPembelajaranController::class, 'store'])->name('guru.store.capaian.pembelajaran');
        Route::get('/edit/{id}', [GuruCapaianPembelajaranController::class, 'edit'])->name('guru.edit.capaian.pembelajaran');
        Route::put('/update/{id}', [GuruCapaianPembelajaranController::class, 'update'])->name('guru.update.capaian.pembelajaran');
        Route::delete('/destroy/{id}', [GuruCapaianPembelajaranController::class, 'destroy'])->name('guru.destroy.data.capaian.pembelajaran');

        Route::prefix('file')->group(function () {
            Route::get('/{id}', [FileCapaianPembelajaranController::class, 'index'])->name('guru.file.capaian.pembelajaran');
            Route::post('/simpan', [FileCapaianPembelajaranController::class, 'store'])->name('guru.store.file.capaian.pembelajaran');
            Route::delete('/destroy/{id}', [FileCapaianPembelajaranController::class, 'destroy'])->name('guru.destroy.file.capaian.pembelajaran');
        });
    });

    Route::prefix('aktivitas-belajar')->group(function () {
        Route::get('/', [GuruAktivitasBelajarController::class, 'index'])->name('guru.aktivitas.belajar.siswa');
        Route::get('/tambah', [GuruAktivitasBelajarController::class, 'create'])->name('guru.create.aktivitas.belajar.siswa');
        Route::post('/simpan', [GuruAktivitasBelajarController::class, 'store'])->name('guru.store.aktivitas.belajar.siswa');
        Route::get('/edit/{id}', [GuruAktivitasBelajarController::class, 'edit'])->name('guru.edit.aktivitas.belajar.siswa');
        Route::put('/update/{id}', [GuruAktivitasBelajarController::class, 'update'])->name('guru.update.aktivitas.belajar.siswa');
        Route::delete('/destroy/{id}', [GuruAktivitasBelajarController::class, 'destroy'])->name('guru.destroy.aktivitas.belajar.siswa');

        Route::prefix('materi')->group(function () {
            Route::get('/{id}', [MateriController::class, 'index'])->name('guru.materi');
            Route::post('/simpan', [MateriController::class, 'store'])->name('guru.store.materi');
            Route::get('/edit/{id}', [MateriController::class, 'edit'])->name('guru.edit.materi');
            Route::put('/update/{id}', [MateriController::class, 'update'])->name('guru.update.materi');
            Route::delete('/destroy/{id}', [MateriController::class, 'destroy'])->name('guru.destroy.materi');
        });

        Route::prefix('aktivitas')->group(function () {
            Route::get('/{id}', [AktivitasController::class, 'index'])->name('guru.aktivitas');
            Route::post('/update', [AktivitasController::class, 'update'])->name('guru.update.aktivitas');
        });
    });
});

Route::get('profile', [ProfileController::class, 'index'])->name('profile');
Route::put('profile/{id}', [ProfileController::class, 'update'])->name('update.profile');

Route::get('profil-pengembang', [ProfilPengembangController::class, 'index'])->name('profil.pengembang');
Route::post('simpan-profil-pengembang', [ProfilPengembangController::class, 'store'])->name('store.profil.pengembang');
