<?php get_header(); ?>

<?php if ( !post_password_required() ) { ?>

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


      <div class="menu-wrap">
         <?php get_template_part( 'partials/partial', 'main-menu' ); ?>
      </div>

      <div class="hero big-cta isDarkGray" style="background-image: url(<?php the_field('hero_background_image') ?>);">
         <div class="hero-header header-wrapper">
            <?php get_template_part( 'partials/partial', 'header-bar' ); ?>
         </div><!-- /.header-wrapper -->

         <div class="hero-text section-heading vAlign">
               <h1 class="clrPop"><?php the_field('client_name'); ?></h1>
            <span class="divWave"></span>
            <h3><?php the_field('hero_large_text'); ?></h3>
         </div>

         <a href="#scrollmain" class="downArrow wow slideInUp" data-wow-delay="1.25s"></a>
      </div>

      <!-- Sticky Header Bar -->
      <div id="scrollmain" class="sticky-header-wrapper header-wrapper">
         <div class="sticky-header">
            <?php get_template_part( 'partials/partial', 'header-bar' ); ?>
         </div>
      </div><!-- /.header-wrapper -->


      <div id="main" class="main-content isContentArea section isWhite">

         <div id="proposal-breakdown" class="section-heading intro-section">
            <h1 class="clrPop"><?php the_field('section_heading_title'); ?></h1>
            <span class="divWave"></span>
            <h3><?php the_field('section_heading_descriptor'); ?></h3>
         </div>

         <div class="proposal-item-list number-cards section group flexWrap">
         <?php if( have_rows('proposal_item_card') ): ?>
            <?php while ( have_rows('proposal_item_card') ) : the_row(); ?>
               <div class="proposal-item card col span_12_of_12">
                  <div class="inner wow fadeInUp" data-wow-delay=".25s">
                     <h4 class="card-title sansBUpperSpc"><?php the_sub_field('proposal_item_title'); ?> &nbsp;|&nbsp; <span class="proposal-item-price">$<?php the_sub_field('proposal_item_price'); ?></span></h4>
                     <?php the_sub_field('proposal_item_description'); ?>
                  </div>
               </div>
            <?php endwhile; ?>
         <?php endif; ?>

         <?php if ( get_field('proposal_total_price') ){ ?>
            <div class="proposal-total card col span_12_of_12 isDarkGray">
               <div class="inner wow fadeInUp" data-wow-delay=".25s">
                  <h4 class="card-title sansBUpperSpc"><?php the_field('proposal_total_title'); ?> &nbsp;|&nbsp; <span class="proposal-item-price">$<?php the_field('proposal_total_price'); ?></span></h4>
                  <?php the_field('proposal_total_description'); ?>
               </div>
            </div>
         <?php } ?>
         </div>

         <div class="media-boxes">
         <?php if( have_rows('flexible_layouts') ): ?>
            <?php while ( have_rows('flexible_layouts') ) : the_row(); ?>
               <?php if( get_row_layout() == 'full-width-image' ): ?>
                  <div class="full-width-image wow fadeIn" data-wow-delay=".25s">
                     <img src="<?php the_sub_field('full_width_image'); ?>" />
                  </div>

               <?php elseif( get_row_layout() == 'two_halves_images' ): ?>
                  <div class="two-halves-images wrapper section group">
                     <div class="left-half-image col span_6_of_12">
                        <img src="<?php the_sub_field('left_half_width_image'); ?>" />
                     </div>

                     <div class="right-half-image col span_6_of_12">
                        <img src="<?php the_sub_field('right_half-width_image'); ?>" />
                     </div>
                  </div>

               <?php elseif( get_row_layout() == 'lg_sq_two_sm_sq' ): ?>
                  <div class="lg-sq-two-sm-sq section group">
                     <div class="col span_8_of_12">
                        <div class="lg-sq card card--sq wow fadeIn" style="background-image: url(<?php the_sub_field('large_square_image'); ?>);" data-wow-delay=".25s">
                        </div>
                     </div>

                     <div class="col span_4_of_12">
                        <div class="sm-sq card card--sq wow fadeIn" style="background-image: url(<?php the_sub_field('small_square_image_top'); ?>);" data-wow-delay=".25s">
                        </div>

                        <div class="sm-sq card card--sq wow fadeIn" style="background-image: url(<?php the_sub_field('small_square_image_bottom'); ?>);" data-wow-delay=".25s">
                        </div>
                     </div>
                  </div>

               <?php elseif( get_row_layout() == 'two_sm_sq_lg_sq' ): ?>
                  <div class="two-sm-sq-lg-sq section group">
                     <div class="col span_4_of_12">
                        <div class="sm-sq card card--sq wow fadeIn" style="background-image: url(<?php the_sub_field('small_square_image_top'); ?>);" data-wow-delay=".25s">
                        </div>

                        <div class="sm-sq card card--sq wow fadeIn" style="background-image: url(<?php the_sub_field('small_square_image_bottom'); ?>);" data-wow-delay=".25s">
                        </div>
                     </div>

                     <div class="col span_8_of_12">
                        <div class="lg-sq card card--sq wow fadeIn" style="background-image: url(<?php the_sub_field('large_square_image'); ?>);" data-wow-delay=".25s">
                        </div>
                     </div>
                  </div>

               <?php elseif( get_row_layout() == 'left_content_right_image' ): ?>
                  <div class="left-content-right-image wrapper flexWrap isSecondary section group">
                     <div class="left-content boxPadding col span_6_of_12">
                        <div class="inner vAlign">
                           <h3><?php the_sub_field('left_content_headline'); ?></h3>
                           <p><?php the_sub_field('left_content_text'); ?></p>
                        </div>
                     </div>

                     <div class="right-image col span_6_of_12">
                        <div class="inner" style="background-image: url(<?php the_sub_field('right_image'); ?>);">
                        </div>
                     </div>
                  </div>

               <?php elseif( get_row_layout() == 'single_column_content' ): ?>
                  <div class="single-column-content wrapper well isWhite">
                     <div class="container">
                        <div class="inner">
                           <h3><?php the_sub_field('single_col_headline'); ?></h3>
                           <?php the_sub_field('single_col_text'); ?>
                        </div>
                     </div>
                  </div>

               <?php elseif( get_row_layout() == 'divider_centered_content' ): ?>
               <!-- Text/Content Layouts -->
                  <div class="divider-centered-content wrapper well--s isWhite">
                     <div class="container">
                        <p><?php the_sub_field('centered_text'); ?></p>
                     </div>
                  </div>

               <?php endif; ?>

            <?php endwhile; ?>
         <?php endif; ?>
         </div>
      </div><!-- /.main-content -->



      <?php endwhile; ?>
      <?php endif; ?>


<?php } else { ?>
<!-- USER IS NOT LOGGED IN -->

   <?php if (have_posts()): while (have_posts()) : the_post(); ?>

      <div id="project-proposal-password-screen" class="main-content section full-section isDark">
         <div class="container vAlign">
            <div class="step-heading">
            <h3><?php the_field('client_name'); ?></h3>
            <h2>Let’s Get Started.</h2>
            </div>

            <div class="password-form">
               <?php echo my_password_form(); ?>
            </div>
         </div>
      </div><!-- /.main-content -->

   <?php endwhile; ?>
   <?php endif; ?>

<?php } ?>

<?php get_footer(); ?>