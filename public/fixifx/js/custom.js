jQuery(".search-icon").click(function ($) {

    jQuery(this).toggleClass("open-search-menu");
  
    jQuery(".search-form").slideToggle();
  
  });
  
  
  
  $(".search-icon").on("click", function (params) {
  
    $("body").toggleClass("search_open");
  
  });
  
  
  
  function onChangeCallback(ctr) {
  
    console.log("The country was changed: " + ctr);
  
  }
  
  
  
  $(document).ready(function () {
  
    $("#phone").intlTelInput({
  
      initialCountry: "in",
  
      separateDialCode: true,
  
    });
  
    $("#phone2").intlTelInput({
  
      initialCountry: "in",
  
      separateDialCode: true,
  
    });
  
  
  
    var swiper = new Swiper('.bloggird_slides', {
  
      slidesPerView: 2,
  
      spaceBetween: 10,
  
      navigation: {
  
        nextEl: ".swiper-button-next",
  
        prevEl: ".swiper-button-prev",
  
      },
  
      breakpoints: {
  
        320: {
  
          slidesPerView: 1,
  
          spaceBetween: 20
  
        },
  
        480: {
  
          slidesPerView: 1,
  
          spaceBetween: 30
  
        },
  
        640: {
  
          slidesPerView: 2,
  
          spaceBetween: 40
  
        }
  
      }
  
    });
  
  
  
  
  
  
  
    if ($(window).width() < 992) {
  
      var swiper = new Swiper('.new-trade-acc-area', {
  
        slidesPerView: 2,
  
        spaceBetween: 24,
  
        loop: true,
  
        speed: 500,
  
        //   autoplay: {
  
        //     delay: 2500,
  
        //   },
  
        navigation: {
  
          nextEl: ".swiper-button-next",
  
          prevEl: ".swiper-button-prev",
  
        },
  
        pagination: {
  
          el: '.swiper-pagination',
  
          clickable: true,
  
        },
  
        breakpoints: {
  
          320: {
  
            slidesPerView: 1
  
          },
  
          575: {
  
            slidesPerView: 2,
  
            spaceBetween: 24,
  
          },
  
          992: {
  
            slidesPerView: 2,
  
            spaceBetween: 24,
  
          }
  
        }
  
      });
  
    }
  
  });
  
  
  
  $(document).ready(function () {
  
  
  
    $('.language-box').on('click', function (event) {
  
      event.stopPropagation();
  
    });
  
  
  
    if ($(window).width() < 1200) {
  
      $('.dropdown-menu .container').on('click', function (event) {
  
        event.stopPropagation();
  
      });
  
    }
  
  
  
    if ($(window).width() > 1199) {
  
      $('.dropdown-menu').on('click', function (event) {
  
        event.stopPropagation();
  
      });
  
  
  
  
  
      $(".nav-item.dropdown .dropdown-toggle").click(function () {
  
        if ($(".nav-item.dropdown .dropdown-toggle").hasClass("show")) {
  
          $("body").addClass("header_hover");
  
        } else {
  
          $("body").removeClass("header_hover");
  
        }
  
      });
  
  
  
      $(document).on("click", function (event) {
  
        if ($(".nav-item.dropdown .dropdown-toggle").hasClass("show")) {
  
          $("body").addClass("header_hover");
  
        } else {
  
          $("body").removeClass("header_hover");
  
        }
  
      });
  
  
  
    }
  
  });
  
  
  
  
  
//   var swiper = new Swiper('.traders_slides', {
  
//       slidesPerView: 2,
  
//       spaceBetween: 24,
  
//       //centeredSlides: true,
  
//       //paginationClickable: true,
  
//       loop: true,
  
//       speed: 500,
  
//       autoplay: {
  
//           delay: 2500,
  
//           //reverseDirection: false,
  
//           //disableOnInteraction: false,
  
//       },
  
//       navigation: {
  
