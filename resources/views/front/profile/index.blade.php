@extends('front._layouts.master')
@section('title',auth()->user()->name)
	@section('content')

	<div class="inner-page profile-pages">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<div class='profile-img-block'>
						<img class="img-responsive profile-img" src="{{url(auth()->user()->avatar)}}" alt="" style="width:50%">
					</div>
					<ul class="list-group">
						<li class="list-group-item active">
							<a href="javascript:;">
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
						<li class="list-group-item">
							<a href="{{url(route('front.profile.courses'))}}">
								<i class="ti-bookmark-alt"></i> كورساتي
							</a>
						</li>
						@endpermission
					</ul>
				</div>
				<div class="col-md-9">
					@include('front._layouts._msg')
					<form method="post" class="edit-profile" action="{{url(route('front.profile.update'))}}" enctype="multipart/form-data">

						@csrf
						@method('PUT')

						<h2 class="sub-title"><span> تعديل بياناتي</span></h2>
						<div class="form-group">
							<div class="row">
								<label class="col-md-3"> الاسم الشخصي </label>
								<div class="col-md-9">
									<input type="text" name="name" value="{{ auth()->user()->name }}">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<label class="col-md-3" for="">البريد الالكتروني </label>
								<div class="col-md-9">
									<input type="email" name="email" value="{{ auth()->user()->email }}">
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="row">
								<label class="col-md-3" for="">رقم الهاتف</label>
								<div class="col-md-9">
									<input type="text" name="mobile" value="{{ auth()->user()->mobile }}">
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="row">
								<label class="col-md-3" for="password">كلمة المرور الجديدة</label>
								<div class="col-md-9">
									<input type="password" name="password">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<label class="col-md-3" for="password">تأكيد كلمة المرور </label>
								<div class="col-md-9">
									<input type="password" name="password_confirmation">
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="row">
								<label class="col-md-3"> </label>
								<div class="col-md-9">
									<button class="btn btn-sign-up" type="submit"> حفظ البيانات </button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	@stop
