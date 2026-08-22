<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\DashboardController;

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('admin')
    ->name('dashboard');


/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/

Route::middleware('admin')->group(function () {

    // Articles
    Route::get('/articles/report/pdf', [ArticleController::class, 'report'])
        ->name('articles.report');

    Route::resource('articles', ArticleController::class);

    // Products
    Route::resource('products', ProductController::class);

    // Galleries
    Route::resource('galleries', GalleryController::class);

});