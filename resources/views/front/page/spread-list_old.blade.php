@php
function spread_list_alt($index, $lang){
$alt_spread_fixi = [
"ja" => ' - FiXi FX（フィクシー）',
"en" => ' - FiXi FX'
];

$spread_alt_array = [
[
"ja" => "NDD方式（A-book業者）",
"en" => "NDD(A-book)"
],
[
"ja" => "リクオート排除",
"en" => "No requotes"
],
[
"ja" => "スリッページ排除",
"en" => "No slippage"
],
[
"ja" => "深い流動性へのアクセス",
"en" => "Access to tier-1 bank liquidity"
],
[
"ja" => "狭いスプレッド",
"en" => "Low spreads"
],
[
"ja" => "速い取引執行スピード",
"en" => "High speed trading"
]
];

return $spread_alt_array[$index][$lang] . $alt_spread_fixi[$lang];
}
$keywords_jp = '海外FX,スプレッド,狭い,海外口座';
$description_jp = 'FiXi FX（フィクシーFX）はスプレッドが狭い海外FX口座。NDD方式（A-book業者）で0.014秒未満の注文執行スピードを誇ります。';
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

                    @php isset($section) ? $section2 = $section->where('section_no', 2)->first() : '' @endphp
                    @if($section2)
                    <div class="inner-features-wrap">
                        <div class="in-margin-small-top@s in-margin-bottom@s">
                            <img loading="lazy" class="uk-align-center " src="{{ $section2->image }}" alt="image-team">
                        </div>
                    </div>
                    @endif

                    @php isset($section) ? $section3 = $section->where('section_no', 3)->first() : '' @endphp
                    @if($section3)
                    <div class="inner-features-wrap ">
                        <h3 class="">{{ $section3->{config('app.locale').'_title'} }}</h3>
                        <div class="title_divider_dot"></div>
                        <div class="uk-grid uk-grid-column-medium uk-child-width-1-3@s uk-child-width-1-2 uk-margin-medium-top uk-margin-medium-bottom" data-uk-grid="">
                            @foreach($section3->subSection as $sub_sec_index => $sub_sec)
                            <div class="uk-text-center service-info-box">
                                <div class="uk-margin-bottom">
                                    <!-- <i class="{{ $sub_sec->icon }} fa-lg in-icon-wrap circle primary-color"></i> -->
                                    <img loading="lazy" src="{{ asset('front/img/icons/page-icon/Spread-list/'.$sub_sec->icon) }}" class="page_icon" alt="{{ spread_list_alt($sub_sec_index, config('app.locale')) }}">
                                </div>
                                <div>
                                    <h4 class="mb-0 h4-from-h5">{{ $sub_sec->{config('app.locale').'_title'} }}</h4>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    @php isset($section) ? $section4 = $section->where('section_no', 4)->first() : '' @endphp
                    @if($section4)
                    <div class="uk-position-relative uk-visible-toggle in-profit-7 uk-margin-medium-top uk-margin-medium-bottom" tabindex="-1" uk-slider>
                        <h3 class="">{{ $section4->{config('app.locale').'_title'} }}</h3>
                        <div class="title_divider_dot"></div>
                        <p>{!! $section4->{config('app.locale').'_desc'} !!}</p>
                        <!-- <ul class="uk-slider-items uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-1-3@m uk-grid uk-grid-small"> -->
                        <div class="uk-margin-medium-top company_profile_wrapper " uk-slider>
                            <div class="uk-slider-items uk-child-width-1-2@s uk-child-width-1-2@m uk-grid-small uk-grid">
                                @foreach($section4->subSection as $sub_sec)
                                <div>
                                    <article class="custom_box custom_box_shadow m-0">
                                        <img loading="lazy" class="uk-border-rounded" src="{{ $sub_sec->image }}" data-src="{{ $sub_sec->image }}" alt="profit-news" width="340" height="170" data-uk-img>
                                        <h4 class="uk-margin-remove-bottom mt-3 h4-from-h5">
                                            {{ $sub_sec->{config('app.locale').'_title'} }}
                                        </h4>
                                        <p>{{ $sub_sec->{config('app.locale').'_desc'} }}</p>
                                    </article>
                                </div>
                                @endforeach

                            </div>
                            <div class="uk_slider_nav">
                                <ul class=" uk-slider-nav uk-dotnav uk-list theme_bullet_list"></ul>
                            </div>
                        </div>
                    </div>
                    @endif

                    @php isset($section) ? $section5 = $section->where('section_no', 5)->first() : '' @endphp
                    @if($section5)
                    <div class="spread-list-tabs my-4">
                        <p>{{ $section5->{config('app.locale').'_desc'} }}</p>
                        <ul class="uk-tab mx-auto list-unstyled spread-list-tabs-list" data-uk-tab="{connect:'#my-id'}">
                            @foreach($spread_categories as $spread_cat)
                            <li class="filter-type" value="{{ $spread_cat->id }}"><a href="#">{{ $spread_cat->{config('app.locale').'_name'} }}</a></li>
                            @endforeach
                        </ul>
                        <input type="hidden" id="cat_val" value="{{ $spread_categories[0]->id }}">
                        <div class="table_wrapper tndices_table_main">{!! $dataTable->table(['class' => 'table dt-responsive uk-table uk-table-striped nowrap table-wrapper uk-overflow-auto','style' => 'width: 100%']) !!}</div>
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('css')
<style>
    .h4-from-h5 {
        font-size: 16px;
    }
</style>
@endpush

@push('scripts')
<script src="{{asset('assets/libs/jquery/dataTables.min.js')}}"></script>
{!! $dataTable->scripts() !!}
<script>
    $("#spread-table").on('preXhr.dt', function(e, settings, data) {
        data.category_id = $("#cat_val").val();
    });
    $('.filter-type').on('click', function(e) {
        value = $(this).attr('value');
        $('#cat_val').val(value);
        window.LaravelDataTables["spread-table"].draw();
        // e.preventDefault();
    });
</script>
@endpush