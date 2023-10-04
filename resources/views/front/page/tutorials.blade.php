@extends('front.layouts.master')

@section('content')
@include('front.common.page_header')
<div class="uk-section">
    <div class="uk-container">
        <div class="uk-grid">
            @include('front.common.article_side_section')
            <div class="uk-width-2-3@m uk-flex-first">
                <div class="inner-content">
                    @include('front.common.sub_header')

                    @if (request()->route()->getName() == 'page')

                    <div class="row">
                        <div class="col-6">
                            <div class="newsletter-widget tutorials_learn_card in-content-10 uk-margin-medium-bottom">
                                <div class="uk-card uk-card-primary uk-card-body uk-border-rounded uk-background-bottom-left uk-background-cover" style="background-image: url('{{ asset('front/img/forex.jpg') }}');">
                                    <div class="uk-flex uk-flex-center">
                                        <div class="uk-text-center">
                                            <h3 class="mt-0 mb-3">{{ __('message.learn_forex') }}</h3>
                                            <a href="{{ route('list', ['slug' => $slug, 'category_id' => 7]) }}" id="news_submit" class="uk-button uk-button-primary uk-border-rounded uk-text-white">{{ __('message.click_here') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="newsletter-widget tutorials_learn_card in-content-10 uk-margin-medium-bottom">
                                <div class="uk-card uk-card-primary uk-card-body uk-border-rounded uk-background-bottom-left uk-background-cover" style="background-image: url('{{ asset('front/img/cryptocurrency.jpg') }}');">
                                    <div class="uk-flex uk-flex-center">
                                        <div class="uk-text-center">
                                            <h3 class="mt-0 mb-3">{{ __('message.learn_crypto_currency') }}</h3>
                                            <a id="news_submit" href="{{ route('list', ['slug' => $slug, 'category_id' => 33]) }}" class="uk-button uk-button-primary uk-border-rounded uk-text-white">{{ __('message.click_here') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @if (request()->route()->getName() == 'list')
                    <h3 class="">
                        {{request()->route('category_id')==7?__('message.learn_forex'):__('message.learn_crypto_currency') }}
                    </h3>
                    @if (count($articles))
                    <div class="inner-features-wrap ">
                        <div class="uk-first-column">
                            <div class="forex-paragraf-info forex-instruments-info uk-margin-large-bottom">
                                <ul class="uk-list blog-list-wrap">

                                    @foreach ($articles as $article)

                                    <li class="blog-widget-card">
                                        <div class="uk-flex uk-grid-column-small uk-grid-row-large uk-flex-between@s align-items-center my-4" uk-grid>
                                            <div class="uk-width-1-3@s uk-margin-left@s">
                                                <div class="blog-img">
                                                    <img loading="lazy" src="{{ $article->image?$article->image:asset('front/img/default.png') }}" data-src="{{ $article->image }}" data-uk-img>
                                                </div>
                                            </div>
                                            <div class="uk-width-expand@s">
                                                <span class="mb-2 fs-14 d-block"><i class="fas fa-calendar-alt mr-1"></i>{{config('app.locale')=='en'?($article->event_date!=''?date('d-m-Y', strtotime($article->event_date)): date('d-m-Y', strtotime($article->created_at))):($article->event_date!=''?$article->event_date->locale('ja_JP')->translatedFormat('Y年m月d日'): $article->created_at->locale('ja_JP')->translatedFormat('Y年m月d日')) }}</span>
                                                <h4 class="mb-2 m-0 line1"><a href="{{ route('detail', ['locale' => config('app.locale'),'slug' => $slug, 'article_id' => $article->id]) }}">{{ $article->{config('app.locale') . '_title'} }}</a>
                                                </h4>
                                                @if (strlen(utf8_decode($article->{config('app.locale') . '_desc'})) > 15)
                                                {!! strip_tags(Illuminate\Support\Str::limit($article->{config('app.locale') . '_desc'}, 150)) !!}
                                                <br>
                                                <a href="{{ route('detail', ['locale' => config('app.locale'),'slug' => $slug, 'article_id' => $article->id]) }}">
                                                    {{ __('message.read_more') }} <i class="fa fa-arrow-right ml-2"></i></a>
                                                @else
                                                {!! $article->{config('app.locale') . '_desc'} !!}
                                                @endif
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            {{ $articles->links('front.common.pagination') }}
                        </div>
                    </div>
                    @else
                    <div class="data_notfound_card">
                        <div class="content">
                            <img loading="lazy" src="/front/img/data-not-found.svg" alt="data-not-found-image" data-uk-img>
                            <h6>Data Not Found</h6>
                        </div>
                    </div>
                    @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection