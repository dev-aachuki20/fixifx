@php
    $keywords_jp = '金融,マーケット,株式,FX,ニュース';
    $description_jp = '最新の金融、マーケット、株式、投資信託など、リアルタイムのグローバルな動向がわかるニュースを掲載しています。';
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

                            <!-- @php $section2 = $section->where('section_no', 2)->where('status', 1)->first() @endphp
                            <div class="inner-features-wrap ">
                                @if($section2)
                                    {!! $section2->{config('app.locale').'_desc'} !!}
                                @endif
                            </div> -->

                            <div class="inner-features-wrap ">
                                <div class="forex-paragraf-info forex-instruments-info">
                                    <ul class="uk-list blog-list-wrap">
                                        @foreach($articles as $article)
                                        <li class="blog-widget-card">
                                            <div class="uk-flex uk-grid-column-small uk-grid-row-large uk-flex-between@s align-items-center my-4" uk-grid>
                                                <div class="uk-width-1-3@s uk-margin-left@s">
                                                    <div class="blog-img">
                                                        <img src="{{ $article->thumb_img ?: $article->image }}" data-src="{{ $article->thumb_img ?: $article->image }}" loading="lazy" alt="{{ config('app.locale') == 'ja' ? 'FX金融市場ニュース - FiXi FX（フィクシー）' : 'Market news - FiXi FX' }}" data-uk-img>
                                                    </div>
                                                </div>
                                                <div class="uk-width-expand@s">
                                                    <span class="mb-2 fs-14 d-block"><i class="fas fa-calendar-alt mr-1"></i>{{config('app.locale')=='en'?($article->event_date!=''?date('d-m-Y', strtotime($article->event_date)): date('d-m-Y', strtotime($article->created_at))):($article->event_date!=''?($article->created_at->locale('ja_JP'))->translatedFormat('Y年m月d日'): $article->created_at->locale('ja_JP')->translatedFormat('Y年m月d日')) }}</span>
                                                    <h3 class="mb-2 m-0 h3-from-h4"><a class="line1" href="{{ route('detail', ['locale' => config('app.locale'), 'slug' => $slug, 'article_id' => $article->slug_url]) }}">{{ $article->{config('app.locale').'_title'} }}</a></h3>
                                                    @if(strlen(utf8_decode($article->{config('app.locale').'_desc'})) > 150)
                                                    {!! strip_tags(Illuminate\Support\Str::limit($article->{config('app.locale').'_desc'}, 150)) !!}
                                                    <a class="line1 read-more-link" href="{{ route('detail', ['locale' => config('app.locale'), 'slug' => $slug, 'article_id' => $article->slug_url]) }}" aria-label="{{ $article->{config('app.locale').'_title'} }}">{{-- __('message.read_more') --}}<i class="fa fa-arrow-right ml-2"></i></a>
                                                    @else
                                                    {!! strip_tags($article->{config('app.locale').'_desc'} )!!}
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