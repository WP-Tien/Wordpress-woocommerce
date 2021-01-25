<?php

/**
 * Header functions 
 * 
 * @package TienNguyen
 * @version 1.0.0
 */

if (!function_exists('tpl_category_tablet')) {
    function tpl_category_tablet()
    {
?>
        <?php
        if (has_nav_menu('tablet')) {
        ?>
            <div class="category-tablet__section">
                <div class="category-tablet__wrap">
                    <div class="category-tablet__header">
                        <h2> <?php echo _e('Danh mục sản phẩm', THEME_DOMAIN); ?> </h2>
                    </div>
                    <?php
                    wp_nav_menu(
                        [
                            'theme_location'  => 'tablet',
                            'container'       => 'div',
                            'container_class' => 'category-tablet',
                            'container_id'    => 'category-tablet',
                            'menu_class'      => 'category-tablet__list',
                            'depth'           => 3,
                            'walker'          => new Custom_Menu_Tablet_Walker()
                        ]
                    );
                    ?>
                </div>
                <div class="category-tablet__overlay"></div>
                <div class="category-tablet__btn-close">
                    <i class="fas fa-times"></i>
                </div>
            </div>
        <?php
        }
        ?>
    <?php
    }
}

if (!function_exists('tpl_header')) {
    function tpl_header()
    {
        global $theme_options;
    ?>
        <header class="header">
            <div class="container">
                <nav class="header__navbar">
                    <ul class="header__navbar-list">
                        <li class="header__navbar-item">
                            <a href="<?php echo esc_url($theme_options['showroom_link']); ?>" class="header__navbar-link">
                                <?php the_theme_svg('building', '#ffffff', ['header__navbar-icon', 'icon']); ?>
                                <span id="showroomText" class="header__navbar-title"><?php echo esc_html($theme_options['showroom_text']); ?></span>
                            </a>
                        </li>
                        <li class="header__navbar-item">
                            <a href="<?php echo esc_url($theme_options['support_link']); ?>" class="header__navbar-link">
                                <?php the_theme_svg('support', '#ffffff', ['header__navbar-icon', 'icon']); ?>
                                <div id="supportText" class="header__navbar-title"><?php echo esc_html($theme_options['support_text']); ?><span id="subSupportText"><?php echo esc_html($theme_options['sub_support_text']); ?></span></div>
                            </a>
                        </li>
                        <li class="header__navbar-item">
                            <a href="<?php echo esc_url($theme_options['technology_news_link']) ?>" class="header__navbar-link">
                                <?php the_theme_svg('support', '#ffffff', ['header__navbar-icon', 'icon']); ?>
                                <div id="advisoryText" class="header__navbar-title"><?php echo esc_html($theme_options['advisory_text']) ?><span id="subAdvisoryText"><?php echo esc_html($theme_options['sub_advisory_text']); ?></span></div>
                            </a>
                        </li>
                        <li class="header__navbar-item">
                            <a href="<?php echo esc_url($theme_options['technology_news_link']); ?>" class="header__navbar-link">
                                <?php the_theme_svg('computer', '#ffffff', ['header__navbar-icon', 'icon']); ?>
                                <span id="technologyNews" class="header__navbar-title"><?php echo esc_html($theme_options['technology_news_text']); ?></span>
                            </a>
                        </li>
                    </ul>
                    <ul class="header__navbar-list">
                        <li class="header__navbar-item header__navbar-qr">
                            <a class="header__navbar-link">
                                <span id="downApps" class="header__navbar-title"><?php echo esc_html($theme_options['down_apps_text']); ?></span>
                            </a>
                            <div class="header__qr">
                                <img src="<?php echo esc_url($theme_options['image_qr']); ?>" alt="<?php echo esc_attr('Image QR', THEME_DOMAIN) ?>" class="header__qr-img">
                                <div class="header__qr-apps">
                                    <a href="<?php echo esc_url($theme_options['link_google_play']); ?>" id="header__qr-link--google" class="header__qr-link">
                                        <img src="<?php echo esc_url($theme_options['image_google_play']); ?>" alt="Google store" class="header__qr-download-img">
                                    </a>
                                    <a href="<?php echo esc_url($theme_options['link_app_store']); ?>" id="header__qr-link--appstore" class="header__qr-link">
                                        <img src="<?php echo esc_url($theme_options['image_app_store']) ?>" alt="App store" class="header__qr-download-img">
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="header__navbar-item header__navbar-social">
                            <a class="header__navbar-link">
                                <span id="socialText" class="header__navbar-title"><?php echo esc_html($theme_options['social_text']); ?></span>
                                <a href="<?php echo esc_url($theme_options['top_nav_facebook_link']); ?>" class="header__navbar-link">
                                    <?php the_theme_svg('facebook', '#ffffff', ['header__navbar-icon', 'icon', 'icon--facebook']) ?>
                                </a>
                                <a href="<?php echo esc_url($theme_options['top_nav_instagram_link']); ?>" class="header__navbar-link">
                                    <?php the_theme_svg('instagram', '#ffffff', ['header__navbar-icon', 'icon', 'icon--instagram']); ?>
                                </a>
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="header__navsearch">
                    <?php
                    site_logo();
                    ?>
                    <div class="header__navsearch-wrap">
                        <form class="header__navsearch-search" action="<?php echo esc_url(home_url('/')); ?>">
                            <div class="header__navsearch-search-history">
                                <input autocomplete="off" name="s" type="text" id="header__navsearch-input--value" class="header__navsearch-input" value="" placeholder="Nhập từ khóa tìm kiếm">
                                <input type="hidden" value="" id="header__navsearch-input--cate-id">
                                <input type="hidden" name="post_type" value="product">
                                <!-- Search history -->
                                <!-- <div class="header__navsearch-history">
                                    <h3 class="header__navsearch-history-heading">Lịch sử tìm kiếm</h3>
                                    <ul class="header__navsearch-history-list">
                                        <li class="header__navsearch-history-item">
                                            <a href="#">Máy tính bảng</a>
                                        </li>
                                        <li class="header__navsearch-history-item">
                                            <a href="#">Máy bàn</a>
                                        </li>
                                    </ul>
                                </div> -->
                            </div>
                            <div class="header__navsearch-category" id="header__navsearch-category">
                                <span class="header__navsearch-select-label">Danh mục</span>
                                <i class="header__navsearch-select-icon fas fa-angle-down"></i>
                                <!-- Categories dropdown -->
                                <?php echo tpl_categories_dropdown(); ?>
                                <!-- <ul class="header__navsearch-option">
                                    <li class="header__navsearch-option-item">
                                        <span>Lap top & Macbook</span>
                                    </li>
                                    <li class="header__navsearch-option-item">
                                        <span>Monitor & Mouse</span>
                                    </li>
                                    <li class="header__navsearch-option-item">
                                        <span>CPU ryzen</span>
                                    </li>
                                    <li class="header__navsearch-option-item">
                                        <span>Lap top & Macbook</span>
                                    </li>
                                    <li class="header__navsearch-option-item">
                                        <span>Monitor & Mouse</span>
                                    </li>
                                    <li class="header__navsearch-option-item">
                                        <span>CPU ryzen</span>
                                    </li>
                                </ul> -->
                            </div>
                            <button type="submit" class="header__navsearch-button">
                                <i class="fas fa-search"></i>
                            </button>
                        </form>
                        <div class="header__keywords">
                            <div class="container flex">
                                <div class="categoryTablet header__category-tablet">
                                    Danh mục
                                    <i class="fas fa-angle-right"></i>
                                </div>
                                <ul class="header__keywords-list">
                                    <li class="header__keywords-item">
                                        <a href="#" class="header__keywords-link"> Balo Nữ </a>
                                    </li>
                                    <li class="header__keywords-item">
                                        <a href="#" class="header__keywords-link">Scandal Nữ</a>
                                    </li>
                                    <li class="header__keywords-item">
                                        <a href="#" class="header__keywords-link">Dép Nam</a>
                                    </li>
                                    <li class="header__keywords-item">
                                        <a href="#" class="header__keywords-link">Balo Nam</a>
                                    </li>
                                    <li class="header__keywords-item">
                                        <a href="#" class="header__keywords-link">Áo Nữ </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="header__navsearch-useraction">
                        <div class="header__home show-on-mobile">
                            <a href="<?php echo home_url('/'); ?>" class="header__home-link">
                                <?php the_theme_svg('home', '#ffffff', 'header__home-icon'); ?>
                                <span class="header__home-title">Trang chủ</span>
                            </a>
                        </div>
                        <div class="header__category show-on-mobile">
                            <a href="#" class="categoryTablet header__category-link">
                                <?php the_theme_svg('squares', '#ffffff', 'header__category-icon'); ?>
                                <span class="header__category-title">Danh mục</span>
                            </a>
                        </div>
                        <div class="header__promotion hide-on-mobile">
                            <a href="#" class="header__promotion-link">
                                <?php the_theme_svg('shout', '#ffffff', 'header__promotion-icon'); ?>
                                <span class="header__promotion-title">Khuyến mãi</span>
                            </a>
                        </div>
                        <div class="header__order hide-on-mobile">
                            <a href="#" class="header__order-link">
                                <?php the_theme_svg('order', '#ffffff', 'header__order-icon'); ?>
                                <span class="header__order-title">Đơn hàng</span>
                            </a>
                        </div>
                        <div class="header__login">
                            <a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>" class="header__login-link">
                                <?php the_theme_svg('login', '#ffffff', 'header__login-icon'); ?>
                                <span class="header__login-title">Đăng nhập</span>
                            </a>
                        </div>
                        <div class="header__cart">
                            <a href="<?php echo wc_get_cart_url(); ?>" class="header__login-link">
                                <?php the_theme_svg('supermarket', '#ffffff', 'header__cart-icon'); ?>
                                <span class="header__cart-title">Giỏ hàng</span>
                                <div class="header__cart-count"> <?php echo WC()->cart->get_cart_contents_count(); ?> </div>
                            </a>
                            <div class="header__cart-list">
                                <?php woocommerce_mini_cart(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    <?php
    }
}

if (!function_exists('tpl_categories_dropdown')) {
    function tpl_categories_dropdown()
    {
        $categories_id = get_option('category_dropdown');
        if (!$categories_id) return false;
        $categories_arr = explode(',', $categories_id);
        ob_start();
    ?>
        <ul class="header__navsearch-option">
            <li class="header__navsearch-option-item">
                <span data-id=""><?php echo esc_html('Danh mục'); ?> </span>
            </li>
            <?php
            foreach ($categories_arr as $cate) {
                $cate_id = (int) $cate;
                $cate_name = get_the_category_by_ID($cate_id);
            ?>
                <li class="header__navsearch-option-item">
                    <span data-id="<?php echo esc_attr($cate_id); ?>"><?php echo esc_html($cate_name); ?></span>
                </li>
            <?php
            }
            ?>
        </ul>
        <?php
        return ob_get_clean();
    }
}

if (!function_exists('get_related_products')) {
    function get_related_products()
    {
        // Sanitizes a string from user input 
        $search = sanitize_text_field($_POST['search']);
        $id = sanitize_text_field($_POST['id']);

        if ($id != '' && isset($id)) {
            $args = [
                'post_type'      => 'product',
                'post_status'    => 'publish',
                'posts_per_page' => 8,
                's'              => (string) $search,
                'tax_query'      => [
                    [
                        'taxonomy' => 'product_cat',
                        'field' => 'id',
                        'terms' => (int) $id
                    ]
                ]
            ];
        } else {
            $args = [
                'post_type'      => 'product',
                'post_status'    => 'publish',
                'posts_per_page' => 8,
                's'              => (string) $search,
                'sentence'       => true,
            ];
        }

        $the_query = new WP_Query($args);
        if ($the_query->have_posts()) :
        ?>
            <div class="header__navsearch-history">
                <h3 class="header__navsearch-history-heading"><?php echo __('Kết quả tìm kiếm'); ?></h3>
                <ul class="header__navsearch-history-list">
                    <?php
                    while ($the_query->have_posts()) :
                        $the_query->the_post();
                    ?>
                        <li class="header__navsearch-history-item">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </li>
                    <?php
                    endwhile;
                    ?>
                </ul>
            </div>
        <?php
            wp_reset_query();
        else :
        ?>
            <div class="header__navsearch-history">
                <h3 class="header__navsearch-history-heading"><?php echo esc_html__('Không có sản phẩm được tìm thấy', THEME_DOMAIN); ?></h3>
            </div>
<?php
        endif;

        die();
    }
}
