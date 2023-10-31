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