<?php

/**
 * Footer file 
 * 
 * @package TienNguyen
 * @version 1.0.0
 */

?>
</div>
</main>
<footer class="footer">
    <!-- Widget footer -->
    <?php
    get_template_part('template-parts/widget', 'footer');
    ?>

    <div class="footer__bottom">
        <div class="footer__copyright"> <?php echo date('Y'); ?> - Được tạo bởi TienNguyen </div>

    </div>
</footer>
</div> <!-- End .wrap -->

<?php wp_footer(); ?>
</body>

</html>