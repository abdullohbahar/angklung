<?php

use App\Http\Controllers\Student\AktivitasBelajarController;
use App\Http\Controllers\Student\CapaianPembelajaranController;
use App\Http\Controllers\Student\LoginStudentController;
use App\Http\Controllers\Student\MainMenuStudentController;
use Illuminate\Support\Facades\Route;
use Bugsnag\BugsnagLaravel\Facades\Bugsnag;

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
