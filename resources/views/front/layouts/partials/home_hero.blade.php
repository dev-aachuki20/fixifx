<!-- Hero section  -->



@php $section1 = $section->where('section_no', 1)->first();

 $subSection1 = $section1->subSection->first();

@endphp

@if($section1)

<section class="other-pages-banner main-home-hero hero-main padding-tb-180 m-height-559 d-flex flex-wrap align-items-center" style="background-image: url('{{ asset('fixifx/images/home-hero-bg.jpg')}}');">

  <div class="container">

    @foreach ($section1->subSection as $sub_sec)

    <div class="row align-items-center">
      <div class="col-12 col-xl-6 col-lg-12 col-md-12 col-sm-12">
        <img src="{{ asset($subSection1->image) }}" alt="hero-left-image" class="img-fluid">
      </div>
      <div class="col-12 col-xl-6 col-lg-12 col-md-12 col-sm-12">

        <div class="other-banner-text hero-wrapper">

          <h1>{{ $sub_sec->{config('app.locale').'_title'} }}</h1>

          <div class="section-head text-editor-head">

            {!! $sub_sec->{config('app.locale').'_desc'} !!}

            <div class="button-group">

              <a href="{{ getSettingValue('live_link') }}"  target="_blank" class="custom-btn fill-btn-1">{{ getSettingValue('live_link_btn_'.config('app.locale')) }}</a>

              <a href="{{ getSettingValue('demo_link') }}"  target="_blank"  class="custom-btn fill-btn">{{ getSettingValue('demo_link_btn_'.config('app.locale')) }}</a>

            </div>

            <div class="sub-discription">

              <span>

                {{ getSettingValue('home_small_warning_'.config("app.locale")) }}

              </span>

            </div>

          </div>

        </div>

      </div>

    </div>

    @endforeach

  </div>

  @include('front.layouts.partials.promotional_numbers')

</section>

@endif   

<!-- end  -->

