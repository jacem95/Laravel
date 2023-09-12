<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\MainControler;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [MainControler::class, 'home'])->name('home');

Route::get('/articles', [MainControler::class, 'index'])->name('articles');
Route::get('/articles/{slug}', [MainControler::class, 'show'])->name('article');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/admin/articles', [ArticleController::class, 'index'])->middleware('admin')->name('articles.index');
