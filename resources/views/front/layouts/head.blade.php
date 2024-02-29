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



    <link rel="stylesheet" href="{{ asset('front/css/animate.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('front/css/slick.min.css') }}" media="print" onload="this.media='all'" />

    <link rel="stylesheet" href="{{ asset('front/css/slick-theme.min.css') }}" media="print" onload="this.media='all'" />

    <link rel="stylesheet" href="{{ asset('front/css/owlcarousel/owl.carousel.min.css') }}" media="print" onload="this.media='all'" />

    <link rel="stylesheet" href="{{ asset('front/css/owlcarousel/owl.theme.default.min.css') }}" media="print" onload="this.media='all'" />

    <!--<link rel="stylesheet" href="{{ asset('front/fonts/NotoJP.css') }}" media="print" onload="this.media='all'" />-->







    <!-- aachuki's css -->

    <link rel="icon" type="image/x-icon" href="{{ asset('fixifx/images/favicon.ico') }}">



    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"> -->





    <link rel="stylesheet" href="{{ asset('front/css/bootstrap-grid.min.css') }}" media="print" onload="this.media='all'" />

    <link rel="stylesheet" href="{{ asset('fixifx/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('front/css/vendors/uikit.min.css') }}" media="print" onload="this.media='all'" />

    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}" />

    <link rel="stylesheet" href="{{ asset('front/css/responsive.css') }}" />

    <link rel="stylesheet" href="{{ asset('fixifx/css/header-style.css') }}">

    <link href="{{asset('fixifx/css/new-header-style.css')}}" rel="stylesheet">

    <link href="{{asset('fixifx/css/mobile-scroll.css')}}" rel="stylesheet">



    <!-- Link fonts -->

    <!-- <link rel="stylesheet" href="{{ asset('fixifx/css/bootstrap.min.css') }}"> -->

    <!-- <link rel="preconnect" href="https://fonts.googleapis.com"> -->

    <!-- <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> -->

    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"> -->

    <!-- <link rel="manifest" href="{{ asset('front/img/favicon/site.webmanifest') }}"> -->

    <!-- <link rel="stylesheet" href="{{ asset('fixifx/css/intlTelInput.css') }}"> -->



    <!-- Link Swiper's CSS -->

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" /> -->



    <!-- <link rel="stylesheet" href="{{ asset('fixifx/css/responsive.css') }}"> -->

    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.0/css/select2.min.css" rel="stylesheet" /> -->



    <!-- aachuki's css -->



    <style>

        html,

        body {

            color: #717070 !important;

        }



        /* #chat-widget-container {

        left: 0px;

        right: unset;

        } */

    </style>

    @stack('css')

</head>