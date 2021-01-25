<?php

/**
 * Product Loop Start
 * 
 * @package WooCommerce\Templates
 * 
 * @author TienNguyen - customizer
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
	exit;
}

if (is_product_category() || is_search()) {
	$class = 'row';
}

?>

<div class="<?php echo esc_attr($class); ?> products columns-<?php echo esc_attr(wc_get_loop_prop('columns')); ?>">