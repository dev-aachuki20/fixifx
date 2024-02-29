<html lang="{{ config('app.locale') }}" dir="ltr">

<head>
    <!-- Standard Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Site Properties -->
    @if(isset($home_title_ja))
    <title>{{$home_title_ja}}</title>
    <meta property="og:title" content="{{$home_title_ja}}">
    @elseif(isset($detail_title))
    <title>{{ $detail_title }}</title>
    <meta property="og:title" content="{{ $detail_title }}">
    @elseif(isset($page_origin_title))
    <title>{{ $page_origin_title . $sitename_locale }}</title>
    <meta property="og:title" content="{{ $page_origin_title . $sitename_locale }}">
    @else
    <title>{{isset($page) ? $page->{config('app.locale').'_name'} . $sitename_locale : config('app.name') }}</title>
    <meta property="og:title" content="{{isset($page) ? $page->{config('app.locale').'_name'} . $sitename_locale : config('app.name') }}">
    @endif

    @if(isset($description_jp) && config('app.locale') == 'ja')
    <meta name="keywords" content="{{ $keywords_jp }}">
    <meta name="description" content="{{ $description_jp }}">
    <meta property="og:description" content="{{ $description_jp }}">
    @else
    <meta name="keywords" content="Prex Markets , Forex Trading , Partner with prex markets , Online trading tool , Automated forex trading , One stop forex solution , Trusted forex broker , Forex demo account , Forex live account , Commodity trading">
    <meta name="description" content="Prex Markets Limited is a forex and CFD broker that provides trading solutions sophisticated enough for both retail and institutional investors, yet simple enough for the forex novice">
    <meta property="og:description" content="Prex Markets Limited is a forex and CFD broker that provides trading solutions sophisticated enough for both retail and institutional investors, yet simple enough for the forex novice">
    @endif

    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] }}">
    <meta property="og:site_name" content="{{ config('app.locale') == 'ja' ? 'FiXi FX（フィクシー）' : 'FiXi FX' }}">

    <!--<meta property="og:image" content="https://fixifx.com/front/img/fixi_fx-artboards.webp">-->

    @if(isset($detail_ogp_image))
    <meta property="og:image" content="{{ $detail_ogp_image }}">
    @else
    <meta property="og:image" content="https://fixifx.com/front/img/_Artboards_.png">
    @endif
    <meta property="og:image:width" content="1280">
    <meta property="og:image:height" content="720">
    <meta name="twitter:card" content="summary_large_image">

    <!-- Canonical link -->
    <link rel="canonical" href="{{ 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] }}">

    @include('front.layouts.partials.css')
    @yield('css')

    <!-- loginstyle  -->
    <link rel="stylesheet" href="{{ asset('fixifx/css/loginstyle2.css') }}">

</head>

<body>

    <section class="login-wrapper">
        <div class="loginLeft-wrap">
            <div class="innerLeft">
                <div class="backLeft">
                    <a href="{{ route('page', [config('app.locale'), 'home']) }}" class="backLeft-link">
                        <svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13 6H1" stroke="#1E1F1F" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M5.79198 11L1 6L5.79198 1" stroke="#1E1F1F" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div>
                            {{__('message.back')}}
                        </div>
                    </a>
                </div>
                <div class="loginTrader">
                    <div class="inner-loginTrader mb-20">
                        <div class="logoDark bottom-b">
                            <img class="img-fluid" src="{{asset('fixifx/images/login_img/blacklogo-fixi.png')}}" alt="">
                        </div>
                        <div class="tradeBox">
                            <div class="title">
                                <h4>
                                    {{__('message.ctrader')}}
                                </h4>
                                <p>
                                    {{__('message.logi_para1')}}
                                </p>
                            </div>
                            <div class="button-group d-flex align-items-center justify-content-center">
                                <a href="{{ getSettingValue('login_ctrader_'.config('app.locale'))}}" target="_blank" class="custom-btn fill-btn-1">{{__('message.login')}}</a>

                                <a href="{{ getSettingValue('create_account_ctrader_'.config('app.locale')) ?? '#' }}" target="_blank" class="custom-btn fill-btn">{{__('message.cretae_account')}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="inner-loginTrader mb-20">
                        <div class="logoDark bottom-b">
                            <img class="img-fluid" src="{{asset('fixifx/images/login_img/advanntrade.png')}}" alt="">
                        </div>
                        <div class="d-flex doubleboxLink">
                            <div class="tradeBox">
                                <div class="title">
                                    <h4>
                                        {{__('message.metatrader')}}
                                    </h4>
                                    <p>
                                        {{__('message.logi_para2')}}
                                    </p>
                                </div>
                                <div class="button-group d-flex align-items-center justify-content-center">
                                    <a href="{{ getSettingValue('login_metatrader_'.config('app.locale')) ?? '#'}}" target="_blank" class="custom-btn fill-btn-1">{{__('message.login')}}</a>

                                    <a href="{{ getSettingValue('create_account_metatrader_'.config('app.locale')) ?? '#'}}" target="_blank" class="custom-btn fill-btn">{{__('message.cretae_account')}}</a>
                                </div>
                            </div>
                            <div class="tradeBox">
                                <div class="title">
                                    <h4>
                                        {{__('message.advantrade')}}
                                    </h4>
                                    <p>
                                        {{__('message.logi_para3')}}
                                    </p>
                                </div>
                                <div class="button-group d-flex align-items-center justify-content-center">
                                    <a href="{{ getSettingValue('login_advantrade_'.config('app.locale')) ?? '#'}}" target="_blank" class="custom-btn fill-btn-1">{{__('message.login')}}</a>

                                    <a href="{{ getSettingValue('create_account_advanTrade_'.config('app.locale')) ?? '#'}}" target="_blank" class="custom-btn fill-btn">{{__('message.cretae_account')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footerLeft">
                <p>
                    @ <a href="javascript:void(0)">{{__('message.footerlogin1')}}</a> {{__('message.footerlogin2')}}
                </p>
            </div>
        </div>
        <div class="loginRight-wrap">
            <div class="innerRight">
                <div class="logobox">
                    <img src="{{asset('fixifx/images/login_img/whitelogo-fixi.png')}}" class="img-fluid" alt="">
                </div>
                <div class="subtext">
                    <p>
                    {{__('message.login_side_para')}}
                    </p>
                </div>
                <div class="rightBox-img">
                    <img class="img-fluid" src="{{asset('fixifx/images/laptop.png')}}" alt="">
                </div>
            </div>
        </div>
    </section>

    <script src="https://fixifx.com/fixifx/js/bootstrap.bundle.min.js"></script>
</body>

</html>