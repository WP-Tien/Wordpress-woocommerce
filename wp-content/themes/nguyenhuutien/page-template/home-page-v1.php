<?php

/**
 * Template Name: Homepage v1 Template
 * 
 * Template for homepage v1
 * 
 * @package TienNguyen
 * @version 1.0.0
 */

get_header();
?>
<div class="homepage-v1">
    <?php
    /**
     * @tpl_category_carousel - 5
     * @tpl_notification - 10
     * @tpl_promotion - 15
     * @tpl_popularCate - 20
     * @tpl_moreproducts - 25
     */
    do_action('tpl_homepage-v1');
    ?>
</div>
<?php get_footer(); ?>