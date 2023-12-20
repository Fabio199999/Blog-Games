<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('homepage');

//ArticleController
Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');

Route::post('/articles/store', [ArticleController::class, 'store'])->name('articles.store');

Route::get('articles/index', [ArticleController::class, 'index'])->name('articles.index');

Route::get('/articles/show/{article}', [ArticleController::class, 'show'])->name('articles.show');

Route::get('/articles/edit/{article}', [ArticleController::class, 'edit'])->name('articles.edit');

Route::put('/articles/update/{article}', [ArticleController::class, 'update'])->name('articles.update');

Route::delete('/articles/delete/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');