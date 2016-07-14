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
// @codekit-prepend "libs/jquery.fullpage.min.js"
// @codekit-prepend "libs/jquery.stellar.min.js"

// @codekit-append "shop-scripts.js";


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


    // Add dynamic accent color body classes:
    if ( $('body').hasClass('home') || $('body').hasClass('culture') || $('body').hasClass('single-case-studies') || $('body').hasClass('single-project-proposals') ) {
      $('body').addClass('popPrimary');
    } else if ( $('body').hasClass('post-type-archive-case-studies') && $('body').hasClass('archive') ) {
      $('body').addClass('popWhite');
    } else if ( $('body').hasClass('tax-case_study_type') && $('body').hasClass('archive') ) {
      $('body').addClass('popWhite');
    } else if ( $('body').hasClass('blog') || $('body').hasClass('archive') ) { //<- 'blog' is "collective"
      $('body').addClass('popSecondary');
    } else if ( $('body').hasClass('strategy') || $('body').hasClass('page-template-template-service') ) {
      $('body').addClass('popTertiary');
    } else if ( $('body').hasClass('project-planner') || $('body').hasClass('page-template-template-sectioned-form') || $('body').hasClass('contact') || $('body').hasClass('error404') ) {
      $('body').addClass('popQuaternary');
    } else if ( $('body').hasClass('blog') || $('body').hasClass('archive') || $('body').hasClass('shop-intro') || $('body').hasClass('woocommerce-page') ) { //<- 'blog' is "collective"
      $('body').addClass('popSecondary');
    } else { //<- generic page templates
      $('body').addClass('popSecondary');
    }


    // Hover Zoom Fade effect
    $('.hoverZoomFade').hover(function() {
      $(this).toggleClass('boxHovered').next().stop( true, true );
    });

    $('.hoverZoomFade a').hover(function() {
      $(this).closest('.hoverZoomFade').toggleClass('linkHovered').next().stop( true, true );
    });


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
    $(window).load(function() {
      vAlignFun();
    });

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



    // Single posts - Calculate space for hero "spacer" element
    if ( $('body').hasClass('single') ) {
      var heroSpcrHeight = function() {
        var spacerHeight;

        if ($(window).width() > 768) {
          spacerHeight = 1.21;
          $('.post-hero-spacer').height($(window).height() / spacerHeight);
        } else {
          spacerHeight = 1.33;
          $('.post-hero-spacer').height($(window).height() / spacerHeight);
        }
      };
      heroSpcrHeight();

      $(window).resize(function() {
        heroSpcrHeight();
      }).resize();
    }




    // Sticky Header waypoint
    var nav_container = $('.sticky-header-wrapper');
    var nav = $('.sticky-header');

    nav_container.waypoint({
      handler: function(direction) {
        if (direction === 'down') {
          nav.stop().addClass('sticky');

          // If is Blog or Case Studies Archive page, don't add height to ".sticky-header-wrapper"
          if ( !$('body').hasClass('blog') && !$('body').hasClass('category') && !$('body').hasClass('post-type-archive-case-studies') && !$('body').hasClass('tax-case_study_type') ) {
            nav_container.css({ 'height': '73px' });
          }

        } else {
          nav.stop().removeClass('sticky');
        }
      }
    });

    if (!$('body').hasClass('contact') && !$('body').hasClass('error404') && !$('body').hasClass('blog') && !$('body').hasClass('category') && !$('body').hasClass('post-type-archive-case-studies') && !$('body').hasClass('tax-case_study_type')) {

      var menuAppearBuffer;

      if ($('body').hasClass('single-project-proposals') && $( "#project-proposal-password-screen" ).length ){
      // User is on Project Proposal Password Page
        menuAppearBuffer = '';
      } else if ($('body').hasClass('single-project-proposals')){
      // User is logged in and on Project Proposal Page
        menuAppearBuffer = $('.sticky-header-wrapper').position().top + 500;
      } else if ( $('body').hasClass('single-case-studies') || $('body').hasClass('single-post') && !$('body').hasClass('single-product') ) {
      // User is on Case Study Single - or - a regular blog post (single)
        menuAppearBuffer = $('.belowHero').position().top + 500;
      } else {
        // User is on any other page
        menuAppearBuffer = $('.sticky-header-wrapper').position().top + 500;
      }

      var stickyWrap = $('.sticky-header-wrapper').one();
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



    // Remove Hero from 404 error page
    if ( $('body').hasClass('error404') ) {
      $('.hero').remove();
    }



    // Menu toggle & fullPage menu initialization
    $('body').on('click', '.menu-button', function(event) {
      event.preventDefault();
      $('body').addClass('menuActive');

      // Menu link animation on open/close
      $('#menu-main-menu a').each(function(i){
          var link = $(this);
          setTimeout(function(){ link.addClass('linkVisible'); }, (i+1) * 140);
      });

      $('.left-icons .social-icon').find('.icon').addClass('isVisible');
    });

    $('body').on('click', '.menu-close', function(event) {
      event.preventDefault();
      $('body').removeClass('menuActive');

      // Menu link animation on open/close
      $('#menu-main-menu a').each(function(i){
          var link = $(this);
          setTimeout(function(){ link.removeClass('linkVisible'); }, (i+1) * 140);
      });

      $('.left-icons .social-icon').find('.icon').removeClass('isVisible');
    });


    // Menu link - add wrapper to each <a>
    $('#menu-main-menu li').find('a').wrap("<span class='link-wrap'></span>");



    // Blog/Collective Category Menu Toggle
    if ($('html').hasClass('touch')) {
      $('.mobile-cat-menu-toggle').on('click', function(event){
        event.preventDefault();
        $(this).toggleClass('catMenuVisible');
        $('.mobile-cat-menu-wrapper').toggleClass('catMenuVisible');
      });

    } else {
      $('.mobile-cat-menu-toggle').on('click', function(event){ event.preventDefault(); }).hover(
        function() {
          $(this).addClass('catMenuVisible');
          $('.mobile-cat-menu-wrapper').addClass('catMenuVisible');
        }, function() {
          $(this).removeClass('catMenuVisible');
          $('.mobile-cat-menu-wrapper').removeClass('catMenuVisible');
        }
      );
      $('.mobile-cat-menu-wrapper').hover(
        function() {
          $('.mobile-cat-menu-toggle').addClass('catMenuVisible');
          $(this).addClass('catMenuVisible');
        }, function() {
          $('.mobile-cat-menu-toggle').removeClass('catMenuVisible');
          $(this).removeClass('catMenuVisible');
        }
      );
    }



    // Down Arrow - fullPage.js scroll down to next section
    $('#down').click(function(e){
      e.preventDefault();
      $.fn.fullpage.moveSectionDown();
    });



    // Add 'darkHeader' class to proper pages
    if ( $('body').hasClass('error404') || $('body').hasClass('shop-intro') ) {
      $('.sticky-header-wrapper').addClass('darkHeader');
    }

    // remove active form page clases from #main wrapper
    var removeClasses = function(){
      $('#main').removeClass('form-step-1 form-step-2 form-step-3');
    };


    // Project Planner page
    if ( $('body').hasClass('page-template-template-sectioned-form') ) {
      /* jshint ignore:start */
      $('.focus-first-field').waypoint(function(direction) {
        // Add initial focus state to "name" field - Chrome needed delay to make focus work
        setTimeout(function(){
          $('.focus-first-field').find('input').focus();
        }, 1);
        this.destroy();
      }, {
        offset: '65%'
      });
      /* jshint ignore:end */


      $(document).bind('gform_post_render', function(){
        // active form section actions
        $('.sectionedForm_wrapper').addClass('full-section');
        $('.sectionedForm').addClass('full-section');
        $('.gf_page_steps').wrap("<div class='gf_page_steps_wrapper'></div>");

        // Wrap step button with span for proper button styling
        $('.gform_page_footer .button').wrap('<span class="span-after"></span>');

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
          //$('.gform_body').addClass('vAlign');
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

      /* jshint ignore:start */
      $(document).bind('gform_post_render', function(){
        $('.step-wrapper .step-inner').addClass('vAlign');
        vAlignShow();
        vAlignFun();
      });

      // Confirmation message
      $(document).bind('gform_confirmation_loaded', function(event, formId){
        removeClasses();
        $('#main').addClass('form-step-4');

        $('.gforms_confirmation_message').addClass('full-section');
        $('.gform_confirmation_wrapper').addClass('full-section');
        fullSection();

        $('.gform_confirmation_message').addClass('vAlign');
        vAlignShow();
        vAlignFun();

        // Force scroll down after form submission
        if(formId == 2) {
          $('html, body').animate({
             scrollTop: $(document).height()-$(window).height()},
             500,
             "easeInOutQuint"
          );
        }
      });
      /* jshint ignore:end */


      // Project Planner form step/section pagination
      $('#scrollmain').waypoint({
        handler: function(direction) {
          if (direction === 'down') {
            $('.form-pagination').addClass('visible');
          } else {
            $('.form-pagination').removeClass('visible');
          }
        },
        offset: '30%'
      });


      var dot1a = $('.form-pagination .dot-1 a');
      var dot2a = $('.form-pagination .dot-2 a');
      var dot3a = $('.form-pagination .dot-3 a');

      var step1headingEnterView = function() {
        dot1a.addClass('active');
      };
      var step2headingEnterView = function() {
        dot2a.addClass('active');
      };
      var step3headingEnterView = function() {
        dot3a.addClass('active');
      };

      var step1headingLeaveView = function() {
        dot1a.removeClass('active');
      };
      var step2headingLeaveView = function() {
        dot2a.removeClass('active');
      };
      var step3headingLeaveView = function() {
        dot3a.removeClass('active');
      };


      var step1heading = $('.step-1 .step-inner');
      var step2heading = $('.step-2 .step-inner');
      var step3heading = $('.step-3 .step-inner');

      step1heading.waypoint({
        handler: function(direction) {
          if (direction === 'down') {
            step1headingEnterView(); // top entering from the bottom
          }
          else {
            step1headingLeaveView(); // top leaving from the bottom
          }
        }, offset: '100%'
      });

      step1heading.waypoint({
        handler: function(direction) {
          if (direction === 'down') {
            step1headingLeaveView(); // bottom leaving from the top
          }
          else {
            step1headingEnterView(); // bottom entering from top
          }
        }, offset: function() {
          return -this.element.clientHeight;
        }
      });


      step2heading.waypoint({
        handler: function(direction) {
          if (direction === 'down') {
            step2headingEnterView(); // top entering from the bottom
          }
          else {
            step2headingLeaveView(); // top leaving from the bottom
          }
        }, offset: '100%'
      });

      step2heading.waypoint({
        handler: function(direction) {
          if (direction === 'down') {
            step2headingLeaveView(); // bottom leaving from the top
          }
          else {
            step2headingEnterView(); // bottom entering from top
          }
        }, offset: function() {
          return -this.element.clientHeight;
        }
      });


      step3heading.waypoint({
        handler: function(direction) {
          if (direction === 'down') {
            step3headingEnterView(); // top entering from the bottom
          }
          else {
            step3headingLeaveView(); // top leaving from the bottom
          }
        }, offset: '100%'
      });

      step3heading.waypoint({
        handler: function(direction) {
          if (direction === 'down') {
            step3headingLeaveView(); // bottom leaving from the top
          }
          else {
            step3headingEnterView(); // bottom entering from top
          }
        }, offset: function() {
          return -this.element.clientHeight;
        }
      });

    } // if body has class 'page-template-template-sectioned-form'



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

    $('.next-post-section').last().removeClass('downArrow').addClass('upArrow');

    $('.blog, .case-studies-wrapper').on('click', '.next-post-section.downArrow', function(e) {
        e.preventDefault();
        // var $this = $(this),
        //     $next = $this.parent().next();
        // $next.scrollTo(900, 'easeInOutQuint');
        $.fn.fullpage.moveSectionDown();
    });

    $('.blog, .case-studies-wrapper').on('click', '.next-post-section.upArrow', function(e) {
      e.preventDefault();
      $('html, body').animate({scrollTop : 0}, 900, "easeInOutQuint");
      //$.fn.fullpage.moveSectionUp();
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
      $(".fancybox-video").fancybox({
        width: "100%",
        height: "85%",
        type:'iframe',
        openOpacity: true,

        helpers: {
          media :{}
        },
        beforeLoad: function() {
          $('#fancybox-loading').appendTo('#fancyWrap');
        },
        beforeShow: function() {
          $('.fancybox-wrap, .fancybox-overlay, #fancybox-loading').appendTo('#fancyWrap');
        },
        afterShow: function() {
          $('.fancybox-close').addClass('close-btn').prepend("<i class='close-icon'></i>");
        },
        afterClose: function() {
          $('#fancyWrap, .fancy-positioner').removeClass('isOpen');
        }
      });

      $('body').on('click', '.video-play-btn', function(){
        $('#fancyWrap, .fancy-positioner').addClass('isOpen');
      });





    // add script for parallax hero backgrounds
    var stellarJS = function(){
      $.stellar({
        responsive: true,
        horizontalScrolling: false
      });
    };
    stellarJS();

    $(window).load(function() {
      $(window).data('plugin_stellar').refresh();

      $.stellar({
        responsive: true,
        horizontalScrolling: false
      });
    });



    // bxSlider(s)
    $('.stat-slider').bxSlider({
      auto: ($(".stat-slider>.slide").length > 1) ? true: false,
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
      auto: ($(".quote-slider>.slide").length > 1) ? true: false,
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

    $('.feat-highlight-slider').bxSlider({
      auto: false,
      mode: 'fade',
      adaptiveHeight: 'true',
      controls: true,
      pagerCustom: '.feat-slide-pager',
      nextText: '',
      prevText: ''
    });


    // Shop Intro - Feature Product Slider
    $('.featured-products').bxSlider({
      auto: ($(".featured-products>.product-slide").length > 1) ? true: false,
      pause: 5000,
      mode: 'fade',
      adaptiveHeight: 'true',
      controls: false,
      nextText: '',
      prevText: '',
      pager: ($(".featured-products>.product-slide").length > 1) ? true: false
    });


    // Product Image Slider
    var realSlider = $(".product-images").bxSlider({
      speed:1000,
      pager:false,
      nextText:'',
      prevText:'',
      infiniteLoop:false,
      hideControlOnEnd:true,
      onSliderLoad: function () {
        vAlignShow();
        vAlignFun();
      },
      onSlideBefore:function($slideElement, oldIndex, newIndex){
        changeRealThumb(realThumbSlider,newIndex);
      }
    });

    var realThumbSlider = $("#product-pager").bxSlider({
      minSlides: 5,
      maxSlides: 5,
      slideWidth: 146,
      slideMargin: 12,
      moveSlides: 1,
      pager:false,
      speed:1000,
      infiniteLoop:false,
      hideControlOnEnd:true,
      nextText:'<span></span>',
      prevText:'<span></span>',
      onSliderLoad: function () {
        vAlignShow();
        vAlignFun();
      }
    });

    if($("#product-pager a").length<6){
      $("#product-pager .bx-next").hide();
    }

    if($(".product-image-page-link").length<=1){
      $(".product-pager-wrapper").hide();
    }

    function linkRealSliders(bigS){
      $("#product-pager").on("click","a",function(event){
        event.preventDefault();
        var newIndex = $(this).parent().attr("data-slide-index");
        bigS.goToSlide(newIndex);
      });
    }

    linkRealSliders(realSlider,realThumbSlider);

    function changeRealThumb(slider,newIndex){
      var $thumbS = $("#product-pager");
      $thumbS.find('.active').removeClass("active");
      $thumbS.find('.product-image-page-link[data-slide-index="'+newIndex+'"]').addClass("active");

      if(slider.getSlideCount()-newIndex>=5) {
        slider.goToSlide(newIndex);
      } else {
        slider.goToSlide(slider.getSlideCount()-5);
      }
    }



    // "snapping" scroll
    if ($('.scroll-wrap').length) {
      $('.scroll-wrap').fullpage({
        css3: true,
        autoScrolling: false,
        scrollingSpeed: 1250,
        fitToSectionDelay: 750
      });
    }


  });

})(jQuery, window);
