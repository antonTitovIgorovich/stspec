<?php

Route::get('/', 'IndexController@index')->name('index');

Route::get('error/{num}', 'IndexController@httpErr')->name('http_err');

Route::get('service/article-{id}', 'ServiceController@showArticle')->name('serviceArticle');

Route::group(['prefix' => 'blog'], function () {
    $this::get('/', 'BlogController@index')->name('blog');
    $this::get('post-{id}', 'BlogController@showPost')->name('blogPost');
});

Route::get('contact', 'ContactController@index')->name('contact');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login/auth', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth']], function () {
    $this::get('/', 'Admin\AdminController@index')->name('adminIndex');
});

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
