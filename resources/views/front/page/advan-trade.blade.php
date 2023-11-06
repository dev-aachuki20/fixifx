@php
$keywords_jp = 'FX、外国為替取引、取引プラットフォーム、アドバントレード';
$description_jp = 'FiXi FX（フィクシー）が提供するcTrader(Android版)に関するページです。';
@endphp

@extends('front.layouts.base')

@section('content')

<!-- Hero section  -->
<section class="reward-wrapper advan-trade-wrapper whsection-text padding-tb-180 pb-0 d-flex flex-wrap align-items-center">
    <div class="container">
        <div class="advan-trade-herobox">
            <div class="row align-items-center justify-content-center">
                @php $header = $section->where('section_no', 1)->first() @endphp
                @if($header)
                <div class="col-12 col-md-12 col-sm-12 text-center">
                    <h6>
                        {{__('message.fiXi_advanTrade')}}
                    </h6>
                    <h1>{{ $header->{config('app.locale').'_title'} }}</h1>
                    <div class="openAi-btn d-flex align-items-center justify-content-center">
                        <a href="javascript:void();" class="custom-btn fill-btn-1">{{__('message.preview_platform_btn')}}</a>
                        <a href="{{ getSettingValue('live_link') }}" class="custom-btn fill-btn">{{__('message.open_account_btn')}}</a>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-sm-12 text-center">
                    <div class="video-banner">
                        <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#videoplay">
                            <img class="img-fluid" src="{{$header && $header->image ? $header->image : asset('fixifx/images/video-banner.svg')}}" alt="">
                        </a>
                    </div>
                </div>
                @endif

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
                    @foreach($section2->subSection as $sub_sec_index => $sub_sec)
                    @if($sub_sec->status == 1)
                    <div class="expert-content accordion-icon-small">
                        <div class="accordion" id="accordionexpert">
                            {!! $sub_sec->{config('app.locale').'_desc'} !!}
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
        @endif
        <!-- end FiXi MT5 Features -->


        <!-- benefits -->
        @php $section3 = $section->where('section_no', 3)->where('status', 1)->first() @endphp
        @if($section3)
        <div class="fixi-features-herobox fixi-Benefits-herobox">
            <div class="row align-items-center">
                <div class="col-lg-6 col-sm-12">
                    <div class="section-head text-white">
                        <h2 class="max-w-427 text-white">{{ $section3->{config('app.locale').'_title'} }}</h2>
                        {!! $section3->{config('app.locale').'_desc'} !!}
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div class="side-by-side-img">
                        <img src="{{$section3->image ? $section3->image : asset('fixifx/images/laptop.png')}}" alt="laptop">
                    </div>
                </div>
            </div>
        </div>
        @endif
        <!-- end benefits -->

        <!-- risk section -->
        @php $section4 = $section->where('section_no', 4)->where('status', 1)->first() @endphp
        @if($section4)
        <div class="risk-management-herobox">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-7 col-md-7 col-sm-12 justify-content-center">
                    <div class="expert-support-head text-center">
                        <h2 class="max-w-427">{{ $section4->{config('app.locale').'_title'} }}</h2>
                        <div class="discription">
                            <p>{!! $section4->{config('app.locale').'_desc'} !!}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row risk-management-gridbox">
                @foreach($section4->subSection as $sub_sec_index => $sub_sec)
                @if($sub_sec->status == 1 && $sub_sec_index < 6) <div class="col-12 col-md-6 col-lg-4">
                    <div class="grid-management-box">
                        <div class="iconbox">
                            <img class="img-fluid" src="{{$sub_sec->image ? $sub_sec->image : asset('fixifx/images/Innovative-icon01.svg')}}" alt="">
                        </div>
                        <div class="title">
                            <h4>
                                {{ $sub_sec->{config('app.locale').'_title'} }}
                            </h4>
                        </div>
                        <div class="discription">
                            <p>{{ $sub_sec->{config('app.locale').'_desc'} }}</p>
                        </div>
                    </div>
            </div>
            @endif
            @endforeach
        </div>


        <div class="risk-management-footer">
            @foreach($section4->subSection as $sub_sec_index => $sub_sec)
            @if($sub_sec->status == 1 && $sub_sec_index == 6)
            <div class="discription text-center">
                <p>{!! $sub_sec->{config('app.locale').'_desc'} !!}</p>
            </div>
            @endif
            @endforeach
            <div class="button-group justify-content-center">
                <a href="#" class="custom-btn fill-btn-1 text-white">{{__('message.preview_platform_btn')}}</a>
                <a href="{{ getSettingValue('live_link') }}" class="custom-btn fill-btn text-white">{{__('message.open_account_btn')}}</a>
            </div>
        </div>
    </div>
    @endif
    <!-- end  -->


    <!-- dummy section Discover the full FixiFx offering-->
    @php $section5 = $section->where('section_no', 5)->where('status', 1)->first() @endphp
    @if($section5)
    <div class="dummy-box-herobox risk-management-herobox fixi-features-herobox">
        <div class="row">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-sm-12">
                    <div class="section-head text-center">
                        <h2 class="max-w-427">{{ $section5->{config('app.locale').'_title'} }}</h2>
                        <div class="discription">
                            <p>{!! $section5->{config('app.locale').'_desc'} !!}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-gap-24">
                @foreach($section5->subSection as $sub_sec_index => $sub_sec)
                @if($sub_sec->status == 1)
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="dummy-box">
                        <div class="iconbox">
                            <img class="img-fluid" src="{{$sub_sec->image ? $sub_sec->image : asset('fixifx/images/Innovative-icon04.svg')}}" alt="">
                        </div>
                        <div class="title">
                            <h4>
                                {{ $sub_sec->{config('app.locale').'_title'} }}
                            </h4>
                        </div>
                        <div class="discription">
                            <p>{!! $sub_sec->{config('app.locale').'_desc'} !!}</p>
                        </div>
                        <a href="#" class="custom-btn fill-btn text-white">{{__('message.read_more')}}</a>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>

        @include('front.common.mt4_faq')

    </div>
    @endif
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