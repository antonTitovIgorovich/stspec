<?php

Route::get('/', 'IndexController@index')->name('indexPage');

Route::get('sitemap', 'IndexController@siteMap')->name('siteMap');

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

Route::get('/clear_cache', function(){
	Artisan::call('config:clear');
	return redirect()->route('indexPage');
});

