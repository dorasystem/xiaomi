<?php

use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::middleware('auth:sanctum')->group(function () {
    Route::get('products/{productId}/testimonials', [TestimonialController::class, 'index']);
    Route::post('products/{productId}/testimonials', [TestimonialController::class, 'store']);
    Route::get('testimonials/{id}', [TestimonialController::class, 'show']);
});
Route::get('/dashboard', function () {
    return 'OK';
})->middleware('basic.custom');


Route::post('/comments', [CommentController::class, 'store']);
Route::get('/products/{product}/comments', [CommentController::class, 'getByProduct']);


Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth.basic')->group(function () {
    Route::get('products', [ProductController::class, 'index']);
    Route::get('products/{id}', [ProductController::class, 'show']);
    Route::post('products', [ProductController::class, 'store']);
    Route::put('products/{id}', [ProductController::class, 'update']);
    Route::delete('products/{id}', [ProductController::class, 'destroy']);
    Route::post('/products/code', [ProductController::class, 'updateMultiple']);
});
