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

<style>
    .loader-container {

        display: flex;

        justify-content: center;

        align-items: center;

        height: 100%;

    }



    .loader {

        border: 4px solid rgba(0, 0, 0, 0.3);

        border-top: 4px solid #000;

        border-radius: 50%;

        width: 20px;

        height: 20px;

        animation: spin 1s linear infinite;

    }

    .spreadTable-box thead tr th .subtext_table span {
        color: #ededed;

    }



    @keyframes spin {

        0% {

            transform: rotate(0deg);

        }



        100% {

            transform: rotate(360deg);

        }

    }



    .tradersChoose_box .swiper .blogBox-wrap img {

        width: 100%;

    }



    @media(max-width:767px) {

        .data-table-wrapper .dataTables_scrollHeadInner {

            width: 100% !important;

            min-width: 684px;

        }



        html[lang="ja"] .data-table-wrapper .dataTables_scrollHeadInner {

            width: 100% !important;

            min-width: 789px;

        }



        .data-table-wrapper .dataTables_scroll {

            clear: both;

            white-space: nowrap;

            width: 100%;

            display: block;

            overflow-x: auto;

            overflow: auto;

        }



        .data-table-wrapper .dataTables_scroll .dataTables_scrollHead {

            overflow: visible !important;

        }



        .data-table-wrapper .dataTables_scrollHeadInner {

            width: 100% !important;

            min-width: 684px;

        }



        .data-table-wrapper .dataTables_scrollBody {

            white-space: nowrap;

            display: block;

            overflow: visible !important;

        }



        .data-table-wrapper table {

            border-bottom: none !important;

            width: 100% !important;

            white-space: nowrap;

            overflow-x: visible;

            display: block;

        }



        table.dataTable thead>tr>th.sorting_desc:before,

        table.dataTable thead>tr>th.sorting_desc:after {

            right: 5px;

        }

    }
</style>

@endsection



@section('content')



@include('front.layouts.partials.common_hero')



<!-- Spreads, Swaps & Commissions -->

@php $section6 = $section->where('section_no', 6)->where('status', 1)->first() @endphp

@if($section6)

<section class="bg-white side-by-side padding-tb-120 fiXiTrader_box commissionsBox_wrap">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-6 col-sm-12">

                <div class="section-head mtop-30">

                    <h2 class="max-w-427">{{ $section6->{config('app.locale').'_title'} }}</h2>

                    <div class="discription mbottom-0">

                        <p class="mbottom-0">

                            {!! $section6->{config('app.locale').'_desc'} !!}

                        </p>

                    </div>

                </div>

            </div>

            <div class="col-lg-6 col-sm-12">

                <div class="side-by-side-img">

                    <img src="{{$section6 && $section6->image ? $section6->image : asset('fixifx/images/tradergo.png')}}" alt="tradergo">

                </div>

            </div>

        </div>

    </div>

</section>

@endif



<!-- end  -->



<!-- FiXi Proudly Offers -->

@php isset($section) ? $section3 = $section->where('section_no', 3)->where('status', 1)->first() : '' @endphp

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

                        @if($sub_sec->status == 1)

                        <div class="gridProudly-item">

                            <div class="icon_box">

                                <img class="img-fluid" src="{{$sub_sec->image}}" alt="{{ spread_list_alt($sub_sec_index, config('app.locale')) }}">

                            </div>

                            <div class="title">

                                <h6>

                                    {{ $sub_sec->{config('app.locale').'_title'} }}

                                </h6>

                            </div>

                        </div>

                        @endif

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

