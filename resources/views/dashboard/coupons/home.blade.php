@extends('dashboard._layouts.master')
@section('title',__('dashboard.coupons.title'))
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
                    <a href="#">{{__('dashboard.coupons.title')}}</a>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="portlet light bordered">

                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                                @permission('add_coupons')
                                <div class="btn-group">
                                    <a href="{{ url(route('coupons.create')) }}" class="btn sbold green">
                                        <i class="fa fa-plus"></i> {{__('dashboard.general.add_new')}}
                                    </a>
                                </div>
                                @endpermission
                            </div>
                        </div>
                    </div>

                    {{-- DATATABLE FILTER --}}
                    @include('dashboard.coupons.forms.filter')

                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="icon-settings font-dark"></i>
                            <span class="caption-subject bold uppercase">
                                {{__('dashboard.coupons.title')}}
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
                                    <th>{{__('dashboard.coupons.datatable.code')}}</th>
                                    <th>{{__('dashboard.coupons.datatable.is_fixed_price')}}</th>
                                    <th>{{__('dashboard.coupons.datatable.price')}}</th>
                                    <th>{{__('dashboard.coupons.datatable.percent')}}</th>
                                    <th>{{__('dashboard.coupons.datatable.expire_date')}}</th>
                                    <th>{{__('dashboard.coupons.datatable.created_at')}}</th>
                                    <th>{{__('dashboard.coupons.datatable.options')}}</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    @permission('delete_coupons')
                    <div class="row">
                        <div class="form-group">
                            <button type="submit" id="deleteChecked" class="btn red btn-sm" onclick="deleteAllChecked('{{ url(route('coupons.deletes')) }}')">
                            {{__('datatable.delete_all')}}
                            </button>
                        </div>
                    </div>
                    @endpermission
                </div>
            </div>
        </div>
    </div>
</div>
@stop


@section('scripts')

  @include('dashboard.coupons.forms.table')

@stop
