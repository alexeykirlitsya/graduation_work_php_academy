<?php

/**** PAGES *****/

//index page
Route::get('/', 'Page\IndexPageController@showHomePage')->name('index.page');

//contact page
Route::get('/page/kontakty', 'Page\IndexPageController@showContactPage')->name('contact.page');
Route::post('/page/kontakty', 'Page\IndexPageController@postContactPage')->name('post.contact.page');

//single page
Route::get('/page/{slug}', 'Page\IndexPageController@showSinglePage')->name('single.page');

//category page
Route::get('/category/{slug}','Page\IndexPageController@showCategoryPage')->name('category.page')->where('slug', '[\w\d\-\_]+');

//post
Route::get('/post/{slug}','Page\IndexPageController@showPostPage')->name('post.page')->where('slug', '[\w\d\-\_]+');

//comments in the single post
Route::post('/comments','Page\IndexPageController@postCommentsPost')->name('post.comment.store');

// Search
Route::get('/search}', 'Page\IndexPageController@search')->name('search');

/**** ADMIN *****/
Route::group(['prefix' => 'admin',  'middleware' => ['auth','role:admin']],function () {
    //admin home page
    Route::get('/','Admin\PageController@home')->name('admin.home');
    //admin main menu
    Route::resource('/main-menu', 'Admin\MainMenuController');
    //pages
    Route::resource('/pages', 'Admin\PagesController');
    //categories-menu
    Route::resource('/categories-menu', 'Admin\CategoriesMenuController');
    //categories
    Route::resource('/categories', 'Admin\CategoriesController');
    //posts
    Route::resource('/posts', 'Admin\PostsController');
    //comments
    Route::resource('/comments', 'Admin\CommentsController')->except(['create', 'store']);
    //users
    Route::resource('/users', 'Admin\UsersController');
});

/**** AUTH *****/
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//Socialite auth (google)
Route::get('login/{service}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{service}/callback', 'Auth\LoginController@handleProviderCallback');