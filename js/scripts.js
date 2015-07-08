// @codekit-prepend "libs/modernizr.js"
// @codekit-prepend "libs/jquery.waypoints.min.js"
// @codekit-prepend "libs/jquery.bxslider.min.js"
// @codekit-prepend "libs/fastclick.js"
// @codekit-prepend "libs/jquery.easings.min.js"
// @codekit-prepend "libs/jquery.slimscroll.min.js"
// @codekit-prepend "libs/jquery.fullPage.js"

// DOM Ready
(function($, window, undefined) {
  $(function() {

    FastClick.attach(document.body);


    // Adds touch screen "hover" support
    // Also needed to add "-webkit-tap-highlight-color: rgba(0,0,0,0);" to the "a" tag in _defaults.scss to get rid of gray overlay
    document.addEventListener("touchstart", function(){}, true);

    // Removes iOS link popups when long tap
    // $("a").bind('taphold', function(event) {
    //   event.preventDefault();
    // });


    // Add dynamic color body classes:
    if ( $('body').hasClass('culture') ) {
      $('body').addClass('popPrimary');
    } else if ( $('body').hasClass('collective') ) {
      $('body').addClass('popSecondary');
    } else if ( $('body').hasClass('strategy') ) {
      $('body').addClass('popTertiary');
    } else if ( $('body').hasClass('project-planner') ) {
      $('body').addClass('popQuaternary');
    }


    // Vertical Align Elements
    $('.vAlign').fadeIn(50).css('visibility', 'visible'); // fixes the css "hidden" style for the flash before complete page load (.vAlign in _common.scss)
    var vAlignFun = function() {
      (function ($) {
      $.fn.vAlign = function() {
        return this.each(function(){
          var div = $(this).children('div.vAlign');
          var ph = $(this).innerHeight();
          var dh = div.height();
          var mh = (ph - dh) / 2;
          div.css('top', mh);
        });
      };
      })(jQuery);
      $('.vAlign').parent().vAlign();
    };


    // Backpage (non-FullPage.js) full screen hero
    var bigHero = function(){
      $('.hero').height($(window).height());
    };

    bigHero();

    $(window).resize(function() {
      bigHero();
    }).resize();


    // Sticky Header waypoint
    var nav_container = $('.sticky-header-wrapper');
    var nav = $('.sticky-header');

    nav_container.waypoint({
      handler: function(direction) {
        if (direction === 'down') {
          nav.stop().addClass('sticky');
          nav_container.css({ 'height': '70px' });

        } else {
          nav.stop().removeClass('sticky');
        }
      }
    });



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

    $('.bigLinks a').hover(function() {
      $('.menu-section').toggleClass('linkHovered');
    });



    // Full page section scroll snap - fullPage.js - https://github.com/alvarotrigo/fullPage.js#fullpagejs

    // Home / Landing Menu
    if ($('body').hasClass('home')) {
      $('#landing-menu').fullpage({
        scrollOverflow: true,
        verticalCentered: false,
        scrollBar: true, // <- needed to make Waypoints.js work
        recordHistory: false,
        scrollingSpeed: 900,
        easing: 'easeInOutQuint',
        anchors: ['landing', 'get-to-know-us', 'our-strategic-vision', 'explore-the-latest', 'reach-out-to-us', 'lets-build-something'],
        menu: '#pagination',
        afterResize: function(){
          vAlignFun();
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



    // Backpage Menu
    } else {

      // fullPage.js initialization
      var menuBuild = function(){
        $('#menu').fullpage({
          scrollOverflow: true,
          verticalCentered: false,
          scrollBar: true, // <- needed to make Waypoints.js work
          recordHistory: false,
          scrollingSpeed: 900,
          easing: 'easeInOutQuint',
          anchors: ['get-to-know-us', 'our-strategic-vision', 'explore-the-latest', 'reach-out-to-us', 'lets-build-something'],
          menu: '#pagination',
          afterResize: function(){
            vAlignFun();
          }
        });

        reloadWaypoints();
      };

      // Menu toggle & fullPage menu initialization
      $('body').on('click', '.menu-button', function(event) {
        event.preventDefault();
        $('body').addClass('menuActive');

        menuBuild();
      });

      $('body').on('click', '.menu-close', function(event) {
        event.preventDefault();
        $('body').removeClass('menuActive');

        // remove fullPage.js
        setTimeout(function() {
          $.fn.fullpage.destroy('all');

          // re-render big hero section
          bigHero();
        }, 400);
      });


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

      $(document).ready(function() {
        $('.menu-links-wrapper').css({'top': menuHeight + 'px'});
      });

      // scroll down to next section
      $('#down').click(function(e){
        e.preventDefault();
        $.fn.fullpage.moveSectionDown();
      });
    }


    // Down Arrow - fullPage.js scroll down to next section
    $('#down').click(function(e){
      e.preventDefault();
      $.fn.fullpage.moveSectionDown();
    });



    // Vertical Align Elements (Defined as variable above fullPage.js)
    vAlignFun();

    $(window).resize(function() {
      vAlignFun();
    });




    // Smooth scrolling for anchors on same page - via: https://css-tricks.com/snippets/jquery/smooth-scrolling/
    $(function() {
      $('a[href*=#]:not([href=#], .modalTrigger)').click(function() {
        if (location.pathname.replace(/^\//,'') === this.pathname.replace(/^\//,'') && location.hostname === this.hostname) {
          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
          if (target.length) {
            $('html,body').animate({
              scrollTop: target.offset().top - 0
            }, 900, "easeInOutQuint");
            return false;
          }
        }
      });
    });



    // bxSlider(s)
    $('.CLASSofSLIDER').bxSlider({
      adaptiveHeight: true,
      nextSelector: '.slide-next',
      prevSelector: '.slide-prev',
      nextText: '',
      prevText: ''
    });


  });

})(jQuery, window);