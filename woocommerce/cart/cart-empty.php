<?php
/**
 * Empty cart page
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
   exit; // Exit if accessed directly
}

wc_print_notices();

?>

<div class="empty-cart-wrapper">
   <div class="inner vAlign">
      <h3 class="cart-empty"><?php _e( 'What?! Your bag is empty.', 'woocommerce' ) ?></h3>

      <p>Let's fix that.</p>

      <?php do_action( 'woocommerce_cart_is_empty' ); ?>

      <p class="return-to-shop"><a class="button wc-backward" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>"><?php _e( 'Go Shop', 'woocommerce' ) ?></a></p>
   </div>
</div>
