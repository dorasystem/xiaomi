<?php

use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\TestimonialController;
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


Route::post('/comments', [CommentController::class, 'store']);
Route::get('/products/{product}/comments', [CommentController::class, 'getByProduct']);
