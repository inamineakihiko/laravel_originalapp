<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productlistController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function() {
    Route::prefix('/productlist')->group(function(){
        Route::get('/', 'App\Http\Controllers\ProductlistController@index')->name('productlist.index');

        Route::patch('/', 'App\Http\Controllers\ProductlistController@like');

        Route::get('/{id}/disp', 'App\Http\Controllers\ProductlistController@disp')->name('productlist.disp');

        Route::get('/{id}/disp/contact', 'App\Http\Controllers\ProductlistController@showContactform')->name('productlist.contact');

        Route::post('/{id}/disp/contact', 'App\Http\Controllers\ProductlistController@contact');

        Route::get('/search', 'App\Http\Controllers\ProductlistController@showSearchform')->name('productlist.search');

        Route::post('/search', 'App\Http\Controllers\ProductlistController@search');
    });
    
    Route::prefix('/mypage')->group(function(){
        Route::get('/', 'App\Http\Controllers\mypageController@showMypageForm')->name('mypage.index');

        Route::post('/', 'App\Http\Controllers\mypageController@update');

        Route::get('/favorite', 'App\Http\Controllers\mypageController@showFavoriteform')->name('mypage.favorite');

        Route::delete('/favorite','App\Http\Controllers\ProductlistController@destroy');

        Route::get('/register_history', 'App\Http\Controllers\mypageController@showRegisterhistoryForm')->name('mypage.register');

        Route::get('/purchase_history', 'App\Http\Controllers\mypageController@showPurchasehistoryForm')->name('mypage.purchase');

        Route::post('/purchase_history', 'App\Http\Controllers\ProductlistController@order');
    });

    Route::prefix('/item/register')->group(function(){
        Route::get('/', 'App\Http\Controllers\ItemController@showRegisterForm')->name('item.register');

        Route::get('/{id}/edit', 'App\Http\Controllers\ItemController@showEditForm')->name('item.edit');

        Route::post('/{id}/edit', 'App\Http\Controllers\ItemController@update');

        Route::post('/', 'App\Http\Controllers\ItemController@create');
    });

    Route::prefix('/admin')->group(function(){
        Route::get('/','App\Http\Controllers\ProductlistController@admin')->name('/admin');

        Route::post('/','App\Http\Controllers\ProductlistController@adminupdate');
    });
});

Auth::routes();


