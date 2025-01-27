<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\DetailsController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\DashboardController;

use App\Http\Middleware\HandleLogin;
use App\Http\Middleware\HandleLogout;
use App\Http\Middleware\TimedExit;
use App\Http\Middleware\isCustomer;
use App\Http\Middleware\RestaurantView;
use App\Http\Middleware\AdminOrRestaurant;
use App\Http\Middleware\RestaurantOwner;
use App\Http\Middleware\LoginRegisterUrl;


Route::get('/dashboard', function () {
    return view('layouts.dashboard');
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index']);
Route::get('/search', [RestaurantController::class, 'search'])->name('search');
Route::get('/search/history', [RestaurantController::class, 'getHistory']);
Route::get('/filter', [RestaurantController::class, 'filter'])->name('filter');
Route::get('/contact', [ContactController::class, 'index']);
Route::get('/profile', [LoginController::class, 'profile'])->name('profile');
Route::post('/profile/update/{userID}', [UserController::class, 'update'])->name('update');
Route::post('/profile/send-verification-code', [UserController::class, 'sendVerificationCode'])->name('sendVerificationCode');



Route::get('/login', [LoginController::class, 'index'])->middleware(LoginRegisterUrl::class);
Route::get('/register', [LoginController::class, 'register'])->middleware(LoginRegisterUrl::class);

Route::post('/register', [UserController::class, 'create'])->name('register');
Route::get('/forgotPassword', [LoginController::class, 'forgotPassword']);
Route::post('/forgotPassword', [UserController::class, 'forgotPassword'])->name('forgotPassword');
Route::get('/newPassword', [LoginController::class, 'newPassword']);
Route::post('/newPassword', [PasswordController::class, 'resetPassword'])->name('reset-password.submit');
Route::post('/send-reset-code', [PasswordController::class, 'sendResetCode'])->name('send-reset-code');
Route::middleware([isCustomer::class])->group(function () {
    Route::get('/makeReservation', [ReservationController::class, 'makeReservation'])->name('makeReservation');
});
Route::post('/makeReservation/{restaurantID}', [ReservationController::class, 'create'])->name('makeReservation.post');



// Restaurant Routes
Route::prefix('restaurants')->group(function () {
    Route::get('/create', [RestaurantController::class, 'redirectFromCreatePage'])->name('createPage');
    Route::post('/create', [RestaurantController::class, 'create'])->name('create');
    Route::post('/delete/{name}', [RestaurantController::class, 'delete'])->name('delete');
    Route::post('/update/{name}', [RestaurantController::class, 'update'])->name('update');
    Route::get('/all', [RestaurantController::class, 'allRestaurants'])->name('getRestaurants');
    Route::get('/{placeId}', [RestaurantController::class, 'show'])->name('restaurants.details');
});

Route::get('/restaurants/{restaurantID}', [RestaurantController::class, 'show'])
    ->middleware(RestaurantView::class)->name('restaurants.show');

// Details Route
Route::get('/details', [DetailsController::class, 'index'])->name('details');


// Contact Route
Route::post('/contact/send', [ContactController::class, 'sendMail'])->name('contact.send');

//discount Route
Route::get('/discount', [DiscountController::class, 'discount']);
Route::post('/discount/create/{name}', [DiscountController::class, 'create'])->name('discount.create');
Route::post('/discount/delete/{name}', [DiscountController::class, 'delete'])->name('discount.delete');

//Comments Route
Route::prefix('comments')->group(function () {
    Route::post('/', [CommentController::class, 'store'])->name('comments.store');
    Route::get('/{restaurant_id}', [CommentController::class, 'index']);
    Route::delete('/{comment_id}', [CommentController::class, 'destroy'])->name('comments.destroy');
    Route::put('/{comment_id}', [CommentController::class, 'update'])->name('comments.update');
});

//Admin Panel Route
Route::middleware([AdminOrRestaurant::class])->group(function () {
    Route::get('/adminPanel', [AdminPanelController::class, 'index'])->name('adminPanel');
});


//Restaurant Panel Route
Route::middleware([RestaurantOwner::class])->group(function () {
    Route::get('/restaurantPanel', [AdminPanelController::class, 'restaurantPanel'])->name('restaurantPanel');
});

Route::prefix('RestaurantManager')->group(function () {
    Route::get('/', [RestaurantController::class, 'getMyRestaurants'])->name('RestaurantManager');
    Route::post('/update/{restaurantID}', [RestaurantController::class, 'updateRestaurantOwner']);
});

Route::get('/controlPanel', [DashboardController::class, 'showControlPanel'])->name('controlPanel');
Route::get('analiz/{restaurantID?}', [DashboardController::class, 'showAnalytics'])->name('analytics');

//Login Logout Middleware Route
Route::middleware([HandleLogin::class, HandleLogout::class])->group(function () {
    Route::post('/login', [UserController::class, 'login'])->name('login')->middleware(LoginRegisterUrl::class);
});

//Timed Exit Middleware Route
Route::middleware([TimedExit::class])->group(function () {
    // Korunan rotalar
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/login', [LoginController::class, 'index'])->middleware(LoginRegisterUrl::class);
    Route::get('/details', [DetailsController::class, 'index']);
    Route::get('/discount', [DiscountController::class, 'discount']);
    Route::get('/about', [AboutController::class, 'index']);
    Route::get('/contact', [ContactController::class, 'index']);
    Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations');
    Route::post('/comments', [CommentController::class, 'store']);
});

Route::delete('/reservation/delete/{id}', [ReservationController::class, 'delete'])->name('reservation.delete');
Route::patch('/reservation/update/{id}', [ReservationController::class, 'update'])->name('reservation.update');

// Favorite Routes
Route::prefix('favorites')->group(function () {
    Route::post('/toggle/{restaurantID}', [FavoriteController::class, 'toggleFavorite'])->name('favorites.toggle');
    Route::get('/', [FavoriteController::class, 'index'])->name('favorites.index');
    Route::get('/toggle/{categoryID}', [FavoriteController::class, 'toggleFavoriteCategory']);
    Route::get('/', [FavoriteController::class, 'getFavoritesAndCategories'])->name('favorites.all');
});

Route::get('/logout', function () {
    $logoutHandler = new HandleLogout();
    return $logoutHandler->handle();
})->name('logout');


// Geçmiş rezervasyonlarım
Route::get('/historyRezervations', [ReservationController::class, 'historyRezervations']);

//menu
Route::get('/restaurants/{id}/menu', [RestaurantController::class, 'getMenu']);
