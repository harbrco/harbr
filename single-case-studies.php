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


         <!-- FLEXIBLE / CUSTOMIZABLE CONTENT LAYOUT SECTION -->
         <?php if( get_field('flexible_layouts') ): ?>
         <div class="isContentArea">
            <?php while ( has_sub_field('flexible_layouts') ) : ?>

               <!-- Text/Content Layouts -->
               <?php if( get_row_layout() == 'narrow_centered_content' ): ?>
                  <div class="narrow-centered-content wrapper well--xs isWhite">
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


               <!-- Image Gallery Layouts -->
               <?php elseif( get_row_layout() == 'img_gal_full_width' ): ?>
                  <div class="img-gal-full-width img-gal wrapper isWhite">
                     <div class="container">
                        <img src="<?php the_sub_field('full_width_image'); ?>" />
                     </div>
                  </div>

               <?php elseif( get_row_layout() == 'img_gal_halves' ): ?>
                  <div class="img-gal-halves img-gal wrapper isWhite">
                     <div class="container">
                        <div class="left-half-image">
                           <img src="<?php the_sub_field('left_half_image'); ?>" />
                        </div>

                        <div class="right-half-image">
                           <img src="<?php the_sub_field('right_half_image'); ?>" />
                        </div>
                     </div>
                  </div>

               <?php elseif( get_row_layout() == 'img_gal_60_40' ): ?>
                  <div class="img-gal-60-40 img-gal wrapper isWhite">
                     <div class="container">
                        <div class="left-60-image">
                           <img src="<?php the_sub_field('left_60_image'); ?>" />
                        </div>

                        <div class="right-40-image">
                           <img src="<?php the_sub_field('right_40_image'); ?>" />
                        </div>
                     </div>
                  </div>

               <?php elseif( get_row_layout() == 'img_gal_left_big_right_2stack' ): ?>
                  <div class="img-gal-left-big-right-2stack img-gal wrapper isWhite">
                     <div class="container">
                        <div class="left-big-image">
                           <div class="image" style="background-image: url(<?php the_sub_field('left_big_image') ?>);">
                           </div>
                        </div>

                        <div class="right-2stack-images">
                           <div class="image" style="background-image: url(<?php the_sub_field('right_stack_top_image') ?>);">
                           </div>
                           <div class="image" style="background-image: url(<?php the_sub_field('right_stack_bottom_image') ?>);">
                           </div>
                        </div>
                     </div>
                  </div>

               <?php elseif( get_row_layout() == 'img_gal_left_2stack_right_big' ): ?>
                  <div class="img-gal-left-2stack-right-big img-gal wrapper isWhite">
                     <div class="container">
                        <div class="left-2stack-images">
                           <div class="image" style="background-image: url(<?php the_sub_field('left_stack_top_image') ?>);">
                           </div>
                           <div class="image" style="background-image: url(<?php the_sub_field('left_stack_bottom_image') ?>);">
                           </div>
                        </div>

                        <div class="right-big-image">
                           <div class="image" style="background-image: url(<?php the_sub_field('right_big_image') ?>);">
                           </div>
                        </div>
                     </div>
                  </div>


               <!-- Feature Highlight Slider -->
               <?php elseif( get_row_layout() == 'feature_highlight_slider' ): ?>
                  <?php $sliderBgColor = get_sub_field('slider_background_color'); ?>

                  <div class="feature-highlight-slider-wrapper wrapper">
                  <?php if (get_sub_field('slider_background_color')) { ?>
                     <div class="feature-highlight-slider" style="background-color: #<?php echo $sliderBgColor; ?>;">
                  <?php } else { ?>
                     <div class="feature-highlight-slider" style="background-color: #<?php echo $brandColor; ?>;">
                  <?php } ?>
                     <?php if( have_rows('feature_highlight_slide') ): ?>
                     <?php while ( have_rows('feature_highlight_slide') ) : the_row(); ?>

                        <!-- Slide has a Phone image -->
                        <?php //if (get_sub_field('slide_image_type') == 'phone') { ?>
                           <?php //$slideImgType = "hasPhoneImage"; ?>
                        <!-- Slide has a Display/wide image -->
                        <?php //} else if (get_sub_field('slide_image_type') == 'display') { ?>
                           <?php //$slideImgType = "hasDisplayImage"; ?>
                        <?php //} ?>

                        <div class="slide" style="background-color: #<?php the_sub_field('slide_background_color'); ?>;">
                           <div class="flexWrap <?php //echo $slideImgType; ?> section group">
                              <div class="slide-text col span_5_of_12">
                                 <div class="inner vAlign">
                                    <h3><?php the_sub_field('slide_headline'); ?></h3>
                                    <p><?php the_sub_field('slide_text'); ?></p>
                                 </div>
                              </div>

                              <div class="slide-image col span_7_of_12">
                                 <img src="<?php the_sub_field('slide_image'); ?>" />
                              </div>
                           </div>
                        </div>

                     <?php endwhile; ?>
                     <?php endif; ?>
                     </div>
                  </div>


               <!-- Second Feature Highlight Slider -->
               <?php elseif( get_row_layout() == 'second_feature_highlight_slider' ): ?>
                  <?php $sliderBgColor = get_sub_field('slider_background_color'); ?>

                  <div class="second-feature-highlight-slider-wrapper wrapper">
                  <?php if (get_sub_field('slider_background_color')) { ?>
                     <div class="second-feature-highlight-slider" style="background-color: #<?php echo $sliderBgColor; ?>;">
                  <?php } else { ?>
                     <div class="second-feature-highlight-slider" style="background-color: #<?php echo $brandColor; ?>;">
                  <?php } ?>
                     <?php if( have_rows('second_feature_highlight_slide') ): ?>
                     <?php while ( have_rows('second_feature_highlight_slide') ) : the_row(); ?>

                        <div class="slide" style="background-color: #<?php the_sub_field('slide_background_color'); ?>;">
                           <div class="flexWrap <?php //echo $slideImgType; ?> section group">
                              <div class="slide-text col span_5_of_12">
                                 <div class="inner vAlign">
                                    <h3><?php the_sub_field('slide_headline'); ?></h3>
                                    <p><?php the_sub_field('slide_text'); ?></p>
                                 </div>
                              </div>

                              <div class="slide-image col span_7_of_12">
                                 <img src="<?php the_sub_field('slide_image'); ?>" />
                              </div>
                           </div>
                        </div>

                     <?php endwhile; ?>
                     <?php endif; ?>
                     </div>
                  </div>


               <!-- Text/Image Combo Layouts -->
               <?php elseif( get_row_layout() == 'full_width_image_centered_text' ): ?>
                  <div class="full-width-image-centered-text wrapper isDarkGray" style="background-image: url(<?php the_sub_field('section_background_image') ?>);">
                     <div class="darkOverlay">
                     </div>
                     <div class="container well--s well--noBottom">
                        <div class="text-wrapper">
                           <h3><?php the_sub_field('headline_text'); ?></h3>
                           <?php the_sub_field('paragraph_text'); ?>
                        </div>
                     </div>

                     <div class="fw-img" data-stellar-ratio="1.35">
                        <img src="<?php the_sub_field('full_width_image'); ?>" />
                     </div>
                  </div>

               <?php endif; ?>
            <?php endwhile; ?>

         </div>
         <?php else : ?>
            <!-- no layouts found -->
         <?php endif; ?>
         <!-- ENDS FLEXIBLE / CUSTOMIZABLE CONTENT LAYOUT SECTION -->


         <!-- Custom page specific sections -->
         <?php if (is_single('weatherbug')) { ?>
            <div class="weather-icons-wrapper wrapper well--s isDayTime">
               <div class="container">
                  <div class="text-wrapper">
                     <h3>Icons For Every Condition</h3>
                     <p>Weatherbug Web required responsive design that could scale to any device without compromising features and usability.</p>
                  </div>
                  <div class="centerBtn">
                     <a href="#" class="day-night-toggle"></a>
                  </div>

                  <div class="icons-wrapper section group">
                     <div class="icon-chunk-mobile icon-chunk col span_3_of_12">
                        <div class="icons-img-day">
                        </div>
                        <div class="icons-img-night">
                        </div>
                     </div>
                     <div class="icon-chunk-tablet icon-chunk col span_3_of_12">
                        <div class="icons-img-day">
                        </div>
                        <div class="icons-img-night">
                        </div>
                     </div>
                     <div class="icon-chunk-desktop icon-chunk col span_6_of_12">
                        <div class="icons-img-day">
                        </div>
                        <div class="icons-img-night">
                        </div>
                     </div>
                  </div>
               </div>
            </div>

            <script>
               // Share modal popups
               $('.weather-icons-wrapper').on('click', '.day-night-toggle', function(e) {
                 e.preventDefault();
                 $('.weather-icons-wrapper').toggleClass('isDayTime isNightTime');
               });

               var nightIcons = function() {
                  var iconChunkWidthM = $('.icon-chunk-mobile').width();
                  var negIconChunkWidthM = 0 - iconChunkWidthM;

                  var iconChunkWidthT = $('.icon-chunk-tablet').width();
                  var negIconChunkWidthT = 0 - iconChunkWidthT;

                  var iconChunkWidthD = $('.icon-chunk-desktop').width();
                  var negIconChunkWidthD = 0 - iconChunkWidthD;

                  $('.icon-chunk-mobile .icons-img-night').css('background-position-x', negIconChunkWidthM);
                  $('.icon-chunk-tablet .icons-img-night').css('background-position-x', negIconChunkWidthT);
                  $('.icon-chunk-desktop .icons-img-night').css('background-position-x', negIconChunkWidthD);
               };
               nightIcons();

               $(window).resize(function() {
                 nightIcons();
               }).resize();
            </script>
         <?php } ?>


         <?php if( have_rows('tools_used_slider') ): ?>
         <div class="tools-used-wrapper wrapper isDarkGray well--s well--noBottom">
            <div class="container">
                  <div class="tools-used-text tools-used-slider">
                  <?php while( have_rows('tools_used_slider') ): the_row(); ?>
                     <?php $toolUsed = get_sub_field('tool_used'); ?>
                     <?php
                        if ($toolUsed == 'sketch') {
                          $toolName = "Sketch App";
                          $toolIcon = "isSketch";
                        } elseif ($toolUsed == 'photoshop') {
                          $toolName = "Adobe Photoshop";
                          $toolIcon = "isPhotoshop";
                        } elseif ($toolUsed == 'illustrator') {
                          $toolName = "Adobe Illustrator";
                          $toolIcon = "isIllustrator";
                        } elseif ($toolUsed == 'invision') {
                          $toolName = "Invision";
                          $toolIcon = "isInvision";
                        } elseif ($toolUsed == 'sublime') {
                          $toolName = "Sublime Text";
                          $toolIcon = "isSublime";
                        } else {
                           // need to define a new tool?
                        }
                     ?>

                     <div class="slide">
                        <div class="text-wrapper isContentArea">
                           <h3><?php echo $toolName; ?></h3>
                           <p><?php the_sub_field('tool_explained'); ?></p>
                        </div>
                     </div>
                  <?php endwhile; ?>
                  </div><!-- /.tools-used-text-slider -->


               <div class="centerBtn">
                  <div class="tool-pager">
                     <?php $tool_slide_index = 0;  ?>
                     <?php while( have_rows('tools_used_slider') ): the_row(); ?>
                        <?php $toolUsed = get_sub_field('tool_used'); ?>
                        <?php
                           if ($toolUsed == 'sketch') {
                             $toolName = "Sketch App";
                             $toolIcon = "isSketch";
                           } elseif ($toolUsed == 'photoshop') {
                             $toolName = "Adobe Photoshop";
                             $toolIcon = "isPhotoshop";
                           } elseif ($toolUsed == 'illustrator') {
                             $toolName = "Adobe Illustrator";
                             $toolIcon = "isIllustrator";
                           } elseif ($toolUsed == 'invision') {
                             $toolName = "Invision";
                             $toolIcon = "isInvision";
                           } elseif ($toolUsed == 'sublime') {
                             $toolName = "Sublime Text";
                             $toolIcon = "isSublime";
                           } else {
                              // need to define a new tool?
                           }
                        ?>

                        <a data-slide-index="<?php echo $tool_slide_index; ?>" href=""><span class="tool-icon <?php echo $toolIcon; ?>"></span></a>
                        <?php $tool_slide_index++;  ?>
                     <?php endwhile; ?>
                  </div>
               </div>

               <div class="tools-used-images wow fadeInUp" data-wow-delay=".25s">
                  <div class="tools-used-slider">
                  <?php while( have_rows('tools_used_slider') ): the_row(); ?>
                     <div class="slide">
                        <?php if (get_sub_field('tool_image')) { ?>
                           <div class="tool-image" style="background-image: url(<?php the_sub_field('tool_image') ?>);">
                           </div>
                        <?php } ?>
                     </div>
                  <?php endwhile; ?>
                  </div>
               </div><!-- /.tools-used-image-slider -->

            </div>
         </div>
         <?php endif; ?>


         <!-- Social Share Modal -->
         <?php get_template_part( 'partials/partial', 'share-modal' ); ?>

      </article>
      <!-- /article -->

   <?php endwhile; ?>
   <?php endif; ?>

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

<?php get_footer(); ?>