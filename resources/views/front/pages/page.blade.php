@extends('front._layouts.master')
@section('title',$page->title)
@section('content')

	<div class="inner-page profile-pages">
	    <div class="container">
	        <div class="single-page">
						{!! $page->description !!}
	        </div>
	    </div>
	</div>

@stop
