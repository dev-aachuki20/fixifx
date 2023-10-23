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

@extends('front.layouts.base')

@section('css')
<link rel="stylesheet" href="{{asset('fixifx/css/datatable.css')}}">
<!-- <link href="{{asset('assets/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/css/jquery.dataTables.min.css')}}" rel="stylesheet"> -->
@endsection

@section('content')

@include('front.layouts.partials.common_hero')

<!-- Spreads, Swaps & Commissions -->
<section class="bg-white side-by-side padding-tb-120 fiXiTrader_box commissionsBox_wrap">
    <div class="container">
        <div class="row align-items-center">
            @include('front.common.sub_header')
            <!--@php isset($section) ? $section2 = $section->where('section_no', 2)->first() : '' @endphp-->
            <!--@if($section2)-->
            <!--<div class="col-lg-6 col-sm-12">-->
            <!--    <div class="side-by-side-img">-->
            <!--        <img src="{{ $section2->image }}" alt="tradergo">-->
            <!--    </div>-->
            <!--</div>-->
            <!--@endif-->
        </div>
    </div>
</section>
<!-- end  -->

<!-- FiXi Proudly Offers -->
@php isset($section) ? $section3 = $section->where('section_no', 3)->first() : '' @endphp
@if($section3)
<section class="proudlyOffers-wrapper padding-tb-120 bg-snow-drift">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-3">
                <div class="leftProudly_box">
                    <div class="title">
                        <h2>
                            {{ $section3->{config('app.locale').'_title'} }}
                        </h2>
                    </div>
                    <div class="discription">
                        {!! $section3->{config('app.locale').'_desc'} !!}
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-9">
                <div class="rightProudly_box">
                    <div class="gridProudly-box">
                        @foreach($section3->subSection as $sub_sec_index => $sub_sec)
                        <div class="gridProudly-item">
                            <div class="icon_box">
                                <img class="img-fluid" src="{{ asset('front/img/icons/page-icon/Spread-list/'.$sub_sec->icon) }}" alt="{{ spread_list_alt($sub_sec_index, config('app.locale')) }}">
                            </div>
                            <div class="title">
                                <h6>
                                    {{ $sub_sec->{config('app.locale').'_title'} }}
                                </h6>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
<!-- end  -->


