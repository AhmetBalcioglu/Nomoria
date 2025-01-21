<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\HandleLogin;
use App\Http\Middleware\HandleLogout;
use App\Http\Middleware\TimedExit;
use App\Http\Middleware\isCustomer;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\DetailsController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AddRestaurantController;
use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\FavoriteController;
use App\Http\Middleware\RestaurantView;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\AdminOrRestaurant;
use App\Http\Middleware\RestaurantOwner;




Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index']);
Route::get('/search', [RestaurantController::class, 'search'])->name('search');
Route::get('/search/history', [RestaurantController::class, 'getHistory']);
Route::get('/filter', [RestaurantController::class, 'filter'])->name('filter');
Route::get('/contact', [ContactController::class, 'index']);

//Login Page and Forgot Password Route
Route::get('/login', [LoginController::class, 'index']);
Route::get('/register', [LoginController::class, 'register']);
Route::post('/register', [UserController::class, 'create'])->name('register');
Route::get('/forgotPassword', [LoginController::class, 'forgotPassword']);
Route::post('/forgotPassword', [UserController::class, 'forgotPassword'])->name('forgotPassword');
Route::get('/newPassword', [LoginController::class, 'newPassword']);
Route::post('/newPassword', [PasswordController::class, 'resetPassword'])->name('reset-password.submit');
Route::post('/send-reset-code', [PasswordController::class, 'sendResetCode'])->name('send-reset-code');
// Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::middleware([isCustomer::class])->group(function () {
    Route::get('/makeReservation', [ReservationController::class, 'makeReservation'])->name('makeReservation');
});
Route::post('/makeReservation/{restaurantID}', [ReservationController::class, 'create'])->name('makeReservation.post');



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

Route::get('/restaurants/{restaurantID}', [RestaurantController::class, 'show'])
    ->middleware(RestaurantView::class)->name('restaurants.show');

// Details Route
Route::get('/details', [DetailsController::class, 'index'])->name('details');


// Contact Route
Route::post('/contact/send', [ContactController::class, 'sendMail'])->name('contact.send');

//discount Route
Route::get('/discount', [DiscountController::class, 'discount']);

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
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
});

//Restaurant Panel Route
Route::middleware([RestaurantOwner::class])->group(function () {
    Route::get('/restaurantPanel', [AdminPanelController::class, 'restaurantPanel'])->name('restaurantPanel');
});

// RestaurantManager Route
Route::get('/RestaurantManager', [RestaurantController::class, 'index'])->name('RestaurantManager');
Route::get('/RestaurantManager', [RestaurantController::class, 'getMyRestaurants'])->name('RestaurantManager');
Route::get('/RestaurantManager', [RestaurantController::class, 'getAdminRestaurants'])->name('RestaurantManager');
Route::post('/RestaurantManager/update/{restaurantID}', [RestaurantController::class, 'updateRestaurantOwner']);





//Login Logout Middleware Route
Route::middleware([HandleLogin::class, HandleLogout::class])->group(function () {
    Route::post('/login', [UserController::class, 'login'])->name('login');
});

//Timed Exit Middleware Route
Route::middleware([TimedExit::class])->group(function () {
    // Korunan rotalar
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/login', [LoginController::class, 'index']);
    Route::get('/details', [DetailsController::class, 'index']);
    Route::get('/discount', [DiscountController::class, 'discount']);
    Route::get('/about', [AboutController::class, 'index']);
    Route::get('/contact', [ContactController::class, 'index']);
    Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations');
    Route::post('/comments', [CommentController::class, 'store']);
});

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

Route::get('/my-restaurants', [DashboardController::class, 'OwnerRestaurants'])->name('my-restaurants');
