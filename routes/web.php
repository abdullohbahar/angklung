<?php

use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Admin\DataGuruController;
use App\Http\Controllers\Student\AktivitasBelajarController;
use App\Http\Controllers\Student\CapaianPembelajaranController;
use App\Http\Controllers\Student\LoginStudentController;
use App\Http\Controllers\Student\MainMenuStudentController;
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
});
