<div class="tab-pane fade active in" id="global_setting">
    <h3 class="page-title">{{__('dashboard.attachments.create.name')}}</h3>
    <div class="col-md-10">
        @foreach (config('setting.locales') as $code)
        <div class="form-group">
            <label class="col-md-2">
                {{__('dashboard.attachments.create.name')}} - {{ $code }}
            </label>
            <div class="col-md-9">
                <input type="text" name="title[{{$code}}]" class="form-control" data-name="title.{{$code}}" value="{{optional($attachment->translate($code))->title}}">
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
                    <option value="{{ $course['id'] }}" {{($attachment->course_id == $course->id) ? 'selected' : ''}}>
                        {{ $course['title'] }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
        <hr>

        <h3 class="page-title">{{ __('dashboard.attachments.create.attachments') }}</h3>
        <div class="html-copy">
          @foreach ($attachment->urls as $url)
            <div class="col-md-12">
                  @foreach (config('setting.locales') as $code)
                  <div class="form-group">
                      <label class="col-md-2">
                          {{__('dashboard.attachments.create.attachment_name')}} - {{ $code }}
                      </label>
                      <div class="col-md-9">
                          <input type="text" name="title_link_{{$code}}[]" class="form-control" data-name="title_link_{{$code}}" value="{{optional($url->translate($code))->title}}">
                          <div class="help-block"></div>
                      </div>
                  </div>
                  @endforeach
                  <div class="form-group">
                      <label class="col-md-2">
                          {{__('dashboard.attachments.create.link')}}
                      </label>
                      <div class="col-md-9">
                          <input type="text" class="form-control" name="link[]" value="{{url($url->link)}}">
                          <div class="help-block"></div>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-md-2">
                          {{__('dashboard.attachments.create.is_free')}}
                      </label>
                      <div class="col-md-9">
                          <input type="checkbox" class="ischecked" name="is_free[]" value="1" onclick="checkFunction()" {{($url->is_free == 1) ? 'checked' : ''}}>
                          <input type="hidden" class="isUnchecked" name="is_free[]" value="0" {{($url->is_free == 1) ? 'disabled' : ''}}>
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
        <button id="copy" type="button" class="btn green btn-lg mt-ladda-btn ladda-button btn-circle btn-outline" data-style="slide-down" data-spinner-color="#333">
            <span class="ladda-label">
                <i class="icon-plus"></i>
            </span>
        </button>
    </div>
</div>

<div class="tab-pane fade in" id="files">
    <div class="input-group">
        <span class="input-group-btn">
            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                <i class="fa fa-picture-o"></i> Choose
            </a>
        </span>
        <input id="thumbnail" class="form-control" type="text" name="filepath">
    </div>
    <img id="holder" style="margin-top:15px;max-height:100px;">
</div>
