<!DOCTYPE html>
<html lang="zxx" dir="ltr">

@include('front.layouts.head')

<body class="home-page">
    <!-- preloader begin -->
    <div class="in-loader">
        <div></div>
        <div></div>
        <div></div>
    </div>
    <!-- preloader end -->
    @include('front.layouts.header')

    @php
    $menu = App\Models\Menu::where('status', 1)->get();
    $sub_menu = App\Models\SubMenu::where('status', 1)->get();
    @endphp

    <main>
        <div class="uk-section">
            <div class="uk-container">
                <div class="uk-margin-bottom sitemap-wrapper">
                    <div class="uk-child-width-1-3@s uk-child-width-1-6@l uk-child-width-1-4@m uk-flex" data-uk-grid>
                        <div class="sitemap_widget">
                            @if($sub_menu->get(0)->{config('app.locale').'_name'})<h5 class="uk-heading-bullet">{{ $sub_menu->get(0)->{config('app.locale').'_name'} }}</h5>@endif
                            <ul class="uk-list uk-link-text">
                                @foreach($sub_menu->get(0)->menuPage as $page)
                                    <li><a href="{{ route('page', [config('app.locale'), $page->slug)] }}">{{ $page->{config('app.locale').'_name'} }}</a></li>
                                @endforeach
                            </ul>
                            @if($sub_menu->get(1)->{config('app.locale').'_name'})<h5 class="uk-heading-bullet">{{ $sub_menu->get(1)->{config('app.locale').'_name'} }}</h5>@endif
                            <ul class="uk-list uk-link-text">
                                @foreach($sub_menu->get(1)->menuPage as $page)
                                    <li><a href="{{ route('page', [config('app.locale'), $page->slug)] }}">{{ $page->{config('app.locale').'_name'} }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="sitemap_widget">
                            @if($sub_menu->get(2)->{config('app.locale').'_name'})<h5 class="uk-heading-bullet">{{ $sub_menu->get(2)->{config('app.locale').'_name'} }}</h5>@endif
                            <ul class="uk-list uk-link-text">
                                @foreach($sub_menu->get(2)->menuPage as $page)
                                    <li><a href="{{ route('page', [config('app.locale'), $page->slug)] }}">{{ $page->{config('app.locale').'_name'} }}</a></li>
                                @endforeach
                            </ul>
                            @if($sub_menu->get(3)->{config('app.locale').'_name'})<h5 class="uk-heading-bullet">{{ $sub_menu->get(3)->{config('app.locale').'_name'} }}</h5>@endif
                            <ul class="uk-list uk-link-text">
                                @foreach($sub_menu->get(3)->menuPage as $page)
                                    <li><a href="{{ route('page', [config('app.locale'), $page->slug)] }}">{{ $page->{config('app.locale').'_name'} }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="sitemap_widget">
                            @if($menu->get(2)->{config('app.locale').'_name'})<h5 class="uk-heading-bullet">{{ $menu->get(2)->{config('app.locale').'_name'} }}</h5>@endif
                            <ul class="uk-list uk-link-text">
                                @foreach($menu->get(3)->subMenu as $page)
                                    <li><a>{{ $page->{config('app.locale').'_name'} }}</a></li>
                                @endforeach
                            </ul>
                            @if($sub_menu->get(7)->{config('app.locale').'_name'})<h5 class="uk-heading-bullet">{{ $sub_menu->get(7)->{config('app.locale').'_name'} }}</h5>@endif
                            <ul class="uk-list uk-link-text">
                                @foreach($sub_menu->get(7)->menuPage as $page)
                                    <li><a href="{{ route('page', [config('app.locale'), $page->slug)] }}">{{ $page->{config('app.locale').'_name'} }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="sitemap_widget">
                            @if($sub_menu->get(8)->{config('app.locale').'_name'})<h5 class="uk-heading-bullet">{{ $sub_menu->get(8)->{config('app.locale').'_name'} }}</h5>@endif
                            <ul class="uk-list uk-link-text">
                                @foreach($sub_menu->get(8)->menuPage as $page)
                                    <li><a href="{{ route('page', [config('app.locale'), $page->slug)] }}">{{ $page->{config('app.locale').'_name'} }}</a></li>
                                @endforeach
                            </ul>
                            @if($sub_menu->get(9)->{config('app.locale').'_name'})<h5 class="uk-heading-bullet">{{ $sub_menu->get(9)->{config('app.locale').'_name'} }}</h5>@endif
                            <ul class="uk-list uk-link-text">
                                @foreach($sub_menu->get(9)->menuPage as $page)
                                    <li><a href="{{ route('page', [config('app.locale'), $page->slug)] }}">{{ $page->{config('app.locale').'_name'} }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="sitemap_widget">
                            @if($sub_menu->get(10)->{config('app.locale').'_name'})<h5 class="uk-heading-bullet">{{ $sub_menu->get(10)->{config('app.locale').'_name'} }}</h5>@endif
                            <ul class="uk-list uk-link-text">
                                @foreach($sub_menu->get(10)->menuPage as $page)
                                    <li><a href="{{ route('page', [config('app.locale'), $page->slug)] }}">{{ $page->{config('app.locale').'_name'} }}</a></li>
                                @endforeach
                            </ul>
                            @if($sub_menu->get(11)->{config('app.locale').'_name'})<h5 class="uk-heading-bullet">{{ $sub_menu->get(11)->{config('app.locale').'_name'} }}</h5>@endif
                            <ul class="uk-list uk-link-text">
                                @foreach($sub_menu->get(11)->menuPage as $page)
                                    <li><a href="{{ route('page', [config('app.locale'), $page->slug)] }}">{{ $page->{config('app.locale').'_name'} }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="sitemap_widget">
                            @if($sub_menu->get(12)->{config('app.locale').'_name'})<h5 class="uk-heading-bullet">{{ $sub_menu->get(12)->{config('app.locale').'_name'} }}</h5>@endif
                            <ul class="uk-list uk-link-text">
                                @foreach($sub_menu->get(12)->menuPage as $page)
                                    <li><a href="{{ route('page', [config('app.locale'), $page->slug)] }}">{{ $page->{config('app.locale').'_name'} }}</a></li>
                                @endforeach
                            </ul>
                            @if($sub_menu->get(13)->{config('app.locale').'_name'})<h5 class="uk-heading-bullet">{{ $sub_menu->get(13)->{config('app.locale').'_name'} }}</h5>@endif
                            <ul class="uk-list uk-link-text">
                                @foreach($sub_menu->get(13)->menuPage as $page)
                                    <li><a href="{{ route('page', [config('app.locale'), $page->slug)] }}">{{ $page->{config('app.locale').'_name'} }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="{{ asset('front/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('front/js/vendors/uikit.min.js') }}"></script>
    <script src="{{ asset('front/js/vendors/indonez.min.js') }}"></script>
    <script src="{{ asset('front/js/lottie.min.js') }}"></script>
    <!-- <script src="{{ asset('front/js/tv.js') }}script> -->
    <script src="{{ asset('front/js/lightweight-charts.standalone.production.js') }}"></script>
    <script src="{{ asset('front/js/slick.min.js') }}"></script>
    <script src="{{ asset('front/js/social-share.js') }}"></script>
    <script src="{{ asset('front/js/config-theme.js') }}"></script>
    <script src="{{ asset('front/css/owlcarousel/owl.carousel.min.js') }}"></script>
</body>

</html>