<?php

/**
 * Functionly woocomerce
 * 
 * @package TienNguyen
 * @version 1.0.0
 * @see inc/template-hooks/hooks/woo.php
 */

if (!function_exists('theme_before_shop_loop_item')) {
    /**
     * Function for hook woocomerce_before_shop_loop_item ( achor tag )
     */
    function customizer_template_loop_product_link_open()
    {
        global $product;

        $link = apply_filters('woocommerce_loop_product_link', get_the_permalink(), $product);

        echo '<a href="' . esc_url($link) . '" class="product__link woocommerce-LoopProduct-link woocommerce-loop-product__link">';
    }
}

if (!function_exists('customizer_template_loop_product_thumbnail')) {
    /**
     * Function for hook woocommerce_before_shop_loop_item_title (thumbnail/ placeholder)
     */
    function customizer_template_loop_product_thumbnail()
    {
        global $product;
?>
        <div class="product__img">
            <?php
            /**
             * Get Product Image 
             */
            echo woocommerce_get_product_thumbnail();

            /**
             * Get first image of Product Gallery
             */
            $galerry_ids = $product->get_gallery_image_ids();
            $image_size = apply_filters('customizer_single_product_archive_thumbnail_size', 'woocomerce_thumbnail');
            if (is_array($galerry_ids) && isset($galerry_ids[0])) {
                echo wp_get_attachment_image($galerry_ids[0], $image_size, "", ["alt" => get_the_title($galerry_ids[0])]);
            }
            ?>
        </div>
    <?php
    }
}

if (!function_exists('customizer_template_loop_product_title')) {
    /**
     * Show the product title content-product
     */
    function customizer_template_loop_product_title()
    {
        echo '<h2 class="' . esc_attr(apply_filters('customizer_product_loop_title_classes', 'product__title')) . '">' . get_the_title() . '</h2>';
    }
}

/**
 * Add checkbox to general option product
 */
if (!function_exists('add_checkbox_to_general_option_product')) {
    function add_checkbox_to_general_option_product()
    {
        echo '<div class="options_group">';
        woocommerce_wp_checkbox(array(
            'id'      => 'flash_sale',
            'value'   => get_post_meta(get_the_ID(), 'flash_sale', true),
            'label'   => 'This is a sale flash product',
            'desc_tip' => true,
            'description' => 'If you want this product to be sale flash mode, let\'s tick it !',
        ));
        echo '</div>';
    }
}

/**
 * Save meta flash sale
 */
if (!function_exists('save_meta_flash_sale_product')) {
    function save_meta_flash_sale_product($id, $post)
    {
        update_post_meta($id, 'flash_sale', $_POST['flash_sale']);
    }
}

/**
 * Add col in edit.php products list
 */
if (!function_exists('add_flash_sale_col_filter')) {
    function add_flash_sale_col_filter($columns)
    {
        $columns['is_flash_sale'] = "Flash sale";
        return $columns;
    };
}

/**
 * Add a checkbox to control flash sale statuc in edit.php products list 
 */
if (!function_exists('product_column_flash_sale')) {
    function product_column_flash_sale($column, $product_id)
    {
        if ($column == 'is_flash_sale') {
            $meta = get_post_meta($product_id, 'flash_sale', true);
            $nonce = wp_create_nonce('update_product_flash_sale_nonce' . $product_id);

            echo '<input ' . (($meta != "") ? "checked='checked'" : "") . ' class="product_flash-sale" data-nonce="' . $nonce . '" data-product="' . $product_id . '" type="checkbox" value="sale_flash" />';
        }
    }
}

/**
 * Ajax handler for updating meta flash sale in edit.php products list
 */
if (!function_exists('update_product_flash_sale')) {
    function update_product_flash_sale()
    {
        if ($_POST) {
            if (!empty($_POST['product_id']) && !empty($_POST['nonce'])) {
                echo $_POST['product_id'];

                if (!wp_verify_nonce($_POST['nonce'], "update_product_flash_sale_nonce" . $_POST['product_id'])) {
                    exit('You must keep out here');
                }

                $flash_sale_meta = get_post_meta($_POST["product_id"], "flash_sale", true);
                $value_flash_sale_meta = ($flash_sale_meta == '') ? 'yes' : '';

                $result = update_post_meta($_POST['product_id'], "flash_sale", $value_flash_sale_meta);

                if ($result) {
                    echo $result;
                }
            }
        }
        die();
    }
}

/**
 * Ajax handler for load more products
 */
