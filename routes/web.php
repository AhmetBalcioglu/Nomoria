<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PasswordController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']); //Ana sayfa
Route::get('/about', [AboutController::class, 'index']); //Hakkımızda
Route::get('/contact', [ContactController::class, 'index']); //Contact

Route::get('/login', function () {
    return view('login.loginPage');
});
Route::get('/register', function () {
    return view('register.registerPage');
});
Route::post('/register', [UserController::class, 'create'])->name('register');
Route::post('/login', [UserController::class, 'login'])->name('login');


Route::get('/forgotPassword', function () {
    return view('forgotPassword.forgotPassword');
});

Route::get('/newPassword', function () {
    return view('newPassword.newPassword');
});

Route::post('/forgotPassword', [UserController::class, 'forgotPassword'])->name('forgotPassword');
Route::post('/send-reset-code', [PasswordController::class, 'sendResetCode'])->name('send-reset-code');
Route::post('/newPassword', [PasswordController::class, 'resetPassword'])->name('reset-password.submit');