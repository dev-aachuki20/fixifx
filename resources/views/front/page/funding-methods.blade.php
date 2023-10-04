@php
    function funding_cfds_alt($index, $lang){
        $alt_funding_fixi = [
            "ja" => '（入金方法） - FiXi FX（フィクシー）',
            "en" => ' (Funding Methods) - FiXi FX'
        ];

        $funding_alt_array = [
            [
                "ja" => "クレジットカード",
                "en" => "credit card"
            ],
            [
                "ja" => "銀行振込",
                "en" => "bank transfer"
            ],
            [
                "ja" => "プリモペイ",
                "en" => "PrimoPay"
            ],
            [
                "ja" => "ビットコイン",
                "en" => "Bitcoin"
            ],
            [
                "ja" => "イーサリアム",
                "en" => "ethereum"
            ],
            [
                "ja" => "テザー",
                "en" => "tether"
            ]
        ];

        return $funding_alt_array[$index][$lang] . $alt_funding_fixi[$lang];
    }
    $keywords_jp = 'FiXi FX,フィクシー,入金方法,入金手段';
    $description_jp = 'FiXi FX（フィクシー）では、クレジットカード･銀行振込･プリモペイ･ビットコイン･イーサリアム･テザー(USDT)等、豊富な入金方法をご用意しています。';
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
                                    @if(count($payments))
                                    <div class="forex-paragraf-info forex-instruments-info">
                                        <ul class="uk-list uk-list-divider">
                                            @foreach($payments as $payment_index => $payment)
                                            <li>
                                                <div class="uk-flex uk-grid-column-small uk-grid-row-large uk-flex-between@s align-items-center my-4" uk-grid>
                                                    <div class="uk-width-1-6@s uk-text-center@s uk-margin-left@s mb-3">
                                                        <div class="mb-2">
                                                            <img width="120px" loading="lazy" src="{{ $payment->logo }}" {{-- data-src="img/master_card_pay.svg" --}}alt="{{ funding_cfds_alt($payment_index, config('app.locale')) }}" data-uk-img>
                                                        </div>
                                                    </div>
                                                    <div class="uk-width-expand@s mt-0">
                                                        <h3 class="mb-2 h3-from-h4">{{config('app.locale')=='en'? $payment->payment_name :$payment->ja_payment_name}}</h3>
                                                        <p class="m-0">{!! $payment->{config('app.locale').'_desc'} !!}</p>
                                                    </div>
                                                    <div class="uk-width-1-5@s uk-text-right@s">
                                                        <a href="{{ $payment->payment_link }}" class="uk-button uk-button-dark uk-border-rounded mt-2 mt-sm-0 uk-text-nowrap" target="_blank"> {{ __('message.fund') }}</a>
                                                    </div>
                                                </div> 
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif

                                    @php $section2 = $section->where('section_no', 2)->where('status', 1)->first() @endphp
                                    @if($section2)
                                    <hr class="my-4">
                                    <h2 class="">{{ $section2->{config('app.locale').'_title'} }}</h2>
                                    <div class="title_divider_dot"></div>
                                    <p class="m-0">{!! $section2->{config('app.locale').'_desc'} !!}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
@endsection

@push('css')
<style>
    .h3-from-h4{
        font-size: 1.25rem;
    }
</style>
@endpush