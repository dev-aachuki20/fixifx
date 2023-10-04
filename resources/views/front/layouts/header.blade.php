@php
$menu = App\Models\Menu::where('status', 1)->get();
$route_param = count(Route::current()->parameters()) && isset(Route::current()->parameters()['slug']) ? Route::current()->parameters()['slug'] : null;
@endphp
<header>
    <!-- header content begin -->
    <div class="uk-section uk-padding-remove-vertical">
        <!-- module navigation begin -->
        <nav class="uk-navbar-container uk-navbar-transparent uk-background-black header-sticky" uk-sticky="start: 170; animation: uk-animation-slide-top; sel-target: .uk-navbar-transparent; cls-active: uk-navbar-transparent; cls-inactive: uk-navbar-transparent;">
            <div class="uk-container custom-navbar-container">
                <div class="topbar-header header-navbar py-3 d-none d-lg-flex" data-uk-navbar>
                    <div class="uk-navbar-left uk-width-expand uk-flex uk-flex-left uk-margin-remove-left menu-part">
                        <div class="custom-navbar">
                            <ul class="uk-navbar-nav">
                                <li class="{{ ($route_param == 'prex-blogs') ? 'active' : '' }}">
                                    <a href="{{ route('page', [config('app.locale'),'prex-blogs']) }}">{{__('message.fixi_blog', [], config('app.locale'))}}</a>
                                </li>
                                <li class="{{ ($route_param == 'company-news') ? 'active' : '' }}">
                                    <a href="{{ route('page', [config('app.locale'), 'company-news']) }}">{{__('message.fixi_news', [], config('app.locale'))}}</a>
                                </li>
                                <li class="{{ ($route_param == 'contact-us') ? 'active' : '' }}">
                                    <a href="{{ getSettingValue('help') }}">{{__('message.help_centre', [], config('app.locale'))}}</a>
                                </li>
                            </ul>
                        </div>
                    </div>    
                    <div class="uk-navbar-right uk-width-expand uk-flex  uk-flex-right uk-margin-remove-right menu-part">
                        <div class="custom-navbar">
                            <ul class="uk-navbar-nav align-items-center">
                                <li>
                                    <a href="{{ getSettingValue('deposite') }}" class="">{{__('message.deposit', [], config('app.locale'))}}</a>
                                </li>
                              
                                <li class="ml-2">
                                <a href="{{ route('page', [config('app.locale'),'contact-us']) }}" class="">{{__('message.contact_us', [], config('app.locale'))}}</a>
                                </li>
                                <li class="ml-3">
                                    <a href="{{ getSettingValue('member_login') }}"  rel="noreferrer noopener" target="_blank" class="uk-button uk-button-default uk-border-rounded partner_login_btn">{{__('message.member_login', [], config('app.locale'))}}</a>
                                </li>
                                <li class="ml-3">
                                    <a href="{{ getSettingValue('partner_login') }}"  rel="noreferrer noopener" target="_blank" class="uk-button uk-button-default uk-border-rounded partner_login_btn">{{__('message.partner_login', [], config('app.locale'))}}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="lang-dropdown uk-inline">
                        <ul class="uk-navbar-nav">
                            <li><a href="javascript:;" class="uk-padding-remove-right">
                                @if(config('app.locale') == 'en')
                                <em class="lang-flag">
                                    <img src="{{asset('front/img/flag/usd.svg')}}" class="uk-img" alt="{{ config('app.locale') == 'ja' ? '英語版FiXi FX（フィクシー）' : 'English' }}" loading="lazy"/>
                                </em>
                                <span>Eng</span>
                                @else 
                                <em class="lang-flag">
                                    <img src="{{asset('front/img/flag/jpy.svg')}}" class="uk-img" alt="{{ config('app.locale') == 'ja' ? '日本語版FiXi FX（フィクシー）' : 'Japanese' }}" loading="lazy"/>
                                </em>
                                <span>Jp</span>
                                @endif
                            </a>
                                <div class="uk-navbar-dropdown">
                                    <ul class="uk-nav uk-navbar-dropdown-nav">
                                        <li><a href="{{ route('language.change', ['locale' => 'en']) }}"><i class="lang-flag"><img src="{{asset('front/img/flag/usd.svg')}}" loading="lazy" class="uk-img" alt="{{ config('app.locale') == 'ja' ? '英語版FiXi FX（フィクシー）' : 'English' }}" /></i>English</a></li>
                                        <li><a href="{{ route('language.change', ['locale' => 'ja']) }}"><i class="lang-flag"><img src="{{asset('front/img/flag/jpy.svg')}}" loading="lazy" class="uk-img" alt="{{ config('app.locale') == 'ja' ? '日本語版FiXi FX（フィクシー））' : 'Japanese' }}" /></i>Japanese</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="header-navbar" style="border-bottom: none;" data-uk-navbar>
                    <div class="uk-width-auto">
                        @if(isset($home_title_ja))
                        <h1 class="uk-navbar-item uk-padding-remove-horizontal">
                            <!-- module logo begin -->
                            <a class="uk-logo" href="{{ route('page', [config('app.locale'), 'home']) }}">
                                <img src="{{asset('front/img/in-lazy.svg')}}" loading="lazy" data-src="{{asset('front/img/fixi-fx-logo.webp')}}" alt="スプレッドが狭いFX海外口座-FiXi FX（フィクシー）" width="130" height="57" data-uk-img>
                            </a>
                            <!-- module logo begin -->
                        </h1>
                        @else
                        <div class="uk-navbar-item uk-padding-remove-horizontal">
                            <!-- module logo begin -->
                            <a class="uk-logo" href="{{ route('page', [config('app.locale'), 'home']) }}">
                            @if(config('app.locale') == 'ja')
                                <img src="{{asset('front/img/in-lazy.svg')}}" loading="lazy" data-src="{{asset('front/img/fixi-fx-logo.webp')}}" alt="スプレッドが狭いFX海外口座-FiXi FX（フィクシー）" width="130" height="57" data-uk-img>
                            @else
                                <img src="{{asset('front/img/in-lazy.svg')}}" loading="lazy" data-src="{{asset('front/img/fixi-fx-logo.webp')}}" alt="FixiFX" width="130" height="57" data-uk-img>
                            @endif
                            </a>
                            <!-- module logo begin -->
                        </div>
                        @endif
                    </div>
                    <div class="uk-navbar-right uk-width-expand uk-flex uk-flex-right uk-margin-remove-right menu-part">
                        <div class="custom-navbar">
                            <ul class="uk-navbar-nav desktop_menu">
                                @foreach($menu as $m)
                                <li class="{{ (in_array($route_param, $m->menuPage->pluck('slug')->toArray())) ? 'active' : '' }}">
                                    <a href="{{($m->en_name == 'Home') ? route('page', [config('app.locale'), 'home']) : '' }}">{{ $m->{config('app.locale').'_name'} }} @if(count($m->subMenu))<i class="fas fa-chevron-down"></i>@endif</a>
                                @if(count($m->subMenu))
                                    <div class="uk-navbar-dropdown">
                                        <div class="uk-container">
                                            <div class="row">
                                                <div class="col-lg-4 col-xl-4">
                                                    <div class="menu-dropdown-col">
                                                        <dl class="menu-dropdown-info pr-lg-4">
                                                            <dt>{{ $m->{config('app.locale').'_name'} }}</dt>
                                                            <dd>{{ $m->{config('app.locale').'_desc'} }}</dd>
                                                            <dd class="menu-dropdown">
                                                                <a href="{{ getSettingValue('live_link') }}" rel="noreferrer noopener" target="_blank" class="uk-button uk-border-rounded">{{ getSettingValue('live_link_btn_'.config('app.locale')) }}</a>
                                                                <a href="{{ getSettingValue('demo_link') }}" rel="noreferrer noopener" target="_blank" class="uk-button menu-demo-account uk-border-rounded uk-margin-small-left uk-visible@m">{{ getSettingValue('demo_link_btn_'.config('app.locale')) }}</a>
                                                            </dd>
                                                        </dl>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-xl-8">
                                                    <div class="row">
                                                        @foreach($m->subMenu->where('status', 1) as $submenu)
                                                        @if($submenu->id == 1 || $submenu->id == 2)
                                                    
                                                        @if($submenu->{config('app.locale').'_name'})
                                                        <dl class="col-xl-6 col-lg-8 dropdown-pf-wrap">
                                                            <!-- platform h6 here -->
                                                            <dt class="dropdown-pf-title"><i class="fas {{$submenu->icon}} mr-1"></i>{{ $submenu->{config('app.locale').'_name'} }}</dt>
                                                            <dd class="menu-dropdown-col row g-1">
                                                        @endif
                                                                <dl class="col-lg-6 pf-no-margin">
                                                                <!--<h6><i class="fas {{$submenu->icon}} mr-1"></i>{{ $submenu->{config('app.locale').'_name'} }}</h6>-->
                                                                @if(count($submenu->menuPage))
                                                                    @if($submenu->id == 1)
                                                                    <!--ex.h6-->
                                                                    <dt class="m-0 mt-3 mb-2 header-pf-name" >
                                                                        <img src="{{asset('front/img/Meta-Trader.svg')}}" loading="lazy" style="height: 30px;" class="img-fluid" alt="{{ isset($home_title_ja) ? 'Meta Trader 5 (MT5) - スプレッドが狭いFX海外口座FiXi FX（フィクシー）' : (config('app.locale') == 'ja' ? 'Meta Trader 5 (MT5) - FiXi FX（フィクシー）' : 'Meta Trader 5 (MT5) - FiXi FX') }}">
                                                                    </dt>
                                                                    @elseif($submenu->id == 2)
                                                                    <dt class="m-0 mt-3 mb-2 header-pf-name" >
                                                                        <img src="{{asset('front/img/ctrader_logo_bird.svg')}}" style="height: 30px;" class="img-fluid" alt="{{ isset($home_title_ja) ? 'cTrader - スプレッドが狭いFX海外口座FiXi FX（フィクシー）' : (config('app.locale') == 'ja' ? 'cTrader - FiXi FX（フィクシー）' : 'cTrader - FiXi FX') }}" loading="lazy">
                                                                    </dt>
                                                                    @endif
                                                                    <dd>
                                                                        <ul class="uk-nav uk-navbar-dropdown-nav">
                                                                            @foreach($submenu->menuPage->where('status', 1) as $page)
                                                                            <li class="{{ ($route_param == $page->slug) ? 'active' : '' }}"><a href="{{ route('page', [config('app.locale'), $page->slug]) }}">{{ $page->{config('app.locale').'_name'} }}</a></li>
                                                                            @endforeach
                                                                        </ul>
                                                                    </dd>
                                                                @endif
                                                                </dl>
                                                        @if(!$submenu->{config('app.locale').'_name'})
                                                            </dd>
                                                        </dl>
                                                        @endif
                                                        @else
                                                        <div class="col-xl-3 col-lg-4">
                                                            <dl class="menu-dropdown-col">
                                                                <dt><i class="fas {{$submenu->icon}} mr-1"></i>{{ $submenu->{config('app.locale').'_name'} }}</dt>
                                                                @if(count($submenu->menuPage))
                                                                <dd>
                                                                    <ul class="uk-nav uk-navbar-dropdown-nav">
                                                                        @foreach($submenu->menuPage->where('status', 1) as $page)
                                                                        <li class="{{ ($route_param == $page->slug) ? 'active' : '' }}"><a href="{{ route('page', [config('app.locale'), $page->slug]) }}">{{ $page->{config('app.locale').'_name'} }}</a></li>
                                                                        @endforeach
                                                                    </ul>
                                                                </dd>
                                                                @endif
                                                            </dl>
                                                        </div>
                                                        @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    @endif
                                </li>
                                @endforeach
                            </ul>
                            <div class="mobile_menu">
                                <ul class="uk-accordion uk-navbar-nav">
                                    @foreach($menu as $m)
                                    <li class="{{ in_array($route_param, $m->menuPage->pluck('slug')->toArray()) ? 'uk-open' : '' }}">
                                        <a class="uk-accordion-title mobile_uk_accordian" href="{{ ($m->en_name == 'Home') ? route('page', [config('app.locale'), 'home']) : '#' }}"><span class="menu_item_icon"><img src="{{ asset('front/img/icons/'.$m->icon) }}" class="img-fluid" alt="{{ config('app.locale') == 'ja' ? 'スプレッドが狭いFX海外口座 - FiXi FX（フィクシー）' : 'FiXi FX' }}" loading="lazy"></span> {{ $m->{config('app.locale').'_name'} }} @if(count($m->subMenu))<i class="fas fa-chevron-down"></i>@endif</a>
                                        @if(count($m->subMenu))
                                        <div class="uk-accordion-content">
                                            <div class="uk-container">
                                                <div class="row">
                                                    <div class="col-lg-8 col-xl-8">
                                                        <div class="row">
                                                            @foreach($m->subMenu as $submenu)
                                                            @if($submenu->id == 1 || $submenu->id == 2)

                                                            @if($submenu->{config('app.locale').'_name'})
                                                            <div class="col-xl-6 col-lg-8">
                                                                <dl class="menu-dropdown-col row g-1 pf-no-margin">
                                                                    <dt>{{ $submenu->{config('app.locale').'_name'} }}</dt>
                                                                    @endif
                                                                    <dd>
                                                                        <dl class="col-lg-6 pf-no-margin">
                                                                            <!--<h6>{{ $submenu->{config('app.locale').'_name'} }}</h6>-->
                                                                            @if(count($submenu->menuPage))
                                                                            @if($submenu->id == 1)
                                                                            @php $mt5_or_ctr = 'mt5'; @endphp
                                                                            <dt class="m-0 mt-3 mb-2">
                                                                                <img src="{{asset('front/img/Meta-Trader.svg')}}" loading="lazy" style="height: 30px;" class="img-fluid" alt="{{ isset($home_title_ja) ? 'Meta Trader 5 (MT5) - スプレッドが狭いFX海外口座FiXi FX（フィクシー）' : (config('app.locale') == 'ja' ? 'Meta Trader 5 (MT5) - FiXi FX（フィクシー）' : 'Meta Trader 5 (MT5) - FiXi FX') }}">
                                                                            </dt>
                                                                            @elseif($submenu->id == 2)
                                                                            @php $mt5_or_ctr = 'ctr'; @endphp
                                                                            <dt class="m-0 mt-3 mb-2">
                                                                                <img src="{{asset('front/img/ctrader_logo_bird.svg')}}" style="height: 30px;" class="img-fluid" alt="{{ isset($home_title_ja) ? 'cTrader - スプレッドが狭いFX海外口座FiXi FX（フィクシー）' : (config('app.locale') == 'ja' ? 'cTrader - FiXi FX（フィクシー）' : 'cTrader - FiXi FX') }}">
                                                                            </dt>
                                                                            @endif
                                                                            <dd>
                                                                                <ul class="uk-nav uk-navbar-dropdown-nav">
                                                                                    @foreach($submenu->menuPage as $page)
                                                                                    <li class="{{ ($route_param == $page->slug) ? 'active' : '' }}"><a href="{{ route('page', [config('app.locale'), $page->slug]) }}"><span class="menu_item_icon"><img src="{{ $page->icon }}" class="img-fluid" alt="{{ $mt5_or_ctr == 'mt5' ? 'MT5 OS-icon' : 'cTrader OS-icon' }}" loading="lazy"></span> {{ $page->{config('app.locale').'_name'} }}</a></li>
                                                                                    @endforeach
                                                                                </ul>
                                                                            </dd>
                                                                            @endif
                                                                        </dl>
                                                                    </dd>
                                                                    @if(!$submenu->{config('app.locale').'_name'})
                                                                </dl>
                                                            </div>
                                                            @endif
                                                            @else
                                                            <div class="col-xl-3 col-lg-4">
                                                                <dl class="menu-dropdown-col">
                                                                    <dt>{{ $submenu->{config('app.locale').'_name'} }}</dt>
                                                                    @if(count($submenu->menuPage))
                                                                    <dd>
                                                                        <ul class="uk-nav uk-navbar-dropdown-nav">
                                                                            @foreach($submenu->menuPage as $page)
                                                                            <li class="{{ ($route_param == $page->slug) ? 'active' : '' }}"><a href="{{ route('page', [config('app.locale'), $page->slug]) }}"><span class="menu_item_icon"><img src="{{ $page->icon }}" class="img-fluid" alt="" loading="lazy"></span> {{ $page->{config('app.locale').'_name'} }}</a></li>
                                                                            @endforeach
                                                                        </ul>
                                                                    </dd>
                                                                    @endif
                                                                </dl>
                                                            </div>
                                                            @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        @endif
                                    </li>
                                    @endforeach
                                </ul>
                                <ul class="uk-navbar-nav">
                                    <li class="{{ ($route_param == 'prex-blogs') ? 'active' : '' }}">
                                        <a href="{{ route('page', [config('app.locale'), 'prex-blogs']) }}"><span class="menu_item_icon"><img src="{{asset('front/img/icons/MainMenu/icn_prex_Blog.svg')}}" loading="lazy" class="img-fluid" alt=""></span>{{__('message.fixi_blog', [], config('app.locale'))}}</a>
                                    </li>
                                    <li class="{{ ($route_param == 'company-news') ? 'active' : '' }}">
                                        <a href="{{ route('page', [config('app.locale'), 'company-news']) }}"><span class="menu_item_icon"><img src="{{asset('front/img/icons/MainMenu/icn_Event_News.svg')}}" loading="lazy" class="img-fluid" alt=""></span> {{__('message.fixi_news', [], config('app.locale'))}}</a>
                                    </li>
                                    <li class="{{ ($route_param == 'contact-us') ? 'active' : '' }}">
                                        <a href="{{ route('page', [config('app.locale'), 'contact-us']) }}"><span class="menu_item_icon"><img src="{{asset('front/img/icons/MainMenu/icn_contact.svg')}}" loading="lazy" class="img-fluid" alt=""></span> {{__('message.contact_us', [], config('app.locale'))}}</a>
                                    </li>
                                    <li>
                                        <a href="{{ getSettingValue('help') }}"><span class="menu_item_icon"><img src="{{asset('front/img/icons/MainMenu/icn_help_Cnter.svg')}}" loading="lazy" class="img-fluid" alt=""></span> {{__('message.help_centre', [], config('app.locale'))}}</a>
                                    </li>
                                    <li>
                                        <a href="{{ getSettingValue('deposite') }}"><span class="menu_item_icon"><img src="{{asset('front/img/icons/MainMenu/icn_Withdrawals.svg')}}" loading="lazy" class="img-fluid" alt=""></span> {{__('message.deposit', [], config('app.locale'))}}</a>
                                    </li>
                                </ul>
                                <div class="p-3">
                                    <a href="{{ getSettingValue('member_login') }}" rel="noreferrer noopener" target="_blank" class="uk-button uk-button-primary uk-border-rounded uk-width-100" style="display: flex;align-items: center;justify-content: center;gap: 8px;"><img width="24px" src="{{asset('front/img/icons/Trading-Accounts/icn_account_type.svg')}}" class="img-fluid" alt="" loading="lazy"> {{__('message.member_login', [], config('app.locale'))}}</a>
                                    <a href="{{ getSettingValue('partner_login') }}" rel="noreferrer noopener" target="_blank" class="uk-button uk-button-primary uk-border-rounded uk-width-100 mt-3" style="display: flex;align-items: center;justify-content: center;gap: 8px;"><img width="24px" src="{{asset('front/img/icons/MainMenu/icn__partnership.svg')}}" class="img-fluid" alt="" loading="lazy">{{__('message.partner_login', [], config('app.locale'))}}</a>
                                </div>
                            </div>
                            <a href="javascript:void(0);" class="close-menu" aria-label="{{ config('app.locale') == 'ja' ? 'ヘッダーメニューを閉じる' : 'close header menu' }}">
                                <i class="fas fa-bars"></i>
                            </a>
                            <a href="javascript:void(0);" style="right: 16px; left:unset" class="close-menu" aria-label="{{ config('app.locale') == 'ja' ? 'ヘッダーメニューを閉じる' : 'close header menu' }}">
                                <i class="fas fa-times"></i>
                            </a>
                        </div>
                        <a class="uk-button menu-toggle d-lg-none" id="menu-toggle" href="javascript:void(0);" aria-label="{{ config('app.locale') == 'ja' ? 'ヘッダーメニュー' : 'header menu' }}"><i class="fas fa-bars"></i></a>
                    </div>
                    <div class="lang-dropdown uk-inline d-block d-lg-none">
                        <ul class="uk-navbar-nav">
                            <li><a href="javascript:;" class="uk-padding-remove-right">
                                    @if(config('app.locale') == 'en')
                                    <em class="lang-flag">
                                        <img src="{{asset('front/img/flag/usd.svg')}}" class="uk-img" alt="English" loading="lazy" />
                                    </em>
                                    <span>Eng</span>
                                    @else
                                    <em class="lang-flag">
                                        <img src="{{asset('front/img/flag/jpy.svg')}}" loading="lazy" class="uk-img" alt="日本語" />
                                    </em>
                                    <span>Jp</span>
                                    @endif
                                </a>
                                <div class="uk-navbar-dropdown">
                                    <ul class="uk-nav uk-navbar-dropdown-nav">
                                        <li><a href="{{ route('language.change', ['locale' => 'en']) }}"><i class="lang-flag"><img src="{{asset('front/img/flag/usd.svg')}}" loading="lazy" class="uk-img" alt="{{ config('app.locale') == 'ja' ? '英語版FiXi FX（フィクシー）' : 'English' }}" /></i>English</a></li>
                                        <li><a href="{{ route('language.change', ['locale' => 'ja']) }}"><i class="lang-flag"><img src="{{asset('front/img/flag/jpy.svg')}}" loading="lazy" class="uk-img" alt="{{ config('app.locale') == 'ja' ? '日本語版FiXi FX（フィクシー）' : 'Japanese' }}" /></i>Japanese</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="menu-overlay"></div>
                </div>
            </div>
        </nav>
        <!-- module navigation end -->
    </div>
    <!-- header content end -->
</header>

@push('scripts')
<script>
    $(document).ready(function() {

        $(document).on('click', '.mobile_uk_accordian', function() {
            if ($(this).attr('href') != "#") {
                window.location.href = "{{route('page', [config('app.locale'),'home'])}}";
            }
        })
    })
</script>
<script>
    jQuery(function($) {
        var $question = $('.mobile_menu .uk-accordion-title');
        var $answer = $('.mobile_menu .uk-accordion-content');
        $question.click(function() {
            // Hide all answers
            $answer.slideUp(1000);
            // Check if this answer is already open
            if ($(this).hasClass('open')) {
                // If already open, remove 'open' class and hide answer
                $(this).removeClass('open').next($answer).slideUp(1000);
                // If it is not open...
            } else {
                // Remove 'open' class from all other questions
                $question.removeClass('open');
                // Open this answer and add 'open' class
                $(this).addClass('open').next($answer).slideDown(1000);
            }
        });
    });
</script>
@endpush