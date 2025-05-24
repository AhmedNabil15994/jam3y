@extends('front._layouts.master')
@section('title', __('front.cart.title') )
@section('content')

<div class="inner-page profile-pages">
	@include('front._layouts._msg')
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<h1 class="sub-title">
					<span>{{__('front.cart.title')}}</span>
					<i class="cart-count">
						( {{ count(Cart::getContent()) }} ) {{__('front.cart.count_courses')}}
					</i>
				</h1>
				<div class="shopping-cart">
					@foreach (Cart::getContent()->sort() as $courseCart)
					<div class="course-wrap">
						<div class="row">
							<div class="col-md-3">
								<div class="thumb">
									<a href="index.php?page=course-details">
										<img src="{{url($courseCart->attributes->image)}}" class="img-fluid" alt="">
									</a>
								</div>
							</div>
							<div class="col-md-7 body">

								@foreach ($courseCart->attributes->translation as $trans)
								@if ($trans->locale == locale())
								<h4><a href="#">{{ $trans->title }}</a></h4>
								@endif
								@endforeach

								<div class="course-price">
									@if ($courseCart->conditions)
										<span class="price-before">
											{{ number_format($courseCart->price,3) }}
										</span>
									@endif
									{{ number_format($courseCart->getPriceSumWithConditions(),3) }} KWD
								</div>
							</div>
							<div class="col-md-2 delete-item">
								<a href="{{url(route('front.cart.delete','course='.$courseCart->id))}}">
									<button class="btn btn-danger"><i class="fa fa-times"></i></button>
								</a>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
			<div class="col-md-3">
				<div class="cart-summery">

					<h3>{{__('front.cart.subtotal')}}</h3>

					<span class="cart-total">{{ Cart::getSubTotal() }} KWD</span>

					@if (count(Cart::getConditionsByType('coupon')) > 0)

						<h3>{{__('front.cart.total')}}</h3>

						<span class="cart-total">{{ Cart::getTotal() }} KWD</span>

					@endif

					@if (count(Cart::getContent()) > 0)
					<div class="form-group btn-box">
						<a href="{{url(route('front.checkout.index'))}}" class="checkout-cart btn btn-buy-now">
							<button class="btn btn-sign-up" type="submit">
								{{__('front.cart.checkout')}}
							</button>
						</a>
					</div>
					@endif
				</div>
				<div class="cart-summery">
					@if (count(Cart::getConditionsByType('coupon')) == 0)
					<form method="post" action="{{ url(route('front.coupons.add')) }}">
							@csrf
						<div class="form-group">
							<input type="text" name="coupon" placeholder="Enter Promo Code">
						</div>
						<button type="submit" class="btn btn-sign-up">
							تطبيق
						</button>
					</form>
					@else
					<p>
						@foreach (Cart::getConditions()->sort() as $condition)
							<span>
								<b>كود : {{$condition->getName()}} / {{$condition->getValue()}}</b>
							</span>
						@endforeach
						<a href="#" onclick="event.preventDefault();document.getElementById('delete-coupon').submit();">
							<i class="far fa-trash-alt"></i>
						</a>
					</p>
					<form action="{{ url(route('front.coupons.delete')) }}" method="post" id="delete-coupon">
						@csrf
					</form>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>

@stop
