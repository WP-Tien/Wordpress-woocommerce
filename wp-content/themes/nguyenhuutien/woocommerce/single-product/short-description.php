<?php

/**
 * Single product short description
 * 
 * @package WooCommerce\Templates
 * @version 3.6.0
 * 
 * @author TienNguyen - customizer
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

global $post;

$short_description = apply_filters('woocommerce_short_description', $post->post_excerpt);

if (!$short_description) {
	return;
}

?>
<div class="single-product__short-description">
	<div class="single-product__text"> <?php echo esc_html__('Tóm tắt', THEME_DOMAIN); ?> </div>
	<div class="single-product__desc"> <?php echo $short_description; ?></div>
</div>