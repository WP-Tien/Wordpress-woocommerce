<?php

/**
 * Blog template
 * 
 * @package TienNguyen
 * @version 1.0.0
 */


if (!function_exists('get_the_loop_for_blog')) {
    function get_the_loop_for_blog()
    {
        $args =  [
            'post_type' => 'post',
            'post_status' => 'publish',
            'order_by' => 'desc',
            'posts_per_page' => -1
        ];

        $posts = new WP_Query($args);
?>
        <div class="container">
            <?php
            while ($posts->have_posts()) :
                if ($posts->have_posts()) : $posts->the_post();
            ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <div class="row">
                            <div class="col-medium-4">
                                <?php if (get_attachment()) { ?>
                                    <a href="<?php the_permalink(); ?>" class="post__link">
                                        <div class="post__image" style="background-image: url(<?php echo get_attachment(); ?>)"></div>
                                    </a>
                                <?php } ?>
                            </div>
                            <div class="col-medium-8">
                                <div class="post__info">
                                    <header class="post__header">
                                        <?php the_title(); ?>
                                    </header>

                                    <div class="post__excerpt">
                                        <?php the_excerpt(); ?>
                                    </div>-

                                    <footer class="post__footer">
                                        <?php
                                        echo get_post_footer();
                                        ?>
                                    </footer>
                                </div>
                            </div>
                        </div>
                    </article>
            <?php
                endif;
            endwhile;
            ?>

        </div>
<?php
        wp_reset_query();
    }
}

if (!function_exists('get_the_breadcrumbs_for_blog')) {
    function get_the_breadcrumbs_for_blog()
    {
        echo apply_filters('get_breadcrumb', 1, '/', 'Home');
    }
}
