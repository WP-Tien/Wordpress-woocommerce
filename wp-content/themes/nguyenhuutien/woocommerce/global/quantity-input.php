<?php

/**
 * Product quantity inputs
 * 
 * @package WooCommerce\Templates
 * @version 3.6.0
 * 
 * @author TienNguyen - customizer
 */

defined('ABSPATH') || exit;

if ($max_value && $min_value === $max_value) {
?>
	<div class="quantity hidden">
		<input type="hidden" id="<?php echo esc_attr($input_id); ?>" class="qty" name="<?php echo esc_attr($input_name); ?>" value="<?php echo esc_attr($min_value); ?>" />
	</div>
<?php
} else {
	/* translators: %s: Quantity. */
	$label = !empty($args['product_name']) ? sprintf(esc_html__('%s quantity', 'woocommerce'), wp_strip_all_tags($args['product_name'])) : esc_html__('Quantity', 'woocommerce');
?>
	<div class="single-product__quantity">
		<?php do_action('woocommerce_before_quantity_input_field'); ?>
		<label class="screen-reader-text" for="<?php echo esc_attr($input_id); ?>"><?php echo esc_attr($label); ?></label>
		<div class="single-product__text"><?php echo esc_html__('Số Lượng', THEME_DOMAIN); ?></div>
		<input type="button" value="-" class="single-product__quantity--minus">
		<input type="number" id="<?php echo esc_attr($input_id); ?>" class="single-product__quantity--total <?php echo esc_attr(join(' ', (array) $classes)); ?>" step="<?php echo esc_attr($step); ?>" min="<?php echo esc_attr($min_value); ?>" max="<?php echo esc_attr(0 < $max_value ? $max_value : ''); ?>" name="<?php echo esc_attr($input_name); ?>" value="<?php echo esc_attr($input_value); ?>" title="<?php echo esc_attr_x('Qty', 'Product quantity input tooltip', 'woocommerce'); ?>" size="4" placeholder="<?php echo esc_attr($placeholder); ?>" inputmode="<?php echo esc_attr($inputmode); ?>" />
		<input type="button" value="+" class="single-product__quantity--plus">
		<?php do_action('woocommerce_after_quantity_input_field'); ?>
	</div>
<?php
}
