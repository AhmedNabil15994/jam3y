<?php

Route::group([ 'prefix' => 'profile', 'middleware' => ['auth'] ], function () {

	Route::get('/' ,'Front\ProfileController@show')
	->name('front.profile.show');

	Route::put('/' ,'Front\ProfileController@update')
	->name('front.profile.update');

	Route::get('my-courses' ,'Front\ProfileController@userCourses')
	->name('front.profile.courses');

	Route::group(['prefix' => 'teacher', 'middleware' => ['auth' ,'permission:teachers_access'] ], function () {

		Route::get('/' ,'Front\ProfileController@teacher')
		->name('front.profile.teacher');

	});

});
