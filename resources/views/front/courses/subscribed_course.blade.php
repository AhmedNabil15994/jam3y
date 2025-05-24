@extends('front._layouts.master')
@section('title',$course->title)
@section('content')

    <section class="course-header-area">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="course-header-wrap">
                        <h1 class="title">{{ $course->title }}</h1>


                        <p class="subtitle">
                            {!! $course->top_description !!}
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="course-content-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">

                    <br>

                    <div class="alert alert-success">
                        <ul>
                            <li>انت الان مشترك</li>
                            <li>ينتهي اشتراكك في : {{$subscription->end_at}}</li>
                        </ul>
                    </div>

                    <div class="description-box view-more-parent">
                        <div class="view-more" onclick="viewMore(this, 'hide')">{{ __('front.courses.more')}}</div>
                        <div class="description-title">{{ __('front.courses.description') }}</div>
                        <div class="description-content-wrap">
                            {!! $course->description !!}
                        </div>
                    </div>
                    <div class="course-curriculum-box">
                        <div class="course-curriculum-title clearfix">
                            <div class="title">{{ __('front.courses.lessons') }}</div>
                        </div>
                        <div class="course-curriculum-accordion">
                            @foreach ($course->leasons as $leason)
                                <div class="lecture-group-wrapper">
                                    <div class="lecture-group-title clearfix" data-toggle="collapse"
                                         data-target="#collapse{{$leason->id}}" aria-expanded="true">
                                        <div class="title">
                                            {{$leason->title}}
                                        </div>
                                        <div class="lesson-desc">
										<span class="total-lectures">
											{{count($leason->videos)}} {{ __('front.courses.count') }}
										</span>
                                        </div>
                                    </div>
                                    <div id="collapse{{$leason->id}}" class="lecture-list collapse show">
                                        <ul>
                                            @foreach ($leason->videos as $video)
                                                <li class="lecture has-preview"
                                                    onclick="publishModel('{{$video->id}}')">
                                                    <span class="lecture-title">{{$video->title}}</span>
                                                    <span class="lecture-time">
												{{$video->is_free ? ''.__('front.courses.free').'' : ''.__('front.courses.paid').''}}
											</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="course-curriculum-box">
                        <div class="course-curriculum-title clearfix">
                            <div class="title">{{ __('front.courses.attachments') }}</div>
                        </div>
                        <div class="course-curriculum-accordion">
                            @foreach ($course->attachments as $attachment)
                                <div class="lecture-group-wrapper">
                                    <div class="lecture-group-title clearfix" data-toggle="collapse"
                                         data-target="#collapse{{$attachment->id}}" aria-expanded="true">
                                        <div class="title">
                                            {{$attachment->title}}
                                        </div>
                                        <div class="lesson-desc">
										<span class="total-lectures">
											{{count($attachment->urls)}} {{ __('front.courses.count') }}
										</span>
                                        </div>
                                    </div>
                                    <div id="collapse{{$attachment->id}}" class="lecture-list collapse show">
                                        <ul>
                                            @foreach ($attachment->urls as $url)
                                                <a href="{{url($url->link)}}" target="_blank">
                                                    <li class="lecture has-preview">
                                                        <span class="lecture-title">{{$url->title}}</span>
                                                        <span class="lecture-time">
													{{$url->is_free ? ''.__('front.courses.free').'' : ''.__('front.courses.paid').''}}
												</span>
                                                    </li>
                                                </a>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="course-sidebar">
                        <div class="preview-video-box">
                            <a data-toggle="modal" data-target="#demo_video">
                                <img src="{{url($course->image)}}" alt="" class="img-fluid">
                                <span class="play-btn"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <link rel="stylesheet" href="{{url('front/ar/assets/css/plyr.css')}}">

    <script src="{{url('front/ar/assets/js/plyr.js')}}"></script>

    <div class="modal fade" id="demo_video" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content course-preview-modal">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('front.courses.intro_video')}}</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="course-preview-video-wrap">
                        <div class="embed-responsive embed-responsive-16by9">
                            <div class="plyr__video-embed player" id="demo_video_body">
                                {!! $demo_video	 !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="CoursePreviewModal" tabindex="-1" role="dialog" aria-hidden="true"
         data-keyboard="false">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content course-preview-modal">
                <div class="modal-header">
                    <h5 class="modal-title" id="video-title"></h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="course-preview-video-wrap">
                        <div class="embed-responsive embed-responsive-16by9">
                            <div id="spinner">
                                <div class="sk-chase" >
                                    <div class="sk-chase-dot"></div>
                                    <div class="sk-chase-dot"></div>
                                    <div class="sk-chase-dot"></div>
                                    <div class="sk-chase-dot"></div>
                                    <div class="sk-chase-dot"></div>
                                    <div class="sk-chase-dot"></div>
                                </div>
                            </div>
                            <div class="plyr__video-embed player" id="video-script">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('scripts')

    <script>
        var last_video_request = null;

        function publishModel(video_id) {
            var modal = $('#CoursePreviewModal');
            if(last_video_request !== video_id) {
                last_video_request = video_id;
                var spinner = $('#spinner');
                var title = $('#video-title');
                var video_player = $('#video-script');
                title.text('');
                video_player.text('');
                spinner.show();
                modal.modal();

                $.ajax({
                    type: "get",
                    url: '{{url('courses/paid-lesson')}}/' + video_id,
                    success: function (data) {
                        if (data.status === 1) {
                            spinner.hide();
                            title.append(data.data.title);
                            video_player.append(data.data.video_player);
                        }
                    },
                });
            }else {
                modal.modal();
            }
        }
    </script>
@stop