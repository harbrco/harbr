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

   <?php } /* SHOP CART */ elseif ( is_page( 'cart' ) ) { ?>
      <?php get_template_part( 'partials/partial', 'shop-cart' ); ?>

   <?php } /* SHOP CHECKOUT */ elseif ( is_page( 'checkout' ) ) { ?>
      <?php get_template_part( 'partials/partial', 'shop-checkout' ); ?>

   <?php } /* GENERIC PAGES */ else { ?>

      <!-- section -->
      <section role="main">

         <h1><?php the_title(); ?></h1>

      <?php if (have_posts()): while (have_posts()) : the_post(); ?>

         <!-- article -->
         <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <?php the_content(); ?>

            <br class="clear">

            <?php edit_post_link(); ?>

         </article>
         <!-- /article -->

      <?php endwhile; ?>

      <?php else: ?>

         <!-- article -->
         <article>

            <h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>

         </article>
         <!-- /article -->

      <?php endif; ?>

      </section>
      <!-- /section -->

      <?php get_sidebar(); ?>

   <?php } ?>

<?php get_footer(); ?>