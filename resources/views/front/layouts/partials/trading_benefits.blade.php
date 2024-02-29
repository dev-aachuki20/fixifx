    <!-- FiXi Trading Benefits  -->

    @php $section5 = $section->where('section_no', 5)->first() @endphp

    @if($section5)

    <?php $type = \Illuminate\Http\Testing\MimeType::from($section5->video_url) ?>

    <section class="tradingBenefits-wrapper tradingBenefits-bg side-by-side padding-t-120">

      <div class="container">

        <div class="row align-items-center">

          <div class="col-lg-6 col-sm-12">

            <div class="section-head">

              <h2 class="max-w-427">{{ $section5->{config('app.locale').'_title'} }}</h2>

              <div class="discription">

                <p>{!! $section5->{config('app.locale').'_desc'} !!}</p>

              </div>

              @if(count($section5->subSection))

              <div class="section-list">

                <ul>

                    @foreach($section5->subSection->where('status', 1) as $key => $value)      

                   

                    

                    <li>

                        <div class="icon-box">

                            @if($key == 0)

                                <img src="{{ asset('fixifx/images/tradingBenefits-icon01.svg') }}" alt="{{ config('app.locale') == 'ja' ? 'マーケット･スキャン･ツール - スプレッドが狭いFX海外口座FiXi FX（フィクシー）' : 'market scan tool - FiXi FX' }}" class="page_icon" loading="lazy">

                            @elseif($key == 1)

                                <img src="{{ asset('fixifx/images/tradingBenefits-icon02.svg') }}" alt="{{ config('app.locale') == 'ja' ? 'cTraderによるコピー取引 - NDD方式(A-book)の海外口座FiXi FX（フィクシー）' : 'market scan tool - FiXi FX' }}" class="page_icon" loading="lazy">

                            @elseif($key == 2)

                                <img src="{{ asset('fixifx/images/tradingBenefits-icon03.svg') }}" alt="{{ config('app.locale') == 'ja' ? 'MT5による自動売買 - スプレッドが狭いFX海外口座FiXi FX（フィクシー）' : 'MT5 Expert Advisors - FiXi FX' }}" class="page_icon" loading="lazy">

                            @endif

                        </div>

                        <div class="content-box">

                            <h6><a href="{{ route('page', [config('app.locale'), ($key == 0) ? 'economic-calendar' : (($key == 1) ? 'mt5-signal-trading' : 'mt5-expert-advisors')]) }}" class="content-box-link">{{ $value->{config('app.locale').'_title'} }}</a></h6>

                            <p>{{ $value->{config('app.locale').'_desc'} }}</p>

                        </div>

                    </li>

                   @endforeach



                </ul>

              </div>

              @endif



            </div>

          </div>

          <div class="col-lg-6 col-sm-12">

            <div class="side-by-side-img">

                

                @if(explode("/",$type)[0]=="video")

                <video src="{{$section5->video_url}}" type="video/mp4" id="sec_5_video" autoplay loop muted playsinline uk-video="autoplay: inview"></video>

                @elseif(explode("/",$type)[0]=="image")

                <img src="{{$section5->video_url}}" id="sec_5_video" alt="{{ config('app.locale') == 'ja' ? 'FiXi FX（フィクシー） - A-bookでcTraderが使えるスプレッドの狭いFX海外口座' : 'FiXi FX' }}">

                @endif

                

                



            </div>

          </div>

        </div>

      </div>

    </section>

    @endif