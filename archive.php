<?php get_header(); ?>

   <div class="post-feed-wrapper">

      <div class="section-heading">
         <h3 class="clrPop">Archives</h3>
         <span class="divWave"></span>
         <h1><?php single_month_title(' '); ?> </h1>
      </div>

      <!-- section -->
      <section class="scroll-wrap" role="main">
         <?php get_template_part('loop'); ?>
      </section>
      <!-- /section -->

   </div><!-- /.post-feed-wrapper -->

<?php get_footer(); ?>