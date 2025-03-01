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
        <div class="trading-acc-list swiper new-trade-acc-area">
            <div class="swiper-wrapper">
          <div class="trading-acc-main swiper-slide">
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
                  @for($i=1; $i<=8; $i++) @if(getSettingValue('pro_title_'.config('app.locale').'_'.$i)) <li> {{getSettingValue('pro_title_'.config('app.locale').'_'.$i)}}: {{getSettingValue('pro_value_'.$i) }}
                    </li>
                    @endif
                    @endfor
                </ul>
              </div>
            </div>
            <a href="javascript:void(0)" class="showDetails-more">{{__('message.show_more')}}</a>

            @if(isset(request()->route()->parameters['slug']) && request()->route()->parameters['slug'] == 'account-type')
            <div class="read-more-btn compare-more mb-3">
              <a href="#" class="custom-btn fill-btn-1 mb-0" data-bs-toggle="modal" data-bs-target="#specifications">{{__('message.compare_btn')}}</a>
            </div>

            <div class="read-more-btn mt-0">
              <a href="{{ getSettingValue('live_link') }}" target="_blank" class="custom-btn fill-btn">{{ getSettingValue('foot_live_link_btn_'.config('app.locale')) }}</a>
            </div>
            @else
            <div class="read-more-btn">
              <a href="{{route('page', ['locale' => config('app.locale'), 'slug' => 'account-type'])}}" class="custom-btn fill-btn">{{__('message.read_more')}}</a>
            </div>
            @endif

          </div>

          <div class="trading-acc-main swiper-slide">
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
                  @for($i=1; $i<=8; $i++) @if(getSettingValue('standard_title_'.config('app.locale').'_'.$i)) <li>{{getSettingValue('standard_title_'.config('app.locale').'_'.$i) }}: {{ getSettingValue('standard_value_'.$i) }}</li>
                    @endif
                    @endfor
                </ul>
              </div>
            </div>
            <a href="javascript:void(0)" class="showDetails-more">{{__('message.show_more')}}</a>
            @if(isset(request()->route()->parameters['slug']) && request()->route()->parameters['slug'] == 'account-type')
            <div class="read-more-btn compare-more mb-3">
              <a href="#" class="custom-btn fill-btn-1 mb-0" data-bs-toggle="modal" data-bs-target="#specifications">{{__('message.compare_btn')}}</a>
            </div>

            <div class="read-more-btn mt-0">
              <a href="{{ getSettingValue('live_link') }}" target="_blank" class="custom-btn fill-btn">{{ getSettingValue('foot_live_link_btn_'.config('app.locale')) }}</a>
            </div>
            @else
            <div class="read-more-btn">
              <a href="{{route('page', ['locale' => config('app.locale'), 'slug' => 'account-type'])}}" class="custom-btn fill-btn">{{__('message.read_more')}}</a>
            </div>
            @endif
          </div>

          <div class="trading-acc-main swiper-slide">
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
                  @for($i=1; $i<=8; $i++) @if(getSettingValue('premium_title_'.config('app.locale').'_'.$i)) <li>{{getSettingValue('premium_title_'.config('app.locale').'_'.$i)}}: {{getSettingValue('premium_value_'.$i) }}</li>
                    @endif
                    @endfor
                </ul>
              </div>
            </div>
            <a href="javascript:void(0)" class="showDetails-more">{{__('message.show_more')}}</a>

            @if(isset(request()->route()->parameters['slug']) && request()->route()->parameters['slug'] == 'account-type')
            <div class="read-more-btn compare-more mb-3">
              <a href="#" class="custom-btn fill-btn-1 mb-0" data-bs-toggle="modal" data-bs-target="#specifications">{{__('message.compare_btn')}}</a>
            </div>

            <div class="read-more-btn mt-0">
              <a href="{{ getSettingValue('live_link') }}" target="_blank" class="custom-btn fill-btn">{{ getSettingValue('foot_live_link_btn_'.config('app.locale')) }}</a>
            </div>

            @else
            <div class="read-more-btn">
              <a href="{{route('page', ['locale' => config('app.locale'), 'slug' => 'account-type'])}}" class="custom-btn fill-btn">{{__('message.read_more')}}</a>
            </div>
            @endif
          </div>

          <div class="trading-acc-main swiper-slide">
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
                  @for($i=1; $i<=8; $i++) @if(getSettingValue('ecn_title_'.config('app.locale').'_'.$i)) <li>{{getSettingValue('ecn_title_'.config('app.locale').'_'.$i)}}: {{getSettingValue('ecn_value_'.$i) }}</li>
                    @endif
                    @endfor
                </ul>
              </div>
            </div>
            <a href="javascript:void(0)" class="showDetails-more">{{__('message.show_more')}}</a>
            @if(isset(request()->route()->parameters['slug']) && request()->route()->parameters['slug'] == 'account-type')
            <div class="read-more-btn compare-more mb-3">
              <a href="#" class="custom-btn fill-btn-1 mb-0" data-bs-toggle="modal" data-bs-target="#specifications">{{__('message.compare_btn')}}</a>
            </div>

            <div class="read-more-btn mt-0">
              <a href="{{ getSettingValue('live_link') }}" target="_blank" class="custom-btn fill-btn">{{ getSettingValue('foot_live_link_btn_'.config('app.locale')) }}</a>
            </div>
            @else
            <div class="read-more-btn">
              <a href="{{route('page', ['locale' => config('app.locale'), 'slug' => 'account-type'])}}" class="custom-btn fill-btn">{{__('message.read_more')}}</a>
            </div>
            @endif
          </div>
            
            </div>
            <div class="swiper-pagination"></div>
            <div class="slider-arrows package-arrows">
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>



