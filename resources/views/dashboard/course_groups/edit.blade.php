@extends('dashboard._layouts.master')
@section('title',__('dashboard.course_groups.edit.title'))
@section('content')
@include('dashboard.course_groups.html.video-html')
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
                    <a href="{{ url(route('course_groups.index')) }}">
                        {{__('dashboard.course_groups.title')}}
                    </a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="#">{{__('dashboard.course_groups.edit.title')}}</a>
                </li>
            </ul>
        </div>

        <h1 class="page-title"></h1>

        <div class="row">
            <form id="updateForm" role="form" class="form-horizontal form-row-seperated" method="post" action="{{route('course_groups.update',$group->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-md-12">
                    <div class="col-md-3">
                        <div class="panel-group accordion scrollable" id="accordion2">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle"> {{__('dashboard.course_groups.create.info')}}
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse_2_1" class="panel-collapse in">
                                    <div class="panel-body">
                                        <ul class="nav nav-pills nav-stacked">
                                            <li class="active">
                                                <a href="#global_setting" data-toggle="tab">
                                                    {{ __('dashboard.course_groups.create.general') }}
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
                            @include('dashboard.course_groups.forms.edit')
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-actions">
                            @include('dashboard._layouts._ajax-msg')
                            <div class="form-group">
                                <button type="submit" id="submit" class="btn btn-lg green">
                                    {{__('dashboard.general.edit_btn')}}
                                </button>
                                <a href="{{url(route('course_groups.index')) }}" class="btn btn-lg red">
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
$(function(){
  var html = $("div.html-copy").html();
  $('#copy').click(function(event){
      $(".html-copy").append(html);
  });

  $(".html-copy").on("click",".remove_html", function(e){
    e.preventDefault();
    $(this).parent().parent().remove();
  });
});

function checkFunction(){
  $('[name="is_free[]"]').change(function(){
      if($(this).is(':checked'))
        $(this).next().prop('disabled', true);
      else
        $(this).next().prop('disabled', false);
  });

}
</script>
@stop
