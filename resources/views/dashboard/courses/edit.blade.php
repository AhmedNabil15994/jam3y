@extends('dashboard._layouts.master')
@section('title',__('dashboard.courses.edit.title'))
@section('content')
@include('dashboard.courses.html.video-html')
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="{{ url(route('dashboard')) }}">
                        {{ __('dashboard.home.home') }}
                    </a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="{{ url(route('courses.index')) }}">
                        {{__('dashboard.courses.title')}}
                    </a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="#">{{__('dashboard.courses.edit.title')}}</a>
                </li>
            </ul>
        </div>

        <h1 class="page-title"></h1>

        <div class="row">
            <form id="updateForm" role="form" class="form-horizontal form-row-seperated" method="post" action="{{route('courses.update',$course->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-md-12">
                    <div class="col-md-3">
                        <div class="panel-group accordion scrollable" id="accordion2">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle"> {{__('dashboard.courses.create.info')}}
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse_2_1" class="panel-collapse in">
                                    <div class="panel-body">
                                        <ul class="nav nav-pills nav-stacked">
                                            <li class="active">
                                                <a href="#global_setting" data-toggle="tab">
                                                    {{ __('dashboard.courses.create.general') }}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9" style="margin-top:-15px">
                        <div class="tab-content">
                            @include('dashboard.courses.forms.edit')
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-actions">
                            @include('dashboard._layouts._ajax-msg')
                            <div class="form-group">
                                <button type="submit" id="submit" class="btn btn-lg green">
                                    {{__('dashboard.general.edit_btn')}}
                                </button>
                                <a href="{{url(route('courses.index')) }}" class="btn btn-lg red">
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

@section('scripts')
<script>
    $(function() {

        $('#jstree').jstree({
            core: {
                check_callback: false
            },
            checkbox: {
                three_state: false,
                whole_node: false,
                tie_selection: false
            },
            plugins: ['checkbox'],
        }).on("check_node.jstree uncheck_node.jstree", function(e, data) {
            $('#root_category').val(data.selected);
        });

    });
</script>


<script src="/vendor/laravel-filemanager/js/single-stand-alone-button.js"></script>

<script type="text/javascript">
    $('#lfm').filemanager('image');
    $('#delete').click(function(){
       $('input#image').val('');
       $('img').attr('src','');
    });
</script>

<script>
$(function(){
  var html = $("div.html-copy-edit").html();
  $('#copy').click(function(event){
      $(".html-copy").append(html);
  });

  $(".html-copy").on("click",".remove_html", function(e){
    e.preventDefault();
    $(this).parent().parent().remove();
  });
});
</script>
@stop