<!-- Why Traders Choose the NDD Model -->
@php isset($section) ? $section4 = $section->where('section_no', 4)->first() : '' @endphp
@if($section4)
<section class="tradersChoose_box padding-tb-120">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 align-self-center">
                <div class="tradersChoose-left">
                    <div class="title">
                        <h2>
                            {{ $section4->{config('app.locale').'_title'} }}
                        </h2>
                    </div>
                    <div class="discription">
                        <p>{!! $section4->{config('app.locale').'_desc'} !!}</p>
                    </div>
                </div>
                <div class="bloggird_arrow">
                    <div class="nextPrev-box">
                        <div class="swiper-button-prev">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3.29373 8.1745C3.29373 8.04967 3.34144 7.92472 3.43674 7.82942L8.31769 2.94846C8.50842 2.75774 8.81726 2.75774 9.00786 2.94846C9.19846 3.13919 9.19858 3.44803 9.00786 3.63863L4.47199 8.1745L9.00786 12.7104C9.19858 12.9011 9.19858 13.2099 9.00786 13.4005C8.81714 13.5911 8.50829 13.5913 8.31769 13.4005L3.43674 8.51958C3.34144 8.42428 3.29373 8.29933 3.29373 8.1745ZM7.3415 8.51958L12.2225 13.4005C12.4132 13.5913 12.722 13.5913 12.9126 13.4005C13.1032 13.2098 13.1033 12.901 12.9126 12.7104L8.37675 8.1745L12.9126 3.63863C13.1033 3.44791 13.1033 3.13906 12.9126 2.94846C12.7219 2.75786 12.4131 2.75774 12.2225 2.94846L7.3415 7.82942C7.2462 7.92472 7.19849 8.04967 7.19849 8.1745C7.19849 8.29933 7.2462 8.42428 7.3415 8.51958Z" fill="#1E1F1F" />
                            </svg>
                        </div>
                        <div class="swiper-pagination"></div>
                        <div class="swiper-button-next">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.7063 8.1745C12.7063 8.04967 12.6586 7.92472 12.5633 7.82942L7.68231 2.94846C7.49158 2.75774 7.18274 2.75774 6.99214 2.94846C6.80154 3.13919 6.80142 3.44803 6.99214 3.63863L11.528 8.1745L6.99214 12.7104C6.80142 12.9011 6.80142 13.2099 6.99214 13.4005C7.18286 13.5911 7.49171 13.5913 7.68231 13.4005L12.5633 8.51958C12.6586 8.42428 12.7063 8.29933 12.7063 8.1745ZM8.6585 8.51958L3.77754 13.4005C3.58682 13.5913 3.27798 13.5913 3.08738 13.4005C2.89678 13.2098 2.89665 12.901 3.08738 12.7104L7.62325 8.1745L3.08738 3.63863C2.89666 3.44791 2.89666 3.13906 3.08738 2.94846C3.2781 2.75786 3.58694 2.75774 3.77754 2.94846L8.6585 7.82942C8.7538 7.92472 8.80151 8.04967 8.80151 8.1745C8.80151 8.29933 8.7538 8.42428 8.6585 8.51958Z" fill="#1E1F1F" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-8">
                <div class="swiper blog_slider_box traders_slides">

                    <div class="swiper-wrapper main_slides">
                        @foreach($section4->subSection as $sub_sec)
                        <div class="swiper-slide items_grid">
                            <div class="blogBox-wrap">
                                <div class="img-box">
                                    <img class="img-fluid" src="{{ $sub_sec->image }}" alt="">
                                </div>
                                <div class="blogTitle">
                                    <h6>
                                        {{ $sub_sec->{config('app.locale').'_title'} }}
                                    </h6>
                                </div>
                                <div class="description">
                                    <p>
                                        {{ $sub_sec->{config('app.locale').'_desc'} }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
<!-- end  -->

<!-- accountFunding -->

<section class="accountFunding">
    <div class="container">
        <div class="title">
            <h2>
                {{ __('message.accountFunding_msg') }}
            </h2>
        </div>
        <div class="accountFunding-btn d-flex align-items-center">
            <a href="{{ getSettingValue('live_link') }}" target="_blank" class="custom-btn fill-btn-1">{{ getSettingValue('foot_live_link_btn_'.config('app.locale')) }}</a>
            <a href="{{ getSettingValue('demo_link') }}" target="_blank" class="custom-btn fill-btn">{{ getSettingValue('demo_link_btn_'.config('app.locale')) }}</a>
        </div>
    </div>
</section>
<!-- end  -->

@php isset($section) ? $section5 = $section->where('section_no', 5)->first() : '' @endphp
@if($section5)
<section class="spreadList-wrapper padding-tb-120">
    <div class="container">
        <div class="col-12 text-center">
            <div class="title">
                <h2>
                    Spread List
                </h2>
            </div>
            <div class="discription">
                <p>{{ $section5->{config('app.locale').'_desc'} }}</p>
            </div>
        </div>
        <div class="col-12">

            <div class="blog-tab spreadList_tab">
                <ul class="tab-listing nav nav-tabs" id="nav-tab">
                    @foreach($spread_categories as $key => $spread_cat)

                    <li class="nav-item @if($key == 0) active @endif">
                        <a class="nav-link @if($key == 0) active @endif" id="nav-{{ $spread_cat->id }}-tab" data-bs-toggle="tab" href="#nav-{{ $spread_cat->id }}" role="tab" aria-controls="nav-{{ $spread_cat->id }}" aria-selected="true" value="{{ $spread_cat->id }}">{{ $spread_cat->{config('app.locale').'_name'} }}</a>
                    </li>
                    @endforeach
                </ul>
                <input type="hidden" id="cat_val" value="{{ $spread_categories[0]->id }}">
            </div>


            {{-- <li>
                        <button class="nav-link" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true" value="{{ $spread_cat->id }}">{{ $spread_cat->{config('app.locale').'_name'} }}</button>

            </li> --}}



            {{-- {!! $dataTable->table(['class' => 'table dt-responsive uk-table uk-table-striped nowrap table-wrapper uk-overflow-auto','style' => 'width: 100%']) !!} --}}


            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                    <div class="table_wrapper 1111111">

                        {!! $dataTable->table(['class' => 'table spreadTable-box','style' => 'width: 100%']) !!}

                    </div>
                </div>
            </div>




        </div>
    </div>
</section>
@endif

@include('front.layouts.partials.get_started')

@endsection



@section('javascript')
<script src="{{asset('fixifx/js/dataTables.js')}}"></script>
<!-- <script src="{{asset('assets/libs/jquery/dataTables.min.js')}}"></script> -->
{!! $dataTable->scripts() !!}
<script>
    $("#spread-table").on('preXhr.dt', function(e, settings, data) {
        data.category_id = $("#cat_val").val();
    });
    $('.nav-link').on('click', function(e) {
        value = $(this).attr('value');
        $('#cat_val').val(value);
        window.LaravelDataTables["spread-table"].draw();
        // e.preventDefault();
    });
</script>
@endsection