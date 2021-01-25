<?php

/**
 * Sidebar woo shop
 * 
 * @package TienNguyen
 * @version 1.0.0
 * @see woocommerce/archive-product.php
 */

if (is_active_sidebar('shop')) {
    dynamic_sidebar('shop');
}
