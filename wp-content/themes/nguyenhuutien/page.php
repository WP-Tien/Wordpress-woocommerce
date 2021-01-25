<?php

/**
 * The page template
 * 
 * @package TienNguyen
 * @version 1.0.0
 */


get_header(); ?>

<div class="wrap">

    <?php
    if (have_posts()) :

        while (have_posts()) : the_post();

            get_template_part('template-parts/content', 'page');

        endwhile;

    endif;
    ?>

</div><!-- #primary -->

<?php get_footer(); ?>