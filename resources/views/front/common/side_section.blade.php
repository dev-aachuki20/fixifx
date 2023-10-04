<div class="sidebar_wrapper uk-width-expand@m uk-margin-medium-bottom">
    <div class="sidebar_wrapper_inner" uk-sticky="offset: 40; bottom: .inner-content;">
        <div class="sidebar-close-toggle">
            <a href="#"><i class="fas fa-times"></i></a>
        </div>
        <div class="sidebar-widget sidebar-menu-widget uk-card uk-card-default uk-card-body uk-border-rounded px-4 py-1 mb-4">
            <ul class="uk-accordion uk-list-divider in-faq-5" uk-accordion>
                @foreach($menu->subMenu as $key => $sub_menu)
                @if($sub_menu->{config('app.locale').'_name'})
                <li class="{{ (in_array(Route::current()->parameters()['slug'], $sub_menu->menuPage->pluck('slug')->toArray()) || (($sub_menu->menuPage->pluck('sub_menu_id')->first() == 1)&&(str_contains( Route::current()->parameters()['slug'],'ctrader')))) ? 'uk-open' : '' }}">
                    <a class="uk-accordion-title" href="#"><i class="fas {{ $sub_menu->icon }} mr-1"></i>{{ $sub_menu->{config('app.locale').'_name'} }}</a>
                    @endif
                    <div class="uk-accordion-content">
                        <ul class="uk-list uk-list-bullet in-list-arrow-double">
                            @foreach($sub_menu->menuPage as $menu_page)
                            <li class="{{ (Route::current()->parameters()['slug'] == $menu_page->slug) ? 'active' : '' }}"><a href="{{ route('page', [config('app.locale'), $menu_page->slug]) }}">{{ $menu_page->{config('app.locale').'_name'} }}</a></li>
                            @endforeach
                        </ul>
                        @if(!$sub_menu->{config('app.locale').'_name'})
                    </div>
                </li>
                @endif
                @endforeach
            </ul>
        </div>
        <div class="sidebar-widget financial-account-widget uk-background-black mb-4 uk-card uk-card-default uk-card-body uk-border-rounded p-0">
            <dl class="uk-card-body uk-border-rounded uk-background-center-center uk-background-cover px-4" style="background-image: url('{{ asset('front/img/fixi_fx-artboards.webp') }}');">
                <dt class="uk-text-uppercase uk-margin-remove-bottom making-account-title">{{ getSettingValue('global_title_'.config('app.locale')) }}</dt>
                <dd class="making-account-desc">{{ getSettingValue('global_desc_'.config('app.locale')) }}</dd>
                <dd class="in-slideshow-button">
                    <a href="{{ getSettingValue('live_link') }}" rel="noreferrer noopener" target="_blank" class="uk-button uk-button-primary uk-border-rounded">{{ getSettingValue('live_link_btn_'.config('app.locale')) }}</a>
                    <a href="{{ getSettingValue('demo_link') }}" rel="noreferrer noopener" target="_blank" class="uk-button uk-button-default uk-border-rounded my-1">{{ getSettingValue('demo_link_btn_'.config('app.locale')) }}</a>
                </dd>
            </dl>
        </div>
        {{--
        <div class="sidebar-widget newsletter-widget in-content-10">
            @include('front.common.news_letter')
        </div>
        --}}
    </div>
</div>