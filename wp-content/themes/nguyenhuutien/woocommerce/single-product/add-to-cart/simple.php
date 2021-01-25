<?php

/**
 * Simple product add to cart
 * 
 * @package WooCommerce\Templates
 * @version 3.6.0
 * 
 * @author TienNguyen - customizer
 */

defined('ABSPATH') || exit;

global $product;

if (!$product->is_purchasable()) {
	return;
}

echo wc_get_stock_html($product); // WPCS: XSS ok.

if ($product->is_in_stock()) : ?>

	<?php do_action('woocommerce_before_add_to_cart_form'); ?>

	<form class="single-product__cart" action="<?php echo esc_url(apply_filters('woocommerce_add_to_cart_form_action', $product->get_permalink())); ?>" method="post" enctype='multipart/form-data'>
		<?php do_action('woocommerce_before_add_to_cart_button'); ?>

		<?php
		do_action('woocommerce_before_add_to_cart_quantity');

		woocommerce_quantity_input(
			array(
				'min_value'   => apply_filters('woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product),
				'max_value'   => apply_filters('woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product),
				'input_value' => isset($_POST['quantity']) ? wc_stock_amount(wp_unslash($_POST['quantity'])) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
			)
		);

		do_action('woocommerce_after_add_to_cart_quantity');
		?>

		<div class="single-product__action">
			<button type="submit" name="add-to-cart" value="<?php echo esc_attr($product->get_id()); ?>" class="single-product__add-to-cart btn btn--outline-primary">
				<?php the_theme_svg('supermarket', '#f6412e'); ?>
				<?php echo esc_html($product->single_add_to_cart_text()); ?>
			</button>
			<a class="single-product__buy-now btn btn--primary" href="<?php echo esc_url(wc_get_checkout_url() . '?add-to-cart=' . $product->get_id()); ?>"> Mua ngay </a>
		</div>

		<?php do_action('woocommerce_after_add_to_cart_button'); ?>
	</form>

	<?php do_action('woocommerce_after_add_to_cart_form'); ?>

<?php endif; ?>