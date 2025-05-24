@extends('dashboard._layouts.master')
@section('title', __('dashboard.home.title') )
@section('content')

<div class="page-content-wrapper">
    <div class="page-content">

        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="{{ url(route('dashboard')) }}">{{ __('dashboard.home.title') }}</a>
                </li>
            </ul>
        </div>

        <h1 class="page-title"> {{ __('dashboard.home.welcome') }} ,
            <small><b style="color:red">{{ Auth::user()->name }} </b></small>
        </h1>

        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
                    <div class="visual">
                        <i class="fa fa-users"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="{{$countUsers}}">0</span>
                        </div>
                        <div class="desc">الاعضاء</div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 red" href="#">
                    <div class="visual">
                        <i class="fa fa-users"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="{{$countCourses}}">0</span>
                        </div>
                        <div class="desc">المدرسين</div>
                    </div>
                </a>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 yellow" href="#">
                    <div class="visual">
                        <i class="fa fa-book"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="{{$countCourses}}">0</span>
                        </div>
                        <div class="desc">الكورسات المفعلة حاليا</div>
                    </div>
                </a>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
                    <div class="visual">
                        <i class="fa fa-bar-chart-o"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="{{$totalProfit}}">0</span> KWD
                        </div>
                        <div class="desc"> ارباح الاشتراكات </div>
                    </div>
                </a>
            </div>

        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class=" icon-layers font-green"></i>
                            <span class="caption-subject font-green bold uppercase">
                                احصائيات
                            </span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="mt-element-card mt-card-round mt-element-overlay">
                            <div class="row">
                                <div class="general-item-list">

                                    <div class="col-md-6">
                                        <b class="page-title">تاريخ اضافة الاعضاء</b>
                                        <canvas id="myChart2" width="540" height="270" ></canvas>
                                    </div>

                                    <div class="col-md-6">
                                        <b class="page-title">ارباح الاشتراكات</b>
                                        <canvas id="myChart" width="540" height="270" ></canvas>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@stop



{{-- JQUERY++ --}}
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<script>
    // USERS COUNT BY DATE
    var ctx = document.getElementById("myChart2").getContext('2d');
    var labels = {!! $userCreated['userDate'] !!};
    var countDate = {!! $userCreated['countDate'] !!};
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'تاريخ اضافة الاعضاء',
                data: countDate,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54 , 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75 , 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54 , 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75 , 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
</script>

<script>
    var ctx = document.getElementById("myChart");
    var labels = {!! $monthlyProfite['profit_dates'] !!};
    var count  = {!! $monthlyProfite['profits'] !!};
    var data   = {
        labels: labels,
        datasets: [
            {
                label: "ارباح الاشتراكات",
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

@stop
