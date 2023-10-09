@php
    $keywords_jp = 'FiXi FX,フィクシー,ブログ,記事一覧';
    $description_jp = 'FiXi FX（フィクシー）のブログ記事一覧ページです。';
@endphp

@extends('front.layouts.master')

@section('content')
    @php $countries = App\Models\Country::where('currency_code', '!=', '')->get() @endphp

        @include('front.common.page_header')
        <div class="uk-section">
            <div class="uk-container blog-container">
                <div class="forex-table uk-padding-top-large mb-5">
                    <div class="forex-table-tab uk-margin-medium-top">
                        <ul class="uk-child-width-expand uk-margin-remove-bottom uk-tab">
                            @foreach($categories as $category)
                            <li class="{{($category->id == request()->category) ? 'uk-active' : ''}}">
                                <a class="line1" href="{{ route('page', ['locale' => config('app.locale'), 'slug' => $slug, 'article_id' => NULL, 'category' => $category->id]) }}" target="_self">{{ $category->{config('app.locale').'_name'}  }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="uk-grid">
                    @include('front.common.blog_side')
                    <div class="uk-width-2-3@m uk-flex-first">
                        <div class="inner-content">
                            @if(request()->author && $author)
                            <div class="author-info-sections mb-4">
                                <div>
                                    <h2 class="mb-2 h2-from-h4">{{ __('message.author') }}</h2>
                                    <div class="author-section-divider"></div>
                                    <div class="uk-flex uk-grid-column-small uk-grid-row-large uk-flex-between@s  my-3 uk-grid">
                                        <div class="uk-margin-left@s uk-first-column">
                                            <div class="author-image-div">
                                                <img loading="lazy" src="{{ $author->profile ?$author->profile: asset('front/img/no-user.png') }}" alt="{{ config('app.locale') == 'ja' ? 'FiXi FX（フィクシー）著者情報' : 'FiXi FX - author' }}">
                                            </div>
                                        </div>
                                        <div class="uk-width-expand mt-0">
                                            <h3 class="h3-from-h4">{{ $author->name }}</h3>
                                            <p class="my-2">{{ $author->{config('app.locale').'_description'} }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="uk-section i-padding-large-vertical@s " style="padding-top:0px;">
                                <div class="uk-container">
                                    <div class="row">
                                        @if(isset($random_articles[0]))
                                        <div class="col-lg-6 mb-4 mb-lg-0">
                                            <div class="Main_blog-div">
                                                <div class="blog-img mb-3">
                                                    <img loading="lazy" class="uk-align-center" style="height:200px;width:100%" src="{{ $random_articles[0]->image?$random_articles[0]->image:asset('front/img/default.png') }}" class="" alt="{{ $random_articles[0]->{config('app.locale').'_title'} }}">
                                                </div>
                                                <a class="line1" href="{{ route('detail', ['locale' => config('app.locale'),'slug' => $slug, 'article_id' => $random_articles[0]->id]) }}">
                                                    <h2 class="mb-2 mt-0 h2-from-h4">{{ $random_articles[0]->{config('app.locale').'_title'} }}</h2>
                                                </a>
                                                <div class="uk-flex uk-flex-middle">
                                                    @if(isset($random_articles[0]->authors->name))
                                                    <a class="line1"  href="{{route('page', ['locale' => config('app.locale'), 'slug' => $slug, 'article_id' => NULL, 'author' => $random_articles[0]->authors->id??NULL])}}"><b><span class="fs-14">{{ $random_articles[0]->authors->name ?? '' }}</span></b></a>
                                                    @endif
                                                    <span class="pl-3 fs-14">{{ $random_articles[0]->created_at ?(config('app.locale')=='ja'? $random_articles[0]->created_at->locale('ja_JP')->translatedFormat('Y年m月d日'): date('M d, Y', strtotime($random_articles[0]->created_at))) : ''}}</span>
                                                </div>
                                                <div class="blog-overview mt-3">
                                                    @if(strlen(utf8_decode($random_articles[0]->{config('app.locale').'_desc'})) > 100)
                                                    {!! strip_tags(Illuminate\Support\Str::limit($random_articles[0]->{config('app.locale').'_desc'}, 100))  !!}
                                                    @else
                                                    {!! $random_articles[0]->{config('app.locale').'_desc'} !!}
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        @if(count($random_articles) >= 1)
                                        <div class="col-lg-6">
                                            <div class="sidebar-widget sidebar-media-box uk-margin-medium-bottom">
                                                <ul class="uk-list uk-list-divider">
                                                    @for($i=1; $i<=4; $i++)
                                                    @if(isset($random_articles[$i]))
                                                    <li class="media-widget-card">
                                                        <div class="uk-flex uk-grid-column-small uk-grid-row-large uk-flex-between@s align-items-center my-3" uk-grid>
                                                            <div class="uk-margin-left@s">
                                                                <div class="media-img">
                                                                    <img loading="lazy" src="{{ $random_articles[$i]->image? $random_articles[$i]->image:asset('front/img/default.png') }}" data-src="{{ $random_articles[$i]->image }}" alt="{{ config('app.locale') == 'ja' ? 'FiXi FX（フィクシー）' : 'FiXi FX' }}" data-uk-img>
                                                                </div>
                                                            </div>
                                                            <div class="uk-width-expand mt-0">
                                                                <h5 class="m-0"><a class="line1" href="{{ route('detail', ['locale' => config('app.locale'),'slug' => $slug, 'article_id' => $random_articles[$i]->id]) }}">{{ $random_articles[$i]->{config('app.locale').'_title'} }}</a></h5>
                                                                <span class="fs-14">{{ $random_articles[$i]->created_at ?(config('app.locale')=='ja'? $random_articles[$i]->created_at->locale('ja_JP')->translatedFormat('Y年m月d日'): date('M d, Y', strtotime($random_articles[$i]->created_at))) : ''}}</span> 
                                                            </div>
                                                        </div>
                                                    </li>
                                                    @endif
                                                    @endfor
                                                </ul>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endif
                            <!-- <hr class="my-4"> -->
                            <div class="inner-features-wrap ">
                                <h2 class="mb-3 h2-from-h4">{{ __('message.blogs') }}</h2>
                                <div class="title_divider_dot"></div>
                                <div class="uk-first-column">
                                    @if(count($articles))
                                    <div class="forex-paragraf-info forex-instruments-info uk-margin-large-bottom">
                                        <ul class="uk-list blog-list-wrap uk-list-divider">
                                            @foreach($articles as $article)
                                            <li class="blog-widget-card">
                                                <div class="uk-flex uk-grid-column-small uk-grid-row-large uk-flex-between@s align-items-center my-4" uk-grid>
                                                    <div class="uk-width-1-3@s uk-margin-left@s">
                                                        <div class="blog-img">
                                                            <img loading="lazy" src="{{ $article->image?$article->image: asset('front/img/default.png')}}" alt="{{ $article->{config('app.locale').'_title'} }}">
                                                        </div>
                                                    </div>
                                                    <div class="uk-width-expand@s">
                                                        <h3 class="mb-2 m-0 h3-from-h4"><a class="line1"  href="{{ route('detail', ['locale' => config('app.locale'),'slug' => $slug, 'article_id' => $article->id]) }}">{{ $article->{config('app.locale').'_title'} }}</a></h3>
                                                        <div class="uk-flex uk-flex-middle">
                                                            @if(isset($article->authors->name))
                                                            <a class="line1" href="{{route('page', ['locale' => config('app.locale'), 'slug' => $slug, 'article_id' => NULL, 'author' => $article->authors->id??NULL])}}">
                                                                <b><span class="fs-14">{{ $article->authors->name ?? '' }}</span></b>
                                                            </a>
                                                            @endif
                                                           <span class="pl-3 fs-14 d-block"><i class="fas fa-calendar-alt mr-1"></i> {{ $article->created_at ?(config('app.locale')=='ja'? $article->created_at->locale('ja_JP')->translatedFormat('Y年m月d日'): date('M d, Y', strtotime($article->created_at))) : ''}}</span>
                                                        </div>
                                                        @if(strlen(utf8_decode($article->{config('app.locale').'_desc'})) > 150)
                                                        {!! Illuminate\Support\Str::limit($article->{config('app.locale').'_desc'}, 150) !!}
                                                        <a class="line1" href="{{ route('detail', ['locale' => config('app.locale'),'slug' => $slug, 'article_id' => $article->id]) }}"> {{ __('message.read_more') }}<i class="fa fa-arrow-right ml-2"></i></a>
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
                                    @else
                                    <!-- <div class="data_notfound_card">
                                        <div class="content">
                                            <img loading="lazy" src="" alt="data-not-found-image" data-uk-img>
                                            <h6>Data Not Found</h6>
                                        </div>

                                    </div> -->
                                    <div class="data_notfound_card">
                                        <div class="content">
                                            <img loading="lazy" src="/front/img/data-not-found.svg" alt="data-not-found-image" data-uk-img>
                                            <p class="p-from-h6">Data Not Found</p>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="advertise-banner">
                    <img loading="lazy" src="{{ asset('storage/Setting/'.getSettingValue('blog_side_banner')) }}" class="img-fluid" alt="Banner-Image">
                </div> -->
            </div>
        </div>

@endsection

@push('scripts')
<script>
    $(document).ready(function(){
        $('#from_code').val('USD');
        $('#to_code').val('JPY');

        currency_exchange($('#currency_amount').val(), $('#from_code').val(), $('#to_code').val());
    });

    $('#currency_form').on('change', '#currency_amount, #from_code, #to_code', function(){
        var amount = $('#currency_amount').val();
        var from_code = $('#from_code').val();
        var to_code = $('#to_code').val();
        currency_exchange(amount, from_code, to_code);
    });

    function currency_exchange(amount, from_code, to_code) {
        $.ajax({
            url: 'https://api.currencylayer.com/convert?access_key=156008d1a480152fc96284714da5a892&from='+from_code+'&to='+to_code+'&amount='+amount,
            dataType: 'jsonp',
            success: function(json) {
                $('#from_amt').html(amount);
                $('#from_currency').html(from_code);
                $('#result').html(json.result);
                $('#to_currency').html(to_code);
            }
        });
    }
</script>
@endpush

@push('css')
<style>
    .h3-from-h4, .h2-from-h4{
        font-size: 1.25rem;
    }
    .p-from-h6{
        margin: 16px 0 0;
        color: #717070;
        font-size: .875rem;
        line-height: 1.2;
        font-weight: 700;
    }
</style>
@endpush