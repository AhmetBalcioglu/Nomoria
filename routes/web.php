<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']); //Ana sayfa
Route::get('/about', [AboutController::class, 'index']); //Hakkımızda
Route::get('/contact', [ContactController::class, 'index']); //Contact
