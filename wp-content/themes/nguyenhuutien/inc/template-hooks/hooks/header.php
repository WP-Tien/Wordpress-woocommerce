<?php

/**
 * Header hooks 
 * 
 * @package TienNguyen 
 * @version 1.0.0
 */

add_action('tpl_header', 'tpl_header', 5);
add_action('tpl_header', 'tpl_category_tablet', 10);

/**
 * Ajax handler to search product
 * @see func_header.php
 */

add_action('wp_ajax_get_related_products', 'get_related_products');
add_action('wp_ajax_nopriv_get_related_products', 'get_related_products');
