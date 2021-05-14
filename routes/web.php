<?php

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
Route::get('/', 'HomeController@index')->name('home');
Route::get('/logout', 'Auth\LoginController@logout')->name('get-logout');
Route::group(['middleware' => ['role:admin']], function () {});
Route::get('user/{user}', 'ProfileController@getProfile')->name('profile.index');
Route::get('profile/edit', 'ProfileController@getEdit')->name('profile.edit');
Route::post('profile/edit', 'ProfileController@postEdit')->name('profile.edit');


Route::resource('/order', 'OrderController');

Route::resource('/response', 'ResponseController');

Route::post('order/create', 'OrderController@store')->name('order.store');
Route::get('order/assigned/{orderId}={responseId}', 'OrderController@assigned')->name('order.assigned');

Route::get('order/cabinet/{id}', 'OrderController@cabinet')->name('order.cabinet');
Route::get('order/cabinet/done/{id}', 'OrderController@taskcompleted')->name('order.done');
Route::resource('/reviews', 'ReviewController');
Route::resource('cabinet.reviews', 'ReviewController');
//Route::post('order/{orderId}/response', 'OrderController@addResponse')->name('order.addresponse');


Route::resource('/category', 'CategoryController');

