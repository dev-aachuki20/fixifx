@yield('before-javascript')
<script src="{{ asset('fixifx/js/jquery.min.js') }}"></script>
<script src="{{ asset('fixifx/js/bootstrap.bundle.min.js') }}"></script>
<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script src="{{ asset('fixifx/js/intlTelInput.js') }}"></script>
<script src="{{ asset('fixifx/js/custom.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="{{asset('assets/libs/jquery/jquery.validate.min.js')}}"></script>



<script>

$(document).ready(function () {
  let SwiperTop = new Swiper('.marketData-slide', {
    direction: 'horizontal',
    freeMode: true,
    spaceBetween: 0,
    centeredSlides: false,
    speed: 5000,
    touchDrag: false,
    mouseDrag: false,
    clickable: false,
    allowTouchMove: false,
    preventClicksPropagation: false,
    preventClicks: false,
    shortSwipes: false,
    shortClick: false,
    simulateTouch:false,
    loop:true,
    slidesToShow: 7.5,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 0,
    speed: 8000,
    pauseOnHover: false,
    cssEase: 'linear',
    autoplay: {
        delay: 0,
        disableOnInteraction: false,
        pauseOnMouseEnter:false,
        reverseDirection:false,
    },
    slidesPerView:'auto',
    breakpoints: {
      320: {
        direction: 'horizontal',
        freeMode: true,
        spaceBetween: 0,
        centeredSlides: false,
        speed: 5000,
        touchDrag: false,
        mouseDrag: false,
        clickable: false,
        allowTouchMove: false,
        preventClicksPropagation: false,
        preventClicks: false,
        shortSwipes: false,
        shortClick: false,
        simulateTouch:false,
        loop:true,
      }
  }
    
});

});


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
    loop: false,
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
    autoslide: true,
    thumbs: {
      swiper: swiperTabsNav,
    },
  });

  $(window).ready(function() {
    $('#staticBackdrop').modal('show');
  });
</script>

<script>
    $('#news_form').validate({
        errorClass: 'invalid-feedback animated fadeInDown error',
        errorElement: 'div',
        rules: {
            email: {
                required: true,
                email: true,
            }
        },
        highlight: function(element, errorClass, validClass) {
            console.log(element);
            $(element).addClass('is-invalid');
            $(element).parents("div.form-control").addClass(errorClass).removeClass(validClass);
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
            $(element).parents(".error").removeClass(errorClass).addClass(validClass);
        },
        submitHandler: function(form) {
            $('.error').html("");
            $.ajax({
                type: 'POST',
                url: "{{ route('newsletter') }}",
                data: new FormData(form),
                processData: false,
                contentType: false,
                success: function(data) {

                    if (data) {
                        success = msg = "";
                        if ('{{config("app.locale")}}' == 'en') {
                            msg = 'You have successfully subscribed to our newsletter.';
                            success = 'Success';
                        } else {
                            msg = 'ニュースレターの購読に成功しました。';
                            success = '成功';
                        }
                        swal(
                            success,
                            msg,
                            'success'
                        );
                        $('#news_form').trigger("reset");

                    }
                },
                error: function(data) {
                    var errors = $.parseJSON(data.responseText);
                    $.each(errors.errors, function(key, value) {
                        $('#news_form').find('input[name=' + key + ']').after('<span class="error" style="color: red;">' + value + '</span>');
                    });

                }
            });
        },
    });


    // SOCIAL SHARE
    $(document).on('click', '.ss-btn-share', function(e) {
        e.preventDefault();
        if (navigator.share) {
            navigator.share({
                    url: this.getAttribute("data-ss-link")
                }).then(() => {
                    console.log('Thanks for sharing!');
                })
                .catch(console.error);
        } else {
            console.log('This brownser dont support native web share!');
        }
    });
</script>
@yield('after-javascript')