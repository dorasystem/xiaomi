<?php


use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CandidantController;
use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DescImageController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\HistoryController;
use App\Http\Controllers\Admin\MainBannerController;
use App\Http\Controllers\Admin\ManualController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\StaticKeywordController;
use App\Http\Controllers\Admin\StoreController;
use App\Http\Controllers\Admin\VacancyController;
use App\Http\Controllers\Admin\VariantController;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\SuperAdminController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\CompareController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\Page\MainController;
use App\Http\Controllers\Page\SiteController;
use Illuminate\Support\Facades\Route;


//Admin panel login register start
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'userRegister'])->name('user.register');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
//Admin panel login register end


Route::middleware(['auth'])->prefix('dashboard')->group(function () {
    Route::get('/', [SuperAdminController::class, 'superAdmin'])->name('superAdmin.dashboard');
    Route::get('/admin', [AdminController::class, 'admin'])->name('admins.dashboard');
    Route::resource('abouts', AboutController::class);
    Route::resource('news', NewsController::class);
    Route::resource('articles', ArticleController::class);
    Route::resource('stores', StoreController::class);
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
    Route::resource('main_banners', MainBannerController::class);
    Route::resource('manuals', ManualController::class);
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::put('/orders/{order}', [OrderController::class, 'update'])->name('orders.update');
    Route::get('/orders/{order}/edit', [OrderController::class, 'edit'])->name('orders.edit');
    Route::delete('/orders/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');
    Route::delete('/dashboard/main-banner/{mainBanner}/delete-image/{image}', [MainBannerController::class, 'deleteImage'])->name('mainBanner.deleteImage');
    Route::resource('keywords', StaticKeywordController::class);
    Route::post('/blogs/delete-image', [BlogController::class, 'deleteImage'])->name('blogs.deleteImage');
    //    Route::delete('/main-banner/{blog}/delete-image', [MainBannerController::class, 'destroy']);
});

Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('/about', [MainController::class, 'about'])->name('about');
Route::get('/contact', [MainController::class, 'contact'])->name('contact');
Route::get('/blog', [MainController::class, 'blog'])->name('blog');
Route::get('/blog/{slug}', [MainController::class, 'singleBlog'])->name('single.blog');
Route::get('/category/{slug}', [MainController::class, 'categorySort'])->name('category.sort');


Route::get('/products', [MainController::class, 'products'])->name('products');
Route::get('/product/{slug}', [MainController::class, 'singleProduct'])->name('single.product');
//Route::get('/product{slug}', [MainController::class, 'singleProduct'])->name('single.product');

Route::get('/news', [MainController::class, 'news'])->name('news');
Route::get('/career', [MainController::class, 'career'])->name('career');
Route::get('/news/{slug}', [MainController::class, 'singleNews'])->name('single.news');
Route::get('/article/{slug}', [MainController::class, 'singleArticle'])->name('single.article');

Route::get('/compare', [CartController::class, 'compare'])->name('compare');
Route::post('/toggle-compare', [CartController::class, 'toggleCompare'])->name('toggle.compare');



Route::get('cart', [CartController::class, 'cart'])->name('cart');
Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('addToCart');
Route::delete('/remove-from-cart', [CartController::class, 'removeFromCart'])->name('removeFromCart');
Route::delete('/remove-all-cart', [CartController::class, 'removeAllCart'])->name('removeAllCart');
Route::post('/update-cart', [CartController::class, 'updateCart'])->name('cart.update');

Route::delete('/variants/{id}', [ProductController::class, 'deleteVariant']);
Route::get('/favorites', [CartController::class, 'favorites'])->name('favorites');
Route::post('/toggle-favorite', [CartController::class, 'toggleFavorite'])->name('toggle.favorite');
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');

Route::get('/products/search', [MainController::class, 'productSearch'])->name('products.search');
Route::get('/products/filter', [MainController::class, 'filterProducts'])->name('products.filter');
Route::get('checkout', [MainController::class, 'checkout'])->name('checkout');
Route::post('/save-order', [OrderController::class, 'store'])->name('orders.store');
Route::post('/form-order', [OrderController::class, 'storeForm'])->name('orders.store.form');
Route::post('/product-order', [OrderController::class, 'productsStore'])->name('orders.products.store');
Route::get('locale/{lang}', [LanguageController::class, 'setLocale']);
Route::get('/404', [MainController::class, 'error'])->name('404');


//  sites blade
Route::get('/faq', [SiteController::class, 'faq'])->name('faq');
Route::get('/payment', [SiteController::class, 'payment'])->name('payment');
Route::get('/delivery', [SiteController::class, 'delivery'])->name('delivery');
Route::get('/return-of-goods', [SiteController::class, 'returnOfGoods'])->name('return.of.goods');
Route::get('/warranty', [SiteController::class, 'warranty'])->name('warranty');
Route::get('/info/manuals', [SiteController::class, 'manuals'])->name('manuals');

Route::fallback(function () {
    return redirect()->route('404');
});
