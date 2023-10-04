        <!-- Get Started  -->
    
    @php 
     $section6 = $common->where('section_no', 1)->first();
    @endphp
    @if($section6)
    @php $menu_page = App\Models\MenuPage::where('menu_id', 3)->get(); @endphp
    <section class="get-started-sec padding-tb-120">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8 col-sm-12">
            <div class="section-head text-center">
              <h2>{{ $section6->{config('app.locale').'_title'} }}</h2>
              <div class="discription">
                {!! $section6->{config('app.locale').'_desc'} !!}
              </div>
            </div>
          </div>
        </div>
        <div class="row row-gap-24">
          <div class="col-lg-12 col-12">
           @if(count($section6->subSection))   
            <div class="get-started-outer">
                
              @foreach($section6->subSection->where('status', 1)->where('page_id', -1) as $key => $value)
              <div class="get-started">
                <div class="get-started-top">
                  <div class="count-get">0{{$key+1}}</div>
                  <div class="get-started-icon">
                    <span>
                        @if($key == 0)
                        <img src="{{ asset('fixifx/images/icons/signup.svg') }}" class="img-fluid" alt="signup" loading="lazy"/>
                        @elseif($key == 1)
                        <img src="{{ asset('fixifx/images/icons/funds.svg') }}" class="img-fluid" alt="funds" loading="lazy"/>
                        @elseif($key == 2)
                        <img src="{{ asset('fixifx/images/icons/trading-accounts.svg') }}" class="img-fluid" alt="trading-accounts" loading="lazy"/>
                        @endif
                    </span>
                  </div>
                  <div class="bottom-line-icon"></div>
                </div>
                <div class="get-started-bottom text-center">
                  <h4>{{ $value->{config('app.locale').'_title'} }}</h4>
                  <p>{{ $value->{config('app.locale').'_desc'} }}</p>
                </div>
              </div>
              @endforeach
                 
            </div>
            @endif
          </div>
        </div>
      </div>
    </section>
    @endif
    
    <!-- End  -->
    