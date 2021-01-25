<?php

/**
 * Stater content for theme
 * 
 * @package TienNguyen
 * @version 1.0.0
 */

if (!function_exists('default_settings')) {
    function default_settings()
    {
        $theme_options = [
            // Nav top
            'header_logo_mobile'     => '',
            'showroom_text'          => 'Hệ thống showroom',
            'showroom_link'          => '#',
            'support_text'           => 'Tư vấn mua hàng',
            'sub_support_text'       => '1800 888',
            'support_link'           => '#',
            'advisory_text'          => 'Chăm sóc khách hàng',
            'sub_advisory_text'      => '1800 888',
            'advisory_link'          => '#',
            'technology_news_text'   => 'Tin công nghệ',
            'technology_news_link'   => '#',
            'down_apps_text'         => 'Tải ứng dụng',
            'image_qr'               => get_theme_file_uri() . '/assets/images/qr.png',
            'link_google_play'       => 'https://store.google.com/',
            'image_google_play'      => get_theme_file_uri() . '/assets/images/apps/google-play.png',
            'link_app_store'         => 'https://www.apple.com/app-store/',
            'image_app_store'        => get_theme_file_uri() . '/assets/images/apps/apple-app-store.png',
            'social_text'            => 'Kết nối',
            'top_nav_instagram_link' => 'https://www.instagram.com/',
            'top_nav_facebook_link'  => 'https://www.facebook.com/',
            // Notification
            'image_part_1'           => get_theme_file_uri() . '/assets/images/no-banner-3.png',
            'link_part_1'            => '#',
            'image_part_2'           => get_theme_file_uri() . '/assets/images/no-banner-3.png',
            'link_part_2'            => '#',
            'image_part_3'           => get_theme_file_uri() . '/assets/images/no-banner-3.png',
            'link_part_3'            => '#',
            'image_part_4'           => get_theme_file_uri() . '/assets/images/no-banner-3.png',
            'link_part_4'            => '#',
            // Banner
            'link_banner_1'          => '#',
            'image_banner_1'         => get_theme_file_uri() . '/assets/images/no-banner-1.png',
            'link_banner_2'          => '#',
            'image_banner_2'         => get_theme_file_uri() . '/assets/images/no-banner-1.png',
            'link_banner_3'          => '#',
            'image_banner_3'         => get_theme_file_uri() . '/assets/images/no-banner-1.png',
            'link_banner_4'          => '#',
            'image_banner_4'         => get_theme_file_uri() . '/assets/images/no-banner-2.png',
            'link_banner_5'          => '#',
            'image_banner_5'         => get_theme_file_uri() . '/assets/images/no-banner-2.png',
            'link_banner_6'          => '#',
            'image_banner_6'         => get_theme_file_uri() . '/assets/images/no-banner-2.png',
            // Popular categories
            'link_popularCate_1'    => '#',
            'image_popularCate_1'   => get_theme_file_uri() . '/assets/images/no-banner-1.png',
            'text_popularCate_1'    => 'Title',
            'subText_popularCate_1' => 'Sub title',
            'color_popularCate_1'   => '#278eb0',
            'link_popularCate_2'    => '#',
            'image_popularCate_2'   => get_theme_file_uri() . '/assets/images/no-banner-1.png',
            'text_popularCate_2'    => 'Title',
            'subText_popularCate_2' => 'Sub title',
            'color_popularCate_2'   => '#278eb0',
            'link_popularCate_3'    => '#',
            'image_popularCate_3'   => get_theme_file_uri() . '/assets/images/no-banner-1.png',
            'text_popularCate_3'    => 'Title',
            'subText_popularCate_3' => 'Sub title',
            'color_popularCate_3'   => '#278eb0',
            'link_popularCate_4'    => '#',
            'image_popularCate_4'   => get_theme_file_uri() . '/assets/images/no-banner-1.png',
            'text_popularCate_4'    => 'Titlte',
            'subText_popularCate_4' => 'Sub title',
            'color_popularCate_4'   => '#278eb0',
            'link_popularCate_5'    => '#',
            'image_popularCate_5'   => get_theme_file_uri() . '/assets/images/no-banner-1.png',
            'text_popularCate_5'    => 'Title',
            'subText_popularCate_5' => 'Sub title',
            'color_popularCate_5'   => '#278eb0',
            'link_popularCate_6'    => '#',
            'image_popularCate_6'   => get_theme_file_uri() . '/assets/images/no-banner-1.png',
            'text_popularCate_6'    => 'Title',
            'subText_popularCate_6' => 'Sub title',
            'color_popularCate_6'   => '#278eb0',
            'link_popularCate_7'    => '#',
            'image_popularCate_7'   => get_theme_file_uri() . '/assets/images/no-banner-1.png',
            'text_popularCate_7'    => 'Title',
            'subText_popularCate_7' => 'Sub title',
            'color_popularCate_7'   => '#278eb0',
            'link_popularCate_8'    => '#',
            'image_popularCate_8'   => get_theme_file_uri() . '/assets/images/no-banner-1.png',
            'text_popularCate_8'    => 'Title',
            'subText_popularCate_8' => 'Sub title',
            'color_popularCate_8'   => '#278eb0',
            'link_popularCate_9'    => '#',
            'image_popularCate_9'   => get_theme_file_uri() . '/assets/images/no-banner-1.png',
            'text_popularCate_9'    => 'Title',
            'subText_popularCate_9' => 'Sub title',
            'color_popularCate_9'   => '#278eb0',
            // Footer
            'footer_text'            => 'Được tạo bởi Tien Nguyen',
            'logo_height'            => '150',
            'logo_width'             => '150',
            'site_title'             => 'tshop'
        ];

        return apply_filters('theme_options', $theme_options);
    }
}

if (!function_exists('get_default_settings')) {
    function get_default_settings()
    {
        return wp_parse_args(
            get_option('theme_options', array()),
            default_settings()
        );
    }
}
