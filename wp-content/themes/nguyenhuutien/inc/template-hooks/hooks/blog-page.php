<?php

/**
 * Hooks for blog page 
 * 
 * @package TienNguyen
 * @version 1.0.0
 */

add_action('tpl_blog', 'get_the_breadcrumbs_for_blog', 0);
add_action('tpl_blog', 'get_the_loop_for_blog', 5);
