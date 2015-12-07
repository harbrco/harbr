<div id="main" class="section full-section isWhite">
   <!-- Sticky Header Bar -->
   <div id="scrollmain" class="sticky-header-wrapper header-wrapper">
      <div class="sticky-header">
         <?php get_template_part( 'partials/partial', 'header-bar' ); ?>
      </div>
   </div><!-- /.header-wrapper -->

   <?php if (have_posts()): while (have_posts()) : the_post(); ?>
      <div class="confirmation-content vAlign">
         <?php the_content(); ?>
      </div>
   <?php endwhile; ?>
   <?php endif; ?>

</div>