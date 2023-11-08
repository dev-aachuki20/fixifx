@php
$keywords_jp = 'FX,MT5,MetaTrader5,iPhone,iOS';
$description_jp = 'FiXi FX（フィクシー）が提供するMetaTrader5(MT5)のiOS版に関するページです。';
@endphp

@extends('front.layouts.base')

@section('content')

<!-- Hero section  -->
<section class="reward-wrapper mt5-android-trade-wrapper whsection-text padding-tb-180 pb-0 d-flex flex-wrap align-items-center before-nonemob">
    <div class="container">
        <div class="advan-trade-herobox">
            <div class="row align-items-center justify-content-center">
                <!-- main heading and desc  -->
                @include('front.common.sub_header')

                @include('front.common.download_section')
            </div>
        </div>
        <!-- end  -->

        <!-- High-function real-time quotes -->
        @php $section3 = $section->where('section_no', 3)->where('status', 1)->first() @endphp
        @if($section3)
        <div class="fixi-features-herobox fixi-Benefits-herobox mt5-feature-hero ptb-50 mbd-20">
            <div class="row align-items-center">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="section-head text-white">
                        <h2 class="max-w-427 text-white">{{ $section3->{config('app.locale').'_title'} }}</h2>
                        <div class="discription">
                            <p>
                                {!! $section3->{config('app.locale').'_desc'} !!}
                            </p>
                        </div>
                        <div class="openAi-btn d-flex align-items-center justify-content-start">
                            <a href="{{ getSettingValue('new_user_link') }}" class="custom-btn fill-btn-1">{{ getSettingValue('new_user_btn_'.config('app.locale')) }}</a>
                            <a href="{{ getSettingValue('existing_user_link')  }}" class="custom-btn fill-btn">{{ getSettingValue('existing_user_btn_'.config('app.locale')) }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6 mt-5 mt-md-0">
                    <div class="side-by-side-img iphone-layer text-center">
                        @if($section3)
                        <img src="{{ $section3->image ? $section3->image : asset('fixifx/images/iphone.png')}}" alt="android">
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endif
        <!-- end  -->

        <!-- Advanced Charting -->
        @php $section4 = $section->where('section_no', 4)->where('status', 1)->first() @endphp
        @if($section4)
        <div class="risk-management-herobox mt5-riskinner ptb-50">
            <div class="row align-items-center">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="imgbox iphone-layer text-center">
                        @if($section4)
                        <img class="img-fluid" src="{{ $section4->image  ? $section4->image : asset('fixifx/images/iphone.png')}}" alt="">
                        @endif
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6 mt-5 mt-md-0">
                    <div class="section-head">
                        <h2>{{ $section4->{config('app.locale').'_title'} }}</h2>
                        <div class="discription">
                            <p>
                                {!! $section4->{config('app.locale').'_desc'} !!}
                            </p>
                        </div>
                        <div class="openAi-btn d-flex align-items-center justify-content-start">
                            <a href="{{ getSettingValue('new_user_link') }}" class="custom-btn fill-btn-1">{{ getSettingValue('new_user_btn_'.config('app.locale')) }}</a>
                            <a href="{{ getSettingValue('existing_user_link')  }}" class="custom-btn fill-btn">{{ getSettingValue('existing_user_btn_'.config('app.locale')) }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <!-- end  -->

        <!-- Download the FiXi MT5 Trading App® for iPhone -->
        @php $section5 = $section->where('section_no', 5)->where('status', 1)->first() @endphp
        @if($section5)
        <div class="risk-management-herobox mt5-riskinner ptb-50">
            <div class="row align-items-center">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="section-head">
                        <h2> {{ $section5->{config('app.locale').'_title'} }}
                        </h2>
                        <div class="discription">
                            <p>
                                {!! $section5->{config('app.locale').'_desc'} !!}
                            </p>
                        </div>
                        <div class="openAi-btn d-flex align-items-center justify-content-start">
                            <a href="{{ getSettingValue('new_user_link') }}" class="custom-btn fill-btn-1">{{ getSettingValue('new_user_btn_'.config('app.locale')) }}</a>
                            <a href="{{ getSettingValue('existing_user_link')  }}" class="custom-btn fill-btn">{{ getSettingValue('existing_user_btn_'.config('app.locale')) }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6 mt-5 mt-md-0">
                    <div class="imgbox iphone-layer text-center">
                        @if($section5)
                        <img class="img-fluid" src="{{ $section5->image  ? $section5->image : asset('fixifx/images/iphone.png') }}" alt="">
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endif
        <!-- end  -->

        <div class="frequently-row-box fixi-features-herobox pt-0 border-bottomfaq pab-50">
            @include('front.common.mt4_faq')
            @include('front.layouts.partials.get_started')
        </div>
        <!-- end  -->

        @include('front.layouts.partials.discover_other_platform')
        <!-- end  -->

    </div>
</section>
<!-- end  -->

<!-- Fixi’s OpenAPI Ready to get started? -->
<section class="OpenAPI-wrapper padding-tb-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-sm-12">
                <div class="section-head text-center">
                    <h2 class="max-w-427">{{__('message.ready_to_get_started')}}</h2>
                    <div class="discription">
                        <p>{{__('message.ready_to_get_started_desc')}}</p>
                    </div>
                    <div class="openAi-btn d-flex align-items-center justify-content-center">
                        <a href="{{ getSettingValue('live_link') }}" target="_blank" class="custom-btn fill-btn">{{__('message.open_account_btn')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end  -->

@endsection