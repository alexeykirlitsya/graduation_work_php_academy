<?php

/**** ALL PAGES *****/
Route::namespace('Page')->group(function(){
    //index page
    Route::get('/', 'IndexPageController@showHomePage')->name('index.page');
    //contact page
    Route::get('/page/kontakty', 'IndexPageController@showContactPage')->name('contact.page');
    Route::post('/page/kontakty', 'IndexPageController@postContactPage')->name('post.contact.page');
    //single page
    Route::get('/page/{slug}', 'IndexPageController@showSinglePage')->name('single.page');
    //category page
    Route::get('/category/{slug}','IndexPageController@showCategoryPage')->name('category.page')->where('slug', '[\w\d\-\_]+');
    //post
    Route::get('/post/{slug}','IndexPageController@showPostPage')->name('post.page')->where('slug', '[\w\d\-\_]+');
    //comments in the single post
    Route::post('/comments','IndexPageController@postCommentsPost')->name('post.comment.store');
    // Search
    Route::get('/search}', 'IndexPageController@search')->name('search');
});

/**** ADMIN *****/
Route::group(['prefix' => 'admin',  'middleware' => ['auth','role:admin']],function () {

    Route::namespace('Admin')->group(function(){
        //admin home page
        Route::get('/','PageController@home')->name('admin.home');
        //admin main menu
        Route::resource('/main-menu', 'MainMenuController');
        //pages
        Route::resource('/pages', 'PagesController');
        //categories-menu
        Route::resource('/categories-menu', 'CategoriesMenuController');
        //categories
        Route::resource('/categories', 'CategoriesController');
        //posts
        Route::resource('/posts', 'PostsController');
        //comments
        Route::resource('/comments', 'CommentsController')->except(['create', 'store']);
        //users
        Route::resource('/users', 'UsersController');
    });

});

/**** AUTH *****/
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//Socialite auth (google)
Route::get('login/{service}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{service}/callback', 'Auth\LoginController@handleProviderCallback');