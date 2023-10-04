@php
    $keywords_jp = 'FX,MT5,MetaTrader5,macOS,MacBook';
    $description_jp = 'FiXi FX（フィクシー）が提供するMetaTrader5(MT5)のmacOS版に関するページです。';
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
                                    <img  loading="lazy" class="uk-align-center " src="{{ $section1->image }}" alt="Meta Trader 5 (MT5) - macOS">
                                    @else
                                    <img  loading="lazy" class="uk-align-center " src="{{asset('front/img/mt5-desktop.webp')}}" alt="Meta Trader 5 (MT5) - macOS">
                                    @endif
                                </div>
                                <div class="uk-first-column">
                                    @php $section2 = $section->where('section_no', 2)->where('status', 1)->first() @endphp
                                    @if($section2)
                                    <h3 class="">{{ $section2->{config('app.locale').'_title'} }}</h3>
                                    <div class="title_divider_dot"></div>
                                    {!! $section2->{config('app.locale').'_desc'} !!}
                                    @endif
                                    
                                    @include('front.common.download_section')
                                    
                                    <div class="uk-grid uk-child-width-1-2@s uk-child-width-1-2@m in-margin-bottom-30@s uk-margin-medium-bottom" data-uk-grid="">
                                        @php $section3 = $section->where('section_no', 3)->where('status', 1)->first() @endphp
                                        @if($section3)
                                        <div class="uk-first-column">
                                            <h3 class="">{{ $section3->{config('app.locale').'_title'} }}</h3>
                                            <div class="title_divider_dot"></div>
                                            {!! $section3->{config('app.locale').'_desc'} !!}
                                        </div>
                                        @endif
                                        @php $section4 = $section->where('section_no', 4)->where('status', 1)->first() @endphp
                                        @if($section4)
                                        <div class="in-margin-small-top@s in-margin-bottom@s">
                                            <h3 class="">{{ $section4->{config('app.locale').'_title'} }}</h3>
                                            <div class="title_divider_dot"></div>
                                            {!! $section4->{config('app.locale').'_desc'} !!}
                                        </div>
                                        @endif
                                    </div>
                                    
                                    @php $section5 = $section->where('section_no', 5)->where('status', 1)->first() @endphp
                                    @if($section5)
                                    <div class="uk-flex-middle uk-margin-medium-bottom" uk-grid>
                                        <div class="uk-width-2-3@m">
                                            <h3>{{ $section5->{config('app.locale').'_title'} }}</h3>
                                            <div class="title_divider_dot"></div>
                                            {!! $section5->{config('app.locale').'_desc'} !!}
                                            <div class="user-button-flex" data-uk-margin="">
                                                <a href="{{ getSettingValue('new_user_link') }}" class="uk-button uk-button-primary uk-button-primary-color uk-border-rounded mr-3">{{ getSettingValue('new_user_btn_'.config('app.locale')) }}</a>
                                                <a href="{{ getSettingValue('existing_user_link')  }}" class="uk-button uk-button-dark uk-button-primary-border-color uk-border-rounded">{{ getSettingValue('existing_user_btn_'.config('app.locale')) }}</a>
                                            </div>
                                        </div>
                                        <div class="uk-width-1-3@m uk-flex-first">
                                            @if($section5->image)
                                            <img  loading="lazy" class="uk-align-center" src="{{ $section5->image }}" alt="Meta Trader 5 (MT5) - macOS">
                                            @else
                                            <img  loading="lazy" class="uk-align-center" src="{{ asset('front/img/pexels-alesia.webp') }}" alt="Meta Trader 5 (MT5) - macOS">
                                            @endif
                                        </div>
                                    </div>
                                    @endif

                                    @php $section6 = $section->where('section_no', 6)->where('status', 1)->first() @endphp
                                    @if($section6)
                                    <div class="uk-margin-medium-bottom">
                                        <h3 class="">{{ $section6->{config('app.locale').'_title'} }}</h3>
                                        <div class="title_divider_dot"></div>
                                        {!! $section6->{config('app.locale').'_desc'} !!}
                                        
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