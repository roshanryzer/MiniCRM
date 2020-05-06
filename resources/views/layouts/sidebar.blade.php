<button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
<div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop"
     id="kt_aside">
    <!-- begin:: Aside -->
    <div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
        <div class="kt-aside__brand-logo">
            <a href="{{  route('dashboard.index') }}">
                <img alt="Logo" src="{{ asset('assets/images/logo.png') }}"/>
            </a>
        </div>

    </div>
    <!-- end:: Aside -->
    <!-- begin:: Aside Menu -->
    <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
        <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1"
             data-ktmenu-dropdown-timeout="500">
            <ul class="kt-menu__nav ">
                <li class="kt-menu__item @if(Route::currentRouteName()=='dashboard.index') kt-menu__item--here @endif"
                    aria-haspopup="true">
                    <a href="{{  route('dashboard.index') }}"
                       class="kt-menu__link "><i
                            class="kt-menu__link-icon la la-home"></i><span
                            class="kt-menu__link-text">Dashboard  </span></a>
                </li>

                <li class="kt-menu__item @if(Route::currentRouteName()=='companies.index') kt-menu__item--here @endif"
                    aria-haspopup="true">
                    <a href="{{ route('companies.index') }}"
                       class="kt-menu__link "><i
                            class="kt-menu__link-icon la la-building"></i><span
                            class="kt-menu__link-text">Companies</span></a>
                </li>
                <li class="kt-menu__item @if(Route::currentRouteName()=='employees.index') kt-menu__item--here @endif"
                    aria-haspopup="true">
                    <a href="{{ route('employees.index') }}"
                       class="kt-menu__link "><i
                            class="kt-menu__link-icon la la-users"></i><span
                            class="kt-menu__link-text">Employees</span></a>
                </li>

            </ul>
        </div>
    </div>
    <!-- end:: Aside Menu -->
</div>

