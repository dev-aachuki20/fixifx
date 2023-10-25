@php
$keywords_jp = 'FX,フィクシー,cTrader,Windows,デスクトップ';
$description_jp = 'FiXi FX（フィクシー）が提供するcTrader(Windows版･デスクトップ版)に関するページです。';
@endphp

@extends('front.layouts.base')

@section('content')

<!-- Hero section  -->
<section class="reward-wrapper cTrader-ios cTrader-web whsection-text padding-tb-180 pb-0 d-flex flex-wrap align-items-center">
    <div class="container">
        <div class="advan-trade-herobox cTrader-ios-trade-herobox">
            <div class="row align-items-center justify-content-center">
                @include('front.common.sub_header')
                @include('front.common.download_section')

                @php $section2 = $section->where('section_no', 2)->where('status', 1)->first() @endphp
                @if($section2)
                <div class="col-12">
                    <div class="system-requirements-inner">
                        <div class="row align-items-center">
                            <div class="col-12 col-md-4 col-lg-4">
                                <div class="img-box w-100 mw-100">
                                    <img class="img-fluid w-100" src="{{ $section2->image ? $section2->image : asset('fixifx/images/laptop.png')}}" alt="">
                                </div>
                            </div>
                            <div class="col-12 col-md-8 col-lg-8">
                                <div class="contentbox section-head">
                                    <h4>{{ $section2->{config('app.locale').'_title'} }}</h4>
                                    {!! $section2->{config('app.locale').'_desc'} !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif


            </div>
        </div>
        <!-- end  -->
    </div>
</section>
<!-- end  -->

<!-- we-trade-wrapper  -->
@php $section3 = $section->where('section_no', 3)->where('status', 1)->first() @endphp
@if($section3)
<section class="spreads-industry-wrap we-trade-wrapper bg-white padding-top-120 padding-bottom-240 mb-120" style="background-image:url(images/bg-glob-1.svg);background-repeat: no-repeat; background-position: bottom left;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-md-6 col-xl-6">
                <div class="leftProudly_box">
                    <div class="title">
                        <h2>
                            {{ $section3->{config('app.locale').'_title'} }}
                        </h2>
                    </div>
                    <div class="discription">
                        <p>
                            {!! $section3->{config('app.locale').'_desc'} !!}
                        </p>
                    </div>
                    <div class="button-group">
                        <a href="{{ getSettingValue('new_user_link') }}" class="custom-btn fill-btn">{{ getSettingValue('new_user_btn_'.config('app.locale')) }}</a>
                        <a href="{{ getSettingValue('existing_user_link')  }}" class="custom-btn fill-btn-1">{{ getSettingValue('existing_user_btn_'.config('app.locale')) }}</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-xl-6">
                <div class="imgbox">
                    <img class="img-fluid" src="{{ $section3->image ? $section3->image : asset('fixifx/images/Platforms-01.png')}}" alt="">
                </div>
            </div>
        </div>
        <!-- border  -->
        <div class="border-padding"></div>
        <!-- end border  -->


        @php $section4 = $section->where('section_no', 4)->where('status', 1)->first() @endphp
        @if($section4)
        <div class="row align-items-center">
            <div class="col-12 col-md-6 col-xl-6">
                <div class="imgbox">
                    <img class="img-fluid" src="{{$section4->image ? $section4->image : asset('fixifx/images/Platforms-01.png')}}" alt="">
                </div>
            </div>
            <div class="col-12 col-md-6 col-xl-6">
                <div class="leftProudly_box">
                    <div class="title">
                        <h2>
                            {{ $section4->{config('app.locale').'_title'} }}
                        </h2>
                    </div>
                    <div class="discription">
                        <p>
                            {!! $section4->{config('app.locale').'_desc'} !!}
                        </p>
                    </div>
                    <div class="button-group">
                        <a href="{{ getSettingValue('new_user_link') }}" class="custom-btn fill-btn">{{ getSettingValue('new_user_btn_'.config('app.locale')) }}</a>
                        <a href="{{ getSettingValue('existing_user_link')  }}" class="custom-btn fill-btn-1">{{ getSettingValue('existing_user_btn_'.config('app.locale')) }}</a>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
@endif
<!-- end  -->

<!-- No trading limits -->
@php $section5 = $section->where('section_no', 5)->where('status', 1)->first() @endphp
@if($section5)
<section class="no-trading-limits pb-0 reward-wrapper whsection-text">
    <div class="container">
        <div class="fixi-features-herobox fixi-Benefits-herobox b-none">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 col-md-12 col-sm-12 text-center">
                    <h2>{{ $section5->{config('app.locale').'_title'} }}</h2>
                    <div class="section-head m-auto">
                        <div class="discription">
                            <p>
                                {!! $section5->{config('app.locale').'_desc'} !!}
                            </p>
                        </div>
                    </div>
                    <div class="openAi-btn d-flex align-items-center justify-content-center">
                        <a href="{{ getSettingValue('new_user_link') }}" class="custom-btn fill-btn-1">{{ getSettingValue('new_user_btn_'.config('app.locale')) }}</a>
                        <a href="{{ getSettingValue('existing_user_link')  }}" class="custom-btn fill-btn">{{ getSettingValue('existing_user_btn_'.config('app.locale')) }}</a>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-sm-12 text-center">
                    <div class="imgbox">
                        <img class="img-fluid" src="{{ $section5->image ? $section5->image : asset('fixifxd/images/laptop.png')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
<!-- end  -->

<!-- we-trade-wrapper  -->
<section class="market-depth we-trade-wrapper bg-white pt-0 padding-bottom-240 mb-120" style="background-image:url(images/bg-glob-1-right.png);background-repeat: no-repeat; background-position: bottom right;">
    <div class="container">
        <!-- border  -->
        <div class="border-padding"></div>
        <!-- end border  -->


        <!-- Level II Pricing – Market Depth -->
        @php $section6 = $section->where('section_no', 6)->where('status', 1)->first() @endphp
        @if($section6)
        <div class="row align-items-center">
            <div class="col-12 col-md-6 col-xl-6">
                <div class="leftProudly_box">
                    <div class="title">
                        <h2>
                            {{ $section6->{config('app.locale').'_title'} }}
                        </h2>
                    </div>
                    <div class="discription">
                        <p>
                            {!! $section6->{config('app.locale').'_desc'} !!}
                        </p>
                    </div>
                    <div class="button-group">
                        <a href="{{ getSettingValue('new_user_link') }}" class="custom-btn fill-btn">{{ getSettingValue('new_user_btn_'.config('app.locale')) }}</a>
                        <a href="{{ getSettingValue('existing_user_link')  }}" class="custom-btn fill-btn-1">{{ getSettingValue('existing_user_btn_'.config('app.locale')) }}</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-xl-6">
                <div class="imgbox">
                    <img class="img-fluid" src="{{$section6->image ? $section6->image : asset('fixifx/images/Platforms-01.png')}}" alt="">
                </div>
            </div>
        </div>
        @endif
        <!-- border  -->
        <div class="border-padding"></div>
        <!-- end border  -->


        <!-- Smart Stop Out -->
        @php $section7 = $section->where('section_no', 7)->where('status', 1)->first() @endphp
        @if($section7)
        <div class="row align-items-center">
            <div class="col-12 col-md-6 col-xl-6">
                <div class="imgbox">
                    <img class="img-fluid" src="{{$section7->image ? $section7->image : asset('fixifx/images/Platforms-01.png')}}" alt="">
                </div>
            </div>
            <div class="col-12 col-md-6 col-xl-6">
                <div class="leftProudly_box">
                    <div class="title">
                        <h2>
                            {{ $section7->{config('app.locale').'_title'} }}
                        </h2>
                    </div>
                    <div class="discription">
                        <p>
                            {!! $section7->{config('app.locale').'_desc'} !!}
                        </p>
                    </div>
                    <div class="button-group">
                        <a href="{{ getSettingValue('new_user_link') }}" class="custom-btn fill-btn">{{ getSettingValue('new_user_btn_'.config('app.locale')) }}</a>
                        <a href="{{ getSettingValue('existing_user_link')  }}" class="custom-btn fill-btn-1">{{ getSettingValue('existing_user_btn_'.config('app.locale')) }}</a>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
<!-- end  -->

<!-- cTrader Desktop Features -->
@php $section8 = $section->where('section_no', 8)->where('status', 1)->first() @endphp
@if($section8)
<section class="cTrader-desktop-f pb-0 reward-wrapper whsection-text">
    <div class="container">
        <div class="fixi-features-herobox">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="side-by-side-img">
                        <img src="{{$section8->image ? $section8->image : asset('fixifx/images/FiXi-Features.png')}}" alt="tradergo">
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12">
                    <div class="expert-support-head">
                        <h2 class="max-w-427">{{ $section8->{config('app.locale').'_title'} }}</h2>
                        <div class="discription">
                            <p>
                                {!! $section8->{config('app.locale').'_desc'} !!}
                            </p>
                        </div>
                    </div>
                    @php $section12 = $section->where('section_no', 12)->where('status', 1)->first() @endphp
                    @if($section12)
                    <div class="expert-content">
                        <div class="accordion" id="accordionexpert">
                            {!! $section12->{config('app.locale').'_desc'} !!}
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endif
<!-- end  -->


<!-- cTrader Desktop Benefits -->
@php $section9 = $section->where('section_no', 9)->where('status', 1)->first() @endphp
@if($section9)
<section class="ctrade-desktop-benefits bg-white side-by-side padding-tb-120 fiXiTrader_box">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-sm-12 col-lg-6 col-md-6  ">
                <div class="section-head">
                    <h2 class="max-w-427">{{ $section9->{config('app.locale').'_title'} }}</h2>
                    {!! $section9->{config('app.locale').'_desc'} !!}
                </div>
            </div>
            <div class="col-sm-12 col-lg-6 col-md-6">
                <div class="side-by-side-img">
                    <img src="{{$section9->image ? $section9->image : asset('fixifx/images/laptop.png')}}" alt="tradergo">
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<!-- System Requirements -->
@php $section10 = $section->where('section_no', 10)->where('status', 1)->first() @endphp
@if($section10)
<section class="cTrader-desktop-f pb-0 reward-wrapper whsection-text">
    <div class="container">
        <div class="fixi-features-herobox cTrader-ios-trade-herobox">
            <div class="col-12">
                <div class="system-requirements-inner mt-0 mb-0">
                    <div class="row align-items-center">
                        <div class="col-12 col-md-4 col-lg-4">
                            <div class="img-box">
                                <img class="img-fluid" src="{{$section10->image ? $section10->image : asset('fixifx/images/laptop.png')}}" alt="">
                            </div>
                        </div>
                        <div class="col-12 col-md-8 col-lg-8">
                            <div class="contentbox section-head">
                                <h4>{{ $section10->{config('app.locale').'_title'} }}</h4>
                                {!! $section10->{config('app.locale').'_desc'} !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
<!-- end  -->

<!-- Notes section  -->
@php $section11 = $section->where('section_no', 11)->where('status', 1)->first() @endphp
@if($section11)
<section class="notes-wrapper padding-tb-120">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="notes-listing">
                    <div class="notes-item">
                        <div class="title">
                            <h4>
                                {!! $section11->{config('app.locale').'_title'} !!}
                            </h4>
                        </div>
                        <div class="discription">
                            <p>
                                {!! $section11->{config('app.locale').'_desc'} !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
<!-- end  -->
@endsection