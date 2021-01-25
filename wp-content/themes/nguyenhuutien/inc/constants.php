<?php

/**
 * Constants file
 * 
 * @package TienNguyen
 * @version 1.0.0
 */
defined('INCLUDE_DIR') ? null : define('INCLUDE_DIR', trailingslashit(get_template_directory()));
defined('INCLUDE_DIR_URI') ? null : define('INCLUDE_DIR_URI', trailingslashit(get_template_directory_uri()));

defined('LANG_DIR') ? null : define('LANG_DIR', trailingslashit(WP_LANG_DIR));

$theme = wp_get_theme();

defined('THEME_NAME') ? null : define('THEME_NAME', $theme->get('Name'));
defined('THEME_DOMAIN') ? null : define('THEME_DOMAIN', $theme->get('TextDomain'));
defined('THEME_VERSION') ? null : define('THEME_VERSION', $theme->get('Version'));
