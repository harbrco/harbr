<?php /* Template Name: Service Page */ get_header(); ?>

   <div class="menu-wrap">
      <?php get_template_part( 'partials/partial', 'main-menu' ); ?>
   </div>

   <div class="hero big-cta isDarkGray" style="background-image: url(<?php the_field('hero_background_image') ?>);">
      <div class="hero-header header-wrapper">
         <?php get_template_part( 'partials/partial', 'header-bar' ); ?>
      </div><!-- /.header-wrapper -->

      <div class="hero-text section-heading vAlign">
         <h1 class="clrPop">Branding</h1>
         <span class="divWave"></span>
         <h3><span class="italic">More</span> Than a Logo<br />It's Your <span class="italic">Identity</span>.</h3>
      </div>

      <a href="#scrollmain" class="downArrow wow slideInUp" data-wow-delay="1.25s"></a>
   </div>

   <!-- Sticky Header Bar -->
   <div id="scrollmain" class="sticky-header-wrapper header-wrapper">
      <div class="sticky-header">
         <?php get_template_part( 'partials/partial', 'header-bar' ); ?>
      </div>
   </div><!-- /.header-wrapper -->


   <div id="main" class="main-content section isWhite">

      <div id="branding-services" class="section-heading intro-section">
         <h1 class="clrPop">Branding Services</h1>
         <span class="divWave"></span>
         <h3>Here's a List of <br />Branding Things.</h3>
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
                     <img src="<?php the_sub_field('right_half_width_image'); ?>" />
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

            <?php endif; ?>

         <?php endwhile; ?>
      <?php endif; ?>
      </div>


      <div id="capabilities" class="section-heading intro-section">
         <h1 class="clrPop">Branding Work</h1>
         <span class="divWave"></span>
         <h3>Examples of Our<br /><span class="italic">Branding</span> Projects.</h3>
      </div>

      <div class="services-case-studies media-boxes wrapper section group">
         <?php
         $args = array(
            'post_type' => 'case-studies',
            'taxonomy' => 'case_study_type',
            'term' => 'design'
         );
         $caseStudiesQuery = new WP_Query( $args ); ?>
         <?php if ( $caseStudiesQuery->have_posts() ) : ?>
            <!-- the loop -->
            <?php while ( $caseStudiesQuery->have_posts() ) : $caseStudiesQuery->the_post(); ?>
            <div class="service-case-study col span_6_of_12">
               <div class="queried-case-study hoverZoomFade card card--sq wow fadeIn" data-wow-delay=".25s">
                  <div class="background-image" style="background-image: url(<?php the_field('featured_square') ?>);">
                  </div>
                  <div class="inner vAlign vAlign-abs">
                     <h3 class="clrPop">Case Study</h3>

                     <a href="<?php the_permalink(); ?>" class="case-study-title">
                        <h2><?php the_title(); ?></h2>
                     </a>

                     <a href="<?php the_permalink(); ?>" class="btn btn--uline">View Project</a>
                  </div>
               </div>
            </div>
            <?php endwhile; ?>
            <!-- end of the loop -->
         <?php wp_reset_postdata(); ?>
         <?php else: ?>
         <div class="no-posts">
            <h3>Sorry, there are no posts here.</h3>
         </div>
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


      <div class="next-page-cta big-cta isTertiary">
         <div id="project-planner" class="section-heading vAlign">
            <h1 class="clrPop">Design</h1>
            <span class="divWave"></span>
            <h3>This Will <span class="italic">Feature</span><br />A <span class="italic">Special</span> Headline.</h3>
            <a href="/project-planner/" class="btn btn--uline">Learn About Design</a>
         </div>
      </div>

   </div><!-- /.main-content -->

<?php get_footer(); ?>