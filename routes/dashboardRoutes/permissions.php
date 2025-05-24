<?php

Route::group(['prefix' => 'permissions'], function () {

	Route::get('/' ,'Dashboard\PermissionController@index')
	->name('permissions.index');
    // ->middleware(['auth:api']);

	Route::get('datatable'	,'Dashboard\PermissionController@dataTable')
	->name('permissions.dataTable');
    // ->middleware(['auth:api']);

	Route::get('create'		,'Dashboard\PermissionController@create')
	->name('permissions.create');
    // ->middleware(['auth:api']);

	Route::post('/'			,'Dashboard\PermissionController@store')
	->name('permissions.store');
    // ->middleware(['auth:api']);

	Route::get('{id}/edit'	,'Dashboard\PermissionController@edit')
	->name('permissions.edit');
    // ->middleware(['auth:api']);

	Route::put('{id}'		,'Dashboard\PermissionController@update')
	->name('permissions.update');
    // ->middleware(['auth:api']);

	Route::delete('{id}'	,'Dashboard\PermissionController@destroy')
	->name('permissions.destroy');
    // ->middleware(['auth:api']);

	Route::get('deletes'	,'Dashboard\PermissionController@deletes')
	->name('permissions.deletes');
    // ->middleware(['auth:api']);

	Route::get('{id}','Dashboard\PermissionController@show')
	->name('permissions.show');
    // ->middleware(['auth:api']);

});
