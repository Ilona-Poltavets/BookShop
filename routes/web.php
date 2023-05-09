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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/roles', [App\Http\Controllers\PermissionController::class,'Permission']);
Route::resource('books','App\Http\Controllers\BookController');
Route::resource('genres','App\Http\Controllers\GenreController');
Route::post('/send_comment/{id}',"App\Http\Controllers\CommentController@store")->name("addComment")->middleware('auth');
