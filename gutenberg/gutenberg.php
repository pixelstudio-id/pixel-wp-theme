<?php

require_once __DIR__ . '/gallery-slider/gallery-slider.php';

if (is_admin()) {
  add_action('admin_enqueue_scripts', 'my_admin_gutenberg_assets', 100);
  add_action('enqueue_block_editor_assets', 'my_editor_assets', 1000);

  add_filter('px_disallowed_blocks', 'my_disallowed_blocks');
  // add_filter('px_blocks_disabled_tab', 'my_blocks_disabled_tab');
} else {
  add_action('wp_enqueue_scripts', 'my_public_gutenberg_assets', 99);
}


/**
 * Front-end CSS and JS
 * @action wp_enqueue_scripts 100
 */
function my_public_gutenberg_assets() {
  wp_enqueue_style('my-gutenberg', MY_DIST . '/my-gutenberg.css', [], MY_VERSION);
  wp_enqueue_script('my-gutenberg', MY_DIST . '/my-gutenberg.js', [], MY_VERSION, true);

  // Disable gutenberg default styling
  wp_dequeue_style('wp-block-library');
  wp_dequeue_style('wp-block-library-theme');
  wp_dequeue_style('global-styles');
}

/**
 * WP Admin assets
 * @action admin_enqueue_scripts 100
 */
function my_admin_gutenberg_assets() {
  wp_dequeue_style('global-styles-css-custom-properties');
}


/**
 * Gutenberg editor assets
 * @action enqueue_block_editor_assets 100
 */ 
function my_editor_assets() {
  if (!is_admin()) { return; }

  wp_enqueue_script('my-editor', MY_DIST . '/my-editor.js', [ 'wp-blocks', 'wp-dom' ] , MY_VERSION, true);
  wp_enqueue_style('my-editor', MY_DIST . '/my-editor.css', [ 'wp-edit-blocks' ], MY_VERSION);
}

/**
 * Limit the available blocks
 * 
 * @filter h_disallowed_blocks
 */
function my_disallowed_blocks($blocks) {
  $disabled_blocks = [
    'core/video',
    'core/pullquote',
    'core/nextpage',
    'core/more',
    'core/preformatted',
    'core/code',

    // widget
    'core/calendar',
    'core/tag-cloud',
    // 'core/search',
    'core/latest-comments',
    'core/rss',
    'core/archives',
    'core/categories',
    'core/social-links',

    // full-site editing
    'core/site-logo',
    'core/site-tagline',
    'core/site-title',
    'core/query',
    'core/post-title',
    'core/post-content',
    'core/post-date',
    'core/post-excerpt',
    'core/post-featured-image',
    'core/loginout',
    'core/page-list',
    'core/query-title',
    'core/post-terms',
    'core/navigation',
    'core/post-author',
    'core/post-comments',
    'core/term-description',
    'core/post-navigation-link',
    'core/read-more',
    'core/avatar',
    'core/post-author-name',
    'core/post-author-biography',
    'core/post-comments-form',
    'core/post-comment',
    'core/post-comments-count',
    'core/post-comments-link',
    'core/template-part',
    'core/comments',
  ];

  if (class_exists('Jetpack')) {
    $disabled_blocks = array_merge($disabled_blocks, [
      'jetpack/contact-info',
      'jetpack/business-hours',
      'jetpack/slideshow',
      'jetpack/image-compare',
      'jetpack/rating-star',
      'jetpack/send-a-message',
      'jetpack/calendly',
      'jetpack/eventbrite',
      'jetpack/gif',
      'jetpack/markdown',
      'jetpack/opentable',
      'jetpack/google-calendar',
      'jetpack/podcast-player',
      'jetpack/map',
      'jetpack/pinterest',
      'jetpack/revue',
      'jetpack/repeat-visitor',
      'jetpack/story',
      'jetpack/recurring-payments',
    ]);
  }

  if (class_exists('WooCommerce')) {
    $disabled_blocks = array_merge($disabled_blocks, [
      'woocommerce/product-search',
      'woocommerce/mini-cart',
      'woocommerce/active-filters',
      'woocommerce/stock-filter',
      'woocommerce/price-filter',
      'woocommerce/attribute-filter',
      
      'woocommerce/all-reviews',
      'woocommerce/reviews-by-product',
      'woocommerce/reviews-by-category',
      'woocommerce/all-products',
      'woocommerce/product-price',
      
      'woocommerce/customer-account',
      'woocommerce/filter-wrapper',
      'woocommerce/cart',
      'woocommerce/checkout',
    ]);
  }
  return $disabled_blocks;
}

/**
 * @filter px_blocks_disabled_tab
 */
function my_blocks_disabled_tab($blocks) {
  $blocks = array_merge($blocks, [
    'core/file',
  ]);
  return $blocks;
}