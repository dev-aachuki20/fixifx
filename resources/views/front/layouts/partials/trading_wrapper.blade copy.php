    <!-- trading-wrapper  -->

    

    @php 

        $newSection = $section->where('section_no', 29)->first();

        $bannerSection = $common->where('section_no', 1)->first();

    @endphp



    <section class="trading-acc-type trading-wrapper bg-light-lightgray padding-b-120">

      <div class="broker-banner-wrap padding-tb-120">

        <div class="container">

          <div class="broker-slide">

            <div class="row">

              <div class="col-lg-12 col-12">

                <div class="broker-slide-inner">

                  <!-- Swiper -->

                  <div class="swiper-container mySwiper">

                    <div class="swiper-wrapper">

                      @foreach($bannerSection->subSection->where('status', 1)->where('page_id', 0) as $key => $value)  

                      <div class="swiper-slide">

                        <div class="broker-slide-box"  style="background-image: url({{ asset('fixifx/images/broker-slide.png') }});">

                          <div class="broker-content">

                            <div class="broker-slide-title">

                              <h2>{{ $newSection->{config('app.locale').'_title'} }}</h2>

                            </div>

                            <div class="broker-discription">

                              <p>

                                {{ $newSection->{config('app.locale').'_desc'} }}

                              </p>

                            </div>

                          </div>

                        </div>

                      </div>

                      @endforeach

                    </div>

                  </div>

                  <div class="listing-broker swiper-container tabs-buttons">

                    <ul class="swiper-wrapper">

                      @foreach($bannerSection->subSection->where('status', 1)->where('page_id', 0) as $key => $value)

                      <li class="broker-link swiper-slide {{ $loop->iteration == 1 ? 'active' : '' }}">

                        <div class="broker-list">

                          <div class="broker-list-title">

                            <h6>

                              {{ $value->{config('app.locale').'_title'} }}

                            </h6>

                          </div>

                        </div>

                      </li>

                      @endforeach

                      



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

                   <div class="broker-grid-item">

                    <div class="broker-icon">

                        <img src="{{ asset('fixifx/images').'/'. $value->icon}}" alt="">

                    </div>

                    <div class="broker-title">

                      <h6>

                       {{ $value->{config('app.locale').'_title'} }}

                      </h6>

                    </div>

                    <div class="broker-description">

                      <p>

                        {{ $value->{config('app.locale').'_desc'} }}

                      </p>

                    </div>

                  </div>

                   @endforeach

                </div>

              </div>

            </div>

          </div>

          @endif

        </div>

      </div>

       @include('front.layouts.partials.types_trading_accounts')

    </section>

    <!-- end  -->