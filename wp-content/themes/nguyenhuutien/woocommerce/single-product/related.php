<?php

/**
 * Related Products
 * 
 * @package WooCommerce\Templates
 * 
 * @author TienNguyen - customizer
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
	exit;
}

if ($related_products) : ?>

	<section class="related-products">
		<?php
		$heading = apply_filters('woocommerce_product_related_products_heading', __('Sản phẩm liên quan', THEME_DOMAIN));
		if ($heading) :
		?>
			<h2 class="related-products__head"><?php echo esc_html($heading); ?></h2>
		<?php endif; ?>

		<div id="related-products__carousel" class="related-products__list owl-carousel owl-theme">

			<?php foreach ($related_products as $related_product) : ?>
				<?php
				$post_object = get_post($related_product->get_id());

				setup_postdata($GLOBALS['post'] = &$post_object); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found
				?>

				<?php wc_get_template_part('content', 'product'); ?>

			<?php endforeach; ?>

		</div>
	</section>
<?php
endif;

wp_reset_postdata();
