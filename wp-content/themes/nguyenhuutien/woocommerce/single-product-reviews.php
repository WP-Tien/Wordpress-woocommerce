<?php

/**
 * Display single product reviews (comments)
 *
 * @package WooCommerce\Templates
 * 
 * @author TienNguyen - customizer
 * @version 1.0.0
 */


defined('ABSPATH') || exit;

global $product;

if (!comments_open()) {
	return;
}

?>
<div id="reviews" class="single-product__reviews woocommerce-Reviews">
	<div class="single-product__comments" id="comments">
		<h2 class="single-product__reviews-head woocommerce-Reviews-title">
			<?php
			$count = $product->get_review_count();
			if ($count && wc_review_ratings_enabled()) {
				/* translators: 1: reviews count 2: product name */
				$reviews_title = sprintf(esc_html(_n('%1$s đánh giá cho %2$s', '%1$s Đánh giá cho %2$s', $count, THEME_DOMAIN)), esc_html($count), '<span>' . get_the_title() . '</span>');
				echo apply_filters('woocommerce_reviews_title', $reviews_title, $count, $product); // WPCS: XSS ok.
			} else {
				esc_html_e('Đánh giá', THEME_DOMAIN);
			}
			?>
		</h2>

		<?php
		$args = array('post_type' => 'product', 'post_id' => $product->get_ID());
		$comments = get_comments($args);
		//  if () {
		// 	 wp_list_comments(array('callback' => 'woocommerce_comments'), $comments);
		//  }

		if ($comments && count($comments) > 0) :
		?>
			<ol class="single-product__comment-list commentlist">
				<?php wp_list_comments(array('callback' => 'woocommerce_comments'), $comments); ?>
			</ol>

			<?php
			if (get_comment_pages_count() > 1 && get_option('page_comments')) :
				echo '<nav class="woocommerce-pagination">';
				paginate_comments_links(
					apply_filters(
						'woocommerce_comment_pagination_args',
						array(
							'prev_text' => '&larr;',
							'next_text' => '&rarr;',
							'type'      => 'list',
						)
					)
				);
				echo '</nav>';
			endif;
			?>
		<?php else : ?>
			<p class="single-product__noreviews woocommerce-noreviews"><?php esc_html_e('Chưa có đánh giá nào cho sản phẩm.', THEME_DOMAIN); ?></p>
		<?php endif; ?>
	</div>

	<?php if (get_option('woocommerce_review_rating_verification_required') === 'no' || wc_customer_bought_product('', get_current_user_id(), $product->get_id())) : ?>
		<div class="single-product__review-form-wrapper" id="review_form_wrapper">
			<div class="single-product__review-form" id="review_form">
				<?php
				$commenter    = wp_get_current_commenter();
				$comment_form = array(
					/* translators: %s is product title */
					'title_reply'         => ($comments && count($comments) > 0) ? esc_html__('Thêm đánh giá', THEME_DOMAIN) : sprintf(esc_html__('Hãy là người đầu tiên đánh giá &ldquo;%s&rdquo;', THEME_DOMAIN), get_the_title()),
					/* translators: %s is product title */
					'title_reply_to'      => esc_html__('Để lại đánh giá %s', THEME_DOMAIN),
					'title_reply_before'  => '<span id="reply-title" class="single-product__comment-reply-title comment-reply-title">',
					'title_reply_after'   => '</span>',
					'comment_notes_after' => '',
					'label_submit'        => esc_html__('Gửi', THEME_DOMAIN),
					'logged_in_as'        => '',
					'comment_field'       => '',
				);

				$name_email_required = (bool) get_option('require_name_email', 1);
				$fields              = array(
					'author' => array(
						'label'    => __('Tên', THEME_DOMAIN),
						'type'     => 'text',
						'value'    => $commenter['comment_author'],
						'required' => $name_email_required,
					),
					'email'  => array(
						'label'    => __('Email', THEME_DOMAIN),
						'type'     => 'email',
						'value'    => $commenter['comment_author_email'],
						'required' => $name_email_required,
					),
				);

				$comment_form['fields'] = array();

				foreach ($fields as $key => $field) {
					$field_html  = '<p class="single-product__comment-field comment-form-' . esc_attr($key) . '">';
					$field_html .= '<label for="' . esc_attr($key) . '">' . esc_html($field['label']);

					if ($field['required']) {
						$field_html .= '&nbsp;<span class="required">*</span>';
					}

					$field_html .= '</label><input class="single-product__comment-input" id="' . esc_attr($key) . '" name="' . esc_attr($key) . '" type="' . esc_attr($field['type']) . '" value="' . esc_attr($field['value']) . '" size="30" ' . ($field['required'] ? 'required' : '') . ' /></p>';

					$comment_form['fields'][$key] = $field_html;
				}

				$account_page_url = wc_get_page_permalink('myaccount');
				if ($account_page_url) {
					/* translators: %s opening and closing link tags respectively */
					$comment_form['must_log_in'] = '<p class="must-log-in">' . sprintf(esc_html__('Bản phải %1$sđăng nhập%2$s để đánh giá.', THEME_DOMAIN), '<a href="' . esc_url($account_page_url) . '">', '</a>') . '</p>';
				}

				if (wc_review_ratings_enabled()) {
					$comment_form['comment_field'] = '<div class="single-product__comment-form-rating comment-form-rating"><label for="rating">' . esc_html__('Đánh giá của bạn', THEME_DOMAIN) . (wc_review_ratings_required() ? '&nbsp;<span class="required">*</span>' : '') . '</label><select name="rating" id="rating" required>
						<option value="">' . esc_html__('Rate&hellip;', 'woocommerce') . '</option>
						<option value="5">' . esc_html__('Perfect', 'woocommerce') . '</option>
						<option value="4">' . esc_html__('Good', 'woocommerce') . '</option>
						<option value="3">' . esc_html__('Average', 'woocommerce') . '</option>
						<option value="2">' . esc_html__('Not that bad', 'woocommerce') . '</option>
						<option value="1">' . esc_html__('Very poor', 'woocommerce') . '</option>
					</select></div>';
				}

				$comment_form['comment_field'] .= '<p class="single-product__comment-form-comment comment-form-comment"><label for="comment">' . esc_html__('Thêm bình luận sản phẩm', THEME_DOMAIN) . '&nbsp;<span class="required">*</span></label><textarea class="single-product__comment-textarea" id="comment" name="comment" cols="45" rows="8" required></textarea></p>';

				$comment_form['class_submit'] = 'single-product__comment-form-btn btn btn--primary btn--small';

				comment_form(apply_filters('woocommerce_product_review_comment_form_args', $comment_form));
				?>
			</div>
		</div>
	<?php else : ?>
		<p class="woocommerce-verification-required"><?php esc_html_e('Chỉ những khách hàng đã đăng nhập đã mua sản phẩm này mới có thể để lại đánh giá.', THEME_DOMAIN); ?></p>
	<?php endif; ?>

	<div class="clear"></div>
</div>