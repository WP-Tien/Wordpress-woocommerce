<?php

/**
 * Template Name: Blog Template
 * 
 * Template for blog
 * 
 * @package TienNguyen
 * @version 1.0.0
 */

get_header();
?>

<div class="blog-post row">
    <div class="col col-wide-9 p-r-25">
        <?php
        /**
         * @get_the_breadcrumbs_for_blog - 0
         * @get_the_loop_for_blog - 5
         */
        do_action('tpl_blog');
        ?>
    </div>

    <div class="col col-wide-3 p-l-25">
        <p> Side bar right </p>
    </div>
</div>

<?php
get_footer();
?>