<div id="main" class="section full-section isWhite">
   <!-- Sticky Header Bar -->
   <div id="scrollmain" class="sticky-header-wrapper header-wrapper">
      <div class="sticky-header">
         <?php get_template_part( 'partials/partial', 'header-bar' ); ?>
      </div>
   </div><!-- /.header-wrapper -->

   <div class="form-pagination">
      <div class="inner vAlign">
         <div class="dot dot-1"><a href="#step1"></a></div>
         <div class="dot dot-2"><a href="#step2"></a></div>
         <div class="dot dot-3"><a href="#step3"></a></div>
      </div>
   </div>

   <!-- <div class="darkOverlay">
   </div> -->

   <?php gravity_form(2, false, false, false, '', true, 10); ?>
</div>