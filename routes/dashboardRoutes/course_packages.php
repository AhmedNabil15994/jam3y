<?php

Route::group(['prefix' => 'course_packages'], function () {

	Route::get('/' ,'Dashboard\CoursePackageController@index')
	->name('course_packages.index')
  ->middleware(['permission:show_course_packages']);

	Route::get('datatable'	,'Dashboard\CoursePackageController@dataTable')
	->name('course_packages.dataTable')
	->middleware(['permission:show_course_packages']);

	Route::get('create'		,'Dashboard\CoursePackageController@create')
	->name('course_packages.create')
  ->middleware(['permission:add_course_packages']);

	Route::post('/'			,'Dashboard\CoursePackageController@store')
	->name('course_packages.store')
  ->middleware(['permission:add_course_packages']);

	Route::get('{id}/edit'	,'Dashboard\CoursePackageController@edit')
	->name('course_packages.edit')
  ->middleware(['permission:edit_course_packages']);

	Route::put('{id}'		,'Dashboard\CoursePackageController@update')
	->name('course_packages.update')
  ->middleware(['permission:edit_course_packages']);

	Route::delete('{id}'	,'Dashboard\CoursePackageController@destroy')
	->name('course_packages.destroy')
  ->middleware(['permission:delete_course_packages']);

	Route::get('deletes'	,'Dashboard\CoursePackageController@deletes')
	->name('course_packages.deletes')
  ->middleware(['permission:delete_course_packages']);

	Route::get('{id}','Dashboard\CoursePackageController@show')
	->name('course_packages.show')
  ->middleware(['permission:show_course_packages']);
});
