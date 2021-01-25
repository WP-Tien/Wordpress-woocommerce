<?php

/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * @package WooCommerce\Templates
 * 
 * @author TienNguyen - customizer
 * @version 1.0.0
 */

defined('ABSPATH') || exit;

get_header('shop');

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action('woocommerce_before_main_content');

?>
<!-- <header class="archive-product__header woocommerce-products-header"> -->
<?php
/**
 * Hook: woocommerce_archive_description.
 *
 * @hooked woocommerce_taxonomy_archive_description - 10
 * @hooked woocommerce_product_archive_description - 10
 */
do_action('woocommerce_archive_description');
?>
<!-- </header> -->

<?php
if (woocommerce_product_loop()) {

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	do_action('woocommerce_before_shop_loop');
?>
	<div class="archive-product__main">
		<div class="row">
			<div class="col col-medium-3 col-tiny-12 order-medium-first order-last">
				<div class="archive-product__sidebar">
					<?php
					/**
					 * Hook: woocommerce_sidebar.
					 *
					 * @hooked woocommerce_get_sidebar - 10
					 */
					do_action('woocommerce_sidebar');

					?>
				</div> <!-- End .archive-product__sidebar -->
			</div>
			<div class="col col-medium-9 col-tiny-12">
				<div class="archive-product__action">
					<?php
					/**
					 * Hook: customize_woocommerce_before_shop_loop
					 * 
					 * @hooked woocommerce_result_count - 5
					 * @hooked woocommerce_catalog_ordering - 10
					 */
					do_action('customize_woocommerce_before_shop_loop');
					?>
				</div>
				<div class="archive-product__products">
				<?php
				woocommerce_product_loop_start();

				if (wc_get_loop_prop('total')) {
					while (have_posts()) {
						the_post();

						/**
						 * Hook: woocommerce_shop_loop.
						 */
						do_action('woocommerce_shop_loop');

						wc_get_template_part('content', 'product');
					}
				}

				woocommerce_product_loop_end();

				/**
				 * Hook: woocommerce_after_shop_loop.
				 *
				 * @hooked woocommerce_pagination - 10
				 */

				do_action('woocommerce_after_shop_loop');
			} else {
				/**
				 * Hook: woocommerce_no_products_found.
				 *
				 * @hooked wc_no_products_found - 10
				 */
				do_action('woocommerce_no_products_found');
			}
				?>
				</div> <!-- End .archive-product__products -->
			</div> <!-- End .col -->
		</div> <!-- End .row -->
	</div> <!-- End .archive-product__main -->
	<?php

	/**
	 * Hook: woocommerce_after_main_content.
	 *
	 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
	 */
	do_action('woocommerce_after_main_content');

	get_footer('shop');
