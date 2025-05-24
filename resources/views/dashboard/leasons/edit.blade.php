@extends('dashboard._layouts.master')
@section('title',__('dashboard.leasons.edit.title'))
@section('content')
    @include('dashboard.leasons.html.video-html')
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
                        <a href="{{ url(route('leasons.index')) }}">
                            {{__('dashboard.leasons.title')}}
                        </a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <a href="#">{{__('dashboard.leasons.edit.title')}}</a>
                    </li>
                </ul>
            </div>

            <h1 class="page-title"></h1>

            <div class="row">
                <form id="updateForm" role="form" class="form-horizontal form-row-seperated" method="post"
                      action="{{route('leasons.update',$leason->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-md-12">
                        <div class="col-md-3">
                            <div class="panel-group accordion scrollable" id="accordion2">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="accordion-toggle"> {{__('dashboard.leasons.create.info')}}
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse_2_1" class="panel-collapse in">
                                        <div class="panel-body">
                                            <ul class="nav nav-pills nav-stacked">
                                                <li class="active">
                                                    <a href="#global_setting" data-toggle="tab">
                                                        {{ __('dashboard.leasons.create.general') }}
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#sorting" data-toggle="tab">
                                                        {{ __('dashboard.leasons.create.sorting') }}
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
                                @include('dashboard.leasons.forms.edit')
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-actions">
                                @include('dashboard._layouts._ajax-msg')
                                <div class="form-group">
                                    <button type="submit" id="submit" class="btn btn-lg green">
                                        {{__('dashboard.general.edit_btn')}}
                                    </button>
                                    <a href="{{url(route('leasons.index')) }}" class="btn btn-lg red">
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

@push('styles')
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
@endpush
@push('scripts')

   {{-- <script src="https://code.jquery.com/jquery-1.10.2.js"></script> --}}
   <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script type="text/javascript">
        $('.re_order').on('click', function (e) {

            var data = $('#sortable').sortable('serialize');

            $.ajax({

                url: '{{url(route('leasons.store.sorting'))}}',
                type: 'GET',
                dataType: 'JSON',
                data: data,
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    if (data[0] == true) {
                        toastr["success"](data[1]);
                    } else {
                        console.log(data);
                        toastr["error"](data[1]);
                    }
                },
                error: function (data) {
                    console.log(data);
                },
            });

        });

        $(document).ready(function () {
            $('#sortable').sortable();
        });

    </script>

    <script>
        $(function () {
            var html = $("div.html-copy-edit").html();
            $('#copy').click(function (event) {
                $(".html-copy").append(html);
            });

            $(".html-copy").on("click", ".remove_html", function (e) {
                e.preventDefault();
                $(this).parent().parent().remove();
            });
        });

        function checkFunction() {
            $('[name="is_free[]"]').change(function () {
                if ($(this).is(':checked'))
                    $(this).next().prop('disabled', true);
                else
                    $(this).next().prop('disabled', false);
            });

        }
    </script>

    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>

    <script>
        var domain = "";

        $('#lfm').filemanager('file', {prefix: domain});
    </script>
    <script>
        function selectVideo(a, video) {
            var target = $('#' + ($('#target').val()));
            var video_html = $(a).html();
            var parent_target = target.parent();
            parent_target.children('input').val(video);
            parent_target.children('.video-card').text('').append(video_html);
            $('#videos-modal').modal('hide');
        }

        function openVideoModal(a) {
            var id = generateString(30);
            $(a).attr('id', id);
            $('#target').val(id);
            $('#videos-modal').modal('show');
        }

        function generateString(length) {
            var result = [];
            var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            var charactersLength = characters.length;
            for (var i = 0; i < length; i++) {
                result.push(characters.charAt(Math.floor(Math.random() *
                    charactersLength)));
            }
            return result.join('');
        }
    </script>

@endpush
