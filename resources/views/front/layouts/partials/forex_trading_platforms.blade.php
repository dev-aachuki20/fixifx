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
            <div class="trade-grid-list">
          
                                
              <div class="trade-item meta-trader">
                <div class="trade-logo">
                  <img class="img-fluid" src="{{ asset('fixifx/images/Meta-Trader.png') }}" alt="{{ config('app.locale') == 'ja' ? 'Meta Trader 5 (MT5) - スプレッドが狭いFX海外口座FiXi FX（フィクシー）' : 'Meta Trader (MT5) - FiXi FX' }}">
                </div>
                <div class="download-text">
                  <h6>
                    {{__('message.download', [], config('app.locale'))}}
                  </h6>
                </div>
                <div class="social-platform">
                  <ul>
                    <li>
                      <a href="javascript:void();">
                        <img class="img-fluid" src="{{ asset('fixifx/images/windows.svg') }}" alt="{{ config('app.locale') == 'ja' ? 'Windows版MT5 - スプレッドが狭いFX海外口座FiXi FX' : 'Windows MT5 - FiXi FX' }}">
                      </a>
                    </li>
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
                </div>
              </div>
             
              <div class="trade-item advan-trader">
                <div class="trade-logo">
                  <img class="img-fluid" src="{{ asset('fixifx/images/advan-trade.png') }}" alt="{{ config('app.locale') == 'ja' ? 'Advan Trader (AT) - スプレッドが狭いFX海外口座FiXi FX（フィクシー）' : 'Advan Trader (AT) - FiXi FX' }}">
                </div>
                <div class="download-text">
                  <h6>
                    {{__('message.download', [], config('app.locale'))}}
                  </h6>
                </div>
                <div class="social-platform">
                    <ul>
                 
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
                </div>
              </div>
              
              <div class="trade-item c-trader">
                <div class="trade-logo">
                  <img class="img-fluid" src="{{ asset('fixifx/images/ctrader_logo_bird.png') }}" alt="{{ config('app.locale') == 'ja' ? 'cTrader - スプレッドが狭いFX海外口座FiXi FX（フィクシー）' : 'cTrader - FiXi FX' }}">
                </div>
                <div class="download-text">
                  <h6>
                    {{__('message.download', [], config('app.locale'))}}
                  </h6>
                </div>
                <div class="social-platform">
                   <ul>
                    <li>
                      <a href="javascript:void();">
                        <img class="img-fluid" src="{{ asset('fixifx/images/windows.svg') }}" alt="{{ config('app.locale') == 'ja' ? 'Windows版MT5 - スプレッドが狭いFX海外口座FiXi FX' : 'Windows MT5 - FiXi FX' }}">
                      </a>
                    </li>
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
                </div>
              </div>
              
            </div>
          </div>
            @endif
        </div>
      </div>
    </section>
    @endif
    <!-- end  -->
