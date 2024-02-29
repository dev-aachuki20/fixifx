@php
$index_cfds_alt = 'Index Trading - FiXi FX';
if(config('app.locale') == 'ja'){
$index_cfds_alt = '株価指数CFD（インデックス） - FiXi FX（フィクシー）';
}
$keywords_jp = 'インデックスCFD,株価指数,FiXi,フィクシー';
$description_jp = 'FiXi FX（フィクシー）では、MT5とcTraderでインデックスCFDを取引可能。0.014秒の高速な執行速度と最大100倍のレバレッジを提供します。';
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
                    <div class="inner-features-wrap ">
                        <div class="uk-first-column">
                            @php $section2 = $section->where('section_no', 2)->where('status', 1)->first() @endphp
                            @if($section2)
                            <h3 class="">{{ $section2->{config('app.locale').'_title'} }}</h3>
                            <div class="title_divider_dot"></div>
                            @if(count($section2->subSection))
                            <div class="forex-paragraf-info forex-instruments-info energy_trading_content mt-4">
                                @foreach($section2->subSection as $sub_sec)
                                <div class="uk-flex uk-flex-wrap uk-flex-between@s align-items-center mb-4 custom_box">
                                    <div class="uk-width-1-4@s uk-flex-last@s uk-text-center@s flex-shrink-0 uk-margin-left@s in-padding-vertical@s uk-padding-remove-top uk-text-center uk-text-left@s">
                                        <div class="in-icon-wrap mb-2">
                                            {{--
                                            <img src="{{ $sub_sec->image }}" data-src="img/indices-trading.svg" alt="profit-icon" data-uk-img loading="lazy">
                                            <!-- <i class="fas fa-calendar-alt"></i> -->
                                            --}}
                                            <img src="{{ $sub_sec->image }}" alt="{{ $index_cfds_alt }}" data-uk-img loading="lazy">
                                        </div>
                                        <h3 class="m-0 mb-1">{{ $sub_sec->{config('app.locale').'_count_text'} }}</h3>
                                        <p class="m-0">{{ $sub_sec->{config('app.locale').'_short_text'} }}</p>
                                    </div>
                                    <div class="uk-width-2-3@s">
                                        <h4 class="mb-2">{{ $sub_sec->{config('app.locale').'_title'} }}</h4>
                                        <p>{!! $sub_sec->{config('app.locale').'_desc'} !!}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <hr class="my-4">
                            @endif
                            @endif

                            @php $section3 = $section->where('section_no', 3)->where('status', 1)->first() @endphp
                            @if($section3)
                            <h3 class="">{{ $section3->{config('app.locale').'_title'} }}</h3>
                            <div class="spread-list-tabs forex_table_wrap" id="forex_tb">
                                <div class="title_divider_dot"></div>
                                <div class="table_wrapper tndices_table_main uk-text-nowrap mt-3">
                                    {!! $dataTable->table(['class' => 'table dt-responsive uk-table uk-table-striped nowrap table-wrapper uk-overflow-auto','style' => 'width: 100%']) !!}
                                </div>
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