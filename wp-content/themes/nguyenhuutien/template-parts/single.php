<?php

/**
 * Single page
 * 
 * @package TienNguyen
 */
?>

<article id="post-<?php the_ID(); ?>" class=" <?php post_class(); ?> ">

    <header class="post__header">
        <?php the_title('<h1 class="post__title">', '</h1>'); ?>
    </header>

    <div class="post__content">
        <?php the_content(); ?>
    </div>

    <footer class="post__footer">

    </footer>

</article>