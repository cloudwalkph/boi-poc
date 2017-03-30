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

Route::get('/home', 'RegisterController@index');
Route::post('/update', 'RegisterController@update');

Route::get('/', function () {
    return view('register');
});

Route::get('/payment', function () {
    return view('payment');
});