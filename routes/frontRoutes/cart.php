<?php

Route::group(['prefix' => 'cart'], function () {

	Route::get('/' ,'Front\CartController@cart')
	->name('front.cart.index');

	Route::get('add-to-cart' ,'Front\CartController@addToCart')
	->name('front.cart.add');

	Route::get('delete-product-cart' ,'Front\CartController@delete')
	->name('front.cart.delete');

});


Route::group(['prefix' => 'coupons'], function () {

	Route::post('/' ,'Front\CartController@addCoupon')
	->name('front.coupons.add');

	Route::post('delete' ,'Front\CartController@deleteCoupon')
	->name('front.coupons.delete');

});
