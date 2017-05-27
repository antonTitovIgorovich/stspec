<?php

Route::get('/', 'IndexController@index')->name('home');

Route::get('service/article-{id}', 'ServiceController@showArticle')->name('serviceArticle');

Route::get('blog', 'BlogController@index')->name('blog');
Route::get('blog/post-{id}', 'BlogController@showPost')->name('blogPost');

Route::get('contact', 'ContactController@index')->name('contact');
