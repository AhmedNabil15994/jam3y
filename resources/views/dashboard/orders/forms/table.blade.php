@section('scripts')

<script>
  function tableGenerate(data='') {

    var dataTable =
    $('#dataTable').DataTable({
        ajax : {
            url   : "{{ url(route('orders.dataTable')) }}",
            type  : "GET",
            data  : {
                req : data,
            },
        },
        language: {
            url:"//cdn.datatables.net/plug-ins/1.10.16/i18n/{{ucfirst(LaravelLocalization::getCurrentLocaleName())}}.json"
        },
        processing: true,
        serverSide: true,
        responsive: !0,
        order     : [[ 1 , "desc" ]],
        columns: [
          {data: 'id' 		 	        , className: 'dt-center'},
          {data: 'id' 		 	        , className: 'dt-center'},
    			{data: 'total' 		 	        , className: 'dt-center'},
          {data: 'user'             , className: 'dt-center' , render: ".name" , orderable: false},
    			{data: 'order_status_id' 	, className: 'dt-center'},
          {data: 'createdAt' 		    , className: 'dt-center'},
          {data: 'id'},
    		],
        columnDefs: [
          {
    				targets: 0,
    				width: '30px',
    				className: 'dt-center',
    				orderable: false,
    				render: function(data, type, full, meta) {
    					return `<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                        <input type="checkbox" value="`+data+` class="group-checkable" name="ids">
                        <span></span>
                      </label>
                    `;
    				},
    			},
          {
    				targets: 4,
    				width: '30px',
    				className: 'dt-center',
    				render: function(data, type, full, meta) {
              if (data == 1) {
                return '<span class="badge badge-success"> عملية دفع ناجحة </span>';
              }else{
                return '<span class="badge badge-danger"> {{__('datatable.unactive')}} </span>';
              }
    				},
    			},
          {
             targets: -1,
            responsivePriority: 1,
            width: '13%',
            title: '{{__('dashboard.orders.datatable.options')}}',
            className: 'dt-center',
            orderable: false,
            render: function(data, type, full, meta) {

              // Show
              var showUrl = '{{ route("orders.show", ":id") }}';
              showUrl = showUrl.replace(':id', data);

              return `
              @permission('show_orders')
                <a href="`+showUrl+`" class="btn btn-sm btn-warning" title="Show">
                        <i class="fa fa-eye"></i>
                      </a>
              @endpermission`;
            },
          },
        ],
        dom: 'Bfrtip',
        lengthMenu: [
            [ 10, 25, 50 , 100 , 500 ],
            [ '10', '25', '50', '100' , '500']
        ],
				buttons:[
					{
						extend: "pageLength", className: "btn blue btn-outline",
            text: "{{__('datatable.pageLength')}}",
            exportOptions: {
                stripHtml: true,
                columns: ':visible'
            }
					},
					{
						extend: "print", className: "btn blue btn-outline" ,
            text: "{{__('datatable.print')}}",
            exportOptions: {
                stripHtml: true,
                columns: ':visible'
            }
					},
					{
							extend: "pdf", className: "btn blue btn-outline" ,
              text: "{{__('datatable.pdf')}}",
              exportOptions: {
                  stripHtml: true,
                  columns: ':visible'
              }
					},
					{
							extend: "excel", className: "btn blue btn-outline " ,
              text: "{{__('datatable.excel')}}",
              exportOptions: {
                  stripHtml: true,
                  columns: ':visible'
              }
					},
					{
							extend: "colvis", className: "btn blue btn-outline",
              text: "{{__('datatable.colvis')}}",
              exportOptions: {
                  stripHtml: true,
                  columns: ':visible'
              }
					}
				]
    });
}

jQuery(document).ready(function() {
	tableGenerate();
});
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>


<script>
  var ctx = document.getElementById("myChart");
    var labels = {!! $couponCounter['coupons'] !!};
    var count  = {!! $couponCounter['counter'] !!};
    var data   = {
        labels: labels,
        datasets: [
            {
                label: "عدد استخدام الكوبونات",
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
