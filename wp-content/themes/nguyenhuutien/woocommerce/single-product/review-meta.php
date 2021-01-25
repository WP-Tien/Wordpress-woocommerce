<?php

/**
 * The template to display the reviewers meta data (name, verified owner, review date)
 * 
 * @package WooCommerce\Templates
 * 
 * @author TienNguyen - customizer
 * @version 1.0.0
 */

defined('ABSPATH') || exit;

global $comment;
$verified = wc_review_is_from_verified_owner($comment->comment_ID);

if ('0' === $comment->comment_approved) { ?>

	<p class="single-product__meta">
		<em class="woocommerce-review__awaiting-approval">
			<?php esc_html_e('Đánh giá của bạn đang chờ phê duyệt', THEME_DOMAIN); ?>
		</em>
	</p>

<?php } else { ?>

	<p class="single-product__meta">
		<strong class="woocommerce-review__author"><?php comment_author(); ?> </strong>
		<?php
		if ('yes' === get_option('woocommerce_review_rating_verification_label') && $verified) {
			echo '<em class="woocommerce-review__verified verified">(' . esc_attr__('Chủ sở hữu đã xác nhận', THEME_DOMAIN) . ')</em> ';
		}

		?>
		<span class="woocommerce-review__dash">&ndash;</span> <time class="single-product__published-date woocommerce-review__published-date" datetime="<?php echo esc_attr(get_comment_date('c')); ?>"><?php echo esc_html(get_comment_date(wc_date_format())); ?></time>
	</p>

<?php
}
