@php
$section6 = $common->where('section_no', 1)->first();
@endphp

@if($section6)
@php $menu_page = App\Models\MenuPage::where('menu_id', 3)->get(); @endphp

@if(request()->route()->parameters['slug'] != 'mt5-client-desktop' && request()->route()->parameters['slug'] != 'mt5-android-trader' && request()->route()->parameters['slug'] != 'mt5-mac-os-trader' && request()->route()->parameters['slug'] != 'mt5-iphone-trader' && request()->route()->parameters['slug'] != 'ctrader-ios' && request()->route()->parameters['slug'] != 'ctrader-android' && request()->route()->parameters['slug'] != 'ctrader-web')
<!-- Get Started Section -->
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
                  <img src="{{ asset('fixifx/images/icons/'. ($key == 0 ? 'signup' : ($key == 1 ? 'funds' : 'trading-accounts')) . '.svg') }}" class="img-fluid" alt="{{ $key == 0 ? 'signup' : ($key == 1 ? 'funds' : 'trading-accounts') }}" loading="lazy" />
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

@if(request()->route()->parameters['slug'] == 'mt5-client-desktop' || request()->route()->parameters['slug'] == 'mt5-android-trader' || request()->route()->parameters['slug'] == 'mt5-mac-os-trader' || request()->route()->parameters['slug'] == 'mt5-iphone-trader' || request()->route()->parameters['slug'] == 'ctrader-ios' || request()->route()->parameters['slug'] == 'ctrader-android' || request()->route()->parameters['slug'] == 'ctrader-web')
<!-- Trading Pages Section -->
<div class="row get-started-now-box">
  <div class="section-head text-center">
    <h2>{{ $section6->{config('app.locale').'_title'} }}</h2>
    <div class="discription">
      {!! $section6->{config('app.locale').'_desc'} !!}
    </div>
  </div>

  @if(count($section6->subSection))
  <div class="col-12">
    <div class="award-listing-inner">
      @foreach($section6->subSection->where('status', 1)->where('page_id', -1) as $key => $value)
      <div class="awrad-items">
        <div class="iconbox">
          <img class="img-fluid" src="{{ asset('fixifx/images/'. ($key == 0 ? 'programmer' : ($key == 1 ? 'profit' : 'bank')) . '.svg') }}" alt="{{ $key == 0 ? 'programmer' : ($key == 1 ? 'profit' : 'bank') }}">
        </div>
        <div class="title">
          <h6>
            {{ $value->{config('app.locale').'_title'} }}
          </h6>
        </div>
        <div class="discription">
          <p>{{ $value->{config('app.locale').'_desc'} }}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
  @endif
</div>
@endif
@endif