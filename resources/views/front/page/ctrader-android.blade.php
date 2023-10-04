@php
    $keywords_jp = 'FX,cTrader,Android,アンドロイド';
    $description_jp = 'FiXi FX（フィクシー）が提供するcTrader(Android版)に関するページです。';
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
                                @php $section2 = $section->where('section_no', 2)->where('status', 1)->first() @endphp
                                @if($section2)
                                <div class="in-margin-small-top@s in-margin-bottom@s">
                                    <img class="uk-align-center" src="{{ $section2->image }}" alt="{{ config('app.locale') == 'ja' ? 'cTraderコピートレード可能な海外FX業者 - FiXi FX（フィクシー）' : 'cTrader - FiXi FX' }}" loading="lazy"/>
                                </div>
                                {!! $section2->{config('app.locale').'_desc'} !!}
                                @endif

                                <!-- <div class="uk-flex uk-flex-middle flex-wrap uk-margin-medium-bottom uk-background-muted p-3 uk-border-rounded justify-content-center">
                                    <div class="uk-flex uk-flex-middle flex-wrap uk-background-muted uk-border-rounded justify-content-center">
                                        <div class="d-flex align-items-center me-3">
                                            <span class="uk-margin-right in-icon-wrap circle medium flex-shrink-0"><i class="fas fa-download fa-2x"></i></span>
                                            <h4 class="my-0 uk-margin-right">Trade Forex on the go with your Android Device!</h4>
                                        </div>
                                        <a href="#" class="uk-button uk-button-dark uk-border-rounded mt-2 mt-sm-0">Download</a>
                                    </div>
                                </div> -->
                                <div class="uk-grid uk-child-width-1-2@s uk-child-width-1-2@m in-margin-bottom-30@s uk-margin-medium-bottom" data-uk-grid="">
                                    @php $section3 = $section->where('section_no', 3)->where('status', 1)->first() @endphp
                                    @if($section3)
                                    <div class="uk-first-column">
                                        <h3 class=" mb-3">{{ $section3->{config('app.locale').'_title'} }}</h3>
                                        <div class="title_divider_dot"></div>
                                        {!! $section3->{config('app.locale').'_desc'} !!}
                                    </div>
                                    @endif
                                    @php $section4 = $section->where('section_no', 4)->where('status', 1)->first() @endphp
                                    @if($section4)
                                    <div class="in-margin-small-top@s in-margin-bottom@s">
                                        <h3 class=" mb-3">{{ $section4->{config('app.locale').'_title'} }}</h3>
                                        <div class="title_divider_dot"></div>
                                        {!! $section4->{config('app.locale').'_desc'} !!}
                                    </div>
                                    @endif
                                </div>
                                <!-- <hr class="in-margin-top-20@s uk-margin-medium-top in-margin-bottom-20@s uk-margin-medium-bottom" /> -->
                                @php $section5 = $section->where('section_no', 5)->where('status', 1)->first() @endphp
                                @if($section5)
                                <!-- <div>
                                    <h4 class="">{{ $section5->{config('app.locale').'_title'} }}</h4>
                                    {!! $section5->{config('app.locale').'_desc'} !!}
                                </div> -->
                                <div class="in-profit-16">
                                    <div class="in-create-account uk-text-left uk-margin-medium-top">
                                        <span class="uk-label uk-text-small uk-text-uppercase uk-border-rounded uk-margin-small-bottom">{{ $section5->{config('app.locale').'_title'} }}</span>
                                        {!! $section5->{config('app.locale').'_desc'} !!}
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
@endsection    