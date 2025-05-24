<div class="tab-pane fade active in" id="global_setting">
    <h3 class="page-title">{{__('dashboard.news.create.name')}}</h3>
    <div class="col-md-10">
        @foreach (config('setting.locales') as $code)
        <div class="form-group">
            <label class="col-md-2">
                {{__('dashboard.news.create.name')}} - {{ $code }}
            </label>
            <div class="col-md-9">
                <input type="text" name="title[{{$code}}]" class="form-control" data-name="title.{{$code}}" value="{{optional($news->translate($code))->title}}">
                <div class="help-block"></div>
            </div>
        </div>
        @endforeach
        <hr>
        <h3 class="page-title">{{__('dashboard.news.create.description')}}</h3>
        @foreach (config('setting.locales') as $code)
        <div class="form-group">
            <label class="col-md-2">
                {{__('dashboard.news.create.description')}} - {{ $code }}
            </label>
            <div class="col-md-9">
                <textarea name="description[{{$code}}]" rows="8" cols="80" class="form-control {{check_dir($code)}}Editor" data-name="description.{{$code}}">{!!optional($news->translate($code))->description!!}</textarea>
                <div class="help-block"></div>
            </div>
        </div>
        @endforeach
        <hr>
        <div class="form-group">
            <label class="col-md-2">
                {{__('dashboard.news.create.status')}}
            </label>
            <div class="col-md-9">
                <input type="checkbox" class="make-switch" id="test" data-size="small" name="status" {{($news->status == 1) ? ' checked="" ' : ''}}>
                <div class="help-block"></div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2">
                {{__('dashboard.categories.create.image')}}
            </label>
            <div class="col-md-9">
                <div class="input-group">
                    <span class="input-group-btn">
                        <a id="lfm" data-input="image" data-preview="holder" class="btn btn-primary">
                            <i class="fa fa-picture-o"></i>
                        </a>
                    </span>
                </div>
                <span id="holder" style="margin-top:15px;max-height:100px;">
                    <img src="{{url($news->image)}}" style="height: 15rem;">
                </span>
                <span id="image"></span>
            </div>
        </div>
    </div>
</div>
