<?php get_header(); ?>

<div class="menu-links-wrapper">
   <div class="littleLinksBefore littleLinks">

      <!-- These links also need to be updated in page-home.php -->

      <ul id="pagination">
         <li style="width: 0; height: 0;" data-menuanchor="landing">
            <a href="#landing" style="opacity: 0;"> </a>
         </li>
         <li data-menuanchor="get-to-know-us">
            <a href="#get-to-know-us">Get To Know Us</a>
            <span class="divWave"></span>
         </li>
         <li data-menuanchor="our-strategic-vision">
            <a href="#our-strategic-vision">Our Strategic Vision</a>
            <span class="divWave"></span>
         </li>
         <li data-menuanchor="explore-the-latest">
            <a href="#explore-the-latest">Explore The Latest</a>
            <span class="divWave"></span>
         </li>
         <li data-menuanchor="reach-out-to-us">
            <a href="#reach-out-to-us">Reach Out To Us</a>
            <span class="divWave"></span>
         </li>
      </ul>
   </div>
   <div class="bigLinks">
      <ul>
         <li>
            <a href="#" style="opacity: 0;"> </a>
         </li>
         <li>
            <a href="/culture/">Get To Know Us</a>
         </li>
         <li>
            <a href="/strategy/">Our Strategic Vision</a>
         </li>
         <li>
            <a href="/collective/">Explore The Latest</a>
         </li>
         <li>
            <a href="/contact/">Reach Out To Us</a>
         </li>
         <li>
            <a href="/project-planner/">Let's Build Something</a>
         </li>
      </ul>
   </div>
   <div class="littleLinksAfter littleLinks">
      <ul id="pagination">
         <li data-menuanchor="our-strategic-vision">
            <span class="divWave"></span>
            <a href="#our-strategic-vision">Our Strategic Vision</a>
         </li>
         <li data-menuanchor="explore-the-latest">
            <span class="divWave"></span>
            <a href="#explore-the-latest">Explore The Latest</a>
         </li>
         <li data-menuanchor="reach-out-to-us">
            <span class="divWave"></span>
            <a href="#reach-out-to-us">Reach Out To Us</a>
         </li>
         <li data-menuanchor="lets-build-something">
            <span class="divWave"></span>
            <a href="#lets-build-something">Let's Build Something</a>
         </li>
      </ul>
   </div>
</div><!-- /.menu-links-wrapper -->

<div id="landing-menu" class="main-menu">
   <div id="section0" class="landing-section section" data-anchor="landing">
      <!-- <div class="top-overlay overlay">
      </div>
      <div class="h-brand vAlign">
         <div class="inner">
            <h1 style="margin-top: 0;">h logo</h1>
            <h3>a virtual creative agency</h3>
         </div>
      </div>
      <div class="bottom-overlay overlay">
      </div> -->

      <div class="left-overlay overlay">
      </div>
      <div class="right-overlay h-brand overlay">
      </div>

      <a id="down" href="#" class="downArrow"></a>
   </div>


   <div id="section1" class="menu-section-1 menu-section section" data-anchor="get-to-know-us">
      <div class="menu-image" style="background-image: url(<?php the_field('section_1_image', 4); ?>);">
      </div>
   </div>

   <div id="section2"class="menu-section-2 menu-section section" data-anchor="our-strategic-vision">
      <div class="menu-image" style="background-image: url(<?php the_field('section_2_image', 4); ?>);">
      </div>
   </div>

   <div id="section3"class="menu-section-3 menu-section section" data-anchor="explore-the-latest">
      <div class="menu-image" style="background-image: url(<?php the_field('section_3_image', 4); ?>);">
      </div>
   </div>

   <div id="section4"class="menu-section-4 menu-section section" data-anchor="reach-out-to-us">
      <div class="menu-image" style="background-image: url(<?php the_field('section_4_image', 4); ?>);">
      </div>
   </div>

   <div id="section5"class="menu-section-5 menu-section section" data-anchor="lets-build-something">
      <div class="menu-image" style="background-image: url(<?php the_field('section_5_image', 4); ?>);">
      </div>
   </div>

</div><!-- /#landing-menu -->


<?php get_footer(); ?>