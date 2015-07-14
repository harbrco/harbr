<div id="main" class="main-content section isWhite">
   <div id="approach" class="section-heading intro-section">
      <h1 class="clrPop">Approach</h1>
      <span class="divWave"></span>
      <h3>There are a Couple Ways <br />To Skin a Cat.</h3>
   </div>

   <div class="approach-steps number-cards section group flexWrap">
      <div class="card col span_6_of_12">
         <div class="inner wow fadeInLeft" data-wow-delay=".25s">
            <span class="card-number clrPop">01</span>
            <h3 class="card-title sansBUpperSpc">Consult</h3>
            <p class="card-text">We aim to work with teams that deeply care about creating products that add meaning and value to people’s lives.</p>
         </div>
      </div>

      <div class="card col span_6_of_12">
         <div class="inner wow fadeInRight" data-wow-delay=".25s">
            <span class="card-number clrPop">02</span>
            <h3 class="card-title sansBUpperSpc">Plan</h3>
            <p class="card-text">We aim to work with teams that deeply care about creating products that add meaning and value to people’s lives.</p>
         </div>
      </div>

      <div class="card col span_6_of_12">
         <div class="inner wow fadeInLeft" data-wow-delay=".25s">
         <span class="card-number clrPop">03</span>
            <h3 class="card-title sansBUpperSpc">Architect</h3>
            <p class="card-text">We aim to work with teams that deeply care about creating products that add meaning and value to people’s lives.</p>
         </div>
      </div>

      <div class="card col span_6_of_12">
         <div class="inner wow fadeInRight" data-wow-delay=".25s">
            <span class="card-number clrPop">04</span>
            <h3 class="card-title sansBUpperSpc">Develop</h3>
            <p class="card-text">We aim to work with teams that deeply care about creating products that add meaning and value to people’s lives.</p>
         </div>
      </div>

      <div class="card col span_6_of_12">
         <div class="inner wow fadeInLeft" data-wow-delay=".25s">
            <span class="card-number clrPop">05</span>
            <h3 class="card-title sansBUpperSpc">Launch</h3>
            <p class="card-text">We aim to work with teams that deeply care about creating products that add meaning and value to people’s lives.</p>
         </div>
      </div>

      <div class="card col span_6_of_12">
         <div class="inner wow fadeInRight" data-wow-delay=".25s">
            <span class="card-number clrPop">06</span>
            <h3 class="card-title sansBUpperSpc">Maintain</h3>
            <p class="card-text">We aim to work with teams that deeply care about creating products that add meaning and value to people’s lives.</p>
         </div>
      </div>
   </div>


   <div id="hustle" class="section-heading">
      <h1 class="clrPop">Hustle</h1>
      <span class="divWave"></span>
      <h3>Finding Our Flow <br />On The Daily</h3>
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
                           <div class="slide">
                              <span class="slide-icon"></span>
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
                              <h3 class="clrPop">Case Study</h3>

                              <a href="<?php the_permalink(); ?>" class="case-study-title">
                                 <h2><?php the_title(); ?></h2>
                              </a>
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
