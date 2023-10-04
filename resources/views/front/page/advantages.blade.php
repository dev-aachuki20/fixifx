@php
    $keywords_jp = 'FiXi FX,フィクシー,海外FX口座,メリット';
    $description_jp = 'FiXi FX（フィクシー）は狭いスプレッドや最大400倍のレバレッジ、スキャルピング無制限などが魅力の海外FX口座。NDD方式を採用するA-book業者です。';
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
                            @php $sections = $section->where('section_no', '>', 1) @endphp
                            @if(count($sections))
                            <div class="inner-features-wrap ">
                                <div class="uk-child-width-1-2@s uk-child-width-1-2@m uk-margin-medium-top uk-margin-bottom uk-grid-match" uk-grid data-uk-grid>
                                    @foreach($sections as $sec)
                                    <div class="in-pricing-1">
                                        <div class="uk-card uk-card-default custom_box_shadow ">
                                            <div class="uk-card-header p-0 uk-text-center">
                                                <div class="uk-margin-remove-bottom uk-margin-remove-top mb-3">
                                                    <img class="uk-margin-small-bottom page_icon" src="{{ $sec->image }}" data-src="{{ $sec->image }}" alt="{{ config('app.locale') == 'ja' ? 'FiXi FX（フィクシー）' : 'FiXi FX' }}" data-uk-img loading="lazy">
                                                </div>
                                                <h3 class="uk-margin-remove-top mb-3">{{ $sec->{config('app.locale').'_title'} }}</h3>
                                            </div>
                                            <div class="uk-card-body p-0">
                                                {!! $sec->{config('app.locale').'_desc'} !!}
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
@endsection