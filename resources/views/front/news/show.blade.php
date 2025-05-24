@extends('front._layouts.master')
@section('title',$news->title)
@section('content')

	<div class="page-header">
	    <div class="mask"></div>
	    <div class="page-header-content">
	        <div class="container">
	            <h1> {{$news->title}} </h1>
	        </div>
	    </div>
	</div>

	<div class="container">
	    <div class="row inner-page single-post">
	        <div class="col-md-12">
	            <div class="blog-posts">
	                <img class="img-fluid" src="{{url($news->image)}}" alt="{{$news->title}}">
	                <div class="blog-posts-in">
	                    <ul class="list-inline posted-info">
	                        <li>{{date("m-Y", strtotime($news->created_at))}}</li>
	                    </ul>
	                    <h2>{{$news->title}}</h2>
	                    <p>
												{!!$news->description!!}
											</p>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>


@stop
