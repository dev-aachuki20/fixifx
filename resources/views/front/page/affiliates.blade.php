@php
    $keywords_jp = '高額報酬,海外FX,海外口座,口座開設,アフィリエイト';
    $description_jp = '高額報酬の海外FX口座開設アフィリエイト･プログラムなら、FiXi FX（フィクシー）のFAP。お客様のビジネスモデルに合った方法をお選びいただけます。';
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
                            <div class="inner-features-wrap">
                                
                                @php $section2 = $section->where('section_no', 2)->where('status', 1)->first() @endphp
                                @if($section2)
                                {!! $section2->{config('app.locale').'_desc'} !!}
                                    @if($section2->image)
                                    <div class="in-margin-small-top@s in-margin-bottom@s">                                    
                                        <img class="uk-align-center " src="{{ $section2->image }}" alt="image-team" loading="lazy">
                                    </div>
                                    @endif
                                @endif

                                @php $section3 = $section->where('section_no', 3)->where('status', 1)->first() @endphp
                                @if($section3)
                                <h3 class="">{{ $section3->{config('app.locale').'_title'} }}</h3>
                                <div class="title_divider_dot"></div>
                                {!! $section3->{config('app.locale').'_desc'} !!}
                                @endif

                                @include('front.common.talk_to_us')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
@endsection