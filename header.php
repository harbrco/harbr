<!doctype html>
<html>
   <head>

      <style>
      .js div#preloader {
         position: fixed;
         left: 0;
         top: 0;
         z-index: 9999;
         width: 100%;
         height: 100%;
         overflow: visible;
         background-color: #292728;
      }

      .js div#preloader .h-brand {
         position: absolute;
         top: 50%;
         left: 50%;
         width: 110px;
         height: 110px;
         overflow: hidden;
         -ms-transform: translate(-50%,-50%); /* IE 9 */
         -webkit-transform: translate(-50%,-50%); /* Safari */
         transform: translate(-50%,-50%);
         background-image: url(<?php echo get_template_directory_uri();?>/img/loading-h-brand-sprite-min.png);
         -webkit-background-size: 110px 330px;
         background-size: 110px 330px;
         background-repeat: no-repeat;
         background-position: left top;
      }
      </style>
      <?php if(is_page('home')) { ?>
         <style>
            .js div#preloader {
               background-color: #61A4EA; /* blue */
            }
            .js div#preloader .h-brand {
               background-position-y: -220px;
            }
         </style>
      <?php } elseif(is_page('culture')) { ?>
         <style>
            .js div#preloader {
               background-color: #61A4EA; /* blue */
            }
            .js div#preloader .h-brand {
               background-position-y: -220px;
            }
         </style>
      <?php } elseif(is_post_type_archive('case-studies')) { ?>
         <style>
            .js div#preloader {
               background-color: #61A4EA; /* blue */
            }
            .js div#preloader .h-brand {
               background-position-y: -220px;
            }
         </style>
      <?php } /* case studies internal post */ elseif(is_singular('case-studies')) { ?>
         <style>
            .js div#preloader {
               background-color: #61A4EA; /* blue */
            }
            .js div#preloader .h-brand {
               background-position-y: -220px;
            }
         </style>
      <?php } /* blog/collective */ elseif(is_home()) { ?>
         <style>
            .js div#preloader {
               background-color: #78B97F; /* green */
            }
            .js div#preloader .h-brand {
               background-position-y: -220px;
            }
         </style>
      <?php } /* blog/collective internal post */ elseif(is_single()) { ?>
         <style>
            .js div#preloader {
               background-color: #78B97F; /* green */
            }
            .js div#preloader .h-brand {
               background-position-y: -220px;
            }
         </style>
      <?php } /* blog/collective category */ elseif(is_category()) { ?>
         <style>
            .js div#preloader {
               background-color: #78B97F; /* green */
            }
            .js div#preloader .h-brand {
               background-position-y: -220px;
            }
         </style>
      <?php } elseif(is_archive()) { ?>
         <style>
            .js div#preloader {
               background-color: #78B97F; /* green */
            }
            .js div#preloader .h-brand {
               background-position-y: -220px;
            }
         </style>
      <?php } elseif(is_page('strategy')) { ?>
         <style>
            .js div#preloader {
               background-color: #FCCDC6; /* pink */
            }
            .js div#preloader .h-brand {
               background-position-y: -220px;
            }
         </style>
      <?php } elseif(is_page('contact') || is_page('project-planner') ) { ?>
         <style>
            .js div#preloader {
               background-color: #F7D974; /* yellow */
            }
            .js div#preloader .h-brand {
               background-position-y: -220px;
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

      <script type="text/javascript">
         $(window).load(function(){
            setTimeout(function(){
               $('#preloader').fadeOut('slow',function(){$(this).remove();});
            },500);
         });
      </script>

   </head>
   <body <?php body_class(); ?>>

      <div id="preloader">
         <div class="h-brand">
         </div>
      </div>

   <?php if(!is_page('home') && !is_single() && !is_home()  && !is_archive()) { ?>
      <div class="menu">
         <?php get_template_part( 'partials/partial', 'mobile-menu' ); ?>
      </div>


      <div class="hero section big-cta isDarkGray">
         <div class="hero-header header-wrapper">
            <?php get_template_part( 'partials/partial', 'header-bar' ); ?>
         </div><!-- /.header-wrapper -->

         <?php if(is_page('culture')) { ?>
            <div class="hero-text section-heading vAlign">
               <h1 class="clrPop">Culture</h1>
               <span class="divWave"></span>
               <h3>A Crew of <br /><span class="italic">Creative</span> Doers.</h3>
            </div>

         <?php } elseif(is_page('strategy')) { ?>
            <div class="hero-text section-heading vAlign">
               <h1 class="clrPop">Strategy</h1>
               <span class="divWave"></span>
               <h3>Jacks of All Trades <br /><span class="italic">Experts</span> In All.</h3>
            </div>

         <?php } elseif(is_page('project-planner')) { ?>
            <div class="hero-text section-heading vAlign">
               <h1 class="clrPop">Project Planner</h1>
               <span class="divWave"></span>
               <h3>Let's Create <br />Something <span class="italic">Great</span>.</h3>
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


   <!-- Home page -->
   <?php } elseif(is_page('home')) { ?>
      <div class="menu">
         <?php get_template_part( 'partials/partial', 'mobile-menu' ); ?>
      </div>

      <div class="landing-section hero section big-cta">
         <div class="header-wrapper">
            <?php get_template_part( 'partials/partial', 'header-bar' ); ?>
         </div><!-- /.header-wrapper -->

         <div class="landing-hero hero-text section-heading vAlign">
            <h1 class="clrPop">Harbr</h1>
            <span class="divWave"></span>
            <h3>A <span class="italic">Digital</span> <br /> Creative Agency</h3>

            <a href="https://vimeo.com/1084537" class="video-play-btn primaryPop fancybox-video" data-width="1280" data-height="720">
               <i class="video-play-icon"></i>
            </a>
         </div>

         <div class="landing-overlay">
         </div>

         <video autoplay muted loop poster="<?php echo get_template_directory_uri(); ?>/img/section-bgs/landing-hero-bg.jpg" id="bgvid" data-stellar-ratio="0.5">
            <source src="http://crnt.co/wp-content/uploads/2015/05/LOOP_720.webm" type="video/webm">
            <source src="http://crnt.co/wp-content/uploads/2015/05/LOOP_720.mp4" type="video/mp4">
            <source src="http://crnt.co/wp-content/uploads/2015/05/LOOP_720.ogv" type="video/ogv">
         </video>

         <a href="#culture" class="downArrow wow slideInUp" data-wow-delay="1.25s"></a>
      </div>

      <div id="culture" class="hero section big-cta isDarkGray">
         <div class="hero-header header-wrapper">
            <?php get_template_part( 'partials/partial', 'header-bar' ); ?>
         </div><!-- /.header-wrapper -->

         <div class="hero-text section-heading vAlign">
            <h1 class="clrPop">Culture</h1>
            <span class="divWave"></span>
            <h3>A Crew of <br /><span class="italic">Creative</span> Doers.</h3>
         </div>

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


   <!-- Blog page -->
   <?php } elseif(is_home()) { ?>
      <div class="menu">
         <?php get_template_part( 'partials/partial', 'mobile-menu' ); ?>
      </div>

      <div class="hero section isDarkGray" style="background-image: url(<?php the_field('hero_background_image'); ?>);">
         <div class="medDarkOverlay">
         </div>
         <div class="hero-header header-wrapper">
            <?php get_template_part( 'partials/partial', 'header-bar' ); ?>
         </div><!-- /.header-wrapper -->

         <div class="hero-text section-heading vAlign">
         <?php $latestPost = new WP_Query( 'posts_per_page=1' );
            if ( $latestPost->have_posts() ) : while ( $latestPost->have_posts() ) : $latestPost->the_post(); ?>
               <div class="hero-text section-heading vAlign">
                  <h1 class="clrPop"><?php the_category(); ?></h1>
                  <span class="divWave"></span>
                  <h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
                  <div class="post-meta">
                     <span class="author"><?php _e( 'By', 'html5blank' ); ?> <?php the_author(); ?></span> &nbsp;<span class="clrPop">•</span>&nbsp; <span class="date"><?php the_time('F jS'); ?></span>
                  </div>
                  <a href="<?php the_permalink(); ?>" class="btn btn--uline" title="<?php the_title(); ?>">View Story</a>
               </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
         <?php endif; ?>
         </div>

         <!-- Scroll Down Button -->
         <?php if(!is_page('contact')) { ?>
            <a href="#scrollmain" class="downArrow wow slideInUp" data-wow-delay="1.25s"></a>
         <?php } ?>
      </div>

      <!-- Sticky Header Bar -->
      <div id="scrollmain" class="sticky-header-wrapper header-wrapper darkHeader">
         <div class="sticky-header">
            <?php get_template_part( 'partials/partial', 'header-bar' ); ?>
         </div>
      </div><!-- /.header-wrapper -->


   <!-- Archive Page -->
   <?php } elseif(is_archive()) { ?>
      <div class="menu">
         <?php get_template_part( 'partials/partial', 'mobile-menu' ); ?>
      </div>

      <!-- Sticky Header Bar -->
      <div id="scrollmain" class="sticky-header-wrapper header-wrapper darkHeader">
         <div class="sticky-header">
            <?php get_template_part( 'partials/partial', 'header-bar' ); ?>
         </div>
      </div><!-- /.header-wrapper -->



   <!-- Single Post page -->
   <?php } elseif(is_single()) { ?>
      <div class="header-wrapper">
         <?php get_template_part( 'partials/partial', 'single-post-header' ); ?>
      </div><!-- /.header-wrapper -->
   <?php } ?>
