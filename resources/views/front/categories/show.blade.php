@extends('front._layouts.master')
@section('title',$category->title)
@section('content')

    <div class="page-header">
        <div class="mask"></div>
        <div class="page-header-content">
            <div class="container">
                <h1> {{ $category->title }}</h1>
                <ul class="crum-links">
                    @foreach ($category->getParentsAttribute()->reverse() as $all)
                        <li>{{ $all->title }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <div class="inner-page">
        <div class="container">
            <div class="sorting-head">
                <div class="row">
                    <div class="col-md-6">
                        <p class="soting-desc">{{count($category->courses)}} {{ __('front.categories.count') }}</p>
                    </div>
                </div>
            </div>

            <div class="row courses-page">
                @foreach ($courses as $course)
                        <div class="course-block col-md-3 col-6">
                            <div class="course-wrap ">
                                <div class="thumb">
                                    <a href="{{url(route('front.courses.show',$course->slug))}}">
                                        <img src="{{url($course->image)}}" class="img-fluid" alt="">
                                    </a>
                                </div>
                                <div class="body">
                                    <h4>
                                        <a href="{{url(route('front.courses.show',$course->slug))}}">{{$course->title}}</a>
                                    </h4>
                                    <span class="course-category">{{ $category->title }}</span>
                                </div>
                            </div>

                        </div>
                    </a>
                @endforeach
            </div>

            <div class="row main-pagination">
                <div class="col-md-9">
                    {!! $courses!!}
                </div>
            </div>

        </div>
    </div>

@stop
