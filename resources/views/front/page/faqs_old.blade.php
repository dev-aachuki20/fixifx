@php
    $keywords_jp = 'FiXi FX,フィクシー,よくある質問,FAQ,Q&A';
    $description_jp = 'FiXi FX（フィクシー）のFAQページ。よくある質問に対してQ&A方式で回答しています。';
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
                            <div class="inner-features-wrap">
                                <ul class="in-faq-5 uk-list-divider accordion_style2" uk-accordion>
                                @for($i=2; $i<=7; $i++)
                                    @php $data = $section->where('section_no', $i)->where('status', 1)->first() @endphp
                                    <li>
                                        @if($data && isset($faqs[$i]) && count($faqs[$i]))
                                        <h3 class=" uk-accordion-title">{{ $data->{config('app.locale').'_title'} }}</h3>
                                        <ul class="in-faq-5 uk-list-divider uk-accordion-content" uk-accordion>
                                            @foreach($faqs[$i] as $faq)
                                            <li>
                                                <span class="uk-accordion-title">{{ $faq->{config('app.locale').'_question'} }}</span>
                                                <div class="uk-accordion-content">
                                                    <p>{!! $faq->{config('app.locale').'_answer'} !!}</p>
                                                    <div class="ss-box ss-circle" data-ss-content="false"></div>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                        @endif
                                    </li>
                                @endfor
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
@endsection    