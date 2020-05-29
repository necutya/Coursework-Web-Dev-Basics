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

// Authentication Routes...
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::post('register', 'Auth\RegisterController@register')->name('register');

// Password Reset Routes...
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');;


Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/','MainController@welcome');

Route::get('/main','MainController@landing')->name('main');
Route::get('/landing','MainController@landing')->name('landing');

Route::get('/info','MainController@info')->name('info');

Route::get('/item/{item_id}','MainController@item')->name('item');

Route::get('/catalog','MainController@catalog')->name('catalog');
Route::get('/catalog/{collection}','MainController@catalogCollection')->name('catalogCollection');

Route::post('/addToBasket/{item_id}','MainController@addToBasket')->name('addToBasket');
Route::post('/unsetBasketItem/{item_hash}','MainController@unsetBasketItem')->name('unsetBasketItem');


// Only authenticated users
Route::middleware(['auth'])->group(function(){
    Route::get('/order','AuthorizedController@orderForm');
    Route::post('/order','AuthorizedController@order')->name('order');

    Route::get('/basket','AuthorizedController@basket');

    Route::get('/account','AuthorizedController@account');
    Route::post('/account','AuthorizedController@changeAccountSettings');
    Route::post('/subscribe','AuthorizedController@subscribe')->name('account.subscribe');
    Route::post('/unsubscribe','AuthorizedController@unsubscribe')->name('account.unsubscribe');


    Route::middleware(['is_admin'])->group(function (){
        Route::get('/add','AdminController@addItemForm')->name('add');
        Route::post('/add','AdminController@addItem')->name('addItem');

        Route::get('/orders','AdminController@orders')->name('orders');
        Route::get('/order_info/{order_id}','AdminController@orderInfo')->name('orderInfo');
        Route::post('/order_info/{order_id}','AdminController@orderConfirm')->name('orderConfirm');

        Route::get('/item-refactor/{item_id}','AdminController@itemRefactorForm')->name('itemRefactorForm');
        Route::post('/item-refactor/{item_id}','AdminController@itemRefactor')->name('itemRefactor');;
        Route::post('/item-delete/{item_id}','AdminController@deleteItem')->name('delete');
    });

});
