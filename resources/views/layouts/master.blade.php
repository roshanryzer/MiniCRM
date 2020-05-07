<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <title>@yield('title','Mini CRM') </title>
    <meta name="description" content="Page with empty content">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
            },
            active: function () {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <link href="{{ asset('assets/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/confirm/jquery-confirm.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/toast/jquery.toast.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/select2/select2.min.css') }}" rel="stylesheet" type="text/css"/>

    <link href="{{ asset('assets/css/line-awesome/css/line-awesome.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet" type="text/css"/>

    <link href="{{ asset('assets/css/skins/header/base/light.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/skins/header/menu/light.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/skins/brand/dark.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/skins/aside/dark.css') }}" rel="stylesheet" type="text/css"/>

    <link rel="shortcut icon" href="{{ asset('assets/images/favicon1.ico') }}"/>

    @yield('styles')

</head>
<body
    class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">
@includeIf('layouts.header')
<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
    <div class="kt-header-mobile__logo">
        <a href="{{  route('dashboard.index') }}">
            <img alt="Logo" src="{{ asset('assets/images/logo.png') }}"/>
        </a>
    </div>

</div>
<div class="kt-grid kt-grid--hor kt-grid--root">
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
        @includeIf('layouts.sidebar')
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

            <div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">
                <!-- begin:: Header Menu -->
                <button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i
                        class="la la-close"></i></button>
                <div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper" style="opacity: 1;">
                    <div id="kt_header_menu"
                         class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout-default ">

                    </div>
                </div>
                <div class="kt-header__topbar">

                    @guest
                        <div class="kt-header__topbar-item ">
                            <div class="kt-header__topbar-wrapper" data-offset="30px,0px">
                                <a class="kt-nav__link" href="{{ route('login') }}">
                                    <span class="kt-nav__link-text"> {{ __('Login') }}</span>
                                </a>
                            </div>
                        </div>
                        @if (Route::has('register'))
                            <div class="kt-header__topbar-item ">
                                <div class="kt-header__topbar-wrapper" data-offset="30px,0px">
                                    <a class="kt-nav__link" href="{{ route('register') }}">
                                        <span class="kt-nav__link-text"> {{ __('Register') }}</span>
                                    </a>
                                </div>
                            </div>
                        @endif

                    @else
                        <ul class="kt-nav kt-margin-t-10 kt-margin-b-10">

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>


                        </ul>


                    @endguest


                </div>
            </div>

            @yield('content')
            @includeIf('layouts.footer')

        </div>
    </div>
</div>


<div id="kt_scrolltop" class="kt-scrolltop">
    <i class="fa fa-arrow-up"></i>
</div>
<script>
    var KTAppOptions = {
        "colors": {
            "state": {
                "brand": "#5d78ff",
                "dark": "#282a3c",
                "light": "#ffffff",
                "primary": "#5867dd",
                "success": "#34bfa3",
                "info": "#36a3f7",
                "warning": "#ffb822",
                "danger": "#fd3995"
            },
            "base": {
                "label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
                "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
            }
        }
    };
</script>
<script src="{{ asset('assets/js/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/popper.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/jquery-ui/jquery-ui.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
{{--<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>--}}
{{--<script src="{{ asset('assets/datatables/datatables.bootstrap.min.js') }}"></script>--}}
<script src="{{ asset('assets/datatables/datatables.bundle.js') }}"></script>
<script src="{{ asset('assets/confirm/jquery-confirm.min.js') }}"></script>
<script src="{{ asset('assets/toast/jquery.toast.min.js') }}"></script>
<script src="{{ asset('assets/select2/select2.min.js') }}"></script>

@yield('scripts')
</body>
</html>
