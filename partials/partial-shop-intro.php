<div id="main" class="section full-section isDarkGray">
   <div class="featured-products-wrapper wrapper">
   <?php if( have_rows('featured_product_slide') ): ?>
      <div class="featured-products">
      <?php while ( have_rows('featured_product_slide') ) : the_row(); ?>
         <div class="product-slide slide full-section" style="background-image: url(<?php the_sub_field('featured_product_image'); ?>);">
            <div class="featured-product-text">
               <a href="<?php the_sub_field('featured_product_url'); ?>">
                  <h2><?php the_sub_field('featured_product_title'); ?></h2>
                  <span class="btn btn--uline"><?php the_sub_field('featured_product_subtitle'); ?></span>
               </a>
            </div>
         </div>
      <?php endwhile; ?>
      </div>
   <?php endif; ?>
   </div>
</div>