<?php

/** 
 * Woocommerce hooks for template 
 * 
 * @package TienNguyen
 * @version 1.0.0
 * @see inc/template-hooks/functions/function_woo.php
 */

/**
 * Hooks for content-product.php
 * @see woocommerce/content-product.php
 */
remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);

// ----------------------------------------------------------------------------------------------------------
add_action('woocommerce_before_shop_loop_item', 'customizer_template_loop_product_link_open', 10);
add_action('woocommerce_before_shop_loop_item_title', 'customizer_template_loop_product_thumbnail', 10);
add_action('woocommerce_shop_loop_item_title', 'customizer_template_loop_product_title', 10);
add_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 5);


/**
 * Hook add/update meta sale falsh products
 * @see func_woo.php
 */
add_action('woocommerce_product_options_general_product_data', 'add_checkbox_to_general_option_product');
add_action('woocommerce_process_product_meta', 'save_meta_flash_sale_product', 10, 2);

add_filter('manage_edit-product_columns', 'add_flash_sale_col_filter', 10, 1);
add_action('manage_product_posts_custom_column', 'product_column_flash_sale', 10, 2);

if (is_admin()) {
    add_action("wp_ajax_update_product_flash_sale", "update_product_flash_sale");
    add_action("wp_ajax_nopriv_update_product_flash_sale", "update_product_flash_sale");
}

/**
 * Ajax handler to load more product
 * @see func_woo.php
 */

add_action('wp_ajax_load_more_products', 'load_more_products');
add_action('wp_ajax_nopriv_load_more_products', 'load_more_products');

/**
 * Hooks for single product page
 * @see woocommerce/single-product.php
 */
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
remove_action('woocommerce_review_comment_text', 'woocommerce_review_display_comment_text', 10);

// ----------------------------------------------------------------------------------------------------------
add_action('woocommerce_before_main_content', 'customizer_woocommerce_breadcrumb', 20);
add_action('woocommerce_single_product_summary', 'customizer_woocommerce_shipping', 25);
add_action('woocommerce_single_product_summary', 'customizer_woocommerce_refund', 26);
// re position
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 40);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 30);
// 
add_action('woocommerce_after_single_product_summary', 'customizer_woocommerce_output_product_data', 10);
add_action('woocommerce_after_single_product_summary', 'customizer_woocommerce_output_product_comments', 15);
add_action('woocommerce_after_single_product_summary', 'customizer_woocommerce_output_related_products', 20);
add_action('woocommerce_review_comment_text', 'customizer_woocommerce_review_display_comment_text', 10);
//
add_action('wp', 'customizer_get_viewed_products');

// ----------------------------------------------------------------------------------------------------------
add_filter('woocommerce_product_single_add_to_cart_text', 'customizer_woocommerce_product_single_add_to_cart_text');

/**
 * Hooks for archive page
 * @see woocommerce/archive-product.php
 */
remove_action('woocommerce_archive_description', 'woocommerce_taxonomy_archive_description');
remove_action('woocommerce_archive_description', 'woocommerce_product_archive_description');
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

// add_action('woocommerce_before_shop_loop', 'customizer_woocommerce_catalog_ordering', 30);
add_filter('woocommerce_catalog_orderby', 'customizer_woocommerce_catalog_orderby');
add_action('customize_woocommerce_before_shop_loop', 'woocommerce_result_count', 5);
add_action('customize_woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 10);


/**
 * Hooks for mini cart
 */
remove_action('woocommerce_widget_shopping_cart_total', 'woocommerce_widget_shopping_cart_subtotal', 10);
remove_action('woocommerce_widget_shopping_cart_buttons', 'woocommerce_widget_shopping_cart_button_view_cart', 10);
remove_action('woocommerce_widget_shopping_cart_buttons', 'woocommerce_widget_shopping_cart_proceed_to_checkout', 20);

add_action('woocommerce_widget_shopping_cart_total', 'customizer_woocommerce_widget_shopping_cart_subtotal', 10);
add_action('woocommerce_widget_shopping_cart_buttons', 'customizer_woocommerce_widget_shopping_cart_button_view_cart', 10);
add_action('woocommerce_widget_shopping_cart_buttons', 'customizer_woocommerce_widget_shopping_cart_proceed_to_checkout', 20);

// ----------------------------------------------------------------------------------------------------------
add_filter('woocommerce_add_to_cart_fragments', 'customizer_ajax_woocommerce_add_to_cart_fragments');
add_filter('woocommerce_add_to_cart_fragments', 'customizer_ajax_woocommerce_cart_count_fragments');

/**
 * Hooks for account
 */
add_filter('woocommerce_registration_errors', 'customizer_woocommerce_registration_errors_validation', 10, 3);
add_filter('woocommerce_account_menu_items', 'customizer_woocommerce_account_menu_items');

add_filter('woocommerce_default_address_fields', 'customizer_woocommerce_default_address_fields');
add_filter('woocommerce_billing_fields', 'customizer_woocommerce_billing_fields');

/**
 * Hooks for Cart
 */

remove_action('woocommerce_cart_collaterals', 'woocommerce_cross_sell_display');
