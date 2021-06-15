<?php
Auth::routes();

//Фотограф
Route::group(['prefix' => 'ph'], function() {

    //Редактирование профиля
        Route::group(['prefix' => 'myprofile'], function() {
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
                    Route::post('/upload', 'GalleryController@uploadPhotos');
                     Route::delete('{id}', 'GalleryController@destroyphoto');
                });
            });
            
            
            //Услуги
            Route::get('/service', 'PhotographController@service')->name('service');
            Route::post('/service', 'PhotographController@storeservice');
            Route::get('/getservice', 'PhotographController@getservice');
            Route::put('/service/{id}', 'PhotographController@updateservice');
            Route::delete('/service/{id}', 'PhotographController@destroyservice');
        });
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
            Route::get('/orderlist', 'PhotographController@orderlist');
            Route::get('/show/{id}', 'PhotographController@showorder')->name('ph.order.show');
            Route::post('/response/{id}', 'ResponseController@store')->name('order.storeresponse');
            Route::post('/response/update/{id}', 'ResponseController@update')->name('order.updateresponse');
            Route::get('/response/del/{id}', 'ResponseController@destroy')->name('responses.destroy');
        });
});

Route::get('user/{user}', 'ProfileController@getProfile')->name('profile.index');
Route::get('user/gallery/{user}', 'ProfileController@getgalleryuser');
Route::get('user/photo/{user}', 'ProfileController@getphotouser');
Route::get('user/galleryphoto/{id}', 'ProfileController@getgalleryphoto');
Route::get('user/service/{user}', 'ProfileController@getservice');
Route::get('user/review/{user}', 'ProfileController@getreview');

//Информация
Route::get('/setting', 'ProfileController@setting')->name('setting');
Route::post('profile/edit', 'ProfileController@postEdit')->name('profile.edit');
Route::post('setting/avatar', 'ProfileController@avatar');
Route::get('profile/edit', 'ProfileController@getEdit')->name('profile.edit');




//Клиент
Route::get('myorder/published', 'OrderController@index')->name('myorder.client');
Route::get('myorder/execution', 'OrderController@execution')->name('myorder.execution.client');
Route::get('myorder/history', 'OrderController@history')->name('myorder.history.client');
Route::get('myorder/show/{id}', 'OrderController@show')->name('order.show');
Route::get('order/create', 'OrderController@create')->name('order.create');
Route::post('order/store', 'OrderController@store')->name('order.store');
Route::get('order/assigned/{orderId}={responseId}', 'OrderController@assigned')->name('order.assigned');
Route::get('order/cabinet/{id}', 'OrderController@cabinet')->name('client.order.cabinet');
Route::get('order/cabinet/done/{id}', 'OrderController@taskcompleted')->name('order.done');
//Каталог фотографов
Route::get('/catalog', 'HomeController@catalog')->name('catalog');
Route::get('/photograph', 'HomeController@PhotographList');


Route::get('/', 'HomeController@index')->name('home');
Route::get('/logout', 'Auth\LoginController@logout')->name('get-logout');
Route::group(['middleware' => ['role:admin']], function () {});







Route::resource('/response', 'ResponseController');
Route::resource('/reviews', 'ReviewController');
Route::resource('cabinet.reviews', 'ReviewController');
//Route::post('order/{orderId}/response', 'OrderController@addResponse')->name('order.addresponse');


Route::resource('/category', 'CategoryController');


