<?php

/**
 * Single Product Price
 *
 * @package WooCommerce\Templates
 * 
 * @author TienNguyen - customizer
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

global $product;
?>

<div class="single-product__price-wrap">
	<div class="single-product__text"><?php echo esc_html__('Giá', THEME_DOMAIN); ?></div>
	<?php if ($price_html = $product->get_price_html()) : ?>
		<p class="single-product__price">
			<?php echo $price_html; ?>
		</p>
	<?php else : ?>
		<p class="single-product__no-price">
			<?php echo esc_html__('Liên hệ', THEME_DOMAIN); ?>
		</p>
	<?php endif; ?>
</div>