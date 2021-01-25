<?php

/**
 * Functions admin
 * 
 * @package TienNguyen
 * @version 1.0.0
 */

if (!function_exists('add_admin_page_theme')) {
    function add_admin_page_theme()
    {
        // Generate Admin Page
        add_menu_page('admin_menu', 'Theme Options', 'manage_options', 'admin_menu', 'func_admin_page', 'dashicons-admin-generic', 110);

        //Generate Admin Sub Pages
        add_submenu_page('admin_menu', 'Sidebar Options', 'Theme Options', 'manage_options', 'admin_menu', 'func_admin_page');
        add_submenu_page('admin_menu', 'Plugins Required', 'Plugin required', 'manage_options', 'plugins_required', 'func_plugin_required');
    }
}

if (!function_exists('add_custom_settings')) {
    function add_custom_settings()
    {
        // Search options
        register_setting('search-settings-group', 'category_dropdown');

        add_settings_section('search-theme-options', 'Search Option', 'func_search_options', 'admin_menu');

        add_settings_field('search-dropdown', 'Categories ID', 'func_categories_field', 'admin_menu', 'search-theme-options');
    }
}

// Search Options Functions
function func_search_options()
{
    echo 'Customize your Sidebar Information';
}

function func_categories_field()
{
    $data = esc_attr(get_option('category_dropdown'));
    echo '<input type="text" name="category_dropdown" value="' . $data . '" placeholder="2,3,7,8,..." />';
}

// Template admin function 
function func_admin_page()
{
    require_once(INCLUDE_DIR . 'inc/admin/templates/admin-page.php');
}

function func_plugin_required()
{
    require_once(INCLUDE_DIR . 'inc/admin/templates/plugin-required.php');
}
