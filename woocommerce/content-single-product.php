<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author     WooThemes
 * @package    WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
   exit; // Exit if accessed directly
}

?>

<?php
   /**
    * woocommerce_before_single_product hook
    *
    * @hooked wc_print_notices - 10
    */
    do_action( 'woocommerce_before_single_product' );

    if ( post_password_required() ) {
      echo get_the_password_form();
      return;
    }
?>

<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

   <div class="product-top">
      <?php
         /**
          * woocommerce_before_single_product_summary hook
          *
          * @hooked woocommerce_show_product_sale_flash - 10
          * @hooked woocommerce_show_product_images - 20
          */
         //do_action( 'woocommerce_before_single_product_summary' );
      ?>


      <?php
      // First, get main Product Image
      $productImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );

      global $product;
      $attachment_ids = $product->get_gallery_attachment_ids();
      ?>

      <div class="product-image-column">
         <div class="product-images-wrapper">
            <div class="product-images">

               <div class="product-image-wrap">
                  <div class="product-image" style="background-image: url(<?php echo $productImg['0']; ?>);"></div>
               </div>

               <?php
               // Loop through gallery images
               foreach( $attachment_ids as $attachment_id ){

                  $full_url = wp_get_attachment_image_src( $attachment_id, 'full' )[0];
                  ?>

                  <div class="product-image-wrap">
                     <div class="product-image" style="background-image: url(<?php echo $full_url; ?>);"></div>
                  </div>
               <?php } ?>

            </div><!-- /.product-images -->
         </div><!-- /.product-images-wrapper -->

         <div class="product-pager-wrapper">
            <div id="product-pager">
               <div class="product-image-page-link" data-slide-index="0">
                  <a href="">
                     <div class="product-image" style="background-image: url(<?php echo $productImg['0']; ?>);">
                     </div>
                  </a>
               </div>

               <?php $product_pager_index = 1; ?>

               <?php
               // Loop through gallery images
               foreach( $attachment_ids as $attachment_id ){

                  $full_url = wp_get_attachment_image_src( $attachment_id, 'full' )[0];
                  ?>

                  <div class="product-image-page-link" data-slide-index="<?php echo $product_pager_index; ?>">
                     <a href="">
                        <div class="product-image" style="background-image: url(<?php echo $full_url; ?>);">
                        </div>
                     </a>
                  </div>

                  <?php $product_pager_index++; ?>

               <?php } ?>
            </div>
         </div>
      </div><!-- /.product-image-column -->

      <div class="summary entry-summary">

         <div class="inner vAlign">
            <?php
               /**
                * woocommerce_single_product_summary hook
                *
                * @hooked woocommerce_template_single_title - 5
                * @hooked woocommerce_template_single_rating - 10
                * @hooked woocommerce_template_single_price - 10
                * @hooked woocommerce_template_single_excerpt - 20
                * @hooked woocommerce_template_single_add_to_cart - 30
                * @hooked woocommerce_template_single_meta - 40
                * @hooked woocommerce_template_single_sharing - 50
                */
               do_action( 'woocommerce_single_product_summary' );
            ?>
         </div>

      </div><!-- .summary -->
   </div>


   <?php
      /**
       * woocommerce_after_single_product_summary hook
       *
       * @hooked woocommerce_output_product_data_tabs - 10
       * @hooked woocommerce_upsell_display - 15
       * @hooked woocommerce_output_related_products - 20
       */
      do_action( 'woocommerce_after_single_product_summary' );
   ?>

   <meta itemprop="url" content="<?php the_permalink(); ?>" />

   <?php $productImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>

   <div class="modal" style="background-image: url(<?php echo $productImg['0']; ?>);">
      <div class="modal-overlay"></div>
      <a href="#" class="close-share-modal close-btn modal-toggle">
         <i class="close-icon"></i>
      </a>
      <div class="share-modal modal-wrapper modal-transition vAlign">
         <h3>Added To Bag</h3>
         <h1><?php the_title(); ?></h1>
         <ul class="social-links">
            <li>
               <a href="/bag/" class="btn btn--uline">View Bag</a>
            </li>
         </ul>
      </div>
   </div>

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
