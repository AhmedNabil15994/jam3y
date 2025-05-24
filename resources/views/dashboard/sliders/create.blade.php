@extends('dashboard._layouts.master')
@section('title',__('dashboard.slider.create.title'))
@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="{{ url(route('home')) }}">
                            {{ __('dashboard.home.home') }}</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <a href="{{ url(route('sliders.index')) }}">
                            {{__('dashboard.sliders.routes.index')}}
                        </a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <a href="#">{{__('dashboard.sliders.routes.create')}}</a>
                    </li>
                </ul>
            </div>

            <h1 class="page-title"></h1>

            <div class="row">
                <form id="form" role="form" class="form-horizontal form-row-seperated" method="post"
                      enctype="multipart/form-data" action="{{route('sliders.store')}}">
                    @csrf
                    <div class="col-md-12">

                        <div class="col-md-3">
                            <div class="panel-group accordion scrollable" id="accordion2">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><a class="accordion-toggle"></a></h4>
                                    </div>
                                    <div id="collapse_2_1" class="panel-collapse in">
                                        <div class="panel-body">
                                            <ul class="nav nav-pills nav-stacked">

                                                <li class="active">
                                                    <a href="#global_setting" data-toggle="tab">
                                                        {{ __('dashboard.sliders.form.tabs.general') }}
                                                    </a>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-9">
                            <div class="tab-content">
                                <div class="tab-pane active fade in" id="global_setting">
                                    <h3 class="page-title">{{__('dashboard.sliders.form.tabs.general')}}</h3>
                                    <div class="col-md-10">

                                        <div class="form-group">
                                            <label class="col-md-2">
                                                {{__('dashboard.sliders.form.link_type')}}
                                            </label>

                                            <div class="col-md-9">
                                                <div class="md-radio-inline">
                                                    <label class="mt-radio">
                                                        <input type="radio" name="type" id="type" value="course"
                                                               checked="checked">
                                                        {{__('dashboard.sliders.form.course')}}
                                                        <span></span>
                                                    </label>
                                                    <label class="mt-radio">
                                                        <input type="radio" name="type" id="type" value="category"
                                                               checked="">
                                                        {{__('dashboard.sliders.form.category')}}
                                                        <span></span>
                                                    </label>
                                                    <label class="mt-radio">
                                                        <input type="radio" name="type" id="type" value="link"
                                                               checked="">
                                                        {{__('dashboard.sliders.form.external_link')}}
                                                        <span></span>
                                                    </label>

                                                </div>
                                                <div class="help-block"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-10 hide-inputs" id="course-input" style="display: none">

                                        <div class="form-group">
                                            <label class="col-md-2">
                                                {{__('dashboard.sliders.form.courses')}}
                                            </label>
                                            <div class="col-md-9">
                                                @inject('courses' ,'App\Modules\Courses\Models\Course')
                                                <select name="course_id" id="single" class="form-control select2"
                                                        style="width: 100%;">
                                                    <option value=""></option>
                                                    @foreach ($courses->get() as $course)
                                                        <option value="{{ $course->id }}">
                                                            {{ $course->translate(locale())->title }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-10 hide-inputs" id="category-input" style="display: none">

                                        <div class="form-group">
                                            <label class="col-md-2">
                                                {{__('dashboard.sliders.form.categories')}}
                                            </label>
                                            <div class="col-md-9">
                                                @inject('categories' ,'App\Modules\Categories\Models\Category')
                                                <select name="category_id" id="single" class="form-control select2"
                                                        style="width: 100%;">
                                                    <option value=""></option>
                                                    @foreach ($categories->get() as $category)
                                                        <option value="{{ $category->id }}">
                                                            {{ $category->translate(locale())->title }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-10 hide-inputs" id="link-input">
                                        <div class="form-group">
                                            <label class="col-md-2">
                                                {{__('dashboard.sliders.form.link')}}
                                            </label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="link" autocomplete="off">
                                                <div class="help-block"></div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-10" style="border-top: 1px solid #e7ecf1;padding-top: 20px;">

                                        <div class="form-group">
                                            <label class="col-md-2">
                                                {{__('dashboard.sliders.form.start_date')}}
                                            </label>
                                            <div class="col-md-4">
                                                <div class="input-group date date-picker" data-date-format="dd-mm-yyyy">
                                                    <input type="text" class="form-control" readonly=""
                                                           name="start_date" aria-required="true" aria-invalid="false"
                                                           aria-describedby="datepicker-error">
                                                    <span class="input-group-btn">
                                                                <button class="btn default" type="button">
                                                                    <i class="fa fa-calendar"></i>
                                                                </button>
                                                            </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-10">

                                        <div class="form-group">
                                            <label class="col-md-2">
                                                {{__('dashboard.sliders.form.end_date')}}
                                            </label>
                                            <div class="col-md-4">
                                                <div class="input-group date date-picker" data-date-format="dd-mm-yyyy">
                                                    <input type="text" class="form-control" readonly=""
                                                           name="end_date" aria-required="true" aria-invalid="false"
                                                           aria-describedby="datepicker-error">
                                                    <span class="input-group-btn">
                                                                <button class="btn default" type="button">
                                                                    <i class="fa fa-calendar"></i>
                                                                </button>
                                                            </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label class="col-md-2">
                                                {{__('dashboard.sliders.form.order')}}
                                            </label>
                                            <div class="col-md-2">
                                                <input type="number" class="form-control" name="order" value=""
                                                       autocomplete="off">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label class="col-md-2">
                                                {{__('dashboard.sliders.form.status')}}
                                            </label>
                                            <div class="col-md-9">
                                                <input type="checkbox" class="make-switch" id="test" data-size="small" name="is_active" checked>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-10">

                                        <div class="form-group">
                                            <label class="col-md-2">
                                                {{__('dashboard.users.create.image')}}
                                            </label>
                                            <div class="col-md-9">
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <a id="lfm" data-input="image" data-preview="holder"
                                                           class="btn btn-primary">
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

                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-actions">
                                @include('dashboard._layouts._ajax-msg')
                                <div class="form-group">
                                    <button type="submit" id="submit" class="btn btn-lg blue">
                                        {{__('dashboard.general.add_btn')}}
                                    </button>
                                    <a href="{{url(route('sliders.index')) }}" class="btn btn-lg red">
                                        {{__('dashboard.general.back_btn')}}
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
@push('scripts')
    <script src="/vendor/laravel-filemanager/js/single-stand-alone-button.js"></script>
    <script>
        $('input[name=type]').change(function () {
            $('.hide-inputs').hide();
            $('#' + this.value + '-input').show();
        })
    </script>
    <script type="text/javascript">
        $('#lfm').filemanager('image');
        $('#delete').click(function () {
            $('input#image').val('');
            $('img').attr('src', '')
        });
    </script>
@endpush
