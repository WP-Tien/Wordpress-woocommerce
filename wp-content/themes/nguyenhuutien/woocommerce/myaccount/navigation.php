<?php

/**
 * My Account navigation
 *
 * @package WooCommerce\Templates
 * 
 * @author TienNguyen - customizer
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
	exit;
}

customizer_woocommerce_breadcrumb();

do_action('woocommerce_before_account_navigation');
?>

<div class="account__wrap">
	<div class="row">
		<div class="col col-wide-3 col-medium-3 col-tiny-12">
			<nav class="woocommerce-MyAccount-navigation">
				<ul>
					<?php foreach (wc_get_account_menu_items() as $endpoint => $label) : ?>
						<li class="<?php echo wc_get_account_menu_item_classes($endpoint); ?>">
							<a href="<?php echo esc_url(wc_get_account_endpoint_url($endpoint)); ?>"><?php echo esc_html($label); ?></a>
						</li>
					<?php endforeach; ?>
				</ul>
			</nav>
		</div>
		<?php do_action('woocommerce_after_account_navigation'); ?>