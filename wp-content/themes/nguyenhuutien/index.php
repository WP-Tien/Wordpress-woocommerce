<?php

/**
 * The main template
 * 
 * @package TienNguyen
 * @version 1.0.0
 */

get_header();
?>

<div class="wrap">

    <?php
    if (have_posts()) :

        while (have_posts()) : the_post();

            the_content();

        endwhile;

    endif;
    ?>

</div>

<?php
get_footer();
