@extends('dashboard._layouts.master')
@section('title',__('dashboard.coupons.create.title'))
@section('content')
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
                    <a href="{{ url(route('coupons.index')) }}">
                        {{__('dashboard.coupons.title')}}
                    </a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="#">{{__('dashboard.coupons.create.title')}}</a>
                </li>
            </ul>
        </div>

        <h1 class="page-title"></h1>

        <div class="row">
            <form id="form" role="form" class="form-horizontal form-row-seperated" method="post" action="{{route('coupons.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12">
                    <div class="col-md-3">
                        <div class="panel-group accordion scrollable" id="accordion2">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle"> {{__('dashboard.coupons.create.info')}}
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse_2_1" class="panel-collapse in">
                                    <div class="panel-body">
                                        <ul class="nav nav-pills nav-stacked">
                                            <li class="active">
                                                <a href="#global_setting" data-toggle="tab">
                                                    {{ __('dashboard.coupons.create.general') }}
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
                            @include('dashboard.coupons.forms.create')
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-actions">
                            @include('dashboard._layouts._ajax-msg')
                            <div class="form-group">
                                <button type="submit" id="submit" class="btn btn-lg blue">
                                    {{__('dashboard.general.add_btn')}}
                                </button>
                                <a href="{{url(route('coupons.index')) }}" class="btn btn-lg red">
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

function fixedPrice(){

  $('[name="is_fixed_price"]').change(function(){

      if($(this).is(':checked')){

        $('[name="price"]').prop('disabled', false);
        $('[name="percent"]').prop('disabled', true);

      }else{

        $('[name="price"]').prop('disabled', true);
        $('[name="percent"]').prop('disabled', false);

      }

  });

}

</script>
@stop
