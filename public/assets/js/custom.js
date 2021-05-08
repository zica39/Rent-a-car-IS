// ==================================================
// Project Name  :  Rotors – Car Rental HTML5 Template
// File          :  JS Base
// Version       :  1.0.0
// Last change   :  17 November 2020
// Author        :  Merkulove (https://themeforest.net/user/merkulove)
// Developer:    :  Rakibul Islam Dewan
// ==================================================


(function($) {
  "use strict";


  // back to top - start
  // --------------------------------------------------
  $(window).scroll(function() {
    if ($(this).scrollTop() > 200) {
      $('.backtotop:hidden').stop(true, true).fadeIn();
    } else {
      $('.backtotop').stop(true, true).fadeOut();
    }
  });
  $(function() {
    $(".scroll").on('click', function() {
      $("html,body").animate({
        scrollTop: $("#thetop").offset().top
      }, "slow");
      return false
    })
  });
  // back to top - end
  // --------------------------------------------------


  // preloader - start
  // --------------------------------------------------
  $(window).on('load', function() {
    $('.preloader').addClass('loaded');
    if ($('.preloader').hasClass('loaded')) {
      $('.spinner').delay(1000).queue(function () {
        $(this).remove();
      });
    }
  });
  // preloader - end
  // --------------------------------------------------


  // search box - start
  // --------------------------------------------------
  $('.search_btn').on('click', function() {
    $('.search_btn > .fa-search').toggleClass('fa-times');
  });
  // search box - end
  // --------------------------------------------------


  // background - start
  // --------------------------------------------------
  $("[data-bg-color]").each(function () {
    $(this).css("background-color", $(this).attr("data-bg-color"))
  });

  $("[data-bg-gradient]").each(function () {
    $(this).css("background-image", $(this).attr("data-bg-gradient"))
  });

  $('[data-bg-image]').each(function() {
    $(this).css('background-image', 'url('+ $(this).attr('data-bg-image') + ')');
  });
  // background - end
  // --------------------------------------------------


  // background parallax - start
  // --------------------------------------------------
  $(".parallaxie").parallaxie({
    offset: 0,
    speed: 0.3,
  });
  // background parallax - end
  // --------------------------------------------------


  // select options - start
  // --------------------------------------------------
  $('select').niceSelect();
  // select options - end
  // --------------------------------------------------


  // menu button - start
  // --------------------------------------------------
  $(document).ready(function () {
    $('.close_btn, .overlay').on('click', function () {
      $('.mobile_sidebar_menu').removeClass('active');
      $('.overlay').removeClass('active');
    });

    $('.mobile_sidebar_btn').on('click', function () {
      $('.mobile_sidebar_menu').addClass('active');
      $('.overlay').addClass('active');
    });
  });

  // 3rd level dropdown menu
  $('.mobile_sidebar_menu .dropdown > a').addClass('dropdown-toggle');
  $('.mobile_sidebar_menu .dropdown-menu .dropdown > a').on('click', function(e) {
    if (!$(this).next().hasClass('show')) {
      $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
    }
    var $subMenu = $(this).next(".dropdown-menu");
    $subMenu.toggleClass('show');
    $(this).parents('li.dropdown.show').on('.dropdown', function(e) {
      $('.dropdown-menu > .dropdown .show').removeClass("show");
    });
    $('.dropdown-menu li a.dropdown-toggle').removeClass("show_dropdown");
    if ($(this).next().hasClass('show')) {
      $(this).addClass("show_dropdown");
    }
    return false;
  });
  // menu button - end
  // --------------------------------------------------


  // counter - start
  // --------------------------------------------------
  $('.counter').counterUp({
    delay: 10,
    time: 1000
  });
  // counter - end
  // --------------------------------------------------


  // contact form - start
  // --------------------------------------------------
  if($('#contact_form').length){
    $('#contact_form').validate({
      rules: {
        firstname: {
          required: true
        },
        lastname: {
          required: true
        },
        email: {
          required: true
        },
        phone: {
          required: true
        },
        message: {
          required: true
        }
      }
    });
  }
  // contact form - end
  // --------------------------------------------------


  // scroll animation - start
  // --------------------------------------------------
  AOS.init({
    // disable: function() {
    //   var maxWidth = 769;
    //   return window.innerWidth < maxWidth;
    // }
    once: true,
    duration: 800,
  });
  // scroll animation - end
  // --------------------------------------------------


  // sticky header - start
  // --------------------------------------------------
  $(window).on('scroll', function () {
    if ($(this).scrollTop() > 200) {
      $('.sticky').addClass("stuck")
    } else {
      $('.sticky').removeClass("stuck")
    }
  });
  // sticky header - end
  // --------------------------------------------------


  // isotope filtering & masonry - start
  // --------------------------------------------------
  var portfolio = $(".element-grid");
  if (portfolio.length) {
    portfolio.imagesLoaded(function () {
      portfolio.isotope({
        itemSelector: ".element-item",
        layoutMode: 'masonry',
        filter: "*",
        animationOptions: {
          duration: 1000
        },
        transitionDuration: '0.5s',
        masonry: {

        }
      });

      $(".filters-button-group > li > button").on('click', function () {
        $(".filters-button-group > li > button").removeClass("active");
        $(this).addClass("active");

        var selector = $(this).attr("data-filter");
        portfolio.isotope({
          filter: selector,
          animationOptions: {
            animationDuration: 750,
            easing: 'linear',
            queue: false
          }
        })
        return false;
      })
    });
  }
  // isotope filtering & masonry - end
  // --------------------------------------------------


  // popup images & videos - start
  // --------------------------------------------------
  $('.zoom-gallery_view.blade.php').magnificPopup({
    delegate: '.popup_image',
    type: 'image',
    closeOnContentClick: false,
    closeBtnInside: false,
    mainClass: 'mfp-with-zoom mfp-img-mobile',
    image: {
      verticalFit: true,
      titleSrc: function(item) {
        return item.el.attr('title') + ' &middot; <a class="image-source-link" href="'+item.el.attr('data-source')+'" target="_blank">image source</a>';
      }
    },
    gallery: {
      enabled: true
    },
    zoom: {
      enabled: true,
      duration: 300,
      opener: function(element) {
        return element.find('img');
      }
    }
  });

  $('.play_btn').magnificPopup({
    disableOn: 700,
    type: 'iframe',
    preloader: false,
    removalDelay: 160,
    mainClass: 'mfp-fade',
    fixedContentPos: false
  });
  // popup images & videos - end
  // --------------------------------------------------


  // price range - start
  // --------------------------------------------------
    let m = 30.00;
    let n = 429.00;
    if(typeof min != 'undefined') m = min;
    if(typeof max !='undefined')  n = max;

  if($("#slider-range").length){
    $( "#slider-range" ).slider({
      range: true,
      min: 5,
      max: 1000,
      values: [m,n],
      slide: function( event, ui ) {
        $( "#amount" ).val( "€" + ui.values[ 0 ] + " - €" + ui.values[ 1 ] );
      }
    });
    $( "#amount" ).val( "€" + $( "#slider-range" ).slider( "values", 0 ) + " - €" + $( "#slider-range" ).slider( "values", 1 ) );
  }

  $('.ar_top').on('click', function () {
    var getID = $(this).next().attr('id');
    var result = document.getElementById(getID);
    var qty = result.value;
    $('.proceed_to_checkout .update-cart').removeAttr('disabled');
    if( !isNaN( qty ) ) {
      result.value++;
    }else{
      return false;
    }
  });
  // price range - end
  // --------------------------------------------------


  // main slider - start
  // --------------------------------------------------
  $('.main_slider').slick({
    dots: true,
    fade: true,
    arrows: true,
    // speed: 1000,
    infinite: true,
    autoplay: true,
    slidesToShow: 1,
    // pauseOnHover: true,
    autoplaySpeed: 6000,
    prevArrow: ".main_left_arrow",
    nextArrow: ".main_right_arrow",
    customPaging: function (slider, i) {
      console.log(slider);
      var slideNumber   = (i + 1),
      totalSlides = slider.slideCount;
      return '<a class="custom-dot" role="button" title="' + slideNumber + ' of ' + totalSlides + '"><span class="string">' + slideNumber + '</span></a>';
    }
  });

  $('.main_slider').on('init', function (e, slick) {
    var $firstAnimatingElements = $('div.item:first-child').find('[data-animation]');
    doAnimations($firstAnimatingElements);
  });
  $('.main_slider').on('beforeChange', function (e, slick, currentSlide, nextSlide) {
    var $animatingElements = $('div.item[data-slick-index="' + nextSlide + '"]').find('[data-animation]');
    doAnimations($animatingElements);
  });
  var slideCount = null;

  $('.main_slider').on('init', function (event, slick) {
    slideCount = slick.slideCount;
    setSlideCount();
    setCurrentSlideNumber(slick.currentSlide);
  });
  $('.main_slider').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
    setCurrentSlideNumber(nextSlide);
  });

  function setSlideCount() {
    var $el = $('.slide-count-wrap').find('.total');
    if (slideCount < 10) {
      $el.text('0' + slideCount);
    } else {
      $el.text(slideCount);
    }
  }

  function setCurrentSlideNumber(currentSlide) {
    var $el = $('.slide-count-wrap').find('.current');
    $el.text(currentSlide + 1);
  }

  function doAnimations(elements) {
    var animationEndEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
    elements.each(function () {
      var $this = $(this);
      var $animationDelay = $this.data('delay');
      var $animationType = 'animated ' + $this.data('animation');
      $this.css({
        'animation-delay': $animationDelay,
        '-webkit-animation-delay': $animationDelay
      });
      $this.addClass($animationType).one(animationEndEvents, function () {
        $this.removeClass($animationType);
      });
    });
  }

  var $timer = 6000;
  function progressBar() {
    $(".slick-progress").find("span").removeAttr("style");
    $(".slick-progress").find("span").removeClass("active");
    setTimeout(function () {
      $(".slick-progress").find("span").css("transition-duration", $timer / 1000 + "s").addClass("active");
    }, 100);
  }

  progressBar();
  $('.main_slider').on("beforeChange", function (e, slick) {
    progressBar();
  });
  // main slider - end
  // --------------------------------------------------


  // common slider - end
  // --------------------------------------------------
  $('.slideshow1_slider').slick({
    dots: true,
    speed: 1000,
    arrows: true,
    infinite: true,
    autoplay: true,
    slidesToShow: 1,
    pauseOnHover: true,
    autoplaySpeed: 4000,
    prevArrow: ".s1_left_arrow",
    nextArrow: ".s1_right_arrow",
  });

  $('.slideshow2_slider').slick({
    dots: true,
    speed: 1000,
    arrows: true,
    infinite: true,
    autoplay: true,
    slidesToShow: 2,
    pauseOnHover: true,
    autoplaySpeed: 4000,
    prevArrow: ".s2_left_arrow",
    nextArrow: ".s2_right_arrow",
    responsive: [
    {
      breakpoint: 0,
      settings: {
        slidesToShow: 1
      }
    },
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 1
      }
    },
    {
      breakpoint: 1920,
      settings: {
        slidesToShow: 2
      }
    }
    ]
  });

  $('.slideshow4_slider').slick({
    dots: true,
    speed: 1000,
    arrows: true,
    infinite: true,
    autoplay: true,
    slidesToShow: 4,
    pauseOnHover: true,
    autoplaySpeed: 4000,
    prevArrow: ".s4_left_arrow",
    nextArrow: ".s4_right_arrow",
    responsive: [
    {
      breakpoint: 0,
      settings: {
        slidesToShow: 1
      }
    },
    {
      breakpoint: 576,
      settings: {
        slidesToShow: 1
      }
    },
    {
      breakpoint: 881,
      settings: {
        slidesToShow: 2
      }
    },
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 3
      }
    },
    {
      breakpoint: 1920,
      settings: {
        slidesToShow: 4
      }
    }
    ]
  });
  // common slider - end
  // --------------------------------------------------


  // thumbnail slider - start
  // --------------------------------------------------
  $('.thumbnail_carousel').slick({
    dots: false,
    speed: 1000,
    arrows: false,
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    asNavFor: '.thumbnail_carousel_nav'
  });
  $('.thumbnail_carousel_nav').slick({
    speed: 1000,
    dots: false,
    arrows: true,
    infinite: true,
    slidesToShow: 4,
    centerMode: true,
    slidesToScroll: 1,
    focusOnSelect: true,
    asNavFor: '.thumbnail_carousel',
    responsive: [
    {
      breakpoint: 0,
      settings: {
        slidesToShow: 1
      }
    },
    {
      breakpoint: 415,
      settings: {
        slidesToShow: 1
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 2
      }
    },
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 3
      }
    },
    {
      breakpoint: 1920,
      settings: {
        slidesToShow: 4
      }
    }
    ]
  });
  // thumbnail slider - end
  // --------------------------------------------------


  // testimonial carousel - start
  // --------------------------------------------------
  $('.testimonial_carousel').slick({
    dots: true,
    speed: 1000,
    arrows: true,
    infinite: true,
    autoplay: true,
    slidesToShow: 1,
    pauseOnHover: true,
    autoplaySpeed: 4000,
    prevArrow: ".ts_left_arrow",
    nextArrow: ".ts_right_arrow",
  });
  // testimonial carousel - end
  // --------------------------------------------------


  // google map - start
  // --------------------------------------------------
  if ( $('#mapBox').length ){
    var $lat = $('#mapBox').data('lat');
    var $lon = $('#mapBox').data('lon');
    var $zoom = $('#mapBox').data('zoom');
    var $marker = $('#mapBox').data('marker');
    var $info = $('#mapBox').data('info');
    var $markerLat = $('#mapBox').data('mlat');
    var $markerLon = $('#mapBox').data('mlon');
    var map = new GMaps({
      el: '#mapBox',
      lat: $lat,
      lng: $lon,
      scrollwheel: false,
      scaleControl: true,
      streetViewControl: false,
      panControl: true,
      disableDoubleClickZoom: true,
      mapTypeControl: false,
      zoom: $zoom,
    });
    map.addMarker({
      lat: $markerLat,
      lng: $markerLon,
      icon: $marker,
      infoWindow: {
        content: $info
      }
    })
  }
  // google map - end
  // --------------------------------------------------


})(jQuery);

