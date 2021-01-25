<?php

/**
 * Single Product Sale Flash
 * 
 * @package WooCommerce\Templates
 * 
 * @author TienNguyen - customizer
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

global $post, $product;

?>
<?php if ($product->is_on_sale()) : ?>
	<?php echo apply_filters('woocommerce_sale_flash', '<span class="single-product__onsale">' . esc_html__('Giảm Giá!', THEME_DOMAIN) . '</span>', $post, $product); ?>
	<?php
endif;
