<!DOCTYPE html>
<html lang="{{ locale() }}" dir="{{ is_rtl() }}">
    @if (is_rtl() == 'rtl')
      @include('front._layouts._head_rtl')
    @else
      @include('front._layouts._head_ltr')
    @endif

    @stack('css')
    <body>
        <div class="body_wrapper">
            @include('front._layouts._header')

            @yield('content')

            @include('front._layouts._footer')
        </div>
        @include('front._layouts._jquery')
    @stack('scripts')
    </body>
</html>
