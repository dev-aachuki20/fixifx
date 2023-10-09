<div class="sidebar_wrapper uk-width-expand@m">
    @if(count($random_articles) >= 1)
    <div class="sidebar-widget sidebar-media-box uk-margin-medium-bottom">
        <p class="mb-3 p-from-h3">{{config('app.locale')=='ja'?'人気記事':'Most Popular'}}</p>
        <div class="title_divider_dot"></div>
        <ul class="uk-list uk-list-divider">
            @for($i=4; $i<=7; $i++) @if(isset($random_articles[$i]) && $random_articles[$i]) <li class="media-widget-card">
                <div class="uk-flex uk-grid-column-small uk-grid-row-large uk-flex-between@s align-items-center my-3" uk-grid>
                    <div class="uk-margin-left@s">
                        <div class="media-img">
                            <img src="{{ $random_articles[$i]->image?$random_articles[$i]->image:asset('front/img/default.png') }}" data-src="{{ $random_articles[$i]->image }}" alt="{{ config('app.locale') == 'ja' ? '人気記事 - FiXi FX（フィクシー）ブログ' : 'Most Popular Posts - FiXi FX' }}" data-uk-img loading="lazy">
                        </div>
                    </div>
                    <div class="uk-width-expand mt-0">
                        <p class="m-0 p-from-h5">
                            <a href="{{ route('detail', ['locale' => config('app.locale'),'slug' => $slug, 'article_id' => $random_articles[$i]->id]) }}">{{ $random_articles[$i]->{config('app.locale').'_title'} }}</a>
                        </p>
                        <span class="mb-1 fs-14 d-block"><i class="fas fa-calendar-alt mr-1"></i>{{ $random_articles[$i]->created_at ?(config('app.locale')=='ja'? $random_articles[$i]->created_at->locale('ja_JP')->translatedFormat('Y年m月d日'): date('M d, Y', strtotime($random_articles[$i]->created_at))) : ''}}</span>
                    </div>
                </div>
                </li>
                @endif
                @endfor
        </ul>
    </div>
    @endif
    <div class="sidebar-widget newsletter-widget in-content-10 uk-margin-medium-bottom">
        @include('front.common.news_letter')
    </div>
    @if(count($tags))
    <div class="sidebar-widget sidebar-media-box uk-margin-medium-bottom">
        <p class="mb-3 p-from-h3">{{ __('message.tags') }}</p>
        <div class="title_divider_dot"></div>
        <div class="in-widget-tag pill-green-tag mt-4">
            @foreach($tags as $tag)
            @if(!empty($tag))
            <a href="{{route('page', ['locale' => config('app.locale'), 'slug' => $slug, 'article_id' => NULL, 'tag' => $tag])}}"><span class="uk-label uk-border-pill tag_btn">{{$tag}}</span></a>
            @endif
            @endforeach
        </div>
    </div>
    @endif

    <div class="sidebar-widget sidebar-media-box uk-margin-medium-bottom">
        <p class="mb-3 p-from-h3">{{ __('message.stay_with_us') }}</p>
        <div class="title_divider_dot"></div>
        <div class="in-article-share my-2">
            <div class="ss-box ss-circle" data-ss-content="false"></div>
        </div>
    </div>

    <div class="sidebar-widget sidebar-media-box uk-margin-medium-bottom">
        <p class="mb-3 p-from-h3">{{ __('message.currency_exchange') }}</p>
        <div class="title_divider_dot"></div>
        <form class="uk-form uk-grid-small uk-grid" id="currency_form">
            <div class="uk-width-1 my-2">
                <div class="uk-form-controls">
                    <label for="" class="my-1">{{ __('message.amount') }}</label>
                    <input class="uk-input uk-border-rounded" id="currency_amount" type="text" value="1" placeholder="{{__('message.amount')}}" name="amount">
                </div>
            </div>
            <div class="uk-width-1 my-2">
                <div class="uk-form-controls">
                    <label for="" class="my-1">{{ __('message.from') }}</label>
                    <select class="uk-select uk-border-rounded" id="from_code" name="from_country">
                        <option value="">{{ __('message.from') }}</option>
                        @foreach($countries as $country)
                        <option value="{{ $country->currency_code }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="uk-width-1 my-2">
                <div class="uk-form-controls">
                    <label for="" class="my-1">{{ __('message.too') }}</label>
                    <select class="uk-select uk-border-rounded" id="to_code" name="to_country">
                        <option value="">Select Country</option>
                        @foreach($countries as $country)
                        <option value="{{ $country->currency_code }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="uk-width-1 my-2">
                <div class="uk-form-controls">
                    <label for="" class="my-1">{{ __('message.result') }}</label>
                    <p class="uk-text-center uk-input uk-border-rounded" style="background-color: #ebe9e9;">
                        <span id="from_amt">1.00</span>
                        <span id="from_currency">USD</span>
                        <span>=</span>
                        <b><span id="result">0.67</span>
                            <span id="to_currency">GBP</span></b>
                    </p>
                </div>
            </div>

        </form>
    </div>

    <div class="sidebar-widget sidebar-media-box uk-margin-medium-bottom">
        <img src="{{ asset('storage/Setting/'.getSettingValue('blog_bottom_banner')) }}" width="100%" height="auto" alt="{{ config('app.locale') == 'ja' ? 'FiXi FX（フィクシー）ブログ' : 'FiXi FX Blog' }}" loading="lazy">
    </div>
</div>

@push('css')
<style>
    .p-from-h3 {
        font-size: 1.5rem;
        line-height: 1.2;
        color: #001e32;
        font-weight: 700;
    }

    .p-from-h5 {
        font-size: 16px;
        font-weight: 700;
        line-height: 1.2;
    }
</style>
@endpush

@push('scripts')
<script>
    window.addEventListener('load', () => {
        addAriaLabel('ss-btn-facebook', 'Facebook');
        addAriaLabel('ss-btn-twitter', 'Twitter');
        addAriaLabel('ss-btn-linkedin', 'LinkedIn');
        addAriaLabel('ss-btn-whatsapp', 'WhatsApp');
        addAriaLabel('ss-btn-telegram', 'Telegram');
    });

    function addAriaLabel(className, label) {
        let ariaTarget = document.getElementsByClassName(className);
        for (let i = 0, len = ariaTarget.length; i < len; i++) {
            ariaTarget[i].setAttribute('aria-label', label);
        }
    }
</script>
@endpush