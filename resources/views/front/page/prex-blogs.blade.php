@php



if(config('app.locale') == 'ja'){
$description_jp = 'FiXi FX（フィクシー）のブログ記事一覧ページです。';
$keywords_jp = 'FiXi FX,フィクシー,ブログ,記事一覧';
}

function flagTextJP($target){
if($target == 'USD'){
$target = 'アメリカドル';
}else if($target == 'JPY'){
$target = '日本円';
}else if($target == 'EUR'){
$target = 'ユーロ';
}else if($target == 'GBP'){
$target = 'ポンド';
}else if($target == 'AUD'){
$target = 'オーストラリア･ドル';
}else if($target == 'NZD'){
$target = 'ニュージーランド･ドル';
}else if($target == 'CAD'){
$target = 'カナダ･ドル';
}else if($target == 'CHF'){
$target = 'スイス･フラン';
}else if($target == 'CNY'){
$target = '中国人民元';
}else{
$target = '通貨国旗';
}
return $target;
}



@endphp


@extends('front.layouts.base')


@section('content')
@include('front.layouts.partials.blogs.blog_hero')

<!-- Blog category list section-->
<section class="blog-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="blog-tab">
                    <ul class="tab-listing nav  nav-tabs" id="nav-tab">
                        @foreach($categories as $category)
                        @if($category->id !== 3 && $category->id !== 7 && $category->id !== 33)
                        <li>
                            <a class="nav-link {{($loop->first && !request()->has('category')) || ($category->id == request()->category) ? 'active' : ''}}" href="{{ route('page', ['locale' => config('app.locale'), 'slug' => $slug, 'article_id' => NULL, 'category' => $category->id]) }}" id="nav-home-tab" data-bs-target="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">{{ $category->{config('app.locale').'_name'}  }}</a>
                        </li>
                        @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end  -->

<!-- marketData-wrapper  -->
<section class="marketData-wrapper">
    <div class="marketData-list">
        <div class="swiper-container marketData-slide">
            <ul class="swiper-wrapper">
                @foreach($currency_changes as $key => $changes)
                <li class="swiper-slide">
                    <div class="marketData-trading-list">
                        <div class="uk-flag">
                            @php
                            $flag_1_text = substr($key, 0, 3);
                            $flag_2_text = substr($key, 3, 3);

                            if(config('app.locale') == 'ja'){
                            $flag_1_text = flagTextJP($flag_1_text);
                            $flag_2_text = flagTextJP($flag_2_text);
                            }
                            @endphp
                            <span>
                                <img class="img-fluid" src="{{ $changes['flag_1'] }}" alt="{{ $flag_1_text }}">
                            </span>
                            <span>
                                <img class="img-fluid" src="{{ $changes['flag_2'] }}" alt="{{ $flag_2_text }}">
                            </span>
                        </div>
                        <div class="data-title">
                            <span>{{ $key }}</span>
                        </div>
                        <div class="marketData-value {{ $changes['change_pct'] > 0 ? 'marketUp' : 'marketDown' }}">
                            <span class="{{$key}}">
                                {{ number_format($changes['end_rate'], 6-(strlen((int)$changes['end_rate']))) }}
                            </span>
                            <span class="{{$key}}_change_pct">
                                @if($changes['change_pct'] > 0)
                                <svg width="9" height="11" viewBox="0 0 9 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.380285 3.6671C0.381399 3.66596 0.382536 3.66485 0.383673 3.66371L3.87969 0.163106C3.90747 0.135478 3.93816 0.11094 3.97122 0.0898974L4.07188 0.0349859L4.14052 0.012099L4.19086 0.0120989C4.26799 -0.00207937 4.34708 -0.00207938 4.42423 0.0120989L4.46999 0.0120989L4.5249 0.0120989L4.6027 0.0532825C4.64605 0.0768344 4.68607 0.10607 4.72168 0.140219L8.23142 3.66371C8.46645 3.89687 8.46797 4.27642 8.23481 4.51145C8.2337 4.51259 8.23256 4.5137 8.23142 4.51484C7.99451 4.74088 7.6218 4.74088 7.38486 4.51484L5.29366 2.4282C5.20344 2.33974 5.05857 2.34116 4.97011 2.4314C4.92895 2.47338 4.90553 2.52958 4.90471 2.58837L4.90471 9.40196C4.90473 9.73304 4.63637 10.0014 4.3053 10.0015C3.97422 10.0015 3.70584 9.73312 3.7058 9.40205L3.7058 9.40196L3.7058 2.58837C3.70401 2.46203 3.60016 2.36102 3.47382 2.3628C3.41504 2.36364 3.35882 2.38704 3.31685 2.4282L1.23478 4.51484C0.997267 4.7438 0.621165 4.7438 0.383652 4.51484C0.148627 4.28168 0.147104 3.90213 0.380285 3.6671Z" fill="#009950" />
                                </svg>
                                @else
                                <svg width="9" height="11" viewBox="0 0 9 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.175695 6.33583C0.17681 6.33697 0.177946 6.33808 0.179083 6.33922L3.6751 9.83982C3.70288 9.86745 3.73357 9.89199 3.76663 9.91303L3.86729 9.96794L3.93593 9.99083L3.98627 9.99083C4.0634 10.005 4.14249 10.005 4.21964 9.99083L4.2654 9.99083L4.32031 9.99083L4.39811 9.94965C4.44146 9.9261 4.48148 9.89686 4.51709 9.86271L8.02683 6.33922C8.26186 6.10606 8.26338 5.7265 8.03022 5.49148C8.02911 5.49034 8.02797 5.48923 8.02683 5.48809C7.78992 5.26205 7.41721 5.26205 7.18027 5.48809L5.08907 7.57473C4.99885 7.66319 4.85398 7.66177 4.76552 7.57153C4.72436 7.52955 4.70094 7.47335 4.70012 7.41456L4.70012 0.600969C4.70014 0.269891 4.43178 0.00149026 4.10071 0.00146925C3.76963 0.00144729 3.50125 0.269805 3.50121 0.600883L3.50121 0.600969L3.50121 7.41456C3.49943 7.5409 3.39557 7.64191 3.26923 7.64013C3.21045 7.63929 3.15423 7.61589 3.11226 7.57473L1.03019 5.48809C0.792677 5.25913 0.416575 5.25913 0.179062 5.48809C-0.0559631 5.72125 -0.0574862 6.1008 0.175695 6.33583Z" fill="#EC4F4F" />
                                </svg>
                                @endif
                                {{ number_format($changes['change_pct'], 2) }} %
                            </span>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
