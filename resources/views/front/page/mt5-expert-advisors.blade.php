@php
    $keywords_jp = 'MetaTrader 5,MT5,ハンズフリー,自動売買';
    $description_jp = 'エキスパートアドバイザー（EA）はMetaTrader5上での自動売買を可能にします。各エキスパートアドバイザーはユニークで、ユーザーの好みに合わせて構築されています。';
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
                            <div class="inner-features-wrap ">
                                @php $section2 = $section->where('section_no', 2)->where('status', 1)->first() @endphp
                                @if($section2)
                                <div class="uk-margin-medium-bottom">
                                    {!! $section2->{config('app.locale').'_desc'} !!}
                                </div>
                                @endif

                                @php $section3 = $section->where('section_no', 3)->where('status', 1)->first() @endphp
                                @if($section3)
                                <h3 class="">{{ $section3->{config('app.locale').'_title'} }}</h3>
                                <div class="title_divider_dot"></div>
                                <div class="uk-cover-container uk-height-large mt-3">
                                    <iframe uk-cover src="https://www.youtube.com/embed/{{$section3->getRawOriginal('video_url')}}" allowfullscreen uk-responsive uk-video="automute: true" title="{{ config('app.locale') == 'ja' ? 'YouTube解説動画' : 'YouTube movie' }}"></iframe>
                                </div>
                                @endif

                                @php $section4 = $section->where('section_no', 4)->where('status', 1)->first() @endphp
                                @if($section4)
                                <h3 class="">{{ $section4->{config('app.locale').'_title'} }}</h3>
                                <div class="title_divider_dot"></div>
                                {!! $section4->{config('app.locale').'_desc'} !!}
                                @endif

                                @php $section5 = $section->where('section_no', 5)->where('status', 1)->first() @endphp
                                @if($section5)
                                <h3 class="">{{ $section5->{config('app.locale').'_title'} }}</h3>
                                <div class="title_divider_dot"></div>
                                {!! $section5->{config('app.locale').'_desc'} !!}
                                <div class="uk-cover-container uk-height-large">
                                    <iframe uk-cover src="https://www.youtube.com/embed/{{$section5->getRawOriginal('video_url')}}" allowfullscreen uk-responsive uk-video="automute: true" title="{{ config('app.locale') == 'ja' ? 'YouTube解説動画' : 'YouTube movie' }}"></iframe>
                                </div>
                                @endif

                                @php $section6 = $section->where('section_no', 6)->where('status', 1)->first() @endphp
                                @if($section6)
                                <h3 class="">{{ $section6->{config('app.locale').'_title'} }}</h3>
                                <div class="title_divider_dot"></div>
                                {!! $section4->{config('app.locale').'_desc'} !!}

                                @if(count($section6->subSection))
                                <div class="uk-margin-medium-top uk-margin-medium-bottom company_profile_wrapper" uk-slider="autoplay: true; autoplay-interval: 2000" >
                                    <div class="uk-slider-items uk-child-width-1-2@s uk-child-width-1-2@m uk-grid-small uk-grid">
                                    @foreach($section6->subSection as $sub_sec)
                                        <!-- <div class="uk-flex uk-flex-wrap mb-4 custom_box">
                                            <div class="uk-width-auto@s flex-shrink-0 uk-margin-left@s uk-margin-small-bottom uk-padding-remove-top">
                                                <div class="uk-margin-right in-icon-wrap circle medium flex-shrink-0">
                                                    <i class="fa-xl {{$sub_sec->icon}}"></i>
                                                </div>
                                            </div>
                                            <div class="uk-width-4-5@s">
                                                <h4 class="mb-2">{{ $sub_sec->{config('app.locale').'_title'} }}</h4>
                                                <p>{!! $sub_sec->{config('app.locale').'_desc'} !!}</p>
                                            </div>
                                        </div> -->

                                        <div>
                                            <div class="custom_box d-flex flex-column custom_box_shadow uk-text-center">
                                                <div class="uk-margin-right circle medium flex-shrink-0">
                                                    <img src="{{ asset('front/img/icons/page-icon/How-Upload-Your-Expert-Advisors/'.$sub_sec->icon) }}" class="page_icon" loading="lazy" alt="{{ config('app.locale') == 'ja' ? 'MT5自動売買 - FiXi FX（フィクシー）' : 'MT5 automation - FiXi FX' }}">
                                                </div>
                                                <h4 class="mt-3 mb-0" style="word-break: break-word">
                                                {{ $sub_sec->{config('app.locale').'_title'} }}
                                                </h4>
                                                <p class="mb-0">
                                                {!! $sub_sec->{config('app.locale').'_desc'} !!}
                                                </p>
                                            </div>
                                        </div>
                                    @endforeach
                                    </div>
                                    <div class="uk_slider_nav">
                                        <ul class=" uk-slider-nav uk-dotnav"></ul>
                                    </div>
                                </div>
                                @endif
                                <div class="uk-cover-container uk-height-large uk-margin-medium-bottom">
                                     <iframe uk-cover src="https://www.youtube.com/embed/{{$section6->getRawOriginal('video_url')}}" allowfullscreen uk-responsive uk-video="automute: true" title="{{ config('app.locale') == 'ja' ? 'YouTube解説動画' : 'YouTube movie' }}"></iframe>
                                </div>
                                @endif

                                @php $section7 = $section->where('section_no', 7)->where('status', 1)->first() @endphp
                                @if($section7)
                                <div class="uk-margin-medium-bottom">
                                    <h3 class="">{{ $section7->{config('app.locale').'_title'} }}</h3>
                                    <div class="title_divider_dot"></div>
                                    {!! $section7->{config('app.locale').'_desc'} !!}
                                </div>
                                @endif

                                @php $section8 = $section->where('section_no', 8)->where('status', 1)->first() @endphp
                                @if($section8)
                                <div class="uk-margin-medium-bottom">
                                    <h3 class="">{{ $section8->{config('app.locale').'_title'} }}</h3>
                                    <div class="title_divider_dot"></div>
                                    {!! $section8->{config('app.locale').'_desc'} !!}
                                </div>
                                @endif

                                @php $section9 = $section->where('section_no', 9)->where('status', 1)->first() @endphp
                                @if($section9)
                                <div class="uk-card uk-card-default uk-card-body uk-border-rounded mb-4">
                                    <h3 class="mb-2">{{ $section9->{config('app.locale').'_title'} }}</h3>
                                    {!! $section9->{config('app.locale').'_desc'} !!}
                                    <div class="user-button-flex">
                                        <a rel="noreferrer noopener" target="_blank" class="uk-button uk-button-dark uk-border-rounded mr-2 mb-2" href="{{ getSettingValue('live_link') }}">{{ getSettingValue('live_link_btn_'.config('app.locale')) }}</a>
                                        <a rel="noreferrer noopener" target="_blank" class="uk-button uk-button-primary uk-border-rounded mb-2" href="{{ getSettingValue('demo_link') }}">{{ getSettingValue('demo_link_btn_'.config('app.locale')) }}</a>
                                    </div>
                                </div>
                                @endif

                                @php $section10 = $section->where('section_no', 10)->where('status', 1)->first() @endphp
                                @if($section10)
                                <div class="in-profit-16">
                                    <div class="in-create-account uk-text-left uk-margin-medium-top">
                                        <span class="uk-label uk-text-small uk-text-uppercase uk-border-rounded uk-margin-small-bottom">{{ $section10->{config('app.locale').'_title'} }}</span>
                                        {!! $section10->{config('app.locale').'_desc'} !!}
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
@endsection    