@extends('front._layouts.master')
@section('title', __('front.auth.reset.title') )
@section('content')
<div class="page-header">
    <div class="mask"></div>
    <div class="page-header-content">
        <div class="container">
            <h1>{{__('front.auth.reset.title')}}</h1>
        </div>
    </div>
</div>
<section class="login-section">
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                <div class="login-form reset-password">
                    <div class="inner-column">
                        <div class="title-box">
                            <h3> {{__('front.auth.reset.title')}} </h3>
                        </div>

                        <form method="post" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-group">
                                <input type="text" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                placeholder="{{__('front.auth.reset.email_placeholder')}}">
                            </div>

                            @error('email')
                            <span role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <div class="form-group row">

                                <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="{{__('front.auth.reset.password_placeholder')}}">

                                @error('password')
                                <span role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group row">

                                <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="{{__('front.auth.reset.confirm_placeholder')}}">
                            </div>

                            <div class="form-group btn-box">
                                <button class="btn btn-sign-up" type="submit">
                                    {{__('front.auth.reset.submit')}}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</section>
@stop
