<?php
Auth::routes();


Route::get('user/gallery/{user}', 'GalleryController@getphotouser');


//Фотограф
Route::group(['prefix' => 'ph'], function() {
    //Галерея
    Route::group(['prefix' => 'gallery'], function() {
        Route::get('/', 'GalleryController@index')->name('gallery');
        Route::get('/getgallery', 'GalleryController@getgallery');
        Route::post('/', 'GalleryController@store');
        Route::get('{id}', 'GalleryController@show');
        Route::get('/getphoto/{id}', 'GalleryController@getphoto');
        Route::put('{id}', 'GalleryController@update');
        Route::delete('{id}', 'GalleryController@destroy');

        //Фото
        Route::group(['prefix' => 'photo'], function() {
            Route::post('/upload', 'PhotoController@uploadPhotos');
            Route::put('/update', 'PhotoController@update');
            Route::put('/update-attr', 'PhotoController@updateAttr');
            Route::put('/order', 'PhotoController@order');
            Route::delete('{id}', 'PhotoController@destroy');
        });
    });

    //Редактирование профиля
        //Информация
        Route::get('/info', 'PhotographController@info')->name('info');
        Route::post('/avatar', 'ProfileController@avatar');

    //Заказы
        //Мои заказы
        Route::group(['prefix' => 'myorder'], function() {
            Route::get('/show/{id}', 'PhotographController@show')->name('myorder.show');
            Route::get('/myresponses', 'PhotographController@myresponses')->name('myresponses.ph');
            Route::get('/execution', 'PhotographController@execution')->name('execution.ph');
            Route::get('/history', 'PhotographController@history')->name('history.ph');
            Route::post('/review/{id}', 'ReviewController@storeclient')->name('clientreview');
        });
        //Заказы
        Route::group(['prefix' => 'order'], function() {
            Route::get('/', 'PhotographController@order')->name('order.order');
            Route::get('/show/{id}', 'PhotographController@showorder')->name('ph.order.show');
            Route::post('/response/{id}', 'ResponseController@store')->name('order.storeresponse');
            Route::get('/response/del/{id}', 'ResponseController@destroy')->name('responses.destroy');
        });
});






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

