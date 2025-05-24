<?php

Route::group(['prefix' => 'categories'], function () {

	Route::get('{slug}' ,'Front\CategoryController@show')
	->name('front.categories.show');

});
