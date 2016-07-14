<?php get_header(); ?>

   <!-- PAGE SPECIFIC CONDITIONALS -->
   <?php /* STRATEGY */ if ( is_page( 'strategy' ) ) { ?>
      <?php get_template_part( 'partials/partial', 'strategy' ); ?>

   <?php } /* CONTACT */ elseif ( is_page( 'contact' ) ) { ?>
      <!-- CONTACT is populated only with "hero" content located in "header.php" -->

   <?php } /* 404 */ elseif ( is_page( 'error404' ) ) { ?>
      <!-- 404 is populated only with "hero" content located in "header.php" -->

   <?php } /* SHOP INTRO */ elseif ( is_page( 'shop-intro' ) ) { ?>
      <?php get_template_part( 'partials/partial', 'shop-intro' ); ?>

   <?php } /* SHOP CART */ elseif ( is_page( 'bag' ) ) { ?>
      <?php get_template_part( 'partials/partial', 'shop-cart' ); ?>

   <?php } /* SHOP CHECKOUT */ elseif ( is_page( 'checkout' ) ) { ?>
      <?php get_template_part( 'partials/partial', 'shop-checkout' ); ?>

   <?php } /* GENERIC PAGES */ else { ?>

      <div class="menu-wrap">
         <?php get_template_part( 'partials/partial', 'main-menu' ); ?>
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
         <section role="main" class="popSecondary">

            <div id="main" class="main-content section isWhite">
               <div id="values" class="section-heading intro-section">
                  <!-- <h1 class="clrPop">Values</h1> -->
                  <span class="divWave"></span>
                  <h3><?php the_title(); ?></h3>
               </div>
            </div>

            <!-- article -->
            <article id="post-<?php the_ID(); ?>" <?php post_class('container narrowContentSm isContentArea well well--noTop'); ?>>

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

   <?php } ?>

<?php get_footer(); ?>