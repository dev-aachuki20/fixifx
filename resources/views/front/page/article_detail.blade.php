@php
$blog_detail = true;
$detail_title = $article->{config('app.locale').'_title'};
$detail_ogp_image = $article->image;
$keywords_jp = 'FiXi,FiXi FX,フィクシー,ブログ';
$description_jp = 'FiXi FX（フィクシー）のブログ「'. $article->{config('app.locale').'_title'} . '」のページです。';
@endphp

@extends('front.layouts.base')

@section('css')
<style>
    .avtar_icon {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .initials {
        width: 80px;
        height: 80px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 20px;
        font-weight: 700;
        color: #00000075;
    }
</style>
@endsection

@section('content')

@include('front.layouts.partials.blogs.blog_hero')

<section class="blog-detail">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="blogData-box">
                    <div class="blogDetail-title">
                        <h4>
                            {{ $article->{config('app.locale').'_title'} }}
                        </h4>
                    </div>

                    <ul class="bioData-blog mb-4">
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
                    </ul>

                    <div class="latestData-wrapper blogDetail-wrapper">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="blogBox-wrap">
                                    @if($article->image)
                                    <div class="img-box">
                                        <img class="img-fluid" src="{{ $article->image }}" data-src="{{ $article->image }}" alt="{{ $article->{config('app.locale').'_title'} }}">
                                    </div>
                                    @endif
                                    <div class="socialBox_ChatBox_wrap d-flex justify-content-between align-items-center">
                                        @include('front.layouts.partials.social_share')
                                        <div class="view_chatBox">
                                            <ul class="bioData-blog">
                                                <li class="bioData-blog-link">
                                                    <span>
                                                        <svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M1 6.09091C1 6.09091 3.54545 1 8 1C12.4545 1 15 6.09091 15 6.09091C15 6.09091 12.4545 11.1818 8 11.1818C3.54545 11.1818 1 6.09091 1 6.09091Z" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M7.99991 7.99952C9.05427 7.99952 9.909 7.14479 9.909 6.09043C9.909 5.03606 9.05427 4.18134 7.99991 4.18134C6.94555 4.18134 6.09082 5.03606 6.09082 6.09043C6.09082 7.14479 6.94555 7.99952 7.99991 7.99952Z" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                        {{ $article->views ?? 0}}
                                                    </span>
                                                </li>
                                                <li class="bioData-blog-link">
                                                    <span>
                                                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M13 9C13 9.35362 12.8595 9.69276 12.6095 9.94281C12.3594 10.1929 12.0203 10.3333 11.6667 10.3333H3.66667L1 13V2.33333C1 1.97971 1.14048 1.64057 1.39052 1.39052C1.64057 1.14048 1.97971 1 2.33333 1H11.6667C12.0203 1 12.3594 1.14048 12.6095 1.39052C12.8595 1.64057 13 1.97971 13 2.33333V9Z" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                        {{$article->comments->count() ?? 0}}
                                                    </span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="description">
                                        {!! $article->{config('app.locale').'_desc'} !!}
                                        @if($article->sub_image)
                                        <div class="my-4">
                                            <img class="uk-img" src="{{ $article->sub_image }}" data-src="{{ $article->sub_image }}" alt="{{ $article->{config('app.locale').'_title'} }}" loading="lazy" data-uk-img>
                                        </div>
                                        @endif
                                    </div>
                                    
                                     <div class="noteBox_wrap">
                                    @if(!is_null($article->{config('app.locale').'_note'}) && !empty($article->{config('app.locale').'_note'}))
                                        <div class="note_content">
                                            <i>
                                                {!! $article->{config('app.locale').'_note'} !!}
                                            </i>
                                        </div>
                                    @endif
                                    </div>

                                   {{-- <div class="noteBox_wrap">
                                        @php $section2 = $section->where('section_no', 2)->where('status', 1)->first() @endphp
                                        @if($section2)
                                        <div class="note_content">
                                            <i>
                                                {!! $section2->{config('app.locale').'_desc'} !!}
                                            </i>
                                        </div>
                                        @endif
                                    </div> --}}

                                    @php $section3 = $section->where('section_no', 3)->where('status', 1)->first();
                                    $sectionEnLink1 = $section3 ? json_decode($section3->en_link) : null;
                                    $sectionJaLink1 = $section3 ? json_decode($section3->ja_link) : null; @endphp
                                    @if($section3)
                                    <div class="tardingBanner-wrap tardingBanner-gridBox d-flex align-items-center" style="background-image: url({{$section3 && $section3->image ? $section3->image : asset('fixifx/images/broker-slide2.png')}});">
                                        <!-- <div class="broker-img">
                                            <img class="img-fluid" src="" alt="">
                                        </div> -->
                                        <div class="broker-content">
                                            <div class="broker-slide-title">
                                                <h4> {{ $section3->{config('app.locale').'_title'} }}</h4>
                                            </div>
                                            <div class="broker-discription">
                                                {!! $section3->{config('app.locale').'_desc'} !!}
                                            </div>
                                        </div>
                                        <div class="broker-btn">
                                            @if(config('app.locale') == 'en')
                                            <a href="{{ isset($sectionEnLink1[0]) ? $sectionEnLink1[0] : '#' }}" class="custom-btn fill-btn-1">{{__('message.open_account_now_btn')}}</a>
                                            @else
                                            <a href="{{ isset($sectionJaLink1[0]) ? $sectionJaLink1[0] : '#' }}" class="custom-btn fill-btn-1">{{__('message.open_account_now_btn')}}</a>
                                            @endif
                                        </div>
                                    </div>
                                    @endif
                                    <!-- end  -->



                                    <div class="tagsBox-wrapper d-flex align-items-start justify-content-between">

                                        <div class="tagListing-main d-flex align-items-center">
                                            <div class="tagTitle-wrap">
                                                <h6>
                                                    {{ __('message.tags') }}:
                                                </h6>
                                            </div>
                                            <ul class="tagListing-box">
                                                <!-- comment -->
                                                @php $tagsvalue = explode(',', $article->tags) @endphp
                                                @foreach($tagsvalue as $k => $value)
                                                <li>
                                                    <a href="{{route('page', ['locale' => config('app.locale'), 'slug' => $slug, 'article_id' => NULL, 'tag' => $value])}}">
                                                        {{ $value }}
                                                    </a>
                                                    @if(!($k == count($tagsvalue) - 1))@endif
                                                </li>
                                                @endforeach
                                                <!-- comment -->
                                            </ul>
                                        </div>
                                        @include('front.layouts.partials.social_share')
                                    </div>
                                    <!-- end  -->
                                    @if($slug=='prex-blogs')
                                    <div class="authorBox-main">
                                        <div class="authorBox-wrapper">
                                            <div class="authorIcon">
                                                <img class="img-fluid" src="{{$article->authors->profile ?? null}}" alt="">
                                            </div>
                                            <div class="authorContent">
                                                <div class="title">
                                                    <h6>
                                                        {{ $article->authors->name ?? '' }}
                                                    </h6>
                                                    <span>
                                                        {{ __('message.author') }}
                                                    </span>
                                                </div>
                                                <div class="description">
                                                    <p>
                                                        {{ $article->authors->{config('app.locale').'_description'} ?? '' }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif

                                </div>
                            </div>
                            <!-- next and prev post -->
                            @if($article)
                            @php
                            $prevPost = App\Models\Article::where('id', '<', $article->id)->where('deleted_at', Null)->orderBy('id', 'desc')->first();

                                $nextPost = App\Models\Article::where('id', '>', $article->id)->where('deleted_at', Null)->orderBy('id', 'desc')->first();

                                @endphp
                                <div class="col-12">
                                    <div class="next-prev-post d-flex align-items-center justify-content-between">
                                        @if($prevPost)
                                        <div class="prev-post">
                                            <p class="pre-title heading-typo">
                                                <svg width="15" height="11" viewBox="0 0 15 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M13.5209 5.5H1" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M6 10.5L1 5.5L6 0.5" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                                {{__('message.prev_post')}}
                                            </p>
                                            <p class="title heading-typo"><a href="{{ route('detail', ['locale' => config('app.locale'),'slug' => $slug, 'article_id' => $prevPost->slug_url]) }}" rel="prev">{{ $prevPost->{config('app.locale').'_title'} }}</a></p>
                                        </div>
                                        @endif

                                        @if($nextPost)
                                        <div class="next-post">
                                            <p class="pre-title heading-typo">
                                                {{__('message.next_post')}}
                                                <svg width="15" height="11" viewBox="0 0 15 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1.47907 5.5H14" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M9 10.5L14 5.5L9 0.5" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </p>
                                            <p class="title heading-typo"><a href="{{ route('detail', ['locale' => config('app.locale'),'slug' => $slug, 'article_id' => $nextPost->slug_url]) }}" rel="next">{{ $nextPost->{config('app.locale').'_title'} }}</a></p>
                                        </div>
                                        @endif

                                    </div>
                                </div>
                                @endif
                                <!--end next and prev post -->
                                @php $section6 = $section->where('section_no', 6)->where('status', 1)->first(); @endphp
                                @if($section6)
                                    <div class="con-12">
                                        <div class="swiper bloggird_slides blog_slider_box">
                                            @if($slug=='prex-blogs')
                                            <div class="bloggird_arrow d-flex align-items-center justify-content-between">
                                                <div class="title">
                                                    <h6>
                                                        {{ $section6->{config('app.locale').'_title'} }}
                                                    </h6>
                                                </div>
                                                <div class="nextPrev-box d-flex align-items-center">
                                                    <div class="swiper-button-prev">
                                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M3.29373 8.1745C3.29373 8.04967 3.34144 7.92472 3.43674 7.82942L8.31769 2.94846C8.50842 2.75774 8.81726 2.75774 9.00786 2.94846C9.19846 3.13919 9.19858 3.44803 9.00786 3.63863L4.47199 8.1745L9.00786 12.7104C9.19858 12.9011 9.19858 13.2099 9.00786 13.4005C8.81714 13.5911 8.50829 13.5913 8.31769 13.4005L3.43674 8.51958C3.34144 8.42428 3.29373 8.29933 3.29373 8.1745ZM7.3415 8.51958L12.2225 13.4005C12.4132 13.5913 12.722 13.5913 12.9126 13.4005C13.1032 13.2098 13.1033 12.901 12.9126 12.7104L8.37675 8.1745L12.9126 3.63863C13.1033 3.44791 13.1033 3.13906 12.9126 2.94846C12.7219 2.75786 12.4131 2.75774 12.2225 2.94846L7.3415 7.82942C7.2462 7.92472 7.19849 8.04967 7.19849 8.1745C7.19849 8.29933 7.2462 8.42428 7.3415 8.51958Z" fill="#1E1F1F" />
                                                        </svg>
                                                    </div>
                                                    <div class="swiper-button-next">
                                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M12.7063 8.1745C12.7063 8.04967 12.6586 7.92472 12.5633 7.82942L7.68231 2.94846C7.49158 2.75774 7.18274 2.75774 6.99214 2.94846C6.80154 3.13919 6.80142 3.44803 6.99214 3.63863L11.528 8.1745L6.99214 12.7104C6.80142 12.9011 6.80142 13.2099 6.99214 13.4005C7.18286 13.5911 7.49171 13.5913 7.68231 13.4005L12.5633 8.51958C12.6586 8.42428 12.7063 8.29933 12.7063 8.1745ZM8.6585 8.51958L3.77754 13.4005C3.58682 13.5913 3.27798 13.5913 3.08738 13.4005C2.89678 13.2098 2.89665 12.901 3.08738 12.7104L7.62325 8.1745L3.08738 3.63863C2.89666 3.44791 2.89666 3.13906 3.08738 2.94846C3.2781 2.75786 3.58694 2.75774 3.77754 2.94846L8.6585 7.82942C8.7538 7.92472 8.80151 8.04967 8.80151 8.1745C8.80151 8.29933 8.7538 8.42428 8.6585 8.51958Z" fill="#1E1F1F" />
                                                        </svg>
                                                    </div>
                                                </div>
    
                                            </div>
    
                                            <div class="swiper-wrapper main_slides">
                                                {{-- @foreach($articles->random()->get() as $randarticle) --}}
                                                @foreach($random_articles as $randarticle)
                                                <div class="swiper-slide items_grid">
                                                    <a href="{{ route('detail', ['locale' => config('app.locale'), 'slug' => $slug, 'article_id' => $randarticle->slug_url]) }}" class="blogBox-wrap">
                                                        <div class="img-box">
                                                            <img class="img-fluid" src="{{ $randarticle->image }}" data-src="{{ $randarticle->image }}" alt="{{ $randarticle->{config('app.locale').'_title'} }}">
                                                        </div>
                                                        <div class="blogTitle">
                                                            <h6>
                                                                {{ $randarticle->{config('app.locale').'_title'} }}
                                                            </h6>
                                                        </div>
                                                        <ul class="bioData-blog">
                                                            <li class="bioData-blog-link">
                                                                <span>
                                                                    <svg width="9" height="10" viewBox="0 0 9 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M8.33333 9.125V8.20833C8.33333 7.7221 8.14018 7.25579 7.79636 6.91197C7.45254 6.56815 6.98623 6.375 6.5 6.375H2.83333C2.3471 6.375 1.88079 6.56815 1.53697 6.91197C1.19315 7.25579 1 7.7221 1 8.20833V9.125" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round" />
                                                                        <path d="M4.66732 4.54167C5.67984 4.54167 6.50065 3.72085 6.50065 2.70833C6.50065 1.69581 5.67984 0.875 4.66732 0.875C3.6548 0.875 2.83398 1.69581 2.83398 2.70833C2.83398 3.72085 3.6548 4.54167 4.66732 4.54167Z" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg>
                                                                    {{ $randarticle->authors->name ?? 'Admin' }}
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
                                                                    {{ $randarticle->created_at ?(config('app.locale')=='ja'? $randarticle->created_at->locale('ja_JP')->translatedFormat('Y年m月d日'): date('M d, Y', strtotime($randarticle->created_at))) : ''}}
                                                                </span>
                                                            </li>
                                                            <li class="bioData-blog-link">
                                                                <span>
                                                                    <svg width="12" height="10" viewBox="0 0 12 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M0.583496 5.00004C0.583496 5.00004 2.41683 1.33337 5.62516 1.33337C8.8335 1.33337 10.6668 5.00004 10.6668 5.00004C10.6668 5.00004 8.8335 8.66671 5.62516 8.66671C2.41683 8.66671 0.583496 5.00004 0.583496 5.00004Z" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round" />
                                                                        <path d="M5.62549 6.375C6.38488 6.375 7.00049 5.75939 7.00049 5C7.00049 4.24061 6.38488 3.625 5.62549 3.625C4.8661 3.625 4.25049 4.24061 4.25049 5C4.25049 5.75939 4.8661 6.375 5.62549 6.375Z" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg>
                                                                    {{ $randarticle->views ?? 0}}
                                                                </span>
                                                            </li>
                                                        </ul>
                                                        <div class="description">
                                                            <p>
                                                                @if(strlen(utf8_decode(strip_tags($randarticle->{config('app.locale').'_desc'}))) > 100)
                                                                {!! Illuminate\Support\Str::limit(strip_tags($randarticle->{config('app.locale').'_desc'}), 150) !!}
                                                                @else
                                                                {!! $randarticle->{config('app.locale').'_desc'} !!}
                                                                @endif
                                                            </p>
                                                        </div>
                                                    </a>
                                                </div>
                                                @endforeach
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                                
                                <div class="col-12">
                                    <div class="commentBox-wrapper {{($article->comments->count() > 3) ? 'show-comment' : '' }}">
                                        <div class="commentBox-inner textDetails showDetails-height">
                                            <div class="titile">
                                                <h6>
                                                    @if($article->comments->count() > 1)
                                                    {{ __('message.comments') }}
                                                    @else
                                                    {{ __('message.comment') }}
                                                    @endif
                                                    <span>({{$article->comments->count()}})</span>
                                                </h6>
                                            </div>
                                            @if($article->comments->count())
                                            <div class="commentBox-listing">
                                                <ul class="parent_listing">

                                                    @foreach($article->comments as $comment)
                                                    <li>
                                                        <div class="commentBox-content d-flex align-items-start">
                                                            <div class="commentLeft">
                                                                <div class="avtar_icon">
                                                                    @php
                                                                    $name = $comment->name;
                                                                    $initials = getInitials($name);
                                                                    $color = getRandomColor();
                                                                    @endphp
                                                                    <div class="initials" style="background-color: #faf8f6;">
                                                                        {{$initials}}
                                                                    </div>

                                                                    {{-- <img class="img-fluid" src="{{asset('fixifx/images/Authoricon04.png')}}" alt=""> --}}
                                                                </div>
                                                            </div>
                                                            <div class="commentRight">
                                                                <div class="avtar_title">
                                                                    <h6>
                                                                        {{ucwords($comment->name) ?? ''}}
                                                                    </h6>
                                                                    <span class="date">
                                                                        {{ $comment->created_at ?(config('app.locale')=='ja'? $comment->created_at->locale('ja_JP')->translatedFormat('Y年m月d日'): date('M d, Y', strtotime($comment->created_at))) : ''}}
                                                                    </span>
                                                                </div>
                                                                <div class="description">
                                                                    <p>{{ucwords($comment->message)}}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            @endif
                                        </div>
                                        <a href="javascript:void(0)" class="showDetails-more">Show more</a>
                                    </div>
                                </div>

                                @include('front.common.leave_reply')

                        </div>
                    </div>
                    <!-- end latestData -->
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
                                        <a class="latestBlog-gridList-box-link-tab" href="{{ route('detail', ['locale' => config('app.locale'),'slug' => $slug, 'article_id' => $random_articles[$i]->slug_url]) }}">
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
                                            <a class="latestBlog-gridList-box-link-tab" href="{{ route('detail', ['locale' => config('app.locale'),'slug' => $slug, 'article_id' => $random_articles[$i]->slug_url]) }}">
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

                    @php $section4 = $section->where('section_no', 4)->where('status', 1)->first();
                    $sectionEnLink4 = $section4 ? json_decode($section4->en_link) : null;
                    $sectionJaLink4 = $section4 ? json_decode($section4->ja_link) : null; @endphp
                    @if($section4)
                    <div class="col-12">
                        <div class="appAdd-wrapper" style="{{ $section4->image ? 'background-image: url(' . $section4->image . '); background-repeat: no-repeat; background-size: cover;' : '' }}">
                            <div class="logoAdd">
                                <img class="img-fluid" src="{{asset('fixifx/images/w-lg-logo.svg')}}" alt="">
                            </div>
                            <div class="appTitle">
                                <h6>
                                    {{ $section4->{config('app.locale').'_title'} }}
                                </h6>
                            </div>
                            <div class="appText">
                                {!! $section4->{config('app.locale').'_desc'} !!}
                            </div>
                            <div class="appBtn">
                                @if(config('app.locale') == 'en')
                                <a href="{{ isset($sectionEnLink4[0]) ? $sectionEnLink4[0] : '#' }}" class="custom-btn fill-btn-1">{{__('message.open_account_now_btn')}}</a>
                                @else
                                <a href="{{ isset($sectionJaLink4[0]) ? $sectionJaLink4[0] : '#' }}" class="custom-btn fill-btn-1">{{__('message.open_account_now_btn')}}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endif

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
                                            @if(app()->getLocale() == 'en')
                                            {{ $country->name }} ({{ $country->currency_code }})
                                            @else
                                            {{ $country->ja_name }} ({{ $country->currency_code }})
                                            @endif
                                        </option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group position-relative">
                                    <label for="">{{ __('message.too') }}</label>

                                    <select class="to_code" id="to_code" name="to_country">
                                        @foreach($countries as $country)
                                        <option value="{{ $country->currency_code }}" data-src="{{$country->flag}}" @if($country->currency_code == 'JPY') selected @endif>
                                            @if(app()->getLocale() == 'en')
                                            {{ $country->name }} ({{ $country->currency_code }})
                                            @else
                                            {{ $country->ja_name }} ({{ $country->currency_code }})
                                            @endif
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

                    @php $section5 = $section->where('section_no', 5)->where('status', 1)->first();
                    $sectionEnLink5 = $section5 ? json_decode($section5->en_link) : null;
                    $sectionJaLink5 = $section5 ? json_decode($section5->ja_link) : null; @endphp
                    @if($section5)
                    <div class="col-12">
                        <div class="appAdd-wrapper" style="{{ $section5->image ? 'background-image: url(' . $section5->image . '); background-repeat: no-repeat; background-size: cover;' : '' }}">
                            <div class="logoAdd">
                                <img class="img-fluid" src="{{asset('fixifx/images/w-lg-logo.svg')}}" alt="">
                            </div>
                            <div class="appTitle">
                                <h6>
                                    {{ $section5->{config('app.locale').'_title'} }}
                                </h6>
                            </div>
                            <div class="appText">
                                {!! $section5->{config('app.locale').'_desc'} !!}
                            </div>
                            <div class="broker-img">
                                <img class="img-fluid" src="{{ asset('storage/Setting/'.getSettingValue('blog_bottom_banner')) }}" alt="{{ config('app.locale') == 'ja' ? 'FiXi FX（フィクシー）ブログ' : 'FiXi FX Blog' }}">
                            </div>

                            {{-- <div class="broker-img">
                                        <img class="img-fluid" src="{{asset('fixifx/images/laptop.png')}}" alt="{{ config('app.locale') == 'ja' ? 'FiXi FX（フィクシー）ブログ' : 'FiXi FX Blog' }}">
                        </div> --}}
                        <div class="appBtn">
                            @if(config('app.locale') == 'en')
                            <a href="{{ isset($sectionEnLink5[0]) ? $sectionEnLink5[0] : '#' }}" class="custom-btn fill-btn-1">{{__('message.open_account_now_btn')}}</a>
                            @else
                            <a href="{{ isset($sectionJaLink5[0]) ? $sectionJaLink5[0] : '#' }}" class="custom-btn fill-btn-1">{{__('message.open_account_now_btn')}}</a>
                            @endif
                        </div>
                    </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
</section>


@endsection



@section('javascript')
<script>
    $(document).on('click', '.ss-btn-share', function(e) {
        e.preventDefault();
        if (navigator.share) {
            navigator.share({
                    url: this.getAttribute("data-ss-link")
                }).then(() => {
                    console.log('Thanks for sharing!');
                })
                .catch(console.error);
        } else {
            console.log('This brownser dont support native web share!');
        }
    });
    $(document).ready(function() {
        $('#reply').validate({
            errorClass: 'invalid-feedback animated fadeInDown error',
            errorElement: 'div',
            rules: {
                'fname': {
                    required: true,
                    minlength: 3,
                    maxlength: 20,
                },
                'lname': {
                    required: true,
                    minlength: 3,
                    maxlength: 40
                },
                'email': {
                    required: true,
                    email: true,
                },
                'message': {
                    required: true,
                },
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
                $(element).parents("div.form-control").addClass(errorClass).removeClass(validClass);
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
                $(element).parents(".error").removeClass(errorClass).addClass(validClass);
            },
            submitHandler: function(form) {
                $('.error').html("");
                var article_id = $('#article_id').val();
                var formData = new FormData(form);
                formData.append('article_id', article_id);
                $.ajax({
                    type: 'POST',
                    url: "{{ route('post_comment') }}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {

                        if (data) {
                            success = msg = "";
                            if ('{{config("app.locale")}}' == 'en') {
                                msg = 'You have successfully replied.';
                                success = 'Success';
                            } else {
                                msg = '正常に返信されました。';
                                success = '成功';
                            }
                            swal(
                                success,
                                msg,
                                'success'
                            );
                            $('#reply').trigger("reset");

                        }
                    },
                    error: function(data) {
                        var errors = $.parseJSON(data.responseText);
                        $.each(errors.errors, function(key, value) {
                            $('#reply').find('input[name=' + key + ']').after('<span class="error" style="color: red;">' + value + '</span>');
                        });

                    }
                });
            },
        });
    });

    // from country list
    $('.from_code').select2({
        templateResult: formatState,
        templateSelection: formatStateSelection
    });

    function formatState(state) {
        if (!state.id) {
            return state.text;
        }
        var $state = $(
            '<span><img src="' + $(state.element).attr('data-src') + '" class="img-flag" /> ' + state.text + '</span>'
        );
        return $state;
    };

    function formatStateSelection(state) {
        if (!state.id) {
            return state.text;
        }

        var $state = $(
            '<span><img src="' + $(state.element).data('src') + '" class="img-flag" /> ' + state.text + '</span>'
        );
        return $state;
    }


    // to country list
    $('.to_code').select2({
        templateResult: formatStatecode,
        templateSelection: formatStateSelectioncode


    });

    function formatStatecode(state) {
        if (!state.id) {
            return state.text;
        }
        var $state = $(
            '<span><img src="' + $(state.element).attr('data-src') + '" class="img-flag" /> ' + state.text + '</span>'
        );
        return $state;
    };

    function formatStateSelectioncode(state) {
        if (!state.id) {
            return state.text;
        }

        var $state = $(
            '<span><img src="' + $(state.element).data('src') + '" class="img-flag" /> ' + state.text + '</span>'
        );
        return $state;
    }

    // currency exchange
    $(document).ready(function() {
        $('#currency_amount').val('1');
        $('#from_code').val('USD');
        $('#to_code').val('JPY');

        currency_exchange($('#currency_amount').val(), $('#from_code').val(), $('#to_code').val());
    });

    $(document).on('change keyup', '#currency_amount, #from_code, #to_code', function() {
        var amount = $('#currency_amount').val();
        var from_code = $('#from_code').val();
        var to_code = $('#to_code').val();
        currency_exchange(amount, from_code, to_code);
    });

    function currency_exchange(amount, from_code, to_code) {
        if (amount === '0') {
            $('#from_amt').html(amount);
            $('#result').html('0.00');
            return;
        }
        $.ajax({
            url: 'https://api.currencylayer.com/convert?access_key=156008d1a480152fc96284714da5a892&from=' + from_code + '&to=' + to_code + '&amount=' + amount,
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
@endsection