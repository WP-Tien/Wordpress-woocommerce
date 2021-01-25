<?php

/**
 * The template for displaying product widget entries.
 *
 * @package WooCommerce\Templates
 * 
 * @author TienNguyen - customizer
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
	exit;
}

global $product;

if (!is_a($product, 'WC_Product')) {
	return;
}

?>
<li>
	<?php do_action('woocommerce_widget_product_item_start', $args); ?>

	<a class="widget-product__link" href="<?php echo esc_url($product->get_permalink()); ?>">
		<div class="widget-product__img">
			<?php echo $product->get_image(); // PHPCS:Ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
			?>
		</div>
		<div class="widget-product__desc">
			<span class="widget-product__title"><?php echo wp_kses_post($product->get_name()); ?></span>
			<div class="widget-product__price">
				<?php
				if ($price_html = $product->get_price_html()) {
					echo $price_html;
				} else {
					echo esc_html__('Giá: liên hệ', THEME_DOMAIN);
				}
				?>
			</div>
		</div>

	</a>

	<?php if (!empty($show_rating)) : ?>
		<?php echo wc_get_rating_html($product->get_average_rating()); // PHPCS:Ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
		?>
	<?php endif; ?>

	<?php do_action('woocommerce_widget_product_item_end', $args); ?>
</li>