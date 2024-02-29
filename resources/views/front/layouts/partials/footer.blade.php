    <!-- footer  -->

    @php

    $menu = App\Models\Menu::where('status', 1)->get();

    $sub_menu = App\Models\SubMenu::where('status', 1)->get();

    @endphp

    <footer class="footer-main">

      <div class="footer-top">

        <div class="container">

          <div class="d-flex flex-wrap">

            <div class="payment-footer">

              <h5 class="text-white">{{__('message.payment_method')}}</h5>

              @php $datas = App\Models\Setting::where('key', 'like', 'payment_%')->get();@endphp



              @if($datas)

              <ul class="border-bg">



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

                <li><a><img src="{{ asset('storage/Setting/'.$value['value']) }}" alt="{{ $payment_method_icon_alt }}"></a></li>

                @endforeach

              </ul>

              @endif

            </div>

            <div class="footer-social">

              <h5 class="text-white">{{__('message.media_center')}}</h5>

              <ul class="border-bg">

                <li><a href="{{ getSettingValue('twitter_link') }}" target="_blank"><img src="{{ asset('fixifx/images/icons/twitter.svg') }}" alt="twitter"></a></li>

                <li><a href="{{ getSettingValue('fb_link') }}" target="_blank"><img src="{{ asset('fixifx/images/icons/facebook.svg') }}" alt="facebook"></a></li>

                <li><a href="{{ getSettingValue('youtube_link') }}" target="_blank"><img src="{{ asset('fixifx/images/icons/youtube.svg') }}" alt="youtube"></a></li>

                <li><a href="{{ getSettingValue('insta_link') }}" target="_blank"><img src="{{ asset('fixifx/images/icons/instagram.svg') }}" alt="instagram"></a></li>

              </ul>

            </div>

          </div>

        </div>

      </div>

      <div class="footer-middle">

        <div class="container">

          <div class="row">

            <div class="col-lg-3 col-md-6 col-sm-12">

              <div class="footer-address">

                <div class="footer-logo">

                  <a href="{{ route('page', [config('app.locale'), 'home']) }}"><img src="{{ asset('fixifx/images/footer-logo.svg') }}" alt="{{ config('app.locale') == 'ja' ? 'スプレッドが狭いFX海外口座 - FiXi FX（フィクシー）' : 'FiXi FX' }}"></a>

                </div>

                <ul>

                  <li class="d-flex align-items-center iconsMain-wrapper">

                    <div class="icons-loaction">

                      <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">

                        <path opacity="0.4" d="M9.99997 10.6288C10.6532 10.6289 11.2798 10.3695 11.7418 9.90767C12.2038 9.44581 12.4634 8.81934 12.4635 8.16607C12.4636 7.5128 12.2042 6.88624 11.7424 6.42424C11.2805 5.96223 10.654 5.70262 10.0008 5.70251C9.34749 5.70251 8.72097 5.96202 8.25904 6.42396C7.79711 6.88589 7.5376 7.5124 7.5376 8.16567C7.5376 8.81894 7.79711 9.44546 8.25904 9.90739C8.72097 10.3693 9.34749 10.6288 10.0008 10.6288H9.99997Z" stroke="white" stroke-width="0.97561" />

                        <path d="M3.38403 6.72891C4.9393 -0.107931 15.0682 -0.100036 16.6156 6.73681C17.5235 10.7473 15.0288 14.1421 12.8419 16.2421C12.0778 16.9791 11.0575 17.3909 9.99587 17.3909C8.93423 17.3909 7.91397 16.9791 7.14982 16.2421C4.97087 14.1421 2.47614 10.7394 3.38403 6.72891Z" stroke="white" stroke-width="0.97561" />

                      </svg>

                    </div>

                    <div class="loactiop-de">{{ getSettingValue('address') }}</div>

                  </li>

                  <li>

                    <a href="tel:+91-1234567890" class="d-flex align-items-center">

                      <div class="icons-loaction">

                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">

                          <path d="M17.8708 14.9977C17.8708 15.2819 17.8076 15.574 17.6734 15.8582C17.5392 16.1424 17.3655 16.4109 17.1366 16.6635C16.7497 17.0898 16.3234 17.3977 15.8418 17.5951C15.3681 17.7924 14.855 17.8951 14.3023 17.8951C13.4971 17.8951 12.6366 17.7056 11.7287 17.3187C10.8208 16.9319 9.91287 16.4109 9.01287 15.7556C8.09559 15.0846 7.23 14.3457 6.4234 13.5451C5.62506 12.7414 4.88874 11.8784 4.22077 10.9635C3.5734 10.0635 3.05235 9.16349 2.6734 8.27138C2.29445 7.37138 2.10498 6.51085 2.10498 5.6898C2.10498 5.15296 2.19972 4.6398 2.38919 4.16612C2.57866 3.68454 2.87866 3.24243 3.29709 2.8477C3.80235 2.35033 4.35498 2.10559 4.93919 2.10559C5.16024 2.10559 5.3813 2.15296 5.57866 2.2477C5.78393 2.34243 5.96551 2.48454 6.10761 2.6898L7.93919 5.27138C8.0813 5.46875 8.18393 5.65033 8.25498 5.82401C8.32603 5.9898 8.36551 6.15559 8.36551 6.30559C8.36551 6.49506 8.31024 6.68454 8.19972 6.86612C8.09709 7.0477 7.94709 7.23717 7.75761 7.42664L7.15761 8.05033C7.07077 8.13717 7.0313 8.2398 7.0313 8.36612C7.0313 8.42928 7.03919 8.48454 7.05498 8.5477C7.07866 8.61085 7.10235 8.65822 7.11814 8.70559C7.26024 8.96612 7.50498 9.30559 7.85235 9.71612C8.20761 10.1266 8.58656 10.5451 8.99709 10.9635C9.4234 11.3819 9.83393 11.7687 10.2523 12.124C10.6629 12.4714 11.0023 12.7082 11.2708 12.8503C11.3102 12.8661 11.3576 12.8898 11.4129 12.9135C11.476 12.9372 11.5392 12.9451 11.6102 12.9451C11.7445 12.9451 11.8471 12.8977 11.9339 12.8109L12.5339 12.2187C12.7313 12.0214 12.9208 11.8714 13.1023 11.7766C13.2839 11.6661 13.4655 11.6109 13.6629 11.6109C13.8129 11.6109 13.9708 11.6424 14.1445 11.7135C14.3181 11.7845 14.4997 11.8872 14.6971 12.0214L17.3102 13.8766C17.5155 14.0187 17.6576 14.1845 17.7445 14.3819C17.8234 14.5793 17.8708 14.7766 17.8708 14.9977Z" stroke="white" stroke-width="0.97561" stroke-miterlimit="10" />

                          <path opacity="0.4" d="M15.1313 7.63191C15.1313 7.15822 14.7603 6.43191 14.2076 5.8398C13.7024 5.29506 13.0313 4.86875 12.3682 4.86875M17.8945 7.63191C17.8945 4.57664 15.4234 2.10559 12.3682 2.10559" stroke="white" stroke-width="0.97561" stroke-linecap="round" stroke-linejoin="round" />

                        </svg>

                      </div>

                      <div class="loactiop-de">{{ getSettingValue('admin_contact') }}</div>

                    </a>

                  </li>

                  <li>

                    <a href="mailto:info@fixifx.com" class="d-flex align-items-center">

                      <div class="icons-loaction">

                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">

                          <path d="M9.99985 6.84268V2.10583M9.99985 2.10583L8.4209 3.68478M9.99985 2.10583L11.5788 3.68478" stroke="white" stroke-width="0.97561" stroke-linecap="round" stroke-linejoin="round" />

                          <path d="M6.05243 10.0002C2.89453 10.0002 2.89453 11.4134 2.89453 13.1581V13.9476C2.89453 16.1266 2.89453 17.895 6.8419 17.895H13.1577C16.3156 17.895 17.1051 16.1266 17.1051 13.9476V13.1581C17.1051 11.4134 17.1051 10.0002 13.9472 10.0002C13.1577 10.0002 12.9366 10.166 12.5261 10.4739L11.7208 11.3266C11.4995 11.562 11.2322 11.7497 10.9355 11.878C10.6389 12.0063 10.3191 12.0724 9.99585 12.0724C9.67263 12.0724 9.35284 12.0063 9.05617 11.878C8.7595 11.7497 8.49224 11.562 8.27085 11.3266L7.47348 10.4739C7.06295 10.166 6.8419 10.0002 6.05243 10.0002Z" stroke="white" stroke-width="0.97561" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />

                          <path opacity="0.4" d="M4.47363 10.0004V8.42148C4.47363 6.83464 4.47363 5.52411 6.84205 5.29517M15.5263 10.0004V8.42148C15.5263 6.83464 15.5263 5.52411 13.1578 5.29517" stroke="white" stroke-width="0.97561" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />

                        </svg>

                      </div>

                      <div class="loactiop-de">{{ getSettingValue('admin_email') }} </div>

                    </a>

                  </li>

                </ul>

              </div>

            </div>

            <div class="col-lg-9 col-md-6 col-sm-12">

              <div class="footer-links-outer">

                <div class="footer-links-inner">



                  {{--

                  @if($sub_menu->get(0))

                  <div class="footer-links">

                     @if($sub_menu->get(0)->{config('app.locale').'_name'})<h5 class="footer-heading text-white">{{ $sub_menu->get(0)->{config('app.locale').'_name'} }}</h5>@endif

                  <ul>

                    @foreach($sub_menu->get(0)->menuPage as $page)

                    <li><a href="{{ route('page', [config('app.locale'), $page->slug]) }}">{{ $page->{config('app.locale').'_name'} }}</a></li>

                    @endforeach

                  </ul>

                </div>

                @endif





                @if($sub_menu->get(1))

                <div class="footer-links">

                  @if($sub_menu->get(1)->{config('app.locale').'_name'})<h5 class="footer-heading text-white">{{ $sub_menu->get(1)->{config('app.locale').'_name'} }}</h5>@endif

                  <ul>

                    @foreach($sub_menu->get(1)->menuPage as $page)

                    <li><a href="{{ route('page', [config('app.locale'), $page->slug]) }}">{{ $page->{config('app.locale').'_name'} }}</a></li>

                    @endforeach

                  </ul>

                </div>

                @endif

                --}}



                @if($sub_menu->get(2))

                <div class="footer-links">

                  @if($sub_menu->get(2)->{config('app.locale').'_name'})<h5 class="footer-heading text-white">{{ $sub_menu->get(2)->{config('app.locale').'_name'} }}</h5>@endif

                  <ul>

                    @foreach($sub_menu->get(2)->menuPage as $page)

                    <li><a href="{{ route('page', [config('app.locale'), $page->slug]) }}">{{ $page->{config('app.locale').'_name'} }}</a></li>

                    @endforeach

                  </ul>

                </div>

                @endif



                @if($sub_menu->get(3))

                <div class="footer-links">

                  @if($sub_menu->get(3)->{config('app.locale').'_name'})<h5 class="footer-heading text-white">{{ $sub_menu->get(3)->{config('app.locale').'_name'} }}</h5>@endif

                  <ul>

                    @foreach($sub_menu->get(3)->menuPage as $page)

                    <li><a href="{{ route('page', [config('app.locale'), $page->slug]) }}">{{ $page->{config('app.locale').'_name'} }}</a></li>

                    @endforeach

                  </ul>

                </div>

                @endif



              </div>



              <div class="footer-links-inner">

                @if($sub_menu->get(14))

                <div class="footer-links">

                  @if($sub_menu->get(14) && $sub_menu->get(14)->{config('app.locale').'_name'})<h5 class="footer-heading text-white">{{ $sub_menu->get(14)->{config('app.locale').'_name'} }}</h5>

                  @endif

                  @if($sub_menu->get(14))

                  <ul>

                    @foreach($sub_menu->get(14)->menuPage->whereNotIn('id', [52, 55]) as $page)

                    <li><a href="{{ route('page', [config('app.locale'), $page->slug]) }}">{{ $page->{config('app.locale').'_name'} }}</a></li>

                    @endforeach

                  </ul>

                  @endif

                </div>

                @endif



                @if($menu->get(2))

                <div class="footer-links">

                  @if($menu->get(2)->{config('app.locale').'_name'})

                  <h5 class="footer-heading text-white">{{ $menu->get(2)->{config('app.locale').'_name'} }}</h5>

                  @endif

                  <ul>

                    @foreach($menu->get(2)->subMenu as $page)

                    @foreach($page->menuPage as $slug)

                    <li><a href="{{ route('page', [config('app.locale'), $slug->slug]) }}">{{ $slug->{config('app.locale').'_name'} }}</a></li>

                    @endforeach

                    @endforeach

                  </ul>

                </div>

                @endif



                @if($sub_menu->get(7))

                <div class="footer-links">

                  @if($sub_menu->get(7)->{config('app.locale').'_name'})<h5 class="footer-heading text-white">{{ $sub_menu->get(7)->{config('app.locale').'_name'} }}</h5>@endif

                  <ul>

                    @foreach($sub_menu->get(7)->menuPage as $page)

                    <li><a href="{{ route('page', [config('app.locale'), $page->slug]) }}">{{ $page->{config('app.locale').'_name'} }}</a></li>

                    @endforeach

                  </ul>

                </div>

                @endif

              </div>



              <div class="footer-links-inner">

                @if($sub_menu->get(8))

                <div class="footer-links">

                  @if($sub_menu->get(8)->{config('app.locale').'_name'})<h5 class="footer-heading text-white">{{ $sub_menu->get(8)->{config('app.locale').'_name'} }}</h5>@endif

                  <ul>

                    @foreach($sub_menu->get(8)->menuPage->where('id', '!=', 51) as $page)

                    <li><a href="{{ route('page', [config('app.locale'), $page->slug]) }}">{{ $page->{config('app.locale').'_name'} }}</a></li>

                    @endforeach

                  </ul>

                </div>

                @endif



                @if($sub_menu->get(9))

                <div class="footer-links">

                  @if($sub_menu->get(9)->{config('app.locale').'_name'})<h5 class="footer-heading text-white">{{ $sub_menu->get(9)->{config('app.locale').'_name'} }}</h5>@endif

                  <ul>

                    @foreach($sub_menu->get(9)->menuPage as $page)

                    <li><a href="{{ route('page', [config('app.locale'), $page->slug]) }}">{{ $page->{config('app.locale').'_name'} }}</a></li>

                    @endforeach

                  </ul>

                </div>

                @endif



              </div>



              <div class="footer-links-inner">

                @if($sub_menu->get(10))

                <div class="footer-links">

                  @if($sub_menu->get(10)->{config('app.locale').'_name'})<h5 class="footer-heading text-white">{{ $sub_menu->get(10)->{config('app.locale').'_name'} }}</h5>@endif

                  <ul>

                    @foreach($sub_menu->get(10)->menuPage as $page)

                    <li><a href="{{ route('page', [config('app.locale'), $page->slug]) }}">{{ $page->{config('app.locale').'_name'} }}</a></li>

                    @endforeach

                  </ul>

                </div>

                @endif



                @if($sub_menu->get(11))

                <div class="footer-links">

                  @if($sub_menu->get(11)->{config('app.locale').'_name'})<h5 class="footer-heading text-white">{{ $sub_menu->get(11)->{config('app.locale').'_name'} }}</h5>@endif

                  <ul>

                    @foreach($sub_menu->get(11)->menuPage as $page)

                    <li><a href="{{ route('page', [config('app.locale'), $page->slug]) }}">{{ $page->{config('app.locale').'_name'} }}</a></li>

                    @endforeach

                  </ul>

                </div>

                @endif





              </div>



              <div class="footer-links-inner">

                @if($sub_menu->get(12))

                <div class="footer-links">

                  @if($sub_menu->get(12)->{config('app.locale').'_name'})<h5 class="footer-heading text-white">{{ $sub_menu->get(12)->{config('app.locale').'_name'} }}</h5>@endif

                  <ul>

                    @foreach($sub_menu->get(12)->menuPage as $page)

                    <li><a href="{{ route('page', [config('app.locale'), $page->slug]) }}">{{ $page->{config('app.locale').'_name'} }}</a></li>

                    @endforeach

                  </ul>

                </div>

                @endif



                @if($sub_menu->get(13))

                <div class="footer-links">

                  @if($sub_menu->get(13)->{config('app.locale').'_name'})<h5 class="footer-heading text-white">{{ $sub_menu->get(13)->{config('app.locale').'_name'} }}</h5>@endif

                  <ul>

                    @foreach($sub_menu->get(13)->menuPage as $page)

                    <li><a href="{{ route('page', [config('app.locale'), $page->slug]) }}">{{ $page->{config('app.locale').'_name'} }}</a></li>

                    @endforeach

                  </ul>

                </div>

                @endif





              </div>





            </div>

          </div>

        </div>

      </div>

      </div>

      <div class="footer-warning">

        <div class="container">

          <div class="row">

            <div class="col-md-12 col-sm-12">

              <div class="footer-warning-inner border-bg">

                <p>{{ getSettingValue('risk_title_'.config('app.locale')) }}: {{ getSettingValue('risk_desc_'.config('app.locale')) }}</p>

              </div>

            </div>

          </div>

        </div>

      </div>

      <div class="copyright-footer">

        <div class="container">

          <div class="row justify-content-between align-items-center">

            <div class="col-lg-3 col-md-5 col-12">

              <p>{{ getSettingValue('footer_copyright_'.config('app.locale')) }}</p>

            </div>

            <div class="col-lg-9 col-md-7 col-12">

              <ul class="d-flex align-items-center justify-content-end">

                {{--<li><a href="{{ route('terms_page') }}">{{ getSettingValue('terms_title_'.config('app.locale')) }}</a></li>

                <li><a href="{{ route('privacy_page') }}">{{ getSettingValue('privacy_title_'.config('app.locale')) }}</a></li>--}}



                <li><a href="{{ route('page', [config('app.locale'), 'terms-condition']) }}">{{ getSettingValue('terms_title_'.config('app.locale')) }}</a></li>

                <li><a href="{{ route('page', [config('app.locale'), 'privacy-policy']) }}">{{ getSettingValue('privacy_title_'.config('app.locale')) }}</a></li>

                <li><a href="{{ route('page', [config('app.locale'), 'legal-documents']) }}">{{ __('message.legal_documents') }}</a></li>

              </ul>

            </div>

          </div>

        </div>

      </div>

    </footer>

    <!-- end footer  -->