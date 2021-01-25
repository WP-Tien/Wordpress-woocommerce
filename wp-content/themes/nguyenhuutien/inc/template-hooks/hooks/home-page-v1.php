<?php

/**
 * Hooks for home page v1 
 * 
 * @package TienNguyen
 * @version 1.0.0
 */

add_action('tpl_homepage-v1', 'tpl_top_menu', 0);
add_action('tpl_homepage-v1', 'tpl_category_carousel', 5);
add_action('tpl_homepage-v1', 'tpl_notification', 10);
add_action('tpl_homepage-v1', 'tpl_promotion', 15);
add_action('tpl_homepage-v1', 'tpl_popularCate', 20);
add_action('tpl_homepage-v1', 'tpl_moreproducts', 25);
add_action('tpl_homepage-v1', 'tpl_lift_nav', 30);
