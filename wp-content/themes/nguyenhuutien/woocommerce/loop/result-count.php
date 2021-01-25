<?php

/**
 * Result Count
 *
 * @package WooCommerce\Templates
 * 
 * @author TienNguyen - customizer
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
	exit;
}
?>
<p class="woocommerce-result-count result-count">
	<?php
	// phpcs:disable WordPress.Security
	if (1 === intval($total)) {
		_e('Hiển thị kết quả', THEME_DOMAIN);
	} elseif ($total <= $per_page || -1 === $per_page) {
		/* translators: %d: total results */
		printf(_n('Hiển thị tất cả %d kết quả', 'Hiển thị tất cả %d kết quả', $total, THEME_DOMAIN), $total);
	} else {
		$first = ($per_page * $current) - $per_page + 1;
		$last  = min($total, $per_page * $current);
		/* translators: 1: first result 2: last result 3: total results */
		printf(_nx('Hiển thị %1$d&ndash;%2$d trong %3$d kết quả', 'Hiển thị %1$d&ndash;%2$d trong %3$d kết quả', $total, 'với đầu và cuối kết quả', THEME_DOMAIN), $first, $last, $total);
	}
	// phpcs:enable WordPress.Security
	?>
</p>