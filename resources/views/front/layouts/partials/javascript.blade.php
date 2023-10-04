@yield('before-javascript')
<script src="{{ asset('fixifx/js/jquery.min.js') }}"></script>
<script src="{{ asset('fixifx/js/bootstrap.bundle.min.js') }}"></script>
<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script src="{{ asset('fixifx/js/intlTelInput.js') }}"></script>
<script src="{{ asset('fixifx/js/custom.js') }}"></script>

<script>

        swiperTabsNav = new Swiper('.tabs-buttons', {
          spaceBetween: 0,
          slidesPerView: 5,
          loop: false,
          loopedSlides: 5,
          autoHeight: false,
          resistanceRatio: 0,
          watchOverflow: true,
          watchSlidesVisibility: true,
          watchSlidesProgress: true,
          parallax: true,
          autoplay: {
            delay: 3000,
            autoplayDisableOnInteraction: true,
            disableOnInteraction: false,
          },
            breakpoints: {
              320: {
                    slidesPerView: 1,
                    spaceBetweenSlides: 50
                },
                370: {
                    slidesPerView: 1,
                    spaceBetweenSlides: 50
                },
                // when window width is <= 499px
                575: {
                    slidesPerView: 4,
                    spaceBetweenSlides: 50
                },
                // when window width is <= 999px
                999: {
                    slidesPerView: 5,
                    spaceBetweenSlides: 50
                }
            }
        });

        // Swiper Content
        swiperTabsContent = new Swiper('.mySwiper', {
			spaceBetween: 0,
			loop:false,
			autoHeight: true,
			longSwipes: true,
			resistanceRatio: 0, // Disable First and Last Swiper
			watchOverflow: true,
			loopedSlides: 5,
			parallax: true,
			autoplay: {
            delay: 3000,
            autoplayDisableOnInteraction: true,
            disableOnInteraction: false,
          },
      autoslide:true,
			thumbs: {
				swiper: swiperTabsNav,
			},
		});

    $(window).ready(function(){
      $('#staticBackdrop').modal('show');
    });

    </script>
@yield('after-javascript')