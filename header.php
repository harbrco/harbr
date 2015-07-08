<!doctype html>
<html>
   <head>
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

   </head>
   <body <?php body_class(); ?>>

   <?php if(!is_page('home')) { ?>
      <div class="menu">
         <?php get_template_part( 'partials/partial', 'menu' ); ?>
      </div>


      <div class="hero section isDarkGray">
         <div class="hero-header header-wrapper">
            <?php get_template_part( 'partials/partial', 'header' ); ?>
         </div><!-- /.header-wrapper -->

         <div class="hero-text vAlign">
            <h1 class="clrPop">Culture</h1>
            <span class="divWave"></span>
            <h3>A Crew of <br /><span class="italic">Creative</span> Doers.</h3>
         </div>

         <a href="#scrollmain" class="downArrow"></a>
      </div>


      <div id="scrollmain" class="sticky-header-wrapper header-wrapper">
         <div class="sticky-header">
            <?php get_template_part( 'partials/partial', 'header' ); ?>
         </div>
      </div><!-- /.header-wrapper -->
   <?php } ?>