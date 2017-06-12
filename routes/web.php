<?php

Route::get('/', 'IndexController@index')->name('index');

Route::get('error404', 'IndexController@httpErr404')->name('404');

Route::get('service/article-{id}', 'ServiceController@showArticle')->name('serviceArticle');

Route::group(['prefix' => 'blog'], function () {
    $this::get('/', 'BlogController@index')->name('blog');
    $this::get('post-{id}', 'BlogController@showPost')->name('blogPost');
});

Route::get('contact', 'ContactController@index')->name('contact');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
