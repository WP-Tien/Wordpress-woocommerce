<?php

/**
 * The template to display the reviewers star rating in reviews
 * 
 * @package WooCommerce\Templates
 * 
 * @author TienNguyen - customizer
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

global $comment;
$rating = intval(get_comment_meta($comment->comment_ID, 'rating', true));

if ($rating && wc_review_ratings_enabled()) {
	echo wc_get_rating_html($rating); // WPCS: XSS ok.
}
