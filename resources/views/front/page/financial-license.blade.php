@php
    $keywords_jp = 'FiXi,フィクシー,FX,認可,金融ライセンス';
    $description_jp = 'FiXi FX（フィクシー）は、各種金融サービス規制当局により認可および規制されています。';
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
                                <div class="uk-child-width-1-2@s uk-child-width-1-2@m uk-margin-medium-top uk-margin-bottom uk-grid-match uk-visible@s" uk-grid data-uk-grid>
                                    @foreach($sections as $sec)
                                    <div class="in-pricing-1">
                                        <div class="uk-card uk-card-default custom_box_shadow ">
                                            <div class="uk-card-header p-0 uk-text-center">
                                                <div class="uk-margin-remove-bottom uk-margin-remove-top mb-3">
                                                    <img class="uk-margin-small-bottom page_icon" loading="lazy" src="{{ $sec->image? $sec->image:asset('front/img/default.png') }}" data-src="{{ $sec->image }}" alt="{{ config('app.locale') == 'ja' ? '金融ライセンス - FiXi FX（フィクシー）' : 'Financial License - FiXi FX' }}" data-uk-img>
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
                                <div class="uk-margin-medium-top company_profile_wrapper uk-hidden@s uk-visible in-pricing-1" uk-slider="autoplay: true; autoplay-interval: 3000">
                                    <div class="uk-slider-items uk-child-width-1-2@s uk-child-width-1-2@m uk-grid-small uk-grid">
                                    @foreach($sections as $sec)    
                                        <div class="">
                                            <div class="custom_box">
                                                <div class="uk-card-header p-0">
                                                    <div class="uk-margin-remove-bottom uk-margin-remove-top mb-3 uk-text-center uk-text-left@s">
                                                        <img width="50px" loading="lazy" class="uk-margin-small-bottom" src="{{ $sec->image? $sec->image:asset('front/img/default.png') }}" data-src="{{ $sec->image }}" alt="{{ config('app.locale') == 'ja' ? '金融ライセンス - FiXi FX（フィクシー）' : 'Financial License - FiXi FX' }}" data-uk-img>
                                                    </div>
                                                    <h3 class="uk-margin-remove-top mb-3 uk-text-center uk-text-left@s">{{ $sec->{config('app.locale').'_title'} }}</h3>
                                                </div>
                                                <div class="uk-card-body p-0">
                                                    {!! $sec->{config('app.locale').'_desc'} !!}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    </div>
                                    <div class="uk_slider_nav">
                                        <ul class=" uk-slider-nav uk-dotnav" id="ariaTarget"></ul>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
@endsection

@push('scripts')
<script>
    window.addEventListener('load', () => {
        let ariaTarget = document.getElementById('ariaTarget');
        let ariaATags = ariaTarget.getElementsByTagName('a');
        for(let i = 0, len = ariaATags.length; i < len; i++){
            ariaATags[i].setAttribute('aria-label', "{{ config('app.locale') == 'ja' ? '金融ライセンス' : 'Financial License' }}" + (i + 1));
        }
    });
</script>
@endpush