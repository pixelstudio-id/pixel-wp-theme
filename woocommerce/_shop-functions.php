<?php
require_once __DIR__ . '/_shop-gutenberg.php';

add_action('init', 'my_shop_init');
add_action('after_setup_theme', 'my_shop_theme_supports');

add_action('wp_enqueue_scripts', 'my_frontend_shop_assets', 101);
add_action('admin_enqueue_scripts', 'my_admin_shop_assets', 100);


// disable built-in WooCommerce CSS
add_filter('woocommerce_enqueue_styles', '__return_empty_array');
// disable image resize
add_filter('woocommerce_resize_images', '__return_false');

if (is_admin()) {
  add_action('add_meta_boxes' , 'my_modify_shop_excerpt_metabox', 40);
}

if (is_cart()) {
  // Move the Cross-sell out of the CART TOTAL div
  remove_action('woocommerce_cart_collaterals', 'woocommerce_cross_sell_display');
  add_action('woocommerce_after_cart', 'my_custom_cross_sell_display');
}

/////

/**
 * @action init
 */
function my_shop_init() {
  // remove all woocommerce image sizes
  $wc_image_sizes = [
    'woocommerce_thumbnail',
    'woocommerce_single',
    'woocommerce_gallery_thumbnail',
    'shop_catalog',
    'shop_single',
    'shop_thumbnail',
    'variation_swatches_image_size',
    'variation_swatches_tooltip_size'
  ];

  foreach ($wc_image_sizes as $s) {
    remove_image_size($s);
  }
}

/**
 * Setup theme_support for WooCommerce
 * 
 * @action after_setup_theme
 */
function my_shop_theme_supports() {
  add_theme_support('woocommerce', [
    'product_grid' => [
      'default_columns' => 4,
      'default_rows' => 5,
    ],
    'thumbnail_image_width' => 0,
  ]);

  add_theme_support('wc-product-gallery-zoom');
  add_theme_support('wc-product-gallery-lightbox');
  add_theme_support('wc-product-gallery-slider');

  // enable gutenberg editor in Product
  add_theme_support('px-product-gutenberg');
}


/**
 * Register Woocommerce assets here
 * @action wp_enqueue_scripts 101
 */
function my_frontend_shop_assets() {
  wp_enqueue_script('my-shop', MY_DIST . '/my-shop.js', [], MY_VERSION, true);
  wp_enqueue_style('my-shop', MY_DIST . '/my-shop.css', [], MY_VERSION);
  
  wp_deregister_style('wc-block-vendors-style');
  wp_deregister_style('wc-block-style');
  wp_deregister_style('wc-blocks-vendors-style');
  wp_deregister_style('wc-blocks-style');
  wp_deregister_style('wc-blocks-style-all-products');

  // disable Swatch plugin CSS
  wp_deregister_style('woo-variation-swatches');
}

/**
 * Register Woocommerce assets for admin here
 * @action admin_enqueue_scripts
 */
function my_admin_shop_assets() {
  wp_enqueue_style('my-shop-admin', MY_DIST . '/my-shop-admin.css', [], MY_VERSION);
}


/**
 * Override the WooCommerce excerpt box with plain textarea
 * 
 * @action add_meta_boxes 40
 */
function my_modify_shop_excerpt_metabox() {
  remove_meta_box('postexcerpt', 'product', 'normal');
  add_meta_box('postexcerpt', __('Excerpt'), 'post_excerpt_meta_box', 'product', 'side');
}


/**
 * Change the markup of Cart's Cross-Sell
 * @action woocommerce_cart_collaterals
 */
function my_custom_cross_sell_display() {
  $args = [
    'products' => get_posts([
      'post_type' => 'product',
      'post__in' => WC()->cart->get_cross_sells(),
      'posts_per_page' => 4,
    ]),
  ];

  get_template_part('woocommerce/parts/cart-cross-sells', '', $args);
}