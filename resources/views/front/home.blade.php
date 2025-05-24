@extends('front._layouts.master')
@section('title', __('front.home.title') )
@section('content')
    <style>
        .start-home-image{
            margin-top: 0;
        }
    </style>

@if(count($sliders))
<div id="carousel-example-2"
    class="carousel slide carousel-fade z-depth-1-half"
    data-ride="carousel">

    <div class="carousel-inner"
        role="listbox">
        @foreach($sliders as $slider)
        <div class="carousel-item {{$loop->index == 0 ? 'active':''}}">
            <a href="{{$slider->target_url}}"
                class="view">
                <img class="d-block w-100"
                    src="{{asset($slider->image)}}"
                    alt="First slide">
                <div class="mask rgba-black-light"></div>
            </a>
        </div>
        @endforeach
    </div>
    <!--/.Slides-->
    <!--Controls-->
    <a class="carousel-control-prev"
        href="#carousel-example-2"
        role="button"
        data-slide="prev">
        <span class="carousel-control-prev-icon"
            aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next"
        href="#carousel-example-2"
        role="button"
        data-slide="next">
        <span class="carousel-control-next-icon"
            aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    <!--/.Controls-->

</div>
@endif
<!-- PROMO SECTION -->

@if(!count($sliders))
<div class="banner_top"
    style="padding-top: 75px !important;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center seo_banner_content">
                <h2 class="wow fadeInUp"
                    data-wow-delay="0.3s">{{__('front.home.slider_1_title')}}</h2>
                <p class="wow fadeInUp"
                    data-wow-delay="0.5s">
                    {!!__('front.home.slider_2_title')!!}
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 offset-md-3 text-center">
                <div class="start-home-image wow fadeInUp"
                    data-wow-delay="0.8s">
                    <img src="{{url('front/images/home-promo-3.jpg')}}"
                        alt=""
                        style="width:100%;">
                </div>
            </div>
        </div>
    </div>
</div>
@endif
</section>
<!-- PROMO SECTION -->

<div class="home-courses popular-courses">
    <div class="container">

        @if(isset($target_cat)&&$target_cat->coming_soon==1)
{{--        <div class="alert alert-info text-center">--}}
{{--            <h3 class="text-center">--}}

{{--                {{ __('front.home.comming_soon') }}--}}
{{--            </h3>--}}
{{--        </div>--}}
        @else
        <div class="row courses-page">
            @foreach ($mainCategories as $category)
            <div class="course-block col-6 col-md-4">
                <a href="{{ (count($category->courses) > 0) ?
                            url(route('front.categories.show',$category->slug).'?target_main_cat='.$category->slug)
                            : url(route('home').'?target_main_cat='.$category->slug) }}">
                    <div class="course-wrap ">
                        <div class="thumb">
                            <img src="{{url($category->image)}}"
                                class="img-fluid"
                                alt="">
                        </div>
                        <div class="body">
                            <h6 style="color: #333">
                                {{$category->title }}

                                @if($category->coming_soon==1)
                                (@lang('front.home.comming_soon'))
                                @endif
                            </h6>
                            <span class="course-category"
                                style="color: #677294">{{ $category->title }}</span>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>

        @endif
    </div>
</div>

{{-- @foreach ($categoriesHasCourses as $catHasCourses)--}}

{{-- <div class="home-courses popular-courses">--}}
    {{-- <div class="container">--}}

        {{-- <h2 class="sub-title"><span>{{$catHasCourses->title}}</span></h2>--}}

        {{-- <div class="courses-carousel owl-carousel">--}}
            {{-- @foreach ($catHasCourses->courses->where('status',1) as $course)--}}
            {{-- <div class="course-block">--}}
                {{-- <div class="course-wrap">--}}
                    {{-- <div class="thumb">--}}
                        {{-- <a href="{{url(route('front.courses.show',$course->slug))}}">--}}
                            {{-- <img src="{{url($course->image)}}"
                                class="img-fluid"
                                alt="">--}}
                            {{-- </a>--}}
                        {{-- </div>--}}
                    {{-- <div class="body">--}}

                        {{-- <a href="{{url(route('front.courses.show',$course->slug))}}">--}}
                            {{-- <h4>--}}
                                {{-- <a href="{{url(route('front.courses.show',$course->slug))}}">{{$course->title}}</a>--}}
                                {{-- </h4>--}}
                            {{-- <span class="course-category">{{ $catHasCourses->title }}</span>--}}
                            {{-- </a>--}}
                        {{-- </div>--}}
                    {{-- </div>--}}
                {{-- </div>--}}
            {{-- @endforeach--}}
            {{-- </div>--}}

        {{-- </div>--}}
    {{-- </div>--}}

{{-- @endforeach--}}


@stop
@push('scripts')
<script>
    $(window).resize(function () {
            $('.img-block').each(function () {
            $(this).height($(this).width());
            });
            $('.img-block').height($('#main').width());
        }).resize();
</script>
@endpush
@push('css')
<style>
    .img-fluid {
        max-width: 100%;
        height: 150px;
    }

</style>
@endpush
