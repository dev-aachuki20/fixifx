@php
    $keywords_jp = 'FiXi FX,フィクシー,出金方法,出金スピード';
    $description_jp = 'FiXi FX（フィクシー）では、通常10分以内に出金処理が完了。出金手順についてユーザーガイドもご用意しています。';
@endphp

@extends('front.layouts.master')

@section('content')
@php 
    $payment = App\Models\PaymentType::where('page_id', $page->id)->where('status', 1)->first() ;
    $section2 = $section->where('section_no', 2)->where('status', 1)->first()
@endphp
    
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
                                @if($section2)
                                <div class="">
                                    <div class="uk-card uk-card-default uk-card-body uk-border-rounded mb-4">
                                        <div class="uk-grid uk-flex-middle" data-uk-grid="">
                                            <div class="uk-width-1-1 uk-width-expand@m uk-first-column">
                                                <h3>{{ getSettingValue('withdraw_content_'.config('app.locale')) }}</h3>
                                            </div>
                                            <div class="uk-width-auto">
                                                <a class="uk-button uk-button-primary uk-border-rounded" href="{{ getSettingValue('withdraw_link') }}">{{ getSettingValue('withdraw_btn_'.config('app.locale')) }}</a>
                                            </div>
                                        </div>
                                    </div>
                                    <p>{!! $section2->{config('app.locale').'_desc'} !!}</p>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
@endsection