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
Route::get('/extension','Front\ExtensionController@index');
Route::get('/schedule','Front\ScheduleController@index');
Route::get('/schedule-confirmation','Front\ScheduleController@confirm');

Route::get('/', function () {
    return view('register');
});

Route::get('/visa-history', 'Visa\VisaHistoryController@index');