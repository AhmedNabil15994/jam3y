<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu  page-header-fixed" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
            <li class="sidebar-toggler-wrapper hide">
                <div class="sidebar-toggler">
                    <span></span>
                </div>
            </li>
            <li class="nav-item start active">
                <a href="{{ url(route('dashboard')) }}" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">{{ __('dashboard.aside.dashboard') }}</span>
                    <span class="selected"></span>
                </a>
            </li>

            <li class="heading">
                <h3 class="uppercase">{{ __('dashboard.aside.users_tab') }}</h3>
            </li>

            {{-- <li class="nav-item">
                <a href="{{ url(route('permissions.index')) }}" class="nav-link nav-toggle">
                    <i class="icon-settings"></i>
                    <span class="title">{{ __('dashboard.aside.permissions') }}</span>
                </a>
            </li> --}}

            @permission('show_roles')
            <li class="nav-item">
                <a href="{{ url(route('roles.index')) }}" class="nav-link nav-toggle">
                    <i class="icon-settings"></i>
                    <span class="title">{{ __('dashboard.aside.roles') }}</span>
                </a>
            </li>
            @endpermission

            @permission('show_users')
            <li class="nav-item">
                <a href="{{ url(route('users.index')) }}" class="nav-link nav-toggle">
                    <i class="icon-settings"></i>
                    <span class="title">{{ __('dashboard.aside.users') }}</span>
                </a>
            </li>
            @endpermission

            <li class="heading">
                <h3 class="uppercase">{{ __('dashboard.aside.store') }}</h3>
            </li>

            @permission('show_categories')
            <li class="nav-item">
                <a href="{{ url(route('categories.index')) }}" class="nav-link nav-toggle">
                    <i class="icon-settings"></i>
                    <span class="title">{{ __('dashboard.aside.categories') }}</span>
                </a>
            </li>
            @endpermission


            @permission('show_courses')
            <li class="nav-item">
                <a href="{{ url(route('courses.index')) }}" class="nav-link nav-toggle">
                    <i class="icon-settings"></i>
                    <span class="title">{{ __('dashboard.aside.courses') }}</span>
                </a>
            </li>
            @endpermission

            @permission('show_course_packages')
            <li class="nav-item">
                <a href="{{ url(route('course_packages.index')) }}" class="nav-link nav-toggle">
                    <i class="icon-settings"></i>
                    <span class="title">{{ __('dashboard.aside.course_packages') }}</span>
                </a>
            </li>
            @endpermission

            @permission('show_attachments')
            <li class="nav-item">
                <a href="{{ url(route('attachments.index')) }}" class="nav-link nav-toggle">
                    <i class="icon-settings"></i>
                    <span class="title">{{ __('dashboard.aside.attachments') }}</span>
                </a>
            </li>
            @endpermission

            @permission('show_leasons')
            <li class="nav-item">
                <a href="{{ url(route('leasons.index')) }}" class="nav-link nav-toggle">
                    <i class="icon-settings"></i>
                    <span class="title">{{ __('dashboard.aside.leasons') }}</span>
                </a>
            </li>
            @endpermission

            @permission('show_coupons')
            <li class="nav-item">
                <a href="{{ url(route('coupons.index')) }}" class="nav-link nav-toggle">
                    <i class="icon-settings"></i>
                    <span class="title">{{ __('dashboard.aside.coupons') }}</span>
                </a>
            </li>
            @endpermission

            @permission('show_orders')
            <li class="nav-item">
                <a href="{{ url(route('orders.index')) }}" class="nav-link nav-toggle">
                    <i class="icon-settings"></i>
                    <span class="title">{{ __('dashboard.aside.orders') }}</span>
                </a>
            </li>
            @endpermission


            <li class="heading">
                <h3 class="uppercase">{{ __('dashboard.aside.control') }}</h3>
            </li>

            @permission('show_news')
            <li class="nav-item">
                <a href="{{ url(route('news.index')) }}" class="nav-link nav-toggle">
                    <i class="icon-settings"></i>
                    <span class="title">{{ __('dashboard.aside.news') }}</span>
                </a>
            </li>
            @endpermission

{{--            @permission('show_sliders')--}}
            <li class="nav-item">
                <a href="{{ url(route('sliders.index')) }}" class="nav-link nav-toggle">
                    <i class="icon-settings"></i>
                    <span class="title">{{ __('dashboard.aside.sliders') }}</span>
                </a>
            </li>
{{--            @endpermission--}}

            @permission('show_pages')
            <li class="nav-item">
                <a href="{{ url(route('pages.index')) }}" class="nav-link nav-toggle">
                    <i class="icon-settings"></i>
                    <span class="title">{{ __('dashboard.aside.pages') }}</span>
                </a>
            </li>
            @endpermission

            <li class="heading">
                <h3 class="uppercase">{{ __('dashboard.aside.settings_tab') }}</h3>
            </li>

            @permission('show_settings')
            <li class="nav-item">
                <a href="{{ url(route('settings.index')) }}" class="nav-link nav-toggle">
                    <i class="icon-settings"></i>
                    <span class="title">{{ __('dashboard.aside.settings_tab') }}</span>
                </a>
            </li>
            @endpermission

            {{-- @permission('show_translations')
            <li class="nav-item">
                <a href="{{ url(route('languages.translations.index',locale())) }}" class="nav-link nav-toggle">
                    <i class="icon-settings"></i>
                    <span class="title">{{ __('dashboard.aside.translations') }}</span>
                </a>
            </li>
            @endpermission

            @permission('show_logs')
            <li class="nav-item">
                <a href="{{ url('log-viewer') }}" class="nav-link nav-toggle">
                    <i class="icon-settings"></i>
                    <span class="title">{{ __('dashboard.aside.logs') }}</span>
                </a>
            </li>
            @endpermission --}}

        </ul>
    </div>
</div>
