@php
$keywords_jp = 'FX、サポート、サービス、vps サービス';
$description_jp = 'FiXi FX（フィクシー）が提供するcTrader(Android版)に関するページです。';
@endphp

@extends('front.layouts.base')

@section('content')

@include('front.layouts.partials.common_hero')
@php $section1 = $section->where('section_no', 1)->where('status', 1)->first();
$sectionEnLink1 = $section1 ? json_decode($section1->en_link) : null;
$sectionJaLink1 = $section1 ? json_decode($section1->ja_link) : null;
@endphp
@if($section1)
<section class="bg-white side-by-side padding-tb-120 fiXiTrader_box">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-sm-12">
                <div class="section-head">
                    <h2 class="max-w-427">{{ $section1->{config('app.locale').'_title'} }}</h2>
                    <div class="discription">
                        <p>{!! $section1->{config('app.locale').'_short_text'} !!}</p>
                    </div>
                    <div class="section-list">
                        <p>{!! $section1->{config('app.locale').'_desc'} !!}</p>
                    </div>

                    @if(config('app.locale') == 'en')
                    <div class="button-group">
                        <a href="{{ isset($sectionEnLink1[0]) ? $sectionEnLink1[0] : '#' }}" target="_blank" class="custom-btn fill-btn-1">{{__('message.learn_more_btn')}}</a>
                        <a href="{{ isset($sectionEnLink1[1]) ? $sectionEnLink1[1] : '#' }}" target="_blank" class="custom-btn fill-btn">{{__('message.preview_btn')}}</a>
                    </div>
                    @else
                    <div class="button-group">
                        <a href="{{ isset($sectionJaLink1[0]) ? $sectionJaLink1[0] : '#' }}" target="_blank" class="custom-btn fill-btn-1">{{__('message.learn_more_btn')}}</a>
                        <a href="{{ isset($sectionJaLink1[1]) ? $sectionJaLink1[1] : '#' }}" target="_blank" class="custom-btn fill-btn">{{__('message.preview_btn')}}</a>
                    </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="side-by-side-img">
                    <img src="{{$section1 && $section1->image ? $section1->image : asset('fixifx/images/tradergo.png')}}" alt="tradergo">
                </div>
            </div>
        </div>
    </div>
</section>
@endif

@php $section2 = $section->where('section_no', 2)->where('status', 1)->first();
$sectionEnLink2 = $section2 ? json_decode($section2->en_link) : null;
$sectionJaLink2 = $section2 ? json_decode($section2->ja_link) : null;
@endphp
@if($section2)
<section class="bg-gradient-dark side-by-side padding-tb-120 fiXiTrader_box2">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-sm-12">
                <div class="side-by-side-img">
                    <img src="{{$section2 && $section2->image ? $section2->image : asset('fixifx/images/tradergo.png')}}" alt="laptop">
                </div>
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="section-head text-white">
                    <h2 class="max-w-427 text-white">{{ $section2->{config('app.locale').'_title'} }}</h2>
                    <div class="discription">
                        <p>{!! $section2->{config('app.locale').'_short_text'} !!}</p>
                    </div>
                    <div class="section-list">
                        <p>{!! $section2->{config('app.locale').'_desc'} !!}</p>
                    </div>

                    @if(config('app.locale') == 'en')
                    <div class="button-group">
                        <a href="{{ isset($sectionEnLink2[0]) ? $sectionEnLink2[0] : '#' }}" target="_blank" class="custom-btn fill-btn-1 text-white">{{__('message.learn_more_btn')}}</a>
                        <a href="{{ isset($sectionEnLink2[1]) ? $sectionEnLink2[1] : '#' }}" target="_blank" class="custom-btn fill-btn text-white">{{__('message.preview_btn')}}</a>
                    </div>
                    @else
                    <div class="button-group">
                        <a href="{{ isset($sectionJaLink2[0]) ? $sectionJaLink2[0] : '#' }}" target="_blank" class="custom-btn fill-btn-1 text-white">{{__('message.learn_more_btn')}}</a>
                        <a href="{{ isset($sectionJaLink2[1]) ? $sectionJaLink2[1] : '#' }}" target="_blank" class="custom-btn fill-btn text-white">{{__('message.preview_btn')}}</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endif

