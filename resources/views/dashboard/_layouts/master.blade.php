<!DOCTYPE html>
<html lang="{{ locale() }}" dir="{{ is_rtl() }}">

    @if (is_rtl() == 'rtl')
      @include('dashboard._layouts._head_rtl')
    @else
      @include('dashboard._layouts._head_ltr')
    @endif
{{-- styles --}}
    <link href="{{asset('ckeditor5/css/ckeditor.css')}}"
        rel="stylesheet"
        id="style_components"
        type="text/css" />

   
    <style>

        .table-striped{
            width: 100% !important;
        }
        </style>
    @stack('styles')

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white page-md">
        <div class="page-wrapper">

            @include('dashboard._layouts._header')

            <div class="clearfix"> </div>

            <div class="page-container">
                @include('dashboard._layouts._aside')

                @yield('content')
            </div>

            @include('dashboard._layouts._footer')
        </div>

        @include('dashboard._layouts._jquery')
        @include('dashboard._layouts._js')

    </body>
</html>
