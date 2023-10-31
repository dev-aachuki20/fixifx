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
        <a class="latestBlog-gridList-box-link-tab" href="{{ route('detail', ['locale' => config('app.locale'),'slug' => $slug, 'article_id' => $random_articles[$i]->id]) }}">
            {{ $random_articles[$i]->{config('app.locale').'_title'} }}
        </a>
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