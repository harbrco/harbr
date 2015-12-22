<?php
/**
 * Displayed when no products are found matching the current query.
 *
 * Override this template by copying it to yourtheme/woocommerce/loop/no-products-found.php
 *
 * @author     WooThemes
 * @package    WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
   exit; // Exit if accessed directly
}

?>
<!-- <p class="woocommerce-info"><?php //_e( 'Sorry, we don’t have any products available right now.', 'woocommerce' ); ?></p> -->

<div class="no-products-available vAlign">
   <h2 style="text-align: center;">Sorry, we don’t have any products available right now.</h2>

   <div class="centerBtn">
      <a href="#" class="btn btn--uline onWhite">Go Home</a>
   </div>
</div>