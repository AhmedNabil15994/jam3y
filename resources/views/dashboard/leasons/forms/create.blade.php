<div class="tab-pane fade active in" id="global_setting">
    <h3 class="page-title">{{__('dashboard.leasons.create.name')}}</h3>
    <div class="col-md-10">
        @foreach (config('setting.locales') as $code)
            <div class="form-group">
                <label class="col-md-2">
                    {{__('dashboard.leasons.create.name')}} - {{ $code }}
                </label>
                <div class="col-md-9">
                    <input type="text" name="title[{{$code}}]" class="form-control" data-name="title.{{$code}}">
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
                        <option value="{{ $course['id'] }}">
                            {{ $course['title'] }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <hr>
        <h3 class="page-title">{{ __('dashboard.leasons.create.videos') }}</h3>
        <div class="html-copy">
            <div class="col-md-12">
                @foreach (config('setting.locales') as $code)
                    <div class="form-group">
                        <label class="col-md-2">
                            {{__('dashboard.leasons.create.video_title')}} - {{ $code }}
                        </label>
                        <div class="col-md-9">
                            <input type="text" name="title_link_{{$code}}[]" class="form-control"
                                   data-name="title_link_{{$code}}">
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
                        </div>
                        <input type="hidden" class="form-control" name="link[]">
                        <div class="help-block"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2">
                        {{__('dashboard.leasons.create.is_free')}}
                    </label>
                    <div class="col-md-9">
                        <input type="checkbox" class="ischecked" name="is_free[]" value="1" onclick="checkFunction()">
                        <input type="hidden" class="isUnchecked" name="is_free[]" value="0" checked>
                    </div>
                </div>
                <div class="form-group">
                    <a href="javascript:;" class="remove_html btn red">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
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
            var target = $('#'+($('#target').val()));
            var video_html = $(a).html();
            var parent_target = target.parent();
            parent_target.children('input').val(video);
            parent_target.children('.video-card').text('').append(video_html);
            $('#videos-modal').modal('toggle');
        }

        function openVideoModal(a) {
            var id = generateString(30);
            $(a).attr('id' , id);
            $('#target').val(id);
            $('#videos-modal').modal('toggle');
        }

        function generateString(length) {
            var result           = [];
            var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            var charactersLength = characters.length;
            for ( var i = 0; i < length; i++ ) {
                result.push(characters.charAt(Math.floor(Math.random() *
                    charactersLength)));
            }
            return result.join('');
        }
    </script>
@endpush

