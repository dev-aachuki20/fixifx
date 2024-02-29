@php
$page_origin_title = 'Terms Condition';
if(config('app.locale') == 'ja'){
$page_origin_title = '利用規約';
}
$keywords_jp = 'FiXi FX,フィクシーFX,利用規約';
$description_jp = 'FiXi FX（フィクシー）の利用規約ページです。';
@endphp

@extends('front.layouts.master')

@section('content')
<main>
    <div class="innare-page-banner" style="background-image: url('{{ asset('storage/Setting/'.getSettingValue('terms_header_img')) }}')">
        <div class="uk-container">
            <h2>{{ getSettingValue('terms_title_'.config('app.locale')) }}</h2>
        </div>
    </div>
    <div class="uk-section">
        <div class="uk-container">
            <div class="inner-content">
                {!! getSettingValue('terms_desc_'.config('app.locale')) !!}
            </div>
        </div>
    </div>
</main>
@endsection