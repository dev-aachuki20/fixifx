@php
    $keywords_jp = 'FX,FiXi,フィクシー,取引条件,利用規約';
    $description_jp = 'FiXi FX（フィクシー）の取引口座を開設しご利用いただくにあたり、ご同意いただく必要のある取引条件について記載しています。';
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
                            <div class="inner-features-wrap">
                                <div class="">
                                    @php $sub_secs = $section->where('section_no', '!=', 1)->where('status', 1) @endphp
                                    @if(count($sub_secs))
                                    <ul class="in-faq-5 uk-list-divider" uk-accordion>
                                        @foreach($sub_secs as $sec)
                                        <li>
                                            <a class="uk-accordion-title" href="#">{{ $sec->{config('app.locale').'_title'} }}</a>
                                            <div class="uk-accordion-content section_table">
                                                {!! $sec->{config('app.locale').'_desc'} !!}
                                                <div class="ss-box ss-circle" data-ss-content="false"></div>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
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
<script>
    setTimeout(function() {
        $('.section_table table').addClass('uk-table uk-table-striped uk-text-center uk-table-small');
    }, 100)
</script>
@endpush