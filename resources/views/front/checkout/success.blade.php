@extends('front._layouts.master')
@section('title', __('front.checkout.success_payment') )
@section('content')

	<div class="inner-page profile-pages">
	    <div class="container">
	        <div class="row">
	            <div class="col-md-6 offset-md-3">
	                <div class="confirm-purchising">
	                    <i class="fa fa-check"></i>
											<h1>{{ __('front.checkout.success_payment') }}</h1>
	                    <a href="{{url(route('front.profile.courses'))}}" class="btn btn-study-now">
												<i class="fa fa-user-graduate"></i>  ابدأ الدراسة
											</a>
	                </div>
	            </div>

	        </div>
	    </div>
	</div>

@stop
