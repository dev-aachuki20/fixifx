jQuery(".search-icon").click(function($) {
  jQuery(this).toggleClass("open-search-menu");
  jQuery(".search-form").slideToggle();

});


$(".search-icon").on("click", function (params) {
  $("body").toggleClass("search_open");
});

$(document).on('click', '.navbar-nav .dropdown', function(){
  $(this).addClass('active').siblings().removeClass('active')
})



function onChangeCallback(ctr){
  console.log("The country was changed: " + ctr);
  //$("#selectionSpan").text(ctr);
}

$(document).ready(function () {
  // $(".niceCountryInputSelector").each(function(i,e){
  //     new NiceCountryInput(e).init();
  // });

  $("#phone").intlTelInput({
    initialCountry: "in",
    separateDialCode: true,
  });
  $("#phone2").intlTelInput({
    initialCountry: "in",
    separateDialCode: true,
  });

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
    autoplay: {
        delay: 0,
        disableOnInteraction: false,
        pauseOnMouseEnter:false,
        reverseDirection:false,
    },
    slidesPerView:'auto',
    
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

var swiper = new Swiper('.traders_slides', {
  slidesPerView: 2,
  spaceBetween: 24,
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
      480: {
          slidesPerView: 1
      },
      640: {
          slidesPerView: 2
      }
  }
  });

  // dataTable 

  let table = new DataTable('#spreadTable');

  // dropdown-menu 

//   $(".nav-item .dropdown").hover(function () {
//     $('body').toggleClass("result_hover");
//  });

//  $(".dropdown").hover(function (params) {
//   $("body").toggleClass("result_hover");
// });

});

  // dropdown-menu 

 $(".nav-item.dropdown").hover(function (params) {
  $("body").toggleClass("header_hover");
});


function myFunction(x) {
  x.classList.toggle("change");
}

$(".navbar-toggler").on("click", function (params) {
  $("body").toggleClass("openSidebar");
});

// $(".close_btn").on("click", function (params) {
//   $("body").removeClass("openSidebar");
// });

$("body").on("click", '.back_btn', function (params) {
  $("body").find('.mega-menu').removeClass('show');
});

$(window).scroll(function() {    
  var scroll = $(window).scrollTop();

   //>=, not <=
  if (scroll >= 100) {
      //clearHeader, not clearheader - caps H
      $("body").addClass("darkHeader");
  }else {
    $("body").removeClass("darkHeader");
}
});


// footer-nav
$(".footer-heading").on("click", function () {
  // console.log($(this).parent().index());
  // $(".footer-links").each(function() {
  //     $(this).removeClass("hide-footerlist");
  // });
  
  $(this).parent().toggleClass('hide-footerlist');   
  // $(this).parent().addClass('hide-footerlist');   

  // if($(this).parent().hasClass('hide-footerlist')){
  //     $(this).parent().removeClass('hide-footerlist');   
  // }else{
  //     $(this).parent().addClass('hide-footerlist');  
  // }

});

$(".showDetails-more").click(function () {
  var $wrapper =$('.showMore-wrapper');
  if($wrapper.hasClass("showDetails-height")) {
    $(".showDetails-more").text("Show less");
  } else {
    $(".showDetails-more").text("Show more");
  }
  $wrapper.toggleClass("showDetails-height");
});

$(document).ready(function() {
  'use strict';
  var c, currentScrollTop = 0,
    navbar = $('.header-main');
  $(window).scroll(function() {
    var a = $(window).scrollTop();
    var b = navbar.height();
    currentScrollTop = a;
    if (c < currentScrollTop && a > b + b) {
      navbar.addClass("scrollUp");
    } else if (c > currentScrollTop && !(a <= b)) {
      navbar.removeClass("scrollUp");
    }
    c = currentScrollTop;
    //console.log(a);
  });

});

function scrolltoId(){
var access = document.getElementById("ques_202");
access.scrollIntoView({behavior: 'smooth'}, true);
}
