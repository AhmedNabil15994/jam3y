@extends('front._layouts.master')
@section('title', __('front.auth.register.title') )
@section('content')

<div class="page-header">
    <div class="mask"></div>
    <div class="page-header-content">
        <div class="container">
            <h1>{{__('front.auth.register.title')}}</h1>
        </div>
    </div>
</div>

<section class="login-section">
    <div class="container">
        <div class="login-form">
            <div class="row clearfix">
                <div class="form-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="title-box">
                            <h3>{{__('front.auth.register.title')}}</h3>
                            <div class="text">  {{__('front.auth.register.has_account')}}
                              <a href="{{route('login')}}">{{__('front.auth.login.title')}}</a>
                            </div>
                        </div>

                        <!--Login Form-->
                        <form method="post" action="{{route('register')}}">
                            @csrf

                            <div class="form-group">
                                <input type="text" name="name" placeholder="{{__('front.auth.register.name_placeholder')}}" class="@error('name') is-invalid @enderror" value="{{ old('name') }}" autocomplete="off"
                                autofocus>
                                <i class="ti-email"></i>
                                @error('name')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="email" name="email" placeholder="{{__('front.auth.register.email_placeholder')}}" class="@error('email') is-invalid @enderror" value="{{ old('email') }}" autocomplete="off"
                                autofocus>
                                <i class="ti-email"></i>
                                @error('email')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="text" name="mobile" placeholder="{{__('front.auth.register.mobile_placeholder')}}" class="@error('mobile') is-invalid @enderror" value="{{ old('mobile') }}" autocomplete="off"
                                autofocus>
                                <i class="ti-email"></i>
                                @error('mobile')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="password" name="password" placeholder="{{__('front.auth.register.password_placeholder')}}" class="input-text @error('password') is-invalid @enderror" autocomplete="current-password">
                                <i class="ti-lock"></i>
                                @error('password')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="password" name="password_confirmation" placeholder="{{__('front.auth.register.confirm_password_placeholder')}}" class="input-text">
                                <i class="ti-lock"></i>
                            </div>

                            <div class="form-group check-box">
                                <input type="checkbox" id="remember-me">&nbsp;
                                <label for="remember-me"> {{__('front.auth.register.agree_policy')}}
                                  <a href="#">{{__('front.auth.register.policy')}}</a>
                                </label>
                            </div>
                            <div class="form-group btn-box">
                                <button class="btn btn-sign-up" type="submit">
                                  {{__('front.auth.register.register_btn')}}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="image-column col-lg-6 col-sm-12 col-sm-12">
                    <div class="image-box">
                        <figure class="image"><img src="{{url('front/images/signup.jpg')}}" alt=""></figure>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@stop
