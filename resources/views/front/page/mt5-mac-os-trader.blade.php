@php
$keywords_jp = 'FX,MT5,MetaTrader5,macOS,MacBook';
$description_jp = 'FiXi FX（フィクシー）が提供するMetaTrader5(MT5)のmacOS版に関するページです。';
@endphp

@extends('front.layouts.base')

@section('content')

<!-- Hero section  -->
<section class="reward-wrapper mtwindow-trade-wrapper whsection-text padding-tb-180 pb-0 d-flex flex-wrap align-items-center">
    <div class="container">
        <div class="advan-trade-herobox">
            <div class="row align-items-center justify-content-center">

                <!-- main heading and desc  -->
                @include('front.common.sub_header')

                @include('front.common.download_section')
            </div>
        </div>
        <!-- end  -->

        <!-- FiXi MT5 Features -->
        @php $section2 = $section->where('section_no', 2)->where('status', 1)->first() @endphp
        @if($section2)
        <div class="fixi-features-herobox">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="side-by-side-img">
                        <img src="{{$section2 && $section2->image ? $section2->image : asset('fixifx/images/FiXi-Features.png')}}" alt="tradergo">
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12">
                    <div class="expert-support-head">
                        <h2 class="max-w-427">{{ $section2->{config('app.locale').'_title'} }}</h2>
                        <div class="discription">
                            {!! $section2->{config('app.locale').'_desc'} !!}
                        </div>
                    </div>
                    @php $section3 = $section->where('section_no', 3)->where('status', 1)->first() @endphp
                    @if($section3)
                    <div class="expert-content">
                        <div class="accordion" id="accordionexpert">
                            {!! $section3->{config('app.locale').'_desc'} !!}
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        @endif
        <!-- end FiXi MT5 Features -->



        <!-- FiXi Trading Benefits -->
        @php $section4 = $section->where('section_no', 4)->where('status', 1)->first() @endphp
        @if($section4)
        <div class="fixi-features-herobox fixi-Benefits-herobox">
            <div class="row align-items-center">
                <div class="col-lg-6 col-sm-12">
                    <div class="section-head text-white">
                        <h2 class="max-w-427 text-white">{{ $section4->{config('app.locale').'_title'} }}</h2>

                        {!! $section4->{config('app.locale').'_desc'} !!}
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div class="side-by-side-img">
                        <img src="{{$section4 && $section4->image ? $section4->image : asset('fixifx/images/laptop.png')}}" alt="laptop">
                    </div>
                </div>
            </div>
        </div>
        @endif
        <!-- end FiXi Trading Benefits -->

        <!-- Download MetaTrader 5 for Windows -->
        @php $section5 = $section->where('section_no', 5)->where('status', 1)->first() @endphp
        @if($section5)
        <div class="risk-management-herobox">
            <div class="row align-items-center">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="imgbox">
                        @if($section5->image)
                        <img class="img-fluid" src="{{ $section5->image ? $section5->image : asset('fixifx/images/Platforms-01.png') }}" alt="{{ config('app.locale') == 'ja' ? 'Meta Trader 5 (MT5) Windows版 - FiXi FX（フィクシー）' : 'Meta Trader 5 (MT5) Windows - FiXi FX' }}">
                        @endif
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="section-head">
                        <h2>{{ $section5->{config('app.locale').'_title'} }}</h2>
                        <div class="discription">
                            {!! $section5->{config('app.locale').'_desc'} !!}
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
        <!-- end Download MetaTrader 5 for Windows -->



        <div class="fixi-system-requirements risk-management-herobox fixi-features-herobox">

            <!-- FiXi MT5 System Requirements : -->
            @php $section8 = $section->where('section_no', 8)->where('status', 1)->first() @endphp
            @if($section8)
            <div class="system-requirements-inner">
                <div class="row">
                    <div class="col-12 col-md-4 col-lg-4">
                        <div class="img-box">
                            <img class="img-fluid" src="{{$section8->image ? $section8->image : asset('fixifx/images/platforms01.svg')}}" alt="">
                        </div>
                    </div>
                    <div class="col-12 col-md-8 col-lg-8">
                        <div class="contentbox">
                            <h2>{{ $section8->{config('app.locale').'_title'} }}</h2>
                            {!! $section8->{config('app.locale').'_desc'} !!}
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <!--end FiXi MT5 System Requirements : -->

            @include('front.common.mt4_faq')
            @include('front.layouts.partials.get_started')


        </div>
        <!-- end  -->

        @include('front.layouts.partials.discover_other_platform')

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