if (!function_exists('load_more_products')) {
    function load_more_products()
    {
        $page = $_POST['page'] + 1;

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
                'paged'               => $page,
                'ignore_sticky_posts' => 1,
                'order'               => 'DESC',
                'tax_query'           => $tax_query
            ]
        );

        if ($products->have_posts()) :
            while ($products->have_posts()) : $products->the_post();
                wc_get_template_part('content', 'product');
            endwhile;
        else :
            echo 0;
        endif;
        wp_reset_query();

        die();
    }
}

/**
 * Output the Woocomerce Breadcrumb
 */
if (!function_exists('customizer_woocommerce_breadcrumb')) {
    function customizer_woocommerce_breadcrumb($args = array())
    {
        $args = wp_parse_args(
            $args,
            apply_filters(
                'woocommerce_breadcrumb_defaults',
                array(
                    'delimiter'   => '&nbsp;&#62;&nbsp;',
                    'wrap_before' => '<nav class="breadcrumb">',
                    'wrap_after'  => '</nav>',
                    'before'      => '',
                    'after'       => '',
                    'home'        => _x('Trang chủ', 'breadcrumb', 'woocommerce'),
                )
            )
        );

        $breadcrumbs = new WC_Breadcrumb();

        if (!empty($args['home'])) {
            $breadcrumbs->add_crumb($args['home'], apply_filters('woocommerce_breadcrumb_home_url', home_url()));
        }

        $args['breadcrumb'] = $breadcrumbs->generate();

        /**
         * WooCommerce Breadcrumb hook
         *
         * @hooked WC_Structured_Data::generate_breadcrumblist_data() - 10
         */
        do_action('woocommerce_breadcrumb', $breadcrumbs, $args);

        wc_get_template('global/breadcrumb.php', $args);
    }
}

if (!function_exists('customizer_woocommerce_product_single_add_to_cart_text')) {
    function customizer_woocommerce_product_single_add_to_cart_text()
    {
        return __('Thêm vào giỏ hàng', THEME_DOMAIN);
    }
}

// !
if (!function_exists('customizer_woocommerce_shipping')) {
    function customizer_woocommerce_shipping()
    {
        echo '<div class="single-product__shipping">
            <div class="single-product__text">' . esc_html__('Giao hàng', THEME_DOMAIN)  . '</div>
            <div class="single-product__shipping-desc">' . esc_html('Miễn phí giao hàng trong nội thành TP.HCM bán kính 12km với hoá đơn trên 500.000đ.') . '</div>
        </div>';
    }
}

// !
if (!function_exists('customizer_woocommerce_refund')) {
    function customizer_woocommerce_refund()
    {
        echo '<div class="single-product__refund">
            <div class="single-product__text">' . esc_html__('Đổi trả', THEME_DOMAIN)  . '</div>
            <div class="single-product__refund-desc">' . esc_html('Đổi mới sản phẩm trong 7 ngày nếu lỗi từ nhà sản xuất.') . '</div>
        </div>';
    }
}

