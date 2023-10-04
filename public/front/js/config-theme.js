'use strict';
// $(document).ready(function () {
//   if($(window).width() < 960){
//       $(".sidebar-toggle").click(function (e) {
//         $('.sidebar_wrapper').addClass("is_sidebar_open");
//         $('.menu-overlay').addClass("show");
//         $('html').addClass("uk-overflow-hidden");
//     });
//     $(".menu-overlay, .sidebar-close-toggle").click(function (e) { 
//         $('.sidebar_wrapper').removeClass("is_sidebar_open");
//         $('.menu-overlay').removeClass("show");
//         $('html').removeClass("uk-overflow-hidden");
//     });
//   }
// });
$(document).ready(function () {
  $("#menu-toggle").click(function (e) { 
      $('.custom-navbar').addClass("sidemenu-open");
      $('.menu-overlay').addClass("show");
      $('html').addClass("uk-overflow-hidden");
  });
  $(".menu-overlay, .close-menu").click(function (e) { 
      $('.custom-navbar').removeClass("sidemenu-open");
      $('.menu-overlay').removeClass("show");
      $('html').removeClass("uk-overflow-hidden");
  });
});
const HomepageApp = {
    //----------- 1. uikit slideshow -----------
    // theme_slideshow: function() {
    //     UIkit.slideshow('.in-slideshow', {
    //         autoplay: false,
    //         autoplayInterval: 7000,
    //         pauseOnHover: false,
    //         animation: 'slide',
    //         // minHeight: 342,
    //         maxHeight: 660
    //     });
    // },
    //---------- 2. Counter config -----------
    theme_counter: function() {
        const counter = new counterUp({
            selector: '.count',
            start: 0,
            duration: 3200,
            intvalues: true,
            interval: 50
        });
        counter.start();
    },
    theme_init: function() {
        //HomepageApp.theme_slideshow();
        HomepageApp.theme_counter();
    }
}

document.addEventListener('DOMContentLoaded', function() {
    HomepageApp.theme_init();
});

$(document).ready(function(){
    $('.svgAnimation').find('.svgloader').each(function (index, ele) {
        var datapath = $(ele).data('path');
        bodymovin.loadAnimation({
            container: ele,
            renderer: 'svg',
            loop: true,
            path: datapath
        });
    });

    // $("#menu-toggle").click(function (e) { 
    //     e.preventDefault();
    //     $('.custom-navbar').addclass("sidemenu-open")
    //     $('.menu-overlay').addclass("show")
    // });

    setTimeout(function() {
      $('.tickerwidget-slider').slick({
        slidesToShow: 7.5,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 0,
        speed: 8000,
        pauseOnHover: false,
        cssEase: 'linear',
        responsive: [
          {
            breakpoint: 1800,
            settings: {
              slidesToShow: 6.7,
            },
          },
          {
            breakpoint: 1700,
            settings: {
              slidesToShow: 5.8,
            },
          },
          {
            breakpoint: 1399,
            settings: {
              slidesToShow: 4.8,
            },
          },
          {
            breakpoint: 1200,
            settings: {
              slidesToShow: 4,
            },
          },
          {
            breakpoint: 1025,
            settings: {
              slidesToShow: 3,
            },
          },
          {
            breakpoint: 770,
            settings: {
              slidesToShow: 2,
            },
          },
          {
            breakpoint: 580,
            settings: {
              slidesToShow: 2,
            },
          },
          {
            breakpoint: 479,
            settings: {
              slidesToShow: 1.5,
            },
          },
          {
            breakpoint: 381,
            settings: {
              slidesToShow: 1,
            },
          },
        ],
      });
    }, 1100);

    $('.home_banner_slider').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      dots: true,
      // autoplay: true,
      autoplay: true,
      autoplaySpeed: 3000,
      speed: 500,
      pauseOnHover: false,
      cssEase: 'linear',
    });
})



// clock 

$(document).ready(function() {
    clockUpdate();
    setInterval(clockUpdate, 1000);
  })
  
  function clockUpdate() {
    var date = new Date();
    function addZero(x) {
      if (x < 10) {
        return x = '0' + x;
      } else {
        return x;
      }
    }
  
    function twelveHour(x) {
      if (x > 12) {
        return x = x - 12;
      } else if (x == 0) {
        return x = 12;
      } else {
        return x;
      }
    }
  
    var h = addZero(twelveHour(date.getHours()));
    var m = addZero(date.getMinutes());
    var s = addZero(date.getSeconds());
  
    $('.digital-clock').text(h + ':' + m + ':' + s)
  }

  