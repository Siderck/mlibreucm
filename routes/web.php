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

#Si no existe la variable $_SESSION se crea con valor 3 de visitante
session_start();
if (empty($_SESSION)):
    $_SESSION['val'] = "3";
endif;

// Router Auth
Route::get('/login', 'ConnectController@getLogin')->name('login');
Route::post('/login', 'ConnectController@postLogin')->name('login');
Route::get('/register', 'ConnectController@getRegister')->name('register');
Route::post('/register', 'ConnectController@postRegister')->name('register');
Route::get('/logout', 'ConnectController@getLogout')->name('logout');
Route::get('/admin', 'ConnectController@getAdmin')->name('admin');
Route::get('/edit', 'ConnectController@getEdit')->name('edit');
Route::post('/edit', 'ConnectController@postEdit')->name('edit');


