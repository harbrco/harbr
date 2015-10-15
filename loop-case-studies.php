<?php if (have_posts()): while (have_posts()) : the_post(); ?>

   <article class="view-post-cta big-cta isDarkGray" style="background-image: url(<?php the_field('featured_full_width'); ?>);">
      <div class="medDarkOverlay">
      </div>
      <div class="section-heading vAlign">
         <h3 class="clrPop">Case Study</h3>
         <span class="divWave"></span>
         <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
         <a href="<?php the_permalink(); ?>" class="btn btn--uline">View Case Study</a>
      </div>

      <!-- Scroll Down Button -->
      <a href="#" class="downArrow next-post-section"></a>
   </article>

<?php endwhile; ?>

   <?php get_template_part('pagination'); ?>

   <?php else: ?>
<?php endif; ?>