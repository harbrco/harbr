// DOM Ready
(function($, window, undefined) {
  $(function() {

    // Menu Shifting up/down
    // (NOTE - Homepage menu has extra "landing" section at index #section0 to account for the landing/hero section)
    var menuChanges = function(){
      if ($("#section0").hasClass('active')) {
        $('.bigLinks ul').attr('style', 'top: 0px');
        $('.littleLinksBefore ul').attr('style', 'bottom: -320px');
        $('.littleLinksAfter ul').attr('style', 'top: -80px');

      } else if ($("#section1").hasClass('active')) {
        $('.bigLinks ul').attr('style', 'top: -92px');
        $('.littleLinksBefore ul').attr('style', 'bottom: -240px');
        $('.littleLinksAfter ul').attr('style', 'top: -160px');

      } else if ($("#section2").hasClass('active')) {
        $('.bigLinks ul').attr('style', 'top: -184px');
        $('.littleLinksBefore ul').attr('style', 'bottom: -160px');
        $('.littleLinksAfter ul').attr('style', 'top: -240px');

      } else if ($("#section3").hasClass('active')) {
        $('.bigLinks ul').attr('style', 'top: -276px');
        $('.littleLinksBefore ul').attr('style', 'bottom: -80px');
        $('.littleLinksAfter ul').attr('style', 'top: -320px');

      } else if ($("#section4").hasClass('active')) {
        $('.bigLinks ul').attr('style', 'top: -368px');
        $('.littleLinksBefore ul').attr('style', 'bottom: 0px');
        $('.littleLinksAfter ul').attr('style', 'top: -400px');
      }
    };

    var w1 = $('.main-menu .section').waypoint({
      handler: function() {
        menuChanges();
      },
      offset: '-1'
    });

    var w2 = $('.main-menu .section').waypoint({
      handler: function() {
        menuChanges();
      },
      offset: 'bottom-in-view'
    });

    var reloadWaypoints = function() {
      w1.forEach(function(w) { w.context.refresh(); });
      w2.forEach(function(w) { w.context.refresh(); });
    };


    // Hover Zoom Fade effect
    $('.bigLinks a').hover(function() {
      $('.menu-section').toggleClass('linkHovered');
    });

    $('.hoverZoomFade').hover(function() {
      $(this).toggleClass('boxHovered').next().stop( true, true );
    });

    $('.hoverZoomFade a').hover(function() {
      $(this).closest('.hoverZoomFade').toggleClass('linkHovered').next().stop( true, true );
    });




    // Full page section scroll snap - fullPage.js - https://github.com/alvarotrigo/fullPage.js#fullpagejs

    // Home / Landing Menu
    if ($('body').hasClass('home')) {
      // use Fullpage.js menu only if NOT on touch devices
      if (!$('html').hasClass('touch')) {

        $('#landing-menu').fullpage({
          verticalCentered: false,
          scrollBar: true, // <- needed to make Waypoints.js work
          recordHistory: false,
          scrollingSpeed: 900,
          easing: 'easeInOutQuint',
          anchors: ['landing', 'get-to-know-us', 'our-strategic-vision', 'explore-the-latest', 'reach-out-to-us', 'lets-build-something'],
          menu: '#pagination',
          afterResize: function(){
            vAlignFun();
            reloadWaypoints();
          }
        });

        // Home/Landing Menu Shifting up/down
        // (NOTE - Homepage menu has extra "landing" section at index #section0 to account for the landing/hero section)
        menuChanges = function(){
          if ($("#section0").hasClass('active')) {
            $('.bigLinks ul').attr('style', 'top: -92px');
            $('.littleLinksBefore ul').attr('style', 'bottom: -320px');
            $('.littleLinksAfter ul').attr('style', 'top: -80px');

          } else if ($("#section1").hasClass('active')) {
            $('.bigLinks ul').attr('style', 'top: -92px');
            $('.littleLinksBefore ul').attr('style', 'bottom: -320px');
            $('.littleLinksAfter ul').attr('style', 'top: -80px');

          } else if ($("#section2").hasClass('active')) {
            $('.bigLinks ul').attr('style', 'top: -184px');
            $('.littleLinksBefore ul').attr('style', 'bottom: -240px');
            $('.littleLinksAfter ul').attr('style', 'top: -160px');

          } else if ($("#section3").hasClass('active')) {
            $('.bigLinks ul').attr('style', 'top: -276px');
            $('.littleLinksBefore ul').attr('style', 'bottom: -160px');
            $('.littleLinksAfter ul').attr('style', 'top: -240px');

          } else if ($("#section4").hasClass('active')) {
            $('.bigLinks ul').attr('style', 'top: -368px');
            $('.littleLinksBefore ul').attr('style', 'bottom: -80px');
            $('.littleLinksAfter ul').attr('style', 'top: -320px');

          } else if ($("#section5").hasClass('active')) {
            $('.bigLinks ul').attr('style', 'top: -460px');
            $('.littleLinksBefore ul').attr('style', 'bottom: 0px');
            $('.littleLinksAfter ul').attr('style', 'top: -400px');
          }
        };

        // Menu Visibility Waypoint
        var menuHeight = $('.menu-links-wrapper').height();

        $(document).ready(function() {
          $('.menu-links-wrapper').css({'top': menuHeight + 'px'});
        });

        // Menu Visibility Waypoint
        $('.menu-section-1').waypoint({
          handler: function(direction) {
            if (direction === 'down') {
              $('.menu-links-wrapper').addClass('active').css({'top': '0'});
            }
          },
          offset: '99.5%'
        });

        $('.menu-section-1').waypoint({
          handler: function(direction) {
            if (direction === 'up') {
              $('.menu-links-wrapper').removeClass('active').css({'top': menuHeight + 'px'});
            }
          },
          offset: 'bottom-in-view'
        });

      } // end if NOT touch


    // Backpage Menu
    } else {

      // var menuActiveClass = function() {
      //   if ( $('body').hasClass('culture') ){
      //     $('.menu-section-1').addClass('active');
      //   } else if ( $('body').hasClass('strategy') ){
      //     $('.menu-section-2').addClass('active');
      //   } else if ( $('body').hasClass('blog') ){
      //     $('.menu-section-3').addClass('active');
      //   } else if ( $('body').hasClass('contact') ){
      //     $('.menu-section-4').addClass('active');
      //   } else if ( $('body').hasClass('project-planner') ){
      //     $('.menu-section-5').addClass('active');
      //   }
      // };
      // menuActiveClass();

      // // fullPage.js initialization
      // var menuBuild = function(){
      //   $('#menu').fullpage({
      //     verticalCentered: false,
      //     scrollBar: true, // <- needed to make Waypoints.js work
      //     recordHistory: false,
      //     scrollingSpeed: 900,
      //     easing: 'easeInOutQuint',
      //     anchors: ['get-to-know-us', 'our-strategic-vision', 'explore-the-latest', 'reach-out-to-us', 'lets-build-something'],
      //     menu: '#pagination',
      //     afterResize: function(){
      //       vAlignFun();
      //     }
      //   });

      //   reloadWaypoints();
      // };

      // Menu toggle & fullPage menu initialization
      $('body').on('click', '.menu-button', function(event) {
        event.preventDefault();
        //menuBuild();
      });

      $('body').on('click', '.menu-close', function(event) {
        event.preventDefault();

        // remove fullPage.js
        // setTimeout(function() {
        //   $.fn.fullpage.destroy('all');

        //   // re-render big hero section
        //   bigHero();

        //   // re-render current page active class in menu
        //   menuActiveClass();
        // }, 400);
      });


      // $('.menu-section-1').waypoint({
      //   handler: function(direction) {
      //     if (direction === 'down') {
      //       $('.menu-links-wrapper').addClass('active').css({'top': '0'});
      //     }
      //   },
      //   offset: '99.5%'
      // });

      // $('.menu-section-1').waypoint({
      //   handler: function(direction) {
      //     if (direction === 'up') {
      //       $('.menu-links-wrapper').removeClass('active').css({'top': menuHeight + 'px'});
      //     }
      //   },
      //   offset: 'bottom-in-view'
      // });

      // $(document).ready(function() {
      //   $('.menu-links-wrapper').css({'top': menuHeight + 'px'});
      // });
    }


  });

})(jQuery, window);