//           nextEl: ".swiper-button-next",
  
//           prevEl: ".swiper-button-prev",
  
//       },
  
//       pagination: {
  
//           el: '.swiper-pagination',
  
//           clickable: true,
  
//       },
  
//       breakpoints: {
  
//           320: {
  
//               slidesPerView: 1
  
//           },
  
//           480: {
  
//               slidesPerView: 1
  
//           },
//           640: {
//               slidesPerView: 2
//           }
  
//       }
  
//   });
  
  
  
  
  function myFunction(x) {
  
    x.classList.toggle("change");
  
  }
  
  
  
  $(".navbar-toggler").on("click", function (params) {
  
    $("body").toggleClass("openSidebar");
  
  });
  
  
  
  $("body").on("click", '.back_btn', function (event) {
  
    $("body").find('.mega-menu').removeClass('show');
  
  });
  
  
  
  $(window).scroll(function () {
  
    var scroll = $(window).scrollTop();
  
    if (scroll >= 100) {
  
      //clearHeader, not clearheader - caps H
  
      $("body").addClass("darkHeader");
  
    } else {
  
      $("body").removeClass("darkHeader");
  
    }
  
  });
  
  
  
  
  
  // footer-nav
  
  $(".footer-heading").on("click", function () {
  
    $(this).parent().toggleClass('hide-footerlist');
  
  });
  
  
  
  $(".showDetails-more").click(function () {
  
    var $wrapper = $('.showMore-wrapper');
  
    if ($wrapper.hasClass("showDetails-height")) {
  
      $(".showDetails-more").text("Show less");
  
    } else {
  
      $(".showDetails-more").text("Show more");
  
    }
  
    $wrapper.toggleClass("showDetails-height");
  
  });
  
  
  
  $(document).ready(function () {
  
    'use strict';
  
    var c, currentScrollTop = 0,
  
      navbar = $('.header-main');
  
    $(window).scroll(function () {
  
      var a = $(window).scrollTop();
  
      var b = navbar.height();
  
      currentScrollTop = a;
  
      if (c < currentScrollTop && a > b + b) {
  
        navbar.addClass("scrollUp");
  
      } else if (c > currentScrollTop && !(a <= b)) {
  
        navbar.removeClass("scrollUp");
  
      }
  
      c = currentScrollTop;
  
    });
  
  
  
  });
  
  
  
  function scrolltoId() {
  
    var access = document.getElementById("ques_202");
  
    access.scrollIntoView({ behavior: 'smooth' }, true);
  
  }
  
  
  
  // blog select
  
  
  
  $(document).on('focus', '.select2-selection.select2-selection--single', function (e) {
  
    $(this).closest(".select2-container").siblings('select:enabled').select2('open');
  
  });
  
  
  
  $(document).ready(function () {
  
    $(".showDetails-more").click(function () {
  
      var $wrapper = $('.showMore-wrapper');
  
      if ($wrapper.hasClass("showDetails-height")) {
  
        $(".showDetails-more").text("{{__('message.show_less')}}");
  
      } else {
  
        $(".showDetails-more").text("{{__('message.show_more')}}");
  
      }
  
      $wrapper.toggleClass("showDetails-height");
  
    });
  
  });
  
  
  
  $(document).ready(function () {
  
    $(".showDetails-more").click(function () {
  
      var $wrapper = $('.commentBox-inner');
  
      if ($wrapper.hasClass("showDetails-height")) {
  
        $(".showDetails-more").text("Show less");
  
      } else {
  
        $(".showDetails-more").text("Show more");
  
      }
  
      $wrapper.toggleClass("showDetails-height");
  
    });
  
  });
  
// Google Analytics
var imported = document.createElement('script');
imported.src = 'https://www.googletagmanager.com/gtag/js?id=G-0W8CKDZMC1';
document.head.appendChild(imported);


window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());

gtag('config', 'G-0W8CKDZMC1');
  
  
  
  