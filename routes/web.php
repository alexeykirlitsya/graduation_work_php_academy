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

Route::get('/', 'IndexPageController@show')->name('index.page');
Route::get('/ob_avtote', 'IndexPageController@about')->name('about.page');
Route::get('/kontakty', 'IndexPageController@contact')->name('contact.page');



Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
