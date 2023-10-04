@php
$menu = App\Models\Menu::where('status', 1)->get();
$sub_menu = App\Models\SubMenu::where('status', 1)->get();
@endphp
<footer>
    <!-- footer banner -->
      <div class="footer_banner">
            <div class="footer_gradient"></div>
            <div class="footer_banner_bg">
                {!! getSettingValue('footer_common_'.config('app.locale')) !!}
                <div class="in-slideshow-button">
                    <a href="{{ getSettingValue('live_link') }}" rel="noreferrer noopener" target="_blank" class="uk-button uk-button-primary uk-border-rounded uk-margin-small-right my-1 footer_banner_btn">{{ getSettingValue('live_link_btn_'.config('app.locale')) }}</a>
                    <a href="{{ getSettingValue('demo_link') }}" rel="noreferrer noopener" target="_blank" class="uk-button uk-button-default uk-border-rounded my-1 footer_btn_white uk-margin-small-right footer_banner_btn">{{ getSettingValue('demo_link_btn_'.config('app.locale')) }}</a>
                </div>
            </div>
      </div>
    <!-- footer content begin -->
    <div class="uk-section uk-section-primary uk-padding-remove-horizontal">
        <div class="uk-container">
            <div class="uk-child-width-1-2@s uk-child-width-1-4@m uk-flex" data-uk-grid>
                <div class="uk-flex-first">
                    <ul class="uk-list uk-link-text">
                        <li><a href="{{ route('page', [config('app.locale'), 'home']) }}"><img class="uk-margin-small-bottom" src="{{asset('front/img/in-lazy.svg')}}" data-src="{{asset('front/img/fixi-fx-logo.webp')}}" loading="lazy" alt="{{ config('app.locale') == 'ja' ? 'スプレッドが狭いFX海外口座 - FiXi FX（フィクシー）' : 'FiXi FX' }}" width="130" height="57" data-uk-img></a></li>
                        {{-- @foreach($menu as $m)
                        <li><span>{{ $m->{config('app.locale').'_name'} }}</span></li>
                        @endforeach --}}
                        <!-- <li><a href="affiliates.html">Partnership</a></li>
                        <li><a href="trading-strategy.html">Online Trading Tool</a></li>
                        <li><a href="company-profile.html">About Us</a></li>
                        <li><a href="event-news.html">News</a></li> -->
                    </ul>
                </div>
                <dl>
                    <dt class="uk-heading-bullet footer-upper-title no-margin-footer-upper-title">Contact us</dt>
                    <dd>
                        <ul class="uk-list uk-link-text footer-upper-ul">
                            <li><a href="http://maps.google.com/maps/place/{{ getSettingValue('address') }}" class="uk-flex" target="_blank"><i class="fas fa-map-marker-alt uk-margin-small-right"></i>{{ getSettingValue('address') }}</a></li>
                            <li><a href="tel: +44 (0) 20 3637 8263" aria-label="{{ config('app.locale') == 'ja' ? 'FiXi（フィクシー）の電話番号' : 'phone number' }}"><i class="fas fa-phone-alt uk-margin-small-right"></i>{{ getSettingValue('admin_contact') }}</a></li>
                            <li><a href="mailto: info@fixifx.com"><i class="fas fa-envelope uk-margin-small-right"></i>{{ getSettingValue('admin_email') }}</a></li>
                        </ul>
                    </dd>
                </dl>
                <dl>
                    <dt class="uk-heading-bullet footer-upper-title">Support</dt>
                    <dd>
                        <ul class="uk-list uk-link-text footer-upper-ul">
                            <li><a href="{{ route('terms_page') }}">{{ getSettingValue('terms_title_'.config('app.locale')) }}</a></li>
                            <li><a href="{{ route('privacy_page') }}">{{ getSettingValue('privacy_title_'.config('app.locale')) }}</a></li>
                            <li><a href="{{ route('page', [config('app.locale'), 'legal-documents']) }}">{{ __('message.legal_documents') }}</a></li>
                        </ul>
                    </dd>
                </dl>
                <dl>
                    <dt class="uk-heading-bullet footer-upper-title">Follow Us</dt>
                    <dd>
                        <ul class="footer-socials footer-upper-ul">
                            <li><a href="{{ getSettingValue('youtube_link') }}" aria-label="YouTube"><i class="fab fa-youtube"></i></a></li>
                            <li><a href="{{ getSettingValue('fb_link') }}" aria-label="Facebook"><i class="fab fa-facebook-square"></i></a></li>
                            <li><a href="{{ getSettingValue('insta_link') }}" aria-label="Instagram"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="{{ getSettingValue('twitter_link') }}" aria-label="Twitter"><i class="fab fa-twitter"></i></a></li>
                        </ul>
                        @php $datas = App\Models\Setting::where('key', 'like', 'payment_%')->get();@endphp
                        <ul class="footer_img_gallery">
                            @foreach($datas as $key=>$value)
                                @php
                                    $payment_method_icon_alt = '';
                                    if($key == 0){
                                        if(config('app.locale') == 'ja'){
                                            $payment_method_icon_alt = 'VISA - スプレッドが狭いFX海外口座FiXi FX（フィクシー）';
                                        }else{
                                            $payment_method_icon_alt = 'VISA';
                                        }
                                    }else if($key == 1){
                                        if(config('app.locale') == 'ja'){
                                            $payment_method_icon_alt = 'PrimoPay - NDD方式(A-book)の海外口座FiXi FX（フィクシー）';
                                        }else{
                                            $payment_method_icon_alt = 'PrimoPay';
                                        }
                                    }else if($key == 2){
                                        if(config('app.locale') == 'ja'){
                                            $payment_method_icon_alt = 'Bitcoin（ビットコイン） - cTraderコピー取引の海外口座FiXi FX（フィクシー）';
                                        }else{
                                            $payment_method_icon_alt = 'Bitcoin';
                                        }
                                    }else if($key == 3){
                                        if(config('app.locale') == 'ja'){
                                            $payment_method_icon_alt = 'Ethereum（イーサリアム） - スキャルピングOKの海外口座FiXi FX（フィクシー）';
                                        }else{
                                            $payment_method_icon_alt = 'Ethereum';
                                        }
                                    }else if($key == 4){
                                        if(config('app.locale') == 'ja'){
                                            $payment_method_icon_alt = 'Tether（テザー） - スプレッドが狭いFX海外口座FiXi FX（フィクシー）';
                                        }else{
                                            $payment_method_icon_alt = 'Tether';
                                        }
                                    }
                                @endphp
                            <li><a href="#"><img src="{{ asset('storage/Setting/'.$value['value']) }}" alt="{{ $payment_method_icon_alt }}" loading="lazy" class="img-fluid"></a></li>
                            @endforeach
                        </ul>
                    </dd>
                </dl>
            </div>
            <hr class="in-margin-top-20@s uk-margin-medium-top in-margin-bottom-20@s uk-margin-medium-bottom">
            <div class="uk-margin-bottom sitemap-wrapper">
                <div class="uk-child-width-1-3@s uk-child-width-1-6@l uk-child-width-1-4@m uk-flex" data-uk-grid>
                    <dl class="sitemap_widget">
                        @if($sub_menu->get(0)->{config('app.locale').'_name'})<dt class="uk-heading-bullet footer-lower-title">{{ $sub_menu->get(0)->{config('app.locale').'_name'} }}</dt>@endif
                        <dd>
                            <ul class="uk-list uk-link-text footer-lower-ul">
                                @foreach($sub_menu->get(0)->menuPage as $page)
                                    <li><a href="{{ route('page', [config('app.locale'), $page->slug]) }}">{{ $page->{config('app.locale').'_name'} }}</a></li>
                                @endforeach
                            </ul>
                            @if($sub_menu->get(1)->{config('app.locale').'_name'})<dt class="uk-heading-bullet footer-lower-title">{{ $sub_menu->get(1)->{config('app.locale').'_name'} }}</dt>@endif
                            <ul class="uk-list uk-link-text footer-lower-ul">
                                @foreach($sub_menu->get(1)->menuPage as $page)
                                    <li><a href="{{ route('page', [config('app.locale'), $page->slug]) }}">{{ $page->{config('app.locale').'_name'} }}</a></li>
                                @endforeach
                            </ul>
                        </dd>
                    </dl>
                    <dl class="sitemap_widget">
                        @if($sub_menu->get(2)->{config('app.locale').'_name'})<dt class="uk-heading-bullet footer-lower-title">{{ $sub_menu->get(2)->{config('app.locale').'_name'} }}</dt>@endif
                        <dd>
                            <ul class="uk-list uk-link-text footer-lower-ul">
                                @foreach($sub_menu->get(2)->menuPage as $page)
                                    <li><a href="{{ route('page', [config('app.locale'), $page->slug]) }}">{{ $page->{config('app.locale').'_name'} }}</a></li>
                                @endforeach
                            </ul>
                        </dd>
                        @if($sub_menu->get(3)->{config('app.locale').'_name'})<dt class="uk-heading-bullet footer-lower-title">{{ $sub_menu->get(3)->{config('app.locale').'_name'} }}</dt>@endif
                        <dd>
                            <ul class="uk-list uk-link-text footer-lower-ul">
                                @foreach($sub_menu->get(3)->menuPage as $page)
                                    <li><a href="{{ route('page', [config('app.locale'), $page->slug]) }}">{{ $page->{config('app.locale').'_name'} }}</a></li>
                                @endforeach
                            </ul>
                        </dd>
                    </dl>
                    <dl class="sitemap_widget">
                        @if($sub_menu->get(14) && $sub_menu->get(14)->{config('app.locale').'_name'})<dt class="uk-heading-bullet footer-lower-title">{{ $sub_menu->get(14)->{config('app.locale').'_name'} }}</dt>@endif
                        @if($sub_menu->get(14))
                        <dd>
                            <ul class="uk-list uk-link-text footer-lower-ul">
                                @foreach($sub_menu->get(14)->menuPage as $page)
                                    <li><a href="{{ route('page', [config('app.locale'), $page->slug]) }}">{{ $page->{config('app.locale').'_name'} }}</a></li>
                                @endforeach
                            </ul>     
                        </dd>     
                        @endif
                        @if($menu->get(2)->{config('app.locale').'_name'})<dt class="uk-heading-bullet footer-lower-title">{{ $menu->get(2)->{config('app.locale').'_name'} }}</dt>@endif
                        <dd>
                            <ul class="uk-list uk-link-text footer-lower-ul">
                                @foreach($menu->get(2)->subMenu as $page)
                                    @foreach($page->menuPage as $slug)
                                    <li><a href="{{ route('page', [config('app.locale'), $slug->slug]) }}">{{ $page->{config('app.locale').'_name'} }}</a></li>
                                    @endforeach
                                @endforeach
                            </ul>
                        </dd>
                        @if($sub_menu->get(7)->{config('app.locale').'_name'})<dt class="uk-heading-bullet footer-lower-title">{{ $sub_menu->get(7)->{config('app.locale').'_name'} }}</dt>@endif
                        <dd>
                            <ul class="uk-list uk-link-text footer-lower-ul">
                                @foreach($sub_menu->get(7)->menuPage as $page)
                                    <li><a href="{{ route('page', [config('app.locale'), $page->slug]) }}">{{ $page->{config('app.locale').'_name'} }}</a></li>
                                @endforeach
                            </ul>
                        </dd>
                    </dl>
                    <dl class="sitemap_widget">
                        @if($sub_menu->get(8)->{config('app.locale').'_name'})<dt class="uk-heading-bullet footer-lower-title">{{ $sub_menu->get(8)->{config('app.locale').'_name'} }}</dt>@endif
                        <dd>
                            <ul class="uk-list uk-link-text footer-lower-ul">
                                @foreach($sub_menu->get(8)->menuPage as $page)
                                    <li><a href="{{ route('page', [config('app.locale'), $page->slug]) }}">{{ $page->{config('app.locale').'_name'} }}</a></li>
                                @endforeach
                            </ul>
                        </dd>
                        @if($sub_menu->get(9)->{config('app.locale').'_name'})<dt class="uk-heading-bullet footer-lower-title">{{ $sub_menu->get(9)->{config('app.locale').'_name'} }}</dt>@endif
                        <dd>
                            <ul class="uk-list uk-link-text footer-lower-ul">
                                @foreach($sub_menu->get(9)->menuPage as $page)
                                    <li><a href="{{ route('page', [config('app.locale'), $page->slug]) }}">{{ $page->{config('app.locale').'_name'} }}</a></li>
                                @endforeach
                            </ul>
                        </dd>
                    </dl>
                    <dl class="sitemap_widget">
                        @if($sub_menu->get(10)->{config('app.locale').'_name'})<dt class="uk-heading-bullet footer-lower-title">{{ $sub_menu->get(10)->{config('app.locale').'_name'} }}</dt>@endif
                        <dd>
                            <ul class="uk-list uk-link-text footer-lower-ul">
                                @foreach($sub_menu->get(10)->menuPage as $page)
                                    <li><a href="{{ route('page', [config('app.locale'), $page->slug]) }}">{{ $page->{config('app.locale').'_name'} }}</a></li>
                                @endforeach
                            </ul>
                        </dd>
                        @if($sub_menu->get(11)->{config('app.locale').'_name'})<dt class="uk-heading-bullet footer-lower-title">{{ $sub_menu->get(11)->{config('app.locale').'_name'} }}</dt>@endif
                        <dd>
                            <ul class="uk-list uk-link-text footer-lower-ul">
                                @foreach($sub_menu->get(11)->menuPage as $page)
                                    <li><a href="{{ route('page', [config('app.locale'), $page->slug]) }}">{{ $page->{config('app.locale').'_name'} }}</a></li>
                                @endforeach
                            </ul>
                        </dd>
                    </dl>
                    <dl class="sitemap_widget">
                        @if($sub_menu->get(12)->{config('app.locale').'_name'})<dt class="uk-heading-bullet footer-lower-title">{{ $sub_menu->get(12)->{config('app.locale').'_name'} }}</dt>@endif
                        <dd>
                            <ul class="uk-list uk-link-text footer-lower-ul">
                                @foreach($sub_menu->get(12)->menuPage as $page)
                                    <li><a href="{{ route('page', [config('app.locale'), $page->slug]) }}">{{ $page->{config('app.locale').'_name'} }}</a></li>
                                @endforeach
                            </ul>
                        </dd>
                        @if($sub_menu->get(13)->{config('app.locale').'_name'})<dt class="uk-heading-bullet footer-lower-title">{{ $sub_menu->get(13)->{config('app.locale').'_name'} }}</dt>@endif
                        <dd>
                            <ul class="uk-list uk-link-text footer-lower-ul">
                                @foreach($sub_menu->get(13)->menuPage as $page)
                                    <li><a href="{{ route('page', [config('app.locale'), $page->slug]) }}">{{ $page->{config('app.locale').'_name'} }}</a></li>
                                @endforeach
                            </ul>
                        </dd>
                    </dl>
                </div>
            </div>
            <div class="uk-grid uk-flex uk-flex-center uk-margin-medium-top" data-uk-grid>
                <div class="uk-margin-bottom">
                    <dl class="in-footer-warning in-margin-top-20@s">
                        <dt class="uk-text-small uk-text-uppercase footer-risk-warning-title"><span class="footer-risk-warning-span">{{ getSettingValue('risk_title_'.config('app.locale')) }}</span></dt>
                        <dd class="uk-text-small footer-risk-warning-content">{{ getSettingValue('risk_desc_'.config('app.locale')) }}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
    <div class="buttom-footer uk-padding-small px-0">
        <div class="uk-container">
            <div class="d-flex justify-content-between">
                <div class="uk-width-1-2@m in-copyright-text">
                    <p class="my-1">{{__('message.footer')}}</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- footer content end -->
    <!-- module totop begin -->
    <div class="uk-visible@m">
        {{--<a href="javascript:;" class="in-totop fas fa-chevron-up" data-uk-scroll></a>--}}
        <a href="#" class="in-totop fas fa-chevron-up" data-uk-scroll aria-label="{{ config('app.locale') == 'ja' ? 'このページの最上部へ移動' : 'Page top' }}"></a>
    </div>
    <!-- module totop begin -->
</footer>