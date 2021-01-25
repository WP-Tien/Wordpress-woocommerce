<?php

/**
 * Content wrappers
 * 
 * @package WooCommerce\Templates
 * @version 3.6.0
 * 
 * @author TienNguyen - customizer
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

$template = wc_get_theme_slug_for_templates();


if (is_woocommerce()) {
	$page = '';
	if (is_product()) {
		$page .= 'single-page';
	}

	if (is_product_category() || is_product_tag() || isset($_GET['s'])) {
		$page .= 'archive-page';
	}
}


echo "<div class='{$page}'>";
