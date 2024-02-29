<!DOCTYPE html>

<html lang="{{ config('app.locale') }}" dir="ltr">



@include('front.layouts.head')






<body class="home-page">

  <!-- preloader begin -->

  <div class="in-loader">

    <div></div>

    <div></div>

    <div></div>

  </div>

  <!-- preloader end -->

 {{--  @include('front.layouts.header')--}}

  @include('front.layouts.partials.header') 

  <main>

    @yield('content')



    {{--

        <div class="uk-section newsletter-section">

            <div class="uk-container">

                <div class="sidebar-widget newsletter-widget in-content-10">

                    @include('front.common.news_letter')

                </div>

            </div>

        </div>

        --}}



    @include('front.common.common_section')

  </main>



  {{-- @include('front.layouts.footer') --}}
  @include('front.layouts.partials.footer')

  <!-- Javascript -->



  <script src="{{asset('front/js/jquery-3.4.1.min.js')}}"></script>

  <script src="{{asset('front/js/vendors/uikit.min.js')}}"></script>

  <script src="{{asset('front/js/vendors/indonez.min.js')}}"></script>

  <script src="{{asset('front/js/lottie.min.js')}}"></script>

  {{--<script src="{{asset('front/js/lightweight-charts.standalone.production.js')}}"></script>--}}

  <script src="{{asset('front/js/social-share.js')}}"></script>

  <script src="{{asset('front/js/config-theme.js')}}"></script>

  <script src="{{asset('front/css/owlcarousel/owl.carousel.min.js')}}"></script>

  <script src="{{ asset('front/js/slick.min.js') }}"></script>

  {{--<script src="{{ asset('public/front/js/custom.js') }}"></script>--}}





  <!-- js -->



  <!-- <script src="{{ asset('fixifx/js/jquery.min.js') }}"></script> -->

  <script src="{{ asset('fixifx/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Swiper JS -->

  <!-- <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script> -->
  <script src="{{ asset('fixifx/js/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('fixifx/js/intlTelInput.js') }}"></script>

  <script src="{{ asset('fixifx/js/custom.js') }}"></script>



  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script> -->

  <script src="{{asset('assets/libs/jquery/jquery.validate.min.js')}}"></script>



  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.0/js/select2.min.js"></script> -->



  <!-- end js -->



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



  @if(config('app.locale') == 'ja')

  <script type="application/ld+json">

    {

      "@context": "https://schema.org",

      "@type": "FinancialService",

      "name": "フィクシーFX",

      "alternateName": "FixiFX",

      "url": "https://fixifx.com/ja/home",

      "logo": {

        "@type": "ImageObject",

        "url": "https://fixifx.com/front/img/logo4x.webp",

        "caption": "FixiFX(フィクシー)"

      },

      "image": "https://fixifx.com/front/img/logo4x.webp",

      "address": {

        "@type": "PostalAddress",

        "streetAddress": "Balmoral Development #4, 78 Sanford Drive",

        "addressRegion": "Nassau, New Providence",

        "postalCode": "530-0001",

        "addressCountry": "BS"

      },

      "telephone": "+44 (0) 20 3637 8263",

      "contactPoint": {

        "@type": "ContactPoint",

        "telephone": "+44 (0) 20 3637 8263",

        "email": "info@fixifx.com",

        "contactType": "customer service",

        "areaServed": "GB",

        "availableLanguage": [

          "Japanese",

          "en"

        ]

      },

      "sameAs": "https://twitter.com/FiXi_Japan",

      "hasCredential": [

        "Financial Transactions and Reports Analysis Centre of Canada - Money services business (MSB)",

        "カナダ金融取引報告分析センター マネー・サービス・ビジネス",

        "National Futures Association(NFA) Member",

        "全米先物協会(NFA)会員",

        "Financial Crimes Enforcement Network - Money services business (MSB)",

        "金融犯罪捜査網 マネー･サービス･ビジネス"

      ],

      "duns": [

        "Securities Commission of The Bahamas - Dealer in Securities",

        "バハマ証券委員会 証券ディーラー"

      ]

    }

  </script>

  @endif



  @stack('scripts')

</body>



</html>