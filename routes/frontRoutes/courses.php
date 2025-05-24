<?php

Route::group(['prefix' => 'courses'], function () {

	Route::get('{slug}' ,'Front\CourseController@show')
	->name('front.courses.show');

	Route::get('free-lesson/{video_id}' ,'Front\CourseController@getVideoModal')
	->name('front.courses.get-video-modal');

	Route::get('paid-lesson/{video_id}' ,'Front\CourseController@getPaidVideoModal')
	->name('front.courses.get-paid-video-modal');

});