function update_price(e) {

    if(e.target.getAttribute('name') == 'pickup_date'){
        $('input[name=return_date]').attr('min', formatDate(new Date(new Date(e.target.value).getTime() + (24 * 60 * 60 * 1000))));
        $('input[name=return_date]').removeAttr('disabled');
    }

    let days = getDays();
    let price = $('#car_price').html();
    let total = days * price;

    $('#days').html(days);
    $('#total').html(total);

    if($('#submit_reservation')[0] &&  $('input[name=return_date]').val()){

        let car = $('#car').val();
        let pickup_date =  $('input[name=pickup_date]').val();
        let return_date =  $('input[name=return_date]').val();

        if(pickup_date == return_date){
            $('#submit_reservation').attr('disabled','disabled');
            $('#message').text('Incorrect date period');
            return;
        }

        if(Date.parse(pickup_date) - Date.parse(return_date) > 0 ){
            $('#submit_reservation').attr('disabled','disabled');
            $('#message').text('Incorrect date period');
            return;
        }

        $('#spinner').removeClass('d-none');
        $('#submit_reservation').attr('disabled','disabled');

        $.ajax({url: "/api/test",
            type:'get',
            data:{
                car: car,
                pickup_date:pickup_date,
                return_date:return_date
            },
            error: function (){
                $('#submit_reservation').attr('disabled','disabled');

            },
            success: function(result){
                    $('#spinner').addClass('d-none');
                if(result){
                    $('#message').text('Car already reserved for this period');
                    $('#submit_reservation').attr('disabled','disabled');

                }else{
                    $('#submit_reservation').removeAttr('disabled');
                    $('#message').text('');
                }
            }});
    }

}

function getDays(){
    let pickup_date = $('input[name=pickup_date]').val();
    let return_date = $('input[name=return_date]').val();

    if(pickup_date == '' || return_date == '')return 0;

    let date1 = Date.parse(pickup_date);
    let date2 = Date.parse(return_date);
    return  parseInt((date2 - date1) / (1000 * 60 * 60 * 24), 10);

}

function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2)
        month = '0' + month;
    if (day.length < 2)
        day = '0' + day;

    return [year, month, day].join('-');
}

if(document.getElementById('reservation_form')) {
    document.getElementById('reservation_form').onsubmit = function () {
        //event.preventDefault();
        let accessories = [];
        $('#accessories input[type=checkbox]').each(function (e) {
            if ($('#accessories input[type=checkbox]')[e].checked) {
                accessories.push($('#accessories input[type=checkbox]')[e].getAttribute('data-accessory-id'))
            }
        })
        $('#accessories').val(accessories.toString());
        //$('#reservation_form').submit();
    };
}
