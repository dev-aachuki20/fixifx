@php
    $page_origin_title = 'Privacy Policy';
    if(config('app.locale') == 'ja'){
        $page_origin_title = 'プライバシーポリシー';
    }
    $keywords_jp = 'FiXi FX,フィクシーFX,プライバシーポリシー';
    $description_jp = 'FiXi FX（フィクシー）のプライバシーポリシー･ページです。';
@endphp

@extends('front.layouts.master')

@section('content') 
    <main>
        <div class="innare-page-banner" style="background-image: url('{{ asset('storage/Setting/'.getSettingValue('privacy_header_img')) }}')">
            <div class="uk-container">
                <h2>{{ getSettingValue('privacy_title_'.config('app.locale')) }}</h2>
            </div>
        </div>
        <div class="uk-section">
            <div class="uk-container">
                <div class="inner-content">
                    {!! getSettingValue('privacy_desc_'.config('app.locale')) !!}
                </div>
            </div>
        </div>
    </main>
@endsection