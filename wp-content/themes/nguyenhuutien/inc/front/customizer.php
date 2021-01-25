<?php

/**
 * Customizer
 * 
 * @package TienNguyen
 * @version 1.0.0
 * 
 */

if (!function_exists('theme_customizer_register')) {
    function theme_customizer_register($wp_customize)
    {
        global $theme_options;

        // Add a panel 
        $wp_customize->add_panel(
            'theme_panel_customizer',
            [
                'title'    => __('* Theme Options', THEME_DOMAIN),
                'priority' => 1
            ]
        );

        // Top navigation section
        $wp_customize->add_section(
            'top_nav_section',
            [
                'title'    => __('Top navigation section', THEME_DOMAIN),
                'panel'    => 'theme_panel_customizer',
                'priority' => 1,
            ]
        );

        $wp_customize->add_setting(
            'theme_options[showroom_text]',
            [
                'type'      => 'option',
                'default'   => $theme_options['showroom_text'],
                'transport' => 'postMessage'
            ]
        );

        $wp_customize->selective_refresh->add_partial(
            'theme_options[showroom_text]',
            [
                'selector'            => '#showroomText',
                'fallback_refresh'    => false,
                'container_inclusive' => true,
                'render_callback'     => function () {
                    $txtShowroom = get_option('theme_options', array())['showroom_text'];
?>
            <span id="showroomText" class="header__navbar-title"><?php echo esc_html($txtShowroom); ?></span>
        <?php
                }
            ]
        );

        $wp_customize->add_control(
            'showroom_text',
            [
                'label'    => __('Showroom system text', THEME_DOMAIN),
                'type'     => 'text',
                'section'  => 'top_nav_section',
                'settings' => 'theme_options[showroom_text]',
            ]
        );

        $wp_customize->add_setting(
            'theme_options[showroom_link]',
            [
                'type'      => 'option',
                'default'   => $theme_options['showroom_link'],
                'transport' => 'postMessage'
            ]
        );

        $wp_customize->add_control(
            'showroom_link',
            [
                'label'    => __('Showroom system link', THEME_DOMAIN),
                'type'     => 'text',
                'section'  => 'top_nav_section',
                'settings' => 'theme_options[showroom_link]',
            ]
        );

        $wp_customize->add_setting(
            'theme_options[support_text]',
            [
                'type'      => 'option',
                'default'   => $theme_options['support_text'],
                'transport' => 'postMessage'
            ]
        );

        $wp_customize->selective_refresh->add_partial(
            'theme_options[support_text]',
            [
                'selector'            => '#supportText',
                'fallback_refresh'    => false,
                'container_inclusive' => true,
                'render_callback'     => function () {
                    global $theme_options;
                    $txtShowroom = get_option('theme_options', array())['support_text'];
        ?>
            <p id="supportText" class="header__navbar-title"><?php echo esc_html($txtShowroom); ?><span id="subSupportText"><?php echo esc_html($theme_options['sub_support_text']); ?></span></p>
        <?php
                }
            ]
        );

        $wp_customize->add_control(
            'support_text',
            [
                'label'    => __('Support text', THEME_DOMAIN),
                'type'     => 'text',
                'section'  => 'top_nav_section',
                'settings' => 'theme_options[support_text]',
            ]
        );

        $wp_customize->add_setting(
            'theme_options[sub_support_text]',
            [
                'type'      => 'option',
                'default'   => $theme_options['sub_support_text'],
                'transport' => 'postMessage'
            ]
        );

        $wp_customize->selective_refresh->add_partial(
            'theme_options[sub_support_text]',
            [
                'selector'            => '#subSupportText',
                'fallback_refresh'    => false,
                'container_inclusive' => true,
                'render_callback'     => function () {
                    $txtSubsupport = get_option('theme_options', array())['sub_support_text'];
        ?>
            <span id="subSupportText"><?php echo esc_html($txtSubsupport); ?></span>
        <?php
                }
            ]
        );

        $wp_customize->add_control(
            'sub_support_text',
            [
                'label'    => __('Support text', THEME_DOMAIN),
                'type'     => 'text',
                'section'  => 'top_nav_section',
                'settings' => 'theme_options[sub_support_text]',
            ]
        );

        $wp_customize->add_setting(
            'theme_options[support_link]',
            [
                'type'      => 'option',
                'default'   => $theme_options['support_link'],
                'transport' => 'postMessage'
            ]
        );

        $wp_customize->add_control(
            'theme_options[support_link]',
            [
                'label'    => __('Support link', THEME_DOMAIN),
                'type'     => 'text',
                'section'  => 'top_nav_section',
                'settings' => 'theme_options[support_link]',
            ]
        );

        $wp_customize->add_setting(
            'theme_options[advisory_text]',
            [
                'type'      => 'option',
                'default'   => $theme_options['advisory_text'],
                'transport' => 'postMessage'
            ]
        );

        $wp_customize->selective_refresh->add_partial(
            'theme_options[advisory_text]',
            [
                'selector'            => '#advisoryText',
                'fallback_refresh'    => false,
                'container_inclusive' => true,
                'render_callback'     => function () {
                    global $theme_options;
                    $txtAdvisory = get_option('theme_options', array())['advisory_text'];
        ?>
            <p id="advisoryText" class="header__navbar-title"><?php echo esc_html($txtAdvisory) ?><span id="subAdvisoryText"><?php echo esc_html($theme_options['sub_advisory_text']); ?></span></p>
        <?php
                }
            ]
        );

        $wp_customize->add_control(
            'advisory_text',
            [
                'label'    => __('Advisory text', THEME_DOMAIN),
                'type'     => 'text',
                'section'  => 'top_nav_section',
                'settings' => 'theme_options[advisory_text]',
            ]
        );

        $wp_customize->add_setting(
            'theme_options[sub_advisory_text]',
            [
                'type'      => 'option',
                'default'   => $theme_options['sub_advisory_text'],
                'transport' => 'postMessage'
            ]
        );

        $wp_customize->selective_refresh->add_partial(
            'theme_options[sub_advisory_text]',
            [
                'selector'            => '#subAdvisoryText',
                'fallback_refresh'    => false,
                'container_inclusive' => true,
                'render_callback'     => function () {
                    $txtSubadvisory = get_option('theme_options', array())['sub_advisory_text'];
        ?>
            <span id="subAdvisoryText"><?php echo esc_html($txtSubadvisory); ?></span>
        <?php
                }
            ]
        );

        $wp_customize->add_control(
            'sub_advisory_text',
            [
                'label'    => __('Sub advisory text', THEME_DOMAIN),
                'type'     => 'text',
                'section'  => 'top_nav_section',
                'settings' => 'theme_options[sub_advisory_text]',
            ]
        );

        $wp_customize->add_setting(
            'theme_options[advisory_link]',
            [
                'type'      => 'option',
                'default'   => $theme_options['advisory_link'],
                'transport' => 'postMessage'
            ]
        );

        $wp_customize->add_control(
            'advisory_link',
            [
                'label'    => __('Advisory link', THEME_DOMAIN),
                'type'     => 'text',
                'section'  => 'top_nav_section',
                'settings' => 'theme_options[link]',
            ]
        );

        $wp_customize->add_setting(
            'theme_options[technology_news_text]',
            [
                'type'      => 'option',
                'default'   => $theme_options['technology_news_text'],
                'transport' => 'postMessage'
            ]
        );

        $wp_customize->selective_refresh->add_partial(
            'theme_options[technology_news_text]',
            [
                'selector'            => '#technologyNews',
                'fallback_refresh'    => false,
                'container_inclusive' => true,
                'render_callback'     => function () {
                    $txtTechnews = get_option('theme_options', array())['technology_news_text'];
        ?>
            <span id="technologyNews" class="header__navbar-title"><?php echo esc_html($txtTechnews); ?></span>
        <?php
                }
            ]
        );

        $wp_customize->add_control(
            'technology_news_text',
            [
                'label'    => __('Technology news text', THEME_DOMAIN),
                'type'     => 'text',
                'section'  => 'top_nav_section',
                'settings' => 'theme_options[technology_news_text]',
            ]
        );

        $wp_customize->add_setting(
            'theme_options[technology_news_link]',
            [
                'type'      => 'option',
                'default'   => $theme_options['technology_news_link'],
                'transport' => 'postMessage'
            ]
        );

        $wp_customize->add_control(
            'technology_news_link',
            [
                'label'    => __('Technology news link', THEME_DOMAIN),
                'type'     => 'text',
                'section'  => 'top_nav_section',
                'settings' => 'theme_options[technology_news_link]',
            ]
        );

        $wp_customize->add_setting(
            'theme_options[down_apps_text]',
            [
                'type'      => 'option',
                'default'   => $theme_options['down_apps_text'],
                'transport' => 'postMessage'
            ]
        );

        $wp_customize->selective_refresh->add_partial(
            'theme_options[down_apps_text]',
            [
                'selector'            => '#downApps',
                'fallback_refresh'    => false,
                'container_inclusive' => true,
                'render_callback'     => function () {
                    $txtTechnews = get_option('theme_options', array())['down_apps_text'];
        ?>
            <span id="downApps" class="header__navbar-title"><?php echo esc_html($txtTechnews); ?></span>
        <?php
                }
            ]
        );

        $wp_customize->add_control(
            'down_apps_text',
            [
                'label'    => __('Download apps text', THEME_DOMAIN),
                'type'     => 'text',
                'section'  => 'top_nav_section',
                'settings' => 'theme_options[down_apps_text]',
            ]
        );

        $wp_customize->add_setting(
            'theme_options[image_qr]',
            [
                'default'   => $theme_options['image_qr'],
                'transport' => 'postMessage',
                'type'      => 'option'
            ]
        );

        $wp_customize->selective_refresh->add_partial(
            'theme_options[image_qr]',
            [
                'selector'            => '.header__qr',
                'fallback_refresh'    => false,
                'container_inclusive' => true,
                'render_callback'     => function () {
                    global $theme_options;
                    $srcImageqr = get_option('theme_options', array())['image_qr'];
        ?>

            <div class="header__qr">
                <img src="<?php echo esc_url($srcImageqr); ?>" alt="<?php echo esc_attr('Image QR', THEME_DOMAIN) ?>" class="header__qr-img">
                <div class="header__qr-apps">
                    <a href="#" class="header__qr-link">
                        <img src="<?php echo esc_url($theme_options['image_google_play']); ?>" alt="Google store" class="header__qr-download-img">
                    </a>
                    <a href="#" class="header__qr-link">
                        <img src="<?php echo esc_url($theme_options['image_app_store']) ?>" alt="App store" class="header__qr-download-img">
                    </a>
                </div>
            </div>
        <?php
                }
            ]
        );

        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'image_qr',
                [
                    'label'    => __('Image QR', THEME_DOMAIN),
                    'section'  => 'top_nav_section',
                    'settings' => 'theme_options[image_qr]',
                ]
            )
        );

        $wp_customize->add_setting(
            'theme_options[link_google_play]',
            [
                'default'   => $theme_options['link_google_play'],
                'transport' => 'postMessage',
                'type'      => 'option'
            ]
        );

        $wp_customize->add_control(
            'link_google_play',
            [
                'label'    => __('Link google store', THEME_DOMAIN),
                'type'     => 'text',
                'section'  => 'top_nav_section',
                'settings' => 'theme_options[link_google_play]',
            ]
        );

        $wp_customize->add_setting(
            'theme_options[image_google_play]',
            [
                'default'   => $theme_options['image_google_play'],
                'transport' => 'postMessage',
                'type'      => 'option'
            ]
        );

        $wp_customize->selective_refresh->add_partial(
            'theme_options[image_google_play]',
            [
                'selector'            => '#header__qr-link--google',
                'fallback_refresh'    => false,
                'container_inclusive' => true,
                'render_callback'     => function () {
                    global $theme_options;
                    $srcImagegoogle = get_option('theme_options', array())['image_google_play'];
        ?>
            <a href="<?php echo esc_url($theme_options['link_google_play']); ?>" id="header__qr-link--google" class="header__qr-link">
                <img src="<?php echo esc_url($srcImagegoogle); ?>" alt="Google store" class="header__qr-download-img ">
            </a>
        <?php
                }
            ]
        );

        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'image_google_play',
                [
                    'label'    => __('Image Google Play', THEME_DOMAIN),
                    'section'  => 'top_nav_section',
                    'settings' => 'theme_options[image_google_play]',
                ]
            )
        );

        $wp_customize->add_setting(
            'theme_options[link_app_store]',
            [
                'default'   => $theme_options['link_app_store'],
                'transport' => 'postMessage',
                'type'      => 'option'
            ]
        );

        $wp_customize->add_control(
            'link_app_store',
            [
                'label'    => __('Link google store', THEME_DOMAIN),
                'type'     => 'text',
                'section'  => 'top_nav_section',
                'settings' => 'theme_options[link_app_store]',
            ]
        );

        $wp_customize->add_setting(
            'theme_options[image_app_store]',
            [
                'default'   => $theme_options['image_app_store'],
                'transport' => 'postMessage',
                'type'      => 'option'
            ]
        );

        $wp_customize->selective_refresh->add_partial(
            'theme_options[image_app_store]',
            [
                'selector'            => '#header__qr-link--appstore',
                'fallback_refresh'    => false,
                'container_inclusive' => true,
                'render_callback'     => function () {
                    global $theme_options;
                    $srcImageappstore = get_option('theme_options', array())['image_app_store'];
        ?>
            <a href="<?php echo esc_url($theme_options['link_app_store']); ?>" id="header__qr-link--appstore" class="header__qr-link">
                <img src="<?php echo esc_url($srcImageappstore); ?>" alt="App store" class="header__qr-download-img ">
            </a>
        <?php
                }
            ]
        );

        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'image_app_store',
                [
                    'label'    => __('Image App Store', THEME_DOMAIN),
                    'section'  => 'top_nav_section',
                    'settings' => 'theme_options[image_app_store]',
                ]
            )
        );

        $wp_customize->add_setting(
            'theme_options[social_text]',
            [
                'default'   => $theme_options['social_text'],
                'transport' => 'postMessage',
                'type'      => 'option'
            ]
        );

        $wp_customize->selective_refresh->add_partial(
            'theme_options[social_text]',
            [
                'selector'            => '#socialText',
                'fallback_refresh'    => false,
                'container_inclusive' => true,
                'render_callback'     => function () {
                    $txtSocial = get_option('theme_options', array())['social_text'];
        ?>
            <span id="socialText" class="header__navbar-title"><?php echo esc_html($txtSocial); ?></span>
        <?php
                }
            ]
        );

        $wp_customize->add_control(
            'social_text',
            [
                'label'    => __('Social text', THEME_DOMAIN),
                'type'     => 'text',
                'section'  => 'top_nav_section',
                'settings' => 'theme_options[social_text]',
            ]
        );

        $wp_customize->add_setting(
            'theme_options[top_nav_facebook_link]',
            [
                'default'   => $theme_options['top_nav_facebook_link'],
                'transport' => 'postMessage',
                'type'      => 'option'
            ]
        );

        $wp_customize->add_control(
            'top_nav_facebook',
            [
                'label'    => __('Link to facebook', THEME_DOMAIN),
                'type'     => 'text',
                'section'  => 'top_nav_section',
                'settings' => 'theme_options[top_nav_facebook_link]',
            ]
        );

        $wp_customize->add_setting(
            'theme_options[top_nav_instagram_link]',
            [
                'default'   => $theme_options['top_nav_instagram_link'],
                'transport' => 'postMessage',
                'type'      => 'option'
            ]
        );

        $wp_customize->add_control(
            'top_nav_instagram_link',
            [
                'label'    => __('Link to instagram', THEME_DOMAIN),
                'type'     => 'text',
                'section'  => 'top_nav_section',
                'settings' => 'theme_options[top_nav_instagram_link]',
            ]
        );
        // End navigation section

        // Banners section 
        $wp_customize->add_section(
            'banners_section',
            [
                'title'    => __('Banners section', THEME_DOMAIN),
                'panel'    => 'theme_panel_customizer',
                'priority' => 1,
            ]
        );

        $wp_customize->add_setting(
            'theme_options[image_banner_1]',
            [
                'default'    => $theme_options['image_banner_1'],
                'transport'  => 'postMessage',
                'type'       => 'option'
            ]
        );

        $wp_customize->selective_refresh->add_partial(
            'theme_options[image_banner_1]',
            [
                'selector' => '#banners-carousel__item--1',
                'fallback_refresh'    => false,
                'container_inclusive' => true,
                'render_callback' => function () {
                    global $theme_options;
                    $srcImagebanner = get_option('theme_options', array())['image_banner_1'];
        ?>
            <div class="banners-carousel__item" id="banners-carousel__item--1">
                <a href="<?php echo esc_url($theme_options['link_banner_1']); ?>" class="banners-carousel__link">
                    <img src="<?php echo esc_url($srcImagebanner); ?>" alt="<?php echo _e('Banner right 1', THEME_DOMAIN); ?>" class="banners-carousel__img">
                </a>
            </div>
        <?php
                }
            ]
        );

        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'image_banner_1',
                [
                    'label'    => __('1. Image banner right', THEME_DOMAIN),
                    'section'  => 'banners_section',
                    'settings' => 'theme_options[image_banner_1]',
                ]
            )
        );

        $wp_customize->add_setting(
            'theme_options[link_banner_1]',
            [
                'default'   => $theme_options['link_banner_1'],
                'transport' => 'postMessage',
                'type'      => 'option'
            ]
        );

        $wp_customize->add_control(
            'link_banner_1',
            [
                'label'   => __('Link banner right', THEME_DOMAIN),
                'type'    => 'text',
                'section' => 'banners_section',
                'settings' => 'theme_options[link_banner_1]'
            ]
        );

        $wp_customize->add_setting(
            'theme_options[image_banner_2]',
            [
                'default'   => $theme_options['image_banner_2'],
                'transport' => 'postMessage',
                'type'      => 'option'
            ]
        );

        $wp_customize->selective_refresh->add_partial(
            'theme_options[image_banner_2]',
            [
                'selector'            => '#banners-carousel__item--2',
                'fallback_refresh'    => false,
                'container_inclusive' => true,
                'render_callback'     => function () {
                    global $theme_options;
                    $srcImagebanner = get_option('theme_options', array())['image_banner_2'];
        ?>
            <div class="banners-carousel__item" id="banners-carousel__item--2">
                <a href="<?php echo esc_url($theme_options['link_banner_2']); ?>" class="banners-carousel__link">
                    <img src="<?php echo esc_url($srcImagebanner); ?>" alt="<?php echo _e('Banner right 2', THEME_DOMAIN); ?>" class="banners-carousel__img">
                </a>
            </div>
        <?php
                }
            ]
        );

        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'image_banner_2',
                [
                    'label'    => __('2. Image banner right', THEME_DOMAIN),
                    'section'  => 'banners_section',
                    'settings' => 'theme_options[image_banner_2]',
                ]
            )
        );

        $wp_customize->add_setting(
            'theme_options[link_banner_2]',
            [
                'default'   => $theme_options['link_banner_2'],
                'transport' => 'postMessage',
                'type'      => 'option'
            ]
        );

        $wp_customize->add_control(
            'link_banner_2',
            [
                'label'   => __('Link banner right', THEME_DOMAIN),
                'type'    => 'text',
                'section' => 'banners_section',
                'settings' => 'theme_options[link_banner_2]'
            ]
        );

        $wp_customize->add_setting(
            'theme_options[image_banner_3]',
            [
                'default'    => $theme_options['image_banner_3'],
                'transport' => 'postMessage',
                'type'       => 'option'
            ]
        );

        $wp_customize->selective_refresh->add_partial(
            'theme_options[image_banner_3]',
            [
                'selector' => '#banners-carousel__item--3',
                'fallback_refresh'    => false,
                'container_inclusive' => true,
                'render_callback'     => function () {
                    global $theme_options;
                    $srcImagebanner = get_option('theme_options', array())['image_banner_3'];
        ?>
            <div class="banners-carousel__item" id="banners-carousel__item--3">
                <a href="<?php echo esc_url($theme_options['link_banner_3']); ?>" class="banners-carousel__link">
                    <img src="<?php echo esc_url($srcImagebanner); ?>" alt="<?php echo _e('Banner right 3', THEME_DOMAIN); ?>" class="banners-carousel__img">
                </a>
            </div>
        <?php
                }
            ]
        );

        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'image_banner_3',
                [
                    'label'    => __('3. Image banner right', THEME_DOMAIN),
                    'section'  => 'banners_section',
                    'settings' => 'theme_options[image_banner_3]',
                ]
            )
        );

        $wp_customize->add_setting(
            'theme_options[link_banner_3]',
            [
                'default'   => $theme_options['link_banner_3'],
                'transport' => 'postMessage',
                'type'      => 'option'
            ]
        );

        $wp_customize->add_control(
            'link_banner_3',
            [
                'label'   => __('Link banner right', THEME_DOMAIN),
                'type'    => 'text',
                'section' => 'banners_section',
                'settings' => 'theme_options[link_banner_3]'
            ]
        );

        $wp_customize->add_setting(
            'theme_options[image_banner_4]',
            [
                'default'    => $theme_options['image_banner_4'],
                'transport' => 'postMessage',
                'type'       => 'option'
            ]
        );

        $wp_customize->selective_refresh->add_partial(
            'theme_options[image_banner_4]',
            [
                'selector' => '#banners__item--1',
                'fallback_refresh'    => false,
                'container_inclusive' => true,
                'render_callback'     => function () {
                    global $theme_options;
                    $srcImagebanner = get_option('theme_options', array())['image_banner_4'];
        ?>
            <div class="banners__item" id="banners__item--1">
                <a href="<?php echo esc_url($theme_options['link_banner_4']); ?>" class="banners__link">
                    <img src="<?php echo esc_url($srcImagebanner); ?>" alt="<?php echo _e('Banner bottom 1'); ?>" class="banners__img">
                </a>
            </div>
        <?php
                }
            ]
        );

        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'image_banner_4',
                [
                    'label'    => __('4. Image banner bottom', THEME_DOMAIN),
                    'section'  => 'banners_section',
                    'settings' => 'theme_options[image_banner_4]',
                ]
            )
        );

        $wp_customize->add_setting(
            'theme_options[link_banner_4]',
            [
                'default'   => $theme_options['link_banner_4'],
                'transport' => 'postMessage',
                'type'      => 'option'
            ]
        );

        $wp_customize->add_control(
            'link_banner_4',
            [
                'label'   => __('Link banner bottom', THEME_DOMAIN),
                'type'    => 'text',
                'section' => 'banners_section',
                'settings' => 'theme_options[link_banner_4]'
            ]
        );

        $wp_customize->add_setting(
            'theme_options[image_banner_5]',
            [
                'default'    => $theme_options['image_banner_5'],
                'transport' => 'postMessage',
                'type'       => 'option'
            ]
        );

        $wp_customize->selective_refresh->add_partial(
            'theme_options[image_banner_5]',
            [
                'selector' => '#banners__item--2',
                'fallback_refresh'    => false,
                'container_inclusive' => true,
                'render_callback'     => function () {
                    global $theme_options;
                    $srcImagebanner = get_option('theme_options', array())['image_banner_5'];
        ?>
            <div class="banners__item" id="banners__item--2">
                <a href="<?php echo esc_url($theme_options['link_banner_5']); ?>" class="banners__link">
                    <img src="<?php echo esc_url($srcImagebanner); ?>" alt="<?php echo _e('Banner bottom 2'); ?>" class="banners__img">
                </a>
            </div>
        <?php
                }
            ]
        );

        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'image_banner_5',
                [
                    'label'    => __('5. Image banner bottom', THEME_DOMAIN),
                    'section'  => 'banners_section',
                    'settings' => 'theme_options[image_banner_5]',
                ]
            )
        );

        $wp_customize->add_setting(
            'theme_options[link_banner_5]',
            [
                'default'   => $theme_options['link_banner_5'],
                'transport' => 'postMessage',
                'type'      => 'option'
            ]
        );

        $wp_customize->add_control(
            'link_banner_5',
            [
                'label'   => __('Link banner bottom', THEME_DOMAIN),
                'type'    => 'text',
                'section' => 'banners_section',
                'settings' => 'theme_options[link_banner_5]'
            ]
        );

        $wp_customize->add_setting(
            'theme_options[image_banner_6]',
            [
                'default'    => $theme_options['image_banner_6'],
                'transport' => 'postMessage',
                'type'       => 'option'
            ]
        );

        $wp_customize->selective_refresh->add_partial(
            'theme_options[image_banner_6]',
            [
                'selector' => '#banners__item--3',
                'fallback_refresh'    => false,
                'container_inclusive' => true,
                'render_callback'     => function () {
                    global $theme_options;
                    $srcImagebanner = get_option('theme_options', array())['image_banner_6'];
        ?>
            <div class="banners__item" id="banners__item--3">
                <a href="<?php echo esc_url($theme_options['link_banner_6']); ?>" class="banners__link">
                    <img src="<?php echo esc_url($srcImagebanner); ?>" alt="<?php echo _e('Banner bottom 3'); ?>" class="banners__img">
                </a>
            </div>
        <?php
                }
            ]
        );

        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'image_banner_6',
                [
                    'label'    => __('6. Image banner bottom', THEME_DOMAIN),
                    'section'  => 'banners_section',
                    'settings' => 'theme_options[image_banner_6]',
                ]
            )
        );

        $wp_customize->add_setting(
            'theme_options[link_banner_6]',
            [
                'default'   => $theme_options['link_banner_6'],
                'type'      => 'option',
                'transport' => 'postMessage'
            ]
        );

        $wp_customize->add_control(
            'link_banner_6',
            [
                'label'   => __('Link banner bottom', THEME_DOMAIN),
                'type'    => 'text',
                'section' => 'banners_section',
                'settings' => 'theme_options[link_banner_6]'
            ]
        );
        // End banner section

        // Notification section
        $wp_customize->add_section(
            'notification_section',
            [
                'title'    => __('Notification section', THEME_DOMAIN),
                'panel'    => 'theme_panel_customizer',
                'priority' => 1,
            ]
        );

        $wp_customize->add_setting(
            'theme_options[image_part_1]',
            [
                'default'    => $theme_options['image_part_1'],
                'transport'  => 'postMessage',
                'type'       => 'option'
            ]
        );

        $wp_customize->selective_refresh->add_partial(
            'theme_options[image_part_1]',
            [
                'selector' => '#home-notification__item--1',
                'fallback_refresh'    => false,
                'container_inclusive' => true,
                'render_callback'     => function () {
                    global $theme_options;
                    $srcImagebanner = get_option('theme_options', array())['image_part_1'];
        ?>
            <div class="home-notification__item" id="home-notification__item--1">
                <a href="<?php echo esc_url($theme_options['link_part_1']); ?>" class="home-notification__link">
                    <img src="<?php echo esc_url($srcImagebanner); ?>" alt="<?php echo _e('Ảnh thông báo 1', THEME_DOMAIN); ?>">
                </a>
            </div>
        <?php
                }
            ]
        );

        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'image_part_1',
                [
                    'label'    => __('1. Image Notification', THEME_DOMAIN),
                    'section'  => 'notification_section',
                    'settings' => 'theme_options[image_part_1]',
                ]
            )
        );

        $wp_customize->add_setting(
            'theme_options[link_part_1]',
            [
                'default'   => $theme_options['link_part_1'],
                'transport' => 'postMessage',
                'type'      => 'option'
            ]
        );

        $wp_customize->add_control(
            'link_part_1',
            [
                'label'    => __('Notification link 1', THEME_DOMAIN),
                'type'     => 'text',
                'section'  => 'notification_section',
                'settings' => 'theme_options[link_part_1]',
            ]
        );

        $wp_customize->add_setting(
            'theme_options[image_part_2]',
            [
                'default'    => $theme_options['image_part_2'],
                'transport'  => 'postMessage',
                'type'       => 'option'
            ]
        );

        $wp_customize->selective_refresh->add_partial(
            'theme_options[image_part_2]',
            [
                'selector' => '#home-notification__item--2',
                'fallback_refresh'    => false,
                'container_inclusive' => true,
                'render_callback'     => function () {
                    global $theme_options;
                    $srcImagebanner = get_option('theme_options', array())['image_part_2'];
        ?>
            <div class="home-notification__item" id="home-notification__item--2">
                <a href="<?php echo esc_url($theme_options['link_part_2']); ?>" class="home-notification__link">
                    <img src="<?php echo esc_url($srcImagebanner); ?>" alt="<?php echo _e('Ảnh thông báo 2', THEME_DOMAIN); ?>">
                </a>
            </div>
        <?php
                }
            ]
        );

        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'image_part_2',
                [
                    'label'    => __('2. Image Notification', THEME_DOMAIN),
                    'section'  => 'notification_section',
                    'settings' => 'theme_options[image_part_2]'
                ]
            )
        );

        $wp_customize->add_setting(
            'theme_options[link_part_2]',
            [
                'default'   => $theme_options['link_part_2'],
                'transport' => 'postMessage',
                'type'      => 'option'
            ]
        );

        $wp_customize->add_control(
            'link_part_2',
            [
                'label'    => __('Notification link 2', THEME_DOMAIN),
                'type'     => 'text',
                'section'  => 'notification_section',
                'settings' => 'theme_options[link_part_2]'
            ]
        );

        $wp_customize->add_setting(
            'theme_options[image_part_3]',
            [
                'default'    => $theme_options['image_part_3'],
                'transport'  => 'postMessage',
                'type'       => 'option'
            ]
        );

        $wp_customize->selective_refresh->add_partial(
            'theme_options[image_part_3]',
            [
                'selector' => '#home-notification__item--3',
                'fallback_refresh'    => false,
                'container_inclusive' => true,
                'render_callback'     => function () {
                    global $theme_options;
                    $srcImagebanner = get_option('theme_options', array())['image_part_3'];
        ?>
            <div class="home-notification__item" id="home-notification__item--3">
                <a href="<?php echo esc_url($theme_options['link_part_3']); ?>" class="home-notification__link">
                    <img src="<?php echo esc_url($srcImagebanner); ?>" alt="<?php echo _e('Ảnh thông báo 3', THEME_DOMAIN); ?>">
                </a>
            </div>
        <?php
                }
            ]
        );

        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'image_part_3',
                [
                    'label'    => __('3. Image Notification', THEME_DOMAIN),
                    'section'  => 'notification_section',
                    'settings' => 'theme_options[image_part_3]',
                ]
            )
        );

        $wp_customize->add_setting(
            'theme_options[link_part_3]',
            [
                'default'   => $theme_options['link_part_3'],
                'transport' => 'postMessage',
                'type'      => 'option'
            ]
        );

        $wp_customize->add_control(
            'link_part_3',
            [
                'label'    => __('Notification link 3', THEME_DOMAIN),
                'type'     => 'text',
                'section'  => 'notification_section',
                'settings' => 'theme_options[link_part_3]',
            ]
        );

        $wp_customize->add_setting(
            'theme_options[image_part_4]',
            [
                'default'    => $theme_options['image_part_4'],
                'transport'  => 'postMessage',
                'type'       => 'option'
            ]
        );

        $wp_customize->selective_refresh->add_partial(
            'theme_options[image_part_4]',
            [
                'selector' => '#home-notification__item--4',
                'fallback_refresh'    => false,
                'container_inclusive' => true,
                'render_callback'     => function () {
                    global $theme_options;
                    $srcImagebanner = get_option('theme_options', array())['image_part_4'];
        ?>
            <div class="home-notification__item" id="home-notification__item--4">
                <a href="<?php echo esc_url($theme_options['link_part_4']); ?>" class="home-notification__link">
                    <img src="<?php echo esc_url($srcImagebanner); ?>" alt="<?php echo _e('Ảnh thông báo 4', THEME_DOMAIN); ?>">
                </a>
            </div>
        <?php
                }
            ]
        );

        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'image_part_4',
                [
                    'label'    => __('4. Image Notification', THEME_DOMAIN),
                    'section'  => 'notification_section',
                    'settings' => 'theme_options[image_part_4]',
                ]
            )
        );

        $wp_customize->add_setting(
            'theme_options[link_part_4]',
            [
                'default'   => $theme_options['link_part_4'],
                'transport' => 'postMessage',
                'type'      => 'option'
            ]
        );

        $wp_customize->add_control(
            'link_part_4',
            [
                'label'    => __('Notification link 4', THEME_DOMAIN),
                'type'     => 'text',
                'section'  => 'notification_section',
                'settings' => 'theme_options[link_part_4]',
            ]
        );
        // End notification section 

        // Popular categories
        $wp_customize->add_section(
            'popularCategories_section',
            [
                'title'    => __('Popular categories section', THEME_DOMAIN),
                'panel'    => 'theme_panel_customizer',
                'priority' => 1,
            ]
        );

        $wp_customize->add_setting(
            'theme_options[image_popularCate_1]',
            [
                'default' => $theme_options['image_popularCate_1'],
                'transport' => 'postMessage',
                'type' => 'option'
            ]
        );

        $wp_customize->selective_refresh->add_partial(
            'theme_options[image_popularCate_1]',
            [
                'selector' => '#home-popularCate__image--1',
                'fallback_refresh'    => false,
                'container_inclusive' => true,
                'render_callback'     => function () {
                    $srcImagebanner = get_option('theme_options', array())['image_popularCate_1'];
        ?>
            <div id="home-popularCate__image--1" class="home-popularCate__image home-popularCate__image--big">
                <img src="<?php echo esc_url($srcImagebanner); ?>" alt="image">
            </div>
        <?php
                }
            ]
        );

        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'image_popularCate_1',
                [
                    'label'    => __('1. Image popular category', THEME_DOMAIN),
                    'section'  => 'popularCategories_section',
                    'settings' => 'theme_options[image_popularCate_1]',
                ]
            )
        );

        $wp_customize->add_setting(
            'theme_options[link_popularCate_1]',
            [
                'default' => $theme_options['link_popularCate_1'],
                'transport' => 'postMessage',
                'type' => 'option'
            ]
        );

        $wp_customize->add_control(
            'link_popularCate_1',
            [
                'label'    => __('Link popular category', THEME_DOMAIN),
                'type'     => 'text',
                'section'  => 'popularCategories_section',
                'settings' => 'theme_options[link_popularCate_1]',
            ]
        );

        $wp_customize->add_setting(
            'theme_options[text_popularCate_1]',
            [
                'default'   => $theme_options['text_popularCate_1'],
                'transport' => 'postMessage',
                'type'      => 'option'
            ]
        );

        $wp_customize->selective_refresh->add_partial(
            'theme_options[text_popularCate_1]',
            [
                'selector'            => '#home-popularCate__title--1',
                'fallback_refresh'    => false,
                'container_inclusive' => true,
                'render_callback'     => function () {
                    $txtPopucate = get_option('theme_options', array())['text_popularCate_1'];
        ?>
            <div id="home-popularCate__title--1" class="home-popularCate__title home-popularCate__title--big text-clamp--1">
                <?php echo esc_html($txtPopucate); ?>
            </div>
        <?php
                }
            ]
        );

        $wp_customize->add_control(
            'text_popularCate_1',
            [
                'label'    => __('Text popular category', THEME_DOMAIN),
                'type'     => 'text',
                'section'  => 'popularCategories_section',
                'settings' => 'theme_options[text_popularCate_1]',
            ]
        );

        $wp_customize->add_setting(
            'theme_options[subText_popularCate_1]',
            [
                'default'   => $theme_options['subText_popularCate_1'],
                'transport' => 'postMessage',
                'type'      => 'option'
            ]
        );

        $wp_customize->selective_refresh->add_partial(
            'theme_options[subText_popularCate_1]',
            [
                'selector'            => '#home-popularCate__total--1',
                'fallback_refresh'    => false,
                'container_inclusive' => true,
                'render_callback'     => function () {
                    $txtSubPopucate = get_option('theme_options', array())['subText_popularCate_1'];
        ?>
            <div id="home-popularCate__total--1" class="home-popularCate__total">
                <?php echo esc_html($txtSubPopucate); ?>
            </div>
        <?php
                }
            ]
        );

        $wp_customize->add_control(
            'subText_popularCate_1',
            [
                'label'    => __('Sub text popular category', THEME_DOMAIN),
                'type'     => 'text',
                'section'  => 'popularCategories_section',
                'settings' => 'theme_options[subText_popularCate_1]',
            ]
        );


        $wp_customize->add_setting(
            'theme_options[color_popularCate_1]',
            [
                'default'   => $theme_options['color_popularCate_1'],
                'transport' => 'postMessage',
                'type'      => 'option'
            ]
        );

        $wp_customize->selective_refresh->add_partial(
            'theme_options[color_popularCate_1]',
            [
                'selector'            => '#home-popularCate__hoverlay--1',
                'fallback_refresh'    => false,
                'container_inclusive' => true,
                'render_callback'     => function () {
                    $colorPopucate = get_option('theme_options', array())['color_popularCate_1'];
        ?>
            <div id="home-popularCate__hoverlay--1" style="background-color: <?php echo esc_attr($colorPopucate); ?>" class="home-popularCate__hoverlay home-popularCate__hoverlay--blue"></div>
        <?php
                }
            ]
        );

        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'color_popularCate_1',
                array(
                    'label'      => __('Color popular category', THEME_DOMAIN),
                    'section'  => 'popularCategories_section',
                    'settings' => 'theme_options[color_popularCate_1]',
                )
            )
        );

        // 2 
        $wp_customize->add_section(
            'popularCategories_section',
            [
                'title'    => __('Popular categories section', THEME_DOMAIN),
                'panel'    => 'theme_panel_customizer',
                'priority' => 1,
            ]
        );

        $wp_customize->add_setting(
            'theme_options[image_popularCate_2]',
            [
                'default' => $theme_options['image_popularCate_2'],
                'transport' => 'postMessage',
                'type' => 'option'
            ]
        );

        $wp_customize->selective_refresh->add_partial(
            'theme_options[image_popularCate_2]',
            [
                'selector' => '#home-popularCate__image--2',
                'fallback_refresh'    => false,
                'container_inclusive' => true,
                'render_callback'     => function () {
                    $srcImagebanner = get_option('theme_options', array())['image_popularCate_2'];
        ?>
            <div id="home-popularCate__image--2" class="home-popularCate__image home-popularCate__image--small">
                <img src="<?php echo esc_url($srcImagebanner); ?>" alt="image">
            </div>
        <?php
                }
            ]
        );

        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'image_popularCate_2',
                [
                    'label'    => __('2. Image popular category', THEME_DOMAIN),
                    'section'  => 'popularCategories_section',
                    'settings' => 'theme_options[image_popularCate_2]',
                ]
            )
        );

        $wp_customize->add_setting(
            'theme_options[link_popularCate_2]',
            [
                'default' => $theme_options['link_popularCate_2'],
                'transport' => 'postMessage',
                'type' => 'option'
            ]
        );

        $wp_customize->add_control(
            'link_popularCate_2',
            [
                'label'    => __('Link popular category', THEME_DOMAIN),
                'type'     => 'text',
                'section'  => 'popularCategories_section',
                'settings' => 'theme_options[link_popularCate_2]',
            ]
        );

        $wp_customize->add_setting(
            'theme_options[text_popularCate_2]',
            [
                'default'   => $theme_options['text_popularCate_2'],
                'transport' => 'postMessage',
                'type'      => 'option'
            ]
        );

        $wp_customize->selective_refresh->add_partial(
            'theme_options[text_popularCate_2]',
            [
                'selector'            => '#home-popularCate__title--2',
                'fallback_refresh'    => false,
                'container_inclusive' => true,
                'render_callback'     => function () {
                    $txtPopucate = get_option('theme_options', array())['text_popularCate_2'];
        ?>
            <div id="home-popularCate__title--2" class="home-popularCate__title home-popularCate__title--small text-clamp--2">
                <?php echo esc_html($txtPopucate); ?>
            </div>
        <?php
                }
            ]
        );

        $wp_customize->add_control(
            'text_popularCate_2',
            [
                'label'    => __('Text popular category', THEME_DOMAIN),
                'type'     => 'text',
                'section'  => 'popularCategories_section',
                'settings' => 'theme_options[text_popularCate_2]',
            ]
        );

        $wp_customize->add_setting(
            'theme_options[subText_popularCate_2]',
            [
                'default'   => $theme_options['subText_popularCate_2'],
                'transport' => 'postMessage',
                'type'      => 'option'
            ]
        );

        $wp_customize->selective_refresh->add_partial(
            'theme_options[subText_popularCate_2]',
            [
                'selector'            => '#home-popularCate__total--2',
                'fallback_refresh'    => false,
                'container_inclusive' => true,
                'render_callback'     => function () {
                    $txtSubPopucate = get_option('theme_options', array())['subText_popularCate_2'];
        ?>
            <div id="home-popularCate__total--2" class="home-popularCate__total">
                <?php echo esc_html($txtSubPopucate); ?>
            </div>
        <?php
                }
            ]
        );

        $wp_customize->add_control(
            'subText_popularCate_2',
            [
                'label'    => __('Sub text popular category', THEME_DOMAIN),
                'type'     => 'text',
                'section'  => 'popularCategories_section',
                'settings' => 'theme_options[subText_popularCate_2]',
            ]
        );


        $wp_customize->add_setting(
            'theme_options[color_popularCate_2]',
            [
                'default'   => $theme_options['color_popularCate_2'],
                'transport' => 'postMessage',
                'type'      => 'option'
            ]
        );

        $wp_customize->selective_refresh->add_partial(
            'theme_options[color_popularCate_2]',
            [
                'selector'            => '#home-popularCate__hoverlay--2',
                'fallback_refresh'    => false,
                'container_inclusive' => true,
                'render_callback'     => function () {
                    $colorPopucate = get_option('theme_options', array())['color_popularCate_2'];
        ?>
            <div id="home-popularCate__hoverlay--2" style="background-color: <?php echo esc_attr($colorPopucate); ?>" class="home-popularCate__hoverlay home-popularCate__hoverlay--blue"></div>
        <?php
                }
            ]
        );

        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'color_popularCate_2',
                array(
                    'label'      => __('Color popular category', THEME_DOMAIN),
                    'section'  => 'popularCategories_section',
                    'settings' => 'theme_options[color_popularCate_2]',
                )
            )
        );

        // 3 
        $wp_customize->add_section(
            'popularCategories_section',
            [
                'title'    => __('Popular categories section', THEME_DOMAIN),
                'panel'    => 'theme_panel_customizer',
                'priority' => 1,
            ]
        );

        $wp_customize->add_setting(
            'theme_options[image_popularCate_3]',
            [
                'default' => $theme_options['image_popularCate_3'],
                'transport' => 'postMessage',
                'type' => 'option'
            ]
        );

        $wp_customize->selective_refresh->add_partial(
            'theme_options[image_popularCate_3]',
            [
                'selector' => '#home-popularCate__image--3',
                'fallback_refresh'    => false,
                'container_inclusive' => true,
                'render_callback'     => function () {
                    $srcImagebanner = get_option('theme_options', array())['image_popularCate_3'];
        ?>
            <div id="home-popularCate__image--3" class="home-popularCate__image home-popularCate__image--small">
                <img src="<?php echo esc_url($srcImagebanner); ?>" alt="image">
            </div>
        <?php
                }
            ]
        );

        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'image_popularCate_3',
                [
                    'label'    => __('3. Image popular category', THEME_DOMAIN),
                    'section'  => 'popularCategories_section',
                    'settings' => 'theme_options[image_popularCate_3]',
                ]
            )
        );

        $wp_customize->add_setting(
            'theme_options[link_popularCate_3]',
            [
                'default' => $theme_options['link_popularCate_3'],
                'transport' => 'postMessage',
                'type' => 'option'
            ]
        );

        $wp_customize->add_control(
            'link_popularCate_3',
            [
                'label'    => __('Link popular category', THEME_DOMAIN),
                'type'     => 'text',
                'section'  => 'popularCategories_section',
                'settings' => 'theme_options[link_popularCate_3]',
            ]
        );

        $wp_customize->add_setting(
            'theme_options[text_popularCate_3]',
            [
                'default'   => $theme_options['text_popularCate_3'],
                'transport' => 'postMessage',
                'type'      => 'option'
            ]
        );

        $wp_customize->selective_refresh->add_partial(
            'theme_options[text_popularCate_3]',
            [
                'selector'            => '#home-popularCate__title--3',
                'fallback_refresh'    => false,
                'container_inclusive' => true,
                'render_callback'     => function () {
                    $txtPopucate = get_option('theme_options', array())['text_popularCate_3'];
        ?>
            <div id="home-popularCate__title--3" class="home-popularCate__title home-popularCate__title--small text-clamp--2">
                <?php echo esc_html($txtPopucate); ?>
            </div>
        <?php
                }
            ]
        );

        $wp_customize->add_control(
            'text_popularCate_3',
            [
                'label'    => __('Text popular category', THEME_DOMAIN),
                'type'     => 'text',
                'section'  => 'popularCategories_section',
                'settings' => 'theme_options[text_popularCate_3]',
            ]
        );

        $wp_customize->add_setting(
            'theme_options[subText_popularCate_3]',
            [
                'default'   => $theme_options['subText_popularCate_3'],
                'transport' => 'postMessage',
                'type'      => 'option'
            ]
        );

        $wp_customize->selective_refresh->add_partial(
            'theme_options[subText_popularCate_3]',
            [
                'selector'            => '#home-popularCate__total--3',
                'fallback_refresh'    => false,
                'container_inclusive' => true,
                'render_callback'     => function () {
                    $txtSubPopucate = get_option('theme_options', array())['subText_popularCate_3'];
        ?>
            <div id="home-popularCate__total--3" class="home-popularCate__total">
                <?php echo esc_html($txtSubPopucate); ?>
            </div>
        <?php
                }
            ]
        );

        $wp_customize->add_control(
            'subText_popularCate_3',
            [
                'label'    => __('Sub text popular category', THEME_DOMAIN),
                'type'     => 'text',
                'section'  => 'popularCategories_section',
                'settings' => 'theme_options[subText_popularCate_3]',
            ]
        );


        $wp_customize->add_setting(
            'theme_options[color_popularCate_3]',
            [
                'default'   => $theme_options['color_popularCate_3'],
                'transport' => 'postMessage',
                'type'      => 'option'
            ]
        );

        $wp_customize->selective_refresh->add_partial(
            'theme_options[color_popularCate_3]',
            [
                'selector'            => '#home-popularCate__hoverlay--3',
                'fallback_refresh'    => false,
                'container_inclusive' => true,
                'render_callback'     => function () {
                    $colorPopucate = get_option('theme_options', array())['color_popularCate_3'];
        ?>
            <div id="home-popularCate__hoverlay--3" style="background-color: <?php echo esc_attr($colorPopucate); ?>" class="home-popularCate__hoverlay home-popularCate__hoverlay--blue"></div>
        <?php
                }
            ]
        );

        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'color_popularCate_3',
                array(
                    'label'      => __('Color popular category', THEME_DOMAIN),
                    'section'  => 'popularCategories_section',
                    'settings' => 'theme_options[color_popularCate_3]',
                )
            )
        );

        // 4 
        $wp_customize->add_section(
            'popularCategories_section',
            [
                'title'    => __('Popular categories section', THEME_DOMAIN),
                'panel'    => 'theme_panel_customizer',
                'priority' => 1,
            ]
        );

        $wp_customize->add_setting(
            'theme_options[image_popularCate_4]',
            [
                'default' => $theme_options['image_popularCate_4'],
                'transport' => 'postMessage',
                'type' => 'option'
            ]
        );

        $wp_customize->selective_refresh->add_partial(
            'theme_options[image_popularCate_4]',
            [
                'selector' => '#home-popularCate__image--4',
                'fallback_refresh'    => false,
                'container_inclusive' => true,
                'render_callback'     => function () {
                    $srcImagebanner = get_option('theme_options', array())['image_popularCate_4'];
        ?>
            <div id="home-popularCate__image--4" class="home-popularCate__image home-popularCate__image--small">
                <img src="<?php echo esc_url($srcImagebanner); ?>" alt="image">
            </div>
        <?php
                }
            ]
        );

        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'image_popularCate_4',
                [
                    'label'    => __('4. Image popular category', THEME_DOMAIN),
                    'section'  => 'popularCategories_section',
                    'settings' => 'theme_options[image_popularCate_4]',
                ]
            )
        );

        $wp_customize->add_setting(
            'theme_options[link_popularCate_4]',
            [
                'default' => $theme_options['link_popularCate_4'],
                'transport' => 'postMessage',
                'type' => 'option'
            ]
        );

        $wp_customize->add_control(
            'link_popularCate_4',
            [
                'label'    => __('Link popular category', THEME_DOMAIN),
                'type'     => 'text',
                'section'  => 'popularCategories_section',
                'settings' => 'theme_options[link_popularCate_4]',
            ]
        );

        $wp_customize->add_setting(
            'theme_options[text_popularCate_4]',
            [
                'default'   => $theme_options['text_popularCate_4'],
                'transport' => 'postMessage',
                'type'      => 'option'
            ]
        );

        $wp_customize->selective_refresh->add_partial(
            'theme_options[text_popularCate_4]',
            [
                'selector'            => '#home-popularCate__title--4',
                'fallback_refresh'    => false,
                'container_inclusive' => true,
                'render_callback'     => function () {
                    $txtPopucate = get_option('theme_options', array())['text_popularCate_4'];
        ?>
            <div id="home-popularCate__title--4" class="home-popularCate__title home-popularCate__title--small text-clamp--2">
                <?php echo esc_html($txtPopucate); ?>
            </div>
        <?php
                }
            ]
        );

        $wp_customize->add_control(
            'text_popularCate_4',
            [
                'label'    => __('Text popular category', THEME_DOMAIN),
                'type'     => 'text',
                'section'  => 'popularCategories_section',
                'settings' => 'theme_options[text_popularCate_4]',
            ]
        );

        $wp_customize->add_setting(
            'theme_options[subText_popularCate_4]',
            [
                'default'   => $theme_options['subText_popularCate_4'],
                'transport' => 'postMessage',
                'type'      => 'option'
            ]
        );

        $wp_customize->selective_refresh->add_partial(
            'theme_options[subText_popularCate_4]',
            [
                'selector'            => '#home-popularCate__total--4',
                'fallback_refresh'    => false,
                'container_inclusive' => true,
                'render_callback'     => function () {
                    $txtSubPopucate = get_option('theme_options', array())['subText_popularCate_4'];
        ?>
            <div id="home-popularCate__total--4" class="home-popularCate__total">
                <?php echo esc_html($txtSubPopucate); ?>
            </div>
        <?php
                }
            ]
        );

        $wp_customize->add_control(
            'subText_popularCate_4',
            [
                'label'    => __('Sub text popular category', THEME_DOMAIN),
                'type'     => 'text',
                'section'  => 'popularCategories_section',
                'settings' => 'theme_options[subText_popularCate_4]',
            ]
        );


        $wp_customize->add_setting(
            'theme_options[color_popularCate_4]',
            [
                'default'   => $theme_options['color_popularCate_4'],
                'transport' => 'postMessage',
                'type'      => 'option'
            ]
        );

        $wp_customize->selective_refresh->add_partial(
            'theme_options[color_popularCate_4]',
            [
                'selector'            => '#home-popularCate__hoverlay--4',
                'fallback_refresh'    => false,
                'container_inclusive' => true,
                'render_callback'     => function () {
                    $colorPopucate = get_option('theme_options', array())['color_popularCate_4'];
        ?>
            <div id="home-popularCate__hoverlay--4" style="background-color: <?php echo esc_attr($colorPopucate); ?>" class="home-popularCate__hoverlay home-popularCate__hoverlay--blue"></div>
        <?php
                }
            ]
        );

        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'color_popularCate_4',
                array(
                    'label'      => __('Color popular category', THEME_DOMAIN),
                    'section'  => 'popularCategories_section',
                    'settings' => 'theme_options[color_popularCate_4]',
                )
            )
        );

        // 5 
        $wp_customize->add_section(
            'popularCategories_section',
            [
                'title'    => __('Popular categories section', THEME_DOMAIN),
                'panel'    => 'theme_panel_customizer',
                'priority' => 1,
            ]
        );

        $wp_customize->add_setting(
            'theme_options[image_popularCate_5]',
            [
                'default' => $theme_options['image_popularCate_5'],
                'transport' => 'postMessage',
                'type' => 'option'
            ]
        );

        $wp_customize->selective_refresh->add_partial(
            'theme_options[image_popularCate_5]',
            [
                'selector' => '#home-popularCate__image--5',
                'fallback_refresh'    => false,
                'container_inclusive' => true,
                'render_callback'     => function () {
                    $srcImagebanner = get_option('theme_options', array())['image_popularCate_5'];
        ?>
            <div id="home-popularCate__image--5" class="home-popularCate__image home-popularCate__image--small">
                <img src="<?php echo esc_url($srcImagebanner); ?>" alt="image">
            </div>
        <?php
                }
            ]
        );

        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'image_popularCate_5',
                [
                    'label'    => __('5. Image popular category', THEME_DOMAIN),
                    'section'  => 'popularCategories_section',
                    'settings' => 'theme_options[image_popularCate_5]',
                ]
            )
        );

        $wp_customize->add_setting(
            'theme_options[link_popularCate_5]',
            [
                'default' => $theme_options['link_popularCate_5'],
                'transport' => 'postMessage',
                'type' => 'option'
            ]
        );

        $wp_customize->add_control(
            'link_popularCate_5',
            [
                'label'    => __('Link popular category', THEME_DOMAIN),
                'type'     => 'text',
                'section'  => 'popularCategories_section',
                'settings' => 'theme_options[link_popularCate_5]',
            ]
        );

        $wp_customize->add_setting(
            'theme_options[text_popularCate_5]',
            [
                'default'   => $theme_options['text_popularCate_5'],
                'transport' => 'postMessage',
                'type'      => 'option'
            ]
        );

        $wp_customize->selective_refresh->add_partial(
            'theme_options[text_popularCate_5]',
            [
                'selector'            => '#home-popularCate__title--5',
                'fallback_refresh'    => false,
                'container_inclusive' => true,
                'render_callback'     => function () {
                    $txtPopucate = get_option('theme_options', array())['text_popularCate_5'];
        ?>
            <div id="home-popularCate__title--5" class="home-popularCate__title home-popularCate__title--small text-clamp--2">
                <?php echo esc_html($txtPopucate); ?>
            </div>
        <?php
                }
            ]
        );

        $wp_customize->add_control(
            'text_popularCate_5',
            [
                'label'    => __('Text popular category', THEME_DOMAIN),
                'type'     => 'text',
                'section'  => 'popularCategories_section',
                'settings' => 'theme_options[text_popularCate_5]',
            ]
        );

        $wp_customize->add_setting(
            'theme_options[subText_popularCate_5]',
            [
                'default'   => $theme_options['subText_popularCate_5'],
                'transport' => 'postMessage',
                'type'      => 'option'
            ]
        );

        $wp_customize->selective_refresh->add_partial(
            'theme_options[subText_popularCate_5]',
            [
                'selector'            => '#home-popularCate__total--5',
                'fallback_refresh'    => false,
                'container_inclusive' => true,
                'render_callback'     => function () {
                    $txtSubPopucate = get_option('theme_options', array())['subText_popularCate_5'];
        ?>
            <div id="home-popularCate__total--5" class="home-popularCate__total">
                <?php echo esc_html($txtSubPopucate); ?>
            </div>
        <?php
                }
            ]
        );

        $wp_customize->add_control(
            'subText_popularCate_5',
            [
                'label'    => __('Sub text popular category', THEME_DOMAIN),
                'type'     => 'text',
                'section'  => 'popularCategories_section',
                'settings' => 'theme_options[subText_popularCate_5]',
            ]
        );


        $wp_customize->add_setting(
            'theme_options[color_popularCate_5]',
            [
                'default'   => $theme_options['color_popularCate_5'],
                'transport' => 'postMessage',
                'type'      => 'option'
            ]
        );

        $wp_customize->selective_refresh->add_partial(
            'theme_options[color_popularCate_5]',
            [
                'selector'            => '#home-popularCate__hoverlay--5',
                'fallback_refresh'    => false,
                'container_inclusive' => true,
                'render_callback'     => function () {
                    $colorPopucate = get_option('theme_options', array())['color_popularCate_5'];
        ?>
            <div id="home-popularCate__hoverlay--5" style="background-color: <?php echo esc_attr($colorPopucate); ?>" class="home-popularCate__hoverlay home-popularCate__hoverlay--blue"></div>
        <?php
                }
            ]
        );

        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'color_popularCate_5',
                array(
                    'label'      => __('Color popular category', THEME_DOMAIN),
                    'section'  => 'popularCategories_section',
                    'settings' => 'theme_options[color_popularCate_5]',
                )
            )
        );

        // 6 
        $wp_customize->add_section(
            'popularCategories_section',
            [
                'title'    => __('Popular categories section', THEME_DOMAIN),
                'panel'    => 'theme_panel_customizer',
                'priority' => 1,
            ]
        );

        $wp_customize->add_setting(
            'theme_options[image_popularCate_6]',
            [
                'default' => $theme_options['image_popularCate_6'],
                'transport' => 'postMessage',
                'type' => 'option'
            ]
        );

        $wp_customize->selective_refresh->add_partial(
            'theme_options[image_popularCate_6]',
            [
                'selector' => '#home-popularCate__image--6',
                'fallback_refresh'    => false,
                'container_inclusive' => true,
                'render_callback'     => function () {
                    $srcImagebanner = get_option('theme_options', array())['image_popularCate_6'];
        ?>
            <div id="home-popularCate__image--6" class="home-popularCate__image home-popularCate__image--small">
                <img src="<?php echo esc_url($srcImagebanner); ?>" alt="image">
            </div>
        <?php
                }
            ]
        );

        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'image_popularCate_6',
                [
                    'label'    => __('6. Image popular category', THEME_DOMAIN),
                    'section'  => 'popularCategories_section',
                    'settings' => 'theme_options[image_popularCate_6]',
                ]
            )
        );

        $wp_customize->add_setting(
            'theme_options[link_popularCate_6]',
            [
                'default' => $theme_options['link_popularCate_6'],
                'transport' => 'postMessage',
                'type' => 'option'
            ]
        );

        $wp_customize->add_control(
            'link_popularCate_6',
            [
                'label'    => __('Link popular category', THEME_DOMAIN),
                'type'     => 'text',
                'section'  => 'popularCategories_section',
                'settings' => 'theme_options[link_popularCate_6]',
            ]
        );

        $wp_customize->add_setting(
            'theme_options[text_popularCate_6]',
            [
                'default'   => $theme_options['text_popularCate_6'],
                'transport' => 'postMessage',
                'type'      => 'option'
            ]
        );

        $wp_customize->selective_refresh->add_partial(
            'theme_options[text_popularCate_6]',
            [
                'selector'            => '#home-popularCate__title--6',
                'fallback_refresh'    => false,
                'container_inclusive' => true,
                'render_callback'     => function () {
                    $txtPopucate = get_option('theme_options', array())['text_popularCate_6'];
        ?>
            <div id="home-popularCate__title--6" class="home-popularCate__title home-popularCate__title--small text-clamp--2">
                <?php echo esc_html($txtPopucate); ?>
            </div>
        <?php
                }
            ]
        );

        $wp_customize->add_control(
            'text_popularCate_6',
            [
                'label'    => __('Text popular category', THEME_DOMAIN),
                'type'     => 'text',
                'section'  => 'popularCategories_section',
                'settings' => 'theme_options[text_popularCate_6]',
            ]
        );

        $wp_customize->add_setting(
            'theme_options[subText_popularCate_6]',
            [
                'default'   => $theme_options['subText_popularCate_6'],
                'transport' => 'postMessage',
                'type'      => 'option'
            ]
        );

        $wp_customize->selective_refresh->add_partial(
            'theme_options[subText_popularCate_6]',
            [
                'selector'            => '#home-popularCate__total--6',
                'fallback_refresh'    => false,
                'container_inclusive' => true,
                'render_callback'     => function () {
                    $txtSubPopucate = get_option('theme_options', array())['subText_popularCate_6'];
        ?>
            <div id="home-popularCate__total--6" class="home-popularCate__total">
                <?php echo esc_html($txtSubPopucate); ?>
            </div>
        <?php
                }
            ]
        );

        $wp_customize->add_control(
            'subText_popularCate_6',
            [
                'label'    => __('Sub text popular category', THEME_DOMAIN),
                'type'     => 'text',
                'section'  => 'popularCategories_section',
                'settings' => 'theme_options[subText_popularCate_6]',
            ]
        );


        $wp_customize->add_setting(
            'theme_options[color_popularCate_6]',
            [
                'default'   => $theme_options['color_popularCate_6'],
                'transport' => 'postMessage',
                'type'      => 'option'
            ]
        );

        $wp_customize->selective_refresh->add_partial(
            'theme_options[color_popularCate_6]',
            [
                'selector'            => '#home-popularCate__hoverlay--6',
                'fallback_refresh'    => false,
                'container_inclusive' => true,
                'render_callback'     => function () {
                    $colorPopucate = get_option('theme_options', array())['color_popularCate_6'];
        ?>
            <div id="home-popularCate__hoverlay--6" style="background-color: <?php echo esc_attr($colorPopucate); ?>" class="home-popularCate__hoverlay home-popularCate__hoverlay--blue"></div>
        <?php
                }
            ]
        );

        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'color_popularCate_6',
                array(
                    'label'      => __('Color popular category', THEME_DOMAIN),
                    'section'  => 'popularCategories_section',
                    'settings' => 'theme_options[color_popularCate_6]',
                )
            )
        );

        // 7 
        $wp_customize->add_section(
            'popularCategories_section',
            [
                'title'    => __('Popular categories section', THEME_DOMAIN),
                'panel'    => 'theme_panel_customizer',
                'priority' => 1,
            ]
        );

        $wp_customize->add_setting(
            'theme_options[image_popularCate_7]',
            [
                'default' => $theme_options['image_popularCate_7'],
                'transport' => 'postMessage',
                'type' => 'option'
            ]
        );

        $wp_customize->selective_refresh->add_partial(
            'theme_options[image_popularCate_7]',
            [
                'selector' => '#home-popularCate__image--7',
                'fallback_refresh'    => false,
                'container_inclusive' => true,
                'render_callback'     => function () {
                    $srcImagebanner = get_option('theme_options', array())['image_popularCate_7'];
        ?>
            <div id="home-popularCate__image--7" class="home-popularCate__image home-popularCate__image--small">
                <img src="<?php echo esc_url($srcImagebanner); ?>" alt="image">
            </div>
        <?php
                }
            ]
        );

        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'image_popularCate_7',
                [
                    'label'    => __('7. Image popular category', THEME_DOMAIN),
                    'section'  => 'popularCategories_section',
                    'settings' => 'theme_options[image_popularCate_7]',
                ]
            )
        );

        $wp_customize->add_setting(
            'theme_options[link_popularCate_7]',
            [
                'default' => $theme_options['link_popularCate_7'],
                'transport' => 'postMessage',
                'type' => 'option'
            ]
        );

        $wp_customize->add_control(
            'link_popularCate_7',
            [
                'label'    => __('Link popular category', THEME_DOMAIN),
                'type'     => 'text',
                'section'  => 'popularCategories_section',
                'settings' => 'theme_options[link_popularCate_7]',
            ]
        );

        $wp_customize->add_setting(
            'theme_options[text_popularCate_7]',
            [
                'default'   => $theme_options['text_popularCate_7'],
                'transport' => 'postMessage',
                'type'      => 'option'
            ]
        );

        $wp_customize->selective_refresh->add_partial(
            'theme_options[text_popularCate_7]',
            [
                'selector'            => '#home-popularCate__title--7',
                'fallback_refresh'    => false,
                'container_inclusive' => true,
                'render_callback'     => function () {
                    $txtPopucate = get_option('theme_options', array())['text_popularCate_7'];
        ?>
            <div id="home-popularCate__title--7" class="home-popularCate__title home-popularCate__title--small text-clamp--2">
                <?php echo esc_html($txtPopucate); ?>
            </div>
        <?php
                }
            ]
        );

        $wp_customize->add_control(
            'text_popularCate_7',
            [
                'label'    => __('Text popular category', THEME_DOMAIN),
                'type'     => 'text',
                'section'  => 'popularCategories_section',
                'settings' => 'theme_options[text_popularCate_7]',
            ]
        );

        $wp_customize->add_setting(
            'theme_options[subText_popularCate_7]',
            [
                'default'   => $theme_options['subText_popularCate_7'],
                'transport' => 'postMessage',
                'type'      => 'option'
            ]
        );

        $wp_customize->selective_refresh->add_partial(
            'theme_options[subText_popularCate_7]',
            [
                'selector'            => '#home-popularCate__total--7',
                'fallback_refresh'    => false,
                'container_inclusive' => true,
                'render_callback'     => function () {
                    $txtSubPopucate = get_option('theme_options', array())['subText_popularCate_7'];
        ?>
            <div id="home-popularCate__total--7" class="home-popularCate__total">
                <?php echo esc_html($txtSubPopucate); ?>
            </div>
        <?php
                }
            ]
        );

        $wp_customize->add_control(
            'subText_popularCate_7',
            [
                'label'    => __('Sub text popular category', THEME_DOMAIN),
                'type'     => 'text',
                'section'  => 'popularCategories_section',
                'settings' => 'theme_options[subText_popularCate_7]',
            ]
        );


        $wp_customize->add_setting(
            'theme_options[color_popularCate_7]',
            [
                'default'   => $theme_options['color_popularCate_7'],
                'transport' => 'postMessage',
                'type'      => 'option'
            ]
        );

        $wp_customize->selective_refresh->add_partial(
            'theme_options[color_popularCate_7]',
            [
                'selector'            => '#home-popularCate__hoverlay--7',
                'fallback_refresh'    => false,
                'container_inclusive' => true,
                'render_callback'     => function () {
                    $colorPopucate = get_option('theme_options', array())['color_popularCate_7'];
        ?>
            <div id="home-popularCate__hoverlay--7" style="background-color: <?php echo esc_attr($colorPopucate); ?>" class="home-popularCate__hoverlay home-popularCate__hoverlay--blue"></div>
        <?php
                }
            ]
        );

        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'color_popularCate_7',
                array(
                    'label'      => __('Color popular category', THEME_DOMAIN),
                    'section'  => 'popularCategories_section',
                    'settings' => 'theme_options[color_popularCate_7]',
                )
            )
        );

        // 8 
        $wp_customize->add_section(
            'popularCategories_section',
            [
                'title'    => __('Popular categories section', THEME_DOMAIN),
                'panel'    => 'theme_panel_customizer',
                'priority' => 1,
            ]
        );

        $wp_customize->add_setting(
            'theme_options[image_popularCate_8]',
            [
                'default' => $theme_options['image_popularCate_8'],
                'transport' => 'postMessage',
                'type' => 'option'
            ]
        );

        $wp_customize->selective_refresh->add_partial(
            'theme_options[image_popularCate_8]',
            [
                'selector' => '#home-popularCate__image--8',
                'fallback_refresh'    => false,
                'container_inclusive' => true,
                'render_callback'     => function () {
                    $srcImagebanner = get_option('theme_options', array())['image_popularCate_8'];
        ?>
            <div id="home-popularCate__image--8" class="home-popularCate__image home-popularCate__image--small">
                <img src="<?php echo esc_url($srcImagebanner); ?>" alt="image">
            </div>
        <?php
                }
            ]
        );

        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'image_popularCate_8',
                [
                    'label'    => __('8. Image popular category', THEME_DOMAIN),
                    'section'  => 'popularCategories_section',
                    'settings' => 'theme_options[image_popularCate_8]',
                ]
            )
        );

        $wp_customize->add_setting(
            'theme_options[link_popularCate_8]',
            [
                'default' => $theme_options['link_popularCate_8'],
                'transport' => 'postMessage',
                'type' => 'option'
            ]
        );

        $wp_customize->add_control(
            'link_popularCate_8',
            [
                'label'    => __('Link popular category', THEME_DOMAIN),
                'type'     => 'text',
                'section'  => 'popularCategories_section',
                'settings' => 'theme_options[link_popularCate_8]',
            ]
        );

        $wp_customize->add_setting(
            'theme_options[text_popularCate_8]',
            [
                'default'   => $theme_options['text_popularCate_8'],
                'transport' => 'postMessage',
                'type'      => 'option'
            ]
        );

        $wp_customize->selective_refresh->add_partial(
            'theme_options[text_popularCate_8]',
            [
                'selector'            => '#home-popularCate__title--8',
                'fallback_refresh'    => false,
                'container_inclusive' => true,
                'render_callback'     => function () {
                    $txtPopucate = get_option('theme_options', array())['text_popularCate_8'];
        ?>
            <div id="home-popularCate__title--8" class="home-popularCate__title home-popularCate__title--small text-clamp--2">
                <?php echo esc_html($txtPopucate); ?>
            </div>
        <?php
                }
            ]
        );

        $wp_customize->add_control(
            'text_popularCate_8',
            [
                'label'    => __('Text popular category', THEME_DOMAIN),
                'type'     => 'text',
                'section'  => 'popularCategories_section',
                'settings' => 'theme_options[text_popularCate_8]',
            ]
        );

        $wp_customize->add_setting(
            'theme_options[subText_popularCate_8]',
            [
                'default'   => $theme_options['subText_popularCate_8'],
                'transport' => 'postMessage',
                'type'      => 'option'
            ]
        );

        $wp_customize->selective_refresh->add_partial(
            'theme_options[subText_popularCate_8]',
            [
                'selector'            => '#home-popularCate__total--8',
                'fallback_refresh'    => false,
                'container_inclusive' => true,
                'render_callback'     => function () {
                    $txtSubPopucate = get_option('theme_options', array())['subText_popularCate_8'];
        ?>
            <div id="home-popularCate__total--8" class="home-popularCate__total">
                <?php echo esc_html($txtSubPopucate); ?>
            </div>
        <?php
                }
            ]
        );

        $wp_customize->add_control(
            'subText_popularCate_8',
            [
                'label'    => __('Sub text popular category', THEME_DOMAIN),
                'type'     => 'text',
                'section'  => 'popularCategories_section',
                'settings' => 'theme_options[subText_popularCate_8]',
            ]
        );


        $wp_customize->add_setting(
            'theme_options[color_popularCate_8]',
            [
                'default'   => $theme_options['color_popularCate_8'],
                'transport' => 'postMessage',
                'type'      => 'option'
            ]
        );

        $wp_customize->selective_refresh->add_partial(
            'theme_options[color_popularCate_8]',
            [
                'selector'            => '#home-popularCate__hoverlay--8',
                'fallback_refresh'    => false,
                'container_inclusive' => true,
                'render_callback'     => function () {
                    $colorPopucate = get_option('theme_options', array())['color_popularCate_8'];
        ?>
            <div id="home-popularCate__hoverlay--8" style="background-color: <?php echo esc_attr($colorPopucate); ?>" class="home-popularCate__hoverlay home-popularCate__hoverlay--blue"></div>
        <?php
                }
            ]
        );

        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'color_popularCate_8',
                array(
                    'label'      => __('Color popular category', THEME_DOMAIN),
                    'section'  => 'popularCategories_section',
                    'settings' => 'theme_options[color_popularCate_8]',
                )
            )
        );

        // 9 
        $wp_customize->add_section(
            'popularCategories_section',
            [
                'title'    => __('Popular categories section', THEME_DOMAIN),
                'panel'    => 'theme_panel_customizer',
                'priority' => 1,
            ]
        );

        $wp_customize->add_setting(
            'theme_options[image_popularCate_9]',
            [
                'default' => $theme_options['image_popularCate_9'],
                'transport' => 'postMessage',
                'type' => 'option'
            ]
        );

        $wp_customize->selective_refresh->add_partial(
            'theme_options[image_popularCate_9]',
            [
                'selector' => '#home-popularCate__image--9',
                'fallback_refresh'    => false,
                'container_inclusive' => true,
                'render_callback'     => function () {
                    $srcImagebanner = get_option('theme_options', array())['image_popularCate_9'];
        ?>
            <div id="home-popularCate__image--9" class="home-popularCate__image home-popularCate__image--small">
                <img src="<?php echo esc_url($srcImagebanner); ?>" alt="image">
            </div>
        <?php
                }
            ]
        );

        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'image_popularCate_9',
                [
                    'label'    => __('9. Image popular category', THEME_DOMAIN),
                    'section'  => 'popularCategories_section',
                    'settings' => 'theme_options[image_popularCate_9]',
                ]
            )
        );

        $wp_customize->add_setting(
            'theme_options[link_popularCate_9]',
            [
                'default' => $theme_options['link_popularCate_9'],
                'transport' => 'postMessage',
                'type' => 'option'
            ]
        );

        $wp_customize->add_control(
            'link_popularCate_9',
            [
                'label'    => __('Link popular category', THEME_DOMAIN),
                'type'     => 'text',
                'section'  => 'popularCategories_section',
                'settings' => 'theme_options[link_popularCate_9]',
            ]
        );

        $wp_customize->add_setting(
            'theme_options[text_popularCate_9]',
            [
                'default'   => $theme_options['text_popularCate_9'],
                'transport' => 'postMessage',
                'type'      => 'option'
            ]
        );

        $wp_customize->selective_refresh->add_partial(
            'theme_options[text_popularCate_9]',
            [
                'selector'            => '#home-popularCate__title--9',
                'fallback_refresh'    => false,
                'container_inclusive' => true,
                'render_callback'     => function () {
                    $txtPopucate = get_option('theme_options', array())['text_popularCate_9'];
        ?>
            <div id="home-popularCate__title--9" class="home-popularCate__title home-popularCate__title--small text-clamp--2">
                <?php echo esc_html($txtPopucate); ?>
            </div>
        <?php
                }
            ]
        );

        $wp_customize->add_control(
            'text_popularCate_9',
            [
                'label'    => __('Text popular category', THEME_DOMAIN),
                'type'     => 'text',
                'section'  => 'popularCategories_section',
                'settings' => 'theme_options[text_popularCate_9]',
            ]
        );

        $wp_customize->add_setting(
            'theme_options[subText_popularCate_9]',
            [
                'default'   => $theme_options['subText_popularCate_9'],
                'transport' => 'postMessage',
                'type'      => 'option'
            ]
        );

        $wp_customize->selective_refresh->add_partial(
            'theme_options[subText_popularCate_9]',
            [
                'selector'            => '#home-popularCate__total--9',
                'fallback_refresh'    => false,
                'container_inclusive' => true,
                'render_callback'     => function () {
                    $txtSubPopucate = get_option('theme_options', array())['subText_popularCate_9'];
        ?>
            <div id="home-popularCate__total--9" class="home-popularCate__total">
                <?php echo esc_html($txtSubPopucate); ?>
            </div>
        <?php
                }
            ]
        );

        $wp_customize->add_control(
            'subText_popularCate_9',
            [
                'label'    => __('Sub text popular category', THEME_DOMAIN),
                'type'     => 'text',
                'section'  => 'popularCategories_section',
                'settings' => 'theme_options[subText_popularCate_9]',
            ]
        );


        $wp_customize->add_setting(
            'theme_options[color_popularCate_9]',
            [
                'default'   => $theme_options['color_popularCate_9'],
                'transport' => 'postMessage',
                'type'      => 'option'
            ]
        );

        $wp_customize->selective_refresh->add_partial(
            'theme_options[color_popularCate_9]',
            [
                'selector'            => '#home-popularCate__hoverlay--9',
                'fallback_refresh'    => false,
                'container_inclusive' => true,
                'render_callback'     => function () {
                    $colorPopucate = get_option('theme_options', array())['color_popularCate_9'];
        ?>
            <div id="home-popularCate__hoverlay--9" style="background-color: <?php echo esc_attr($colorPopucate); ?>" class="home-popularCate__hoverlay home-popularCate__hoverlay--blue"></div>
<?php
                }
            ]
        );

        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'color_popularCate_9',
                array(
                    'label'      => __('Color popular category', THEME_DOMAIN),
                    'section'  => 'popularCategories_section',
                    'settings' => 'theme_options[color_popularCate_9]',
                )
            )
        );
        // End popular categories

        // Footer
        $wp_customize->add_section(
            'footer_section',
            [
                'title'    => __('Footer section', THEME_DOMAIN),
                'panel'    => 'theme_panel_customizer',
                'priority' => 1,
            ]
        );

        $wp_customize->add_setting(
            'theme_options[footer_text]',
            [
                'default' => $theme_options['footer_text'],
                'transport' => 'postMessage'
            ]
        );

        $wp_customize->add_control(
            'footer_text',
            [
                'label' => __('Footer text', THEME_DOMAIN),
                'type' => 'text',
                'section' => 'footer_section',
                'settings' => 'theme_options[footer_text]'
            ]
        );
        // End footer

        //  Logo mobile header
        $wp_customize->add_setting(
            'theme_options[header_logo_mobile]',
            [
                'default'    => $theme_options['header_logo_mobile'],
                'capability' => 'edit_theme_options',
                'type'       => 'option'
            ]
        );

        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'header_logo_mobile',
                [
                    'label'    => __('Logo Mobile', THEME_DOMAIN),
                    'section'  => 'title_tagline',
                    'settings' => 'theme_options[header_logo_mobile]',
                    'priority' => 8,
                ]
            )
        );
        // End logo mobile header

        // Disable the automatic `refresh` behaviour. 
        $wp_customize->get_setting('blogname')->transport = 'postMessage';
        $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
        $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';
        $wp_customize->get_setting('background_color')->transport = 'postMessage';
    }

    add_action('customize_register', 'theme_customizer_register');
}
