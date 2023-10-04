@php
    $keywords_jp = 'FiXi,FiXi FX,フィクシー,フィクシーFX';
    $description_jp = 'FiXi FX（フィクシー）の会社概要ページ。運営元FiXi Group Limitedや設立の背景、金融ライセンスについて記載しています。';
@endphp

@extends('front.layouts.master')

@section('content')

        @include('front.common.page_header')
        <div class="uk-section company_profile_wrapper">
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
                                <h3 class="">{{ $section2->{config('app.locale').'_title'} }}</h3>
                                <div class="title_divider_dot"></div>
                                {!! $section2->{config('app.locale').'_desc'} !!}
                                    @if($section2->image)
                                    <div class="uk-margin-medium-bottom">
                                        <img src="{{ $section2->image }}" data-src="{{ $section2->image }}" alt="{{ config('app.locale') == 'ja' ? 'FiXi FX（フィクシー）' : 'FiXi FX' }}" data-uk-img loading="lazy">
                                    </div>
                                    @endif
                                @endif

                                @php $section3 = $section->where('section_no', 3)->where('status', 1)->first() @endphp
                                @if($section3)
                                <h3 class=" mt50">{{ $section3->{config('app.locale').'_title'} }}</h3>
                                <div class="title_divider_dot"></div>
                                {!! $section3->{config('app.locale').'_desc'} !!}
                                @endif

                                @php $section4 = $section->where('section_no', 4)->where('status', 1)->first() @endphp
                                @if($section4)
                                <h4 class=" mt50">{{ $section4->{config('app.locale').'_title'} }}</h4>
                                <div class="title_divider_dot"></div>
                                {!! $section4->{config('app.locale').'_desc'} !!}
                                @endif

                                @php $section5 = $section->where('section_no', 5)->where('status', 1)->first() @endphp
                                @if($section5)
                                <h4 class=" mt50">{{ $section5->{config('app.locale').'_title'} }}</h4>
                                <div class="title_divider_dot"></div>
                                {!! $section5->{config('app.locale').'_desc'} !!}
                                @endif

                                @php $section6 = $section->where('section_no', 6)->where('status', 1)->first() @endphp
                                @if($section6)
                                <h4 class=" mt50">{{ $section6->{config('app.locale').'_title'} }}</h4>
                                <div class="title_divider_dot"></div>
                                {!! $section6->{config('app.locale').'_desc'} !!}
                                @endif

                                @php $section8 = $section->where('section_no', 8)->where('status', 1)->first() @endphp
                                <div class="my-5">
                                    <h4 class="">{{ $section8->{config('app.locale').'_title'} }}</h4>
                                    <div class="title_divider_dot"></div>
                                    @if($section8->image)
                                    <div class="image_shape_wrapper mt-3">
                                        <div class="image_shape_container">
                                        <img src="{{ $section8->image }}" alt="{{ config('app.locale') == 'ja' ? 'FiXi FX（フィクシー）' : 'FiXi FX' }}" loading="lazy"/>
                                        <span class="additional_shape_box"></span>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="{{(count($section8->subSection) > 4) ? 'owl-carousel' : ''}} carousel_wrapper">
                                        <div class="item row">
                                            @foreach($section8->subSection()->orderBy('id', 'asc')->take(4)->get() as $sub_sec)
                                            <div class="col-12 col-md-6 mb-4">
                                                <div class="custom_box custom_box_shadow d-flex flex-column">
                                                <div class="uk-margin-right circle medium flex-shrink-0">
                                                    <img src="{{ asset('front/img/icons/page-icon/companys-profile/'.$sub_sec->icon) }}" class="uk-margin-auto-right uk-margin-auto-left uk-text-center page_icon" loading="lazy" alt="{{ config('app.locale') == 'ja' ? 'FiXi FX（フィクシー）' : 'FiXi FX' }}">
                                                </div>
                                                <h4 class="mt-3 mb-0 uk-text-center" style="word-break: break-word">
                                                    {{ $sub_sec->{config('app.locale').'_title'} }}
                                                </h4>
                                                <p class="mb-0">
                                                    {{ $sub_sec->{config('app.locale').'_desc'} }}
                                                </p>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        @if(count($section8->subSection) > 4)
                                        <div class="item row">
                                            @foreach($section8->subSection()->orderBy('id', 'desc')->take(4)->get() as $sub_sec)
                                            <div class="col-12 col-md-6 mb-4">
                                                <div class="custom_box custom_box_shadow d-flex flex-column">
                                                <div class="uk-margin-right circle medium flex-shrink-0">
                                                    <img src="{{ asset('front/img/icons/page-icon/companys-profile/'.$sub_sec->icon) }}" class="uk-margin-auto-right uk-margin-auto-left uk-text-center page_icon" loading="lazy" alt="{{ config('app.locale') == 'ja' ? 'FiXi FX（フィクシー）' : 'FiXi FX' }}">
                                                </div>
                                                <h5 class="mt-3 mb-0 uk-text-center h5-from-h4" style="word-break: break-word">
                                                    {{ $sub_sec->{config('app.locale').'_title'} }}
                                                </h5>
                                                <p class="mb-0">
                                                    {{ $sub_sec->{config('app.locale').'_desc'} }}
                                                </p>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        @endif
                                    </div>
                                </div>

                                @php $section7 = $section->where('section_no', 7)->where('status', 1)->first() @endphp
                                @if($section7)
                                <hr class="my-4">
                                <h3 class="">{{ $section7->{config('app.locale').'_title'} }}</h3>
                                        <div class="title_divider_dot"></div>
                                {!! $section7->{config('app.locale').'_desc'} !!}
                                @isset($section7->image)
                                <div class="uk-card uk-card-default uk-card-body p-3">
                                    <img src="{{ $section7->image }}" data-src="{{ $section7->image }}" alt="{{ config('app.locale') == 'ja' ? 'FiXi FX（フィクシー）' : 'FiXi FX' }}" data-uk-img loading="lazy">
                                </div>
                                @endisset
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection

@push('css')
<style>
    .h5-from-h4{
        font-size: 1.25rem;
    }
</style>
@endpush

@push('scripts')
<script>
    $(document).ready(function () {
        $(".owl-carousel").owlCarousel({
            loop: true,
            autoplay: false,
            speed:800,
            autoplayTimeout:5000,
            autoplayHoverPause:true,
            items: 2,
            margin: 10,
            responsive: {
                0: {
                items: 1,
                },
                600: {
                items: 1,
                },
            },
        });
    });

    window.addEventListener('load', addButtonAriaLabel);
    function addButtonAriaLabel(){
        let owlDotButton = document.getElementsByClassName('owl-dot');
        for(let i = 0, len = owlDotButton.length; i < len; i++){
            owlDotButton[i].setAttribute('aria-label', "{{ config('app.locale') == 'ja' ? 'カルーセルボタン' : 'carousel button' }}");
        }
    }
</script>
@endpush
