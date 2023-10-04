@extends('front.layouts.master')

@section('content')
@include('front.common.page_header')
<div class="uk-section">
    <div class="uk-container">
        <div class="uk-grid">
            @include('front.common.side_section')
            <div class="uk-width-2-3@m">
                <div class="inner-content">
                    <div class="inner-features-wrap">
                        <div class="uk-grid uk-child-width-1-1@s uk-child-width-1-1@m in-margin-bottom-30@s uk-margin-medium-bottom" data-uk-grid="">
                            <div class="uk-first-column">
                                <img loading="lazy" class="uk-align-center " src="{{asset('front/img/phone-partners.png')}}" alt="image-team">
                            </div>
                            @php $section1 = $section->where('section_no', 1)->first() @endphp
                            @if($section1)
                            <h3 class="">{{ $section1->{config('app.locale').'_title'} }}</h3>
                            <!-- <div class="title_divider_dot"></div> -->
                            {!! $section1->{config('app.locale').'_desc'} !!}
                            @endif

                        </div>
                    </div>
                    @php $section2 = $section->where('section_no', 2)->where('status', 1)->first() @endphp

                    @if($section2)
                    <div class="inner-features-wrap company_profile_wrapper">
                        <h3 class="">{{ $section2->{config('app.locale').'_title'} }}</h3>
                        <div class="uk-grid uk-grid-small uk-child-width-1-3@s uk-child-width-1-2 uk-margin-medium-top uk-margin-medium-bottom" data-uk-grid="">
                            @foreach($section2->subSection as $key=>$sec)
                            <div class="uk-text-center service-info-box">
                                <div class="custom_box">
                                    <div class="uk-margin-bottom">
                                        <img loading="lazy" src="{{asset($sec->image)}}" style="width:80px">
                                    </div>
                                    <div>
                                        <h5 class="mb-0">{{ $sec->{config('app.locale').'_title'} }}</h5>
                                        <p>{!! $sec->{config('app.locale').'_desc'} !!}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    @php $section3 = $section->where('section_no', 3)->where('status', 1)->first() @endphp
                    @if($section3)
                    <div class="inner-features-wrap company_profile_wrapper uk-margin-medium-bottom">
                        <div class="uk-text-center service-info-box uk-margin-bottom">
                            <div class="custom_box">
                                <div class="uk-margin-bottom">
                                    <img loading="lazy" src="{{asset($section3->image)}}" style="width:80px" class="uk-margin-small-bottom ">
                                    <h4 class="uk-margin-remove-top uk-margin-bottom">{{ $section3->{config('app.locale').'_title'} }}</h4>
                                    <h2 class="uk-margin-remove-top uk-margin-bottom uk-heading-small uk-text-danger">{{$section3->en_count_text}}</h2>
                                    <p>{!! $section3->{config('app.locale').'_desc'} !!}</p>
                                </div>
                                <img src="{{asset('front/img/partner-footer.svg')}}" style="max-width:100%;" alt="">
                            </div>
                        </div>
                    </div>
                    @endif
                    @php isset($section) ? $section4 = $section->where('section_no', 4)->where('status', 1)->first() : '' @endphp
                    @if($section4)
                    <div class="inner-features-wrap uk-margin-medium-bottom">
                        <h3 class="">{{ $section4->{config('app.locale').'_title'} }}</h3>
                        <div class="uk-grid uk-child-width-1-3@s uk-child-width-1-2 uk-margin-medium-top uk-margin-medium-bottom" data-uk-grid="">
                            @foreach($section4->subSection as $sec)
                            <div class="uk-text-center service-info-box">
                                <div class="uk-margin-bottom">
                                    <img loading="lazy" src="{{ asset($sec->image)}}" style="width:60px">
                                </div>
                                <div>
                                    <h5 class="mb-0">{{ $sec->{config('app.locale').'_title'} }}</h5>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        {!! $section4->{config('app.locale').'_desc'} !!}
                    </div>
                    @endif
                    @php isset($section) ? $section5 = $section->where('section_no', 5)->where('status', 1)->first() : '' @endphp

                    @if($section5)
                    <div class="inner-features-wrap uk-margin-medium-bottom">
                        <div class="in-profit-16">
                            <div class="in-create-account uk-text-left uk-margin-medium-top">
                                <span class="uk-label uk-text-small uk-text-uppercase uk-border-rounded uk-margin-small-bottom"> {{ $section5->{config('app.locale').'_title'} }}</span>
                                <p>{!! $section5->{config('app.locale').'_desc'} !!}</p>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @endsection