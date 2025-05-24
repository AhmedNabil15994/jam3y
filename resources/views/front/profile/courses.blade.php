@extends('front._layouts.master')
@section('title','كورساتي')
@section('content')

<div class="inner-page profile-pages">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class='profile-img-block'>
					<img class="img-responsive profile-img" src="{{url(auth()->user()->avatar)}}" alt="" style="width:50%">
				</div>
				<ul class="list-group">
					<li class="list-group-item">
						<a href="{{url(route('front.profile.show'))}}">
							<i class="ti-user"></i> ملفي الشخصي
						</a>
					</li>
					@permission('teachers_access')
					<li class="list-group-item">
						<a href="{{url(route('front.profile.teacher'))}}">
							<i class="ti-bookmark-alt"></i> شاشة المدرس
						</a>
					</li>

					@else
					<li class="list-group-item active">
						<a href="javascript:;">
							<i class="ti-bookmark-alt"></i> كورساتي
						</a>
					</li>
					@endpermission
				</ul>
			</div>
			<div class="col-md-9">
				<div class="row courses-page instructor-courses">

					@foreach ($subscribed as $subscribe)
					<div class="course-block col-md-4 col-12">
						<div class="course-wrap">
							<div class="thumb">
								<a href="{{url(route('front.courses.show',$subscribe->course->slug))}}">
									<img src="{{url($subscribe->course->image)}}" class="img-fluid" alt="{{$subscribe->course->title}}">
								</a>
							</div>
							<div class="body">
								<h4>
									<a href="{{url(route('front.courses.show',$subscribe->course->slug))}}">
										{{$subscribe->course->title}}
									</a>
								</h4>
								<span class="course-category">
									ينتهي الاشتراك في : {{$subscribe->end_at}}
								</span>
								<div class="student-footer-course">
									<a href="{{url(route('front.courses.show',$subscribe->course->slug))}}" class="btn btn-study-now">
										<i class="fa fa-user-graduate"></i> ابدأ الكورس
									</a>
								</div>
							</div>
						</div>
					</div>
					@endforeach


					@foreach ($expired as $expire)
					<div class="course-block col-md-4 col-12">
						<div class="course-wrap">
							<div class="thumb">
								<a href="{{url(route('front.courses.show',$expire->course->slug))}}">
									<img src="{{url($expire->course->image)}}" class="img-fluid" alt="{{$expire->course->title}}">
								</a>
							</div>
							<div class="body">
								<h4>
									<a href="{{url(route('front.courses.show',$expire->course->slug))}}">
										{{$expire->course->title}}
									</a>
								</h4>
								<span class="course-category alert alert-danger">
									انتهاء الاشتراك في تاريخ : {{$expire->end_at}}
								</span>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>

@stop
