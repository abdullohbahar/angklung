<?php

use App\Http\Controllers\Student\LoginStudentController;
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