<!-- end  -->

<!-- blogs and other section -->
<section class="blog-detail">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="blogData-box">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                            <div class="latestData-wrapper">
                                <div class="row">
                                    <!-- random article left side -->
                                    @if(isset($random_articles[0]))
                                    <div class="col-12 col-md-6">
                                        <div class="blogBox-wrap">
                                            <div class="img-box">
                                                <img class="img-fluid" src="{{ $random_articles[0]->image?$random_articles[0]->image:asset('front/img/default.png') }}" alt="{{ $random_articles[0]->{config('app.locale').'_title'} }}">
                                            </div>
                                            <div class="blogTitle">
                                                <h6>
                                                    {{ $random_articles[0]->{config('app.locale').'_title'} }}
                                                </h6>
                                            </div>
                                            <ul class="bioData-blog">
                                                <li class="bioData-blog-link">
                                                    <span>
                                                        <svg width="9" height="10" viewBox="0 0 9 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M8.33333 9.125V8.20833C8.33333 7.7221 8.14018 7.25579 7.79636 6.91197C7.45254 6.56815 6.98623 6.375 6.5 6.375H2.83333C2.3471 6.375 1.88079 6.56815 1.53697 6.91197C1.19315 7.25579 1 7.7221 1 8.20833V9.125" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M4.66732 4.54167C5.67984 4.54167 6.50065 3.72085 6.50065 2.70833C6.50065 1.69581 5.67984 0.875 4.66732 0.875C3.6548 0.875 2.83398 1.69581 2.83398 2.70833C2.83398 3.72085 3.6548 4.54167 4.66732 4.54167Z" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                        {{ $random_articles[0]->authors->name ?? '' }}
                                                    </span>
                                                </li>
                                                <li class="bioData-blog-link">
                                                    <span>
                                                        <svg width="11" height="12" viewBox="0 0 11 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M8.66683 2.33337H2.25016C1.7439 2.33337 1.3335 2.74378 1.3335 3.25004V9.66671C1.3335 10.173 1.7439 10.5834 2.25016 10.5834H8.66683C9.17309 10.5834 9.5835 10.173 9.5835 9.66671V3.25004C9.5835 2.74378 9.17309 2.33337 8.66683 2.33337Z" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M7.2915 1.41675V3.25008" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M3.62549 1.41675V3.25008" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M1.3335 5.08337H9.5835" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                        {{ $random_articles[0]->created_at ?(config('app.locale')=='ja'? $random_articles[0]->created_at->locale('ja_JP')->translatedFormat('Y年m月d日'): date('M d, Y', strtotime($random_articles[0]->created_at))) : ''}}
                                                    </span>
                                                </li>
                                                <li class="bioData-blog-link">
                                                    <span>
                                                        <svg width="12" height="10" viewBox="0 0 12 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M0.583496 5.00004C0.583496 5.00004 2.41683 1.33337 5.62516 1.33337C8.8335 1.33337 10.6668 5.00004 10.6668 5.00004C10.6668 5.00004 8.8335 8.66671 5.62516 8.66671C2.41683 8.66671 0.583496 5.00004 0.583496 5.00004Z" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M5.62549 6.375C6.38488 6.375 7.00049 5.75939 7.00049 5C7.00049 4.24061 6.38488 3.625 5.62549 3.625C4.8661 3.625 4.25049 4.24061 4.25049 5C4.25049 5.75939 4.8661 6.375 5.62549 6.375Z" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                        {{ $random_articles[0]->views ?? 0}}
                                                    </span>
                                                </li>
                                            </ul>
                                            <div class="description">
                                                <p>
                                                    @if(strlen(utf8_decode(strip_tags($random_articles[0]->{config('app.locale').'_desc'}))) > 100)
                                                    {!! Illuminate\Support\Str::limit(strip_tags($random_articles[0]->{config('app.locale').'_desc'}), 150) !!}
                                                    @else
                                                    {!! $random_articles[0]->{config('app.locale').'_desc'} !!}
                                                    @endif

                                                </p>
                                            </div>
                                            <div class="blogRead-more">
                                                <a href="{{ route('detail', ['locale' => config('app.locale'),'slug' => $slug, 'article_id' => $random_articles[0]->id]) }}">
                                                    {{ __('message.read_more') }}
                                                    <svg width="9" height="10" viewBox="0 0 9 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M9 5C9 5.11625 8.95601 5.23261 8.86815 5.32136L4.36816 9.86679C4.19233 10.0444 3.90759 10.0444 3.73187 9.86679C3.55614 9.68918 3.55603 9.40157 3.73187 9.22407L7.9137 5L3.73187 0.775934C3.55603 0.598321 3.55603 0.310708 3.73187 0.133209C3.9077 -0.0442895 4.19244 -0.044403 4.36816 0.133209L8.86815 4.67864C8.95601 4.76739 9 4.88375 9 5ZM5.26816 4.67864L0.768176 0.133209C0.592339 -0.0444031 0.307602 -0.0444031 0.131878 0.133209C-0.0438466 0.310822 -0.0439591 0.598434 0.131878 0.775934L4.31371 5L0.131878 9.22407C-0.0439592 9.40168 -0.0439592 9.68929 0.131878 9.86679C0.307715 10.0443 0.592451 10.0444 0.768175 9.86679L5.26816 5.32136C5.35602 5.23261 5.40001 5.11625 5.40001 5C5.40001 4.88375 5.35602 4.76739 5.26816 4.67864Z" fill="#1E1F1F" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- random article left side -->
                                    @endif
                                    @if(count($random_articles) >= 1)
                                    <div class="col-12 col-md-6">
                                        <div class="latestBlog-gridList">
                                            <ul class="latestBlog-gridList-box">
                                                @for($i=1; $i<=4; $i++) @if(isset($random_articles[$i])) <li class="latestBlog-gridList-box-link">
                                                    <a class="latestBlog-gridList-box-link-tab" href="{{ route('detail', ['locale' => config('app.locale'),'slug' => $slug, 'article_id' => $random_articles[$i]->id]) }}">
                                                        <div class="left-imgBox">
                                                            <img class="img-fluid" src="{{ $random_articles[$i]->image? $random_articles[$i]->image:asset('front/img/default.png') }}" data-src="{{ $random_articles[$i]->image }}" alt="{{ config('app.locale') == 'ja' ? 'FiXi FX（フィクシー）' : 'FiXi FX' }}">
                                                        </div>
                                                        <div class="rightBox">
                                                            <div class="blogTitle">
                                                                <h6>
                                                                    {{ $random_articles[$i]->{config('app.locale').'_title'} }}
                                                                </h6>
                                                            </div>
                                                            <ul class="bioData-blog">
                                                                <li class="bioData-blog-link">
                                                                    <span>
                                                                        <svg width="9" height="10" viewBox="0 0 9 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M8.33333 9.125V8.20833C8.33333 7.7221 8.14018 7.25579 7.79636 6.91197C7.45254 6.56815 6.98623 6.375 6.5 6.375H2.83333C2.3471 6.375 1.88079 6.56815 1.53697 6.91197C1.19315 7.25579 1 7.7221 1 8.20833V9.125" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round" />
                                                                            <path d="M4.66732 4.54167C5.67984 4.54167 6.50065 3.72085 6.50065 2.70833C6.50065 1.69581 5.67984 0.875 4.66732 0.875C3.6548 0.875 2.83398 1.69581 2.83398 2.70833C2.83398 3.72085 3.6548 4.54167 4.66732 4.54167Z" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round" />
                                                                        </svg>
                                                                        {{ $random_articles[$i]->authors->name ?? '' }}
                                                                    </span>
                                                                </li>
                                                                <li class="bioData-blog-link">
                                                                    <span>
                                                                        <svg width="11" height="12" viewBox="0 0 11 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M8.66683 2.33337H2.25016C1.7439 2.33337 1.3335 2.74378 1.3335 3.25004V9.66671C1.3335 10.173 1.7439 10.5834 2.25016 10.5834H8.66683C9.17309 10.5834 9.5835 10.173 9.5835 9.66671V3.25004C9.5835 2.74378 9.17309 2.33337 8.66683 2.33337Z" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round" />
                                                                            <path d="M7.2915 1.41675V3.25008" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round" />
                                                                            <path d="M3.62549 1.41675V3.25008" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round" />
                                                                            <path d="M1.3335 5.08337H9.5835" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round" />
                                                                        </svg>
                                                                        {{ $random_articles[$i]->created_at ?(config('app.locale')=='ja'? $random_articles[$i]->created_at->locale('ja_JP')->translatedFormat('Y年m月d日'): date('M d, Y', strtotime($random_articles[$i]->created_at))) : ''}}
                                                                    </span>
                                                                </li>
                                                                <li class="bioData-blog-link">
                                                                    <span>
                                                                        <svg width="12" height="10" viewBox="0 0 12 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M0.583496 5.00004C0.583496 5.00004 2.41683 1.33337 5.62516 1.33337C8.8335 1.33337 10.6668 5.00004 10.6668 5.00004C10.6668 5.00004 8.8335 8.66671 5.62516 8.66671C2.41683 8.66671 0.583496 5.00004 0.583496 5.00004Z" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round" />
                                                                            <path d="M5.62549 6.375C6.38488 6.375 7.00049 5.75939 7.00049 5C7.00049 4.24061 6.38488 3.625 5.62549 3.625C4.8661 3.625 4.25049 4.24061 4.25049 5C4.25049 5.75939 4.8661 6.375 5.62549 6.375Z" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round" />
                                                                        </svg>
                                                                        {{ $random_articles[$i]->views ?? 0}}
                                                                    </span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </a>
                                                    </li>
                                                    @endif
                                                    @endfor
                                            </ul>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <!-- end latestData -->
                            <div class="recentPost-wrapper">
                                <div class="row">
                                    <div class="blogHead-title">
                                        <h6>
                                            {{ __('message.recent_posts') }}
                                        </h6>
                                    </div>
                                </div>
                                <div class="row">
                                    @php $count = 0; @endphp
                                    @if(count($articles))
                                    @foreach($articles as $article)
                                    <div class="col-12">
                                        <div class="latestBlog-gridList">
                                            <ul class="latestBlog-gridList-box">
                                                <li class="latestBlog-gridList-box-link">
                                                    <div class="latestBlog-gridList-box-link-tab">
                                                        <div class="left-imgBox">
                                                            <img class="img-fluid" src="{{ $article->image?$article->image: asset('front/img/default.png')}}" alt="{{ $article->{config('app.locale').'_title'} }}">
                                                        </div>
                                                        <div class="rightBox">
                                                            <div class="blogTitle">
                                                                <h6>
                                                                    {{ $article->{config('app.locale').'_title'} }}
                                                                </h6>
                                                            </div>
                                                            <ul class="bioData-blog">
                                                                <li class="bioData-blog-link">
                                                                    <span>
                                                                        <svg width="9" height="10" viewBox="0 0 9 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M8.33333 9.125V8.20833C8.33333 7.7221 8.14018 7.25579 7.79636 6.91197C7.45254 6.56815 6.98623 6.375 6.5 6.375H2.83333C2.3471 6.375 1.88079 6.56815 1.53697 6.91197C1.19315 7.25579 1 7.7221 1 8.20833V9.125" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round" />
                                                                            <path d="M4.66732 4.54167C5.67984 4.54167 6.50065 3.72085 6.50065 2.70833C6.50065 1.69581 5.67984 0.875 4.66732 0.875C3.6548 0.875 2.83398 1.69581 2.83398 2.70833C2.83398 3.72085 3.6548 4.54167 4.66732 4.54167Z" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round" />
                                                                        </svg>
                                                                        {{ $article->authors->name ?? '' }}
                                                                    </span>
                                                                </li>
                                                                <li class="bioData-blog-link">
                                                                    <span>
                                                                        <svg width="11" height="12" viewBox="0 0 11 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M8.66683 2.33337H2.25016C1.7439 2.33337 1.3335 2.74378 1.3335 3.25004V9.66671C1.3335 10.173 1.7439 10.5834 2.25016 10.5834H8.66683C9.17309 10.5834 9.5835 10.173 9.5835 9.66671V3.25004C9.5835 2.74378 9.17309 2.33337 8.66683 2.33337Z" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round" />
                                                                            <path d="M7.2915 1.41675V3.25008" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round" />
                                                                            <path d="M3.62549 1.41675V3.25008" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round" />
                                                                            <path d="M1.3335 5.08337H9.5835" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round" />
                                                                        </svg>
                                                                        {{ $article->created_at ?(config('app.locale')=='ja'? $article->created_at->locale('ja_JP')->translatedFormat('Y年m月d日'): date('M d, Y', strtotime($article->created_at))) : ''}}
                                                                    </span>
                                                                </li>
                                                                <li class="bioData-blog-link">
                                                                    <span>
                                                                        <svg width="12" height="10" viewBox="0 0 12 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M0.583496 5.00004C0.583496 5.00004 2.41683 1.33337 5.62516 1.33337C8.8335 1.33337 10.6668 5.00004 10.6668 5.00004C10.6668 5.00004 8.8335 8.66671 5.62516 8.66671C2.41683 8.66671 0.583496 5.00004 0.583496 5.00004Z" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round" />
                                                                            <path d="M5.62549 6.375C6.38488 6.375 7.00049 5.75939 7.00049 5C7.00049 4.24061 6.38488 3.625 5.62549 3.625C4.8661 3.625 4.25049 4.24061 4.25049 5C4.25049 5.75939 4.8661 6.375 5.62549 6.375Z" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round" />
                                                                        </svg>
                                                                        {{ $article->views ?? 0}}
                                                                    </span>
                                                                </li>
                                                            </ul>
                                                            <div class="description">
                                                                <p>
                                                                    @if(strlen(utf8_decode(strip_tags($article->{config('app.locale').'_desc'}))) > 150)
                                                                    {!! Illuminate\Support\Str::limit(strip_tags($article->{config('app.locale').'_desc'}), 150) !!}
                                                                    @else
                                                                    {!! $article->{config('app.locale').'_desc'} !!}
                                                                    @endif

                                                                </p>
                                                            </div>
                                                            <div class="blogRead-more">
                                                                <a href="{{ route('detail', ['locale' => config('app.locale'),'slug' => $slug, 'article_id' => $article->id]) }}">
                                                                    {{ __('message.read_more') }}
                                                                    <svg width="9" height="10" viewBox="0 0 9 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M9 5C9 5.11625 8.95601 5.23261 8.86815 5.32136L4.36816 9.86679C4.19233 10.0444 3.90759 10.0444 3.73187 9.86679C3.55614 9.68918 3.55603 9.40157 3.73187 9.22407L7.9137 5L3.73187 0.775934C3.55603 0.598321 3.55603 0.310708 3.73187 0.133209C3.9077 -0.0442895 4.19244 -0.044403 4.36816 0.133209L8.86815 4.67864C8.95601 4.76739 9 4.88375 9 5ZM5.26816 4.67864L0.768176 0.133209C0.592339 -0.0444031 0.307602 -0.0444031 0.131878 0.133209C-0.0438466 0.310822 -0.0439591 0.598434 0.131878 0.775934L4.31371 5L0.131878 9.22407C-0.0439592 9.40168 -0.0439592 9.68929 0.131878 9.86679C0.307715 10.0443 0.592451 10.0444 0.768175 9.86679L5.26816 5.32136C5.35602 5.23261 5.40001 5.11625 5.40001 5C5.40001 4.88375 5.35602 4.76739 5.26816 4.67864Z" fill="#1E1F1F" />
                                                                    </svg>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    @php $count++; @endphp
                                    @if($count == 5)
                                    <div class="col-12">
                                        <div class="tardingBanner-wrap">
                                            <div class="broker-content">
                                                <div class="broker-slide-title">
                                                    <h4>Forex Trading Broker Banner.</h4>
                                                </div>
                                                <div class="broker-discription">
                                                    <p>
                                                        Superior trade execution &amp; trading conditions with the
                                                        NDD method.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @php $count = 0; @endphp
                                    @endif
                                    @endforeach
                                    {{ $articles->links('front.common.pagination')}}
                                    @else
                                    <div class="data_notfound_card">
                                        <div class="content">
                                            <img loading="lazy" src="/front/img/data-not-found.svg" alt="data-not-found-image" data-uk-img>
                                            <p class="p-from-h6">Data Not Found</p>
                                        </div>
                                    </div>
                                    @endif
                                    <!-- end banner  -->

                                    <!-- one more div class 12 ul li -->

                                    <!-- one more banner div  -->
                                    <!-- end banner  -->

                                </div>

                                <div class="row mt-5">
                                    <div class="blogHead-title">
                                        <h6>
                                            Economics Calendar
                                        </h6>
                                    </div>
                                    <div class="blogText">
                                        <p>
                                            Many Forex traders use the economic calendar as a release schedule to assist them in anticipating when major movements will happen in the market
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">...</div>
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">...</div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="blogRight-box">
                    <div class="row">
                        <div class="col-12">
                            <div class="mostPopular-wrap">
                                <div class="blogHead-title">
                                    <h6>
                                        {{config('app.locale')=='ja'?'人気記事':'Most Popular'}}
                                    </h6>
                                </div>
                                <div class="blogBox-wrap">
                                    @if(count($random_articles) >= 1)
                                    @for($i=4; $i<=4; $i++) @if(isset($random_articles[$i]) && $random_articles[$i]) <div class="img-box">
                                        <img class="img-fluid" src="{{ $random_articles[$i]->image?$random_articles[$i]->image:asset('front/img/default.png') }}" data-src="{{ $random_articles[$i]->image }}" alt="{{ config('app.locale') == 'ja' ? '人気記事 - FiXi FX（フィクシー）ブログ' : 'Most Popular Posts - FiXi FX' }}">
                                </div>
                                <div class="blogTitle">
                                    <h6>
                                        {{ $random_articles[$i]->{config('app.locale').'_title'} }}
                                    </h6>
                                </div>
                                <ul class="bioData-blog">
                                    <li class="bioData-blog-link">
                                        <span>
                                            <svg width="9" height="10" viewBox="0 0 9 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8.33333 9.125V8.20833C8.33333 7.7221 8.14018 7.25579 7.79636 6.91197C7.45254 6.56815 6.98623 6.375 6.5 6.375H2.83333C2.3471 6.375 1.88079 6.56815 1.53697 6.91197C1.19315 7.25579 1 7.7221 1 8.20833V9.125" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M4.66732 4.54167C5.67984 4.54167 6.50065 3.72085 6.50065 2.70833C6.50065 1.69581 5.67984 0.875 4.66732 0.875C3.6548 0.875 2.83398 1.69581 2.83398 2.70833C2.83398 3.72085 3.6548 4.54167 4.66732 4.54167Z" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            {{ $random_articles[0]->authors->name ?? '' }}
                                        </span>
                                    </li>
                                    <li class="bioData-blog-link">
                                        <span>
                                            <svg width="11" height="12" viewBox="0 0 11 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8.66683 2.33337H2.25016C1.7439 2.33337 1.3335 2.74378 1.3335 3.25004V9.66671C1.3335 10.173 1.7439 10.5834 2.25016 10.5834H8.66683C9.17309 10.5834 9.5835 10.173 9.5835 9.66671V3.25004C9.5835 2.74378 9.17309 2.33337 8.66683 2.33337Z" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M7.2915 1.41675V3.25008" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M3.62549 1.41675V3.25008" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M1.3335 5.08337H9.5835" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            {{ $random_articles[0]->created_at ?(config('app.locale')=='ja'? $random_articles[0]->created_at->locale('ja_JP')->translatedFormat('Y年m月d日'): date('M d, Y', strtotime($random_articles[0]->created_at))) : ''}}
                                        </span>
                                    </li>
                                    <li class="bioData-blog-link">
                                        <span>
                                            <svg width="12" height="10" viewBox="0 0 12 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.583496 5.00004C0.583496 5.00004 2.41683 1.33337 5.62516 1.33337C8.8335 1.33337 10.6668 5.00004 10.6668 5.00004C10.6668 5.00004 8.8335 8.66671 5.62516 8.66671C2.41683 8.66671 0.583496 5.00004 0.583496 5.00004Z" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M5.62549 6.375C6.38488 6.375 7.00049 5.75939 7.00049 5C7.00049 4.24061 6.38488 3.625 5.62549 3.625C4.8661 3.625 4.25049 4.24061 4.25049 5C4.25049 5.75939 4.8661 6.375 5.62549 6.375Z" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            {{ $random_articles[0]->views ?? '' }}
                                        </span>
                                    </li>
                                </ul>
                                @endif
                                @endfor

                                <div class="latestBlog-gridList">
                                    <ul class="latestBlog-gridList-box">
                                        @for($i=5; $i<=7; $i++) @if(isset($random_articles[$i]) && $random_articles[$i]) <li class="latestBlog-gridList-box-link">
                                            <a class="latestBlog-gridList-box-link-tab" href="{{ route('detail', ['locale' => config('app.locale'),'slug' => $slug, 'article_id' => $random_articles[$i]->id]) }}">
                                                <div class="rightBox">
                                                    <div class="blogTitle">
                                                        <h6>
                                                            {{ $random_articles[$i]->{config('app.locale').'_title'} }}
                                                        </h6>
                                                    </div>
                                                    <ul class="bioData-blog">
                                                        <li class="bioData-blog-link">
                                                            <span>
                                                                <svg width="9" height="10" viewBox="0 0 9 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M8.33333 9.125V8.20833C8.33333 7.7221 8.14018 7.25579 7.79636 6.91197C7.45254 6.56815 6.98623 6.375 6.5 6.375H2.83333C2.3471 6.375 1.88079 6.56815 1.53697 6.91197C1.19315 7.25579 1 7.7221 1 8.20833V9.125" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round" />
                                                                    <path d="M4.66732 4.54167C5.67984 4.54167 6.50065 3.72085 6.50065 2.70833C6.50065 1.69581 5.67984 0.875 4.66732 0.875C3.6548 0.875 2.83398 1.69581 2.83398 2.70833C2.83398 3.72085 3.6548 4.54167 4.66732 4.54167Z" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round" />
                                                                </svg>
                                                                {{ $random_articles[$i]->authors->name ?? '' }}
                                                            </span>
                                                        </li>
                                                        <li class="bioData-blog-link">
                                                            <span>
                                                                <svg width="11" height="12" viewBox="0 0 11 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M8.66683 2.33337H2.25016C1.7439 2.33337 1.3335 2.74378 1.3335 3.25004V9.66671C1.3335 10.173 1.7439 10.5834 2.25016 10.5834H8.66683C9.17309 10.5834 9.5835 10.173 9.5835 9.66671V3.25004C9.5835 2.74378 9.17309 2.33337 8.66683 2.33337Z" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round" />
                                                                    <path d="M7.2915 1.41675V3.25008" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round" />
                                                                    <path d="M3.62549 1.41675V3.25008" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round" />
                                                                    <path d="M1.3335 5.08337H9.5835" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round" />
                                                                </svg>
                                                                {{ $random_articles[$i]->created_at ?(config('app.locale')=='ja'? $random_articles[$i]->created_at->locale('ja_JP')->translatedFormat('Y年m月d日'): date('M d, Y', strtotime($random_articles[$i]->created_at))) : ''}}
                                                            </span>
                                                        </li>
                                                        <li class="bioData-blog-link">
                                                            <span>
                                                                <svg width="12" height="10" viewBox="0 0 12 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M0.583496 5.00004C0.583496 5.00004 2.41683 1.33337 5.62516 1.33337C8.8335 1.33337 10.6668 5.00004 10.6668 5.00004C10.6668 5.00004 8.8335 8.66671 5.62516 8.66671C2.41683 8.66671 0.583496 5.00004 0.583496 5.00004Z" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round" />
                                                                    <path d="M5.62549 6.375C6.38488 6.375 7.00049 5.75939 7.00049 5C7.00049 4.24061 6.38488 3.625 5.62549 3.625C4.8661 3.625 4.25049 4.24061 4.25049 5C4.25049 5.75939 4.8661 6.375 5.62549 6.375Z" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round" />
                                                                </svg>
                                                                {{ $random_articles[$i]->views ?? 0}}
                                                            </span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </a>
                                            </li>
                                            @endif

                                            @endfor
                                    </ul>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="appAdd-wrapper">
                            <div class="logoAdd">
                                <img class="img-fluid" src="{{asset('fixifx/images/w-lg-logo.svg')}}" alt="">
                            </div>
                            <div class="appTitle">
                                <h6>
                                    Best Trading App Open Your
                                    Account Now!
                                </h6>
                            </div>
                            <div class="appText">
                                <p>
                                    The online FX industry provides a platform for investors worldwide to engage in the buying and selling.
                                </p>
                            </div>
                            <div class="appBtn">
                                <a href="javascript:void(0);" class="custom-btn fill-btn-1">Open Account Now!</a>
                            </div>
                        </div>
                    </div>

                    @if(count($tags))
                    <div class="col-12">
                        <div class="tagBox-wrap mostPopular-wrap">
                            <div class="blogHead-title">
                                <h6>
                                    {{ __('message.tags') }}
                                </h6>
                            </div>
                            <ul class="tagListing-box">
                                @foreach($tags as $tag)
                                @if(!empty($tag))
                                <li>
                                    <a href="{{route('page', ['locale' => config('app.locale'), 'slug' => $slug, 'article_id' => NULL, 'tag' => $tag])}}"><span class="uk-label uk-border-pill tag_btn">
                                            {{$tag}}
                                    </a>
                                </li>
                                @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif

                    <div class="col-12">
                        <div class="stayWith-wrap mostPopular-wrap">

                            @include('front.common.news_letter')

                            <div class="blogHead-title text-center">
                                <h6>
                                    {{ __('message.stay_with_us') }}
                                </h6>
                            </div>
                            @include('front.layouts.partials.social_share')
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="currencyExchange_wrap mostPopular-wrap">
                            <div class="blogHead-title">
                                <h6>
                                    {{ __('message.currency_exchange') }}
                                </h6>
                            </div>
                            <div class="currencyExchange-form">
                                <div class="form-group">
                                    <label for="">{{ __('message.amount') }}</label>
                                    <input type="number" class="amount_input form-control" name="amount" id="currency_amount" placeholder="{{__('message.amount')}}">
                                </div>

                                <div class="form-group position-relative">
                                    <label for="">{{ __('message.from') }}</label>
                                    <select class="niceCountryInputSelector from_code" id="from_code" name="from_country">
                                        @foreach($countries as $country)
                                        <option value="{{ $country->currency_code }}" data-src="{{$country->flag }}" @if($country->currency_code == 'USD' && $country->name == 'American Samoa') selected @endif>
                                            {{ $country->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group position-relative">
                                    <label for="">{{ __('message.too') }}</label>

                                    <select class="to_code" id="to_code" name="to_country">
                                        @foreach($countries as $country)
                                        <option value="{{ $country->currency_code }}" data-src="{{$country->flag}}" @if($country->currency_code == 'JPY') selected @endif>
                                            {{ $country->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group mb-0">
                                    <label for="">{{ __('message.result') }}</label>
                                    <div class="resultBtn-box" id="taxa">
                                        <span id="from_amt">1.00</span>
                                        <span id="from_currency">USD</span>
                                        <span>=</span>
                                        <b><span id="result">0.67</span>
                                            <span id="to_currency">GBP</span></b></b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="appAdd-wrapper">
                            <div class="logoAdd">
                                <img class="img-fluid" src="{{asset('fixifx/images/w-lg-logo.svg')}}" alt="">
                            </div>
                            <div class="appTitle">
                                <h6>
                                    Best Trading App Open Your
                                    Account Now!
                                </h6>
                            </div>
                            <div class="appText">
                                <p>
                                    The online FX industry provides a platform for investors worldwide to engage in the buying and selling.
                                </p>
                            </div>
                            <div class="broker-img">
                                <img class="img-fluid" src="{{ asset('storage/Setting/'.getSettingValue('blog_bottom_banner')) }}" alt="{{ config('app.locale') == 'ja' ? 'FiXi FX（フィクシー）ブログ' : 'FiXi FX Blog' }}">
                            </div>

                            {{-- <div class="broker-img">
                                    <img class="img-fluid" src="{{asset('fixifx/images/laptop.png')}}" alt="{{ config('app.locale') == 'ja' ? 'FiXi FX（フィクシー）ブログ' : 'FiXi FX Blog' }}">
                        </div> --}}
                        <div class="appBtn">
                            <a href="javascript:void(0);" class="custom-btn fill-btn-1">Open Account Now!</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
    </div>
</section>
<!-- blogs and other section end-->

@include('front.layouts.partials.get_started')
@endsection
