<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Auth\AspirasiController;
use App\Http\Controllers\PetugasController;
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

Route::get('/', function () {
    return view('page.index');
});
Route::get('/registrasi', [UserController::class, 'showregister']);
Route::post('/registrasi', [UserController::class, 'register'])->name('registrasi.store');
Route::get('/login', [UserController::class, 'showlogin'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('registrasi.login');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:masyarakat'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('auth.dashboard');
    Route::get('/aspirasi', [AspirasiController::class, 'index'])->name('aspirasi.list');
    Route::delete('/aspirasi/{id}', [AspirasiController::class, 'destroy'])->name('aspirasi.destroy');
    Route::get('/aspirasi/buat', [AspirasiController::class, 'create'])->name('aspirasi.create');
    Route::post('/aspirasi/buat', [AspirasiController::class, 'store'])->name('aspirasi.store');
});
Route::middleware(['auth', 'role:petugas'])->group(function () {
    Route::get('/dashboard-petugas', [PetugasController::class, 'index'])->name('petugas.dashboard');
    Route::get('/aspirasi-petugas', [PetugasController::class, 'show'])->name('petugas.aspirasi');
    Route::delete('/aspirasi-petugas/{id}', [PetugasController::class, 'destroy'])->name('petugas.destroy');
});