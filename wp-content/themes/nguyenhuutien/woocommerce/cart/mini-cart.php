<?php

/**
 * Mini-cart
 *
 * @package WooCommerce\Templates
 * 
 * @author TienNguyen - customizer
 * @version 1.0.0
 */

defined('ABSPATH') || exit;

do_action('woocommerce_before_mini_cart'); ?>
<!-- Cart list -->
<!-- <h4 class="header__cart-heading">Sản phẩm đã thêm</h4>
	<ul class="header__cart-list-item">
		<li class="header__cart-item">
			<img src="https://cf.shopee.vn/file/73189ecdc68cfd07bc63d0d477a2c151" alt="" class="header__cart-img">
			<div class="header__cart-item-info">
				<div class="header__cart-item-head">
					<h5 class="header__cart-item-name text-clamp--2">Bộ kem đa trị vùng mắt bộ kem đa trị vùng mắt bộ kem đa trị vùng mắt bộ kem đa trị vùng mắt</h5>
					<div class="header__cart-item-price-wrap">
						<span class="header__cart-item-price">2.000.000đ</span>
						<span class="header__cart-item-multiply">x</span>
						<span class="header__cart-item-qnt">2</span>
					</div>
				</div>
				<div class="header__cart-item-body">
					<span class="header__cart-item-description">
						Phân loại hàng: Bạc
					</span>
					<span class="header__cart-item-remove">
						Xóa
					</span>
				</div>
			</div>
		</li>
	</ul> -->
<?php if (!WC()->cart->is_empty()) : ?>
	<h4 class="header__cart-heading">Sản phẩm đã thêm</h4>

	<ul class="header__cart-list-item woocommerce-mini-cart cart_list product_list_widget <?php echo esc_attr($args['list_class']); ?>">
		<?php
		do_action('woocommerce_before_mini_cart_contents');

		foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
			$_product   = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
			$product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);

			if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key)) {
				$product_name      = apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key);
				$thumbnail         = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key);
				$product_price     = apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key);
				$product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
		?>
				<li class="header__cart-item woocommerce-mini-cart-item <?php echo esc_attr(apply_filters('woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key)); ?>">
					<?php if (empty($product_permalink)) : ?>
						<?php echo $thumbnail; ?>
					<?php else : ?>
						<a href="<?php echo esc_url($product_permalink); ?>">
							<?php echo $thumbnail; ?>
						</a>
					<?php endif; ?>


					<div class="header__cart-item-info">
						<div class="header__cart-item-head">
							<h5 class="header__cart-item-name text-clamp--2">
								<?php if (empty($product_permalink)) : ?>
									<?php echo $product_name; ?>
								<?php else : ?>
									<a href="<?php echo esc_url($product_permalink); ?>">
										<?php echo $product_name; ?>
									</a>
								<?php endif; ?>
							</h5>
							<div class="header__cart-item-price-wrap">
								<span class="header__cart-item-price"><?php echo $product_price; ?></span>
								<span class="header__cart-item-multiply">x</span>
								<span class="header__cart-item-qnt"><?php echo $cart_item['quantity']; ?></span>
							</div>
						</div>
						<div class="header__cart-item-body">
							<span class="header__cart-item-description">
								<?php echo wc_get_formatted_cart_item_data($cart_item); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
								?>
							</span>
							<span class="header__cart-item-remove">
								<?php
								echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
									'woocommerce_cart_item_remove_link',
									sprintf(
										'<a href="%s" class="remove_from_cart_button" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s">&times;</a>',
										esc_url(wc_get_cart_remove_url($cart_item_key)),
										esc_attr__('Remove this item', 'woocommerce'),
										esc_attr($product_id),
										esc_attr($cart_item_key),
										esc_attr($_product->get_sku())
									),
									$cart_item_key
								);
								?>
							</span>
						</div>
					</div>
				</li>
		<?php
			}
		}

		do_action('woocommerce_mini_cart_contents');
		?>
	</ul>

	<p class="header__cart-sub-total woocommerce-mini-cart__total total">
		<?php
		/**
		 * Hook: woocommerce_widget_shopping_cart_total.
		 *
		 * @hooked woocommerce_widget_shopping_cart_subtotal - 10
		 */
		do_action('woocommerce_widget_shopping_cart_total');
		?>
	</p>

	<?php do_action('woocommerce_widget_shopping_cart_before_buttons'); ?>

	<p class="header__cart-view-cart header_cart-button-wrap woocommerce-mini-cart__buttons buttons">
		<?php do_action('woocommerce_widget_shopping_cart_buttons'); ?>
	</p>

	<?php do_action('woocommerce_widget_shopping_cart_after_buttons'); ?>

<?php else : ?>
	<div class="header__cart-no-items-wrap">
		<div class="header__cart-no-items-img">
			<?php the_theme_svg('cart-empty', '#32373c2e'); ?>
		</div>
		<p class="header__cart-no-items-msg woocommerce-mini-cart__empty-message"><?php esc_html_e('Không có sản phẩm nào trong giỏ hàng', THEME_DOMAIN); ?></p>
	</div>
<?php endif; ?>

<?php do_action('woocommerce_after_mini_cart'); ?>