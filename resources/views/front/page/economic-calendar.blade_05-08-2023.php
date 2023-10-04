@php
    $keywords_jp = 'FX,外国為替,経済カレンダー,FXカレンダー';
    $description_jp = '外国為替経済カレンダーは、FXトレーダーが市場を動かす可能性のある重要なイベントを追跡するための便利なツールです。';
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
                            @php $section2 = $section->where('section_no', 2)->where('status', 1)->first() @endphp
                            <div class="inner-features-wrap">
                                @if($section2)
                                {!! $section2->{config('app.locale').'_desc'} !!}
                                @endif
                                <div class="uk-card economic-calendar uk-card-default uk-card-body uk-border-rounded p-2 mb-4">
                                    <iframe src="https://www.tradays.com/{{config('app.locale')}}/economic-calendar/widget?dateFormat=&utm_source=demo.imagetowebpage.com" allowfullscreen uk-responsive uk-video="automute: true" frameborder="0" title="{{ config('app.locale') == 'ja' ? '経済カレンダー - FiXi FX（フィクシー）' : 'economic calendar - FiXi FX' }}"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
@endsection     