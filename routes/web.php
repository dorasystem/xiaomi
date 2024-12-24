<?php


use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\admin\ArticleController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CandidantController;
use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DescImageController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\HistoryController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\VacancyController;
use App\Http\Controllers\Admin\VariantController;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\SuperAdminController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\CompareController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\Page\MainController;
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
    Route::resource('articles', ArticleController::class);
    Route::resource('blogs', BlogController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('contacts', ContactController::class);
    Route::resource('faqs', FaqController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('variants', VariantController::class);
    Route::resource('histories', HistoryController::class);
    Route::resource('vacancies', VacancyController::class);
    Route::resource('candidants', CandidantController::class);
    Route::resource('desc-images', DescImageController::class);

});

Route::middleware(['auth'])->group(function () {
    Route::get('/profile',[UserController::class, 'profile'])->name('user.profile');
    Route::get('orders', [UserController::class, 'orders'])->name('orders');
    Route::get('cart', [UserController::class, 'cart'])->name('cart');
    Route::get('checkout', [UserController::class, 'checkout'])->name('checkout');

});

Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('/about', [MainController::class, 'about'])->name('abput');
Route::get('/contact', [MainController::class, 'contact'])->name('contact');
Route::get('/blog', [MainController::class, 'blog'])->name('blog');
Route::get('/blog/{slug}', [MainController::class, 'singleBlog'])->name('single.blog');


Route::get('/products', [MainController::class, 'products'])->name('products');
Route::get('/single-product/{slug}', [MainController::class, 'singleProduct'])->name('single.product');
//Route::get('/product{slug}', [MainController::class, 'singleProduct'])->name('single.product');

Route::get('/news', [MainController::class, 'news'])->name('news');
Route::get('/career', [MainController::class, 'career'])->name('career');
Route::get('/news/{slug}', [MainController::class, 'singleNews'])->name('single.news');
Route::get('/article/{slug}', [MainController::class, 'singleArticle'])->name('single.article');

Route::get('/compare', [CompareController::class, 'compare'])->name('compare');



Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::post('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('addToCart');
Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('cart.add');
Route::delete('/remove-from-cart', [CartController::class, 'removeFromCart'])->name('removeFromCart');
Route::delete('/variants/{id}', [ProductController::class, 'deleteVariant']);


Route::get('locale/{lang}',[LanguageController::class, 'setLocale']);
