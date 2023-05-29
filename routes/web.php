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
Route::resource('books', 'App\Http\Controllers\BookController');
Route::resource('genres', 'App\Http\Controllers\GenreController');
Route::post('/send_comment/{id}', "App\Http\Controllers\CommentController@store")->name("addComment")->middleware('auth');

Route::group([
    'as' => 'basket.', // имя маршрута, например basket.index
    'prefix' => 'basket', // префикс маршрута, например basket/index
], function () {
    // список всех товаров в корзине
    Route::get('index', 'App\Http\Controllers\BasketController@index')
        ->name('index');
    // страница с формой оформления заказа
    Route::get('checkout', 'App\Http\Controllers\BasketController@checkout')
        ->name('checkout');
    // получение данных профиля для оформления
    Route::post('profile', 'App\Http\Controllers\BasketController@profile')
        ->name('profile');
    // отправка данных формы для сохранения заказа в БД
    Route::post('saveorder', 'App\Http\Controllers\BasketController@saveOrder')
        ->name('saveorder');
    // страница после успешного сохранения заказа в БД
    Route::get('success', 'App\Http\Controllers\BasketController@success')
        ->name('success');
    // отправка формы добавления товара в корзину
    Route::post('add/{id}', 'App\Http\Controllers\BasketController@add')
        ->where('id', '[0-9]+')
        ->name('add');
    // отправка формы изменения кол-ва отдельного товара в корзине
    Route::post('plus/{id}', 'App\Http\Controllers\BasketController@plus')
        ->where('id', '[0-9]+')
        ->name('plus');
    // отправка формы изменения кол-ва отдельного товара в корзине
    Route::post('minus/{id}', 'App\Http\Controllers\BasketController@minus')
        ->where('id', '[0-9]+')
        ->name('minus');
    // отправка формы удаления отдельного товара из корзины
    Route::post('remove/{id}', 'App\Http\Controllers\BasketController@remove')
        ->where('id', '[0-9]+')
        ->name('remove');
    // отправка формы для удаления всех товаров из корзины
    Route::post('clear', 'App\Http\Controllers\BasketController@clear')
        ->name('clear');
});
