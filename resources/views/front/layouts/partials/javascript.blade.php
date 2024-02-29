@yield('before-javascript')

<script src="{{ asset('fixifx/js/jquery.min.js') }}"></script>

<script src="{{ asset('fixifx/js/bootstrap.bundle.min.js') }}"></script>

<!-- Swiper JS -->



<!-- <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script> -->

<script src="{{ asset('fixifx/js/swiper-bundle.min.js') }}"></script>





<script src="{{ asset('fixifx/js/intlTelInput.js') }}"></script>

<script src="{{ asset('fixifx/js/custom.js') }}"></script>



<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script> -->

<script src="{{ asset('fixifx/js/sweetalert.min.js') }}"></script>



<script src="{{asset('assets/libs/jquery/jquery.validate.min.js')}}"></script>



<script src="{{ asset('fixifx/js/select2.min.js') }}"></script>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.0/js/select2.min.js"></script> -->


<script>
    window.addEventListener('DOMContentLoaded', lazyScripts);

    function lazyScripts() {
      let fontNotoJP = document.createElement('link');
      fontNotoJP.rel = 'stylesheet';
      fontNotoJP.href = "{{ asset('front/fonts/NotoJP.css') }}";
      document.head.appendChild(fontNotoJP);

      (function(window, document) {
        function scrollScript() {
          setInterval(function() {
            /* <a href="https://www.livechat.com/chat-with/14779239/" rel="nofollow">Chat with us</a>, powered by <a href="https://www.livechat.com/?welcome" rel="noopener nofollow" target="_blank">LiveChat</a> */
            window.__lc = window.__lc || {};
            window.__lc.license = 14779239;;
            (function(n, t, c) {
              function i(n) {
                return e._h ? e._h.apply(null, n) : e._q.push(n)
              }
              var e = {
                _q: [],
                _h: null,
                _v: "2.0",
                on: function() {
                  i(["on", c.call(arguments)])
                },
                once: function() {
                  i(["once", c.call(arguments)])
                },
                off: function() {
                  i(["off", c.call(arguments)])
                },
                get: function() {
                  if (!e._h) throw new Error("[LiveChatWidget] You can't use getters before load.");
                  return i(["get", c.call(arguments)])
                },
                call: function() {
                  i(["call", c.call(arguments)])
                },
                init: function() {
                  var n = t.createElement("script");
                  n.async = !0, n.type = "text/javascript", n.src = "https://cdn.livechatinc.com/tracking.js", t.head.appendChild(n)
                }
              };
              !n.__lc.asyncInit && e.init(), n.LiveChatWidget = n.LiveChatWidget || e
            }(window, document, [].slice))
          }, 5000);
        }

        // lazyyLoad
        let lazyLoad = false;

        function onLazyLoad() {
          if (lazyLoad === false) {
            lazyLoad = true;
            window.removeEventListener('scroll', onLazyLoad);
            window.removeEventListener('mousemove', onLazyLoad);
            window.removeEventListener('mousedown', onLazyLoad);
            window.removeEventListener('touchstart', onLazyLoad);
            window.removeEventListener('keydown', onLazyLoad);

            scrollScript();
          }
        }
        window.addEventListener('scroll', onLazyLoad);
        window.addEventListener('mousemove', onLazyLoad);
        window.addEventListener('mousedown', onLazyLoad);
        window.addEventListener('touchstart', onLazyLoad);
        window.addEventListener('keydown', onLazyLoad);
        window.addEventListener('load', function() {
          if (window.pageYOffset) {
            onLazyLoad();
          }
        });
      })(window, document);
    }
  </script>




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

</script>



<script>

  window.addEventListener('load', () => {

    addAriaLabel('ss-btn-facebook', 'Facebook');

    addAriaLabel('ss-btn-twitter', 'Twitter');

    addAriaLabel('ss-btn-linkedin', 'LinkedIn');

    addAriaLabel('ss-btn-whatsapp', 'WhatsApp');

    addAriaLabel('ss-btn-telegram', 'Telegram');

  });



  function addAriaLabel(className, label) {

    let ariaTarget = document.getElementsByClassName(className);

    for (let i = 0, len = ariaTarget.length; i < len; i++) {

      ariaTarget[i].setAttribute('aria-label', label);

    }

  }

</script>

@yield('after-javascript')