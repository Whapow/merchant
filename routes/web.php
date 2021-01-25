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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('shops', 'ShopsController');
Route::get('trashed-shops', 'ShopsController@trashed')->name('shops.trashed');
Route::put('shops/{shop}/restore', 'ShopsController@restore')->name('shops.restore');