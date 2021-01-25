<?php

/**
 * 
 * Sets up theme
 * 
 * @package TienNguyen
 * @version 1.0.0
 * 
 * @see hooks.php
 */

if (!function_exists('setup_theme')) {
    function setup_theme()
    {
        // load textdomain
        set_theme_textdomain();
        // declare theme support
        initialize_theme_support();
    }
}

if (!function_exists('set_theme_textdomain')) {
    function set_theme_textdomain()
    {
        // wp-content/languages/themes/
        // load_theme_textdomain( THEME_DOMAIN, trailingslashit( WP_LANG_DIR ) . 'themes/' );
        // wp-content/themes/[name]/languages/
        load_theme_textdomain(THEME_DOMAIN,  LANG_DIR . '/languages');
    }
}

if (!function_exists('initialize_theme_support')) {
    function initialize_theme_support()
    {
        // Set content-width.
        global $content_width;
        if (!isset($content_width)) {
            $content_width = 580;
        }

        /** 
         * Feed Links
         * https://developer.wordpress.org/reference/functions/add_theme_support/#feed-links
         */
        add_theme_support('automatic-feed-links');

        /** 
         * Title Tag 
         * https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
         */
        add_theme_support('title-tag');

        /** 
         * Post Thumbnails
         * https://developer.wordpress.org/reference/functions/add_theme_support/#post-thumbnails
         */
        add_theme_support('post-thumbnails');

        /**
         * HTML5 
         * https://developer.wordpress.org/reference/functions/add_theme_support/#html5 
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'widgets',
        ));

        add_theme_support('post-formats', array(
            'image',
            'gallery',
            'video',
            'audio',
            'quote',
            'link',
            'aside',
            'status'
        ));

        /**
         * Custom Background
         * https://developer.wordpress.org/reference/functions/add_theme_support/#custom-background
         */
        add_theme_support('custom-background', apply_filters(
            'custom_background_args',
            array(
                'default-color' => 'fcfcfc',
                'default-image' => ''
            )
        ));

        /**
         * Custom Logo
         * https://developer.wordpress.org/reference/functions/add_theme_support/#custom-logo
         */
        $logo_width = 90;
        $logo_height = 120;

        add_theme_support(
            'custom-logo',
            [
                'height' => $logo_height,
                'width'  => $logo_width,
                'flex-height' => true,
                'flex-width' => true,
            ]
        );

        /**
         * Responsive embedded content
         * https://developer.wordpress.org/block-editor/developers/themes/theme-support/#responsive-embedded-content
         */
        add_theme_support('responsive-embeds');

        // Add support for full and wide align images.
        add_theme_support('align-wide');

        /**
         * Woocommerce
         */
        add_theme_support('woocommerce');
        add_theme_support('wc-product-gallery-zoom');
        add_theme_support('wc-product-gallery-lightbox');
        add_theme_support('wc-product-gallery-slider');
    }
}

if (!function_exists('register_menus')) {
    /**
     * Register themes widgets.
     */
    function register_menus()
    {
        $locations = [
            'primary' => __('Desktop Vertical Menu', THEME_DOMAIN),
            'tablet' => __('Tablet Vertical Menu', THEME_DOMAIN),
            'top' => __('Desktop Top Menu', THEME_DOMAIN)
        ];

        register_nav_menus($locations);
    }
}

if (!function_exists('register_widgets')) {
    /**
     * Register themes widgets.
     * 
     * Remmebers dynamic classes to replace col col-*-*
     * @see widget.php
     */
    function register_widgets()
    {
        register_sidebar(
            [
                'name'          => __('Footer', THEME_DOMAIN),
                'id'            => 'footer',
                'description'   => __('Full sized footer widget with dynamic grid', THEME_DOMAIN),
                'before_widget' => '<div id="%1$s" class="%2$s dynamic-classes" >',
                'after_widget'  => '</div>',
                'before_title'  => '<h3 class="footer__heading">',
                'after_title'   => '</h3>',
            ]
        );

        register_sidebar(
            [
                'name' => __('Shop sidebar', THEME_DOMAIN),
                'id' => 'shop',
                'description'   => __('Sidebar for archive woo page', THEME_DOMAIN),
                'before_widget' => '<aside id="%1$s" class="shop-widget %1$s %2$s">',
                'after_widget'  => '</aside>',
                'before_title'  => '<h3 class="shop-widget__head">',
                'after_title'   => '</h3>'
            ]
        );
    }
}
