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
Route::get('/productlist', 'App\Http\Controllers\ProductlistController@index')->name('productlist.index');

Route::patch('/productlist', 'App\Http\Controllers\ProductlistController@like');

Route::get('/productlist/{id}/disp', 'App\Http\Controllers\ProductlistController@disp')->name('productlist.disp');

Route::get('/productlist/{id}/disp/contact', 'App\Http\Controllers\ProductlistController@showContactform')->name('productlist.contact');

Route::post('/productlist/{id}/disp/contact', 'App\Http\Controllers\ProductlistController@contact');

Route::get('/productlist/search', 'App\Http\Controllers\ProductlistController@showSearchform')->name('productlist.search');

Route::post('/productlist/search', 'App\Http\Controllers\ProductlistController@search');

Route::get('/mypage', 'App\Http\Controllers\mypageController@showMypageForm')->name('mypage.index');

Route::post('/mypage', 'App\Http\Controllers\mypageController@update');

Route::get('/mypage/favorite', 'App\Http\Controllers\mypageController@showFavoriteform')->name('mypage.favorite');

Route::delete('/mypage/favorite','App\Http\Controllers\ProductlistController@destroy');

Route::get('/mypage/register_history', 'App\Http\Controllers\mypageController@showRegisterhistoryForm')->name('mypage.register');

Route::get('/mypage/purchase_history', 'App\Http\Controllers\mypageController@showPurchasehistoryForm')->name('mypage.purchase');

Route::post('/mypage/purchase_history', 'App\Http\Controllers\ProductlistController@order');

Route::get('/item/register', 'App\Http\Controllers\ItemController@showRegisterForm')->name('item.register');

Route::get('/item/register/{id}/edit', 'App\Http\Controllers\ItemController@showEditForm')->name('item.edit');

Route::post('/item/register/{id}/edit', 'App\Http\Controllers\ItemController@update');

Route::post('/item/register', 'App\Http\Controllers\ItemController@create');

Route::get('/admin','App\Http\Controllers\ProductlistController@admin')->name('/admin');

Route::post('/admin','App\Http\Controllers\ProductlistController@adminupdate');
});

Auth::routes();


