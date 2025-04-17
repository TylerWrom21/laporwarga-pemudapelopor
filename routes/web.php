<?php

use App\Http\Controllers\AdminController;
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

Route::middleware('guest')->group(function () {
    Route::get('/registrasi', [UserController::class, 'showregister']);
    Route::post('/registrasi', [UserController::class, 'register'])->name('registrasi.store');
    Route::get('/login', [UserController::class, 'showlogin'])->name('login');
    Route::post('/login', [UserController::class, 'login'])->name('registrasi.login');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
});

Route::middleware(['auth', 'role:masyarakat'])->group(function () {
    Route::get('/auth/dashboard', [UserController::class, 'dashboard'])->name('auth.dashboard');
    Route::get('/aspirasi', [AspirasiController::class, 'index'])->name('aspirasi.list');
    Route::delete('/aspirasi/{id}', [AspirasiController::class, 'destroy'])->name('aspirasi.destroy');
    Route::get('/aspirasi/buat', [AspirasiController::class, 'create'])->name('aspirasi.create');
    Route::post('/aspirasi/buat', [AspirasiController::class, 'store'])->name('aspirasi.store');
});
Route::middleware(['auth', 'role:petugas'])->group(function () {
    Route::get('/dashboard-petugas', [PetugasController::class, 'index'])->name('petugas.dashboard');
    Route::get('/aspirasi-list', [PetugasController::class, 'show'])->name('petugas.aspirasi');
    Route::delete('/aspirasi-list/{id}', [PetugasController::class, 'destroy'])->name('petugas.destroy');
    Route::get('/aspirasi/{uuid}/detail', [PetugasController::class, 'detail'])->name('petugas.aspirasi.detail');
    Route::post('/aspirasi/{uuid}/tanggapan', [PetugasController::class, 'tanggapan'])->name('petugas.aspirasi.tanggapan');
    Route::get('/masyarakat-list', [PetugasController::class, 'masyarakat'])->name('petugas.masyarakat');
    Route::delete('/masyarakat-list/{id}', [PetugasController::class, 'delete'])->name('petugas.delete');
});

Route::middleware(['admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/aspirasi-admin', [AdminController::class, 'show'])->name('admin.aspirasi');
    Route::delete('/aspirasi-admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
});