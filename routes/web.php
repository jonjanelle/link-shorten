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


Route::get('/', function () {
  return view('shorten')->with(['url'=>"",
                                'submitRoute'=>'shorten']);
});

Route::get('/home', 'HomeController@index');
Route::post('/shorten/{source}','ShortenController@shorten');

Route::get('/{short}','ShortenController@shortRoute');