<!-- Modal -->
<div class="modal fade specifications-modal" id="specifications" tabindex="-1" aria-labelledby="specifications" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="25" height="25" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
          <path d="M18 6l-12 12" />
          <path d="M6 6l12 12" />
        </svg>
      </button>
      <div class="modal-body">
        <div class="table-box">
          <table>
            <thead>
              <tr>
                <th>
                  <div class="table-logo-box">
                    <img class="img-fluid" src="{{asset('fixifx/images/logo.svg')}}" alt="">
                    <div class="title">
                      <h5>
                        {{__('message.specifications')}}
                      </h5>
                    </div>
                  </div>
                </th>
                <th>
                  <div class="table-heading-box">
                    <div class="logo-hd">
                      <img class="img-fluid" src="{{asset('fixifx/images/table-h1.png')}}" alt="">
                    </div>
                    <div class="title">
                      <h5>
                        {{__('message.Standard')}}
                      </h5>
                    </div>
                    <div class="subtext">
                      <span>
                        ECN - RAW
                      </span>
                    </div>
                  </div>
                </th>
                <th>
                  <div class="table-heading-box">
                    <div class="logo-hd">
                      <img class="img-fluid" src="{{asset('fixifx/images/table-h1.png')}}" alt="">
                    </div>
                    <div class="title">
                      <h5>
                        {{__('message.Standard')}}
                      </h5>
                    </div>
                    <div class="subtext">
                      <span>
                        STP
                      </span>
                    </div>
                  </div>
                </th>
                <th>
                  <div class="table-heading-box premierbox">
                    <div class="logo-hd">
                      <img class="img-fluid" src="{{asset('fixifx/images/table-h2.png')}}" alt="">
                    </div>
                    <div class="title">
                      <h5>
                        {{__('message.Premier')}}
                      </h5>
                    </div>
                    <div class="subtext">
                      <span>
                        ECN - RAW
                      </span>
                    </div>
                  </div>
                </th>
                <th>
                  <div class="table-heading-box premierbox">
                    <div class="logo-hd">
                      <img class="img-fluid" src="{{asset('fixifx/images/table-h2.png')}}" alt="">
                    </div>
                    <div class="title">
                      <h5>
                        {{__('message.Premier')}}
                      </h5>
                    </div>
                    <div class="subtext">
                      <span>
                        STP
                      </span>
                    </div>
                  </div>
                </th>
              </tr>
            </thead>
            <tbody>
              @for($i=1; $i<=8; $i++) <tr>
                <th>
                  {{getSettingValue('pro_title_'. config('app.locale') . '_' .$i)}}
                </th>
                <td>
                  {{ getSettingValue('pro_value_'. $i) }}
                </td>
                <td>
                  {{ getSettingValue('standard_value_'. $i) }}
                </td>
                <td>
                  {{ getSettingValue('premium_value_'. $i) }}
                </td>
                <td>
                  {{ getSettingValue('ecn_value_'. $i) }}
                </td>
                </tr>
                @endfor
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>