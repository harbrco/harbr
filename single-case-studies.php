<?php get_header(); ?>

   <!-- Convert HEX to RGB -->
   <?php
      function hex2rgb($hex) {
         $hex = str_replace("#", "", $hex);

         if(strlen($hex) == 3) {
            $r = hexdec(substr($hex,0,1).substr($hex,0,1));
            $g = hexdec(substr($hex,1,1).substr($hex,1,1));
            $b = hexdec(substr($hex,2,1).substr($hex,2,1));
         } else {
            $r = hexdec(substr($hex,0,2));
            $g = hexdec(substr($hex,2,2));
            $b = hexdec(substr($hex,4,2));
         }
         $rgb = array($r, $g, $b);
         return implode(",", $rgb); // returns the rgb values separated by commas
         //return $rgb; // returns an array with the rgb values
      }

      $rgb = hex2rgb($brandColor);
   ?>

   <?php if (have_posts()): while (have_posts()) : the_post(); ?>

      <?php $brandColor = get_field('brand_color'); ?>

      <!-- article -->
      <article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>

         <div class="post-hero hero view-post-cta big-cta isDarkGray" style="background-color: #<?php echo $brandColor; ?>;">
            <div class="header-wrapper">
               <?php get_template_part( 'partials/partial', 'single-post-header' ); ?>
            </div><!-- /.header-wrapper -->

            <div class="hero-text section-heading vAlign">
               <h3 class="clrPop">Case Study</h3>
               <span class="divWave"></span>
               <h1><?php the_title(); ?></h1>
            </div>
            <div class="hero-highlight-image" style="background-image: url(<?php the_field('hero_highlight_image') ?>);">
            </div>
         </div>

         <div class="post-hero-spacer">
         </div>

         <div class="belowHero">

            <div id="scrollmain" class="float-post-header-wrapper dark-btns sticky-header-wrapper">
               <div class="sticky-header">
                  <?php get_template_part( 'partials/partial', 'single-post-header' ); ?>
               </div>
            </div>


            <div class="isContentArea">
            <!-- FLEXIBLE / CUSTOMIZABLE CONTENT LAYOUT SECTION -->
            <?php if( get_field('flexible_layouts') ): ?>
               <?php while ( has_sub_field('flexible_layouts') ) : ?>

                  <?php if( get_row_layout() == 'narrow_centered_content' ): ?>
                  <!-- Text/Content Layouts -->
                     <div class="narrow-centered-content wrapper well--xs well--noBottom isWhite">
                        <div class="container">
                           <h2><?php the_sub_field('headline'); ?></h2>
                           <?php the_sub_field('centered_text'); ?>
                        </div>
                     </div>

                  <?php elseif( get_row_layout() == 'img_gal_intro_text' ): ?>
                     <div class="img-gal-intro-text wrapper well--s well--noBottom isWhite">
                        <div class="container text-wrapper">
                           <h3><?php the_sub_field('gallery_headline'); ?></h3>
                           <p><?php the_sub_field('gallery_description'); ?></p>
                        </div>
                     </div>


                  <?php elseif( get_row_layout() == 'img_gal_full_width' ): ?>
                  <!-- Image Gallery Layouts -->
                     <?php
                     $topMargin = '';
                     $bottomMargin = '';

                     if(get_sub_field('row_is_first_in_section')) {
                        $topMargin = 'top-margin';
                     }
                     if(get_sub_field('row_is_last_in_section')) {
                        $bottomMargin = 'bottom-margin';
                     }
                     ?>

                     <div class="img-gal-full-width img-gal wrapper isWhite <?php echo $topMargin ?> <?php echo $bottomMargin ?>">
                        <div class="container">
                           <img src="<?php the_sub_field('full_width_image'); ?>" />
                        </div>
                     </div>

                  <?php elseif( get_row_layout() == 'img_gal_halves' ): ?>
                     <?php
                     $topMargin = '';
                     $bottomMargin = '';

                     if(get_sub_field('row_is_first_in_section')) {
                        $topMargin = 'top-margin';
                     }
                     if(get_sub_field('row_is_last_in_section')) {
                        $bottomMargin = 'bottom-margin';
                     }
                     ?>

                     <div class="img-gal-halves img-gal wrapper isWhite <?php echo $topMargin ?> <?php echo $bottomMargin ?>">
                        <div class="container">
                           <div class="left-half-image">
                              <img src="<?php the_sub_field('left_half_image'); ?>" />
                           </div>

                           <div class="right-half-image">
                              <img src="<?php the_sub_field('right_half_image'); ?>" />
                           </div>
                        </div>
                     </div>



                  <?php elseif( get_row_layout() == 'full_width_image_centered_text' ): ?>
                  <!-- Text/Image Combo Layouts -->
                     <div class="full-width-image-centered-text wrapper isDarkGray" style="background-image: url(<?php the_sub_field('section_background_image') ?>); background-color: #<?php echo $brandColor; ?>;">
                        <?php //if (get_sub_field('section_background_image')) { ?>
                        <!-- <div class="darkOverlay">
                        </div> -->
                        <?php //} ?>
                        <div class="container well--s well--noBottom">
                           <div class="text-wrapper">
                              <h3><?php the_sub_field('headline_text'); ?></h3>
                              <?php the_sub_field('paragraph_text'); ?>
                           </div>
                        </div>

                        <div class="fw-img">
                           <img src="<?php the_sub_field('full_width_image'); ?>" />
                        </div>

                        <!-- <div class="fw-img" data-stellar-ratio="1.35">
                           <img src="<?php //the_sub_field('full_width_image'); ?>" />
                        </div> -->
                     </div>



                  <?php elseif( get_row_layout() == 'divider_centered_content' ): ?>
                  <!-- Text/Content Layouts -->
                     <div class="divider-centered-content wrapper well--s isWhite">
                        <div class="container">
                           <p><?php the_sub_field('centered_text'); ?></p>
                        </div>
                     </div>



                  <?php elseif( get_row_layout() == 'feature_highlight_slider' ): ?>
                  <div class="feat-highlight-wrapper wrapper isDarkGray">
                     <div class="centerBtn">
                        <div class="feat-slide-pager">
                           <?php $feat_slide_index = 0;  ?>
                           <?php while( have_rows('feature_highlight_slide') ): the_row(); ?>
                              <div class="bx-pager-item">
                                 <a data-slide-index="<?php echo $feat_slide_index; ?>" href=""></a>
                              </div>
                              <?php $feat_slide_index++;  ?>
                           <?php endwhile; ?>
                        </div>
                     </div>

                     <div class="feat-slide-text feat-highlight-slider" style="background-color: #<?php echo $brandColor; ?>;">
                     <?php while( have_rows('feature_highlight_slide') ): the_row(); ?>
                        <div class="slide well--s well--noBottom" style="background-image: url(<?php the_sub_field('slide_background_image') ?>); background-color: #<?php the_sub_field('slide_background_color'); ?>;">
                           <div class="container">
                              <?php if (get_sub_field('slide_headline')) { ?>
                                 <div class="text-wrapper isContentArea">
                                    <h3><?php the_sub_field('slide_headline'); ?></h3>
                                    <p><?php the_sub_field('slide_text'); ?></p>
                                 </div>
                              <?php } ?>

                              <?php if (get_sub_field('slide_image')) { ?>
                                 <div class="slide-image">
                                    <img src="<?php the_sub_field('slide_image') ?>" alt="">
                                 </div>
                              <?php } ?>
                           </div>

                        </div>
                     <?php endwhile; ?>
                     </div><!-- /.feat-highlight-slider -->
                  </div>

                  <?php endif; ?>
               <?php endwhile; ?>

            <?php else : ?>
               <!-- no layouts found -->
            <?php endif; ?>
            <!-- ENDS FLEXIBLE / CUSTOMIZABLE CONTENT LAYOUT SECTION -->
            </div>




            <?php $prevPost = get_previous_post(); ?>
            <?php $prevPostID = $prevPost->ID; ?>
            <?php $category = get_the_category( $prevPostID ); ?>
            <?php if($prevPost) { ?>

               <?php $brandColor = get_field('brand_color', $prevPost->ID); ?>

               <article class="view-post-cta prev-cs big-cta isDarkGray popSecondary" style="background-color: #<?php echo $brandColor; ?>;">
                  <div class="section-heading vAlign">
                     <h3 class="clrPop">Case Study</h3>
                     <span class="divWave"></span>
                     <h1><a href="<?php echo get_permalink( $prevPost->ID ); ?>"><?php echo $prevPost->post_title; ?></a></h1>

                     <a href="<?php echo get_permalink( $prevPost->ID ); ?>" class="btn btn--uline">View Case Study</a>
                  </div>
               </article>
            <?php } ?>

         </div><!-- /.belowHero -->

      </article>
      <!-- /article -->

   <?php endwhile; ?>
   <?php endif; ?>


   <!-- Social Share Modal -->
   <?php get_template_part( 'partials/partial', 'share-modal' ); ?>

<?php get_footer(); ?>
