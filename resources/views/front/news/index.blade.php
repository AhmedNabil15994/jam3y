@extends('front._layouts.master')
@section('title', __('front.news.title') )
@section('content')

	<div class="page-header">
	    <div class="mask"></div>
	    <div class="page-header-content">
	        <div class="container">
	            <h1>{{__('front.news.title')}}</h1>
	        </div>
	    </div>
	</div>
	<div class="container">
	    <div class="row inner-page">
	        <div class="col-md-12">
	            @foreach ($news as $value)
								<div class="row blog-row">
		                <a href="{{url(route('front.news.show',$value->slug))}}" class="col-sm-5">
		                    <img class="img-fluid" src="{{url($value->image)}}" alt="">
		                </a>
		                <div class="col-sm-7 blog-posts">
		                    <div class="blog-posts-in-sm no-padding">
		                        <h2>
															<a href="{{url(route('front.news.show',$value->slug))}}">
																{{$value->title}}
															</a>

															<ul class="list-inline posted-info">
			                            <li> {{__('front.news.created_at')}} : {{ date("m-Y", strtotime($value->created_at)) }}</li>
			                        </ul>

			                        <p>
			                            {!! str_limit(strip_tags($value->description) , 250 , ' ....')!!}
																	<a href="{{url(route('front.news.show',$value->slug))}}">
																		{{__('front.news.more')}}
																	</a>
			                        </p>

														</h2>
		                    </div>
		                </div>
		            </div>
	            @endforeach
	            <div class="row main-pagination">
	                <div class="col-md-9">
											{!! $news !!}
	                </div>
	            </div>
	        </div>
	    </div>
	</div>

@stop
