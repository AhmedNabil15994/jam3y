<?php

Route::group(['prefix' => 'checkout', 'middleware' => ['web', 'auth']], function () {

	Route::get('/' ,'Front\CheckoutController@index')
	->name('front.checkout.index');

	Route::get('result' ,'Front\CheckoutController@result')
	->name('front.checkout.result');

	Route::get('success-payment' ,'Front\CheckoutController@successPayment')
	->name('front.checkout.payment-success');


Route::get('failed-payment', 'Front\CheckoutController@failedPayment')
    ->name('front.checkout.payment-failed');


Route::get('webhook', 'Front\CheckoutController@webhooks')
    ->name('front.checkout.webhooks');





});
