@php
$keywords_jp = 'FX,cTrader,Android,アンドロイド';
$description_jp = 'FiXi FX（フィクシー）が提供するcTrader(Android版)に関するページです。';
@endphp

@extends('front.layouts.base')

@section('content')

<!-- Hero section  -->
<section class="reward-wrapper cTrader-ios mt5-android-trade-wrapper whsection-text padding-tb-180 pb-0 d-flex flex-wrap align-items-center">
    <div class="container">
        <div class="advan-trade-herobox cTrader-ios-trade-herobox">
            <div class="row align-items-center justify-content-center">

                @include('front.common.sub_header')
                @include('front.common.download_section')

                <div class="col-12">
                    <div class="system-requirements-inner">
                        @php $section2 = $section->where('section_no', 2)->where('status', 1)->first() @endphp
                        @if($section2)
                        <div class="row">
                            <div class="col-12 col-md-4 col-lg-4">
                                <div class="img-box">
                                    <img class="img-fluid" src="{{$section2->image ? $section2->image : asset('fixifx/images/iphone.png') }}" alt="">
                                </div>
                            </div>

                            <div class="col-12 col-md-8 col-lg-8">
                                <div class="contentbox section-head">
                                    <h4>{{ $section2->{config('app.locale').'_title'} }}</h4>

                                    {!! $section2->{config('app.locale').'_desc'} !!}
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- end  -->
        @php $section4 = $section->where('section_no', 4)->where('status', 1)->first() @endphp
        @if($section4)
        <div class="fixi-features-herobox">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="side-by-side-img">
                        <img src="{{$section2->image ? $section2->image : asset('fixifx/images/FiXi-Features.png') }}" alt="tradergo">
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12">
                    <div class="expert-support-head">
                        <h2 class="max-w-427">{{ $section4->{config('app.locale').'_title'} }}</h2>
                        <div class="discription">
                            <p>
                                {!! $section4->{config('app.locale').'_desc'} !!}
                            </p>
                        </div>
                    </div>
                    @php $section6 = $section->where('section_no', 6)->where('status', 1)->first() @endphp
                    @if($section6)
                    <div class="expert-content">
                        <div class="accordion" id="accordionexpert">
                            {!! $section6->{config('app.locale').'_desc'} !!}
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div> 
        @endif
        <!-- end  -->
        <div class="fixi-features-herobox fixi-Benefits-herobox cTrader-ios-trade-herobox">
            <div class="col-12"></div>
            @php $section5 = $section->where('section_no', 5)->where('status', 1)->first() @endphp
            @if($section5)
            <div class="system-requirements-inner mt-0">
                <div class="row align-items-center">
                    <div class="col-12 col-md-4 col-lg-4">
                        <div class="img-box">
                            @if($section5->image)
                            <img class="img-fluid" src="{{$section5->image ? $section5->image : asset('fixifx/images/android.png')}}" alt="">
                            @endif
                        </div>
                    </div>
                    <div class="col-12 col-md-8 col-lg-8">
                        <div class="contentbox section-head">
                            <h4>{{ $section5->{config('app.locale').'_title'} }}</h4>

                            {!! $section5->{config('app.locale').'_desc'} !!}

                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
        <!-- end  -->

        @include('front.layouts.partials.discover_other_platform')
        <!-- end  -->

        <div class="frequently-row-box fixi-features-herobox">
            @include('front.common.mt4_faq')

            @include('front.layouts.partials.get_started')
        </div>
        <!-- end  -->

    </div>

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