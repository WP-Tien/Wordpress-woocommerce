<?php

/**
 * Single page
 * 
 * @package TienNguyen
 * @version 1.0.0
 */
get_header();
?>

<div class="single">
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();

            get_template_part('template-parts/single', get_post_format());

        endwhile;
    endif;
    ?>
</div>

<?php
get_footer();
?>