<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ArticlesController;

Route::get('/', [ArticlesController::class, 'index'])->name('index');
Route::get('/edit/{id?}', [ArticlesController::class, 'edit'])->name('edit');
Route::get('/show/{id?}', [ArticlesController::class, 'show'])->name('show');
Route::get('/delete/{id?}', [ArticlesController::class, 'destroy'])->name('delete');
Route::post('update/{id}', [ArticlesController::class, 'update'])->name('update');
Route::post('store', [ArticlesController::class, 'store'])->name('store');
Route::get('/create', [ArticlesController::class, 'create'])->name('create');
Route::get('Articles-export', [ArticlesController::class, 'export'])->name('Articles.export');
Route::post('Articles-import', [ArticlesController::class, 'import'])->name('Articles.import');
Route::delete('/delete-article', [ArticlesController::class,'deleteArticle']);