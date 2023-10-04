@php
    $keywords_jp = 'FX,フィクシー,cTrader,Windows,デスクトップ';
    $description_jp = 'FiXi FX（フィクシー）が提供するcTrader(Windows版･デスクトップ版)に関するページです。';
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
                            @php $section2 = $section->where('section_no', 2)->where('status', 1)->first() @endphp
                                @if($section2)
                                <div class="in-margin-small-top@s in-margin-bottom@s">
                                    <img class="uk-align-center" src="{{ $section2->image }}" alt="{{ config('app.locale') == 'ja' ? 'cTraderでコピートレード可能な海外FX業者 - FiXi FX' : 'cTrader - FiXi FX' }}" loading="lazy" />
                                </div>
                                {!! $section2->{config('app.locale').'_desc'} !!}
                                @endif
                                <div class="uk-first-column uk-margin-medium-bottom">
                                    
                                    <!-- <div class="uk-flex uk-flex-middle uk-flex-between flex-wrap uk-margin-medium-bottom uk-background-muted p-3 mt-4 uk-border-rounded">
                                        <div class="platform-download-icon">
                                            <a href="mt4-client-desktop.html"><img src="img/window1.png" class="" alt=""></a>
                                        </div>
                                        <a href="#" class="uk-button uk-button-dark uk-border-rounded mt-2 mt-sm-0">Download</a>
                                    </div> -->

                                    <div>
                                        @php $section3 = $section->where('section_no', 3)->where('status', 1)->first() @endphp
                                        @if($section3)
                                        <div class="mt-5">
                                            <h3 class="mb-2 h3-from-h4">{{ $section3->{config('app.locale').'_title'} }}</h3>
                                            <div class="title_divider_dot"></div>
                                            {!! $section3->{config('app.locale').'_desc'} !!}
                                        </div>
                                        @endif

                                        @php $section4 = $section->where('section_no', 4)->where('status', 1)->first() @endphp
                                        @if($section4)
                                        <div class="mt-5">
                                            <h3 class="mb-2 h3-from-h4">{{ $section4->{config('app.locale').'_title'} }}</h3>
                                            <div class="title_divider_dot"></div>
                                            {!! $section4->{config('app.locale').'_desc'} !!}
                                        </div>
                                        @endif

                                        @php $section5 = $section->where('section_no', 5)->where('status', 1)->first() @endphp
                                        @if($section5)
                                        <div class="mt-5">
                                            <h3 class="mb-2 h3-from-h4">{{ $section5->{config('app.locale').'_title'} }}</h3>
                                            <div class="title_divider_dot"></div>
                                            {!! $section5->{config('app.locale').'_desc'} !!}
                                        </div>
                                        @endif

                                        @php $section6 = $section->where('section_no', 6)->where('status', 1)->first() @endphp
                                        @if($section6)
                                        <div class="mt-5 mb-3">
                                            <h3 class="mb-2 h3-from-h4">{{ $section6->{config('app.locale').'_title'} }}</h3>
                                            <div class="title_divider_dot"></div>
                                            {!! $section6->{config('app.locale').'_desc'} !!}
                                        </div>
                                        @endif

                                        @php $section7 = $section->where('section_no', 7)->where('status', 1)->first() @endphp
                                        @if($section7)
                                        <div class="mt-5 mb-3">
                                            <h3 class="mb-2 h3-from-h4">{{ $section7->{config('app.locale').'_title'} }}</h3>
                                            <div class="title_divider_dot"></div>
                                            {!! $section7->{config('app.locale').'_desc'} !!}
                                        </div>
                                        @endif

                                        <!-- <div class="mb-5">
                                            <a href="" class="ctrader_read_more_info">Read more information here: cTrader Smart Stop Out</a>
                                        </div> -->
                                    </div>



                                    <div class="uk-grid uk-child-width-1-2@s uk-child-width-1-2@m in-margin-bottom-30@s uk-margin-medium-bottom" data-uk-grid="">
                                        @php $section8 = $section->where('section_no', 8)->where('status', 1)->first() @endphp
                                        @if($section8)
                                        <div class="uk-first-column">
                                            <h3 class="h3-from-h4">{{ $section8->{config('app.locale').'_title'} }}</h3>
                                            <div class="title_divider_dot"></div>
                                            {!! $section8->{config('app.locale').'_desc'} !!}
                                        </div>
                                        @endif

                                        @php $section9 = $section->where('section_no', 9)->where('status', 1)->first() @endphp
                                        @if($section9)
                                        <div class="in-margin-small-top@s in-margin-bottom@s">
                                            <h3 class="h3-from-h4">{{ $section9->{config('app.locale').'_title'} }}</h3>
                                            <div class="title_divider_dot"></div>
                                            {!! $section9->{config('app.locale').'_desc'} !!}
                                        </div>
                                        @endif
                                    </div>

                                    @php $section10 = $section->where('section_no', 10)->where('status', 1)->first() @endphp
                                    @if($section10)
                                    <div class="uk-margin-medium-bottom">
                                        <h3 class="h3-from-h4">{{ $section10->{config('app.locale').'_title'} }}</h3>
                                        <div class="title_divider_dot"></div>
                                        {!! $section10->{config('app.locale').'_desc'} !!}
                                    </div>
                                    @endif
                                    @php $section11 = $section->where('section_no', 11)->where('status', 1)->first() @endphp
                                    @if($section11)
                                    <div class="in-profit-16">
                                        <div class="in-create-account uk-text-left uk-margin-medium-top">
                                            <span class="uk-label uk-text-small uk-text-uppercase uk-border-rounded uk-margin-small-bottom"> {!! $section11->{config('app.locale').'_title'} !!}</span>
                                            {!! $section11->{config('app.locale').'_desc'} !!}
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

@push('css')
<style>
    .h3-from-h4{
        font-size: 1.25rem;
    }
</style>
@endpush