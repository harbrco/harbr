<div id="main" class="section full-section isDarkGray">
   <!-- Sticky Header Bar -->
   <div id="scrollmain" class="sticky-header-wrapper header-wrapper">
      <div class="sticky-header">
         <?php get_template_part( 'partials/partial', 'header-bar' ); ?>
      </div>
   </div><!-- /.header-wrapper -->

   <div class="darkOverlay">
   </div>

   <?php gravity_form(1, false, false, false, '', true, 10); ?>
</div>