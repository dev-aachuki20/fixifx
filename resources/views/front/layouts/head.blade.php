@php
    $sitename_locale = ' | FiXi FX';
    if(config('app.locale') == 'ja'){
        $sitename_locale = '｜FiXi FX（フィクシー）';
    }
@endphp

<head>
    <!-- Standard Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, minimum-scale=1, width=device-width">
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

    <link rel="canonical" href="{{ 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] }}">

    <!-- Favicon and apple icon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('front/img/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('front/img/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('front/img/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('front/img/favicon/site.webmanifest') }}">
    <link rel="mask-icon" href="{{asset('front/img/favicon/safari-pinned-tab.svg')}}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link rel="stylesheet" href="{{ asset('front/css/vendors/uikit.min.css') }}" media="print" onload="this.media='all'" />
    <link rel="stylesheet" href="{{ asset('front/css/bootstrap-grid.min.css') }}" media="print" onload="this.media='all'" />
    <link rel="stylesheet" href="{{ asset('front/css/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/slick.min.css') }}" media="print" onload="this.media='all'" />
    <link rel="stylesheet" href="{{ asset('front/css/slick-theme.min.css') }}" media="print" onload="this.media='all'" />
    <link rel="stylesheet" href="{{ asset('front/css/owlcarousel/owl.carousel.min.css') }}" media="print" onload="this.media='all'" />
    <link rel="stylesheet" href="{{ asset('front/css/owlcarousel/owl.theme.default.min.css') }}" media="print" onload="this.media='all'" />
    <!--<link rel="stylesheet" href="{{ asset('front/fonts/NotoJP.css') }}" media="print" onload="this.media='all'" />-->
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/responsive.css') }}" />
    
    <style>
        * {
            font-family: 'Noto Sans JP';
        }
        /* #chat-widget-container {
        left: 0px;
        right: unset;
        } */
    </style>
    @stack('css')
</head>