@php
$keywords_jp = 'FX、外国為替取引、取引プラットフォーム、アドバントレード';
$description_jp = 'FiXi FX（フィクシー）が提供するcTrader(Android版)に関するページです。';
@endphp

@extends('front.layouts.base')

@section('content')

<!-- Hero section  -->
<section class="reward-wrapper advan-trade-wrapper whsection-text padding-tb-180 pb-0 d-flex flex-wrap align-items-center before-nonemob">
    <div class="container">
        <div class="advan-trade-herobox pbottom-50">
            <div class="row align-items-center justify-content-center">
                @php $header = $section->where('section_no', 1)->first();
                $sectionEnLink1 = $header ? json_decode($header->en_link) : null;
                $sectionJaLink1 = $header ? json_decode($header->ja_link) : null;
                @endphp
                @if($header)
                <div class="col-12 col-md-12 col-sm-12 text-center">
                    <h6>
                        {{ $header->{config('app.locale').'_title'} }}
                    </h6>
                    <h1>{!! $header->{config('app.locale').'_desc'} !!}</h1>
                    <div class="openAi-btn d-flex align-items-center justify-content-center">
                        @if(config('app.locale') == 'en')
                        <a href="{{ isset($sectionEnLink1[0]) ? $sectionEnLink1[0] : '#' }}" class="custom-btn fill-btn-1">{{__('message.preview_platform_btn')}}</a>
                        @else
                        <a href="{{ isset($sectionJaLink1[1]) ? $sectionJaLink1[1] : '#' }}" class="custom-btn fill-btn-1">{{__('message.preview_platform_btn')}}</a>
                        @endif


                        <a href="{{ getSettingValue('live_link') }}" class="custom-btn fill-btn">{{__('message.open_account_btn')}}</a>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-sm-12 text-center">
                    <div class="video-banner advan-video-area">
                        <a href="javascript:void(0);">
                            <img class="img-fluid w-auto" src="{{$header && $header->image ? $header->image : asset('fixifx/images/advan-trade-lapp.png')}}" alt="">
                            <span class="vplay-icon" data-bs-toggle="modal" data-bs-target="#videoplay"><img src="{{asset('fixifx/images/play-icon.svg')}}" alt=""></span>
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
        <div class="fixi-features-herobox ptb-50">
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
        <div class="fixi-features-herobox fixi-Benefits-herobox border-top-0 ptb-50 after-nonemob">
            <div class="row align-items-center">
                <div class="col-lg-6 col-sm-12">
                    <div class="section-head text-white mbd-20">
                        <h2 class="max-w-427 text-white">{{ $section3->{config('app.locale').'_title'} }}</h2>
                        {!! $section3->{config('app.locale').'_desc'} !!}
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12 mt-5 mt-md-0">
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
        <div class="risk-management-herobox ptb-50">
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
                            <p>{!! $sub_sec->{config('app.locale').'_desc'} !!}</p>
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
                @if(config('app.locale') == 'en')
                <a href="{{isset($sub_sec->en_link) ? $sub_sec->en_link : '#'}}" target="_blank" class="custom-btn fill-btn-1 text-white">{{__('message.preview_platform_btn')}}</a>
                @else
                <a href="{{isset($sub_sec->ja_link) ? $sub_sec->ja_link : '#'}}" target="_blank" class="custom-btn fill-btn-1 text-white">{{__('message.preview_platform_btn')}}</a>
                @endif
                <a href="{{ getSettingValue('live_link') }}" class="custom-btn fill-btn text-white">{{__('message.open_account_btn')}}</a>
            </div>
        </div>
    </div>
    @endif
    <!-- end  -->


    <!-- dummy section Discover the full FixiFx offering-->
    @php $section5 = $section->where('section_no', 5)->where('status', 1)->first() @endphp

    <div class="dummy-box-herobox risk-management-herobox fixi-features-herobox advan-discover pt-0 border-top-0 before-nonemob pbottom-50">
        @if($section5)
        <div class="row justify-content-center padding-tb-100 pb-0 pat-50">
            <div class="col-lg-8 col-sm-12">
                <div class="section-head text-center">
                    <h2 class="max-w-427">{{ $section5->{config('app.locale').'_title'} }}</h2>
                    <div class="discription">
                        <p>{!! $section5->{config('app.locale').'_desc'} !!}</p>
                    </div>
                </div>
            </div>
            <div class="w-100"></div>
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
                    @if(config('app.locale') == 'en')
                    <a href="{{isset($sub_sec->en_link) ? $sub_sec->en_link : '#'}}" class="custom-btn fill-btn text-white">{{__('message.read_more')}}</a>
                    @else
                    <a href="{{isset($sub_sec->ja_link) ? $sub_sec->ja_link : '#'}}" class="custom-btn fill-btn text-white">{{__('message.read_more')}}</a>
                    @endif
                </div>
            </div>
            @endif
            @endforeach
        </div>
        @endif

        @php $faqs = App\Models\Faq::where('page_id', 49)->get() @endphp
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
                                            <p>{!! $faq->{config('app.locale').'_answer'} !!}</p>
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

    </div>

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

<!-- Modal -->
<div class="modal fade videoplay-modal" id="videoplay" tabindex="-1" aria-labelledby="videoplay" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="25" height="25" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M18 6l-12 12" />
                    <path d="M6 6l12 12" />
                </svg>
            </button>
            <div class="modal-body">
                <div class="video-container">
                    <!-- __BLOCK__ -->
                    <video controls autoplay id="video1 modal_video">
                        <source src="{{$header->video_url ?? ''}}" type="video/mp4">
                    </video>

                    <!-- __ENDBLOCK__ -->

                </div>
            </div>
        </div>
    </div>
</div>

@endsection