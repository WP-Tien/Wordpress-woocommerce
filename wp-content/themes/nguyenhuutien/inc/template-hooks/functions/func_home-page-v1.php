<?php

/**
 * Homepage template
 * 
 * @package TienNguyen
 * @version 1.0.0
 */

if (!function_exists('tpl_top_menu')) {
    function tpl_top_menu()
    {
        if (has_nav_menu('top')) {
            wp_nav_menu(
                [
                    'theme_location'  => 'top',
                    'container'       => 'div',
                    'container_class' => 'navigation',
                    'menu_class'      => 'navigation__list',
                    'depth'           => 1
                ]
            );
        } else {
?>
            <div class="notice notice__alert">
                <?php _e('Chưa thiết lập top menu !', THEME_DOMAIN); ?>
            </div>
        <?php
        }
    }
}

if (!function_exists('tpl_category_carousel')) {
    function tpl_category_carousel()
    {
        global $theme_options;
        ?>
        <section class="home-category">
            <div class="row no-gutters">
                <div class="col col-wide-2 col-large-2 col-medium-2 col-small-2 col-supersmall-2 col-tiny-2">
                    <?php
                    if (has_nav_menu('primary')) {
                        wp_nav_menu(
                            [
                                'theme_location'  => 'primary',
                                'container'       => 'div',
                                'container_class' => 'category',
                                'container_id'    => 'category',
                                'menu_class'      => 'category__list',
                                'depth'           => 3,
                                'walker'          => new Custom_Menu_Walker
                            ]
                        );
                    } else {
                    ?>
                        <div class="notice notice__alert">
                            <?php _e('Chưa thiết lập danh mục chính !', THEME_DOMAIN); ?>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <div class="col col-wide-10 col-large-10 col-medium-10 col-tiny-12">
                    <!-- Banners and Carousel -->
                    <div class="banners-carousel" id="banners-carousel">
                        <div class="row no-gutters">
                            <div class="col col-wide-8 col-large-8 col-tiny-12">
                                <div class="carousel">
                                    <button class="carousel__button carousel__button--left">
                                        <i class="icon icon--arrLeft"></i>
                                    </button>
                                    <div class="carousel__track-container">
                                        <ul class="carousel__track">
                                            <li class="carousel__slide current-slide">
                                                <a href="#" class="carousel__link">
                                                    <img class="carousel__image" src="<?php echo INCLUDE_DIR_URI . '/assets/images/slides/slide-1.jpg'; ?>" alt="slide-1">
                                                </a>
                                            </li>
                                            <li class="carousel__slide">
                                                <a href="#" class="carousel__link">
                                                    <img class="carousel__image" src="<?php echo INCLUDE_DIR_URI . '/assets/images/slides/slide-2.jpg'; ?>" alt="slide-2">
                                                </a>
                                            </li>
                                            <li class="carousel__slide">
                                                <a href="#" class="carousel__link">
                                                    <img class="carousel__image" src="<?php echo INCLUDE_DIR_URI . '/assets/images/slides/slide-3.jpg'; ?>" alt="slide-3">
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <button class="carousel__button carousel__button--right">
                                        <i class="icon icon--arrRight"></i>
                                    </button>

                                    <div class="carousel__nav">
                                        <button class="carousel__indicator is-selected"></button>
                                        <button class="carousel__indicator"></button>
                                        <button class="carousel__indicator"></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-wide-4 col-large-4 col-tiny-12">
                                <div class="row no-gutters" id="banners-right">
                                    <div class="col col-wide-12 col-large-12 col-tiny-4">
                                        <div class="banners-carousel__item" id="banners-carousel__item--1">
                                            <a href="<?php echo esc_url($theme_options['link_banner_1']); ?>" class="banners-carousel__link">
                                                <img src="<?php echo esc_url($theme_options['image_banner_1']); ?>" alt="<?php echo _e('Banner right 1', THEME_DOMAIN); ?>" class="banners-carousel__img">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col col-wide-12 col-large-12 col-tiny-4">
                                        <div class="banners-carousel__item" id="banners-carousel__item--2">
                                            <a href="<?php echo esc_url($theme_options['link_banner_2']); ?>" class="banners-carousel__link">
                                                <img src="<?php echo esc_url($theme_options['image_banner_2']); ?>" alt="<?php echo _e('Banner right 2', THEME_DOMAIN); ?>" class="banners-carousel__img">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col col-wide-12  col-large-12 col-tiny-4">
                                        <div class="banners-carousel__item" id="banners-carousel__item--3">
                                            <a href="<?php echo esc_url($theme_options['link_banner_3']); ?>" class="banners-carousel__link">
                                                <img src="<?php echo esc_url($theme_options['image_banner_3']); ?>" alt="<?php echo _e('Banner right 3', THEME_DOMAIN); ?>" class="banners-carousel__img">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Banners -->
                        <div class="row no-gutters banners" id="banners">
                            <div class="col col-wide-4 col-large-4 col-tiny-4">
                                <div class="banners__item" id="banners__item--1">
                                    <a href="<?php echo esc_url($theme_options['link_banner_4']); ?>" class="banners__link">
                                        <img src="<?php echo esc_url($theme_options['image_banner_4']); ?>" alt="<?php echo _e('Banner bottom 1'); ?>" class="banners__img">
                                    </a>
                                </div>
                            </div>
                            <div class="col col-wide-4 col-large-4 col-tiny-4">
                                <div class="banners__item" id="banners__item--2">
                                    <a href="<?php echo esc_url($theme_options['link_banner_5']); ?>" class="banners__link">
                                        <img src="<?php echo esc_url($theme_options['image_banner_5']); ?>" alt="<?php echo _e('Banner bottom 2'); ?>" class="banners__img">
                                    </a>
                                </div>
                            </div>
                            <div class="col col-wide-4 col-large-4 col-tiny-4">
                                <div class="banners__item" id="banners__item--3">
                                    <a href="<?php echo esc_url($theme_options['link_banner_6']); ?>" class="banners__link">
                                        <img src="<?php echo esc_url($theme_options['image_banner_6']); ?>" alt="<?php echo _e('Banner bottom 3'); ?>" class="banners__img">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php
    }
}

if (!function_exists('tpl_notification')) {
    function tpl_notification()
    {
        global $theme_options;
    ?>
        <section class="home-notification">
            <div class="row">
                <div class="col col-wide-3 col-medium-3 col-tiny-6">
                    <a href="<?php echo esc_url($theme_options['link_part_1']); ?>" class="home-notification__link">
                        <div class="home-notification__item" id="home-notification__item--1">

                            <img src="<?php echo esc_url($theme_options['image_part_1']); ?>" alt="<?php echo _e('Ảnh thông báo 1', THEME_DOMAIN); ?>">

                        </div>
                    </a>
                </div>
                <div class="col col-wide-3 col-medium-3 col-tiny-6">
                    <div class="home-notification__item" id="home-notification__item--2">
                        <a href="<?php echo esc_url($theme_options['link_part_2']); ?>" class="home-notification__link">
                            <img src="<?php echo esc_url($theme_options['image_part_2']) ?>" alt="<?php echo _e('Ảnh thông báo 2', THEME_DOMAIN) ?>">
                        </a>
                    </div>
                </div>
                <div class="col col-wide-3 col-medium-3 col-tiny-6 ">
                    <div class="home-notification__item" id="home-notification__item--3">
                        <a href="<?php echo esc_url($theme_options['link_part_3']); ?>" class="home-notification__link">
                            <img src="<?php echo esc_url($theme_options['image_part_3']) ?>" alt="<?php echo _e('Ảnh thông báo 3', THEME_DOMAIN); ?>">
                        </a>
                    </div>
                </div>
                <div class="col col-wide-3 col-medium-3 col-tiny-6">
                    <div class="home-notification__item" id="home-notification__item--4">
                        <a href="<?php echo esc_url($theme_options['link_part_4']); ?>" class="home-notification__link">
                            <img src="<?php echo esc_url($theme_options['image_part_4']) ?>" alt="<?php echo _e('Ảnh thông báo 4', THEME_DOMAIN) ?>">
                        </a>
                    </div>
                </div>
            </div>
        </section>
    <?php
    }
}

if (!function_exists('tpl_promotion')) {
    function tpl_promotion()
    {
        $tax_query[] = [
            'taxonomy' => 'product_visibility',
            'field'    => 'name',
            'terms'    => 'featured',
        ];

        $products = new WP_Query(
            [
                'post_type'           => 'product',
                'post_status'         => 'publish',
                'posts_per_page'      => 12,
                'ignore_sticky_posts' => 1,
                'order'               => 'DESC',
                'tax_query'           => $tax_query,
                'meta_key'            => 'flash_sale',
                'meta_value'          => 'yes'
            ]
        );
    ?>
        <section class="home-promotion">
            <div class="home-promotion__inner">
                <div class="home-promotion__header">
                    <div class="home-promotion__header-title">Siêu Khuyến Mãi</div>
                    <a class="home-promotion__header-more" href="#">
                        Xem tất cả
                        <?php the_theme_svg('arr-right', '#ffffff', 'home-promotion__header-icon');  ?>
                    </a>
                </div>
                <div class="home-promotion__body owl-carousel owl-theme" id="home-promotion__carousel">
                    <?php
                    if ($products->have_posts()) :
                        while ($products->have_posts()) : $products->the_post();
                    ?>
                            <div>
                                <?php
                                wc_get_template_part('content', 'product-carousel');
                                ?>
                            </div>
                    <?php
                        endwhile;
                        wp_reset_query();
                    endif;
                    ?>
                </div>
            </div>
        </section>
    <?php
    }
}

if (!function_exists('tpl_popularCate')) {
    function tpl_popularCate()
    {
        global $theme_options;
    ?>
        <section class="home-popularCate">
            <div class="home-popularCate__inner">
                <div class="home-popularCate__header">
                    <h3>Danh mục phổ biến</h3>
                </div>
                <div class="home-popularCate__body">
                    <div class="row no-gutters">
                        <div class="col col-wide-3 col-supersmall-12 col-tiny-12">
                            <div class="home-popularCate__item" id="">
                                <a href="<?php echo esc_url($theme_options['link_popularCate_1']); ?>" class="home-popularCate__link block">
                                    <div id="home-popularCate__image--1" class="home-popularCate__image home-popularCate__image--big">
                                        <img src="<?php echo esc_url($theme_options['image_popularCate_1']); ?>" alt="image">
                                    </div>
                                    <div id="home-popularCate__hoverlay--1" style="background-color: <?php echo esc_attr($theme_options['color_popularCate_1']); ?>" class="home-popularCate__hoverlay"></div>
                                    <div class="home-popularCate__desc">
                                        <div id="home-popularCate__title--1" class="home-popularCate__title home-popularCate__title--big text-clamp--1">
                                            <?php echo esc_html($theme_options['text_popularCate_1']); ?>
                                        </div>
                                        <div id="home-popularCate__total--1" class="home-popularCate__total">
                                            <?php echo esc_html($theme_options['subText_popularCate_1']); ?>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col col-wide-9 col-supersmall-12 col-tiny-12">
                            <div class="row no-gutters">
                                <div class="col col-wide-3 col-supersmall-6 col-tiny-6">
                                    <div class="home-popularCate__item ">
                                        <a href="<?php echo esc_url($theme_options['link_popularCate_2']); ?>" class="home-popularCate__link">
                                            <div id="home-popularCate__image--2" class="home-popularCate__image home-popularCate__image--small">
                                                <img src="<?php echo esc_url($theme_options['image_popularCate_2']); ?>" alt="image">
                                            </div>
                                            <div id="home-popularCate__hoverlay--2" style="--background-color: <?php echo esc_attr($theme_options['color_popularCate_2']); ?>" class="home-popularCate__hoverlay"></div>
                                            <div class="home-popularCate__desc home-popularCate__desc--small">
                                                <div id="home-popularCate__title--2" class="home-popularCate__title home-popularCate__title--small text-clamp--2">
                                                    <?php echo esc_html($theme_options['text_popularCate_2']); ?>
                                                </div>
                                                <div id="home-popularCate__total--2" class="home-popularCate__total">
                                                    <?php echo esc_html($theme_options['subText_popularCate_2']); ?>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col col-wide-3 col-supersmall-6 col-tiny-6">
                                    <div class="home-popularCate__item ">
                                        <a href="<?php echo esc_url($theme_options['link_popularCate_3']); ?>" class="home-popularCate__link">
                                            <div id="home-popularCate__image--3" class="home-popularCate__image home-popularCate__image--small">
                                                <img src="<?php echo esc_url($theme_options['image_popularCate_3']); ?>" alt="image">
                                            </div>
                                            <div id="home-popularCate__hoverlay--3" style="--background-color: <?php echo esc_attr($theme_options['color_popularCate_3']); ?>" class="home-popularCate__hoverlay"></div>
                                            <div class="home-popularCate__desc home-popularCate__desc--small">
                                                <div id="home-popularCate__title--3" class="home-popularCate__title home-popularCate__title--small text-clamp--2">
                                                    <?php echo esc_html($theme_options['text_popularCate_3']); ?>
                                                </div>
                                                <div id="home-popularCate__total--3" class="home-popularCate__total">
                                                    <?php echo esc_html($theme_options['subText_popularCate_3']); ?>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col col-wide-3 col-supersmall-6 col-tiny-6">
                                    <div class="home-popularCate__item ">
                                        <a href="<?php echo esc_url($theme_options['link_popularCate_4']); ?>" class="home-popularCate__link">
                                            <div id="home-popularCate__image--4" class="home-popularCate__image home-popularCate__image--small">
                                                <img src="<?php echo esc_url($theme_options['image_popularCate_4']); ?>" alt="image">
                                            </div>
                                            <div id="home-popularCate__hoverlay--4" style="--background-color: <?php echo esc_attr($theme_options['color_popularCate_4']); ?>" class="home-popularCate__hoverlay"></div>
                                            <div class="home-popularCate__desc home-popularCate__desc--small">
                                                <div id="home-popularCate__title--4" class="home-popularCate__title home-popularCate__title--small text-clamp--2">
                                                    <?php echo esc_html($theme_options['text_popularCate_4']); ?>
                                                </div>
                                                <div id="home-popularCate__total--4" class="home-popularCate__total">
                                                    <?php echo esc_html($theme_options['subText_popularCate_4']); ?>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col col-wide-3 col-supersmall-6 col-tiny-6">
                                    <div class="home-popularCate__item ">
                                        <a href="<?php echo esc_url($theme_options['link_popularCate_5']); ?>" class="home-popularCate__link">
                                            <div id="home-popularCate__image--5" class="home-popularCate__image home-popularCate__image--small">
                                                <img src="<?php echo esc_url($theme_options['image_popularCate_5']); ?>" alt="image">
                                            </div>
                                            <div id="home-popularCate__hoverlay--5" style="--background-color: <?php echo esc_attr($theme_options['color_popularCate_5']); ?>" class="home-popularCate__hoverlay"></div>
                                            <div class="home-popularCate__desc home-popularCate__desc--small">
                                                <div id="home-popularCate__title--5" class="home-popularCate__title home-popularCate__title--small text-clamp--2">
                                                    <?php echo esc_html($theme_options['text_popularCate_5']); ?>
                                                </div>
                                                <div id="home-popularCate__total--5" class="home-popularCate__total">
                                                    <?php echo esc_html($theme_options['subText_popularCate_5']); ?>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col col-wide-3 col-supersmall-6 col-tiny-6">
                                    <div class="home-popularCate__item ">
                                        <a href="<?php echo esc_url($theme_options['link_popularCate_6']); ?>" class="home-popularCate__link">
                                            <div id="home-popularCate__image--6" class="home-popularCate__image home-popularCate__image--small">
                                                <img src="<?php echo esc_url($theme_options['image_popularCate_6']); ?>" alt="image">
                                            </div>
                                            <div id="home-popularCate__hoverlay--6" style="--background-color: <?php echo esc_attr($theme_options['color_popularCate_6']); ?>" class="home-popularCate__hoverlay"></div>
                                            <div class="home-popularCate__desc home-popularCate__desc--small">
                                                <div id="home-popularCate__title--6" class="home-popularCate__title home-popularCate__title--small text-clamp--2">
                                                    <?php echo esc_html($theme_options['text_popularCate_6']); ?>
                                                </div>
                                                <div id="home-popularCate__total--6" class="home-popularCate__total">
                                                    <?php echo esc_html($theme_options['subText_popularCate_6']); ?>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col col-wide-3 col-supersmall-6 col-tiny-6">
                                    <div class="home-popularCate__item ">
                                        <a href="<?php echo esc_url($theme_options['link_popularCate_7']); ?>" class="home-popularCate__link">
                                            <div id="home-popularCate__image--7" class="home-popularCate__image home-popularCate__image--small">
                                                <img src="<?php echo esc_url($theme_options['image_popularCate_7']); ?>" alt="image">
                                            </div>
                                            <div id="home-popularCate__hoverlay--7" style="--background-color: <?php echo esc_attr($theme_options['color_popularCate_7']); ?>" class="home-popularCate__hoverlay"></div>
                                            <div class="home-popularCate__desc home-popularCate__desc--small">
                                                <div id="home-popularCate__title--7" class="home-popularCate__title home-popularCate__title--small text-clamp--2">
                                                    <?php echo esc_html($theme_options['text_popularCate_7']); ?>
                                                </div>
                                                <div id="home-popularCate__total--7" class="home-popularCate__total">
                                                    <?php echo esc_html($theme_options['subText_popularCate_7']); ?>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col col-wide-3 col-supersmall-6 col-tiny-6">
                                    <div class="home-popularCate__item ">
                                        <a href="<?php echo esc_url($theme_options['link_popularCate_8']); ?>" class="home-popularCate__link">
                                            <div id="home-popularCate__image--8" class="home-popularCate__image home-popularCate__image--small">
                                                <img src="<?php echo esc_url($theme_options['image_popularCate_8']); ?>" alt="image">
                                            </div>
                                            <div id="home-popularCate__hoverlay--8" style="--background-color: <?php echo esc_attr($theme_options['color_popularCate_8']); ?>" class="home-popularCate__hoverlay"></div>
                                            <div class="home-popularCate__desc home-popularCate__desc--small">
                                                <div id="home-popularCate__title--8" class="home-popularCate__title home-popularCate__title--small text-clamp--2">
                                                    <?php echo esc_html($theme_options['text_popularCate_8']); ?>
                                                </div>
                                                <div id="home-popularCate__total--8" class="home-popularCate__total">
                                                    <?php echo esc_html($theme_options['subText_popularCate_8']); ?>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col col-wide-3 col-supersmall-6 col-tiny-6">
                                    <div class="home-popularCate__item ">
                                        <a href="<?php echo esc_url($theme_options['link_popularCate_9']); ?>" class="home-popularCate__link">
                                            <div id="home-popularCate__image--9" class="home-popularCate__image home-popularCate__image--small">
                                                <img src="<?php echo esc_url($theme_options['image_popularCate_9']); ?>" alt="image">
                                            </div>
                                            <div id="home-popularCate__hoverlay--9" style="--background-color: <?php echo esc_attr($theme_options['color_popularCate_9']); ?>" class="home-popularCate__hoverlay"></div>
                                            <div class="home-popularCate__desc home-popularCate__desc--small">
                                                <div id="home-popularCate__title--9" class="home-popularCate__title home-popularCate__title--small text-clamp--2">
                                                    <?php echo esc_html($theme_options['text_popularCate_9']); ?>
                                                </div>
                                                <div id="home-popularCate__total--9" class="home-popularCate__total">
                                                    <?php echo esc_html($theme_options['subText_popularCate_9']); ?>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php
    }
}

if (!function_exists('tpl_moreproducts')) {
    function tpl_moreproducts()
    {
        $tax_query[] = [
            'taxonomy' => 'product_visibility',
            'field'    => 'name',
            'terms'    => 'featured',
        ];

        $products = new WP_Query(
            [
                'post_type'           => 'product',
                'post_status'         => 'publish',
                'posts_per_page'      => 24,
                'ignore_sticky_posts' => 1,
                'order'               => 'DESC',
                'tax_query'           => $tax_query
            ]
        );
    ?>
        <section class="home-moreproducts">
            <div class="home-moreproducts__inner">
                <div class="home-moreproducts__header">
                    <h3>Dành riêng cho bạn</h3>
                </div>
                <div class="home-moreproducts__body">
                    <div class="row home-moreproducts__list">
                        <?php
                        if ($products->have_posts()) :
                            while ($products->have_posts()) : $products->the_post();

                                wc_get_template_part('content', 'product');

                            endwhile;
                        endif;

                        wp_reset_query();
                        ?>
                    </div>
                    <div class="home-moreproducts__more">
                        <a id="load-moreproducts" data-page="1" data-url="<?php echo admin_url('admin-ajax.php'); ?>" class="btn home-moreproducts__button">
                            <span class="home-moreproducts__icon"></span>
                            <span class="home-moreproducts__text"> <?php echo _e('TẢI THÊM', THEME_DOMAIN) ?> </span>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    <?php
    }
}

if (!function_exists('tpl_lift_nav')) {
    function tpl_lift_nav()
    {
    ?>
        <div class="lift-nav">
            <div class="lift-nav__box" id="scroll-to-top">
                <i class="lift-nav__icon fas fa-chevron-up"></i>
                <!-- <div class="lift-nav__text">Siêu khuyến mãi</div> -->
            </div>
            <div class="lift-nav__box" data-target="home-category">
                <i class="lift-nav__icon fas fa-align-left"></i>
                <div class="lift-nav__text"> <?php echo _e('Danh mục', THEME_DOMAIN) ?></div>
            </div>
            <div class="lift-nav__box" data-target="home-notification">
                <i class="lift-nav__icon fas fa-certificate"></i>
                <div class="lift-nav__text"><?php echo _e('Sản phẩm mới', THEME_DOMAIN) ?></div>
            </div>
            <div class="lift-nav__box" data-target="home-promotion">
                <i class="lift-nav__icon fab fa-hotjar"></i>
                <div class="lift-nav__text"><?php echo _e('Siêu khuyến mãi', THEME_DOMAIN); ?></div>
            </div>
            <div class="lift-nav__box" data-target="home-popularCate">
                <i class="lift-nav__icon far fa-heart"></i>
                <div class="lift-nav__text"><?php echo _e('Danh mục phổ biến', THEME_DOMAIN); ?></div>
            </div>
            <div class="lift-nav__box" data-target="home-moreproducts">
                <i class="lift-nav__icon far fa-user"></i>
                <div class="lift-nav__text"><?php echo _e('Dành riêng cho bạn', THEME_DOMAIN); ?></div>
            </div>
        </div>
<?php
    }
}
