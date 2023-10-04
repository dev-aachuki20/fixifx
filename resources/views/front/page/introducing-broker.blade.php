@php
    $keywords_jp = '海外FX,IB,紹介ブローカー,アフィリエイト,2ティア報酬';
    $description_jp = '海外FXのFiXi FX（フィクシー）が運営するIBプログラム。ご紹介いただいたお客様のFX取引額に応じて報酬を獲得可能です。';
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
                    <div class="inner-features-wrap">
                        <div class="uk-grid uk-child-width-1-1@s uk-child-width-1-1@m in-margin-bottom-30@s uk-margin-medium-bottom" data-uk-grid="">
                            <div class="uk-first-column">
                                <img loading="lazy" class="uk-align-center " src="{{asset('front/img/fx-introducing-broker.png')}}{{--asset('front/img/phone-partners.png')--}}" alt="{{ config('app.locale') == 'ja' ? 'FX海外口座IB - FiXi FX（フィクシー）' : 'FiXi FX - introducing broker' }}">
                            </div>
                            @php $section1 = $section->where('section_no', 1)->first() @endphp
                            @if($section1)
                            <div class="">
                                <h2 class="h2-from-h3">{{ $section1->{config('app.locale').'_title'} }}</h2>
                                <div class="title_divider_dot"></div>
                            </div>
                            {!! $section1->{config('app.locale').'_desc'} !!}
                            @if($section1->{config('app.locale').'_short_text'} && $section1->video_url) 
                            <div>
                                <div class="uk-flex uk-flex-middle  uk-flex-between flex-wrap uk-margin-medium-bottom uk-background-muted p-3 uk-border-rounded">
                                    <a href="{{$section1->getRawOriginal('video_url')}}" target="_blank" class="uk-button uk-button-primary uk-border-rounded mt-2 mt-sm-0 mx-auto"><i class="fas fa-user mr-1"></i> {{ $section1->{config('app.locale').'_short_text'} }}</a>
                                </div>
                            </div>
                            @endif
                            @endif
                        </div>
                    </div>
                    @php $section2 = $section->where('section_no', 2)->where('status', 1)->first() @endphp

                    @if($section2)
                    <div class="inner-features-wrap company_profile_wrapper">
                        <h2 class="h2-from-h3">{{ $section2->{config('app.locale').'_title'} }}</h2>
                        <div class="title_divider_dot"></div>
                            <div class="uk-grid uk-grid-small uk-child-width-1-3@s uk-child-width-1-2 uk-margin-medium-top uk-margin-medium-bottom" data-uk-grid="">
                                @foreach($section2->subSection as $key=>$sec)
                                <div class="uk-text-center service-info-box">
                                    <div class="custom_box custom_box_shadow">
                                        <div class="uk-margin-bottom">
                                            <img loading="lazy" src="{{asset($sec->image)}}" style="width:80px" alt="{{ config('app.locale') == 'ja' ? '海外FXのIB - FiXi FX（フィクシー）' : 'introducing broker - FiXi FX' }}">
                                        </div>
                                        <div>
                                            <h3 class="mb-0 h3-from-h5">{{ $sec->{config('app.locale').'_title'} }}</h3>
                                            <p>{!! $sec->{config('app.locale').'_desc'} !!}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                        </div>
                    </div>
                    @endif
                    @php $section3 = $section->where('section_no', 3)->where('status', 1)->first() @endphp
                    @if($section3)
                    <div class="inner-features-wrap company_profile_wrapper uk-margin-medium-bottom">
                        <div class="uk-text-center service-info-box uk-margin-bottom">
                            <div class="custom_box custom_box_shadow">
                                <div class="uk-margin-bottom">
                                    {{-- <img loading="lazy" src="{{asset($section3->image)}}" style="width:80px" class="uk-margin-small-bottom "> --}}
                                    <h3 class="uk-margin-remove-top uk-margin-bottom h3-from-h4">
                                        {{ $section3->{config('app.locale').'_title'} }}
                                        <span class="uk-margin-remove-top uk-margin-bottom uk-heading-small uk-text-danger block-span">
                                            {{$section3->en_count_text}}
                                        </span>
                                    </h3>
                                    <p>{!! $section3->{config('app.locale').'_desc'} !!}</p>
                                </div>
                                <img src="{{asset('front/img/partner-footer.svg')}}" style="max-width:100%;" alt="">
                            </div>
                        </div>
                    </div>
                    @endif
                    @php isset($section) ? $section4 = $section->where('section_no', 4)->where('status', 1)->first() : '' @endphp
                    @if($section4)
                    <div class="inner-features-wrap uk-margin-medium-bottom">
                        <h2 class="h2-from-h3">{{ $section4->{config('app.locale').'_title'} }}</h2>
                        <div class="title_divider_dot"></div>

                        <dl class="uk-grid uk-child-width-1-3@s uk-child-width-1-2 uk-margin-medium-top uk-margin-medium-bottom" data-uk-grid="">
                            @foreach($section4->subSection as $sec)
                            <div class="uk-text-center service-info-box">
                                <dt class="uk-margin-bottom">
                                    <img loading="lazy" src="{{ asset($sec->image)}}" style="width:60px" alt="{{ config('app.locale') == 'ja' ? '海外FX口座のIB - FiXi FX（フィクシー）' : 'introducing broker - FiXi FX' }}">
                                </dt>
                                <dd>
                                    <p class="mb-0 p-from-h5">{{ $sec->{config('app.locale').'_title'} }}</p>
                                </dd>
                            </div>
                            @endforeach
                        </div>
                        {!! $section4->{config('app.locale').'_desc'} !!}
                    </div>
                    @endif
                    @php isset($section) ? $section5 = $section->where('section_no', 5)->where('status', 1)->first() : '' @endphp

                    @if($section5)
                    <div class="inner-features-wrap uk-margin-medium-bottom">
                        <div class="in-profit-16">
                            <div class="in-create-account uk-text-left uk-margin-medium-top">
                                <span class="uk-label uk-text-small uk-text-uppercase uk-border-rounded uk-margin-small-bottom"> {{ $section5->{config('app.locale').'_title'} }}</span>
                                <p>{!! $section5->{config('app.locale').'_desc'} !!}</p>
                            </div>
                        </div>
                    </div>
                    @endif
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
    .h3-from-h5{
        font-size: 16px;
    }
    .p-from-h5{
        font-size: 16px;
        line-height: 1.2;
        color: #001e32;
        font-weight: 700;
    }
    .block-span{
        display: block;
    }
</style>
@endpush