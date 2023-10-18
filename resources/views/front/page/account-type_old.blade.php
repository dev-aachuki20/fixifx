@php
    $keywords_jp = 'FiXi FX,フィクシー,口座タイプ,口座開設ボーナス';
    $description_jp = 'FiXi FX（フィクシー）では、お客様のニーズに合わせて４種類の口座タイプから選択可能。登録ボーナスもご用意しています。';
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
                                @php $section2 = $section->where('section_no', 2)->where('status', 1)->first() @endphp
                                @if($section2)
                                <div class="account-tables account_type_table uk-margin-medium-bottom section_table table-responsive">   
                                    {!! $section2->{config('app.locale').'_desc'} !!}
                                </div>
                                
                                @endif

                                <!-- <div class="uk-grid-small" uk-grid>
                                    <div class="uk-width-2-3@m">
                                    @php $section3 = $section->where('section_no', 3)->where('status', 1)->first() @endphp
                                    @if($section3)
                                        <h4 class="mb-3 ">{{ $section3->{config('app.locale').'_title'} }}</h4>
                                        <p>{!! $section3->{config('app.locale').'_desc'} !!}</p>
                                    @endif    

                                    @php $section4 = $section->where('section_no', 4)->where('status', 1)->first() @endphp
                                    @if($section4)
                                        <h4 class="">{{ $section4->{config('app.locale').'_title'} }}</h4>
                                        <p>{!! $section4->{config('app.locale').'_desc'} !!}</p>
                                    </div>
                                    @endif

                                    @php $section5 = $section->where('section_no', 5)->where('status', 1)->first() @endphp
                                    @if($section5)
                                    <div class="uk-width-1-3@m">
                                        <h3 class="mb-3 ">{{ $section5->{config('app.locale').'_title'} }}</h3>
                                        <div class="custom-card px-2" id="acc_small_table">
                                            <p>{!! $section5->{config('app.locale').'_desc'} !!}</p>
                                            <hr class="my-3">
                                            <div class="uk-text-center">
                                                <a href="" class="uk-button uk-button-dark uk-border-rounded">START TODAY</a>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div> -->

                                @if(isset($faqs[""]) && count($faqs[""]))
                                <div class="uk-padding uk-padding-remove-left uk-padding-remove-right">
                                    <ul class="in-faq-5 uk-list-divider" uk-accordion>
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
    
@endsection    

@push('scripts')
<script>
    setTimeout(function() {
        $('.section_table table').addClass('uk-table uk-table-striped uk-text-center');
        $('#acc_small_table').addClass('uk-table uk-table-middle uk-table-striped uk-table-small mb-0');
    }, 100)
</script>
@endpush