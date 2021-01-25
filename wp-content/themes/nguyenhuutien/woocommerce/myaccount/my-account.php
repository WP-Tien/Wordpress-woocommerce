<?php

/**
 * My Account page
 *
 * @package WooCommerce\Templates
 * 
 * @author TienNguyen - customizer
 * @version 1.0.0
 */

defined('ABSPATH') || exit;

/**
 * My Account navigation.
 *
 * @since 2.6.0
 */
do_action('woocommerce_account_navigation'); ?>

<div class="col col-wide-9 col-medium-9 col-tiny-12">
	<div class="woocommerce-MyAccount-content">
		<?php
		/**
		 * My Account content.
		 *
		 * @since 2.6.0
		 */
		do_action('woocommerce_account_content');
		?>
	</div>
</div>
</div> <!-- End .row -->
</div>