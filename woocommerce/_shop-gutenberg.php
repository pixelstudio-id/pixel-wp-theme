<?php

my_shop_block_styles();
add_action('enqueue_block_editor_assets', 'my_editor_shop_assets', 100);
add_filter('woocommerce_blocks_product_grid_item_html', 'my_modify_render_product_grid', 10, 3);

/**
 * Gutenberg editor assets
 * @action enqueue_block_editor_assets 100
 */ 
function my_editor_shop_assets() {
  if (!is_admin()) { return; }
  
  // wp_enqueue_script( 'my-shop-editor', MY_DIST . '/shop-editor.js', [ 'wp-blocks', 'wp-dom' ] , MY_VERSION, true );
  wp_enqueue_style('my-shop-editor', MY_DIST . '/my-shop-editor.css', ['wp-edit-blocks'], MY_VERSION);

  wp_deregister_style('wc-block-vendors-style');
  wp_deregister_style('wc-block-style');
  wp_deregister_style('wc-block-editor');
  wp_deregister_style('wc-blocks-vendors-style');
  wp_deregister_style('wc-blocks-style');  
  wp_deregister_style('wc-blocks-editor'); 
}


/**
 * Custom Styles for WooCommerce's blocks
 */
function my_shop_block_styles() {
  // slider style
  $slider_blocks = [
    'woocommerce/product-best-sellers',
    'woocommerce/handpicked-products',
    'woocommerce/product-category',
    'woocommerce/product-new',
    'woocommerce/product-on-sale',
    'woocommerce/product-top-rated',
    'woocommerce/products-by-attribute',
    'woocommerce/product-tag'
  ];

  foreach ($slider_blocks as $b) {
    register_block_style($b, ['name' => 'my-slider', 'label' => 'Slider']);
  }
}


/**
 * Change the image in product grid to use 'medium' size
 * 
 * @filter woocommerce_blocks_product_grid_item_html
 */
function my_modify_render_product_grid($html, $data, $product) {
  $attr = [];
  if ($product->get_image_id()) {
    $image_alt = get_post_meta($product->get_image_id(), '_wp_attachment_image_alt', true);
    $attr['alt'] = $image_alt ? $image_alt : $product->get_name();
  }

  $data->image = '<div class="wc-block-grid__product-image">' . $product->get_image('medium', $attr) . '</div>';

  return "<li class=\"wc-block-grid__product\">
    <a href=\"{$data->permalink}\" class=\"wc-block-grid__product-link\">
      {$data->badge}
      {$data->image}
      {$data->title}
    </a>
    {$data->price}
    {$data->rating}
    {$data->button}
  </li>";
}
