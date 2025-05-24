@section('scripts')

<script>
    function tableGenerate(data = '') {

            var dataTable =
                $('#dataTable').DataTable({
                    "createdRow": function (row, data, dataIndex) {
                        if (data["deleted_at"] != null) {
                            $(row).addClass('danger');
                        }
                    },
                    ajax: {
                        url: "{{ url(route('sliders.dataTable')) }}",
                        type: "GET",
                        data: {
                            req: data,
                        },
                    },
                    language: {
                        url: "//cdn.datatables.net/plug-ins/1.10.16/i18n/{{ucfirst(LaravelLocalization::getCurrentLocaleName())}}.json"
                    },
                    stateSave: true,
                    processing: true,
                    serverSide: true,
                    responsive: !0,
                    order: [[1, "desc"]],
                    columns: [
                        {data: 'id', className: 'dt-center'},
                        {data: 'id', className: 'dt-center'},
                        {
                            data: "image", orderable: false, width: "1%",
                            render: function (data, type, row) {
                                return '<img src="' + data + '" width="50px"/>'
                            }
                        },
                        // {data: 'status' , className: 'dt-center'},
                        {data: 'created_at', className: 'dt-center'},
                        {data: 'id'},
                    ],
                    columnDefs: [
                        {
                            targets: 0,
                            width: '30px',
                            className: 'dt-center',
                            orderable: false,
                            render: function (data, type, full, meta) {
                                return `<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                      <input type="checkbox" value="` + data + ` class="group-checkable" name="ids">
                      <span></span>
                    </label>
                  `;
                            },
                        },
                        {
                            targets: 2,
                            width: '30px',
                            className: 'dt-center',
                            render: function (data, type, full, meta) {
                                if (data === 1) {
                                    return '<span class="badge badge-success"> {{__('dashboard.datatable.active')}} </span>';
                                } else {
                                    return '<span class="badge badge-danger"> {{__('dashboard.datatable.unactive')}} </span>';
                                }
                            },
                        },
                        {
                             targets: -1,
            responsivePriority: 1,
                            width: '13%',
                            title: '{{__('dashboard.sliders.datatable.options')}}',
                            className: 'dt-center',
                            orderable: false,
                            render: function (data, type, full, meta) {

                                // Edit
                                var editUrl = '{{ route("sliders.edit", ":id") }}';
                                editUrl = editUrl.replace(':id', data);

                                // Delete
                                var deleteUrl = '{{ route("sliders.destroy", ":id") }}';
                                deleteUrl = deleteUrl.replace(':id', data);

                                return `

                  <a href="` + editUrl + `" class="btn btn-sm blue" title="Edit">
                    <i class="fa fa-edit"></i>
                 </a>
                                    <a href="javascript:;" onclick="deleteRow('` + deleteUrl + `')" class="btn btn-sm red">
                    <i class="fa fa-trash"></i>
                  </a>`;
                            },
                        },
                    ],
                    dom: 'Bfrtip',
                    lengthMenu: [
                        [10, 25, 50, 100, 500],
                        ['10', '25', '50', '100', '500']
                    ],
                    buttons: [
                        {
                            extend: "pageLength", className: "btn blue btn-outline",
                            text: "{{__('dashboard.datatable.pageLength')}}",
                            exportOptions: {
                                stripHtml: false,
                                columns: ':visible',
                                columns: [1, 2, 3, 4, 5]
                            }
                        },
                        {
                            extend: "print", className: "btn blue btn-outline",
                            text: "{{__('dashboard.datatable.print')}}",
                            exportOptions: {
                                stripHtml: false,
                                columns: ':visible',
                                columns: [1, 2, 3, 4, 5]
                            }
                        },
                        {
                            extend: "pdf", className: "btn blue btn-outline",
                            text: "{{__('dashboard.datatable.pdf')}}",
                            exportOptions: {
                                stripHtml: false,
                                columns: ':visible',
                                columns: [1, 2, 3, 4, 5]
                            }
                        },
                        {
                            extend: "excel", className: "btn blue btn-outline ",
                            text: "{{__('dashboard.datatable.excel')}}",
                            exportOptions: {
                                stripHtml: false,
                                columns: ':visible',
                                columns: [1, 2, 3, 4, 5]
                            }
                        },
                        {
                            extend: "colvis", className: "btn blue btn-outline",
                            text: "{{__('dashboard.datatable.colvis')}}",
                            exportOptions: {
                                stripHtml: false,
                                columns: ':visible',
                                columns: [1, 2, 3, 4, 5]
                            }
                        }
                    ]
                });
        }

        jQuery(document).ready(function () {
            tableGenerate();
        });
</script>

@stop
