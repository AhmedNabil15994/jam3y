<div class="top-header">
    <div class="container">
        <div class="row">

            <div class="col-md-7">
                <div class="top-header-links desktop-menu">

                    <a href="{{url(route('home'))}}">{{__('front.top_header.home')}}</a>

                    @foreach ($mainCategories as $mainCategory)
                        <a href="{{ (count($mainCategory->courses) > 0) ?
                        url(route('front.categories.show',$mainCategory->slug).'?target_main_cat='.$mainCategory->slug)
                        : url(route('home').'?target_main_cat='.$mainCategory->slug) }}">
                        {{$mainCategory->title}}
                        @if($mainCategory->coming_soon==1)
                        (@lang('front.home.comming_soon'))
                        @endif

                    </a>
                    @endforeach

                    <div class="main-nav-wrap" style="display: inline-block;margin: 0px !important;">
                        <div class="mobile-overlay"></div>
                        <ul class="mobile-main-nav">
                            <div class="mobile-menu-helper-top"></div>

                            @if(session('target_main_cat') && !empty($homeCategories) && count($homeCategories))
                                <li class="has-children">
                                    <a href="index.php?page=course-details" class="cat">
                                        <span class="cat-span">{{__('front.header.categories')}}</span>
                                    </a>

                                    <ul class="category corner-triangle top-left is-hidden">
                                        @include('front._layouts.categories.tree')
                                    </ul>

                                </li>
                            @endif
                            <div class="mobile-menu-helper-bottom"></div>
                        </ul>
                    </div>

                    <a href="{{url(route('front.news.index'))}}">{{__('front.top_header.news')}}</a>

                    @foreach ($pages as $page)
                        <a href="{{url(route('front.pages.show',$page->slug))}}">{{$page->title}}</a>
                    @endforeach

                </div>
            </div>

            <div class="col-md-5">
                <div class="footer-social-icons">
                    @if(config('setting.social')['facebook'])
                        <a href="{{config('setting.social')['facebook']}}" target="_blank" class="ti-facebook"></a>
                    @endif
                    @if(config('setting.social')['twitter'])
                        <a href="{{config('setting.social')['twitter']}}" target="_blank" class="ti-twitter"></a>
                    @endif
                    @if(config('setting.social')['instagram'])
                        <a href="{{config('setting.social')['instagram']}}" target="_blank" class="ti-instagram"></a>
                    @endif
                    @if(config('setting.social')['youtube'])
                        <a href="{{config('setting.social')['youtube']}}" target="_blank" class="ti-youtube"></a>
                    @endif
                    @if(config('setting.social')['linkedin'])
                        <a href="{{config('setting.social')['linkedin']}}" target="_blank" class="ti-linkedin"></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<section class="menu-area">
    <div class="container">
        <div class="row">
            <div class="col">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a href="{{url(route('home'))}}" class="navbar-brand"><img src="{{config('setting')['logo']}}"
                                                                               alt="logo" height="60"></a>
                    <ul class="mobile-header-buttons">
                        <li>
                            <a class="mobile-nav-trigger" href="#mobile-primary-nav">
                                <i class="fa fa-bars"></i> {{__('front.header.menu')}}
                            </a>
                        </li>
                        <li>
                            <a class="mobile-search-trigger" href="#mobile-search">
                                <i class="fa fa-search"></i> {{__('front.header.search')}}
                            </a>
                        </li>
                    </ul>

                    <form class="inline-form" action="#" method="get" style="width: 100%;">
                        <div class="input-group search-box mobile-search">
                            <input type="text" name='query' class="form-control"
                                   placeholder="{{__('front.header.search_placeholder')}}">
                            <div class="input-group-append">
                                <button class="btn" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <div class="cart-box menu-icon-box" id="cart_items">
                        <div class="icon">
                            <a href="{{url(route('front.cart.index'))}}">
                                <i class="fas fa-shopping-cart"></i>
                            </a>
                            <span class="number">{{count(Cart::getContent())}}</span>
                        </div>
                    </div>

                    <span class="signin-box-move-desktop-helper"></span>

                    <div class="sign-in-box btn-group">

                        <div class="top-header-links responsive-links">
                            <a href="{{url(route('home'))}}">{{__('front.top_header.home')}}</a>
                            <a href="{{url(route('front.news.index'))}}">{{__('front.top_header.news')}}</a>
                            @foreach ($pages as $page)
                                <a href="{{url(route('front.pages.show',$page->slug))}}">{{$page->title}}</a>
                            @endforeach
                        </div>

                        @auth ()
                            <a href="{{url(route('front.profile.show'))}}" class="btn btn-sign-in">
                                {{__('front.header.profile')}}
                            </a>
                            <a href="#"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                               class="btn btn-sign-in">
                                {{__('front.header.logout')}}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">@csrf</form>
                        @else
                            <a href="{{url(route('login'))}}" class="btn btn-sign-in">
                                {{__('front.header.login')}}
                            </a>
                            <a href="{{url(route('register'))}}" class="btn btn-sign-up">
                                {{__('front.header.register') }}
                            </a>
                        @endauth

                        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            @if ($localeCode != locale())
                                <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                                   class="btn btn-lang cat-span" style="color: #686f7a">
                                    <i class="fa fa-globe"></i> {{ $properties['native'] }}
                                </a>
                            @endif
                        @endforeach

                    </div>
                </nav>
            </div>
        </div>
    </div>
</section>
