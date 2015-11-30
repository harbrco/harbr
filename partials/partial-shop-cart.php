<div id="main" class="main-content section isWhite">
   <div class="container">
      <div class="cart-heading">
         <h1>Your bag</h1>
         <a href="/shop/"><span class="left-arrow"></span>Back to Shop</a>
      </div>

      <?php if (have_posts()): while (have_posts()) : the_post(); ?>

         <?php the_content(); ?>

      <?php endwhile; endif; ?>
   </div>
</div>