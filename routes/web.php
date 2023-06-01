<?php

use Illuminate\Support\Facades\Cookie;
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
Route::resource('books', 'App\Http\Controllers\BookController');
Route::resource('genres', 'App\Http\Controllers\GenreController');
Route::resource('category', 'App\Http\Controllers\CategoryController');
Route::resource('publisher', 'App\Http\Controllers\PublisherController');
Route::post('/send_comment/{id}', "App\Http\Controllers\CommentController@store")->name("addComment")->middleware('auth');


/*
|--------------------------------------------------------------------------
| User Basket
|--------------------------------------------------------------------------
*/

Route::group([
    'as' => 'basket.',
    'prefix' => 'basket',
], function () {
    Route::get('index', 'App\Http\Controllers\BasketController@index')
        ->name('index');
    Route::get('checkout', 'App\Http\Controllers\BasketController@checkout')
        ->name('checkout')->middleware('auth');
    Route::post('profile', 'App\Http\Controllers\BasketController@profile')
        ->name('profile');
    Route::post('saveorder', 'App\Http\Controllers\BasketController@saveOrder')
        ->name('saveorder');
    Route::get('success', 'App\Http\Controllers\BasketController@success')
        ->name('success');
    Route::post('add/{id}', 'App\Http\Controllers\BasketController@add')
        ->where('id', '[0-9]+')
        ->name('add');
    Route::post('plus/{id}', 'App\Http\Controllers\BasketController@plus')
        ->where('id', '[0-9]+')
        ->name('plus');
    Route::post('minus/{id}', 'App\Http\Controllers\BasketController@minus')
        ->where('id', '[0-9]+')
        ->name('minus');
    Route::post('remove/{id}', 'App\Http\Controllers\BasketController@remove')
        ->where('id', '[0-9]+')
        ->name('remove');
    Route::post('clear', 'App\Http\Controllers\BasketController@clear')
        ->name('clear');
});

Route::post('/rating/update', 'App\Http\Controllers\RateController@update')->name('rating.update');
Route::get('/top_books', 'App\Http\Controllers\BookController@getTop')->name('top_books');
Route::post('/search', 'App\Http\Controllers\SearchController@searchBook')->name('search.book');
Route::get('/suggestions', 'App\Http\Controllers\SearchController@suggestions')->name('suggestions');

/*
|--------------------------------------------------------------------------
| Change language
|--------------------------------------------------------------------------
*/

Route::get('setlocale/{lang}', function ($lang) {
    Cookie::queue('lang', $lang);

    return redirect()->back();
})->name('setlocale');
