<?php

/**
 * My Account Dashboard
 *
 * @package WooCommerce\Templates
 * 
 * @author TienNguyen - customizer
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

$allowed_html = array(
	'a' => array(
		'href' => array(),
	),
);
?>

<p>
	<?php
	printf(
		/* translators: 1: user display name 2: logout url */
		wp_kses(__('Xin chào %1$s (không là %1$s? <a href="%2$s">Đăng xuất</a>)', THEME_DOMAIN), $allowed_html),
		'<strong>' . esc_html($current_user->display_name) . '</strong>',
		esc_url(wc_logout_url())
	);
	?>
</p>

<p>
	<?php
	/* translators: 1: Orders URL 2: Address URL 3: Account URL. */
	$dashboard_desc = __('Từ trang tổng quan tài khoản của bạn, bạn có thể xem <a href="%1$s">đơn hàng gần đây</a>, quản lý <a href="%2$s">địa chỉ thanh toán của bạn</a>, và <a href="%3$s">chỉnh sửa mật khẩu và chi tiết tài khoản của bạn</a>.', THEME_DOMAIN);
	if (wc_shipping_enabled()) {
		/* translators: 1: Orders URL 2: Addresses URL 3: Account URL. */
		$dashboard_desc = __('Từ trang tổng quan tài khoản của bạn <a href="%1$s">đơn hàng gần đây</a>, quản lý <a href="%2$s">địa chỉ giao hàng và thanh toán</a>, và <a href="%3$s">chỉnh sửa mật khẩu và chi tiết tài khoản của bạn</a>.', THEME_DOMAIN);
	}
	printf(
		wp_kses($dashboard_desc, $allowed_html),
		esc_url(wc_get_endpoint_url('orders')),
		esc_url(wc_get_endpoint_url('edit-address')),
		esc_url(wc_get_endpoint_url('edit-account'))
	);
	?>
</p>

<?php
/**
 * My Account dashboard.
 *
 * @since 2.6.0
 */
do_action('woocommerce_account_dashboard');

/**
 * Deprecated woocommerce_before_my_account action.
 *
 * @deprecated 2.6.0
 */
do_action('woocommerce_before_my_account');

/**
 * Deprecated woocommerce_after_my_account action.
 *
 * @deprecated 2.6.0
 */
do_action('woocommerce_after_my_account');

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
