@extends('front._layouts.master')
@section('title', __('front.auth.login.title') )
@section('content')

<div class="page-header">
    <div class="mask"></div>
    <div class="page-header-content">
        <div class="container">
            <h1>{{__('front.auth.login.title')}}</h1>
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
                            <h3>{{__('front.auth.login.title')}}</h3>
                            <div class="text"> {{__('front.auth.login.not_has_account')}}
                                <a href="{{route('register')}}">{{__('front.auth.login.register_now')}}</a>
                            </div>
                        </div>

                        <!--Login Form-->
                        <form method="post" action="{{route('login')}}">
                            @csrf
                            <div class="form-group">
                                <input type="email" name="email" placeholder="{{__('front.auth.email_placeholder')}}" class="@error('email') is-invalid @enderror" value="{{ old('email') }}" autocomplete="email"
                                autofocus>
                                <i class="ti-email"></i>
                                @error('email')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="password" name="password" placeholder="{{__('front.auth.password_placeholder')}}" class="input-text @error('password') is-invalid @enderror" autocomplete="current-password">
                                <i class="ti-lock"></i>
                                @error('password')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group check-box">
                                <input type="checkbox" id="remember-me" name="remember" {{ old('remember') ? 'checked' : '' }}>&nbsp;
                                <label for="remember-me">{{__('front.auth.login.remember')}}</label>

                                <a class="forget-password" href="{{url(route('password.request'))}}">
                                    {{__('front.auth.login.forget_password')}}
                                </a>
                            </div>

                            <div class="form-group btn-box">
                                <button class="btn btn-sign-up" type="submit">
                                    {{__('front.auth.login.login_btn')}}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="image-column col-lg-6 col-sm-12 col-sm-12">
                    <div class="image-box">
                        <figure class="image"><img src="{{url('front/images/login.jpg')}}" alt=""></figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop
