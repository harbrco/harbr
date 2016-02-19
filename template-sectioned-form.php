<?php /* Template Name: Sectioned Form */ get_header(); ?>

<div id="main" class="main-content isWhite">
   <div class="form-pagination">
      <div class="inner vAlign">
         <div class="dot dot-1"><a href="#step1"></a></div>
         <div class="dot dot-2"><a href="#step2"></a></div>
         <div class="dot dot-3"><a href="#step3"></a></div>
      </div>
   </div>

   <?php $formID = get_field('gravity_form_id'); ?>

   <?php gravity_form($formID, false, false, false, '', true, 10); ?>
</div>

<?php get_footer(); ?>