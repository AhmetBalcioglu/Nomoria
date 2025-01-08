<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\DetailsController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\ReservationController;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index']);
Route::get('/contact', [ContactController::class, 'index']);
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/register', [LoginController::class, 'register']);
Route::post('/register', [UserController::class, 'create'])->name('register');
Route::get('/forgotPassword', [LoginController::class, 'forgotPassword']);
Route::post('/forgotPassword', [UserController::class, 'forgotPassword'])->name('forgotPassword');
Route::get('/newPassword', [LoginController::class, 'newPassword']);
Route::post('/newPassword', [PasswordController::class, 'resetPassword'])->name('reset-password.submit');
Route::post('/send-reset-code', [PasswordController::class, 'sendResetCode'])->name('send-reset-code');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

// Restaurant Routes
Route::prefix('restaurants')->group(function () {
    Route::get('/', [RestaurantController::class, 'index'])->name('restaurants.index');
    Route::get('/create', [RestaurantController::class, 'createPage'])->name('createPage');
    Route::post('/create', [RestaurantController::class, 'create'])->name('create');
    Route::delete('/delete/{id}', [RestaurantController::class, 'delete'])->name('delete');
    Route::post('/update/{id}', [RestaurantController::class, 'update'])->name('update');
    Route::get('/all', [RestaurantController::class, 'allRestaurants'])->name('getRestaurants');
    Route::get('/{placeId}', [RestaurantController::class, 'show'])->name('restaurants.details');
});

// Details Route
Route::get('/details', [DetailsController::class, 'index']);

// Contact Route
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

//discount Route
Route::get('/discount', [DiscountController::class, 'discount']);
//reservation Route
Route::get('/reservations', [ReservationController::class, 'index']);
Route::get('/addRestaurant', [\App\Http\Controllers\AddRestaurantController::class, 'index'])->name('addRestaurant');
