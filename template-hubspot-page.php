<?php /* Template Name: Hubspot Page */ get_header(); ?>

<div class="menu-wrap">
   <?php get_template_part( 'partials/partial', 'main-menu' ); ?>
</div>

<div class="hero section big-cta isDarkGray" style="background-image: url(<?php the_field('hero_background_image') ?>);">
   <div class="hero-header header-wrapper">
      <?php get_template_part( 'partials/partial', 'header-bar' ); ?>
   </div><!-- /.header-wrapper -->

   <div class="hero-text section-heading vAlign">
      <!-- <h1 class="clrPop">Strategy</h1> -->
      <span class="divWave"></span>
      <h3><?php the_title(); ?></h3>
   </div>

   <!-- Scroll Down Button -->
   <a href="#scrollmain" class="downArrow wow slideInUp" data-wow-delay="1.25s"></a>
</div>

<!-- Sticky Header Bar -->
<div id="scrollmain" class="sticky-header-wrapper header-wrapper popSecondary">
   <div class="sticky-header">
      <?php get_template_part( 'partials/partial', 'header-bar' ); ?>
   </div>
</div><!-- /.header-wrapper -->

<?php if (have_posts()): while (have_posts()) : the_post(); ?>
<div id="main" class="main-content section isWhite">
   <!-- section -->
   <section role="main" class="container well">

      <!-- article -->
      <article id="post-<?php the_ID(); ?>" <?php post_class('inner narrowContentSm isContentArea'); ?>>

         <?php the_content(); ?>

      </article>
      <!-- /article -->
   </section>
   <!-- /section -->
</div>

<?php endwhile; ?>

<?php else: ?>

   <!-- article -->
   <article>

      <h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>

   </article>
   <!-- /article -->

<?php endif; ?>

<?php get_footer(); ?>