<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Auth\AspirasiController;
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

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('auth.dashboard');
    Route::get('/aspirasi', [AspirasiController::class, 'index']);
    Route::post('/aspirasi', [AspirasiController::class, 'store'])->name('aspirasi.store');
});