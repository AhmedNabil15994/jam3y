<div class="tab-pane fade active in" id="global_setting">
    <h3 class="page-title">{{__('dashboard.course_packages.create.name')}}</h3>
    <div class="col-md-10">
        @foreach (config('setting.locales') as $code)
        <div class="form-group">
            <label class="col-md-2">
                {{__('dashboard.course_packages.create.name')}} - {{ $code }}
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

        <div class="form-group">
            <label class="col-md-2">
                {{__('dashboard.courses.create.price')}}
            </label>
            <div class="col-md-9">
                <input type="text" class="form-control" name="price" data-name="price">
                <div class="help-block"></div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2">
                {{__('dashboard.courses.create.fixed_date')}}
            </label>
            <div class="col-md-9">
                <input type="checkbox" class="ischecked" name="fixed_date" value="1" onclick="fixDate()">
                <div class="help-block"></div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2">
                {{__('dashboard.courses.create.course_end_at')}}
            </label>
            <div class="col-md-9">
                <div class="input-group input-medium date date-picker" data-date-format="yyyy-mm-dd" data-date-start-date="+0d">
                    <input type="text" class="form-control" name="course_end_at" disabled>
                    <span class="input-group-btn">
                        <button class="btn default" type="button">
                            <i class="fa fa-calendar"></i>
                        </button>
                    </span>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2">
                {{__('dashboard.courses.create.days')}}
            </label>
            <div class="col-md-9">
                <input type="text" class="form-control" name="days" data-name="days">
                <div class="help-block"></div>
            </div>
        </div>
    </div>
</div>
