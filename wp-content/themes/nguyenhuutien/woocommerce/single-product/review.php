<?php

/**
 * Review Comments Template
 * 
 * @package WooCommerce\Templates
 * 
 * @author TienNguyen - customizer
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}
?>
<li <?php comment_class('single-product__comment-item'); ?> id="li-comment-<?php comment_ID(); ?>">

	<div id="comment-<?php comment_ID(); ?>" class="single-product__comment-inner">

		<?php
		/**
		 * The woocommerce_review_before hook
		 *
		 * @hooked woocommerce_review_display_gravatar - 10
		 */
		do_action('woocommerce_review_before', $comment);
		?>

		<div class="single-product__comment-text">

			<?php
			/**
			 * The woocommerce_review_meta hook.
			 *
			 * @hooked woocommerce_review_display_meta - 10
			 */
			do_action('woocommerce_review_meta', $comment);

			/**
			 * The woocommerce_review_before_comment_meta hook.
			 *
			 * @hooked woocommerce_review_display_rating - 10
			 */
			do_action('woocommerce_review_before_comment_meta', $comment);

			do_action('woocommerce_review_before_comment_text', $comment);

			/**
			 * The woocommerce_review_comment_text hook
			 *
			 * @hooked woocommerce_review_display_comment_text - 10
			 */
			do_action('woocommerce_review_comment_text', $comment);

			do_action('woocommerce_review_after_comment_text', $comment);
			?>

		</div>
	</div>