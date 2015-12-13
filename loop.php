<?php if (have_posts()): while (have_posts()) : the_post(); ?>

      <article id="post-<?php the_ID(); ?>" <?php post_class('section view-post-cta big-cta isDarkGray'); ?> style="background-image: url(<?php the_field('hero_background_image'); ?>);">
         <div class="medDarkOverlay">
         </div>
         <div class="section-heading">
            <h3 class="clrPop"><?php the_category(); ?></h3>
            <span class="divWave"></span>
            <h1 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
            <div class="post-meta">
               <span class="author"><?php _e( 'By', 'html5blank' ); ?> <?php the_author(); ?></span> &nbsp;<span class="clrPop">•</span>&nbsp; <span class="date"><?php the_time('F jS'); ?></span>
            </div>
            <a href="<?php the_permalink(); ?>" class="btn btn--uline">View Post</a>
         </div>

         <!-- Scroll Down Button -->
         <a href="#" class="downArrow next-post-section"></a>
      </article>

<?php endwhile; ?>

   <?php get_template_part('pagination'); ?>

<?php else : ?>

   <article>
      <h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
   </article>

<?php endif; ?>
