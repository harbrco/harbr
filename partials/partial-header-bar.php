<header class="header container" role="banner">
   <a class="menu-button menu-toggle">MENU</a>

   <?php if(is_home() || is_category()) { ?>
      <div class="blog-categories">
         <?php wp_nav_menu( array('menu' => 'blog-categories' )); ?>

         <a href="#" class="mobile-cat-menu-toggle">Categories <span class="down-arrow"></span></a>

         <div class="mobile-cat-menu-wrapper">
            <?php wp_nav_menu( array('menu' => 'blog-categories' )); ?>
         </div>
      </div>
   <?php } ?>

   <?php if(is_woocommerce() || is_cart() || is_checkout() ) { ?>
      <div class="shop-categories">
         <?php wp_nav_menu( array('menu' => 'shop-categories' )); ?>

         <a href="#" class="mobile-cat-menu-toggle">Categories <span class="down-arrow"></span></a>

         <div class="mobile-cat-menu-wrapper">
            <?php wp_nav_menu( array('menu' => 'shop-categories' )); ?>
         </div>
      </div>
   <?php } ?>

   <div class="logo">
      <a href="<?php echo home_url(); ?>" alt="Logo" class="logo">Harbr<span class="clrPop">.</span></a>
   </div>
</header>
