<?php

/**
 * Loop Price
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

<?php if ($price_html = $product->get_price_html()) : ?>
	<span class="product__price">
		<?php echo $price_html; ?>
	</span>
<?php else : ?>
	<span class="product__no-price">
		<?php echo esc_html__('Giá: Liên hệ', THEME_DOMAIN); ?>
	</span>
<?php endif; ?>