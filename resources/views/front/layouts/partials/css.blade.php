@yield('before-css')
<!-- Favicon and apple icon -->
<link rel="icon" type="image/x-icon" href="{{ asset('fixifx/images/favicon.ico') }}">

<!-- Link fonts -->
<link rel="stylesheet" href="{{ asset('fixifx/css/bootstrap.min.css') }}" >
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" >
<link rel="manifest" href="{{ asset('front/img/favicon/site.webmanifest') }}">


<!-- Link Swiper's CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
<link rel="stylesheet" href="{{ asset('fixifx/css/style.css') }}" >
<link rel="stylesheet" href="{{ asset('fixifx/css/responsive.css') }}">
@yield('after-css')