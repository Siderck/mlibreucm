<?php

Route::prefix('/admin')->group(function(){
    Route::get('/', 'Admin\DashboardController@getDashboard');

    //Modulo usuarios
    Route::get('/users', 'Admin\UserController@getUsers');
    Route::get('/users/create', 'ConnectController@getRegister')->name('register');
    //Route::get('/register', 'ConnectController@getRegister')->name('register');

    Route::delete('/delete/{rut}', 'Admin\UserController@Delete')->name("user.delete");
    Route::get('/user/{rut}/edit', 'Admin\UserController@getUserEdit');
    Route::post('user/update', 'Admin\UserController@update')->name('user.update');

    // Modulo Productos
    Route::get('/products','Admin\ProductController@getHome');
    Route::get('/product/add','Admin\ProductController@getProductAdd');
});

