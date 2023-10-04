@php
    $keywords_jp = 'FiXi FX,フィクシー,友達紹介,紹介報酬';
    $description_jp = 'FiXi FX（フィクシー）に友人、同僚、または家族をご紹介いただくと、最大100万円の紹介報酬を受け取ることができます。';
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
                    <div class="inner-features-wrap">
                        <div class="uk-first-column">
                            @php isset($section) ? $section2 = $section->where('section_no', 2)->first() : '' @endphp
                            @if($section2)
                            <h3 class="">{{ $section2->{config('app.locale').'_title'} }}</h3>
                            <div class="title_divider_dot"></div>
                            {!! $section2->{config('app.locale').'_desc'} !!}
                            <div class="uk-margin-medium-top company_profile_wrapper pt-2" uk-slider="autoplay: true; autoplay-interval: 3000">
                                @if(count($section2->subSection))
                                <div class="uk-slider-items uk-child-width-1-2@s uk-child-width-1-2@m uk-grid-small uk-grid">
                                    @foreach($section2->subSection as $sub_sec)
                                    <div>
                                        <div class="custom_box custom_box_shadow d-flex flex-column mb-2 uk-text-center uk-text-left@s">
                                            <div class="uk-margin-right circle medium flex-shrink-0">
                                                <img class="uk-align-center mb-0" src="{{ $sub_sec->image }}" alt="{{ config('app.locale') == 'ja' ? 'FiXi FX（フィクシー） - 紹介報酬' : 'FiXi FX - refer a friend' }}" loading="lazy">
                                            </div>
                                            <h4 class="mt-3 mb-2 uk-text-center" style="word-break: break-word">
                                                {{ $sub_sec->{config('app.locale').'_title'} }}
                                            </h4>
                                            <p class="mb-0">
                                                {!! $sub_sec->{config('app.locale').'_desc'} !!}
                                            </p>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="uk_slider_nav">
                                    <ul class=" uk-slider-nav uk-dotnav"></ul>
                                </div>
                                @endif
                            </div>
                            @endif
                            
                            @php isset($section) ? $section3 = $section->where('section_no', 3)->first() : '' @endphp

                            @if($section3)
                            <div class="benefits_trading_section uk-margin-large-bottom uk-margin-large-top">
                                <div class="row mb-4 ">
                                    <div class="col-md-6">
                                        <div class="image">
                                            <img src="{{ $section3->image }}" class="img-fluid uk-width-100" alt="{{ config('app.locale') == 'ja' ? 'FiXi FX（フィクシー） - 紹介報酬' : 'FiXi FX - refer a friend' }}" loading="lazy">

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="list_style_timeline">
                                            <div class="title_flex_item d-block mb-3">
                                                <h3 >{{ $section3->{config('app.locale').'_title'} }}</h3>
                                                <div class="title_divider_dot"></div>
                                            </div>
                                            <p class="m-0 mb-4"> {!! $section3->{config('app.locale').'_desc'} !!}</p>
                                            @if($section3->{config('app.locale').'_short_text'} && $section3->video_url) 
                                            <a href="{{$section3->getRawOriginal('video_url')}}" target="_blank" class="uk-button uk-button-primary uk-border-rounded mt-2 mt-sm-0">{{ $section3->{config('app.locale').'_short_text'} }}</a>
                                            @endif
                                         </div>
                                    </div>
                                </div>
                            </div>
                            @endif

                            @php isset($section) ? $section4 = $section->where('section_no', 4)->first() : '' @endphp
                            @if($section4)
                            <div class="mb-3">
                                <h3 class="">{{ $section4->{config('app.locale').'_title'} }}</h3>
                                <div class="title_divider_dot"></div>
                            </div>
                            {!! $section4->{config('app.locale').'_desc'} !!}
                            @if(count($section4->subSection))
                            <div class="row company_profile_wrapper">
                            @foreach($section4->subSection as $sub_sec)
                            <div class="col-lg-3 col-sm-6">
                                <div class="custom_box custom_box_shadow">
                                    <div class="main_title d-block uk-text-center">
                                        <div class="icon mb-3">
                                            <img src="{{ $sub_sec->image }}" class="img-fluid" alt="" loading="lazy" />
                                        </div>
                                        <p class="fw-bold m-0 p-from-h6">{{ $sub_sec->{config('app.locale').'_title'} }}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            </div>
                            @endif
                            @endif
                        </div>
                        @include('front.common.talk_to_us')

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('css')
<style>
    .p-from-h6{
        font-size: .875rem;
        font-weight: 700;
        line-height: 1.2;
        color: #001e32;
    }
</style>
@endpush