<?php
global $wp_query;

$products_query = new WP_Query($wp_query->query_vars);
$products = $products_query->get_posts();

$page = get_post(get_option('woocommerce_shop_page_id'));
$pagination = H::get_pagination();

the_post();
get_header();
///// ?>

<?php // do_action('woocommerce_before_main_content'); ?>

<?php the_content() ?>

<?php
  // do_action('woocommerce_before_shop_loop');
  woocommerce_output_all_notices();
  wc_setup_loop();
  woocommerce_catalog_ordering();
?>

<?php get_template_part('woocommerce/parts/products', '', [
  'products' => $products,
]); ?>

<?php get_template_part('parts/pagination', '', $pagination); ?>

<?php
  // do_action('woocommerce_after_shop_loop');
  // woocommerce_pagination();
  woocommerce_reset_loop();
?>

<?php // do_action('woocommerce_after_main_content'); ?>


<?php /////
get_footer();