@php
    $keywords_jp = 'FiXi,フィクシー,イベント,お知らせ,ニュース';
    $description_jp = 'FiXi FX（フィクシー）のイベントに関するお知らせ･ニュース一覧ページです。';
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
                                <div class="forex-paragraf-info forex-instruments-info">
                                    <ul class="uk-list blog-list-wrap">
                                        @foreach($articles as $article)
                                        <li class="blog-widget-card">
                                            <div class="uk-flex uk-grid-column-small uk-grid-row-large uk-flex-between@s align-items-center my-4" uk-grid>
                                                <div class="uk-width-1-3@s uk-margin-left@s">
                                                    <div class="blog-img">
                                                        <img src="{{ $article->image }}" data-src="{{ $article->image }}" loading="lazy" alt="{{ config('app.locale') == 'ja' ? 'FiXi FX（フィクシー）' : 'FiXi FX' }}" data-uk-img>
                                                    </div>
                                                </div>
                                                <div class="uk-width-expand@s">
                                                    <span class="mb-2 fs-14 d-block"><i class="fas fa-calendar-alt mr-1"></i>{{config('app.locale')=='en'? date('d-m-Y', strtotime($article->created_at)) : $article->created_at->locale('ja_JP')->translatedFormat('Y年m月d日') }}</span>
                                                    <h3 class="mb-2 m-0 h3-from-h4"><a class="line1" href="{{ route('detail', ['locale' => config('app.locale'), 'slug' => $slug, 'article_id' => $article->id]) }}">{{ $article->{config('app.locale').'_title'} }}</a></h3>
                                                    @if(strlen(utf8_decode($article->{config('app.locale').'_desc'})) > 150)
                                                    {!! Illuminate\Support\Str::limit($article->{config('app.locale').'_desc'}, 200) !!}
                                                    </p>
                                                    <a  class="line1 read-more-link" href="{{ route('detail', ['locale' => config('app.locale'), 'slug' => $slug, 'article_id' => $article->id]) }}" aria-label="{{ $article->{config('app.locale').'_title'} }}"> {{-- __('message.read_more') --}}<i class="fa fa-arrow-right ml-2"></i></a>
                                                    @else
                                                    {!! $article->{config('app.locale').'_desc'} !!}
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
                    </div>
                </div>
            </div>
        </div>
    
@endsection

@push('css')
<style>
    .h3-from-h4{
        font-size: 1.25rem;
    }
    .read-more-link{
        position: relative;
    }
    .read-more-link:before{
        content: "{{ config('app.locale') == 'ja' ? '続きを読む' : 'read more...' }}";
    }
</style>
@endpush