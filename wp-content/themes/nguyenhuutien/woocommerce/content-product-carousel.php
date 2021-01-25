<?php

/**
 * The template for displaying product content within loops
 * 
 * @package WooCommerce\Templates
 * 
 * @author TienNguyen - customizer
 * @version 1.0.0
 * 
 ** Scaffold for item product.
 * .product
 * 	.product__link
 *   .product_img 
 *     img 
 *     img (optional)
 *   h2.product__name !!!!!!!!!!!!! fix h2
 *   .product__price 
 *     span.product__price-old
 *     span.product__price-current
 *   .product__action
 *     .product__like_wrap 
 *     span.product__liked
 *      i.product__like-icon-empty
 *      i.product__liked-icon-fill
 *     .product__rating
 * 		.product__star.product__star--gold
 *      .product__star
 *     .product__sold
 *  .product__origin 
 *   span.product__brand
 *   span.pruduct__origin-name  
 */

defined('ABSPATH') || exit;

global $product, $section_class;

// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
    return;
}

?>
<div <?php wc_product_class(['product'], $product); ?>>
    <?php
    /**
     * Hook: woocommerce_before_shop_loop_item.
     *
     * @hooked woocommerce_template_loop_product_link_open - 10
     */
    do_action('woocommerce_before_shop_loop_item');

    /**
     * Hook: woocommerce_before_shop_loop_item_title.
     *
     * @hooked woocommerce_show_product_loop_sale_flash - 10
     * @hooked woocommerce_template_loop_product_thumbnail - 10
     */
    do_action('woocommerce_before_shop_loop_item_title');

    /**
     * Hook: woocommerce_shop_loop_item_title.
     *
     * @hooked woocommerce_template_loop_product_title - 10
     */
    do_action('woocommerce_shop_loop_item_title');

    /**
     * Hook: woocommerce_after_shop_loop_item_title.
     *
     * @hooked woocommerce_template_loop_rating - 5
     * @hooked woocommerce_template_loop_price - 10
     */
    do_action('woocommerce_after_shop_loop_item_title');

    /**
     * Hook: woocommerce_after_shop_loop_item.
     *
     * @hooked woocommerce_template_loop_product_link_close - 5
     * @hooked woocommerce_template_loop_add_to_cart - 10
     */
    do_action('woocommerce_after_shop_loop_item');
    ?>
</div>