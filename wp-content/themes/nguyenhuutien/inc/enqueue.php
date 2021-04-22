<?php

/**
 * Enqueue all scripts
 * 
 * @package TienNguyen
 * @version 1.0.0
 */

/**
 * Enqueue scripts and styles
 * 
 * @see add_action('wp_enqueue_scripts', $func_name)
 */
if (!function_exists('register_scripts')) {
    function register_scripts()
    {
        // Main styles
        $css_version = THEME_VERSION . '.' . filemtime(INCLUDE_DIR . 'assets/css/style.css');
        wp_enqueue_style('main-styles', INCLUDE_DIR_URI . 'assets/css/style.css', array(), $css_version);

        // Main scripts
        $js_version = THEME_VERSION . '.' . filemtime(INCLUDE_DIR . 'assets/js/scripts.min.js');
        wp_enqueue_script('main-scripts', INCLUDE_DIR_URI . 'assets/js/scripts.min.js', array('jquery'), $js_version, true);
        wp_localize_script('main-scripts', 'ajax_object', admin_url('admin-ajax.php'));

        if (is_page_template('page-template/home-page-v1.php')) {
            // Slider js for front page
            $js_slider_version = THEME_VERSION . '.' . filemtime(INCLUDE_DIR . 'assets/js/slide-script.js');
            wp_enqueue_script('slide-scripts', INCLUDE_DIR_URI . 'assets/js/slide-script.js', array(), $js_slider_version, true);
        }
    }

    add_action('wp_enqueue_scripts', 'register_scripts');
}

/**
 * Enqueue customizer scripts
 * 
 * @see add_action('customize_preview_init', $func_name)
 */
if (!function_exists('customzier_live_preview')) {
    function customizer_live_preview()
    {
        $js_customizer_version = THEME_VERSION . '.' . filemtime(INCLUDE_DIR . 'assets/js/customizer_scripts.js');
        wp_enqueue_script(
            'customizer-scripts',
            INCLUDE_DIR_URI . 'assets/js/customizer_scripts.js',
            array('jquery', 'customize-preview'),
            $js_customizer_version,
            true
        );
    }

    add_action('customize_preview_init', 'customizer_live_preview');
}

/**
 * Enqueue script and styles admin.
 */
if (!function_exists('register_admin_scripts')) {
    function register_admin_scripts($hook)
    {
        //  $is_page = get_current_screen()->post_type;
        if ($hook == 'nav-menus.php') {
            $css_menu_admin_version = THEME_VERSION . '.' . filemtime(INCLUDE_DIR . 'assets/css/admin-style.css');
            wp_register_style('admin-menu-style', INCLUDE_DIR_URI . 'assets/css/admin-style.css', array(), $css_menu_admin_version);
            wp_enqueue_style('admin-menu-style');

            $js_admin_version = THEME_VERSION . '.' . filemtime(INCLUDE_DIR . 'assets/js/admin-menu_scripts.js');
            wp_register_script('admin-menu-scripts', INCLUDE_DIR_URI . 'assets/js/admin-menu_scripts.js', array('jquery'), $js_admin_version, 'all');
            wp_enqueue_script('admin-menu-scripts');

            wp_localize_script('admin-menu-scripts', 'data_icons', get_data_icons());

            // resource
            $js_fontawesome_version = THEME_VERSION . '.' . filemtime(INCLUDE_DIR . 'assets/src/fontawesome/js/all.js');
            wp_enqueue_script('fontawesome_scripts', INCLUDE_DIR_URI . 'assets/src/fontawesome/js/all.js', array(), $js_fontawesome_version, true);
        }

        if ($_GET) {
            if ($hook == 'edit.php' && $_GET['post_type'] == 'product') {
                $css_woo_products_version = THEME_VERSION . '.' . filemtime(INCLUDE_DIR . 'assets/css/woo-products-style.css');
                wp_register_style('admin-products-style', INCLUDE_DIR_URI . 'assets/css/woo-products-style.css', array(), $css_woo_products_version);
                wp_enqueue_style('admin-products-style');
            }
        }

        $ajax_script_version = THEME_VERSION . '.' . filemtime(INCLUDE_DIR . 'assets/js/ajax-script.js');
        wp_enqueue_script('ajax-script', INCLUDE_DIR_URI . 'assets/js/ajax-script.js', array('jquery'), $ajax_script_version, true);
        wp_localize_script('ajax-script', 'ajax_object', admin_url('admin-ajax.php'));
    }

    add_action('admin_enqueue_scripts', 'register_admin_scripts');
}
