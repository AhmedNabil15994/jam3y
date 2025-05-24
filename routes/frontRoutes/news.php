<?php

Route::group(['prefix' => 'news'], function () {

	Route::get('/' ,'Front\NewsController@index')
	->name('front.news.index');

	Route::get('/{slug}' ,'Front\NewsController@show')
	->name('front.news.show');

});
