@php
$menu = App\Models\Menu::where('status', 1)->get();
$route_param = count(Route::current()->parameters()) && isset(Route::current()->parameters()['slug']) ?
Route::current()->parameters()['slug'] : null;

$section4 = App\Models\Section::where('id', 4)->first();

@endphp


<!-- Header  -->
<header id="header" class="header-main {{ request()->route()->parameters['slug'] === 'mt5-client-desktop' || request()->route()->parameters['slug'] === 'mt5-mac-os-trader' || request()->route()->parameters['slug'] === 'mt5-android-trader' || request()->route()->parameters['slug'] === 'mt5-iphone-trader' || request()->route()->parameters['slug'] === 'ctrader-ios' || request()->route()->parameters['slug'] === 'ctrader-android' || request()->route()->parameters['slug'] === 'ctrader-web' || request()->route()->parameters['slug'] === 'ctrader-desktop' || request()->route()->parameters['slug'] === 'advan-trade' || request()->route()->parameters['slug'] === 'vps-service' || request()->route()->parameters['slug'] === 'third-party-tool' ? 'dark-header' : '' }}">
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="{{ route('page', [config('app.locale'), 'home']) }}">
        <img src="{{ asset('fixifx/images/logo.svg') }}" class="desktop_logo" alt="スプレッドが狭いFX海外口座-FiXi FX（フィクシー）">
        <img src="{{ asset('fixifx/images/w-lg-logo.svg') }}" class="mobile_logo" alt="スプレッドが狭いFX海外口座-FiXi FX（フィクシー）">
      </a>
      <div class="mobile-view">
        <div class="header-btns">
          <ul>
            <li>
              <div class="search-icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M11 19C15.4183 19 19 15.4182 19 11C19 6.58169 15.4183 2.99997 11 2.99997C6.58172 2.99997 3 6.58169 3 11C3 15.4182 6.58172 19 11 19Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M21 21L16.65 16.65" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
              </div>
            </li>
            <li class="nav-item dropdown language-box">
              @if(config('app.locale') == 'en')
              <a href="javascript:void();" @if(config('app.locale')=='en' ) class="nav-link active" @endif><img src="{{ asset('fixifx/images/eng.png') }}" alt="{{ config('app.locale') == 'ja' ? '英語版FiXi FX（フィクシー）' : 'English' }}"> ENG</a>
              @else
              <a href="javascript:void();" @if(config('app.locale')=='ja' ) class="nav-link active" @endif><img src="{{ asset('fixifx/images/ja.png') }}" alt="{{ config('app.locale') == 'ja' ? '日本語版FiXi FX（フィクシー）' : 'Japanese' }}"> JA</a>
              @endif
              <ul>
                <li><a href="{{ route('language.change', ['locale' => 'en']) }}" @if(config('app.locale')=='en' ) class="active" @endif><img src="{{ asset('fixifx/images/eng.png') }}" alt="{{ config('app.locale') == 'ja' ? '英語版FiXi FX（フィクシー）' : 'English' }}">ENG</a></li>
                <li><a href="{{ route('language.change', ['locale' => 'ja']) }}" @if(config('app.locale')=='ja' ) class="active" @endif><img src="{{ asset('fixifx/images/ja.png') }}" alt="{{ config('app.locale') == 'ja' ? '日本語版FiXi FX（フィクシー）' : 'Japanese' }}">JA</a></li>
              </ul>
            </li>
          </ul>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon" onclick="myFunction(this)">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
          </span>
        </button>
      </div>
      <div class="collapse navbar-collapse justify-content-between" id="navbarNavDropdown">
        <ul class="navbar-nav">
          @foreach($menu as $m)
          @if(count($m->subMenu))
          <li class="nav-item dropdown {{($m->en_name == 'Forex Trading') ? 'megalarge_link' : ''}} {{ (in_array($route_param, $m->menuPage->pluck('slug')->toArray())) ? 'active' : '' }}">
            <a href="javascript:void();" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              {{ $m->{config('app.locale').'_name'} }}</a>
            <div class="mega-menu dropdown-menu">
              <a href="javascript:void();" class="back_btn">
                <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M0.215872 5.49505L4.74173 9.79476C5.02962 10.0684 5.4964 10.0684 5.78416 9.79476C6.07195 9.52135 6.07195 9.0779 5.78416 8.80451L1.77948 4.99993L5.78405 1.19548C6.07183 0.921955 6.07183 0.478552 5.78405 0.205141C5.49626 -0.0683804 5.02951 -0.0683804 4.74161 0.205141L0.215755 4.50492C0.0718641 4.64169 0 4.82075 0 4.99991C0 5.17915 0.0720043 5.35835 0.215872 5.49505Z" fill="#FFFFFF"></path>
                </svg>
                {{__('message.back') }}
              </a>
              <div class="container">
                <div class="row">
                  <div class="col-lg-9 col-xl-9">
                    <div class="row">

                      @foreach($m->subMenu->where('status', 1) as $submenu)

                      @if($submenu->id == 1 || $submenu->id == 2)

                      @if($submenu->{config('app.locale').'_name'})
                      <dl class="col-xl-6 col-lg-8 dropdown-pf-wrap mega-menu-column">
                        <a href="javascript:void();" class="linkhead-box">
                          <h4>{{ $submenu->{config('app.locale').'_name'} }}</h4>
                        </a>
                        <dt class="m-0 mb-3 header-pf-name">
                          <h3><a href="{{ route('page', [config('app.locale'), 'platform-overview']) }}">{{__('message.overview') }}</a></h3>
                        </dt>
                        <dd class="menu-dropdown-col row g-1">
                          @endif
                          <dl class="col-lg-4 pf-no-margin">
                            @if(count($submenu->menuPage))
                            @if($submenu->id == 1)
                            <dt class="m-0 mb-3 header-pf-name">
                              <h3>{{ $section4->subSection[1]->{config('app.locale').'_title'} ?? __('message.c_trader') }}</h3>
                            </dt>
                            @elseif($submenu->id == 2)
                            <dt class="m-0 mb-3 header-pf-name">
                              <h3>{{ $section4->subSection[0]->{config('app.locale').'_title'} ?? __('message.meta_trader') }}</h3>
                            </dt>
                            @endif
                            <dd>
                              <div class="mega-menu-outer">
                                @foreach($submenu->menuPage->where('status', 1) as $page)
                                <div class="{{ ($route_param == $page->slug) ? 'active' : '' }} mega-menu-box">
                                  <a href="{{ route('page', [config('app.locale'), $page->slug]) }}">{{$page->{config('app.locale').'_name'} }}</a>
                                </div>
                                @endforeach
                              </div>
                            </dd>
                            @endif
                          </dl>

                          @if($submenu->id == 2)
                          <dl class="col-lg-4 pf-no-margin">
                            <dt class="m-0 mb-3 header-pf-name">
                              <h3>{{ $section4->subSection[2]->{config('app.locale').'_title'} ?? __('message.advan_trade') }}</h3>
                              <a href="{{ route('page', [config('app.locale'), 'advan-trade']) }}">
                                <h5 class="overviewtext">{{__('message.overview') }}</h5>
                              </a>
                            </dt>
                            <dd>
                              <div class="mega-menu-outer">
                                <div class="mega-menu-box">
                                  <a href="javascript:void();"></a>
                                </div>
                              </div>
                            </dd>
                          </dl>
                          @endif

                          @if(!$submenu->{config('app.locale').'_name'})
                        </dd>
                      </dl>
                      @endif
                      @else
                      <div class="col-xl-3 col-lg-4">
                        <dl class="menu-dropdown-col mega-menu-column">
                          <h4>{{ $submenu->{config('app.locale').'_name'} }}
                          </h4>
                          @if(count($submenu->menuPage))
                          <dd>
                            <div class="mega-menu-outer">
                              @foreach($submenu->menuPage->where('status', 1) as $page)
                              <div class="{{ ($route_param == $page->slug) ? 'active' : '' }} mega-menu-box"><a class="{{ ($route_param == $page->slug) ? 'active' : '' }}" href="{{ route('page', [config('app.locale'), $page->slug]) }}">{{
                                  $page->{config('app.locale').'_name'} }}</a></div>
                              @endforeach
                            </div>
                          </dd>
                          @endif
                        </dl>
                      </div>
                      @endif
                      @endforeach
                    </div>
                  </div>

                  <div class="col-lg-3 col-xl-3">
                    <div class="header-blog-box">
                      <div class="blogs-img">
                        <img src="{{ asset('fixifx/images/header-blog.png') }}" alt="header-blog">
                      </div>
                      <div class="blogs-disc">
                        <h6>{{ $m->{config('app.locale').'_name'} }}</h6>
                        <div class="discription">
                          <p>{{ $m->{config('app.locale').'_desc'} }}</p>
                        </div>
                        <div class="button-group">
                          <a href="{{ getSettingValue('member_login') }}" target="_blank" class="custom-btn fill-btn-1">{{__('message.member_login', [], config('app.locale'))}}</a>
                          <a href="{{ getSettingValue('partner_login') }}" target="_blank " class="custom-btn fill-btn">{{__('message.partner_login', [], config('app.locale'))}}</a>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </li>
          @else

          <li class="nav-item {{($m->en_name == 'Home') ? 'home_menu' : ''}}">
            <a href="{{($m->en_name == 'Home') ? route('page', [config('app.locale'), 'home']) : '' }}" class="nav-link {{($m->en_name == 'Home' && $route_param == 'home') ? 'active' : '' }}">
              {{ $m->{config('app.locale').'_name'} }}</a>
          </li>


          @endif
          @endforeach

          <li class="nav-item {{ ($route_param == 'prex-blogs') ? 'active' : '' }}">
            <a href="{{ route('page', [config('app.locale'),'prex-blogs']) }}" class="nav-link {{($route_param == 'prex-blogs') ? 'active' : '' }}">{{__('message.fixi_blog', [], config('app.locale'))}}</a>
          </li>
        </ul>
        <div class="header-btns">
          <ul>
            <li>
              <div class="search-icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M11 19C15.4183 19 19 15.4182 19 11C19 6.58169 15.4183 2.99997 11 2.99997C6.58172 2.99997 3 6.58169 3 11C3 15.4182 6.58172 19 11 19Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M21 21L16.65 16.65" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
              </div>
            </li>
            <li class="nav-item dropdown language-box">

              @if(config('app.locale') == 'en')
              <a href="javascript:void();" class="nav-link"><img src="{{ asset('fixifx/images/eng.png') }}" alt="{{ config('app.locale') == 'ja' ? '英語版FiXi FX（フィクシー）' : 'English' }}"> ENG</a>
              @else
              <a href="javascript:void();" class="nav-link"><img src="{{ asset('fixifx/images/ja.png') }}" alt="{{ config('app.locale') == 'ja' ? '日本語版FiXi FX（フィクシー）' : 'Japanese' }}"> JA</a>
              @endif
              <ul>
                <li><a href="{{ route('language.change', ['locale' => 'en']) }}" @if(config('app.locale')=='en' ) class="active" @endif><img src="{{ asset('fixifx/images/eng.png') }}" alt="{{ config('app.locale') == 'ja' ? '英語版FiXi FX（フィクシー）' : 'English' }}">ENG</a></li>
                <li><a href="{{ route('language.change', ['locale' => 'ja']) }}" @if(config('app.locale')=='ja' ) class="active" @endif><img src="{{ asset('fixifx/images/ja.png') }}" alt="{{ config('app.locale') == 'ja' ? '日本語版FiXi FX（フィクシー）' : 'Japanese' }}">JA</a></li>
              </ul>
            </li>
            <li>
              <a href="{{ getSettingValue('member_login') }}" target="_blank" class="custom-btn fill-btn-1">{{__('message.member_login', [], config('app.locale'))}}</a>
            </li>
            <li>
              <a href="{{ getSettingValue('partner_login') }}" target="_blank" class="custom-btn fill-btn">{{__('message.partner_login', [], config('app.locale'))}}</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="search-form">
      <div class="container">
        <form class="py-4" action="javascript:void();">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Search here...">
          </div>
        </form>
      </div>
    </div>
  </nav>
</header>
<!-- End header  -->