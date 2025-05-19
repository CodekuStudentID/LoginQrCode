<?php

use App\Http\Controllers\Auth\QRLoginController;
use App\Http\Controllers\Auth\QRRegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Registrasi
Route::get('/register', [QRRegisterController::class, 'showForm'])->name('register.form');
Route::post('/register/store', [QRRegisterController::class, 'register'])->name('register.qr');


// Login
Route::get('/login/qr', [QRLoginController::class, 'showForm'])->name('login.qr.form');
Route::post('/login/qr/active', [QRLoginController::class, 'login'])->name('login.qr');


Route::middleware('auth')->get('/dashboard', function () {
    return 'Halo, ' . auth()->user()->name . '. Anda berhasil login!';
});