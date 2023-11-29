@php
$keywords_jp = 'FX、サポート、サービス、vps サービス';
$description_jp = 'FiXi FX（フィクシー）が提供するcTrader(Android版)に関するページです。';
@endphp

@extends('front.layouts.base')

@section('content')

{{-- @include('front.layouts.partials.common_hero') --}}

<!-- Hero section  -->
<section class="reward-wrapper padding-tb-180 d-flex flex-wrap align-items-center before-nonemob pbottom-50">
    <div class="container">
        @php $section1 = $section->where('section_no', 1)->where('status', 1)->first() @endphp
        @if($section1)
        <div class="reward-wrapper-herobox">
            <div class="row">
                <div class="col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="other-banner-text">
                        <h1>{{ $section1->{config('app.locale').'_title'} }}</h1>
                        <div class="section-head">
                            <p>{!! $section1->{config('app.locale').'_desc'} !!}</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="video-banner advan-video-area text-center">
                        <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#videoplay">
                            <img class="img-fluid w-auto" src="{{$section1 && $section1->image ? $section1->image : asset('fixifx/images/reward-top-img.png')}}" alt="">
                            <span class="vplay-icon" data-bs-toggle="modal" data-bs-target="#videoplay"><img src="{{asset('fixifx/images/play-icon.svg')}}" alt=""></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <!-- end  -->

        <!-- Better prices  -->
        <div class="better-prices-wrapper padding-tb-100 pb-0 ptop-50 reward-trade-acc-field">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-sm-12">
                    <div class="section-head text-center">
                        <h2 class="max-w-427">{{ getSettingValue('rewards_main_title_'.config('app.locale')) }}</h2>
                        <div class="discription">
                            <p>{{ getSettingValue('rewards_main_header_'.config('app.locale')) }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-12">
                    <div class="trading-acc-list swiper new-trade-acc-area">
                        <div class="swiper-wrapper">
                        <div class="trading-acc-main swiper-slide">
                            <div class="funding_box">
                                <span>
                                    {{ getSettingValue('rewards_funding_classic_title_'.config('app.locale')) }}
                                    <!-- Minimum initial funding*: USD 2,000 -->
                                </span>
                            </div>
                            <div class="divider-box"></div>
                            <div class="trading-icon">
                                <img src="{{asset('fixifx/images/prices-icon01.svg')}}" alt="standard">
                            </div>
                            <div class="package-name">
                                <div class="package-name-bg">{{__('message.classic')}}</div>
                            </div>
                            <div class="showMore-wrapper textDetails showDetails-height">
                                <div class="discription text-center">
                                    <p>{{ getSettingValue('classic_header_'.config('app.locale')) }}</p>
                                </div>
                                <div class="package-list-details">
                                    <ul>
                                        @for($i=1; $i<=7; $i++) @if(getSettingValue('classic_title_'.config('app.locale').'_'.$i)) <li> {{getSettingValue('classic_title_'.config('app.locale').'_'.$i)}}
                                            </li>
                                            @endif
                                            @endfor
                                    </ul>
                                </div>
                            </div>
                            <a href="javascript:void(0)" class="showDetails-more">{{__('message.show_more')}}</a>
                        </div>

                        <div class="trading-acc-main swiper-slide">
                            <div class="funding_box">
                                <span>
                                    {{ getSettingValue('rewards_funding_advance_title_'.config('app.locale')) }}
                                    <!-- Minimum initial funding*: USD 2,000 -->
                                </span>
                            </div>
                            <div class="divider-box"></div>
                            <div class="trading-icon">
                                <img src="{{asset('fixifx/images/prices-icon03.svg')}}" alt="standard">
                            </div>
                            <div class="package-name">
                                <div class="package-name-bg">{{__('message.advance')}}</div>
                            </div>
                            <div class="showMore-wrapper textDetails showDetails-height">
                                <div class="discription text-center">
                                    <p>{{ getSettingValue('advance_header_'.config('app.locale')) }}</p>
                                </div>
                                <div class="package-list-details">
                                    <ul>
                                        @for($i=1; $i<=7; $i++) @if(getSettingValue('advance_title_'.config('app.locale').'_'.$i)) <li> {{getSettingValue('advance_title_'.config('app.locale').'_'.$i)}}
                                            </li>
                                            @endif
                                            @endfor
                                    </ul>
                                </div>
                            </div>
                            <a href="javascript:void(0)" class="showDetails-more">{{__('message.show_more')}}</a>
                        </div>


                        <div class="trading-acc-main swiper-slide">
                            <div class="funding_box">
                                <span>
                                    {{ getSettingValue('rewards_funding_elite_title_'.config('app.locale')) }}
                                    <!-- Minimum initial funding*: USD 2,000 -->
                                </span>
                            </div>
                            <div class="divider-box"></div>
                            <div class="trading-icon">
                                <img src="{{asset('fixifx/images/prices-icon02.svg')}}" alt="standard">
                            </div>
                            <div class="package-name">
                                <div class="package-name-bg">{{__('message.elite')}}</div>
                            </div>
                            <div class="showMore-wrapper textDetails showDetails-height">
                                <div class="discription text-center">
                                    <p>{{ getSettingValue('elite_header_'.config('app.locale')) }}</p>
                                </div>
                                <div class="package-list-details">
                                    <ul>
                                        @for($i=1; $i<=7; $i++) @if(getSettingValue('elite_title_'.config('app.locale').'_'.$i)) <li> {{getSettingValue('elite_title_'.config('app.locale').'_'.$i)}}
                                            </li>
                                            @endif
                                            @endfor
                                    </ul>
                                </div>
                                <div class="vip-text">
                                    <span>
                                        {{__('message.prestigious_vip_network')}}
                                    </span>
                                </div>
                            </div>
                            <a href="javascript:void(0)" class="showDetails-more">{{__('message.show_more')}}</a>
                        </div>


                        <div class="trading-acc-main swiper-slide">
                            <div class="funding_box">
                                <span>
                                    {{ getSettingValue('rewards_funding_ambassador_title_'.config('app.locale')) }}
                                    <!-- Minimum initial funding*: USD 2,000 -->
                                </span>
                            </div>
                            <div class="divider-box"></div>
                            <div class="trading-icon">
                                <img src="{{asset('fixifx/images/prices-icon04.svg')}}" alt="standard">
                            </div>
                            <div class="package-name">
                                <div class="package-name-bg">{{__('message.ambassador')}}</div>
                            </div>
                            <div class="showMore-wrapper textDetails showDetails-height">
                                <div class="discription text-center">
                                    <p>{{ getSettingValue('ambassador_header_'.config('app.locale')) }}</p>
                                </div>
                                <div class="package-list-details">
                                    <ul>
                                        @for($i=1; $i<=7; $i++) @if(getSettingValue('ambassador_title_'.config('app.locale').'_'.$i)) <li> {{getSettingValue('ambassador_title_'.config('app.locale').'_'.$i)}}
                                            </li>
                                            @endif
                                            @endfor
                                    </ul>
                                </div>
                                <div class="vip-text">
                                    <span>
                                        {{__('message.prestigious_vip_network')}}
                                    </span>
                                </div>
                            </div>
                            <a href="javascript:void(0)" class="showDetails-more">{{__('message.show_more')}}</a>
                        </div>
                        </div>
                        <div class="swiper-pagination"></div>
                        <div class="slider-arrows package-arrows">
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>
                <div class="col-12 sub-title-text">
                    <div class="discription">
                        <p>
                            {{ getSettingValue('rewards_note_'.config('app.locale')) }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Better prices  -->
    </div>
</section>

<!-- end  -->

<!-- Worth Rewarding  -->

@php $section2 = $section->where('section_no', 2)->where('status', 1)->first() @endphp
@if($section2)
<section class="worth-rewarding-wrapper saxo-offering-sec bg-white padding-top-120 padding-bottom-240 mb-120" style="background-image:url({{asset('fixifx/images/bg-glob-1.svg')}});background-repeat: no-repeat; background-position: bottom left;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-md-6 col-xl-6">
                <div class="leftProudly_box">
                    <div class="title">
                        <h6>{{ $section2->{config('app.locale').'_title'} }}</h6>
                        <h2>
                            {!! $section2->{config('app.locale').'_short_text'} !!}
                        </h2>
                    </div>
                    <p>{!! $section2->{config('app.locale').'_desc'} !!}</p>
                </div>
            </div>
            <div class="col-12 col-md-6 col-xl-6">
                <div class="worth-rewarding-grid">
                    <div class="reward-listing">
                        @foreach($section2->subSection as $sub_sec_index => $sub_sec)
                        @if($sub_sec->status == 1)
                        <div class="reward-grid-items">
                            <div class="reward-icon lightb-bg lg-cion">
                                <img src="{{$sub_sec->image ? $sub_sec->image : asset('fixifx/images/prices-icon04.svg')}}" alt="">
                            </div>
                            <div class="reward-count">
                                <h5>
                                    {{ $sub_sec->{config('app.locale').'_title'} }}
                                </h5>
                            </div>
                            <div class="reward-text">
                                <span>
                                    {!! $sub_sec->{config('app.locale').'_desc'} !!}
                                </span>
                            </div>
                        </div>
                        @endif
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
<!-- End  Worth Rewarding -->

<!-- Move Between Tiers -->
<section class="between-trade-wrapper padding-top-120 padding-bottom-120 bg-snow-drift">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-xl-6 order-1 order-lg-0">
                <div class="table-trade">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>
                                    {{__('message.trade')}}
                                </th>
                                <th>
                                    {{__('message.volume')}}
                                </th>
                                <th>
                                    {{__('message.points')}}
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rewards as $reward)
                            <tr>
                                <td>
                                    <div class="trade-listing d-flex">
                                        <div class="icon">
                                            <img class="img-fluid" src="{{ $reward && $reward->image ? asset('fixifx/images/reward/'.$reward->image) : asset('fixifx/images/x-coin.svg')}}" alt="" style="width: 25px; height: auto;">
                                        </div>
                                        <div class="trade-name">
                                            {{$reward->trade}}
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    {{$reward->volume}}
                                </td>
                                <td>
                                    {{$reward->points}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>

            @php $section3 = $section->where('section_no', 3)->where('status', 1)->first();
            $sectionEnLink3 = $section3 ? json_decode($section3->en_link) : null;
            $sectionJaLink3 = $section3 ? json_decode($section3->ja_link) : null;
            @endphp
            @if($section3)
            <div class="col-12  col-md-6 col-xl-6">
                <div class="auto-content">
                    <div class="auto-fixi-title">
                        <h2>
                            {{ $section3->{config('app.locale').'_title'} }}
                        </h2>
                    </div>
                    <div class="auto-fixi-text">
                        <p>
                            {!! $section3->{config('app.locale').'_desc'} !!}
                        </p>
                    </div>

                    @if(config('app.locale') == 'en')
                    <div class="read-more-btn">
                        <a href="{{ isset($sectionEnLink3[0]) ? $sectionEnLink3[0] : '#' }}" target="_blank" class="custom-btn fill-btn">{{__('message.See_the_full_point_catalogue')}}</a>
                    </div>
                    @else
                    <div class="read-more-btn">
                        <a href="{{ isset($sectionJaLink3[0]) ? $sectionJaLink3[0] : '#' }}" target="_blank" class="custom-btn fill-btn">{{__('message.See_the_full_point_catalogue')}}</a>
                    </div>
                    @endif





                </div>
            </div>
            @endif

        </div>
    </div>
</section>
<!-- End Move Between Tiers -->

<!-- faq-sub-page  -->
@php $faqs = App\Models\Faq::where('page_id', 52)->get() @endphp
@if($faqs->count() > 0)
@php $section5 = $section->where('section_no', 5)->where('status', 1)->first() @endphp
@if($section5)
<section class="faq-sub-page reward-faqs padding-top-120 padding-bottom-120 ptb-50">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-12 col-xl-7 align-items-center justify-content-center text-center pb-2 pb-lg-5">
                <div class="title">
                    <h2>
                        {{ $section5->{config('app.locale').'_title'} }}
                    </h2>
                </div>
                <div class="description">
                    <p>
                        {!! $section5->{config('app.locale').'_desc'} !!}</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="faqTab-content p-0">

                    @php $faqData = App\Models\Faq::where('page_id', 52)->get() @endphp
                    @if($faqData->count() > 0)
                    <div class="accordion faqAccordion" id="accordionExample">
                        @foreach($faqData as $index => $faqItem)
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button {{ $index === 0 ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $index }}">
                                    <img class="img-fluid" src="{{asset('fixifx/images/faq-q.svg')}}" alt="">
                                    {{ ucwords($faqItem->{config('app.locale').'_question'}) }}
                                </button>
                            </h2>
                            <div id="collapse{{ $index }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="description">
                                        {!! ucwords($faqItem->{config('app.locale').'_answer'}) !!}
                                    </div>
                                    @include('front.layouts.partials.social_share')
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</section>
@endif
@endif
<!-- end faq-sub-page  -->

<!-- Get Started  -->
@php $section4 = $section->where('section_no', 4)->where('status', 1)->first() @endphp
@if($section4)
<section class="get-started-sec padding-tb-120 pt-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-sm-12">
                <div class="section-head text-center mbd-20">
                    <h2>{{ $section4->{config('app.locale').'_title'} }}</h2>
                    <div class="discription">
                        <p>{!! $section4->{config('app.locale').'_desc'} !!}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-gap-24">
            <div class="col-lg-12 col-12">
                <div class="get-started-new-grid">
                    @foreach($section4->subSection as $sub_sec_index => $sub_sec)
                    @if($sub_sec->status == 1)
                    <div class="started-items">
                        <div class="count-number">
                            <span>
                                {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                            </span>
                        </div>
                        <div class="sub-title">
                            <h5>
                                {{ $sub_sec->{config('app.locale').'_title'} }}
                            </h5>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif
<!-- End  -->


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
                    <video controls autoplay id="video1">
                        <source src="{{$section1->video_url ?? ''}}" type="video/mp4">
                    </video>

                    <!-- __ENDBLOCK__ -->

                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('javascript')
@parent
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