<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/deneme', function () {
    return view('front-views.layouts.masterPage');
});

Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('/', function () {
    return view('back-views.dashboard');
    })->name('dashboard');

    Route::prefix('categories')->name('category.')->group(function(){
        Route::get('/', [App\Http\Controllers\Back\CategoryController::class, 'index'])->name('index');
        Route::get('/add', [App\Http\Controllers\Back\CategoryController::class, 'create'])->name('create');
        Route::post('/add', [App\Http\Controllers\Back\CategoryController::class, 'store'])->name('store');
        Route::get('/show/{id}', [App\Http\Controllers\Back\CategoryController::class, 'show'])->name('show');
        Route::get('/edit/{id}', [App\Http\Controllers\Back\CategoryController::class, 'edit'])->name('edit');
        Route::post('/edit/{id}', [App\Http\Controllers\Back\CategoryController::class, 'update'])->name('update');
        Route::get('/destroy/{id}', [App\Http\Controllers\Back\CategoryController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('articles')->name('article.')->group(function(){
        Route::get('/', [App\Http\Controllers\Back\ArticleController::class, 'index'])->name('index');
        Route::get('/add', [App\Http\Controllers\Back\ArticleController::class, 'create'])->name('create');
        Route::post('/add', [App\Http\Controllers\Back\ArticleController::class, 'store'])->name('store');
        Route::get('/show/{id}', [App\Http\Controllers\Back\ArticleController::class, 'show'])->name('show');
        Route::get('/edit/{id}', [App\Http\Controllers\Back\ArticleController::class, 'edit'])->name('edit');
        Route::post('/edit/{id}', [App\Http\Controllers\Back\ArticleController::class, 'update'])->name('update');
        Route::get('/destroy/{id}', [App\Http\Controllers\Back\ArticleController::class, 'destroy'])->name('destroy');
    });
});

Route::prefix('/')->name('home.')->group(function(){
    Route::get('/', function () {
    return view('front-views.dashboard');
    })->name('dashboard');

    Route::get('/{category_name}/makaleler', [App\Http\Controllers\Front\ArticleController::class, 'index'])->name('index');
});
