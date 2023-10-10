@php
$s_page = App\Models\MenuPage::where('slug', 'trading-strategy')->first();
$tranding_strategies = App\Models\Article::where('page_id', $s_page->id)->where('status', 1)->orderBy('id', 'DESC')->get()->take(3);

$t_page = App\Models\MenuPage::where('slug', 'tutorials')->first();
$tutorials = App\Models\Article::where('page_id', $t_page->id)->where('status', 1)->orderBy('id', 'DESC')->get()->take(3);
@endphp

<div class="sidebar_wrapper uk-width-expand@m">
    <div class="sidebar-widget financial-account-widget uk-background-black uk-margin-medium-bottom uk-card uk-card-default uk-card-body uk-border-rounded p-0">
        <div class="uk-card-body uk-border-rounded uk-background-center-center uk-background-cover px-4" style="background-image: url('{{ asset('front/img/_Artboards_.png') }}');">
            <h5 class=" uk-text-uppercase uk-margin-remove-bottom">{{ getSettingValue('global_title_'.config('app.locale')) }}</h5>
            <p>{{ getSettingValue('global_desc_'.config('app.locale')) }}</p>
            <div class="in-slideshow-button">
                <a href="{{ getSettingValue('live_link') }}" rel="noreferrer noopener" target="_blank" class="uk-button uk-button-primary uk-border-rounded">{{ getSettingValue('live_link_btn_'.config('app.locale')) }}</a>
                <a href="{{ getSettingValue('demo_link') }}" rel="noreferrer noopener" target="_blank" class="uk-button uk-button-default uk-border-rounded my-1">{{ getSettingValue('demo_link_btn_'.config('app.locale')) }}</a>
            </div>
        </div>
    </div>
    <div class="sidebar-widget sidebar-media-box uk-margin-medium-bottom">
        <h3 class="mb-3 ">{{ $s_page->{config('app.locale').'_name'} }}</h3>
        <div class="title_divider_dot"></div>
        <ul class="uk-list uk-list-divider">
            @foreach($tranding_strategies as $strategy)
            <li class="media-widget-card">
                <div class="uk-flex uk-grid-column-small uk-grid-row-large uk-flex-between@s align-items-center my-3" uk-grid>
                    <div class="uk-margin-left@s">
                        <div class="media-img">
                            <img src="{{ $strategy->image ? $strategy->image : asset('front/img/default.png')}}" loading="lazy" data-src="{{ $strategy->image }}" alt="profit-icon" data-uk-img>
                        </div>
                    </div>
                    <div class="uk-width-expand mt-0">
                        <span class="mb-1 fs-14 d-block"><i class="fas fa-calendar-alt mr-1"></i>{{config('app.locale')=='en'?($strategy->event_date!=''?date('d-m-Y', strtotime($strategy->event_date)): date('d-m-Y', strtotime($strategy->created_at))):($strategy->event_date!=''?$strategy->event_date->locale('ja_JP')->translatedFormat('Y年m月d日'): $strategy->created_at->locale('ja_JP')->translatedFormat('Y年m月d日')) }}</span>
                        <h5 class="m-0"><a href="{{ route('detail', ['locale' => config('app.locale'), 'slug' => $s_page->slug, 'article_id' => $strategy->id]) }}">{{ $strategy->{config('app.locale').'_title'} }}</a></h5>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
    <div class="sidebar-widget sidebar-media-box uk-margin-medium-bottom">
        <h3 class="mb-3 ">{{ $t_page->{config('app.locale').'_name'} }}</h3>
        <div class="title_divider_dot"></div>
        <ul class="uk-list uk-list-divider">
            @foreach($tutorials as $tutorial)
            <li class="media-widget-card">
                <div class="uk-flex uk-grid-column-small uk-grid-row-large uk-flex-between@s align-items-center my-3" uk-grid>
                    <div class="uk-margin-left@s">
                        <div class="media-img">
                            <img src="{{ $tutorial->image ? $tutorial->image : asset('front/img/default.png')}}" loading="lazy" data-src="{{ $tutorial->image }}" alt="profit-icon" data-uk-img>
                        </div>
                    </div>
                    <div class="uk-width-expand mt-0">
                        <h5 class="m-0"><a href="{{ route('detail', ['locale' => config('app.locale'), 'slug' => $t_page->slug, 'article_id' => $tutorial->id]) }}">{{ $tutorial->{config('app.locale').'_title'} }}</a></h5>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
    <div class="sidebar-widget newsletter-widget in-content-10 uk-margin-medium-bottom">
        @include('front.common.news_letter')
    </div>
    <div class="sidebar-widget sidebar-media-box uk-margin-medium-bottom">
        <h3 class="mb-3 ">{{ __('message.tags') }}</h3>
        <div class="title_divider_dot"></div>
        <div class="in-widget-tag pill-green-tag">
            @foreach($tags as $tag)
            <a href="{{route('page', ['locale' => config('app.locale'), 'slug' => $slug, 'article_id' => NULL, 'tag' => $tag])}}"><span class="uk-label uk-border-pill tag_btn">{{$tag}}</span></a>
            @endforeach
        </div>
    </div>
</div>