<div id="main" class="main-content section isWhite">
   <div id="values" class="section-heading intro-section">
      <h1 class="clrPop">Values</h1>
      <span class="divWave"></span>
      <h3>It's Not a Job, <br />It's a Lifestyle</h3>
   </div>

   <div class="core-values number-cards section group flexWrap">
      <div class="card col span_6_of_12">
         <div class="inner wow fadeInLeft" data-wow-delay=".25s">
            <span class="card-number clrPop">01</span>
            <h3 class="card-title sansBUpperSpc">Build</h3>
            <p class="card-text">We aim high at being focused on building relationships with our clients and community as well as impact them with our creative gifts.</p>
         </div>
      </div>

      <div class="card col span_6_of_12">
         <div class="inner wow fadeInRight" data-wow-delay=".25s">
            <span class="card-number clrPop">02</span>
            <h3 class="card-title sansBUpperSpc">Humble</h3>
            <p class="card-text">Working together on the daily requires each individual to let the greater good of the team’s work surface above their own ego.</p>
         </div>
      </div>

      <div class="card col span_6_of_12">
         <div class="inner wow fadeInLeft" data-wow-delay=".25s">
         <span class="card-number clrPop">03</span>
            <h3 class="card-title sansBUpperSpc">Focus</h3>
            <p class="card-text">It’s important to stay detail oriented with every project we tackle. Staying focused allows us to turn every project we complete into something we love.</p>
         </div>
      </div>

      <div class="card col span_6_of_12">
         <div class="inner wow fadeInRight" data-wow-delay=".25s">
            <span class="card-number clrPop">04</span>
            <h3 class="card-title sansBUpperSpc">Change</h3>
            <p class="card-text">We strive to embrace and drive change in our industry which allows us to keep our clients relevant and ready to adapt.</p>
         </div>
      </div>
   </div>


   <div id="crew" class="section-heading">
      <h1 class="clrPop">Crew</h1>
      <span class="divWave"></span>
      <h3>Meet Your Creative <br />Geek Squad</h3>
   </div>

   <div class="crew-members crew-cards section group">
   <?php if( have_rows('crew_member') ): ?>
      <?php while ( have_rows('crew_member') ) : the_row(); ?>
         <div class="crew-member card col span_4_of_12 wow fadeIn" style="background-image: url(<?php the_sub_field('crew_member_photo'); ?>);" data-wow-delay=".25s">
            <div class="crew-text">
               <h3 class="crew-name"><?php the_sub_field('crew_member_name'); ?></h3>
               <h4 class="crew-title"><?php the_sub_field('crew_member_title'); ?></h4>
            </div>
         </div>
      <?php endwhile; ?>
   <?php endif; ?>
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
                     <div class="stat-slider-wrapper isPrimary wow fadeIn" data-wow-delay=".25s">
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


   <div class="next-page-cta big-cta isTertiary">
      <div id="strategy" class="section-heading vAlign">
         <h1 class="clrPop">Strategy</h1>
         <span class="divWave"></span>
         <h3>Jacks of All Trades <br /><span class="italic">Experts</span> In All.</h3>
         <a href="/strategy/" class="btn btn--uline">View Our Strategy</a>
      </div>
   </div>
</div>
