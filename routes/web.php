<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ArticleController;

Route::get('/', function () {
    return view('home');
});
Route::get('/articles', [ArticleController::class, 'index']);
Route::get('/admin/categories', [CategoryController::class, 'adminIndex']);
Route::get('/admin/articles', [ArticleController::class, 'adminIndex']);
