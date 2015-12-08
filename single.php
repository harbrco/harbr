<?php get_header(); ?>

   <?php if (have_posts()): while (have_posts()) : the_post(); ?>

      <!-- article -->
      <article id="post-<?php the_ID(); ?>" <?php post_class('popSecondary'); ?>>

         <div <?php post_class('post-hero view-post-cta big-cta isDarkGray'); ?> style="background-image: url(<?php the_field('hero_background_image'); ?>);">
            <div class="medDarkOverlay">
            </div>

            <div class="header-wrapper">
               <?php get_template_part( 'partials/partial', 'single-post-header' ); ?>
            </div><!-- /.header-wrapper -->

            <div class="section-heading vAlign">
               <h3 class="clrPop"><?php the_category(); ?></h3>
               <span class="divWave"></span>
               <h1 class="post-title"><?php the_title(); ?></h1>
               <div class="post-meta">
                  <span class="author"><?php _e( 'By', 'html5blank' ); ?> <?php the_author(); ?></span> &nbsp;<span class="clrPop">•</span>&nbsp; <span class="date"><?php the_time('F jS'); ?></span>
               </div>
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

            <?php if(get_field('post_intro_text')) { ?>
            <div class="isContentArea wrapper">
               <div class="single-column-content wrapper well isWhite">
                  <div class="container">
                     <div class="inner">
                        <h2><?php the_field('post_intro_heading'); ?></h2>
                        <?php the_field('post_intro_text'); ?>
                     </div>
                  </div>
               </div>
            </div>
            <?php } ?>


            <!-- FLEXIBLE / CUSTOMIZABLE CONTENT LAYOUT SECTION -->
            <?php if( get_field('flexible_layouts') ): ?>
            <div class="isContentArea">
               <?php while ( has_sub_field('flexible_layouts') ) : ?>
                  <?php if( get_row_layout() == 'left_content_right_image' ): ?>
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

                  <?php elseif( get_row_layout() == 'quote_block_section' ): ?>
                     <div class="quote-block-section wrapper flexWrap isSecondary section group">
                        <div class="left-content boxPadding col span_6_of_12">
                           <div class="inner vAlign">
                              <h4 class="quote-text">“<?php the_sub_field('quote_text'); ?>”</h4>
                              <p class="quote-author-name">– <?php the_sub_field('quote_author_name'); ?></p>
                              <p class="quote-author-title"><?php the_sub_field('quote_author_title'); ?></p>
                           </div>
                        </div>

                        <div class="right-image col span_6_of_12">
                           <div class="inner" style="background-image: url(<?php the_sub_field('quote_image'); ?>);">
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

                  <?php elseif( get_row_layout() == 'full_width_image_video' ): ?>
                     <div class="full-width-image-video wrapper isDarkGray">
                        <?php if(get_sub_field('video_section')) { ?>
                           <a href="<?php the_sub_field('video_url'); ?>" class="video-play-btn fancybox-video" data-width="1280" data-height="720">
                              <i class="video-play-icon"></i>
                           </a>
                           <div class="video-overlay overlay50">
                           </div>
                        <?php } ?>
                        <img src="<?php the_sub_field('full_width_image'); ?>" />
                     </div>

                  <?php endif; ?>
               <?php endwhile; ?>

            </div>
            <?php else : ?>
               <!-- no layouts found -->
            <?php endif; ?>
            <!-- ENDS FLEXIBLE / CUSTOMIZABLE CONTENT LAYOUT SECTION -->


            <?php $prevPost = get_previous_post(); ?>
            <?php $prevPostID = $prevPost->ID; ?>
            <?php $author_id = get_post_field ('post_author', $prevPostID); ?>
            <?php $authorName = get_the_author_meta( 'display_name', $author_id ); ?>
            <?php $category = get_the_category( $prevPostID ); ?>
            <?php if($prevPost) { ?>

               <article class="view-post-cta big-cta isDarkGray popSecondary" style="background-image: url(<?php the_field('hero_background_image', $prevPostID) ?>);">
                  <div class="medDarkOverlay">
                  </div>
                  <div class="section-heading vAlign">
                     <h3 class="clrPop"><?php echo $category[0]->cat_name; ?></h3>
                     <span class="divWave"></span>
                     <h1><a href="<?php echo get_permalink( $prevPost->ID ); ?>"><?php echo $prevPost->post_title; ?></a></h1>
                     <div class="post-meta">
                        <span class="author"><?php _e( 'By', 'html5blank' ); ?> <?php echo $authorName; ?></span> &nbsp;<span class="clrPop">•</span>&nbsp; <span class="date"><?php the_time('F jS'); ?></span>
                     </div>

                     <a href="<?php echo get_permalink( $prevPost->ID ); ?>" class="btn btn--uline">View Story</a>
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