@php $section3 = $section->where('section_no', 3)->where('status', 1)->first();
$sectionEnLink3 = $section3 ? json_decode($section3->en_link) : null;
$sectionJaLink3 = $section3 ? json_decode($section3->ja_link) : null;
@endphp
@if($section3)
<section class="bg-white side-by-side padding-tb-120 fiXiTrader_box" style="background-color: #F8F8F8 !important;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-sm-12">
                <div class="section-head">
                    <h2 class="max-w-427">{{ $section3->{config('app.locale').'_title'} }}</h2>
                    <div class="discription">
                        <p>{!! $section3->{config('app.locale').'_short_text'} !!}</p>
                    </div>
                    <div class="section-list">
                        <p>{!! $section3->{config('app.locale').'_desc'} !!}</p>
                    </div>
                    @if(config('app.locale') == 'en')
                    <div class="button-group">
                        <a href="{{ isset($sectionEnLink3[0]) ? $sectionEnLink3[0] : '#' }}" target="_blank" class="custom-btn fill-btn-1">{{__('message.learn_more_btn')}}</a>
                        <a href="{{ isset($sectionEnLink3[1]) ? $sectionEnLink3[1] : '#' }}" target="_blank" class="custom-btn fill-btn">{{__('message.preview_btn')}}</a>
                    </div>
                    @else
                    <div class="button-group">
                        <a href="{{ isset($sectionJaLink3[0]) ? $sectionJaLink3[0] : '#' }}" target="_blank" class="custom-btn fill-btn-1">{{__('message.learn_more_btn')}}</a>
                        <a href="{{ isset($sectionJaLink3[1]) ? $sectionJaLink3[1] : '#' }}" target="_blank" class="custom-btn fill-btn">{{__('message.preview_btn')}}</a>
                    </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="side-by-side-img">
                    <img src="{{$section3 && $section3->image ? $section3->image : asset('fixifx/images/tradergo.png')}}" alt="tradergo">
                </div>
            </div>
        </div>
    </div>
</section>
@endif

@php $section4 = $section->where('section_no', 4)->where('status', 1)->first();

@endphp
@if($section4)
<section class="bg-white side-by-top padding-tb-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-sm-12">
                <div class="section-head text-center">
                    <h2 class="max-w-427">{{ $section4->{config('app.locale').'_title'} }}</h2>
                    <div class="discription">
                        <p>{!! $section4->{config('app.locale').'_desc'} !!}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-gap-24">
            @foreach($section4->subSection as $sub_sec_index => $sub_sec)
            @if($sub_sec->status == 1)
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="trading-tools-box">
                    <div class="trading-tool-img">
                        <img src="{{$sub_sec->image ? $sub_sec->image : asset('fixifx/images/laptop-small.png')}}" alt="laptop-small">
                    </div>
                    <div class="trading-tool-text">
                        <h3> {{ $sub_sec->{config('app.locale').'_title'} }}</h3>
                        <div class="discription">
                            <p>{!! $sub_sec->{config('app.locale').'_short_text'} !!}</p>
                        </div>
                        <div class="trading-list-box">
                            <p>{!! $sub_sec->{config('app.locale').'_desc'} !!}</p>
                        </div>
                        @if(config('app.locale') == 'en')
                        <div class="button-group">
                            <a href="{{isset($sub_sec->en_link) ? $sub_sec->en_link : '#'}}" class="custom-btn fill-btn">{{__('message.learn_more_btn')}}</a>
                        </div>
                        @else
                        <div class="button-group">
                            <a href="{{isset($sub_sec->ja_link) ? $sub_sec->ja_link : '#'}}" class="custom-btn fill-btn">{{__('message.learn_more_btn')}}</a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</section>
@endif

<section class="trading-acc-type trading-wrapper bg-light-gray padding-b-120 trading-acc-plat">
    @include('front.layouts.partials.types_trading_accounts')
</section>

@php $section5 = $section->where('section_no', 5)->where('status', 1)->first() @endphp
@if($section5)
<section class="saxo-offering-sec bg-white padding-t-120 padding-bottom-240 mb-120 platform-fixifx" style="background-image:url({{asset('fixifx/images/bg-glob-1.svg')}});background-repeat: no-repeat; background-position: bottom left;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-sm-12">
                <div class="section-head text-center mbd-20">
                    <h2 class="max-w-427"> {{ $section5->{config('app.locale').'_title'} }}</h2>
                    <div class="discription">
                        <p>{!! $section5->{config('app.locale').'_desc'} !!}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-gap-24">
            @foreach($section5->subSection as $sub_sec_index => $sub_sec)
            @if($sub_sec->status == 1)
            <div class="col-lg-3 col-md-6 col-12">
                <div class="saxo-offering-box">
                    <div class="saxo-offering-icon bg-light-gray">
                        <img src="{{$sub_sec->image ? $sub_sec->image : asset('fixifx/images/icons/icon-1.svg')}}" alt="icon-1">
                    </div>
                    <div class="saxo-offering-text text-center">
                        <h6> {{ $sub_sec->{config('app.locale').'_title'} }}</h6>
                        <div class="saxo-offering-dis">
                            <p> {!! $sub_sec->{config('app.locale').'_desc'} !!}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection


@section('javascript')
<script>
    $(document).ready(function() {
        $(".showDetails-more").click(function() {
            var $wrapper = $('.showMore-wrapper');
            if ($wrapper.hasClass("showDetails-height")) {
                $(".showDetails-more").text("{{__('message.show_less')}}");
            } else {
                $(".showDetails-more").text("{{__('message.show_more')}}");
            }
            $wrapper.toggleClass("showDetails-height");
        });
    });
</script>


@endsection