@php
    $keywords_jp = 'cTrader,コピー取引,コピートレーディング,自動売買';
    $description_jp = 'cTrader利用する400人以上のプロトレーダーによる取引戦略をコピー･ミラーリング。取引を自動化することでプロトレーダーと同じ投資業績を得ることが可能となります。';
@endphp

@extends('front.layouts.master')

@section('content')

@include('front.common.page_header')
<div class="uk-section cTrader_copy_wrapper">
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
                            <img class="uk-align-center " src="{{ $section2->image }}" style="max-width:80%;margin:0 auto 24px;" alt="{{ config('app.locale') == 'ja' ? 'cTraderコピートレード可能な業者 - FiXi FX（フィクシー）' : 'cTrader copy trading - FiXi FX' }}" loading="lazy">
                        </div>
                        {!! $section2->{config('app.locale').'_desc'} !!}
                        @endif

                        @php $section3 = $section->where('section_no', 3)->where('status', 1)->first() @endphp
                        @if($section3)
                        <div class="in-margin-small-top@s in-margin-bottom@s mt-5">
                            <h3 class=" fw-bold  mb-4">{{ $section3->{config('app.locale').'_title'} }}</h3>
                            <div class="title_divider_dot"></div>
                            <div class="mt-3" style="box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px;box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px;">
                                <img class="uk-align-center mt-0 " src="{{config('app.locale')=='ja'?$section3->ja_image: $section3->image }}" alt="{{ config('app.locale') == 'ja' ? 'cTraderでコピートレード - FiXi FX（フィクシー）' : 'cTrader copy trading - FiXi FX' }}" loading="lazy">
                            </div>
                        </div>
                        @endif

                        @php $section4 = $section->where('section_no', 4)->where('status', 1)->first() @endphp
                        @if($section4)
                        <div class="mt-5">
                            <div>
                                <h3 class="fw-bold mb-4 ">{{ $section4->{config('app.locale').'_title'} }}</h3>
                                <div class="title_divider_dot"></div>
                                {!! $section4->{config('app.locale').'_desc'} !!}
                            </div>
                            <div class="row ">
                                @foreach($section4->subSection as $sub_sec_index => $sub_sec)
                                <div class="col-md-6 mb-4">
                                    <div class="copy_investments_card custom_box_shadow">
                                        <div class="title_flex_item">
                                            <div class="icon">
                                                <img src="{{asset('front/img/Starter.svg')}}" class="img-fluid" alt="{{ config('app.locale') == 'ja' ? '海外FX業者FiXi FX（フィクシー） - cTraderコピートレード' : 'cTrader copy trading' }}" loading="lazy" />
                                            </div>
                                            <h4 class="fw-bold mb-0 h4-from-h5">{{ $sub_sec->{config('app.locale').'_title'} }}</h4>
                                        </div>
                                        <p class="m-0">{!! $sub_sec->{config('app.locale').'_desc'} !!}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                        @php $section5 = $section->where('section_no', 5)->where('status', 1)->first() @endphp
                        @if($section5 && count($section5->subSection) != 0)
                        <div class="mt-5">
                            <div>
                                <h2 class="fw-bold mb-4 h2-from-h3">{{ $section5->{config('app.locale').'_title'} }}</h2>
                            </div>
                            <div class="title_divider_dot"></div>
                        </div>
                        @if((isset($section5->subSection[0]['en_desc']) != null || isset($section5->subSection[1]['en_desc']) != null))
                        <div class="title_flex_item main_title">
                            <div class="icon">
                                <img src="{{asset('front/img/steps1_icn.svg')}}" class="img-fluid" alt="{{ config('app.locale') == 'ja' ? 'cTrader自動売買とコピートレード' : 'cTrader copy trading' }}" loading="lazy" />
                            </div>
                            <h3 class="fw-bold m-0 h3-from-h4">{{ $section5->{config('app.locale').'_desc'} }}</h3>
                        </div>
                        <div class="row">
                            @foreach($section5->subSection as $key => $sub_sec)
                            @if($sub_sec->en_desc != null)
                            @if($key < 2) <div class="col-md-6 mb-4">
                                <div class="copy_investments_card custom_box_shadow list_style_timeline ">
                                    {!! $sub_sec->{config('app.locale').'_desc'} !!}
                                </div>
                        </div>
                        @endif
                        @endif
                        @endforeach
                    </div>
                    @endif
                    @if((isset($section5->subSection[2]['en_desc']) !== null && isset($section5->subSection[3]['en_desc']) !== null))
                    <div class="title_flex_item main_title">
                        @if((isset($section5->subSection[0]['en_desc']) == null && isset($section5->subSection[1]['en_desc']) == null))
                        <div class="icon">
                            <img src="{{asset('front/img/steps1_icn.svg')}}" class="img-fluid" alt="{{ config('app.locale') == 'ja' ? 'cTrader自動売買とコピートレード - FiXi FX（フィクシー）' : 'cTrader copy trading' }}" loading="lazy"/>
                        </div>
                        @else
                        <div class="icon">
                            <img src="{{asset('front/img/steps2_icn.svg')}}" class="img-fluid" alt="{{ config('app.locale') == 'ja' ? 'cTraderコピートレード可能な業者 - FiXi FX（フィクシー）' : 'cTrader copy trading' }}" loading="lazy" />
                        </div>
                        @endif
                        @if(count($section5->subSection) == 3 || count($section5->subSection) == 4)
                        <h3 class="fw-bold m-0 h3-from-h4">{{ $section5->{config('app.locale').'_short_text'} }}</h3>
                        @endif
                    </div>
                    <div class="row">
                        @foreach($section5->subSection as $key => $sub_sec)
                        @if($sub_sec->en_desc != null)
                        @if($key >= 2)
                        <div class="col-md-6 mb-4">
                            <div class="copy_investments_card custom_box_shadow list_style_timeline">
                                {!! $sub_sec->{config('app.locale').'_desc'} !!}
                            </div>
                        </div>
                        @endif
                        @endif
                        @endforeach
                    </div>
                    @endif
                    @endif
                    <div class="mt-5 benefits_trading_section">
                        @php $section6 = $section->where('section_no', 6)->where('status', 1)->first() @endphp
                        @if($section6)
                        <div class="mt-5">
                            <div class="mb-4">
                                <h2 class="fw-bold mb-3 h2-from-h3">{{ $section6->{config('app.locale').'_title'} }}</h2>
                                <div class="title_divider_dot"></div>
                                <p class="m-0">{!! $section6->{config('app.locale').'_desc'} !!}</p>
                            </div>
                            @foreach($section6->subSection as $k => $sub_sec)
                            <div class="row mb-4 {{ ($k%2 == 0) ? '' : 'flex-row-reverse mb-0' }}">
                                <div class="col-md-6">
                                    <div class="image">
                                        @if($k==0)
                                            <img src="{{asset('front/img/benefits-copy-trading1.webp')}}" class="img-fluid uk-width-100" alt="{{ config('app.locale') == 'ja' ? 'cTrader自動売買とコピートレード - FiXi FX（フィクシー）' : 'cTrader copy trading' }}" loading="lazy">
                                        @else
                                        <img src="{{asset('front/img/benefits-copy-trading2.webp')}}" class="img-fluid uk-width-100" alt="{{ config('app.locale') == 'ja' ? 'cTrader自動売買とコピートレード - FiXi FX（フィクシー）' : 'cTrader copy trading' }}" loading="lazy">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="list_style_timeline">
                                        <div class="title_flex_item m-0">
                                            <div class="icon">
                                                <img src="{{asset('front/img/investors_icn.svg')}}" class="img-fluid" alt="{{ config('app.locale') == 'ja' ? 'cTraderコピートレード - FiXi FX（フィクシー）' : 'cTrader copy trading - FiXi FX' }}" loading="lazy"/>
                                            </div>
                                            <h3 class="fw-bold m-0 h3-from-h4">{{ $sub_sec->{config('app.locale').'_title'} }}</h3>
                                        </div>

                                        <p class="m-0">{!! $sub_sec->{config('app.locale').'_desc'} !!}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif

                        @php $section7 = $section->where('section_no', 7)->where('status', 1)->first() @endphp
                        @if($section7)
                        <div class="mt-5">
                            <div class="mb-4">
                                <h2 class="fw-bold mb-3 h2-from-h3">{{ $section7->{config('app.locale').'_title'} }}</h2>
                                <div class="title_divider_dot"></div>
                                <p class="m-0">{!! $section7->{config('app.locale').'_desc'} !!}</p>
                            </div>
                            <div class="row ">
                                @foreach($section7->subSection as $sub_sec)
                                <div class="col-md-6">
                                    <h3 class="fw-bold mb-3 h3-from-h4">{{ $sub_sec->{config('app.locale').'_title'} }}</h3>
                                    <div class="title_divider_dot"></div>
                                    <p class="m-0">{!! $sub_sec->{config('app.locale').'_desc'} !!}</p>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                    <!-- <div class="mt-5">
                                <div
                                    class="uk-flex  uk-flex-middle uk-flex-between flex-wrap uk-margin-medium-bottom uk-background-muted p-3 uk-border-rounded ">
                                    <div class="platform-download-icon">
                                        <h6 class="fw-bold mb-0">Trade with cTrader Copy Trading Tool!</h6>
                                    </div>
                                    <a href="#" class="uk-button uk-button-dark uk-border-rounded mt-2 mt-sm-0 alignselfsm">{{__('message.download', [], config('app.locale'))}}</a>
                                </div>
                            </div> -->
                </div>

                @php $section8 = $section->where('section_no', 8)->where('status', 1)->first() @endphp
                @if($section8)
                <!-- <div class="ctrader_note_box mt-4">
                            <h5 class="fw-bold ">{{ $section8->{config('app.locale').'_title'} }}</h5>
                            {!! $section8->{config('app.locale').'_desc'} !!}
                        </div> -->
                <div class="in-profit-16">
                    <div class="in-create-account uk-text-left uk-margin-medium-top">
                        <span class="uk-label uk-text-small uk-text-uppercase uk-border-rounded uk-margin-small-bottom">{{ $section8->{config('app.locale').'_title'} }}</span>
                        {!! $section8->{config('app.locale').'_desc'} !!}
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
</div>

@endsection

@push('css')
<style>
    .h2-from-h3{
        font-size: 1.5rem;
    }
    .h3-from-h4{
        font-size: 1.25rem;
    }
    .h4-from-h5{
        font-size: 16px;
        margin-top: 0;
    }
</style>
@endpush