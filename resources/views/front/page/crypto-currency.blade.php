@php
    $keywords_jp = '仮想通貨CFD,ビットコイン,イーサリアム,リップル,テザー';
    $description_jp = 'FiXi FX（フィクシー）の仮想通貨CFD取引は、仮想通貨を購入したりデジタル･ウォレットに保管したりすることなく仮想通貨ペアを売買可能です。';
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
                            
                            @php isset($section) ? $section2 = $section->where('section_no', 2)->where('status', 1)->first() : '' @endphp
                            @if($section2)
                            <div class="inner-features-wrap">
                                <div class="in-margin-small-top@s in-margin-bottom@s">
                                    <img class="uk-align-center uk-width-100" src="{{ $section2->image }}" alt="image-team">
                                </div>
                            </div>
                            @endif

                            @php isset($section) ? $section3 = $section->where('section_no', 3)->where('status', 1)->first() : '' @endphp
                            @if($section3)
                            <div class="uk-section">
                                <div class="uk-container">
                                    <div class="row">
                                        <div class="col-lg-6 mb-4 mb-lg-0 uk-text-center">
                                            <img src="{{ $section3->image }}" class="img-fluid" loading="lazy" alt="{{ config('app.locale') == 'ja' ? '仮想通貨CFD - FiXi FX（フィクシー）' : 'Crypt Currency CFDs - FiXi FX' }}" />
                                        </div>
                                        <div class="col-lg-6">
                                            <h2>{{ $section3->{config('app.locale').'_title'} }}</h2>
                                            <div class="title_divider_dot"></div>
                                            <p>{!! $section3->{config('app.locale').'_desc'} !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif

                            @php isset($section) ? $section4 = $section->where('section_no', 4)->where('status', 1)->first() : '' @endphp
                            @if($section4)
                            <div class="mb-4">
                                <h3 class="">{{ $section4->{config('app.locale').'_title'} }}</h3>
                                <div class="title_divider_dot"></div>
                                <div class="table-wrapper tndices-table-main  uk-overflow-auto mt-3" id="crypto-table-id">
                                    <p>{!! $section4->{config('app.locale').'_desc'} !!}</p>
                                </div>
                            </div>
                            <div class="">
                                <p>{!! $section4->{config('app.locale').'_short_text'} !!}</p>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
@endsection

@push('scripts')
<script>
    $('#crypto-table-id').find('table').addClass('uk-table uk-table-middle uk-table-striped uk-table-small mb-0 tiny-table');
</script>
@endpush    