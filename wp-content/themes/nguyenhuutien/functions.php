<?php

/**
 * All Functions theme
 * 
 * @package TienNguyen 
 * @version 1.0.0
 */

$includes = [
    'constants.php',
    'setup.php',
    'admin/function-icons.php',
    'admin/function-admin.php',
    'enqueue.php',
    'hooks.php',
    'starter-content.php',
    'front/customizer.php',
    'template-tags.php',
    'init-template.php',
    'svg-icon.php',
    'menu.php',
    'menu-tablet.php',
    'widget.php',
    'shortcode.php',
    'functions.php'
];

foreach ($includes as $file) {
    $pre_path = trailingslashit(locate_template('inc'));
    $file_path = $pre_path . $file;
    if (!$file_path) {
        trigger_error(sprintf('Error locating /inc%s for inclusion', $file), E_USER_ERROR);
    }

    require_once $file_path;
}
