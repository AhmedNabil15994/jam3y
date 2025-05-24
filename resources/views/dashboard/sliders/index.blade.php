@extends('dashboard._layouts.master')
@section('title',__('dashboard.slider.title'))
@section('content')

<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="{{ url('/dashboard') }}">
                        {{ __('dashboard.home.home') }}</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="#">{{__('dashboard.sliders.routes.index')}}</a>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="portlet light bordered">

{{--                    @permission('add_sliders')--}}
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group">
                                    <a href="{{ url(route('sliders.create')) }}" class="btn sbold green">
                                        <i class="fa fa-plus"></i> {{__('dashboard.general.add_new')}}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
{{--                    @endpermission--}}


                    @include('dashboard.courses.forms.filter')


                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="icon-settings font-dark"></i>
                            <span class="caption-subject bold uppercase">
                                {{__('dashboard.sliders.routes.index')}}
                            </span>
                        </div>
                    </div>

                    {{-- DATATABLE CONTENT --}}
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="dataTable">
                            <thead>
                                <tr>
                                    <th>
                                        <a href="javascript:;" onclick="CheckAll()">
                                            {{__('datatable.select_all')}}
                                        </a>
                                    </th>
                                    <th>#</th>
                                    <th>{{__('dashboard.sliders.datatable.image')}}</th>
                                    <th>{{__('dashboard.sliders.datatable.created_at')}}</th>
                                    <th>{{__('dashboard.sliders.datatable.options')}}</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <button type="submit" id="deleteChecked" class="btn red btn-sm"
{{--                                    onclick="deleteAllChecked('{{ url(route('dashboard.sliders.deletes')) }}')"--}}
                            >
                                {{__('datatable.delete_all')}}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop


@include('dashboard.sliders.forms.table')
