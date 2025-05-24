<?php

Route::group(['prefix' => 'p'], function () {

	Route::get('contact-us' ,'Front\PageController@contactUs')
	->name('front.pages.contact-us');

	Route::get('{slug}' ,'Front\PageController@page')
	->name('front.pages.show');

});
