@php
$menus = App\Models\Menu::where('status', 1)->get();
$route_param = count(Route::current()->parameters()) ? Route::current()->parameters()['slug'] : null;
@endphp
<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Light Logo-->
        <a href="{{route('admin.home')}}" class="logo logo-light">
            <span class="logo-lg">
                <img src="{{asset('front/img/logo4x.webp')}}" alt="" height="40" loading="lazy">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>


    <div data-simplebar class="h-100">
        <div class="container-fluid">
            <div id="two-column-menu"></div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><i class="ri-more-fill"></i> <span>Menu</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ (Route::current()->getName() == 'admin.menu.list') ? 'active' : '' }}" href="{{ route('admin.menu.list') }}" role="button">
                        <i class="ri-dashboard-2-line"></i> <span>Main Menu</span>
                    </a>
                    <a class="nav-link menu-link {{ (Route::current()->getName() == 'admin.sub_menu.list') ? 'active' : '' }}" href="{{ route('admin.sub_menu.list') }}" role="button">
                        <i class="ri-dashboard-2-line"></i> <span>Sub Menu</span>
                    </a>
                    <a class="nav-link menu-link {{ (Route::current()->getName() == 'admin.menu_page.list') ? 'active' : '' }}" href="{{ route('admin.menu_page.list') }}" role="button">
                        <i class="ri-dashboard-2-line"></i> <span>Sub Pages</span>
                    </a>
                </li>

                <li class="menu-title"><i class="ri-more-fill"></i> <span>Page</span></li>
                @foreach($menus as $menu)
                <li class="nav-item">
                    <a class="nav-link menu-link {{ (in_array($route_param, $menu->menuPage->pluck('slug')->toArray()) || ($menu->en_name == 'Home')) ? 'active' : '' }}" href="{{ $menu->en_name == 'Home' ? route('admin.page', 'home') : '#sidebarPages'.$menu->id }}" data-bs-toggle="{{ count($menu->subMenu) ? 'collapse' : '' }}" role="button" aria-expanded="{{ in_array($route_param, $menu->menuPage->pluck('slug')->toArray()) ? 'true' : 'false' }}" aria-controls="sidebarPages{{$menu->id}}">
                        <i class="ri-account-circle-line"></i> <span>{{ $menu->en_name }}</span>
                    </a>
                    @if(count($menu->subMenu))
                    <div class="collapse menu-dropdown {{ in_array($route_param, $menu->menuPage->pluck('slug')->toArray()) ? 'show' : '' }}" id="sidebarPages{{$menu->id}}">
                        <ul class="nav nav-sm flex-column">
                            @foreach($menu->subMenu as $sub_menu)
                            <li class="nav-item">
                                <a href="#sidebarSignIn{{$sub_menu->id}}" class="nav-link {{ in_array($route_param, $sub_menu->menuPage->pluck('slug')->toArray()) ? 'active' : '' }}" data-bs-toggle="collapse" role="button" aria-expanded="{{ in_array($route_param, $sub_menu->menuPage->pluck('slug')->toArray()) ? 'true' : 'false' }}" aria-controls="sidebarSignIn{{$sub_menu->id}}">{{ $sub_menu->en_name }}
                                </a>
                                <div class="collapse menu-dropdown {{ in_array($route_param, $sub_menu->menuPage->pluck('slug')->toArray()) ? 'show' : '' }}" id="sidebarSignIn{{$sub_menu->id}}">
                                    <ul class="nav nav-sm flex-column">
                                        @if(count($sub_menu->menuPage))
                                        @foreach($sub_menu->menuPage->where('status', 1) as $page)
                                        @if($page->slug == 'mt5-client-desktop')
                                        <li class="nav-item">
                                            <a href="{{ route('admin.faq_page', $page->slug) }}" class="nav-link {{ ($route_param == $page->slug) ? 'active' : '' }}">Common FAQ</a>
                                        </li>
                                        @endif
                                        <li class="nav-item">
                                            <a href="{{ route('admin.page', $page->slug) }}" class="nav-link {{ ($route_param == $page->slug) ? 'active' : '' }}">{{ $page->en_name }}</a>
                                        </li>
                                        @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </li>
                            @endforeach
                            <li class="nav-item">
                                <a href="{{ route('admin.page', ['slug' => 'download-platform']) }}" class="nav-link {{ ($route_param == 'download-platform') ? 'active' : '' }}"><span>Download Platform</span></a>
                            </li>
                        </ul>
                    </div>
                    @endif
                </li>
                @endforeach

                <li class="nav-item">
                    <a href="{{ route('admin.page', ['slug' => 'common']) }}" class="nav-link {{ ($route_param == 'common') ? 'active' : '' }}"><i class="ri-share-line"></i> <span>Common Section</span></a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.news_letter') }}" class="nav-link {{ (\Request::route()->getName() == 'news_letter') ? 'active' : '' }}"><i class="ri-share-line"></i> <span>NewsLetter Users</span></a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.contact_user') }}" class="nav-link {{ (\Request::route()->getName() == 'contact_user') ? 'active' : '' }}"><i class="ri-share-line"></i> <span>Contact Users</span></a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.vps_user') }}" class="nav-link {{ (\Request::route()->getName() == 'vps_user') ? 'active' : '' }}"><i class="ri-share-line"></i> <span>VPS Enquiry Users</span></a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.setting') }}" class="nav-link {{ ($route_param == 'setting') ? 'active' : '' }}"><i class="ri-share-line"></i> <span>Setting</span></a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>