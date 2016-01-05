<div id="main" class="main-content section isWhite">
   <div id="capabilities" class="section-heading intro-section">
      <h1 class="clrPop">Capabilities</h1>
      <span class="divWave"></span>
      <h3>Here's a List <br />Of Things We Do.</h3>
   </div>

   <div class="capabilities-list number-cards section group flexWrap">
   <?php if( have_rows('service_card') ): ?>
      <?php while ( have_rows('service_card') ) : the_row(); ?>
         <div class="card col span_6_of_12">
            <div class="inner wow fadeInUp" data-wow-delay=".25s">
               <span class="card-number clrPop"><?php the_sub_field('service_unit'); ?></span>
               <h3 class="card-title sansBUpperSpc"><?php the_sub_field('service_card_title'); ?></h3>
               <p class="card-text"><?php the_sub_field('service_card_text'); ?></p>
            </div>
         </div>
      <?php endwhile; ?>
   <?php endif; ?>
   </div>


   <?php if(get_field('left_image')) { ?>
      <div class="capabilities-approach-separator wrapper section group">
         <div class="left-half-image col span_6_of_12">
            <img src="<?php the_field('left_image'); ?>" />
         </div>

         <div class="right-half-image col span_6_of_12">
            <img src="<?php the_field('right_image'); ?>" />
         </div>
      </div>
   <?php } ?>


   <div id="approach" class="section-heading">
      <h1 class="clrPop">Approach</h1>
      <span class="divWave"></span>
      <h3>There's a Few Ways <br />To Skin a Cat.</h3>
   </div>

   <div class="approach-steps number-cards section group flexWrap">
   <?php if( have_rows('number_card') ): ?>
      <?php while ( have_rows('number_card') ) : the_row(); ?>
         <div class="card col span_6_of_12">
            <div class="inner wow fadeInUp" data-wow-delay=".25s">
               <span class="card-number clrPop"><?php the_sub_field('number_unit'); ?></span>
               <h3 class="card-title sansBUpperSpc"><?php the_sub_field('number_card_title'); ?></h3>
               <p class="card-text"><?php the_sub_field('number_card_text'); ?></p>
            </div>
         </div>
      <?php endwhile; ?>
   <?php endif; ?>
   </div>


   <?php if( have_rows('left_image') ): ?>
      <?php while ( have_rows('left_image') ) : the_row(); ?>
         <div class="card col span_6_of_12">
            <div class="inner wow fadeInUp" data-wow-delay=".25s">
               <span class="card-number clrPop"><?php the_sub_field('number_unit'); ?></span>
               <h3 class="card-title sansBUpperSpc"><?php the_sub_field('number_card_title'); ?></h3>
               <p class="card-text"><?php the_sub_field('number_card_text'); ?></p>
            </div>
         </div>
      <?php endwhile; ?>
   <?php endif; ?>


   <div id="hustle" class="section-heading">
      <h1 class="clrPop">Hustle</h1>
      <span class="divWave"></span>
      <h3>Finding Our Flow <br />On The Daily.</h3>
   </div>

   <div class="media-boxes">
      <?php if( have_rows('flexible_layouts') ): ?>
         <?php while ( have_rows('flexible_layouts') ) : the_row(); ?>
            <?php if( get_row_layout() == 'full-width-image' ): ?>
               <div class="full-width-image wow fadeIn" data-wow-delay=".25s">
                  <img src="<?php the_sub_field('full_width_image'); ?>" />
               </div>

            <?php elseif( get_row_layout() == 'stat_slider_lg_sq_sm_sq' ): ?>
               <div class="stat-slider-lg-sq-sm-sq section group">
                  <div class="col span_8_of_12">
                     <div class="card card--sq wow fadeIn" style="background-image: url(<?php the_sub_field('large_square_image'); ?>);" data-wow-delay=".25s">
                     </div>
                  </div>

                  <div class="col span_4_of_12">
                     <div class="stat-slider-wrapper isTertiary wow fadeIn" data-wow-delay=".25s">
                        <div class="stat-slider card card--sq">
                        <?php if( have_rows('stat_slide') ): ?>
                           <?php while ( have_rows('stat_slide') ) : the_row(); ?>
                           <?php
                              if (get_sub_field('stat_type') == "music") { $slideIconType = "isMusic"; }
                              elseif (get_sub_field('stat_type') == "code") { $slideIconType = "isCode"; }
                              elseif (get_sub_field('stat_type') == "design") { $slideIconType = "isDesign"; }
                              elseif (get_sub_field('stat_type') == "pizza") { $slideIconType = "isPizza"; }
                              elseif (get_sub_field('stat_type') == "beer") { $slideIconType = "isBeer"; }
                           ?>

                           <div class="slide">
                              <span class="slide-icon <?php echo $slideIconType; ?>"></span>
                              <h3><?php the_sub_field('stat_headline'); ?></h3>
                              <p><?php the_sub_field('stat_text'); ?></p>
                           </div>
                           <?php endwhile; ?>
                        <?php endif; ?>
                        </div>

                        <div class="next-stat next-slide"></div>
                     </div>

                     <div class="sm-sq card card--sq wow fadeIn" style="background-image: url(<?php the_sub_field('small_square_image'); ?>);" data-wow-delay=".25s">
                     </div>
                  </div>
               </div>

            <?php elseif( get_row_layout() == 'quote_slider_sm_sq' ): ?>
               <div class="quote-slider-sm-sq section group">
                  <div class="col span_4_of_12">
                     <div class="quote-slider-wrapper isDarkGray wow fadeIn" data-wow-delay=".25s">
                        <div class="quote-slider card card--sq">
                        <?php if( have_rows('quote_slide') ): ?>
                           <?php while ( have_rows('quote_slide') ) : the_row(); ?>
                              <div class="slide">
                                 <span class="slide-icon"></span>
                                 <p class="quote-text">“<?php the_sub_field('quote_text'); ?>”</p>
                                 <p class="quote-author">– <?php the_sub_field('quote_author'); ?></p>
                              </div>
                           <?php endwhile; ?>
                        <?php endif; ?>
                        </div>

                        <div class="next-quote next-slide"></div>
                     </div>

                     <div class="sm-sq card card--sq wow fadeIn" style="background-image: url(<?php the_sub_field('small_square_image'); ?>);" data-wow-delay=".25s">
                     </div>
                  </div>

                  <div class="col span_8_of_12">
                     <?php
                     $args = array(
                        'post_type' => 'case-studies',
                        'posts_per_page' => 1
                     );
                     $caseStudiesQuery = new WP_Query( $args ); ?>
                     <?php if ( $caseStudiesQuery->have_posts() ) : ?>
                     <div class="featured-case-study-wrapper">
                        <!-- the loop -->
                        <?php while ( $caseStudiesQuery->have_posts() ) : $caseStudiesQuery->the_post(); ?>
                        <div class="featured-case-study hoverZoomFade card card--sq wow fadeIn" data-wow-delay=".25s">
                           <div class="background-image" style="background-image: url(<?php the_field('featured_square') ?>);">
                           </div>
                           <div class="inner vAlign vAlign-abs">
                              <h3 class="clrPop">Case Studies</h3>

                              <a href="/case-studies/" class="case-study-title">
                                 <h2>Our Recent Work</h2>
                              </a>

                              <a href="/case-studies/" class="btn btn--uline">View All</a>
                           </div>
                        </div>
                        <?php endwhile; ?>
                        <!-- end of the loop -->
                     </div>
                     <?php wp_reset_postdata(); ?>
                     <?php else: ?>
                     <div class="no-posts">
                        <h3>Sorry, there are no posts here.</h3>
                     </div>
                     <?php endif; ?>
                  </div>
               </div>

            <?php endif; ?>
         <?php endwhile; ?>
      <?php endif; ?>
   </div>


   <div class="next-page-cta big-cta isQuaternary">
      <div id="project-planner" class="section-heading vAlign">
         <h1 class="clrPop">Project Planner</h1>
         <span class="divWave"></span>
         <h3>We're Accepting <br /><span class="italic">Projects</span> Today.</h3>
         <a href="/project-planner/" class="btn btn--uline">Get Started</a>
      </div>
   </div>
</div>
