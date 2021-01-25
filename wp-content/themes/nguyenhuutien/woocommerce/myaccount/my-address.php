<?php

/**
 * My Addresses
 *
 * @package WooCommerce\Templates
 * 
 * @author TienNguyen - customizer
 * @version 1.0.0
 */

defined('ABSPATH') || exit;

$customer_id = get_current_user_id();

if (!wc_ship_to_billing_address_only() && wc_shipping_enabled()) {
	$get_addresses = apply_filters(
		'woocommerce_my_account_get_addresses',
		array(
			'billing'  => __('Địa chỉ thanh toán', THEME_DOMAIN),
			'shipping' => __('Địa chỉ giao hàng', THEME_DOMAIN),
		),
		$customer_id
	);
} else {
	$get_addresses = apply_filters(
		'woocommerce_my_account_get_addresses',
		array(
			'billing' => __('Địa chỉ thanh toán', THEME_DOMAIN),
		),
		$customer_id
	);
}

$oldcol = 1;
$col    = 1;
?>

<p>
	<?php echo apply_filters('woocommerce_my_account_my_address_description', esc_html__('Các địa chỉ sau sẽ được sử dụng trên trang thanh toán theo mặc định.', THEME_DOMAIN)); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
	?>
</p>

<?php if (!wc_ship_to_billing_address_only() && wc_shipping_enabled()) : ?>
	<div class="u-columns woocommerce-Addresses col2-set addresses">
	<?php endif; ?>

	<?php foreach ($get_addresses as $name => $address_title) : ?>
		<?php
		$address = wc_get_account_formatted_address($name);
		$col     = $col * -1;
		$oldcol  = $oldcol * -1;
		?>

		<div class="u-column<?php echo $col < 0 ? 1 : 2; ?> col-<?php echo $oldcol < 0 ? 1 : 2; ?> woocommerce-Address">
			<header class="woocommerce-Address-title title">
				<h3><?php echo esc_html($address_title); ?></h3>
				<a href="<?php echo esc_url(wc_get_endpoint_url('edit-address', $name)); ?>" class="edit"><?php echo $address ? esc_html__('Chỉnh sửa', THEME_DOMAIN) : esc_html__('Thêm', THEME_DOMAIN); ?></a>
			</header>
			<address>
				<?php
				echo $address ? wp_kses_post($address) : esc_html_e('Bạn chưa thiết lập loại địa chỉ này.', THEME_DOMAIN);
				?>
			</address>
		</div>

	<?php endforeach; ?>

	<?php if (!wc_ship_to_billing_address_only() && wc_shipping_enabled()) : ?>
	</div>
<?php
	endif;
