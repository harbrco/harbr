// @codekit-prepend "libs/modernizr.js"
// @codekit-prepend "libs/jquery.waypoints.min.js"
// @codekit-prepend "libs/jquery.bxslider.min.js"
// @codekit-prepend "libs/fastclick.js"
// @codekit-prepend "libs/jquery.easings.min.js"
// @codekit-prepend "libs/jquery.slimscroll.min.js"
// @codekit-prepend "libs/jquery.fancybox.pack.js"
// @codekit-prepend "libs/fancybox-helpers/jquery.fancybox-buttons.js"
// @codekit-prepend "libs/fancybox-helpers/jquery.fancybox-media.js"
// @codekit-prepend "libs/wow.min.js"
// @codekit-prepend "libs/jquery.fullPage.js"


// fix for *flash* of animated elements before animation happens.
$('.wow').fadeIn(50).css('visibility', 'visible');

// Elements Animate when user scrolls. - WOW.js - http://mynameismatthieu.com/WOW/docs.html
/* global WOW */
new WOW().init();


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


    // Add dynamic accent color body classes:
    if ( $('body').hasClass('culture') || $('body').hasClass('post-type-archive-case-studies') || $('body').hasClass('single-case-studies') ) {
      $('body').addClass('popPrimary');
    } else if ( $('body').hasClass('blog') || $('body').hasClass('archive') ) { //<- 'blog' is "collective"
      $('body').addClass('popSecondary');
    } else if ( $('body').hasClass('strategy') ) {
      $('body').addClass('popTertiary');
    } else if ( $('body').hasClass('project-planner') || $('body').hasClass('contact') ) {
      $('body').addClass('popQuaternary');
    }


    // Vertical Align Elements
    var vAlignShow = function() {
      $('.vAlign').fadeIn(50).css('visibility', 'visible'); // fixes the css "hidden" style for the flash before complete page load (.vAlign in _common.scss)
    };
    vAlignShow();
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
    vAlignFun();

    $(window).resize(function() {
      vAlignFun();
    }).resize();

    // Listen for resize changes (mobile orientation change)
    window.addEventListener("resize", function() {
      vAlignFun();
    }, false);


    // Backpage (non-FullPage.js) full screen hero
    var bigHero = function(){
      $('.hero').height($(window).height());
    };
    bigHero();

    // Backpage "next-page-cta" full screen box
    var bigCTA = function(){
      $('.big-cta').height($(window).height());
    };
    bigCTA();

    // Backpage "next-page-cta" full screen box
    var fullSection = function(){
      $('.full-section').css("min-height", $(window).height());
    };
    fullSection();

    $(window).resize(function() {
      bigHero();
      bigCTA();
      fullSection();
    }).resize();



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

      // Sticky Header waypoint
      var nav_container = $('.sticky-header-wrapper');
      var nav = $('.sticky-header');

      nav_container.waypoint({
        handler: function(direction) {
          if (direction === 'down') {
            nav.stop().addClass('sticky');

            // If is Case Studies Archive page, don't add height to ".sticky-header-wrapper"
            if ( !$('body').hasClass('post-type-archive-case-studies') ) {
              nav_container.css({ 'height': '70px' });
            }

          } else {
            nav.stop().removeClass('sticky');
          }
        }
      });

      if (!$('body').hasClass('contact') && !$('body').hasClass('single')) {
        var stickyWrap = $('.sticky-header-wrapper').one();
        var menuAppearBuffer = $('.sticky-header-wrapper').position().top + 400;
        var lastScrollTop = 0;
        $(window).scroll(function(){
          if ( $(nav).hasClass('sticky') ) {
            var st = $(this).scrollTop();
            if (st > menuAppearBuffer && st > lastScrollTop){
              stickyWrap.addClass('menuHidden');

            } else {
              stickyWrap.removeClass('menuHidden');
            }
            lastScrollTop = st;
          }
        });
      }

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
        $('body').addClass('menuActive');

        //menuBuild();
      });

      $('body').on('click', '.menu-close', function(event) {
        event.preventDefault();
        $('body').removeClass('menuActive');

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


    // Down Arrow - fullPage.js scroll down to next section
    $('#down').click(function(e){
      e.preventDefault();
      $.fn.fullpage.moveSectionDown();
    });



    // Add 'darkHeader' class to proper pages
    if ( $('body').hasClass('project-planner') ) {
      $('.sticky-header-wrapper').addClass('darkHeader');
    }

    // remove active form page clases from #main wrapper
    var removeClasses = function(){
      $('#main').removeClass('form-step-1 form-step-2 form-step-3');
    };


    // Project Planner page
    if ( $('body').hasClass('project-planner') ) {
      /* jshint ignore:start */
      $('#field_1_1').waypoint(function(direction) {
        // Add initial focus state to "name" field
        $('#input_1_1').focus();
        this.destroy();
      }, {
        offset: 'bottom-in-view'
      });
      /* jshint ignore:end */

      $(document).bind('gform_post_render', function(){
        // active form section actions
        $('.projectPlannerForm_wrapper').addClass('full-section');
        $('.projectPlannerForm').addClass('full-section');
        $('.gf_page_steps').wrap("<div class='gf_page_steps_wrapper'></div>");
        $('.gform_page_footer .button').after("<div class='button-underline'></div>");

        $('.gform_body').waypoint({
          handler: function(direction) {
            if (direction === 'down') {
              $('.gf_page_steps').addClass('visible');
            } else {
              $('.gf_page_steps').removeClass('visible');
            }
          },
          offset: '60%'
        });

        if ($(window).width() > 840) {
          $('.gform_body').addClass('vAlign');
        }

        vAlignShow();
        fullSection();

        setTimeout(function() {
          fullSection();
          vAlignFun();
        }, 10);

        if ( $('#gf_step_1_1').hasClass('gf_step_active') ) {
          removeClasses();
          $('#main').addClass('form-step-1');
        } else if ( $('#gf_step_1_2').hasClass('gf_step_active') ) {
          removeClasses();
          $('#main').addClass('form-step-2');
        } else if ( $('#gf_step_1_3').hasClass('gf_step_active') ) {
          removeClasses();
          $('#main').addClass('form-step-3');
        }

        // Expanding textarea - - - - - - -
        // Add special markup:
        $('.hasTextarea .ginput_container').prepend("<pre><span></span><br></pre>").wrapInner("<div class='expandingArea'></div>");

        // Expanding textarea function:
        $(function() {
          $('div.expandingArea').each(function() {
            var area = $('textarea', $(this));
            var span = $('span', $(this));
            area.bind('input', function() { span.text(area.val()); });
            span.text(area.val());
            $(this).addClass('active');
          });
        });

      }); // gform_post_render

      // Confirmation message
      /* jshint ignore:start */
      $(document).bind('gform_confirmation_loaded', function(event, formId){
        removeClasses();
        $('#main').addClass('form-step-4');

        $('.gforms_confirmation_message').addClass('full-section');
        $('.gform_confirmation_wrapper').addClass('full-section');
        fullSection();

        $('.gform_confirmation_message').addClass('vAlign');
        vAlignShow();
        vAlignFun();
      });
      /* jshint ignore:end */

    } // if body has class 'project-planner'



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



    // Case Studies down arrow - 'next case study' links
    jQuery.fn.extend({
      scrollTo : function(speed, easing) {
        return this.each(function() {
          var targetOffset = $(this).offset().top;
          $('html,body').animate({scrollTop: targetOffset}, speed, easing);
        });
      }
    });

    $('.next-case-study').last().removeClass('downArrow').addClass('upArrow');

    $('.case-studies-wrapper').on('click', '.next-case-study.downArrow', function(e) {
        e.preventDefault();
        var $this = $(this),
            $next = $this.parent().next();

        $next.scrollTo(900, 'easeInOutQuint');
    });

    $('.case-studies-wrapper').on('click', '.next-case-study.upArrow', function(e) {
      e.preventDefault();
      $('html, body').animate({scrollTop : 0}, 900, "easeInOutQuint");
      return false;
    });



    // Share modal popups
    $('.post-header, .modal').on('click', '.modal-toggle', function(e) {
      e.preventDefault();
      $('.modal').toggleClass('is-visible');
      $('body').toggleClass('modalOpen');
    });



    // Fancybox - Modal popup
      // video modal
      var viewportWidth = $(window).width();
      if (viewportWidth >= 450){

        $(".fancybox-video").fancybox({
          width: "100%",
          height: "85%",
          type:'iframe',
          helpers: {
            overlay: {
              locked: false
            },
            media :{}
          },
          afterShow: function() {
            $('.fancybox-close').addClass('close-btn').prepend("<i class='close-icon'></i>");
          }
        });

      } else {
        //mobile video action - vimeo embed currently not supported on mobile
      }



    // bxSlider(s)
    $('.stat-slider').bxSlider({
      auto: true,
      pause: 7000,
      speed: 5,
      mode: 'fade',
      controls: true,
      nextSelector: '.next-stat',
      prevSelector: '.prev-stat',
      nextText: '',
      prevText: '',
      onSlideBefore: function(){
        $('.stat-slider .slide').animate({
          opacity: 0
        }, 600, function() {
          // Animation complete.
        });
      },
      onSlideAfter: function(){
        $('.stat-slider .slide').animate({
          opacity: 1
        }, 600, function() {
          // Animation complete.
        });
      },
      pager: ($(".stat-slider>.slide").length > 1) ? true: false
    });

    $('.quote-slider').bxSlider({
      auto: true,
      pause: 7000,
      speed: 50,
      mode: 'fade',
      controls: true,
      nextSelector: '.next-quote',
      prevSelector: '.prev-quote',
      nextText: '',
      prevText: '',
      onSlideBefore: function(){
        $('.quote-slider .slide').animate({
          opacity: 0
        }, 600, function() {
          // Animation complete.
        });
      },
      onSlideAfter: function(){
        $('.quote-slider .slide').animate({
          opacity: 1
        }, 600, function() {
          // Animation complete.
        });
      },
      pager: ($(".quote-slider>.slide").length > 1) ? true: false
    });

    $('.feature-highlight-slider').bxSlider({
      auto: false,
      pause: 6000,
      speed: 5,
      mode: 'fade',
      controls: true,
      nextSelector: '.next-stat',
      prevSelector: '.prev-stat',
      nextText: '',
      prevText: '',
      onSlideBefore: function(){
        $('.feature-highlight-slider .slide').animate({
          opacity: 0
        }, 600, function() {
          vAlignFun();
          // Animation complete.
        });
      },
      onSlideAfter: function(){
        $('.feature-highlight-slider .slide').animate({
          opacity: 1
        }, 600, function() {
          vAlignFun();
          // Animation complete.
        });
      },
      pager: ($(".feature-highlight-slider>.slide").length > 1) ? true: false
    });




  });

})(jQuery, window);