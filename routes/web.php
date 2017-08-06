<?php

Route::get('/', 'IndexController@index')->name('indexPage');

Route::get('error/{num}', 'IndexController@httpErr')->name('http_err');

Route::get('service/{id}', 'ServiceController@show')->name('serviceArticle');

Route::group(['prefix' => 'blog'], function () {
    $this::get('/', 'BlogController@index')->name('blog');
    $this::get('{id}', 'BlogController@show')->name('blogPost');
});

Route::get('contact', 'ContactController@index')->name('contact');

Route::group(['prefix' => 'admin', 'middleware' => ['web','auth']], function () {
    $this::get('/', function () {
        return redirect()->route('service.index');
    });

    $this::resource('service', 'Admin\AdminServiceController');
    $this::resource('blog', 'Admin\AdminBlogController');
    $this::resource('stock', 'Admin\AdminStockController');
});

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login/auth', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
