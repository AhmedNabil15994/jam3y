@extends('front._layouts.master')
@section('title', __('front.auth.forget.title') )
@section('content')
<div class="page-header">
    <div class="mask"></div>
    <div class="page-header-content">
        <div class="container">
            <h1>{{__('front.auth.forget.title')}}</h1>
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
                            <h3> {{__('front.auth.forget.title')}} </h3>
                            <div class="text"> {{__('front.auth.forget.email_title')}} </div>
                        </div>

                        <form method="post" action="{{ route('password.email') }}">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{__('front.auth.forget.email_placeholder')}}">
                            </div>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <div class="form-group btn-box">
                                <button class="btn btn-sign-up" type="submit">
                                  {{__('front.auth.forget.submit')}}
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
