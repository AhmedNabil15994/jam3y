<?php

Route::group(['prefix' => 'course_groups'], function () {

	Route::get('/' ,'Dashboard\CourseGroupController@index')
	->name('course_groups.index')
  ->middleware(['permission:show_course_groups']);

	Route::get('datatable'	,'Dashboard\CourseGroupController@dataTable')
	->name('course_groups.dataTable')
	->middleware(['permission:show_course_groups']);

	Route::get('create'		,'Dashboard\CourseGroupController@create')
	->name('course_groups.create')
  ->middleware(['permission:add_course_groups']);

	Route::post('/'			,'Dashboard\CourseGroupController@store')
	->name('course_groups.store')
  ->middleware(['permission:add_course_groups']);

	Route::get('{id}/edit'	,'Dashboard\CourseGroupController@edit')
	->name('course_groups.edit')
  ->middleware(['permission:edit_course_groups']);

	Route::put('{id}'		,'Dashboard\CourseGroupController@update')
	->name('course_groups.update')
  ->middleware(['permission:edit_course_groups']);

	Route::delete('{id}'	,'Dashboard\CourseGroupController@destroy')
	->name('course_groups.destroy')
  ->middleware(['permission:delete_course_groups']);

	Route::get('deletes'	,'Dashboard\CourseGroupController@deletes')
	->name('course_groups.deletes')
  ->middleware(['permission:delete_course_groups']);

	Route::get('{id}','Dashboard\CourseGroupController@show')
	->name('course_groups.show')
  ->middleware(['permission:show_course_groups']);
});
