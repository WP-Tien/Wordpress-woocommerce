<?php

/**
 * Main hooks theme
 * 
 * @package TienNguyen
 * @version 1.0.0
 */



/**
 * Setup hooks for setup file
 * @see setup.php
 */

// Setup
add_action('after_setup_theme', 'setup_theme');

// Menu
add_action('init', 'register_menus');

// Widgets
add_action('widgets_init', 'register_widgets');
add_filter('dynamic_sidebar_params', 'set_widget_classes');

// Classes
add_filter('body_class', 'add_woocommerce_class');

// Admin menu 
add_action('admin_menu', 'add_admin_page_theme');
// Activate custom settings
add_action('admin_init', 'add_custom_settings');

// Gutenberg
add_filter('use_block_editor_for_post', '__return_false', 10);

/**
 * Initialization hooks for functions
 * @see functions.php
 */

// Functions
add_filter('get_breadcrumb', 'get_breadcrumb', 10, 6);
