<div class="tab-pane fade active in" id="global_setting">
    <h3 class="page-title">{{__('dashboard.courses.create.name')}}</h3>
    <div class="col-md-10">
        @foreach (config('setting.locales') as $code)
        <div class="form-group">
            <label class="col-md-2">
                {{__('dashboard.courses.create.name')}} - {{ $code }}
            </label>
            <div class="col-md-9">
                <input type="text" name="title[{{$code}}]" class="form-control" data-name="title.{{$code}}">
                <div class="help-block"></div>
            </div>
        </div>
        @endforeach
        <hr>
        <h3 class="page-title">{{__('dashboard.courses.create.description')}}</h3>
        @foreach (config('setting.locales') as $code)
        <div class="form-group">
            <label class="col-md-2">
                {{__('dashboard.course.create.description')}} - {{ $code }}
            </label>
            <div class="col-md-9">
                <textarea name="description[{{$code}}]" rows="8" cols="80" class="form-control {{check_dir($code)}}Editor" data-name="description.{{$code}}"></textarea>
                <div class="help-block"></div>

            </div>
        </div>
        @endforeach
        <hr>
        <h3 class="page-title">{{__('dashboard.course.create.top_description')}}</h3>
        @foreach (config('setting.locales') as $code)
        <div class="form-group">
            <label class="col-md-2">
                {{__('dashboard.course.create.top_description')}} - {{ $code }}
            </label>
            <div class="col-md-9">
                <textarea name="top_description[{{$code}}]" rows="8" cols="80" class="form-control {{check_dir($code)}}Editor" data-name="top_description.{{$code}}"></textarea>
                <div class="help-block"></div>
            </div>
        </div>
        @endforeach
        <hr>
        <div class="form-group">
            <label class="col-md-2">
                {{__('dashboard.courses.teacher')}}
            </label>
            <div class="col-md-9">
                <select name="user_id" id="single" class="form-control select2">
                    <option value=""></option>
                    @foreach ($teachers as $teacher)
                    <option value="{{ $teacher['id'] }}">
                        {{ $teacher['name'] }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2">
                {{__('dashboard.courses.packages')}}
            </label>
            <div class="col-md-9">
                <select name="package_id" id="single" class="form-control select2">
                    <option value=""></option>
                    @foreach ($packages as $package)
                    <option value="{{ $package['id'] }}">
                        {{ $package['name'] }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2">
                {{__('dashboard.courses.create.choose_video')}}
            </label>
            <div class="col-md-9">
                <a onclick="openVideoModal()">{{__('dashboard.courses.create.choose')}}</a>
                <div class="video-card">
                </div>

                <input type="hidden" class="form-control" name="demo_video" id="demo_video">
                <div class="help-block"></div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2">
                {{__('dashboard.courses.create.status')}}
            </label>
            <div class="col-md-9">
                <input type="checkbox" class="make-switch" id="test" data-size="small" name="status">
                <div class="help-block"></div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2">
                {{__('dashboard.users.create.image')}}
            </label>
            <div class="col-md-9">
                <div class="input-group">
                    <span class="input-group-btn">
                        <a id="lfm" data-input="image" data-preview="holder" class="btn btn-primary">
                            <i class="fa fa-picture-o"></i>
                        </a>
                    </span>
                </div>
                <span id="holder" style="margin-top:15px;max-height:100px;"></span>
                <span id="image"></span>
                <input type="hidden" data-name="image">
                <div class="help-block"></div>
            </div>
        </div>
        <hr>
        <h3 class="page-title">{{__('dashboard.courses.create.categories')}}</h3>
        <div id="jstree">
            @include('dashboard.courses.tree.view')
        </div>
        <input type="hidden" name="category_id" id="root_category" value="" data-name="category_id">
        <div class="help-block"></div>
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
                             onclick="selectVideo(this,'{{$video->id}}')"
                        >
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


@push('scripts')
    <script>
        function selectVideo(a,video) {
            var video_html = $(a).html();
            $('#demo_video').val(video);
            $('.video-card').text('').append(video_html);
            $('#videos-modal').modal('toggle');
        }

        function openVideoModal() {
            $('#videos-modal').modal('toggle');
        }
    </script>
@endpush
