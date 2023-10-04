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
                            <!-- <hr class="my-4"> -->
                            @if(count($articles))
                            <div class="inner-features-wrap ">
                                <div class="uk-first-column">
                                    <!-- <h3 class="">Indices Trading</h3> -->
                                    <div class="forex-paragraf-info forex-instruments-info uk-margin-large-bottom">
                                        <ul class="uk-list blog-list-wrap">
                                            @foreach($articles as $article)
                                            <li class="blog-widget-card">
                                                <div class="uk-flex uk-grid-column-small uk-grid-row-large uk-flex-between@s align-items-center my-4" uk-grid>
                                                    <div class="uk-width-1-3@s uk-margin-left@s">
                                                        <div class="blog-img">
                                                            <img src="{{ $article->thumb_img ? $article->thumb_img : ($article->image ?: asset('front/img/default.png'))}}" data-src="{{ $article->thumb_img ?: ($article->image ?: NULL) }}" alt="profit-icon" data-uk-img loading="lazy">
                                                        </div>
                                                    </div>
                                                    <div class="uk-width-expand@s">
                                                        <span class="mb-2 fs-14 d-block"><i class="fas fa-calendar-alt mr-1"></i>{{config('app.locale')=='en'?($article->event_date!=''?date('d-m-Y', strtotime($article->event_date)): date('d-m-Y', strtotime($article->created_at))):($article->event_date!=''?$article->event_date->locale('ja_JP')->translatedFormat('Y年m月d日'): $article->created_at->locale('ja_JP')->translatedFormat('Y年m月d日')) }}</span>
                                                        <h4 class="mb-2 m-0"><a href="{{ route('detail', ['locale'=>config('app.locale'),'slug' => $slug, 'article_id' => $article->id]) }}">{{ $article->{config('app.locale').'_title'} }}</a></h4>
                                                        @if(strlen(utf8_decode($article->{config('app.locale').'_desc'})) > 150)
                                                        {!! strip_tags(Illuminate\Support\Str::limit($article->{config('app.locale').'_desc'}, 150)) !!}
                                                        <br>
                                                        <a href="{{ route('detail', ['locale'=>config('app.locale'),'slug' => $slug, 'article_id' => $article->id]) }}"> {{ __('message.read_more') }} <i class="fa fa-arrow-right ml-2"></i></a>
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
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
@endsection 