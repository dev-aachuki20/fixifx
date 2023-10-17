<div class="broker-banner-wrap padding-t-120 hidebg-trade">
    <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6 col-sm-12">
            <div class="section-head text-center">
              <h2 class="max-w-427">{{__('message.Account_Type')}}</h2>
              <div class="discription">
                <p>{{ getSettingValue('standard_header_'.config('app.locale')) }}</p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 col-12">
            <div class="trading-acc-list">
              
              <div class="trading-acc-main">
                <div class="trading-icon light-blue">
                  <img src="{{ asset('fixifx/images/icons/standard.svg') }}" alt="{{ config('app.locale') == 'ja' ? 'STP - スプレッドが狭いFX海外口座 FiXi FX（フィクシー）' : 'ECN - FiXi FX' }}">
                </div>
                <div class="package-name">
                  <div class="package-name-bg light-blue">{{__('message.Standard')}}</div>
                </div>
                <h6>ECN-RAW</h6>
                <div class="divider-box"></div>
                <div class="showMore-wrapper textDetails showDetails-height">
                <div class="discription text-center">
                  <p>{{ getSettingValue('pro_header_'.config('app.locale')) }}</p>
                </div>
                <div class="package-list-details">
                  <ul>
                    @for($i=1; $i<=8; $i++)
                    @if(getSettingValue('pro_title_'.config('app.locale').'_'.$i))
                        <li> {{getSettingValue('pro_title_'.config('app.locale').'_'.$i)}} is {{getSettingValue('pro_value_'.$i) }}</li>
                    @endif
                    @endfor
                  </ul>
                </div>
                </div>
                <a href="javascript:void(0)" class="showDetails-more">{{__('message.show_more')}}</a>
                <div class="read-more-btn">
                  <a href="javascript:void();" class="custom-btn fill-btn">{{__('message.read_more')}}</a>
                </div>
              </div>
              
              <div class="trading-acc-main">
                <div class="trading-icon light-blue">
                  <img src="{{ asset('fixifx/images/icons/standard.svg') }}" alt="{{ config('app.locale') == 'ja' ? 'STP - スプレッドが狭いFX海外口座 FiXi FX（フィクシー）' : 'STP - FiXi FX' }}">
                </div>
                <div class="package-name">
                  <div class="package-name-bg light-blue">{{__('message.Standard')}}</div>
                </div>
                <h6>STP</h6>
                <div class="divider-box"></div>
                <div class="showMore-wrapper textDetails showDetails-height">
                <div class="discription text-center">
                  <p>{{ getSettingValue('standard_header_'.config('app.locale')) }}</p>
                </div>
                <div class="package-list-details">
                  <ul>
                    @for($i=1; $i<=8; $i++)
                    @if(getSettingValue('standard_title_'.config('app.locale').'_'.$i))
                    <li>{{getSettingValue('standard_title_'.config('app.locale').'_'.$i) }} is {{ getSettingValue('standard_value_'.$i) }}</li>
                    @endif
                    @endfor
                  </ul>
                </div>
                </div>
                <a href="javascript:void(0)" class="showDetails-more">{{__('message.show_more')}}</a>
                <div class="read-more-btn">
                  <a href="javascript:void();" class="custom-btn fill-btn">{{__('message.read_more')}}</a>
                </div>
              </div>
              
              <div class="trading-acc-main">
                <div class="trading-icon light-yellow">
                  <img src="{{ asset('fixifx/images/icons/premier.svg') }}" alt="{{ config('app.locale') == 'ja' ? 'STP - スプレッドが狭いFX海外口座 FiXi FX（フィクシー）' : 'ECN - FiXi FX' }}">
                </div>
                <div class="package-name">
                  <div class="package-name-bg light-yellow">{{__('message.Premier')}}</div>
                </div>
                <h6>ECN-RAW</h6>
                <div class="divider-box"></div>
                <div class="showMore-wrapper textDetails showDetails-height">
                <div class="discription text-center">
                  <p>{{getSettingValue('premium_header_'.config('app.locale')) }}</p>
                </div>
                <div class="package-list-details">
                  <ul>
                    @for($i=1; $i<=8; $i++)
                    @if(getSettingValue('premium_title_'.config('app.locale').'_'.$i))                      
                        <li>{{getSettingValue('premium_title_'.config('app.locale').'_'.$i)}} is {{getSettingValue('premium_value_'.$i) }}</li>
                    @endif
                    @endfor
                  </ul>
                </div>
                </div>
                <a href="javascript:void(0)" class="showDetails-more">{{__('message.show_more')}}</a>
                <div class="read-more-btn">
                  <a href="javascript:void();" class="custom-btn fill-btn">{{__('message.read_more')}}</a>
                </div>
              </div>              
              
              <div class="trading-acc-main">
                <div class="trading-icon light-yellow">
                  <img src="{{ asset('fixifx/images/icons/premier.svg') }}" alt="{{ config('app.locale') == 'ja' ? 'STP - スプレッドが狭いFX海外口座 FiXi FX（フィクシー）' : 'STP - FiXi FX' }}">
                </div>
                <div class="package-name">
                  <div class="package-name-bg light-yellow">{{__('message.Premier')}}</div>
                </div>
                <h6>STP</h6>
                <div class="divider-box"></div>
                <div class="showMore-wrapper textDetails showDetails-height">
                  <div class="discription text-center">
                  <p>{{getSettingValue('ecn_header_'.config('app.locale')) }}</p>
                </div>
                <div class="package-list-details">
                  <ul>
                    @for($i=1; $i<=8; $i++)
                    @if(getSettingValue('ecn_title_'.config('app.locale').'_'.$i))
                        <li>{{getSettingValue('ecn_title_'.config('app.locale').'_'.$i)}} is from {{getSettingValue('ecn_value_'.$i) }} pips ～</li>
                    @endif
                    @endfor
                  </ul>
                </div>
                </div>
                <a href="javascript:void(0)" class="showDetails-more">{{__('message.show_more')}}</a>
                <div class="read-more-btn">
                  <a href="javascript:void();" class="custom-btn fill-btn">{{__('message.read_more')}}</a>
                </div>
              </div>
              
             
            </div>
          </div>
        </div>
      </div>
</div>