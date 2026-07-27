<?php

use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

// --------------------------------------------------------------------------
// Front-Office (Espace Public)
// --------------------------------------------------------------------------
Route::get('/', [ArticleController::class, 'index'])->name('home');
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');

// --------------------------------------------------------------------------
// Back-Office (Espace Admin)
// --------------------------------------------------------------------------
Route::prefix('admin')->name('admin.')->group(function () {

    // Génère automatiquement les 7 routes CRUD (index, create, store, show, edit, update, destroy)
    // Noms de routes générés : admin.articles.index, admin.articles.create, etc.
    Route::resource('articles', AdminArticleController::class);

    Route::resource('categories', CategoryController::class);
});
