<?php

require_once __DIR__ . '/_lib/helpers.php';

// Abort if required plugins is inactive
if (!Helper::has_required_plugins()) { return; }

$THEME = wp_get_theme();
define('MY_VERSION', $THEME->get('Version'));
define('MY_NAMESPACE', 'my/v1');
define('MY_DIST', get_stylesheet_directory_uri() . '/_dist');
define('MY_IMAGES', get_stylesheet_directory_uri() . '/images');

require_once __DIR__ . '/modules/modules.php';
require_once __DIR__ . '/gutenberg/gutenberg.php';

if (class_exists('WooCommerce')) {
  require_once __DIR__ . '/woocommerce/_shop-functions.php';
}

// Initial setup
my_before_setup_theme();
add_action('after_setup_theme', 'my_after_setup_theme');
add_action('wp_enqueue_scripts', 'my_enqueue_public_assets', 99);
add_action('admin_enqueue_scripts', 'my_enqueue_admin_assets', 100);
add_action('enqueue_block_editor_assets', 'my_enqueue_editor_assets', 1000);


/////

/**
 * Function that run first
 */
function my_before_setup_theme() {
  // Do something
}


/**
 * Setup theme supports
 * 
 * @action after_setup_theme
 */
function my_after_setup_theme() {
  add_theme_support('post-thumbnails');
  add_theme_support('menus');
  add_theme_support('custom-logo');
  add_theme_support('title-tag');
  add_theme_support('html5', [
    'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'navigation-widgets', 'style', 'script'
  ]);
  add_post_type_support('page', 'excerpt'); // allow page to have excerpt

  // Pixel Library Support
  add_theme_support('px-megamenu');
  add_theme_support('px-faq-block');
  add_theme_support('px-icon-block', 'v7-regular'); // v7-regular, v7-light, v7-duotone
  add_theme_support('px-tabs-block');

  add_theme_support('h-comment-editor'); // Enable this if you allow comment in the website

  // Gutenberg support
  add_theme_support('responsive-embeds');
  remove_theme_support('core-block-patterns');

  // Nav
  register_nav_menu('main-menu', 'Main Menu');
  register_nav_menu('footer-menu', 'Footer Menu');
}

// add_action('widgets_init', 'my_widgets_init');
// function my_widgets_init() {
//   register_sidebar([
//     'name' => 'Sidebar',
//     'id' => 'sidebar',
//     'description' => 'Appear besides post',
//     'before_widget' => '<div id="%1$s" class="widget %2$s">',
//     'after_widget'  => '</div>',
//     'before_title'  => '<h3 class="widgettitle">',
//     'after_title'   => '</h3>',
//   ]);
// }


/**
 * Front-end CSS and JS
 * @action wp_enqueue_scripts 100
 */
function my_enqueue_public_assets() {
  wp_enqueue_style('my-theme', MY_DIST . '/my-theme.css', [], MY_VERSION);
  wp_enqueue_script('my-theme', MY_DIST . '/my-theme.js', [], MY_VERSION, true);

  wp_enqueue_script('swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js', [], '11.0.0', true);
  // wp_enqueue_script('h-scroll'); // enable if using Animation

  // @todo - enable this if you need to use AJAX with PixelFetch.js
  // wp_localize_script('my-theme', 'myApiSettings', [
  //   'nonce' => wp_create_nonce('wp_rest'),
  //   'myUrl' => esc_url_raw(rest_url()) . MY_NAMESPACE,
  //   'wpUrl' => esc_url_raw(rest_url()) . 'wp/v2',
  // ]);
}

/**
 * WP Admin assets
 * @action admin_enqueue_scripts 100
 */
function my_enqueue_admin_assets() {
  wp_enqueue_script('my-admin', MY_DIST . '/my-admin.js', [], MY_VERSION , true);
  wp_enqueue_style('my-admin', MY_DIST . '/my-admin.css', [], MY_VERSION);
}

function my_enqueue_editor_assets() {
  if (!is_admin()) { return; }

  wp_enqueue_script('my-editor', MY_DIST . '/my-editor.js', [ 'wp-blocks', 'wp-dom' ] , MY_VERSION, true);
  wp_enqueue_style('my-editor', MY_DIST . '/my-editor.css', [ 'wp-edit-blocks' ], MY_VERSION);
}