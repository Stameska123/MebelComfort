jQuery(function($){
  "use strict";

    jQuery('.search-box button').click(function(){
    jQuery(".search_outer").toggle();
  });

  jQuery('.search_inner input.search-field').on('keydown', function (e) {
    if (jQuery("this:focus") && (e.which === 9)) {
      e.preventDefault();
      jQuery(this).blur();
      jQuery('.search_inner button.search-submit').focus();
    }
  });

  jQuery('.search_inner .search-submit').on('keydown', function (e) {
    if (jQuery("this:focus") && (e.which === 9)) {
      e.preventDefault();
      jQuery(this).blur();
      jQuery('button.search_btn').focus();
    }
  });
});

function modern_furniture_store_menu_open() {
  jQuery(".sidenav").addClass('open');
}
function modern_furniture_store_menu_close() {
  jQuery(".sidenav").removeClass('open');
}

jQuery(function($){
  $(window).scroll(function() {
    if ($(this).scrollTop() >= 50) {
      $('#return-to-top').fadeIn(200);
    } else {
      $('#return-to-top').fadeOut(200);
    }
  });
  $('#return-to-top').click(function() {
    $('body,html').animate({
      scrollTop : 0
    }, 500);
  });
});

jQuery(function($){
  $(window).load(function() {
    $(".loader").delay(2000).fadeOut("slow");
  })
});

jQuery(window).scroll(function() {
  var data_sticky = jQuery('.menubar').attr('data-sticky');

  if (data_sticky == "true") {
    if (jQuery(this).scrollTop() > 1){
      jQuery('.menubar').addClass("stick_head");
    } else {
      jQuery('.menubar').removeClass("stick_head");
    }
  }
});

jQuery('document').ready(function(){
  var owl = jQuery('#slider .owl-carousel');
    owl.owlCarousel({
    stagePadding: 200,
    loop:true,
    margin:20,
    autoplay : true,
    lazyLoad: true,
    autoplayTimeout: 5000,
    dots:false,
    navText : ['<i class="fas fa-arrow-left"></i>','<i class="fas fa-arrow-right"></i>'],
    nav:true,
    items:1,
  	responsive:{
        0:{
            items:1,
            stagePadding: 0
        },
        600:{
            items:1,
            stagePadding: 100
        },
        1000:{
            items:1,
            stagePadding: 200
        },
        1200:{
            items:1,
            stagePadding: 200
        },
        1400:{
            items:1,
            stagePadding: 300
        },
        1600:{
            items:1,
            stagePadding: 350
        },
        1800:{
            items:1,
            stagePadding: 400
        }
    }
  });
});
