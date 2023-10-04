@php
    $keywords_jp = 'FX,外国為替証拠金取引,FiXi,フィクシー';
    $description_jp = 'NDD方式（A-book）のFiXi FX（フィクシー）では、最大400倍のレバレッジで70種類の外国通貨ペアにアクセス可能です。';
@endphp

@extends('front.layouts.master')
@push('css')
<link href="{{asset('assets/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/css/jquery.dataTables.min.css')}}" rel="stylesheet">
@endpush
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
                        <div class="uk-first-column">
                            @php
                                $section2 = $section->where('section_no', 2)->where('status', 1)->first();

                                function set_alt_attr_sec2($html){
                                    if(config('app.locale') == 'ja'){
                                        $alt_attr_sec2 = 'FiXi FX（フィクシー） - FXチャート';
                                    }else{
                                        $alt_attr_sec2 = 'FiXi - FX chart';
                                    }
                                    return str_replace('<img ', '<img alt="' . $alt_attr_sec2 . '"', $html);
                                }
                            @endphp
                            @if($section2)
                            <h3 class="">{{ $section2->{config('app.locale').'_title'} }}</h3>
                            <div class="title_divider_dot"></div>
                            {!! set_alt_attr_sec2($section2->{config('app.locale').'_desc'}) !!}
                            @endif
                            @php $section8 = $section->where('section_no', 4)->where('status', 1)->first() @endphp
                            @if($section8)
                            <hr class="my-4">
                            <h3 class="">{{ $section8->{config('app.locale').'_title'} }}</h3>
                            <div class="spread-list-tabs forex_table_wrap" id="forex_tb">
                                <div class="title_divider_dot"></div>
                                <div class="table_wrapper tndices_table_main uk-text-nowrap mt-3">
                                    {!! $dataTable->table(['class' => 'table dt-responsive uk-table uk-table-striped nowrap table-wrapper uk-overflow-auto','style' => 'width: 100%']) !!}
                                </div>
                            </div>
                            @endif
                            @php $section3 = $section->where('section_no', 3)->where('status', 1)->first() @endphp
                            @if($section3)
                            <h3 class="">{{ $section3->{config('app.locale').'_title'} }}</h3>
                            <div class="title_divider_dot"></div>
                            <div class="forex-instruments-info energy_trading_content mt-4">
                                @foreach($section3->subSection as $sub_sec_index => $sub_sec)
                                <div class="uk-flex uk-flex-wrap uk-flex-between@s align-items-center mb-4 custom_box mt-4">
                                    <div class="uk-width-1-4@s uk-flex-last@s uk-text-center flex-shrink-0 uk-margin-left@s in-padding-vertical@s uk-padding-remove-top">
                                        <div class="in-icon-wrap mb-2">
                                            @php
                                                $alt_profit_icon = '';
                                                
                                                if($sub_sec_index == 0){
                                                    $alt_profit_icon = '70種類のFX通貨ペア';
                                                }else if($sub_sec_index == 1){
                                                    $alt_profit_icon = '業界最狭水準の狭いスプレッド';
                                                }else if($sub_sec_index == 2){
                                                    $alt_profit_icon = 'cTraderによるコピー取引';
                                                }else if($sub_sec_index == 3){
                                                    $alt_profit_icon = '最大400倍のレバレッジ';
                                                }else if($sub_sec_index == 4){
                                                    $alt_profit_icon = 'NDD方式(A-book)';
                                                }
                                            @endphp
                                            <img src="{{ $sub_sec->image }}" loading="lazy" data-src="{{ $sub_sec->image }}" class="page_icon" alt="{{ config('app.locale') == 'ja' ? $alt_profit_icon : 'FiXi FX - profit' }}" data-uk-img>
                                        </div>
                                        <h3 class="m-0 mb-1">{{ $sub_sec->{config('app.locale').'_count_text'} }}</h3>
                                        <p class="m-0">{{ $sub_sec->{config('app.locale').'_short_text'} }}</p>
                                    </div>
                                    <div class="uk-width-2-3@s">
                                        <h4 class="mb-2 uk-text-center uk-text-left@s">{{ $sub_sec->{config('app.locale').'_title'} }}</h4>
                                        <p>{!! $sub_sec->{config('app.locale').'_desc'} !!}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <hr class="my-4">
                            @endif

                            @if(isset($faqs[""]) && count($faqs[""]))
                            <div class="">
                                <h3 class="">FAQ:</h3>
                                <div class="title_divider_dot"></div>
                                <ul class="in-faq-5 uk-list-divider mt-3" uk-accordion>
                                    @foreach($faqs[""] as $faq)
                                    <li>
                                        <span class="uk-accordion-title">{{ $faq->{config('app.locale').'_question'} }}</span>
                                        <div class="uk-accordion-content">
                                            {!! $faq->{config('app.locale').'_answer'} !!}
                                            <div class="ss-box ss-circle" data-ss-content="false"></div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
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
<script src="{{asset('assets/libs/jquery/dataTables.min.js')}}"></script>
{!! $dataTable->scripts() !!}
<script>
    $('#forex_tb').find('table').addClass('uk-table uk-table-small uk-table-striped');
</script>
@endpush