<?php

Route::group(['prefix' => 'attachments'], function () {

	Route::get('/' ,'Dashboard\AttachmentController@index')
	->name('attachments.index')
  ->middleware(['permission:show_attachments']);

	Route::get('datatable'	,'Dashboard\AttachmentController@dataTable')
	->name('attachments.dataTable')
	->middleware(['permission:show_attachments']);

	Route::get('create'		,'Dashboard\AttachmentController@create')
	->name('attachments.create')
  ->middleware(['permission:add_attachments']);

	Route::post('/'			,'Dashboard\AttachmentController@store')
	->name('attachments.store')
  ->middleware(['permission:add_attachments']);

	Route::get('{id}/edit'	,'Dashboard\AttachmentController@edit')
	->name('attachments.edit')
  ->middleware(['permission:edit_attachments']);

	Route::put('{id}'		,'Dashboard\AttachmentController@update')
	->name('attachments.update')
  ->middleware(['permission:edit_attachments']);

	Route::delete('{id}'	,'Dashboard\AttachmentController@destroy')
	->name('attachments.destroy')
  ->middleware(['permission:delete_attachments']);

	Route::get('deletes'	,'Dashboard\AttachmentController@deletes')
	->name('attachments.deletes')
  ->middleware(['permission:delete_attachments']);

	Route::get('{id}','Dashboard\AttachmentController@show')
	->name('attachments.show')
  ->middleware(['permission:show_attachments']);
});
