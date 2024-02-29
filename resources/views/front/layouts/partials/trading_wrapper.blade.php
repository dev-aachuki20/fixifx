    <!-- trading-wrapper  -->

    @php
    $newSection = $section->where('section_no', 29)->first();
    $bannerSection = $common->where('section_no', 1)->first();
    @endphp

    <section class="trading-acc-type trading-wrapper bg-light-lightgray padding-b-120">
      @if($newSection && $newSection->subSection)
      <div class="broker-banner-wrap padding-t-120 hidebg-trade" style="background-image: url({{asset('fixifx/images/bg-glob2.svg')}}); background-repeat: no-repeat; background-position: top right;background-position: 86% 10%;">

        <div class="container">
          <div class="broker-slide">
            <div class="row">
              <div class="col-lg-12 col-12">
                <div class="broker-slide-inner">
                  <!-- Swiper -->
                  <div class="swiper-container mySwiper">
                    <div class="swiper-wrapper">
                      @foreach($newSection->subSection->where('status', 1)->where('page_id', 0) as $key => $value)
                      @if($value->id == 120 || $value->id == 121 || $value->id == 122 || $value->id == 127 || $value->id == 128)
                      <div class="swiper-slide">
                        <div class="broker-slide-box" style="background-image: url({{ $value->image ? asset($value->image) : asset('fixifx/images/broker-slide.png') }});">
                          <div class="broker-content">
                            <div class="broker-slide-title">
                              <h2>{{ ucfirst($value->{config('app.locale').'_title'}) }}</h2>
                            </div>
                            <div class="broker-discription">
                              <p>
                                {!! ucfirst($value->{config('app.locale').'_desc'}) !!}
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                      @endif
                      @endforeach
                    </div>

                  </div>
                  <div class="listing-broker swiper-container tabs-buttons">
                    <ul class="swiper-wrapper">
                      @if($newSection && $newSection->subSection)
                      @foreach($newSection->subSection->where('status', 1)->where('page_id', 0) as $key => $value)
                      @if($value->id == 120 || $value->id == 121 || $value->id == 122 || $value->id == 127 || $value->id == 128)

                      <li class="broker-link swiper-slide {{ $loop->iteration == 1 ? 'active' : '' }}">
                        <div class="broker-list">
                          <div class="broker-list-title">
                            <h6>
                              {{ $value->{config('app.locale').'_short_text'} }}
                            </h6>
                          </div>
                        </div>
                      </li>
                      @endif
                      @endforeach
                      @endif


                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @if($newSection && count($newSection->subSection))
          <div class="broker-grid-box">
            <div class="row">
              <div class="col-lg-12 col-12">
                <div class="broker-grid">
                  @foreach($newSection->subSection->where('status', 1) as $key => $value)
                  @if($value->id == 116 || $value->id == 117 || $value->id == 118 || $value->id == 119)
                  <div class="broker-grid-item">
                    <div class="broker-icon">
                      {{-- <img src="{{ asset('fixifx/images').'/'. $value->icon}}" alt=""> --}}
                      <img src="{{ $value->image ? $value->image : asset('fixifx/images/broker-icon-1.svg')}}" alt="">
                    </div>
                    <div class="broker-title">
                      <h6>
                        {{ $value->{config('app.locale').'_title'} }}
                      </h6>
                    </div>
                    <div class="broker-description">
                      <p>
                        {!! ucfirst($value->{config('app.locale').'_desc'}) !!}
                      </p>
                    </div>
                  </div>
                  @endif
                  @endforeach
                </div>
              </div>
            </div>
          </div>
          @endif
        </div>
      </div>
      @endif
      @include('front.layouts.partials.types_trading_accounts')
    </section>
    <!-- end  -->