if (!function_exists('customizer_woocommerce_output_product_data')) {
    function customizer_woocommerce_output_product_data()
    {
        global $product;
    ?>
        <div class="row">
            <div class="col col-wide-8 col-tiny-12">
                <div class="single-product__description">
                    <h2 class="single-product__description-head"> <?php echo esc_html__('Thông tin sản phẩm', THEME_DOMAIN); ?> </h2>
                    <div class="single-product__description-body">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
            <div class="col col-wide-4 col-tiny-12">
                <div class="single-product__revproduct">
                    <h2 class="single-product__revproduct-head"> <?php echo esc_html__('Sản phẩm đã xem', THEME_DOMAIN); ?> </h2>
                    <div class="single-product__revproduct-body">
                        <ul class="single-product__revproduct-list">
                            <?php
                            if (isset($_SESSION['viewed_products']) && $_SESSION['viewed_products']) {
                                $products_id = $_SESSION['viewed_products'];

                                $args = [
                                    'post_type' => 'product',
                                    'post_status' => 'publish',
                                    'post_per_page' => 8,
                                    'post__in'  => $products_id
                                ];

                                $products = new WP_Query($args);

                                if ($products->have_posts()) :
                                    while ($products->have_posts()) :
                                        $products->the_post();
                                        $product = wc_get_product(get_the_ID());
                            ?>
                                        <li class="single-product__revproduct-item">
                                            <a class="single-product__revproduct-link" href="<?php the_permalink(get_the_id()); ?>">
                                                <div class="single-product__revproduct-img">
                                                    <?php the_post_thumbnail('shop_thumbnail'); ?>
                                                </div>
                                                <div class="single-product__revproduct-content">
                                                    <div class="single-product__revproduct-title"> <?php the_title(); ?></div>

                                                    <?php if ($price_html = $product->get_price_html()) : ?>
                                                        <div class="single-product__revproduct-price"><?php echo $product->get_price_html(); ?></div>
                                                    <?php else : ?>
                                                        <div class="single-product__revproduct-no-price"><?php echo esc_html__('Giá: Liên hệ'); ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </a>
                                        </li>
                            <?php
                                    endwhile;
                                    wp_reset_query();
                                endif;
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        </div>
    <?php
    }
}


if (!function_exists('customizer_get_viewed_products')) {
    /**
     * Set and save the SESSION for viewing product
     * @return session arr ID products 
     */
    function customizer_get_viewed_products()
    {
        session_start();
        if (!isset($_SESSION['viewed_products'])) {
            $_SESSION['viewed_products'] = [];
        }
        if (is_singular('product')) {
            $_SESSION['viewed_products'][get_the_ID()] = get_the_ID();
        }
    }
}

if (!function_exists('customizer_woocommerce_output_related_products')) {
    function customizer_woocommerce_output_related_products()
    {
        global $product;

        if (!$product) {
            return;
        }

        $args = array(
            'posts_per_page' => 12,
            'columns'        => 6,
            'orderby'        => 'rand', // @codingStandardsIgnoreLine.
            'order'          => 'desc',
        );

        // Get visible related products then sort them at random.
        $args['related_products'] = array_filter(array_map('wc_get_product', wc_get_related_products($product->get_id(), $args['posts_per_page'], $product->get_upsell_ids())), 'wc_products_array_filter_visible');

        // Handle orderby.
        $args['related_products'] = wc_products_array_orderby($args['related_products'], $args['orderby'], $args['order']);

        // Set global loop values.
        wc_set_loop_prop('name', 'related');
        wc_set_loop_prop('columns', apply_filters('woocommerce_related_products_columns', $args['columns']));

        wc_get_template('single-product/related.php', $args);
    }
}

if (!function_exists('customizer_woocommerce_output_product_comments')) {
    function customizer_woocommerce_output_product_comments()
    {
        // Get template single-product-reviews
        wc_get_template_part('single', 'product-reviews');
    }
}


if (!function_exists('customizer_woocommerce_review_display_comment_text')) {
    /**
     * Display the review content.
     */
    function customizer_woocommerce_review_display_comment_text()
    {
        echo '<div class="single-product__description description">';
        comment_text();
        echo '</div>';
    }
}

// if (!function_exists('customizer_woocommerce_catalog_ordering')) {
//     function customizer_woocommerce_catalog_ordering()
//     {
//         if (!wc_get_loop_prop('is_paginated') || !woocommerce_products_will_display()) {
//             return;
//         }
//         $show_default_orderby    = 'menu_order' === apply_filters('woocommerce_default_catalog_orderby', get_option('woocommerce_default_catalog_orderby', 'menu_order'));
//         $catalog_orderby_options = apply_filters(
//             'woocommerce_catalog_orderby',
//             array(
//                 'menu_order' => __('Sắp xếp mặc định', 'woocommerce'),
//                 'popularity' => __('Sort by popularity', 'woocommerce'),
//                 'rating'     => __('Sort by average rating', 'woocommerce'),
//                 'date'       => __('Sort by latest', 'woocommerce'),
//                 'price'      => __('Sort by price: low to high', 'woocommerce'),
//                 'price-desc' => __('Sort by price: high to low', 'woocommerce'),
//             )
//         );

//         $default_orderby = wc_get_loop_prop('is_search') ? 'relevance' : apply_filters('woocommerce_default_catalog_orderby', get_option('woocommerce_default_catalog_orderby', ''));
//         // phpcs:disable WordPress.Security.NonceVerification.Recommended
//         $orderby = isset($_GET['orderby']) ? wc_clean(wp_unslash($_GET['orderby'])) : $default_orderby;
//         // phpcs:enable WordPress.Security.NonceVerification.Recommended

//         if (wc_get_loop_prop('is_search')) {
//             $catalog_orderby_options = array_merge(array('relevance' => __('Relevance', 'woocommerce')), $catalog_orderby_options);

//             unset($catalog_orderby_options['menu_order']);
//         }

//         if (!$show_default_orderby) {
//             unset($catalog_orderby_options['menu_order']);
//         }

//         if (!wc_review_ratings_enabled()) {
//             unset($catalog_orderby_options['rating']);
//         }

//         if (!array_key_exists($orderby, $catalog_orderby_options)) {
//             $orderby = current(array_keys($catalog_orderby_options));
//         }

//         wc_get_template(
//             'loop/orderby.php',
//             array(
//                 'catalog_orderby_options' => $catalog_orderby_options,
//                 'orderby'                 => $orderby,
//                 'show_default_orderby'    => $show_default_orderby,
//             )
//         );
//     }
// }

function customizer_woocommerce_catalog_orderby()
{
    return array(
        'menu_order' => __('Sắp xếp mặc định', THEME_DOMAIN),
        'popularity' => __('Sắp xếp theo mức độ phổ biến', THEME_DOMAIN),
        'rating'     => __('Sắp xếp theo đánh giá', THEME_DOMAIN),
        'date'       => __('Mới nhất', THEME_DOMAIN),
        'price'      => __('Sắp xếp theo giá: thấp đến cao', THEME_DOMAIN),
        'price-desc' => __('Sắp xếp theo giá: cao đế thấp', THEME_DOMAIN),
    );
}

if (!function_exists('customizer_woocommerce_widget_shopping_cart_subtotal')) {
    function customizer_woocommerce_widget_shopping_cart_subtotal()
    {
        echo '<strong>' . esc_html__('Tổng tiền:', THEME_DOMAIN) . '</strong> ' . WC()->cart->get_cart_subtotal();
    }
}

if (!function_exists('customizer_woocommerce_widget_shopping_cart_button_view_cart')) {
    function customizer_woocommerce_widget_shopping_cart_button_view_cart()
    {
        echo '<a href="' . esc_url(wc_get_cart_url()) . '" class="btn btn--outline-primary btn--small">' . esc_html__('Xem giỏ hàng', THEME_DOMAIN) . '</a>';
    }
}

if (!function_exists('customizer_woocommerce_widget_shopping_cart_proceed_to_checkout')) {
    function customizer_woocommerce_widget_shopping_cart_proceed_to_checkout()
    {
        echo '<a href="' . esc_url(wc_get_checkout_url()) . '" class="btn btn--primary btn--small">' . esc_html__('Thanh toán', THEME_DOMAIN) . '</a>';
    }
}

if (!function_exists('customizer_ajax_woocommerce_add_to_cart_fragments')) {
    function customizer_ajax_woocommerce_add_to_cart_fragments($fragments)
    {
        ob_start();
    ?>

        <div class="header__cart-list">
            <?php woocommerce_mini_cart(); ?>
        </div>

    <?php $fragments['div.header__cart-list'] = ob_get_clean();

        return $fragments;
    }
}

if (!function_exists('customizer_ajax_woocommerce_cart_count_fragments')) {
    function customizer_ajax_woocommerce_cart_count_fragments($fragments)
    {
        ob_start();
    ?>
        <div class="header__cart-count"> <?php echo WC()->cart->get_cart_contents_count(); ?> </div>
<?php
        $fragments['div.header__cart-count'] = ob_get_clean();
        return $fragments;
    }
}

if (!function_exists('customizer_woocommerce_registration_errors_validation')) {
    function customizer_woocommerce_registration_errors_validation($reg_errors, $sanitized_user_login, $user_email)
    {
        global $woocommerce;
        extract($_POST);
        if (strcmp($password, $passwordConfirmation) !== 0) {
            return new WP_Error('registration-error', __('Passwords do not match.', 'woocommerce'));
        }
        return $reg_errors;
    }
}

if (!function_exists('customizer_woocommerce_account_menu_items')) {
    function customizer_woocommerce_account_menu_items($menu_links)
    {
        unset($menu_links['downloads']);
        unset($menu_links['payment-methods']);
        $menu_links['dashboard'] = __('Bảng điều khiển', THEME_DOMAIN);
        $menu_links['edit-account'] = __('Tài khoản', THEME_DOMAIN);
        $menu_links['orders'] = __('Đơn hàng', THEME_DOMAIN);
        $menu_links['edit-address'] = __('Địa chỉ', THEME_DOMAIN);
        $menu_links['customer-logout'] = __('Đăng xuất', THEME_DOMAIN);

        return $menu_links;
    }
}

if (!function_exists('customizer_woocommerce_default_address_fields')) {
    function customizer_woocommerce_default_address_fields($fields)
    {
        unset($fields['postcode']);

        $fields['first_name']['label'] = 'Tên và tên đệm';
        $fields['last_name']['label'] = 'Họ';
        $fields['country']['label'] = 'Đất nước';
        $fields['city']['label'] = 'Thành phố';
        $fields['company']['label'] = 'Công ty';
        $fields['address_1']['label'] = 'Địa chỉ';

        return $fields;
    }
}

if (!function_exists('customizer_woocommerce_billing_fields')) {
    function customizer_woocommerce_billing_fields($fields)
    {
        $fields['billing_email']['label'] = 'Địa chỉ email';

        return $fields;
    }
}
