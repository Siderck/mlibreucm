<?php

Route::prefix('/admin')->group(function(){
    Route::get('/', 'Admin\DashboardController@getDashboard');

    //Modulo usuarios
    Route::get('/users', 'Admin\UserController@getUsers');
    Route::get('/users/create', 'ConnectController@getRegister')->name('register');
    //Route::get('/register', 'ConnectController@getRegister')->name('register');

    Route::delete('/delete/{rut}', 'Admin\UserController@Delete')->name("user.delete");
    Route::get('/user/{rut}/edit', 'Admin\UserController@getUserEdit')->name('edit_admin');
    Route::post('/user/{rut}/edit', 'Admin\UserController@postUserEdit')->name('edit_admin');

    // Modulo Productos
    Route::get('/products','Admin\ProductController@getHome');
    Route::get('/product/add','Admin\ProductController@getProductAdd');
    Route::post('/product/add','Admin\ProductController@postProductAdd');
});

