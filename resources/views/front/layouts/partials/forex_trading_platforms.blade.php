    <!-- Forex Trading Platforms  -->
    @php $section4 = $section->where('section_no', 4)->first() @endphp
    @if($section4)
    <section class="forexTrading-platforms padding-tb-120">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-12 col-sm-12">
            <div class="section-head text-center">
              <h2 class="max-w-427">{{ $section4->{config('app.locale').'_title'} }}</h2>
              <div class="discription">
                <p>{!! $section4->{config('app.locale').'_desc'} !!}</p>
              </div>
              <div class="overview-btn">
                <a href="javascript:void();" class="custom-btn fill-btn">{{__('message.overview_page') }}</a>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          {{--
            @php $sub1 = $section4->subSection->where('status', 1)[0] @endphp
            @php $sub2 = $section4->subSection->where('status', 1)[1] @endphp
            --}}

          @if(count($section4->subSection))
          <div class="col-12 col-lg-12 text-center">
            <div class="img-box">
              <img class="img-fluid" @if($section4->image && $section4->image != null) src="{{ asset($section4->image) }}" @else src="{{ asset('fixifx/images/Platforms-01.png') }} @endif alt="{{ config('app.locale') == 'ja' ? 'cTrader - スプレッドが狭いFX海外口座FiXi FX（フィクシー）' : 'cTrader - FiXi FX' }}">
            </div>
            <div class="trade-grid-list home-forex-list">

              @foreach($section4->subSection as $sub_sec_index => $sub_sec)
              @if($sub_sec->status == 1)
              <div class="trade-item meta-trader">
                <div>
                  <div class="trade-logo">
                    <img class="img-fluid" src="{{$sub_sec->image ? $sub_sec->image : asset('fixifx/images/Meta-Trader.png') }}" alt="{{ config('app.locale') == 'ja' ? 'Meta Trader 5 (MT5) - スプレッドが狭いFX海外口座FiXi FX（フィクシー）' : 'Meta Trader (MT5) - FiXi FX' }}">
                  </div>
                  <div class="download-text">
                    <h6>
                      {{ $sub_sec->{config('app.locale').'_title'} }}
                    </h6>
                  </div>
                </div>

                <!-- links -->
                <!-- <div class="social-platform">
                  <ul>
                    @if($sub_sec_index != 1)
                    <li>
                      <a href="javascript:void();">
                        <img class="img-fluid" src="{{ asset('fixifx/images/windows.svg') }}" alt="{{ config('app.locale') == 'ja' ? 'Windows版MT5 - スプレッドが狭いFX海外口座FiXi FX' : 'Windows MT5 - FiXi FX' }}">
                      </a>
                    </li>
                    @endif
                    <li>
                      <a href="javascript:void();">
                        <img class="img-fluid" src="{{ asset('fixifx/images/play-store.svg') }}" alt="{{ config('app.locale') == 'ja' ? 'Android版MT5 - スプレッドが狭いFX海外口座FiXi FX' : 'Android MT5 - FiXi FX' }}">
                      </a>
                    </li>
                    <li>
                      <a href="javascript:void();">
                        <img class="img-fluid" src="{{ asset('fixifx/images/safari.svg') }}" alt="{{ config('app.locale') == 'ja' ? 'macOS版MT5 - スプレッドが狭いFX海外口座FiXi FX' : 'Windows macOS - FiXi FX' }}">
                      </a>
                    </li>
                    <li>
                      <a href="javascript:void();">
                        <img class="img-fluid" src="{{ asset('fixifx/images/web.svg') }}" alt="{{ config('app.locale') == 'ja' ? 'macOS版MT5 - スプレッドが狭いFX海外口座FiXi FX' : 'Windows web - FiXi FX' }}">
                      </a>
                    </li>
                  </ul>
                </div> -->
                <!-- links end -->

                @if($sub_sec_index == 0)
                <div class="social-platform">
                  <ul>
                    <li>
                      <a href="{{ getSettingValue('window') ?: '#' }}" target="_blank">
                        <img class="img-fluid" src="{{ asset('fixifx/images/windows.svg') }}" alt="{{ config('app.locale') == 'ja' ? 'Windows版MT5 - スプレッドが狭いFX海外口座FiXi FX' : 'Windows MT5 - FiXi FX' }}">
                      </a>
                    </li>
                    <li>
                      <a href="{{ getSettingValue('apple') ?: '#' }}" target="_blank">
                        <img class="img-fluid" src="{{ asset('fixifx/images/play-store.svg') }}" alt="{{ config('app.locale') == 'ja' ? 'Android版MT5 - スプレッドが狭いFX海外口座FiXi FX' : 'Android MT5 - FiXi FX' }}">
                      </a>
                    </li>
                    <li>
                      <a href="{{ getSettingValue('ios') ?: '#' }}" target="_blank">
                        <img class="img-fluid" src="{{ asset('fixifx/images/safari.svg') }}" alt="{{ config('app.locale') == 'ja' ? 'macOS版MT5 - スプレッドが狭いFX海外口座FiXi FX' : 'Windows macOS - FiXi FX' }}">
                      </a>
                    </li>
                    <li>
                      <a href="{{ getSettingValue('android') ?: '#' }}" target="_blank">
                        <img class="img-fluid" src="{{ asset('fixifx/images/web.svg') }}" alt="{{ config('app.locale') == 'ja' ? 'macOS版MT5 - スプレッドが狭いFX海外口座FiXi FX' : 'Windows web - FiXi FX' }}">
                      </a>
                    </li>
                  </ul>
                </div>
                @elseif($sub_sec_index == 2)
                <div class="social-platform">
                  <ul>
                    <li>
                      <a href="{{ getSettingValue('cTrade_link_window') ?: '#' }}" target="_blank">
                        <img class="img-fluid" src="{{ asset('fixifx/images/windows.svg') }}" alt="{{ config('app.locale') == 'ja' ? 'Windows版MT5 - スプレッドが狭いFX海外口座FiXi FX' : 'Windows MT5 - FiXi FX' }}">
                      </a>
                    </li>
                    <li>
                      <a href="{{ getSettingValue('cTrader_link_apple') ?: '#' }}" target="_blank">
                        <img class="img-fluid" src="{{ asset('fixifx/images/play-store.svg') }}" alt="{{ config('app.locale') == 'ja' ? 'Android版MT5 - スプレッドが狭いFX海外口座FiXi FX' : 'Android MT5 - FiXi FX' }}">
                      </a>
                    </li>
                    <li>
                      <a href="{{ getSettingValue('cTrader_link_ios') ?: '#' }}" target="_blank">
                        <img class="img-fluid" src="{{ asset('fixifx/images/safari.svg') }}" alt="{{ config('app.locale') == 'ja' ? 'macOS版MT5 - スプレッドが狭いFX海外口座FiXi FX' : 'Windows macOS - FiXi FX' }}">
                      </a>
                    </li>
                    <li>
                      <a href="{{ getSettingValue('cTrader_link_android') ?: '#' }}" target="_blank">
                        <img class="img-fluid" src="{{ asset('fixifx/images/web.svg') }}" alt="{{ config('app.locale') == 'ja' ? 'macOS版MT5 - スプレッドが狭いFX海外口座FiXi FX' : 'Windows web - FiXi FX' }}">
                      </a>
                    </li>
                  </ul>
                </div>
                @elseif($sub_sec_index == 1)
                <div class="social-platform">
                  <ul>
                    <li>
                      <a href="{{ getSettingValue('advanTrade_link_apple') ?: '#' }}" target="_blank">
                        <img class="img-fluid" src="{{ asset('fixifx/images/play-store.svg') }}" alt="{{ config('app.locale') == 'ja' ? 'Android版MT5 - スプレッドが狭いFX海外口座FiXi FX' : 'Android MT5 - FiXi FX' }}">
                      </a>
                    </li>
                    <li>
                      <a href="{{ getSettingValue('advanTrade_link_ios') ?: '#' }}" target="_blank">
                        <img class="img-fluid" src="{{ asset('fixifx/images/safari.svg') }}" alt="{{ config('app.locale') == 'ja' ? 'macOS版MT5 - スプレッドが狭いFX海外口座FiXi FX' : 'Windows macOS - FiXi FX' }}">
                      </a>
                    </li>
                    <li>
                      <a href="{{ getSettingValue('advanTrade_link_android') ?: '#' }}" target="_blank">
                        <img class="img-fluid" src="{{ asset('fixifx/images/web.svg') }}" alt="{{ config('app.locale') == 'ja' ? 'macOS版MT5 - スプレッドが狭いFX海外口座FiXi FX' : 'Windows web - FiXi FX' }}">
                      </a>
                    </li>
                  </ul>
                </div>
                @endif

              </div>
              @endif
              @endforeach

              <!-- metatrade link -->
              <!-- <div class="trade-item meta-trader">
              
              </div> -->
              <!-- end -->

              <!-- ctrade links -->
              <!-- <div class="trade-item meta-trader">
                
              </div> -->
              <!-- end -->


              <!-- advan trade links -->
              <!-- <div class="trade-item meta-trader">
                
              </div> -->
              <!-- end -->

            </div>
          </div>
          @endif
        </div>
      </div>
    </section>
    @endif
    <!-- end  -->