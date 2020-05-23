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

Route::get('/','MainController@welcome');

Route::get('/landing','MainController@landing');

Route::get('/info','MainController@info');

Route::get('/item','MainController@item');

Route::get('/order','MainController@order');

Route::get('/catalog','MainController@catalog');

Route::get('/account','MainController@account');

Route::get('/basket','MainController@basket');

Route::get('/admin','MainController@admin');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
