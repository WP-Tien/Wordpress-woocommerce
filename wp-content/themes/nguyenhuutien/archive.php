<?php

/**
 * Archive page template
 * 
 * @package TienNguyen
 * @version 1.0.0
 */
get_header();
?>

<div class="wrap">
    <?php

    echo apply_filters('get_breadcrumb', 1, '/', 'Home');

    if (have_posts()) :
        while (have_posts()) : the_post();

        // the_title();

        endwhile;
    endif;
    ?>

</div>

<?php
get_footer();
?>