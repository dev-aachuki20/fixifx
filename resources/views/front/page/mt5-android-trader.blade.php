@php
    $keywords_jp = 'FX,MT5,MetaTrader5,アンドロイド,Android';
    $description_jp = 'FiXi FX（フィクシー）が提供するMetaTrader5(MT5)のAndroid版に関するページです。';
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
                            <!-- <hr class="my-4"> -->
                            <div class="inner-features-wrap">
                                @php $section1 = $section->where('section_no', 1)->where('status', 1)->first() @endphp
                                <div class="in-margin-small-top@s in-margin-bottom@s">
                                    @if($section1 && $section1->image)
                                    <img class="uk-align-center " src="{{ $section1->image }}" alt="Meta Trader 5 (MT5) - Android">
                                    @endif
                                </div>
                                <div class="uk-first-column">
                                    @php $section2 = $section->where('section_no', 2)->where('status', 1)->first() @endphp
                                    @if($section2)
                                    <div class="uk-margin-medium-bottom">
                                        <h3 class="">{{ $section2->{config('app.locale').'_title'} }}</h3>
                                        </div>{!! $section2->{config('app.locale').'_desc'} !!}
                                        <a href="#"><img class="img-fluid" src="{{asset('front/img/playstore.svg')}}" alt="Meta Trader 5 (MT5) - Android" loading="lazy"></a>
                                    </div>
                                    @endif

                                    @include('front.common.download_section')

                                    @php $section3 = $section->where('section_no', 3)->where('status', 1)->first() @endphp
                                    @if($section3)
                                    <div class="uk-flex-middle" uk-grid>
                                        <div class="uk-width-2-3@m">
                                            <h3>{{ $section3->{config('app.locale').'_title'} }}</h3>
                                            <p>{!! $section3->{config('app.locale').'_desc'} !!}</p>
                                        </div>
                                        <div class="uk-width-1-3@m uk-flex-first">
                                        @if($section3)
                                                <img class="uk-align-center" src="{{ $section3->image ?  $section3->image :  asset('front/img/default.webp')}}" alt="Meta Trader 5 (MT5) - Android" loading="lazy">
                                                @endif
                                            </div>
                                    </div>
                                    <hr class="my-4" />
                                    @endif
                                    @php $section4 = $section->where('section_no', 4)->where('status', 1)->first() @endphp
                                    @if($section4)
                                    <div class="uk-flex-middle" uk-grid>
                                        <div class="uk-width-2-3@m">
                                            <h3>{{ $section4->{config('app.locale').'_title'} }}</h3>
                                            <p>{!! $section4->{config('app.locale').'_desc'} !!}</p>
                                        </div>
                                        <div class="uk-width-1-3@m">
                                            @if($section4)
                                            <img class="uk-align-center" src="{{ $section4->image ? $section4->image : asset('front/img/default.webp') }}" alt="Meta Trader 5 (MT5) - Android" loading="lazy">
                                            @endif
                                        </div>
                                    </div>
                                    <hr class="my-4" />
                                    @endif
                                    @php $section5 = $section->where('section_no', 5)->where('status', 1)->first() @endphp
                                    @if($section5)
                                    <div class="uk-flex-middle" uk-grid>
                                        <div class="uk-width-2-3@m">
                                            <h3>{{ $section5->{config('app.locale').'_title'} }}</h3>
                                            <p>{!! $section5->{config('app.locale').'_desc'} !!}</p>
                                            <div class="user-button-flex" data-uk-margin="">
                                                <a href="#"><img class="img-fluid" src="{{asset('front/img/playstore.svg')}}" alt="Download Meta Trader 5 (MT5) - Android" loading="lazy"></a>
                                            </div>
                                        </div>
                                        <div class="uk-width-1-3@m uk-flex-first">
                                            @if($section5)
                                            <img class="uk-align-center" src="{{ $section5->image  ? $section5->image : asset('front/img/default.webp') }}" alt="Meta Trader 5 (MT5) - Android" loading="lazy">
                                            @endif
                                        </div>
                                    </div>
                                    <hr class="my-4" />
                                    @endif
                                    @php $section6 = $section->where('section_no', 6)->where('status', 1)->first() @endphp
                                    @if($section6)
                                    <div class="uk-margin-medium-bottom">
                                        <h3 class="">{{ $section6->{config('app.locale').'_title'} }}</h3>
                                        <div class="title_divider_dot"></div>
                                        {!! $section6->{config('app.locale').'_desc'} !!}
                                    </div>
                                    @endif
                                    
                                    @php $section7 = $section->where('section_no', 7)->where('status', 1)->first() @endphp
                                    @if($section7)
                                    <div class="uk-margin-medium-bottom">
                                        <h3 class="">{{ $section7->{config('app.locale').'_title'} }}</h3>
                                        <div class="title_divider_dot"></div>
                                        {!! $section7->{config('app.locale').'_desc'} !!}
                                    </div>
                                    @endif
                                    
                                    @include('front.common.mt4_faq')
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
@endsection    