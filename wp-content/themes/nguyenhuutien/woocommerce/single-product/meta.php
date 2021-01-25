<?php

/**
 * Single Product Meta
 * 
 * @package WooCommerce\Templates
 * @version 3.6.0
 * 
 * @author TienNguyen - customizer
 */

if (!defined('ABSPATH')) {
	exit;
}

global $product;
?>
<div class="single-product__meta">

	<?php do_action('woocommerce_product_meta_start'); ?>

	<?php if (wc_product_sku_enabled() && ($product->get_sku() || $product->is_type('variable'))) : ?>

		<span class="sku_wrapper"><?php esc_html_e('SKU:', 'woocommerce'); ?> <span class="sku"><?php echo ($sku = $product->get_sku()) ? $sku : esc_html__('N/A', 'woocommerce'); ?></span></span>

	<?php endif; ?>

	<?php echo wc_get_product_category_list(
		$product->get_id(),
		' ',
		'<span class="single-product__meta-cate">' . _n(
			'<div class="single-product__text">Danh mục</div>',
			'<div class="single-product__text">Danh mục</div>',
			count($product->get_category_ids()),
			'woocommerce'
		) . ' ',
		'</span>'
	); ?>

	<?php echo wc_get_product_tag_list($product->get_id(), ' ', '<span class="single-product__meta-tag">' . _n('<div class="single-product__text">Tag</div>', '<div class="single-product__text">Tags</div>', count($product->get_tag_ids()), 'woocommerce') . ' ', '</span>'); ?>

	<?php do_action('woocommerce_product_meta_end'); ?>

</div>