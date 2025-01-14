<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\HandleLogin;
use App\Http\Middleware\HandleLogout;
use App\Http\Middleware\TimedExit;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\DetailsController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AddRestaurantController;
use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\FavoriteController;

use App\Http\Middleware\AdminOrRestaurant;



Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index']);
Route::get('/search', [RestaurantController::class, 'search'])->name('search');
Route::get('/filter', [RestaurantController::class, 'filter'])->name('filter');
Route::get('/contact', [ContactController::class, 'index']);
Route::get('/login', [LoginController::class, 'index']);
Route::get('/register', [LoginController::class, 'register']);
Route::post('/register', [UserController::class, 'create'])->name('register');
Route::get('/forgotPassword', [LoginController::class, 'forgotPassword']);
Route::post('/forgotPassword', [UserController::class, 'forgotPassword'])->name('forgotPassword');
Route::get('/newPassword', [LoginController::class, 'newPassword']);
Route::post('/newPassword', [PasswordController::class, 'resetPassword'])->name('reset-password.submit');
Route::post('/send-reset-code', [PasswordController::class, 'sendResetCode'])->name('send-reset-code');

// Restaurant Routes
Route::prefix('restaurants')->group(function () {
    Route::get('/', [RestaurantController::class, 'index'])->name('restaurants.index');
    Route::get('/create', [RestaurantController::class, 'createPage'])->name('createPage');
    Route::post('/create', [RestaurantController::class, 'create'])->name('create');
    Route::post('/delete/{name}', [RestaurantController::class, 'delete'])->name('delete');
    Route::post('/update/{name}', [RestaurantController::class, 'update'])->name('update');
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
Route::post('/comments', [CommentController::class, 'store']);
Route::get('/comments/{restaurant_id}', [CommentController::class, 'index']);

Route::middleware([AdminOrRestaurant::class])->group(function () {
    Route::get('/adminPanel', [AdminPanelController::class, 'index'])->name('adminPanel');
});

// Giriş yapma route

Route::middleware([HandleLogin::class])->group(function () {
    Route::post('/login', [UserController::class, 'login'])->name('login');
});

Route::middleware([HandleLogout::class])->group(function () {
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
});



Route::middleware([TimedExit::class])->group(function () {
    // Korunan rotalar
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/login', [LoginController::class, 'index']);
    Route::get('/details', [DetailsController::class, 'index']);
    Route::get('/discount', [DiscountController::class, 'discount']);
    Route::get('/about', [AboutController::class, 'index']);
    Route::get('/contact', [ContactController::class, 'index']);
    Route::get('/reservations', [ReservationController::class, 'index']);
    Route::post('/comments', [CommentController::class, 'store']);
});




Route::post('/favorites/toggle/{restaurantID}', [FavoriteController::class, 'toggleFavorite'])->name('favorites.toggle');
Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');
Route::get('/favorites', [FavoriteController::class, 'getFavorites'])->name('getFavorites');