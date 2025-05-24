<div class="tab-pane fade active in" id="global_setting">
    <h3 class="page-title">{{__('dashboard.leasons.create.name')}}</h3>
    <div class="col-md-10">
        @foreach (config('setting.locales') as $code)
            <div class="form-group">
                <label class="col-md-2">
                    {{__('dashboard.leasons.create.name')}} - {{ $code }}
                </label>
                <div class="col-md-9">
                    <input type="text" name="title[{{$code}}]" class="form-control" data-name="title.{{$code}}"
                           value="{{optional($leason->translate($code))->title}}">
                    <div class="help-block"></div>
                </div>
            </div>
        @endforeach
        <hr>
        <div class="form-group">
            <label class="col-md-2">
                {{__('dashboard.courses.title')}}
            </label>
            <div class="col-md-9">
                <select name="course_id" id="single" class="form-control select2">
                    <option value=""></option>
                    @foreach ($courses as $course)
                        <option value="{{ $course['id'] }}" {{($leason->course_id == $course->id) ? 'selected' : ''}}>
                            {{ $course['title'] }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <hr>

        <h3 class="page-title">{{ __('dashboard.leasons.create.videos') }}</h3>
        <div class="html-copy">
            @foreach ($leason->videos as $video)
                <div class="col-md-12">
                    @foreach (config('setting.locales') as $code)
                        <div class="form-group">
                            <label class="col-md-2">
                                {{__('dashboard.leasons.create.video_title')}} - {{ $code }}
                            </label>
                            <div class="col-md-9">
                                <input type="text" name="title_link_{{$code}}[]" class="form-control"
                                       data-name="title_link_{{$code}}" value="{{optional($video->translate($code))->title}}">
                                <div class="help-block"></div>
                            </div>
                        </div>
                    @endforeach
                    <div class="form-group">
                        <label class="col-md-2">
                            {{__('dashboard.courses.create.choose_video')}}
                        </label>
                        <div class="col-md-9">
                            <a onclick="openVideoModal(this)">{{__('dashboard.courses.create.choose')}}</a>
                            <div class="video-card">
                                <div class="widget-thumb-wrap">
                                    <div class="widget-thumb-body">
                                        <a class="btn btn-primary" href="{{$video->video_id ? url(route('leasons.show-video',$video->video_id)) : ''}}">
                                            <i class="fa fa-eye"></i>  {{__('dashboard.courses.create.show_video')}}
                                        </a>
                                    </div>
                                </div>

                            </div>
                            <input type="hidden" class="form-control" name="link[]" value="{{$video->video_id}}">
                            <div class="help-block"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2">
                            {{__('dashboard.leasons.create.is_free')}}
                        </label>
                        <div class="col-md-9">
                            <input type="checkbox" class="ischecked" name="is_free[]" value="1"
                                   onclick="checkFunction()" {{($video->is_free == 1) ? 'checked' : ''}}>
                            <input type="hidden" class="isUnchecked" name="is_free[]"
                                   value="0" {{($video->is_free == 1) ? 'disabled' : ''}}>
                        </div>
                    </div>
                    <div class="form-group">
                        <a href="javascript:;" class="remove_html btn red">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <hr>
        <button id="copy" type="button" class="btn green btn-lg mt-ladda-btn ladda-button btn-circle btn-outline"
                data-style="slide-down" data-spinner-color="#333">
            <span class="ladda-label">
                <i class="icon-plus"></i>
            </span>
        </button>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="videos-modal" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('dashboard.courses.create.choose_video')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="target">
                @foreach($videos as $video)
                    <div class="col-md-12">
                        <!-- BEGIN WIDGET THUMB -->
                        <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered"
                             style="cursor: pointer;"
                             onclick="selectVideo(this,'{{$video->id}}')">
                            <div class="widget-thumb-wrap">
                                <div class="widget-thumb-body">
                                    <img src="{{$video->poster}}" width="100" height="100"
                                         style="float: right;margin-left: 2rem;">
                                    <a href="{{url(route('leasons.show-video',$video->id))}}"
                                       target="_blank"><span
                                                class="widget-thumb-subtitle">{{$video->title}}</span></a>
                                    <div class="tile-object">
                                        <div class="number"> {{\Carbon\Carbon::parse($video->upload_time)->toDateTimeString()}} </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END WIDGET THUMB -->
                    </div>
                @endforeach
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    {{__('dashboard.courses.create.close')}}
                </button>
                <button type="button" class="btn btn-primary">{{__('dashboard.courses.create.choose')}}</button>
            </div>
        </div>
    </div>
</div>

<div class="tab-pane fade in" id="sorting">
    <div class="row">
        <div class="profile-content">
            <div class="portlet light">
                <div class="portlet-body">
                    <ul id="sortable" class="dd-list">
                        @foreach ($leason->videos as $sortVideo)
                            <li id="video-{{$sortVideo->id}}" class="dd-item">
                                <div class="dd-handle"> {{$sortVideo->title}}</div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-actions">
                @include('dashboard._layouts._ajax-msg')
                <div class="form-group">
                    <button type="button" class="btn btn-lg blue re_order">
                        {{__('dashboard.general.sorting_btn')}}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
