    <!-- Global Financial Markets  -->
     @php $section3 = $section->where('section_no', 3)->first() @endphp
     @if($section3)
    <section class="globalFinancial-wrapper globalFinancial-bg padding-tb-120">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6 col-sm-12">
            <div class="section-head text-center">
              <h2 class="max-w-427">{{ $section3->{config('app.locale').'_title'} }}</h2>
              <div class="discription">
                <p>{!! $section3->{config('app.locale').'_desc'} !!}</p>
              </div>
            </div>
          </div>
        </div>
        
        @if(count($section3->subSection))
        <div class="row globalFinancial-grid-row">
            @foreach($section3->subSection->where('status', 1) as $key => $value)   
             @php $slug = $icon = $global_market_alt = '' @endphp
                @if($key == 0)
                    @php
                        $slug = 'forex';
                        $icon = asset('fixifx/images/Global-icon1.svg');
                        if(config('app.locale') == 'ja'){
                            $global_market_alt = 'FX - スプレッドが狭いFX海外口座FiXi FX（フィクシー）';
                        }else{
                            $global_market_alt = 'FX - FiXi FX';
                        }
                    @endphp
                @elseif($key == 1)
                    @php
                        $slug = 'precious-metals';
                        $icon = asset('fixifx/images/Global-icon2.svg');
                        if(config('app.locale') == 'ja'){
                            $global_market_alt = '貴金属 - スプレッドが狭いFX海外口座FiXi FX（フィクシー）';
                        }else{
                            $global_market_alt = 'precious metals - FiXi FX';
                        }
                    @endphp
                @elseif($key == 2)
                    @php
                        $slug = 'index-cfds';
                        $icon = asset('fixifx/images/Global-icon3.svg');
                        if(config('app.locale') == 'ja'){
                            $global_market_alt = 'インデックス投資 - スプレッドが狭いFX海外口座FiXi FX（フィクシー）';
                        }else{
                            $global_market_alt = 'index CFDs - FiXi FX';
                        }
                    @endphp
                @elseif($key == 3)
                    @php
                        $slug = 'index-cfds';
                        $icon = asset('fixifx/images/Global-icon4.svg');
                        if(config('app.locale') == 'ja'){
                            $global_market_alt = '仮想通貨 - スプレッドが狭いFX海外口座FiXi FX（フィクシー）';
                        }else{
                            $global_market_alt = 'virtual currency - FiXi FX';
                        }
                    @endphp
                @elseif($key == 4)
                    @php
                        $slug = 'soft-commodities';
                        $icon = asset('fixifx/images/Global-icon5.svg');
                        if(config('app.locale') == 'ja'){
                            $global_market_alt = '株式 - スプレッドが狭いFX海外口座FiXi FX（フィクシー）';
                        }else{
                            $global_market_alt = 'soft commodities - FiXi FX';
                        }
                    @endphp
                @elseif($key == 5)
                    @php
                        $slug = 'energies';
                        $icon = asset('fixifx/images/Global-icon6.svg');
                        if(config('app.locale') == 'ja'){
                            $global_market_alt = 'エネルギー - スプレッドが狭いFX海外口座FiXi FX（フィクシー）';
                        }else{
                            $global_market_alt = 'energies - FiXi FX';
                        }
                    @endphp
                @endif
                
                <div class="col-12 col-lg-4 col-md-6 ">
                    <a href="{{ route('page', [config('app.locale'), $slug]) }}" target="_blank" class="globalFinancial-grid-main">
                      <div class="globalFinancial-grid-box">
                        <div class="global-icon">
                          <img class="img-fluid" src="{{ $icon }}" alt="{{ $global_market_alt }}">
                        </div>
                        <div class="global-content">
                          <div class="global-title">
                            <h5>
                              {{ $value->{config('app.locale').'_title'} }}
                            </h5>
                          </div>
                          <div class="global-description">
                            <p>
                              {{ $value->{config('app.locale').'_desc'} }}
                            </p>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>                
            @endforeach  
               
            
          
        </div>
        @endif
      </div>
    </section>
    @endif
    <!-- end  -->