@php isset($section) ? $section4 = $section->where('section_no', 4)->where('status', 1)->first() : '' @endphp

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

                                        {!! $sub_sec->{config('app.locale').'_desc'} !!}

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

        <div class="title text-center">

            <h2>

                {{ __('message.accountFunding_msg') }}

            </h2>

        </div>

        <div class="accountFunding-btn d-flex align-items-center justify-content-center">

            <a href="{{ getSettingValue('live_link') }}" target="_blank" class="custom-btn fill-btn-1">{{ getSettingValue('foot_live_link_btn_'.config('app.locale')) }}</a>

            <a href="{{ getSettingValue('demo_link') }}" target="_blank" class="custom-btn fill-btn">{{ getSettingValue('demo_link_btn_'.config('app.locale')) }}</a>

        </div>

    </div>

</section>

<!-- end  -->



@php isset($section) ? $section5 = $section->where('section_no', 5)->where('status', 1)->first() : '' @endphp

@if($section5)

<section class="spreadList-wrapper padding-tb-120">

    <div class="container">

        <div class="col-12 text-center">

            <div class="title">

                <h2>

                    {{ $section5->{config('app.locale').'_title'} }}

                </h2>

            </div>

            <div class="discription">

                <p>{!! $section5->{config('app.locale').'_desc'} !!}</p>

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

                    <!-- <div class="loaderbtn" id='loader'></div> -->

                </ul>

                <input type="hidden" id="cat_val" value="{{ $spread_categories[0]->id }}">

            </div>

            <div class="tab-content" id="nav-tabContent">

                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">

                    <!-- loader -->

                    <div id="loader" style="display:none;">

                        <img src="{{ asset('fixifx/images/loading.gif') }}" width="30px" alt="Loading...">

                    </div>

                    <!-- loader end -->

                    <div class="table_wrapper data-table-wrapper">

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





<!-- Working code with loader and etc-->

@section('javascript')

<script src="{{asset('fixifx/js/dataTables.js')}}"></script>

<script src="{{asset('fixifx/js/swiper-bundle.min2.js')}}"></script>

<script>
    var swiper = new Swiper('.traders_slides', {

        slidesPerView: 2,

        spaceBetween: 24,

        //centeredSlides: true,

        //paginationClickable: true,

        loop: true,

        speed: 500,

        autoplay: {

            delay: 2500,

            //reverseDirection: false,

            disableOnInteraction: false,

        },

        navigation: {

            nextEl: ".swiper-button-next",

            prevEl: ".swiper-button-prev",

        },

        pagination: {

            el: '.swiper-pagination',

            clickable: true,

        },

        breakpoints: {

            320: {

                slidesPerView: 1

            },

            480: {

                slidesPerView: 1

            },
            640: {
                slidesPerView: 2
            }

        }

    });
</script>

{!! $dataTable->scripts() !!}

<script>
    $(document).ready(function() {


        // Trigger preXhr.dt event manually to show loader initially

        $("#spread-table").DataTable().ajax.reload();



        $("#spread-table").on('preXhr.dt', function(e, settings, data) {

            data.category_id = $("#cat_val").val();

            $('#spread-table tbody').html('<tr><td colspan="6" class="border-right-0"><div id="loader" class="text-center"><img src="{{ asset("fixifx/images/loading.gif") }}" width="50px" alt="Loading..."></div></td></tr>');

        });



        $('#spread-table').on('xhr.dt', function() {

            $('#loader').remove(); // Remove the loader when the response is received

        });



        // Trigger preXhr.dt event manually to show loader initially

        $('#spread-table').DataTable().ajax.reload();



        // Trigger click event for the default tab

        $('.nav-link.active').trigger('click');



        $('.nav-link').on('click', function(e) {

            // e.preventDefault(); // Prevent the default link behavior

            value = $(this).attr('value');

            $('#cat_val').val(value);

            window.LaravelDataTables["spread-table"].draw();

        });



        $('#spread-table').on('page.dt', function() {

            // Show loader when pagination is clicked

            $('#spread-table tbody').html('<tr><td colspan="6"><div id="loader" class="text-center"><img src="{{ asset("fixifx/images/loading.gif") }}" width="50px" alt="Loading..."></div></td></tr>');

            fixedHeader: true

        });




    });
</script>

@endsection