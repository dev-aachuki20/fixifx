@php
    function commo_cfds_alt($index, $lang){
        $alt_commo_fixi = [
            "ja" => 'CFD - FiXi FX（フィクシー）',
            "en" => ' CFD - FiXi FX'
        ];

        $commo_alt_array = [
            [
                "ja" => "ココア",
                "en" => "cocoa"
            ],
            [
                "ja" => "コーヒー",
                "en" => "coffee"
            ],
            [
                "ja" => "コットン",
                "en" => "cotton"
            ],
            [
                "ja" => "オレンジジュース",
                "en" => "orange-juice"
            ],
            [
                "ja" => "砂糖",
                "en" => "sugar"
            ]
        ];

        return $commo_alt_array[$index - 1][$lang] . $alt_commo_fixi[$lang];
    }
    $keywords_jp = 'ココアCFD,コーヒーCFD,コットンCFD,オレンジジュースCFD,砂糖CFD';
    $description_jp = 'FiXi FX（フィクシー）のエネルギーCFDでは、ココア･コーヒー･コットン･オレンジジュース･砂糖をはじめとする各種CFDを取引可能です。';
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
                                <div class="uk-first-column">
                                    <!-- <h3 class="">Indices Trading</h3> -->
                                    @php $sections = $section->whereIn('section_no', [2,3,4,5,6])->where('status', 1) @endphp
                                    @if(count($sections))
                                    <div class="forex-paragraf-info forex-instruments-info energy_trading_content">
                                        @foreach($sections as $sec_index => $sec)
                                        <div class="uk-flex uk-flex-wrap uk-flex-between@s align-items-center mb-4 custom_box">
                                            <div class="uk-width-1-4@s uk-flex-last@s uk-text-center flex-shrink-0 uk-margin-left@s in-padding-vertical@s uk-padding-remove-top">
                                                <div class="in-icon-wrap mb-2">
                                                    {{--
                                                    <img src="{{ $sec->image }}" data-src="img/Cocoa.svg" class="page_icon" alt="profit-icon" data-uk-img loading="lazy">
                                                    --}}
                                                    <img src="{{ $sec->image }}" class="page_icon" alt="{{ commo_cfds_alt($sec_index, config('app.locale')) }}" data-uk-img loading="lazy">
                                                </div>
                                                <h3 class="m-0 mb-1">{{ $sec->{config('app.locale').'_count_text'} }}</h3>
                                                <p class="m-0">{{ $sec->{config('app.locale').'_short_text'} }}</p>
                                            </div>
                                            <div class="uk-width-2-3@s">
                                                <h4 class="mb-2 uk-text-center uk-text-left@s">{{ $sec->{config('app.locale').'_title'} }}</h4>
                                                <p>{!! $sec->{config('app.locale').'_desc'} !!}</p>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    @endif

                                    @php $section7 = $section->where('section_no', 7)->where('status', 1)->first() @endphp
                                    @if($section7)
                                    <hr class="my-4">
                                    <h3 class="">{{ $section7->{config('app.locale').'_title'} }}</h3>
                                    <div class="title_divider_dot"></div>
                                    <div class="table-wrapper tndices-table-main  uk-overflow-auto mt-4" id="soft_sec_table7">
                                        {!! $section7->{config('app.locale').'_desc'} !!}
                                    </div>
                                    @endif

                                    @php $section8 = $section->where('section_no', 8)->where('status', 1)->first() @endphp
                                    @if($section8)
                                    <hr class="my-4">
                                    <h3 class="">{{ $section8->{config('app.locale').'_title'} }}</h3>
                                    <div class="title_divider_dot"></div>
                                    <div class="table-wrapper tndices-table-main  uk-overflow-auto mt-4" id="soft_sec_table8">
                                        {!! $section8->{config('app.locale').'_desc'} !!}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
@endsection    
@push('scripts')
<script>
    $('#soft_sec_table7, #soft_sec_table8').find('table').addClass('uk-table uk-table-small uk-table-striped');
</script>
@endpush