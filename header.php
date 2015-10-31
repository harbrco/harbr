<!doctype html>
<html>
   <head>

      <style>
      .js div#preloader {
         position: fixed;
         left: 0;
         top: 0;
         z-index: 9998;
         width: 100%;
         height: 100%;
         overflow: visible;
         background-color: #292728;
      }

      /*.js div#preloader .h-brand {
         position: absolute;
         top: 50%;
         left: 50%;
         width: 110px;
         height: 110px;
         overflow: hidden;
         -ms-transform: translate(-50%,-50%);
         -webkit-transform: translate(-50%,-50%);
         transform: translate(-50%,-50%);
         background-image: url(<?php echo get_template_directory_uri();?>/img/loading-h-brand-sprite-min.png);
         -webkit-background-size: 110px 330px;
         background-size: 110px 330px;
         background-repeat: no-repeat;
         background-position: left top;
      }

      .js div#preloader .wave-brand {
         position: absolute;
         top: 50%;
         left: 50%;
         width: 122px;
         height: 122px;
         overflow: hidden;
         -ms-transform: translate(-50%,-50%);
         -webkit-transform: translate(-50%,-50%);
         transform: translate(-50%,-50%);
         background-image: url(<?php echo get_template_directory_uri();?>/img/loading-wave-brand-min.png);
         -webkit-background-size: 122px 122px;
         background-size: 122px 122px;
         background-repeat: no-repeat;
         background-position: left top;
      }*/

      .pace {
        -webkit-pointer-events: none;
        pointer-events: none;

        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;

        z-index: 9999;
        position: fixed;
        margin: auto;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        width: 122px;
        height: 122px;
        border: 0px;
        height: 130px;
        overflow: hidden;
        background-image: url(<?php echo get_template_directory_uri();?>/img/loading-wave-brand-min.png);
        -webkit-background-size: 122px 122px;
        background-size: 122px 122px;
        background-repeat: no-repeat;
      }

      .pace .pace-progress {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        -ms-box-sizing: border-box;
        -o-box-sizing: border-box;
        box-sizing: border-box;

        max-width: 400px;
        position: fixed;
        z-index: 2000;
        display: block;
        position: absolute;
        top: 0;
        right: 0;
        height: 100%;
        width: 100%;
        background: #61A4EA;
      }

      .pace {
         opacity: 1;
         transition: opacity .6s ease-in-out;
         -moz-transition: opacity .6s ease-in-out;
         -webkit-transition: opacity .6s ease-in-out;
      }
      .pace.pace-inactive {
        opacity: 0 !important;
      }
      </style>
      <?php if(is_page('home')) { ?>
         <style>
            .js div#preloader {
               background-color: #61A4EA; /* blue */
            }
            .pace .pace-progress {
               background-color: #61A4EA; /* blue */
            }
            .js div#preloader .h-brand {
               background-position: 0 -220px;
            }
         </style>
      <?php } elseif(is_page('culture')) { ?>
         <style>
            .js div#preloader {
               background-color: #61A4EA; /* blue */
            }

            .pace .pace-progress {
               background-color: #61A4EA; /* blue */
            }

            .js div#preloader .h-brand {
               background-position: 0 -220px;
            }
         </style>
      <?php } elseif(is_post_type_archive('case-studies')) { ?>
         <style>
            .js div#preloader {
               background-color: #61A4EA; /* blue */
            }

            .pace .pace-progress {
               background-color: #61A4EA; /* blue */
            }

            .js div#preloader .h-brand {
               background-position: 0 -220px;
            }
         </style>
      <?php } /* case studies internal post */ elseif(is_singular('case-studies')) { ?>
         <style>
            .js div#preloader {
               background-color: #61A4EA; /* blue */
            }

            .pace .pace-progress {
               background-color: #61A4EA; /* blue */
            }

            .js div#preloader .h-brand {
               background-position: 0 -220px;
            }
         </style>
      <?php } /* blog/collective */ elseif(is_home()) { ?>
         <style>
            .js div#preloader {
               background-color: #78B97F; /* green */
            }

            .pace .pace-progress {
               background-color: #78B97F; /* green */
            }

            .js div#preloader .h-brand {
               background-position: 0 -220px;
            }
         </style>
      <?php } /* blog/collective internal post */ elseif(is_single()) { ?>
         <style>
            .js div#preloader {
               background-color: #78B97F; /* green */
            }

            .pace .pace-progress {
               background-color: #78B97F; /* green */
            }

            .js div#preloader .h-brand {
               background-position: 0 -220px;
            }
         </style>
      <?php } /* blog/collective category */ elseif(is_category()) { ?>
         <style>
            .js div#preloader {
               background-color: #78B97F; /* green */
            }

            .pace .pace-progress {
               background-color: #78B97F; /* green */
            }

            .js div#preloader .h-brand {
               background-position: 0 -220px;
            }
         </style>
      <?php } elseif(is_archive()) { ?>
         <style>
            .js div#preloader {
               background-color: #78B97F; /* green */
            }

            .pace .pace-progress {
               background-color: #78B97F; /* green */
            }

            .js div#preloader .h-brand {
               background-position: 0 -220px;
            }
         </style>
      <?php } elseif(is_page('strategy')) { ?>
         <style>
            .js div#preloader {
               background-color: #FCCDC6; /* pink */
            }

            .pace .pace-progress {
               background-color: #FCCDC6; /* pink */
            }

            .js div#preloader .h-brand {
               background-position: 0 -220px;
            }
         </style>
      <?php } elseif(is_page('contact') || is_page('project-planner') ) { ?>
         <style>
            .js div#preloader {
               background-color: #F7D974; /* yellow */
            }

            .pace .pace-progress {
               background-color: #F7D974; /* yellow */
            }

            .js div#preloader .h-brand {
               background-position: 0 -220px;
            }
         </style>
      <?php } ?>


      <meta charset="<?php bloginfo('charset'); ?>">
      <title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

      <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon-32x32.png" sizes="32x32" />
      <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon-16x16.png" sizes="16x16" />
      <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">

      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <meta name="viewport" content="width=device-width,initial-scale=1.0">
      <meta name="description" content="<?php bloginfo('description'); ?>">

      <!-- Google Fonts -->
      <link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,400italic|Montserrat:400,700' rel='stylesheet' type='text/css'>

      <?php wp_head(); ?>

      <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/libs/pace.min.js"></script>

      <script type="text/javascript">
         paceOptions = {
           ajax: false,
           document: true,
           eventLag: false
         };

         Pace.on('done', function() {
           $('#preloader').fadeOut(600, function(){$(this).remove();});
         });
      </script>

   </head>
   <body <?php body_class(); ?>>

      <div id="preloader">
      </div>

   <?php if(!is_page('home') && !is_single() && !is_home() && !is_archive() && !is_page('project-planner')) { ?>
      <div class="menu-wrap">
         <?php get_template_part( 'partials/partial', 'main-menu' ); ?>
      </div>


      <div class="hero section big-cta isDarkGray">
         <div class="hero-header header-wrapper">
            <?php get_template_part( 'partials/partial', 'header-bar' ); ?>
         </div><!-- /.header-wrapper -->

         <?php if(is_page('strategy')) { ?>
            <div class="hero-text section-heading vAlign">
               <h1 class="clrPop">Strategy</h1>
               <span class="divWave"></span>
               <h3>Jacks of All Trades <br /><span class="italic">Experts</span> In All.</h3>
            </div>

         <?php } elseif(is_page('contact')) { ?>
            <div class="hero-text section-heading vAlign">
               <h1 class="clrPop">Contact</h1>
               <span class="divWave"></span>
               <h3>It's Good To <br /><span class="italic">Virtually</span> Meet You.</h3>

               <h4><a href="mailto:hello@harbr.co">hello@harbr.co</a> &nbsp;<span class="clrPop">•</span>&nbsp; <a href="tel:+1234567890" class="phone">(123) 456-7890</a></h4>
               <a href="/project-planner/" class="btn btn--uline">Project Planner</a>
            </div>
         <?php } ?>

         <!-- Scroll Down Button -->
         <?php if(!is_page('contact')) { ?>
            <a href="#scrollmain" class="downArrow wow slideInUp" data-wow-delay="1.25s"></a>
         <?php } ?>
      </div>


      <!-- Sticky Header Bar -->
      <?php if(!is_page('contact') && !is_home()) { ?>
      <div id="scrollmain" class="sticky-header-wrapper header-wrapper">
         <div class="sticky-header">
            <?php get_template_part( 'partials/partial', 'header-bar' ); ?>
         </div>
      </div><!-- /.header-wrapper -->
      <?php } ?>


   <?php } elseif(is_page('home')) { ?>
   <!-- Home page -->
      <div class="menu-wrap">
         <?php get_template_part( 'partials/partial', 'main-menu' ); ?>
      </div>

      <div class="landing-section hero section big-cta">
         <div class="header-wrapper">
            <?php get_template_part( 'partials/partial', 'header-bar' ); ?>
         </div><!-- /.header-wrapper -->

         <div class="landing-hero hero-text section-heading vAlign">
            <h1 class="clrPop">Digital Agency</h1>
            <span class="divWave"></span>
            <h3>A Crew of <br /><span class="italic">Creative</span> Doers.</h3>

            <a href="https://vimeo.com/1084537" class="video-play-btn primaryPop fancybox-video" data-width="1280" data-height="720">
               <i class="video-play-icon"></i>
            </a>
         </div>

         <div class="landing-overlay">
         </div>

         <video autoplay muted loop poster="<?php the_field('video_still_image'); ?>" id="bgvid">
            <source src="<?php the_field('video_url_webm'); ?>" type="video/webm">
            <source src="<?php the_field('video_url_mp4'); ?>" type="video/mp4">
            <source src="<?php the_field('video_url_ogv'); ?>" type="video/ogv">
         </video>

         <a href="#scrollmain" class="downArrow wow slideInUp" data-wow-delay="1.25s"></a>
      </div>


      <!-- Sticky Header Bar -->
      <?php if(!is_page('contact') && !is_home()) { ?>
      <div id="scrollmain" class="sticky-header-wrapper header-wrapper">
         <div class="sticky-header">
            <?php get_template_part( 'partials/partial', 'header-bar' ); ?>
         </div>
      </div><!-- /.header-wrapper -->
      <?php } ?>


   <?php } elseif(is_home()) { ?>
   <!-- Blog page -->
      <div class="menu-wrap">
         <?php get_template_part( 'partials/partial', 'main-menu' ); ?>
      </div>

      <!-- Sticky Header Bar -->
      <div id="scrollmain" class="sticky-header-wrapper header-wrapper darkHeader">
         <div class="sticky-header">
            <?php get_template_part( 'partials/partial', 'header-bar' ); ?>
         </div>
      </div><!-- /.header-wrapper -->


   <?php } elseif(is_page('project-planner')) { ?>
      <div class="menu-wrap">
         <?php get_template_part( 'partials/partial', 'main-menu' ); ?>
      </div>
      <div class="hero section big-cta isDarkGray">
         <div class="hero-header header-wrapper">
            <?php get_template_part( 'partials/partial', 'header-bar' ); ?>
         </div><!-- /.header-wrapper -->

         <div class="hero-text section-heading vAlign">
            <h1 class="clrPop">Project Planner</h1>
            <span class="divWave"></span>
            <h3>Let's Create <br />Something <span class="italic">Great</span>.</h3>
         </div>

         <a href="#scrollmain" class="downArrow wow slideInUp" data-wow-delay="1.25s"></a>
      </div>



   <?php } elseif(is_archive()) { ?>
   <!-- Archive Page -->
      <div class="menu-wrap">
         <?php get_template_part( 'partials/partial', 'main-menu' ); ?>
      </div>

      <!-- Sticky Header Bar -->
      <div id="scrollmain" class="sticky-header-wrapper header-wrapper darkHeader">
         <div class="sticky-header">
            <?php get_template_part( 'partials/partial', 'header-bar' ); ?>
         </div>
      </div><!-- /.header-wrapper -->


   <?php } ?>
