<div id="main" class="section full-section isDarkGray">
   <div class="featured-products-wrapper wrapper">
   <?php if( have_rows('featured_product_slide') ): ?>
      <div class="featured-products">
      <?php while ( have_rows('featured_product_slide') ) : the_row(); ?>
      <?php
         $featuredProduct = get_sub_field('featured_product');

         if( $featuredProduct ):
            // override $post
            $post = $featuredProduct;
            setup_postdata( $post );
         ?>
         <div class="product-slide slide full-section" style="background-image: url(<?php the_sub_field('featured_product_image'); ?>);">
            <div class="featured-product-text">
               <a href="<?php the_permalink(); ?>">
                  <h2><?php the_title(); ?></h2>
                  <span class="btn btn--uline">Check it out</span>
               </a>
            </div>
         </div>
      <?php wp_reset_postdata(); ?>
      <?php endif; ?>

      <?php endwhile; ?>
      </div>
   <?php endif; ?>
   </div>
</div>