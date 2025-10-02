<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\IzinController;
use App\Http\Controllers\IzinGuruController;

// Route logout umum
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// =======================
// DEFAULT
// =======================
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// =======================
// SISWA AUTH
// =======================
// Register
Route::get('/siswa/register', [AuthController::class, 'showRegisterSiswa'])->name('siswa.register');
Route::post('/siswa/register', [AuthController::class, 'registerSiswa']);
// Login
Route::get('/siswa/login', [AuthController::class, 'showLoginSiswa'])->name('siswa.login');
Route::post('/siswa/login', [AuthController::class, 'loginSiswa']);
// Logout
Route::get('/siswa/logout', [AuthController::class, 'logoutSiswa'])->name('siswa.logout');

// =======================
// GURU AUTH
// =======================
// Register
Route::get('/guru/register', [AuthController::class, 'showRegisterGuru'])->name('guru.register');
Route::post('/guru/register', [AuthController::class, 'registerGuru']);
// Login
Route::get('/guru/login', [AuthController::class, 'showLoginGuru'])->name('guru.login');
Route::post('/guru/login', [AuthController::class, 'loginGuru'])->name('guru.login.submit');
// Logout
Route::get('/guru/logout', [AuthController::class, 'logoutGuru'])->name('guru.logout');

// =======================
// HOME SISWA & GURU
// =======================
Route::get('/siswa/home', [AbsenController::class, 'index'])->name('siswa.home');

Route::get('/guru/home', [AbsenController::class, 'homeGuru'])->name('guru.home');
Route::post('/guru/absen', [AbsenController::class, 'storeGuru'])->name('guru.absen');
Route::get('/admin/izin', [IzinGuruController::class, 'dashboardAdmin'])->name('izin.admin.dashboard');


// =======================
// ABSEN & IZIN
// =======================
Route::get('/home', [AbsenController::class, 'index'])->name('home');
Route::post('/absen', [AbsenController::class, 'store'])->name('absen.store');
Route::get('/izin', [IzinController::class, 'index'])->name('izin');
Route::get('/izin', [IzinController::class, 'index'])->name('izin.create');
Route::post('/izin', [IzinController::class, 'store'])->name('izin.store');
Route::delete('/izin/{id}', [IzinController::class, 'destroy'])->name('izin.destroy');



// Rekap
Route::get('/rekap/{kelas}', [AbsenController::class, 'rekap'])->name('rekap.kelas');
Route::get('/rekap_izin', [IzinController::class, 'rekap'])->name('rekap.izin');
Route::get('/izin/rekap', [App\Http\Controllers\IzinController::class, 'rekap'])->name('izin.rekap');

// Dashboard izin
Route::get('/izin/dashboard', [IzinController::class, 'dashboard'])->name('izin.dashboard');
Route::get('/rekap_izin', [IzinController::class, 'rekap'])->name('rekap.izin');
Route::get('/izin/create', [IzinController::class, 'index'])->name('izin.create');
Route::post('/izin/store', [IzinController::class, 'store'])->name('izin.store');



Route::get('/guru/rekap/{kelas?}', [AbsenController::class, 'rekapGuru'])->name('rekap.guru');
Route::get('/guru/rekap_izin/{kelas?}', [AbsenController::class, 'rekapIzinGuru'])->name('rekap.izin.guru');

//izin guru
Route::get('/izin/guru/dashboard', [IzinGuruController::class, 'dashboard'])->name('izin.guru.dashboard');
Route::get('/izin/guru/create', [IzinGuruController::class, 'create'])->name('izin.guru.create');
Route::post('/izin/guru/store', [IzinGuruController::class, 'store'])->name('izin.guru.store');
Route::delete('/izin/guru/{id}', [IzinGuruController::class, 'destroy'])->name('izin.guru.destroy');
