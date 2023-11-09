@php
$keywords_jp = 'FX,フィクシー,cTrader,iPhone,iPad';
$description_jp = 'FiXi FX（フィクシー）が提供するcTrader(iOS版･iPhone･iPad)に関するページです。';
@endphp

@extends('front.layouts.base')

@section('content')

<!-- Hero section  -->
<section class="reward-wrapper cTrader-ios mt5-android-trade-wrapper whsection-text padding-tb-180 pb-0 d-flex flex-wrap align-items-center ctrader-top-hero top-bg-image before-nonemob">
    <div class="container">
        <div class="advan-trade-herobox cTrader-ios-trade-herobox ctrader-newtop space-bottom-100 discover-next-border">
            <div class="row align-items-center justify-content-center">

                <!-- main heading and desc  -->
                @include('front.common.sub_header')
                @include('front.common.download_section')


                @php $section2 = $section->where('section_no', 2)->where('status', 1)->first() @endphp
                @if($section2)
                <div class="col-12">
                    <div class="system-requirements-inner mb-0 mspace-top-100">

                        <div class="row">
                            <div class="col-12 col-md-4 col-lg-4">
                                <div class="img-box">
                                    <img class="img-fluid" src="{{$section2->image ? $section2->image : asset('fixifx/images/iphone.png')}}" alt="{{ config('app.locale') == 'ja' ? 'cTraderコピートレード可能な海外FX業者 - FiXi FX（フィクシー）' : 'cTrader - FiXi FX' }}">
                                </div>
                            </div>
                            <div class="col-12 col-md-8 col-lg-8">
                                <div class="contentbox section-head icon-position">
                                    <h4>{{ $section2->{config('app.locale').'_title'} }}</h4>
                                    {!! $section2->{config('app.locale').'_desc'} !!}

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                @endif
            </div>
        </div>
        <!-- end  -->

        @php $section3 = $section->where('section_no', 3)->where('status', 1)->first() @endphp
        @if($section3)
        <div class="fixi-features-herobox ptb-50 border-bottom-0 discover-next-border">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="side-by-side-img">
                        <img src="{{$section3->image ? $section3->image : asset('fixifx/images/FiXi-Features.png')}}" alt="tradergo">
                    </div>
                </div>

                <div class="col-lg-8 col-md-8 col-sm-12 mt-5 mt-md-0">
                    <div class="expert-support-head">
                        <h2 class="max-w-427">{{ $section3->{config('app.locale').'_title'} }}</h2>
                        <div class="discription Psize-14">
                            <p>
                                {!! $section3->{config('app.locale').'_desc'} !!}
                            </p>
                        </div>
                    </div>
                    @foreach($section3->subSection as $sub_sec_index => $sub_sec)
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
        <!-- end  -->

        <!-- benfits -->
        @php $section7 = $section->where('section_no', 7)->where('status', 1)->first() @endphp
        @if($section7)
        <div class="fixi-features-herobox fixi-Benefits-herobox cTrader-ios-trade-herobox ptb-50 ctrader-sys-inner border-bottom-0 discover-next-border">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="section-head text-white mbd-20">
                        <h2 class="max-w-427 text-white">
                            {{ $section7->{config('app.locale').'_title'} }}
                        </h2>
                        {!! $section7->{config('app.locale').'_desc'} !!}
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 mt-5 mt-md-0">
                    <div class="side-by-side-img">
                        <img src="{{$section7->image ? $section7->image : asset('fixifx/images/iphone.png')}}" alt="laptop">
                    </div>
                </div>
            </div>
        </div>
        @endif
        @php $section5 = $section->where('section_no', 5)->where('status', 1)->first() @endphp
        @if($section5)
        <div class="fixi-features-herobox cTrader-ios-trade-herobox pbottom-50 ctrader-sys-inner border-0 before-none pt-0 discover-next-border">
            <div class="row">
                <div class="col-12">
                    <div class="system-requirements-inner m-0">
                        <div class="row align-items-center">

                            <div class="col-12 col-md-4 col-lg-4">
                                <div class="img-box">
                                    @if($section5->image)
                                    <img class="img-fluid" src="{{$section5->image ? $section5->image : asset('fixifx/images/platforms01.png')}}" alt="">
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 col-md-8 col-lg-8">
                                <div class="contentbox section-head icon-position">
                                    <h4>{{ $section5->{config('app.locale').'_title'} }}</h4>
                                    {!! $section5->{config('app.locale').'_desc'} !!}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <!-- end  -->

        @include('front.layouts.partials.discover_other_platform')

        <!-- end  -->

        <div class="frequently-row-box fixi-features-herobox pbottom-50 pt-0">
            @php $faqs = App\Models\Faq::where('page_id', 39)->get() @endphp
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