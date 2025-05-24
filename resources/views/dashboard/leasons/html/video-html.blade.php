<div class="html-copy-edit" style="display:none;">
    <div class="col-md-12">
        @foreach (config('setting.locales') as $code)
            <div class="form-group">
                <label class="col-md-2">
                    {{__('dashboard.leasons.create.video_title')}} - {{ $code }}
                </label>
                <div class="col-md-9">
                    <input type="text" name="title_link_{{$code}}[]" class="form-control"
                           data-name="title_video_{{$code}}">
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
