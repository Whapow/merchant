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

Route::get('shops', 'ShopsController@index');
Route::get('shops/new', 'ShopsController@new');
Route::post('shops/create', 'ShopsController@create');
Route::get('shops/{shop}', 'ShopsController@show');
Route::get('shops/{shop}/edit', 'ShopsController@edit');
Route::post('shops/{shop}/update', 'ShopsController@update');
Route::get('shops/{shop}/delete', 'ShopsController@delete');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
