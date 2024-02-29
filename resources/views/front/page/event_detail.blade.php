@php
$blog_detail = true;
$detail_title = $article->{config('app.locale').'_title'};
$detail_ogp_image = $article->image;
$keywords_jp = 'FiXi,FiXi FX,フィクシー,ニュース';
$description_jp = 'FiXi FX（フィクシー）の「'. $article->{config('app.locale').'_title'} . '」に関するお知らせページです。';
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
                    <div class="section-title">
                        <h1 class="mb-3 detail-post-title">{{ $article->{config('app.locale').'_title'} }}</h1>
                        <p class="uk-text-small m-0 uk-text-muted">
                           {{-- @if($article->event_date)
                            <span><b>{{ __('message.event_date') }} :</b> {{config('app.locale') == 'en' ? date('d-m-Y', strtotime($article->event_date)): $article->event_date->locale('ja_JP')->translatedFormat('Y年m月d日') }}</span> ,
                            @endif --}}

                            @if($article->event_date)
                            <span>
                                <b>{{ __('message.event_date') }} :</b>
                                @if(config('app.locale') == 'en')
                                {{ date('d-m-Y', strtotime($article->event_date)) }}
                                @else
                                @php
                                $eventDate = is_string($article->event_date) ? \Carbon\Carbon::parse($article->event_date) : $article->event_date;
                                @endphp
                                {{ $eventDate->locale('ja_JP')->translatedFormat('Y年m月d日') }}
                                @endif
                            </span> ,
                            @endif




                            <span class="ml-2"><b>{{ __('message.post_date') }} :</b> {{config('app.locale')=='en' ? date('d-m-Y', strtotime($article->created_at)): $article->created_at->locale('ja_JP')->translatedFormat('Y年m月d日') }}</span>
                        </p>
                    </div>
                    <!-- <hr class="my-4"> -->
                    <div class="inner-features-wrap ">
                        {!! $article->{config('app.locale').'_desc'} !!}
                        @if($article->image)
                        <div class="my-4">
                            <img class="uk-img" src="{{ $article->image }}" data-src="{{ $article->image }}" loading="lazy" alt="logo" data-uk-img>
                        </div>
                        @endif

                        <hr class="mt-4 mb-2">
                        <div class="uk-flex uk-flex-wrap uk-flex-between uk-flex-middle">
                            <div class="in-article-tags my-2">
                                <i class="fas fa-tags"></i><span class="uk-margin-small-left uk-text-bold">{{ __('message.tags') }}: &nbsp;</span>
                                @php $tags = explode(',', $article->tags) @endphp
                                @foreach($tags as $k => $value)
                                @if(!empty($value))
                                <a href="{{route('page', ['locale'=> config('app.locale'), 'slug' => $slug, 'article_id' => NULL, 'tag' => $value])}}">{{ $value }}</a>
                                @if(!($k == count($tags) - 1)),@endif
                                @endif
                                @endforeach
                            </div>
                            <div class="in-article-share my-2">
                                <div class="ss-box ss-circle" data-ss-content="false"></div>
                            </div>
                        </div>
                        <hr class="mb-3 mt-2">
                        <div class="my-4 uk-text-center user-button-flex"><a href="javascript:history.back()" class="uk-button uk-button-dark uk-border-rounded mt-2 mt-sm-0">{{ __('message.go_back') }}</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('css')
<style>
    .detail-post-title {
        font-size: 1.7rem;
    }

    @media(min-width:960px) {
        .detail-post-title {
            font-size: 2rem;
        }
    }
</style>
@endpush

@push('scripts')
<script>
    window.addEventListener('load', () => {
        addAriaLabel('ss-btn-facebook', 'Facebook');
        addAriaLabel('ss-btn-twitter', 'Twitter');
        addAriaLabel('ss-btn-linkedin', 'LinkedIn');
        addAriaLabel('ss-btn-whatsapp', 'WhatsApp');
        addAriaLabel('ss-btn-telegram', 'Telegram');
    });

    function addAriaLabel(className, label) {
        let ariaTarget = document.getElementsByClassName(className);
        for (let i = 0, len = ariaTarget.length; i < len; i++) {
            ariaTarget[i].setAttribute('aria-label', label);
        }
    }
</script>
@endpush