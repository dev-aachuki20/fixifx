@php
$blog_detail = true;
$detail_title = $article->{config('app.locale').'_title'};
$detail_ogp_image = $article->image;
$keywords_jp = 'FiXi,FiXi FX,フィクシー,ブログ';
$description_jp = 'FiXi FX（フィクシー）のブログ「'. $article->{config('app.locale').'_title'} . '」のページです。';
@endphp

@extends('front.layouts.master')

@section('content')

@include('front.common.page_header')
<div class="uk-section">
    <div class="uk-container">
        <div class="uk-grid">
            @if($slug == 'prex-blogs')
            @include('front.common.blog_side')
            @else
            @include('front.common.article_side_section')
            @endif
            <div class="uk-width-2-3@m uk-flex-first">
                <div class="inner-content">
                    <div class="section-title">
                        <h1 class="mb-3 detail-post-title">{{ $article->{config('app.locale').'_title'} }}</h1>
                        {{--
                                <h2 class="mb-3 ">{{ $article->{config('app.locale').'_title'} }}</h2>
                        --}}
                        <p class="uk-text-small uk-text-muted"><i class="fas fa-calendar mr-2"></i>{{config('app.locale')=='en'? date('d-m-Y', strtotime($article->created_at)) : $article->created_at->locale('ja_JP')->translatedFormat('Y年m月d日') }}</p>
                        @if($article->image)
                        <div class="mt-4">
                            <img class="uk-img uk-width-expand" src="{{ $article->image }}" data-src="{{ $article->image }}" alt="{{ $article->{config('app.locale').'_title'} }}" loading="lazy" data-uk-img>
                        </div>
                        @endif
                    </div>
                    <!-- <hr class="my-4"> -->
                    <div class="inner-features-wrap ">
                        {!! $article->{config('app.locale').'_desc'} !!}
                        @if($article->sub_image)
                        <div class="my-4">
                            <img class="uk-img" src="{{ $article->sub_image }}" data-src="{{ $article->sub_image }}" alt="{{ $article->{config('app.locale').'_title'} }}" loading="lazy" data-uk-img>
                        </div>
                        @endif
                        <hr class="mt-4 mb-2">
                        <div class="uk-flex uk-flex-wrap uk-flex-between uk-flex-middle">
                            <div class="in-article-tags my-2">
                                <i class="fas fa-tags"></i><span class="uk-margin-small-left uk-text-bold">{{ __('message.tags') }}: &nbsp;</span>
                                @php $tags = explode(',', $article->tags) @endphp
                                @foreach($tags as $k => $value)
                                <a href="{{route('page', ['locale' => config('app.locale'), 'slug' => $slug, 'article_id' => NULL, 'tag' => $value])}}"><span class="uk-link-muted">{{ $value }}</span></a>
                                @if(!($k == count($tags) - 1)),@endif
                                @endforeach
                            </div>
                            <div class="in-article-share my-2">
                                <div class="ss-box ss-circle" data-ss-content="false"></div>
                            </div>
                        </div>
                        @if($slug=='prex-blogs')
                        <hr class="mb-3 mt-2">
                        <div class="author-info-sections mb-4">
                            <div>
                                <p class="mb-2 p-from-h4">{{ __('message.author') }}</p>
                                <div class="author-section-divider"></div>
                                <div class="row mt-3 gy-4">
                                    <div class="col-lg-2 col-md-12 col-sm-12 text-center">
                                        <div class="author-image-div">
                                            <img src="{{ isset($article->authors->profile) ? $article->authors->profile : asset('front/img/no-user.png') }}" loading="lazy" alt="{{ $article->authors->name ?? 'FiXi FX' }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-10 col-md-12 col-sm-12">
                                        <p class="p-from-h3">{{ $article->authors->name ?? '' }}</p>
                                        <p>{{ $article->authors->{config('app.locale').'_description'} ?? '' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="mb-3 mt-2">
                        <div class="uk-position-relative uk-visible-toggle in-profit-7 uk-margin-medium-top uk-margin-medium-bottom" tabindex="-1" uk-slider>
                            <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-2@s uk-child-width-1-3@m uk-grid uk-grid-small">
                                @foreach($articles->random()->get() as $article)
                                <li class="">
                                    <article>
                                        <img class="uk-border-rounded" src="{{ $article->image }}" data-src="{{ $article->image }}" loading="lazy" alt="{{ $article->{config('app.locale').'_title'} }}" style="height: 200px;" width="340" height="170" data-uk-img>
                                        <p class="uk-margin-remove-bottom mt-3 p-from-h5">
                                            <a href="{{ route('detail', ['locale' => config('app.locale'), 'slug' => $slug, 'article_id' => $article->id]) }}">{{ $article->{config('app.locale').'_title'} }}</a>
                                        </p>
                                        <div class="uk-flex uk-flex-middle">
                                            <div>
                                                <i class="fas fa-history fa-xs"></i>
                                            </div>
                                            <div>
                                                <span class="uk-text-small uk-text-uppercase uk-text-muted uk-margin-small-left">{{ timeDiff($article->created_at) }}</span>
                                            </div>
                                        </div>
                                    </article>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @else
                        <hr class="mb-3 mt-2">
                        <div class="uk-position-relative uk-visible-toggle in-profit-7 uk-margin-medium-top uk-margin-medium-bottom" tabindex="-1" uk-slider>
                            <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-2@s uk-child-width-1-3@m uk-grid uk-grid-small">
                                @php $news = $home_articles->where('category', 'News')->first() @endphp
                                @if(isset($news))
                                <li class="">
                                    <article>
                                        <img class="uk-border-rounded" src="{{ $news->image }}" data-src="{{ $news->image }}" alt="{{ $news->{config('app.locale').'_title'} }}" width="340" loading="lazy" height="170" data-uk-img>
                                        <p class="uk-margin-remove-bottom mt-3 p-from-h5">
                                            <a href="{{ route('detail', ['locale' => config('app.locale'), 'slug' => 'event-news', 'article_id' => $news->id]) }}">{{ $news->{config('app.locale').'_title'} }}</a>
                                        </p>
                                        <div class="uk-flex uk-flex-middle">
                                            <div>
                                                <i class="fas fa-history fa-xs"></i>
                                            </div>
                                            <div>
                                                <span class="uk-text-small uk-text-uppercase uk-text-muted uk-margin-small-left">{{ timeDiff($article->created_at) }}</span>
                                            </div>
                                        </div>
                                    </article>
                                </li>
                                @endif

                                @php $feature = $home_articles->where('category', 'Features')->first() @endphp
                                @if(isset($feature))
                                <li>
                                    <article>
                                        <img class="uk-border-rounded" src="{{ $feature->image }}" data-src="{{ $feature->image }}" alt="{{ $feature->{config('app.locale').'_title'} }}" width="340" height="170" loading="lazy" data-uk-img>
                                        <p class="uk-margin-remove-bottom mt-3 p-from-h5">
                                            <a href="{{ route('detail', ['locale' => config('app.locale'), 'slug' => 'event-news', 'article_id' => $feature->id]) }}">{{ $feature->{config('app.locale').'_title'} }}</a>
                                        </p>
                                        <div class="uk-flex uk-flex-middle">
                                            <div>
                                                <i class="fas fa-history fa-xs"></i>
                                            </div>
                                            <div>
                                                <span class="uk-text-small uk-text-uppercase uk-text-muted uk-margin-small-left">{{ timeDiff($article->created_at) }}</span>
                                            </div>
                                        </div>
                                    </article>
                                </li>
                                @endif

                                @php $analysis = $home_articles->where('category', 'Analysis')->first() @endphp
                                @if(isset($analysis))
                                <li>
                                    <article>
                                        <img class="uk-border-rounded" src="{{ $analysis->image }}" data-src="{{ $analysis->image }}" alt="{{ $analysis->{config('app.locale').'_title'} }}" width="340" height="170" data-uk-img loading="lazy">
                                        <p class="uk-margin-remove-bottom mt-3 p-from-h5">
                                            <a href="{{ route('detail', ['locale' => config('app.locale'), 'slug' => 'event-news', 'article_id' => $analysis->id]) }}">{{ $analysis->{config('app.locale').'_title'} }}</a>
                                        </p>
                                        <div class="uk-flex uk-flex-middle">
                                            <div>
                                                <i class="fas fa-history fa-xs"></i>
                                            </div>
                                            <div>
                                                <span class="uk-text-small uk-text-uppercase uk-text-muted uk-margin-small-left">{{ timeDiff($analysis->created_at) }}</span>
                                            </div>
                                        </div>
                                    </article>
                                </li>
                                @endif

                            </ul>
                        </div>
                        @endif

                        <hr class="mb-3 mt-3">

                        @include('front.common.leave_reply')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('css')
<style>
    .p-from-h4 {
        color: #001e32;
        font-size: 1.25rem;
        font-weight: 700;
        line-height: 1.2;
    }

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