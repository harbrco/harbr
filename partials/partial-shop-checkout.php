<div id="main" class="main-content section isWhite">
   <div class="container">
      <?php if (have_posts()): while (have_posts()) : the_post(); ?>

         <?php the_content(); ?>

      <?php endwhile; endif; ?>
   </div>
</div>