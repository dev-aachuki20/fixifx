@php
    $keywords_jp = 'FiXi,フィクシー,FX,安全,安全性';
    $description_jp = 'FiXi FX（フィクシー）に預けられたお客様の資金を安全に保管するために実施している施策について、詳しく紹介･解説しています。';
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
                        <!-- <hr class="my-4"> -->
                        <div class="inner-features-wrap ">
                            @php $section2 = $section->where('section_no', 2)->where('status', 1)->first() @endphp
                            @if($section2)
                            <h3 class="">{{ $section2->{config('app.locale').'_title'} }}</h3>
                            <div class="title_divider_dot"></div>
                            {!! $section2->{config('app.locale').'_desc'} !!}
                            <div class="safety-funds-info uk-margin-medium-top">
                                <div class="row">
                                    @foreach($section2->subSection as $key => $sub_sec)
                                    <div class="col-sm-6 mb-4">
                                        <div class="custom_box custom_box_shadow d-flex flex-column uk-height-1-1">
                                            <div class="uk-margin-auto-right uk-margin-auto-left circle medium flex-shrink-0">
                                                @php
                                                $icon = ($key == 0 ? 'icn_Industry_leader.svg' : ($key == 1 ? 'icn_Access_bank_liquidity.svg' : ($key == 2 ? 'icn_Segregation_of_funds.svg' : ($key == 3 ? 'icn_Negative_balance_protection.svg' : ($key == 4 ? 'icn_Risk_management.svg' : '')))))
                                                @endphp
                                                <img loading="lazy" src="{{ asset('front/img/icons/page-icon/Clients-Funds-Segregation/'.$icon) }}" class="page_icon" alt="{{ config('app.locale') == 'ja' ? 'FiXi FX（フィクシー）' : 'FiXi FX' }}">
                                            </div>
                                            <h4 class="mt-3 mb-0 uk-text-center"><span>{{ $sub_sec->{config('app.locale').'_title'} }}</span></h4>
                                            
                                            <p>{{ $sub_sec->{config('app.locale').'_desc'} }}</p>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endif

                            @php $section3 = $section->where('section_no', 3)->where('status', 1)->first() @endphp
                            @if($section3)
                            <div class="in-profit-16">
                                <div class="in-create-account uk-text-left uk-margin-medium-top">
                                    <span class="uk-label uk-text-small uk-text-uppercase uk-border-rounded uk-margin-small-bottom">{{ $section3->{config('app.locale').'_title'} }}</span>
                                    {!! $section3->{config('app.locale').'_desc'} !!}
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection