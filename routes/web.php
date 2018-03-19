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


/**** PAGES *****/

//index page
Route::get('/', 'IndexPageController@show')->name('index.page');
//contact page
Route::get('/pages/kontakty', 'IndexPageController@contact')->name('contact.page');
Route::post('/pages/kontakty', 'IndexPageController@postContact')->name('post.contact.page');
//others pages

Route::resource('/pages', 'AdminPagesController');
Route::resource('/main-menu', 'AdminMainMenuController');


//Admin
Route::prefix('admin')->group(function () {
    Route::get('/','AdminIndexPageController@show')->name('admin.page');
    Route::resource('/categories-menu', 'AdminIndexCategoriesMenu');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
