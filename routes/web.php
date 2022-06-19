<?php

use App\Http\Controllers\AtcController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PengujianController;
use App\Http\Controllers\UpdatePasswordController;
use App\Http\Controllers\UserController;

Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'auth']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [PageController::class, 'index'])->name('dashboard');
    Route::post('/logout', [LoginController::class, 'logout']);
});

Route::group(['middleware' => ['auth', 'checkRole:admin']], function () {
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/user/create', [UserController::class, 'create'])->name('user-create');
    Route::post('/user/store', [UserController::class, 'store'])->name('user-store');
    Route::get('/user/{slug}/edit', [UserController::class, 'edit']);
    Route::put('/user/update', [UserController::class, 'update'])->name('user-update');
    Route::delete('/user/{slug}/destroy', [UserController::class, 'destroy']);

    Route::get('/atc/list', [AtcController::class, 'atcList'])->name('atc-list');
    Route::get('/print/all/atc', [AtcController::class, 'printAllAtc'])->name('print-all-atc');

    Route::get('/pengujian', [PengujianController::class, 'index'])->name('pengujian');
    Route::post('/pengujian/store', [PengujianController::class, 'store'])->name('pengujian-store');
    Route::delete('/pengujian/{slug}/destroy', [PengujianController::class, 'destroy']);
});

Route::group(['middleware' => ['auth', 'checkRole:examiner,atc']], function () {
    Route::get('/atc', [AtcController::class, 'index'])->name('atc');
    Route::post('/atc/store', [AtcController::class, 'store'])->name('atc-store');
    Route::get('/atc/{slug}/edit', [AtcController::class, 'edit']);
    Route::put('/atc/update', [AtcController::class, 'update'])->name('atc-update');
    Route::delete('/atc/{slug}/destroy', [AtcController::class, 'destroy']);

    Route::get('/print/atc', [AtcController::class, 'printAtc'])->name('print-atc');

    Route::get('/pengujian/atc/performance/cek', [PengujianController::class, 'atcPerformanceCek'])->name('pengujian-atc-performance-cek');
    Route::get('/pengujian/print/atc/performance/cek', [PengujianController::class, 'printAtcPerformanceCek'])->name('pengujian-print-atc-performance-cek');

    Route::get('/password', [UpdatePasswordController::class, 'edit'])->name('password');
    Route::post('/password/update', [UpdatePasswordController::class, 'update'])->name('password-update');
});

Route::group(['middleware' => ['auth', 'checkRole:examiner']], function () {
    Route::get('/pengujian/list', [PengujianController::class, 'list'])->name('pengujian-list');
    Route::get('/pengujian/{slug}/edit', [PengujianController::class, 'edit']);
    Route::put('/pengujian/update', [PengujianController::class, 'update'])->name('pengujian-update');
    Route::get('/pengujian/{slug}/verifikasi', [PengujianController::class, 'verifikasi']);
});
