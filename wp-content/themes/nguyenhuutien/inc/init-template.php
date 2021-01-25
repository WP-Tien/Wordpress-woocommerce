<?php

/**
 * Initialize template
 * 
 * @package TienNguyen
 * @version 1.0.0
 */

/**
 * Global variable for theme
 */

$theme_options = get_default_settings();
$section_class = [];

/** 
 * Require all template functions 
 * 
 * @see template-hooks/func
 */
require_once INCLUDE_DIR . 'inc/template-hooks/functions/func_header.php';
require_once INCLUDE_DIR . 'inc/template-hooks/functions/func_home-page-v1.php';
require_once INCLUDE_DIR . 'inc/template-hooks/functions/func_blog.php';
require_once INCLUDE_DIR . 'inc/template-hooks/functions/func_woo.php';

/**
 * Require all template hooks
 * @see template-hooks/hooks
 */
require_once INCLUDE_DIR . 'inc/template-hooks/hooks/header.php';
require_once INCLUDE_DIR . 'inc/template-hooks/hooks/home-page-v1.php';
require_once INCLUDE_DIR . 'inc/template-hooks/hooks/blog-page.php';
require_once INCLUDE_DIR . 'inc/template-hooks/hooks/woo.php';

if (!function_exists('add_woocommerce_class')) {
    // Add class Woocommerce to body
    function add_woocommerce_class()
    {
        // check if not woo page && is custom template homepage-v1
        // if ( !is_woocommerce() && is_page_template('template-homepage-v1.php') ) {
        //    $classes[] = 'woocommerce';
        // } else if ( is_archive() || is_category() ) {
        //     $classes[] = 'woocommerce';
        // }

        $classes[] = 'woocommerce';

        return $classes;
    }
}
