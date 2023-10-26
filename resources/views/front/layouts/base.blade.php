<html lang="{{ config('app.locale') }}" dir="ltr">

@php
$sitename_locale = ' | FiXi FX';
if(config('app.locale') == 'ja'){
$sitename_locale = '｜FiXi FX（フィクシー）';
}
@endphp

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
</head>

<body>
    @include('front.layouts.partials.header')

    @yield('content')

    @include('front.layouts.partials.instant_account')

    @include('front.layouts.partials.footer')

    @include('front.layouts.partials.javascript')

    @yield('javascript')
</body>

</html>