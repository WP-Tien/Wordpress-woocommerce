<?php

/**
 * Template tags
 * 
 * @package TienNguyen
 * @version 1.0.0
 */


/**
 * Displays the site Logo & site title
 */
if (!function_exists('site_logo')) {
    function site_logo()
    {
        global $theme_options;
        if (get_theme_mod('custom_logo')) {
            $custom_logo_id = get_theme_mod('custom_logo');
            $logo_src = wp_get_attachment_image_src($custom_logo_id, 'full');
            $content_logo = sprintf('<img src="%s" alt="logo" class="header__navsearch-logo-pc">', $logo_src[0]);
        } else {
            $content_logo = sprintf('<div class="header__navsearch-logo-pc">%s</div>', get_theme_svg('logo', '#ffffff'));
        }

        // $theme_options['header_logo_mobile'];
        if ($theme_options['header_logo_mobile'] != '') {
            $content_logo_mobile = sprintf('<img src="%s" alt="logo_mobile" class="header__navsearch-logo-mobile">', $theme_options['header_logo_mobile']);
        } else {
            $content_logo_mobile = sprintf('<div class="header__navsearch-logo-mobile">%s</div>', get_theme_svg('logo-mobile', '#ffffff'));
        }

        if ($content_logo && $content_logo_mobile) {
            $content = sprintf('<a href="%1$s" class="header__navsearch-logo"> %2$s %3$s </a>', esc_url(get_home_url(null, '/')), $content_logo, $content_logo_mobile);
        }

        echo $content;
    }
}
