<?php

use App\Http\Controllers\admin\AboutController;
use App\Http\Controllers\admin\CartController;
use App\Http\Controllers\admin\ContactController;
use App\Http\Controllers\admin\FaqController;
use App\Http\Controllers\admin\NewsController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\auth\AdminController;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\auth\SuperAdminController;
use App\Http\Controllers\auth\UserController;
use App\Http\Controllers\frontend\MainController;
use Illuminate\Support\Facades\Route;


//Admin panel login register start
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'userRegister'])->name('user.register');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
//Admin panel login register end


Route::middleware(['auth'])->prefix('dashboard')->group(function () {
    Route::get('/',[SuperAdminController::class, 'superAdmin'])->name('superAdmin.dashboard');
    Route::get('/admin',[AdminController::class, 'admin'])->name('admins.dashboard');
    Route::resource('abouts', AboutController::class);
    Route::resource('news', NewsController::class);
    Route::resource('blogs', NewsController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('contacts', ContactController::class);
    Route::resource('faqs', FaqController::class);
    Route::resource('products', ProductController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/profile',[UserController::class, 'profile'])->name('user.profile');
    Route::get('orders', [UserController::class, 'orders'])->name('orders');
    Route::get('cart', [UserController::class, 'cart'])->name('cart');
    Route::get('checkout', [UserController::class, 'checkout'])->name('checkout');
});

Route::get('/', [MainController::class, 'index'])->name('home');

Route::get('/products', [MainController::class, 'products'])->name('products');
Route::get('/single-product', [MainController::class, 'singleProduct'])->name('single.product');
//Route::get('/product{slug}', [MainController::class, 'singleProduct'])->name('single.product');
Route::get('/news', [MainController::class, 'news'])->name('news');
Route::get('/single-news', [MainController::class, 'singleNews'])->name('single.news');
//Route::get('/news{slug}', [MainController::class, 'singleNews'])->name('single.news');


Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::post('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('addToCart');
Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('cart.add');
Route::delete('/remove-from-cart', [CartController::class, 'removeFromCart'])->name('removeFromCart');
