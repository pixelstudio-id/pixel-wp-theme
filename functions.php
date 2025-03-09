<?php

$inc = __DIR__ . '/inc';
require_once $inc . '/_helpers.php';

// Abort if required plugins is inactive
if (!Helper::has_required_plugins()) { return; }

$THEME = wp_get_theme();
define('MY_VERSION', $THEME->get('Version'));
define('MY_DIST', get_stylesheet_directory_uri() . '/_dist');
define('MY_IMAGES', get_stylesheet_directory_uri() . '/images');


// Modules
require_once $inc . '/enqueue.php';
require_once $inc . '/acf.php';
require_once __DIR__ . '/gutenberg/index.php';

if (is_admin()) {
  require_once $inc . '/admin.php';
} else {
  // require_once $inc . '/api.php'; // @todo - uncomment this if you're using API
  require_once $inc . '/frontend.php';
}


if (class_exists('WooCommerce')) {
  require_once __DIR__ . '/woocommerce/_functions.php';
  require_once __DIR__ . '/woocommerce/_functions-gutenberg.php';
}


// Initial setup
my_before_setup_theme();
add_action('after_setup_theme', 'my_after_setup_theme');


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
  add_theme_support('post-thumbnails');
  add_theme_support('html5', [
    'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'navigation-widgets', 'style', 'script'
  ]);
  add_post_type_support('page', 'excerpt'); // allow page to have excerpt

  // Pixel Library Support
  add_theme_support('h-mega-menu');
  add_theme_support('px-faq-block');
  add_theme_support('px-icon-block', 'v6');
  add_theme_support('h-comment-editor'); // Enable this if you allow comment in the website
  add_theme_support('h-widgets');

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