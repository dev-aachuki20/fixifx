<!-- Hero section  -->
@php
$submenu = App\Models\SubMenu::get();
$link = "";
@endphp


<section class="other-pages-banner blog-hero padding-tb-120 d-flex flex-wrap align-items-center" @if($page && $page->slug == 'prex-blogs' && $page->bg_img != null) style="background-image: url({{$page->bg_img}}); @else style="background-image: url({{ asset('fixifx/images/blog-bg.png') }}); @endif">
  <div class="container">
    <div class="row justify-content-center align-items-center">
      <div class="col-12 col-xl-6 col-sm-12">
        <div class="other-banner-text text-center hero-wrapper">
          <img src="{{ asset('fixifx/images/lg-logo.svg') }}" alt="logo">
        </div>
      </div>
    </div>
  </div>
</section>
<!-- end  -->