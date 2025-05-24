@extends('dashboard._layouts.master')
@section('title',__('dashboard.order.routes.show'))
@section('content')
<style type="text/css" media="print">
	@page {
		size  : auto;
		margin: 0;
	}
	@media print {
		a[href]:after {
		content: none !important;
	}
	.contentPrint{
			width: 100%;
		}
		.no-print, .no-print *{
			display: none !important;
		}
	}
</style>
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
					<a href="{{ url(route('orders.index')) }}">
						{{__('dashboard.order.routes.home')}}
					</a>
					<i class="fa fa-circle"></i>
				</li>
				<li>
					<a href="#">{{__('dashboard.order.routes.show')}}</a>
				</li>
			</ul>
		</div>

		<h1 class="page-title"></h1>

		<div class="row">
			<div class="col-md-12">
				<div class="no-print">
					<div class="col-md-3">
						<ul class="ver-inline-menu tabbable margin-bottom-10">
							<li class="active">
								<a data-toggle="tab" href="#preview">
									<i class="fa fa-cog"></i> {{__('dashboard.order.form.show.info')}}
								</a>
								<span class="after"></span>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-md-9 contentPrint">
					<div class="tab-content">
						@include('dashboard.orders.forms.show')
					</div>
				</div>
				<div class="row">
					<div class="col-xs-4">
						<a class="btn btn-lg blue hidden-print margin-bottom-5" onclick="javascript:window.print();">
							{{__('dashboard.general.print_btn')}}
							<i class="fa fa-print"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop
