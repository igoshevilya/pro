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


//Route::get('ph/myorder', 'PhotographController@index')->name('myorder.ph');
Route::get('ph/myorder/show/{id}', 'PhotographController@show')->name('myorder.show');
Route::get('ph/order', 'PhotographController@order')->name('order.order');
Route::get('ph/order/show/{id}', 'PhotographController@showorder')->name('ph.order.show');
Route::post('ph/order/response/{id}', 'ResponseController@store')->name('order.storeresponse');
Route::get('ph/order/response/del/{id}', 'ResponseController@destroy')->name('responses.destroy');
Route::get('ph/myorder/myresponses', 'PhotographController@myresponses')->name('myresponses.ph');
Route::get('ph/myorder/execution', 'PhotographController@execution')->name('execution.ph');
Route::get('ph/myorder/history', 'PhotographController@history')->name('history.ph');
Route::post('ph/myorder/review/{id}', 'ReviewController@storeclient')->name('clientreview');

Route::get('ph/myprofile', 'PhotographController@myprofile')->name('myprofile');
Route::get('ph/myprofile/portfolio', 'UpsController@index')->name('portfolio');
Route::post('ph/myprofile/portfolio/upload', 'UpsController@store');

Route::resource('userprofile', 'UserprofileController');

Route::resource('up','UpsController');

//Route::resource('/order', 'OrderController');
Route::get('myorder', 'OrderController@index')->name('myorder.client');
Route::get('myorder/show/{id}', 'OrderController@show')->name('order.show');
Route::get('order/create', 'OrderController@create')->name('order.create');
Route::post('order/store', 'OrderController@store')->name('order.store');
Route::get('order/assigned/{orderId}={responseId}', 'OrderController@assigned')->name('order.assigned');
Route::get('order/cabinet/{id}', 'OrderController@cabinet')->name('client.order.cabinet');
Route::get('order/cabinet/done/{id}', 'OrderController@taskcompleted')->name('order.done');




Route::get('/', 'HomeController@index')->name('home');
Route::get('/logout', 'Auth\LoginController@logout')->name('get-logout');
Route::group(['middleware' => ['role:admin']], function () {});
Route::get('user/{user}', 'ProfileController@getProfile')->name('profile.index');
Route::get('profile/edit', 'ProfileController@getEdit')->name('profile.edit');
Route::post('profile/edit', 'ProfileController@postEdit')->name('profile.edit');




Route::resource('/response', 'ResponseController');

Route::resource('/reviews', 'ReviewController');
Route::resource('cabinet.reviews', 'ReviewController');
//Route::post('order/{orderId}/response', 'OrderController@addResponse')->name('order.addresponse');


Route::resource('/category', 'CategoryController');

