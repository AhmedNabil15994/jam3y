<?php

Route::group(['prefix' => 'courses'], function () {

	Route::get('/' ,'Dashboard\CourseController@index')
	->name('courses.index')
  ->middleware(['permission:show_courses']);

	Route::get('datatable'	,'Dashboard\CourseController@dataTable')
	->name('courses.dataTable')
	->middleware(['permission:show_courses']);

	Route::get('create'		,'Dashboard\CourseController@create')
	->name('courses.create')
  ->middleware(['permission:add_courses']);

	Route::post('/'			,'Dashboard\CourseController@store')
	->name('courses.store')
  ->middleware(['permission:add_courses']);

	Route::get('{id}/edit'	,'Dashboard\CourseController@edit')
	->name('courses.edit')
  ->middleware(['permission:edit_courses']);

	Route::put('{id}'		,'Dashboard\CourseController@update')
	->name('courses.update')
  ->middleware(['permission:edit_courses']);

	Route::delete('{id}'	,'Dashboard\CourseController@destroy')
	->name('courses.destroy')
  ->middleware(['permission:delete_courses']);

	Route::get('deletes'	,'Dashboard\CourseController@deletes')
	->name('courses.deletes')
  ->middleware(['permission:delete_courses']);

	Route::get('{id}','Dashboard\CourseController@show')
	->name('courses.show')
  ->middleware(['permission:show_courses']);
});
