@php
    $keywords_jp = '';
    $description_jp = 'FiXi FX（フィクシー）では豊富な海外株式CFDからお好きなものを選択可能。業界最安値の手数料でポートフォリオを多様化できます。';
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

                    @php isset($section) ? $section1 = $section->where('section_no', 1)->first() : '' @endphp
                    @if($section1)

                    <div class="col-md-12">
                        <div class="list_style_timeline">
                            <div class="title_flex_item m-0">
                                <h2 class="">{{ $section1->{config('app.locale').'_title'} }}</h2>
                            </div>
                            <div class="title_divider_dot"></div>
                        </div>
                    </div>
                    <!-- <div class="col-md-12 mt-3">
                        <div class="image mb-3">
                            <img src="{{$section1->image}}" class="img-fluid uk-width-100 mb-3" alt="" style="height: 300px;" loading="lazy">
                        </div>
                    </div> -->
                    <div class="col-md-12 mt-4">
                        <div class="list_style_timeline">
                            {!! $section1->{config('app.locale').'_desc'} !!}
                        </div>
                    </div>
                    @endif

                    @php isset($section) ? $section2 = $section->where('section_no', 2)->first() : '' @endphp
                    @if($section2)

                    <div class="col-md-12">
                        <div class="list_style_timeline">
                            <div class="title_flex_item m-0">
                                <h2 class="">{{ $section2->{config('app.locale').'_title'} }}</h2>
                            </div>
                            <div class="title_divider_dot"></div>
                        </div>
                    </div>
                    <!-- <div class="col-md-12 m-3">
                        <div class="image">
                            <img src="{{$section2->image}}" class="img-fluid uk-width-100 mb-3" alt="" style="height: 300px;" loading="lazy">
                        </div>
                    </div> -->
                    <div class="col-md-12 mt-4">
                        <div class="list_style_timeline">
                            {!! $section2->{config('app.locale').'_desc'} !!}
                        </div>
                    </div>

                    @endif

                    @php isset($section) ? $section3 = $section->where('section_no', 3)->first() : '' @endphp
                    @if($section3)
                    <div class="spread-list-tabs my-4">
                        <p style="text-align: center;font-weight: bolder;color: black;"> {{ $section3->{config('app.locale').'_title'} }}</p>
                        @if(count($share_categories))
                        <ul class="uk-tab mx-auto list-unstyled spread-list-tabs-list" data-uk-tab="{connect:'#my-id'}">
                            @foreach($share_categories as $spread_cat)
                            <li class="filter-type" value="{{ $spread_cat->id }}"><a href="#">{{ $spread_cat->{config('app.locale').'_name'} }}</a></li>
                            @endforeach
                        </ul>
                        <input type="hidden" id="cat_val" value="{{ $share_categories[0]->id }}">
                        @endif
                        <div class="table_wrapper tndices_table_main">{!! $dataTable->table(['class' => 'table dt-responsive uk-table uk-table-striped nowrap table-wrapper uk-overflow-auto','style' => 'width: 100%']) !!}</div>
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
{{--<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>--}}
<script src="{{asset('assets/libs/jquery/dataTables.min.js')}}"></script>

{!! $dataTable->scripts() !!}
<script>
    $("#share-table").on('preXhr.dt', function(e, settings, data) {
        data.category_id = $("#cat_val").val();
    });
    $('.filter-type').on('click', function(e) {
        value = $(this).attr('value');
        $('#cat_val').val(value);
        window.LaravelDataTables["share-table"].draw();
    });
</script>
@endpush