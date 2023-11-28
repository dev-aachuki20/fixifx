@php
$keywords_jp = 'FX,MT5,MetaTrader5,macOS,MacBook';
$description_jp = 'FiXi FX（フィクシー）が提供するMetaTrader5(MT5)のmacOS版に関するページです。';
@endphp

@extends('front.layouts.base')

@section('content')

<!-- Hero section  -->
<section class="reward-wrapper mtwindow-trade-wrapper whsection-text padding-tb-180 pb-0 d-flex flex-wrap align-items-center before-nonemob">
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
        <div class="fixi-features-herobox mt5-feature-hero ptb-50">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="side-by-side-img">
                        <img src="{{$section2 && $section2->image ? $section2->image : asset('fixifx/images/FiXi-Features.png')}}" alt="tradergo">
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 mt-5 mt-md-0">
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
        <div class="fixi-features-herobox fixi-Benefits-herobox ptb-50 mbd-20">
            <div class="row align-items-center">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="section-head text-white">
                        <h2 class="max-w-427 text-white">{{ $section4->{config('app.locale').'_title'} }}</h2>

                        {!! $section4->{config('app.locale').'_desc'} !!}
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6 mt-5 mt-md-0">
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
        <div class="risk-management-herobox mt5-riskinner ptb-50">
            <div class="row align-items-center">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="imgbox">
                        @if($section5->image)
                        <img class="img-fluid" src="{{ $section5->image ? $section5->image : asset('fixifx/images/Platforms-01.png') }}" alt="{{ config('app.locale') == 'ja' ? 'Meta Trader 5 (MT5) Windows版 - FiXi FX（フィクシー）' : 'Meta Trader 5 (MT5) Windows - FiXi FX' }}">
                        @endif
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6 mt-5 mt-md-0">
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



        <div class="fixi-system-requirements risk-management-herobox fixi-features-herobox ptb-50">

            <!-- FiXi MT5 System Requirements : -->
            @php $section8 = $section->where('section_no', 8)->where('status', 1)->first() @endphp
            @if($section8)
            <div class="system-requirements-inner mt5-inner-system">
                <div class="row">
                    <div class="col-12 col-md-4 col-lg-4">
                        <div class="img-box">
                            <img class="img-fluid" src="{{$section8->image ? $section8->image : asset('fixifx/images/platforms01.svg')}}" alt="">
                        </div>
                    </div>
                    <div class="col-12 col-md-8 col-lg-8">
                        <div class="contentbox">
                            <h4 class="mb-4">{{ $section8->{config('app.locale').'_title'} }}</h4>
                            {!! $section8->{config('app.locale').'_desc'} !!}
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <!--end FiXi MT5 System Requirements : -->

            @php $faqs = App\Models\Faq::where('page_id', 2)->get() @endphp
            @if($faqs->count() > 0)
            <div class="row  frequently-row-box justify-content-center pat-50">
                <div class="col-lg-12 col-md-12 col-sm-12 justify-content-center text-center">
                    <div class="text-center justify-content-center d-flex">
                        <h2 class="max-w-427 text-center">{{__('message.faq')}}</h2>
                    </div>
                </div>
                <div class="col-12 frequently-faq-list">
                    <div class="expert-content">
                        <div class="accordion" id="accordionfrequently">
                            @foreach($faqs as $index => $faq)
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#expert{{$index}}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" aria-controls="expert{{ $index }}">
                                        {{ $faq->{config('app.locale').'_question'} }}
                                    </button>
                                </h2>
                                <div id="expert{{ $index }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" data-bs-parent="#accordionfrequently">
                                    <div class="accordion-body">
                                        <div class="expert-inner-content">
                                            <div class="discription">
                                                <p> {!! $faq->{config('app.locale').'_answer'} !!}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @include('front.layouts.partials.get_started')


        </div>
        <!-- end  -->

        @include('front.layouts.partials.discover_other_platform')

    </div>
</section>
<!-- end  -->

<!-- Fixi’s OpenAPI Ready to get started? -->
@include('front.layouts.partials.explore_to_get_start')
<!-- end  -->

@endsection