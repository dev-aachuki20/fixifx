@php
    $keywords_jp = 'cTrader,cTrader Automate,自動売買,自動化取引';
    $description_jp = '高機能なcTrader APIと人気の高いC#言語を使用して自動売買ロボットやカスタムインジケータを構築し、取引戦略のバックテストと最適化を行うことができます。';
@endphp

@extends('front.layouts.master')

@section('content')
    
        @include('front.common.page_header')
        <div class="uk-section">
            <div class="uk-container">
            <div class="uk-grid">
                @include('front.common.side_section')
                <div class="uk-width-2-3@m">
                    <div class="inner-content">
                        @include('front.common.sub_header')
                        <div class="inner-features-wrap">
                            <div class="uk-first-column">
                                @php $section2 = $section->where('section_no', 2)->where('status', 1)->first() @endphp
                                @if($section2)
                                <div class="in-margin-small-top@s in-margin-bottom@s">
                                    <img class="uk-align-center" src="{{ $section2->image }}" alt="{{ config('app.locale') == 'ja' ? 'cTrader自動売買 - 海外FX業者FiXi FX（フィクシー）' : 'cTrader Automated-Trading' }}" loading="lazy"/>
                                </div>
                                <div class="uk-margin-medium-bottom">
                                    <h3 class="">{{ $section2->{config('app.locale').'_title'} }}</h3>
                                    <div class="title_divider_dot"></div>
                                    {!! $section2->{config('app.locale').'_desc'} !!}
                                </div>
                                @endif

                                @php $section3 = $section->where('section_no', 3)->where('status', 1)->first() @endphp
                                @if($section3)
                                <div class="uk-margin-medium-bottom">
                                    <h3 class="">{{ $section3->{config('app.locale').'_title'} }}</h3>
                                    <div class="title_divider_dot"></div>
                                    {!! $section3->{config('app.locale').'_desc'} !!}
                                </div>
                                @endif

                                <!-- <div
                                class="uk-flex uk-flex-middle uk-flex-between flex-wrap uk-margin-medium-bottom uk-background-muted uk-border-rounded"
                                >
                                <h4 class="mb-0 ps-0 ps-sm-3">
                                    Trade with CTrader Automate
                                </h4>
                                <a
                                    href="#"
                                    class="uk-button uk-button-dark uk-border-rounded mt-2 mt-sm-0"
                                    >Download</a
                                >
                                </div> -->

                                @php $section4 = $section->where('section_no', 4)->where('status', 1)->first() @endphp
                                @if($section4)
                                <h3 class="">{{ $section4->{config('app.locale').'_title'} }}</h3>
                                <div class="title_divider_dot"></div>
                                {!! $section4->{config('app.locale').'_desc'} !!}
                                <div class="uk-margin-medium-top company_profile_wrapper " uk-slider="autoplay: true; autoplay-interval: 2000">
                                    @if(count($section4->subSection))
                                    <div class="uk-slider-items uk-child-width-1-2@s uk-child-width-1-2@m uk-grid-small uk-grid">
                                        @foreach($section4->subSection as $sub_sec)
                                        <div>
                                            <div class="custom_box custom_box_shadow d-flex flex-column mb-2 uk-text-center">
                                                <div class="uk-margin-right circle medium flex-shrink-0">
                                                    <img src="{{ asset('front/img/icons/page-icon/Automated-Trading/'.$sub_sec->icon) }}" class="page_icon" loading="lazy" alt="{{ config('app.locale') == 'ja' ? 'cTrader自動売買 - 海外FX業者FiXi FX（フィクシー）' : 'cTrader Automated-Trading' }}">
                                                </div>
                                            <h4 class="mt-3 mb-2 uk-text-center" style="word-break: break-word">
                                                    {{ $sub_sec->{config('app.locale').'_title'} }}
                                                </h4>
                                                <p class="mb-0">
                                                    {!! $sub_sec->{config('app.locale').'_desc'} !!}
                                                </p>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="uk_slider_nav">
                                        <ul class=" uk-slider-nav uk-dotnav"></ul>
                                    </div>
                                    @endif
                                </div>
                                @endif

                                @php $section5 = $section->where('section_no', 5)->where('status', 1)->first() @endphp
                                @if($section5)    
                                    <h3 class="">{{ $section5->{config('app.locale').'_title'} }}</h3>
                                    <div class="title_divider_dot"></div>
                                    {!! $section5->{config('app.locale').'_desc'} !!}
                                    
                                    @if(count($section5->subSection))
                                    <div class="uk-margin-medium-top">
                                        @foreach($section5->subSection as $k => $sub_sec)
                                        <!-- <div class="uk-flex-middle uk-margin-medium-bottom" uk-grid>
                                            <div class="uk-width-2-3@m">
                                                <h3>{{ $sub_sec->{config('app.locale').'_title'} }}</h3>
                                                {!! $sub_sec->{config('app.locale').'_desc'} !!}
                                            </div>
                                            <div class="uk-width-1-3@m {{(($k+1)%2 == 0 ? 'order-first order-lg-last' : 'uk-flex-first')}}">
                                                <img class="uk-align-center" src="{{ $sub_sec->image }}" alt="image-team"/>
                                            </div>
                                        </div> -->
                                        <div class="uk-flex-middle uk-margin-medium-bottom" uk-grid>
                                            <div class="uk-width-2-3@s">
                                                <h3>{{ $sub_sec->{config('app.locale').'_title'} }}</h3>
                                                <p>{!! $sub_sec->{config('app.locale').'_desc'} !!}</p>
                                            </div>
                                            <div class="uk-width-1-3@s {{(($k+1)%2 == 0 ? 'order-first order-sm-last' : 'uk-flex-first')}}">
                                                <img class="custom_box_shadow uk-width-100 {{(($k+1)%2 == 0 ? 'uk-align-right' : 'uk-align-left')}}" src="{{config('app.locale') == 'ja'? $sub_sec->ja_image:$sub_sec->image }}" alt="{{ config('app.locale') == 'ja' ? 'cTrader自動売買 - 海外FX業者FiXi FX（フィクシー）' : 'cTrader Automated-Trading' }}" loading="lazy"/> 
                                            </div>
                                        </div>
                                        <hr class="my-4" />
                                        @endforeach
                                    </div>
                                    @endif
                                @endif   


                                @php $section6 = $section->where('section_no', 6)->where('status', 1)->first() @endphp
                                @if($section6)
                                <h3 class="">{{ $section6->{config('app.locale').'_title'} }}</h3>
                                <div class="title_divider_dot"></div>
                                {!! $section6->{config('app.locale').'_desc'} !!}
                                <div class="uk-margin-medium-top company_profile_wrapper " uk-slider="autoplay: true; autoplay-interval: 2000">
                                    @if(count($section6->subSection))
                                    <div class="uk-slider-items uk-child-width-1-2@s uk-child-width-1-2@m uk-grid-small uk-grid">
                                        @foreach($section6->subSection as $sub_sec)
                                        <div>
                                            <div class="custom_box custom_box_shadow d-flex flex-column uk-text-center">
                                                <div class="uk-margin-right circle medium flex-shrink-0">
                                                    <img src="{{ asset('front/img/icons/page-icon/Automated-Trading/'.$sub_sec->icon) }}" class="page_icon" loading="lazy" alt="{{ config('app.locale') == 'ja' ? 'cTrader自動売買 - 海外FX業者FiXi FX（フィクシー）' : 'cTrader Automated-Trading' }}">
                                                </div>
                                                <h4 class="mt-3 mb-0 uk-text-center" style="word-break: break-word">
                                                {{ $sub_sec->{config('app.locale').'_title'} }}
                                                </h4>
                                                <p class="mb-0">
                                                {!! $sub_sec->{config('app.locale').'_desc'} !!}
                                                </p>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="uk_slider_nav">
                                        <ul class=" uk-slider-nav uk-dotnav"></ul>
                                    </div>
                                    @endif
                                </div>
                                @endif

                                @php $section7 = $section->where('section_no', 7)->where('status', 1)->first() @endphp
                                @if($section7)
                                <!-- <hr class="in-margin-top-20@s uk-margin-medium-top in-margin-bottom-20@s uk-margin-medium-bottom"/> -->
                                <!-- <h3 class=""></h3> -->
                                

                                <div class="in-profit-16 uk-margin-medium-bottom">
                                    <div class="in-create-account uk-text-left uk-margin-medium-top">
                                        <span class="uk-label uk-text-small uk-text-uppercase uk-border-rounded uk-margin-small-bottom">{{ $section7->{config('app.locale').'_title'} }}</span>
                                        <p class="mb-0 mt-2">{!! $section7->{config('app.locale').'_desc'} !!}</p>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    
@endsection 