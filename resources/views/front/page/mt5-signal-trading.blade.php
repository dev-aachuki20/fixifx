@php
    $keywords_jp = 'MetaTrader 5,MT5,シグナル取引,自動売買';
    $description_jp = 'MetaTrader 5のトレーディング･シグナルでは、他のトレーダーが行った取引をリアルタイムでコピー可能。何千もの取引戦略やシグナルに簡単かつ即座にアクセスすることができます。';
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


                                <div class="uk-grid uk-child-width-1-2@s uk-child-width-1-2@m in-margin-bottom-30@s uk-margin-medium-bottom" data-uk-grid="">
                                    @php $section3 = $section->where('section_no', 3)->where('status', 1)->first() @endphp
                                    @if($section3)
                                    <div class="uk-first-column">
                                        <h3 class="">{{ $section3->{config('app.locale').'_title'} }}</h3>
                                        <div class="title_divider_dot"></div>
                                        <div class="uk-cover-container uk-height-medium mt-3" id="youtubeEmbed1">
                                            <iframe uk-cover="" src="{{ 'https://www.youtube.com/embed/'.$section3->getRawOriginal('video_url') }}" allowfullscreen="allowfullscreen" uk-responsive uk-video="automute: true" class="uk-cover uk-responsive-width" title="{{ config('app.locale') == 'ja' ? 'MT5のチュートリアル動画' : 'MT5 tutorial movie' }}"></iframe>
                                        </div>
                                    </div>
                                    @endif

                                    @php $section4 = $section->where('section_no', 4)->where('status', 1)->first() @endphp
                                    @if($section4)
                                    <div class="in-margin-small-top@s in-margin-bottom@s">
                                        <h3 class="">{{ $section4->{config('app.locale').'_title'} }}</h3>
                                        <div class="title_divider_dot"></div>
                                        <div class="uk-cover-container uk-height-medium mt-3" id="youtubeEmbed2">
                                            <iframe uk-cover src="{{ 'https://www.youtube.com/embed/'.$section4->getRawOriginal('video_url') }}" class="uk-cover uk-responsive-width" allowfullscreen="allowfullscreen" uk-responsive uk-video="automute: true" title="{{ config('app.locale') == 'ja' ? 'MT5のチュートリアル動画' : 'MT5 tutorial movie' }}"></iframe>
                                        </div>
                                    </div>
                                    @endif
                                </div>

                                @php $section5 = $section->where('section_no', 5)->where('status', 1)->first() @endphp
                                @if($section5)
                                <div class="uk-margin-medium-bottom">
                                    <h3 class="">{{ $section5->{config('app.locale').'_title'} }}</h3>
                                    <div class="title_divider_dot"></div>
                                    {!! $section5->{config('app.locale').'_desc'} !!}
                                </div>
                                @endif

                                @php $section6 = $section->where('section_no', 6)->where('status', 1)->first() @endphp
                                @if($section6)
                                <div class="uk-margin-medium-bottom">
                                    <h3 class="">{{ $section6->{config('app.locale').'_title'} }}</h3>
                                    <div class="title_divider_dot"></div>
                                    {!! $section6->{config('app.locale').'_desc'} !!}
                                </div>
                                @endif

                                @php $section7 = $section->where('section_no', 7)->where('status', 1)->first() @endphp
                                @if($section7)
                                <div class="uk-card uk-card-default uk-card-body uk-border-rounded uk-margin-medium-bottom">
                                    <h3 class="mb-2">{{ $section7->{config('app.locale').'_title'} }}</h3>
                                    {!! $section7->{config('app.locale').'_desc'} !!}
                                    <div class="user-button-flex">
                                        <a class="uk-button uk-button-dark uk-border-rounded mr-2 mb-2" rel="noreferrer noopener" target="_blank" href="{{ getSettingValue('live_link') }}">{{ getSettingValue('live_link_btn_'.config('app.locale')) }}</a>
                                        <a class="uk-button uk-button-primary uk-border-rounded mb-2" rel="noreferrer noopener" target="_blank" href="{{ getSettingValue('demo_link') }}">{{ getSettingValue('demo_link_btn_'.config('app.locale')) }}</a>
                                    </div>
                                </div>
                                @endif

                                @php $section8 = $section->where('section_no', 8)->where('status', 1)->first() @endphp
                                @if($section8)
                                <div class="in-profit-16 uk-margin-medium-bottom">
                                    <div class="in-create-account uk-text-left uk-margin-medium-top">
                                        <span class="uk-label uk-text-small uk-text-uppercase uk-border-rounded uk-margin-small-bottom">{{ $section8->{config('app.locale').'_title'} }}</span>

                                        {!! $section8->{config('app.locale').'_desc'} !!}
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