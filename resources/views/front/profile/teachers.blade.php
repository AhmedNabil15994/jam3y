@extends('front._layouts.master')
@section('title',' شاشة المدرس')
@section('content')

	<div class="inner-page profile-pages">
	    <div class="container">
	        <div class="row">
	            <div class="col-md-3">
	                <div class='profile-img-block'>
										<img class="img-responsive profile-img" src="{{url(auth()->user()->avatar)}}" alt="" style="width:50%">
	                </div>
									<ul class="list-group">

										<li class="list-group-item">
											<a href="{{url(route('front.profile.show'))}}">
												<i class="ti-user"></i> ملفي الشخصي
											</a>
										</li>


										@permission('teachers_access')
										<li class="list-group-item active">
											<a href="javascript:;">
												<i class="ti-bookmark-alt"></i> شاشة المدرس
											</a>
										</li>

										@else
										<li class="list-group-item">
											<a href="{{url(route('front.profile.courses'))}}">
												<i class="ti-bookmark-alt"></i> كورساتي
											</a>
										</li>

										@endpermission
									</ul>
	            </div>
	            <div class="col-md-9">
	                <div class="chart-block">
	                    <h2 class="sub-title"><span> تقارير اشتراكات المواد التي تدرسها</span></h2>
	                    <canvas id="myChart"></canvas>
	                </div>

	                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

									<script>
										var ctx = document.getElementById("myChart");
									    var labels = {!! $statistics['profit_dates'] !!};
									    var count  = {!! $statistics['profits'] !!};
									    var data   = {
									        labels: labels,
									        datasets: [
									            {
									                label: "اشتراكات المواد",
									                fill: false,
									                lineTension: 0.1,
									                backgroundColor: "#36A2EB",
									                borderColor: "#36A2EB",
									                borderCapStyle: 'butt',
									                borderDash: [],
									                borderDashOffset: 0.0,
									                borderJoinStyle: 'miter',
									                pointBorderColor: "#36A2EB",
									                pointBackgroundColor: "#fff",
									                pointBorderWidth: 1,
									                pointHoverRadius: 5,
									                pointHoverBackgroundColor: "#36A2EB",
									                pointHoverBorderColor: "#FFCE56",
									                pointHoverBorderWidth: 2,
									                pointRadius: 1,
									                pointHitRadius: 10,
									                data: count,
									                spanGaps: false,
									            }
									        ]
									    };
									    var myLineChart = new Chart(ctx, {
									        type: 'line',
									        label:labels,
									        data: data,
									        options: {
									            animation:{
									                animateScale:true
									            }
									        }
									    });
									</script>

	            </div>
	        </div>
	    </div>
	</div>
	</div>

@stop
