<!-- Hero section  -->
@php
$submenu = App\Models\SubMenu::get();
$link = "";


@endphp



<section class="other-pages-banner padding-tb-180 d-flex flex-wrap align-items-center" @if(($page && $page->slug == 'faqs' && $page->bg_img != null) || ($page && $page->slug == 'contact-us' && $page->bg_img != null))
  style="background-image: url({{$page->bg_img}});"
  @else
  style="background-image: url({{ asset('fixifx/images/hero-bg.png') }});"
  @endif>

  <div class="container">
    <div class="row justify-content-end align-items-center">
      <div class="col-12 col-xl-6 col-lg-12 col-md-12 col-sm-12">
        <div class="other-banner-text hero-wrapper">
          <h1>
            @if($page->slug == 'contact-us')
            {{ $page->{config('app.locale').'_name'} }}
            @else
            {{ $page->{config('app.locale').'_desc'} }}
            @endif
          </h1>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('page', [config('app.locale'), 'home']) }}">Home</a></li>
              @for($i = 0; $i <= count(Request::segments()); $i++) @if($i==0 || $i==1) @continue; @endif @php $link .="/" . Request::segment($i); @endphp @if($i==count(Request::segments())) @if(Request::segment($i)=='faqs' || Request::segment($i)=='contact-us' ) <li class="breadcrumb-item"><a href="javascript:void();">{{ $page->menu->{config('app.locale').'_name'} }}</a></li>
                @endif

                <li class="breadcrumb-item active">{{ $page->{config('app.locale').'_name'} }}</li>


                @else
                <li class="breadcrumb-item"><a href="{{ $link }}">{{ ucwords(str_replace('-',' ',Request::segment($i))) }}</a></li>

                @endif
                @endfor
            </ol>
          </nav>

          @if($page && $page->slug == 'faqs')
          <form id="search-faqs" class="searchbox-container" action="javascript:void();">
            <input type="search" id="faq-searchbox" class="searchbox" name="search" autocomplete="off" placeholder="{{__('message.ask_a_question')}}..." id="search-input" oninput="showFaqResults(this)" />
            <button type="submit" class="searchbutton">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11 19C15.4183 19 19 15.4183 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11C3 15.4183 6.58172 19 11 19Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M21.0004 21L16.6504 16.65" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </button>
            <div class="faq-results"></div>
          </form>
          @endif
        </div>
      </div>
    </div>
  </div>
  @include('front.layouts.partials.promotional_numbers')
</section>
<!-- end  -->