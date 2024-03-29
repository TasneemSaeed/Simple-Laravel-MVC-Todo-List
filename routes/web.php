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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'TaskController@index')->name('home');
Route::post('/tasks', 'TaskController@store');

Route::post('/delete/{task}', 'TaskController@destroy');

Route::get('/home/search', 'TaskController@show');
