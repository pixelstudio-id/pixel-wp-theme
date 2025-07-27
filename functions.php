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
add_action('acf/input/admin_footer', 'my_acf_change_color_palette');


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
  add_theme_support('px-megamenu');
  add_theme_support('px-faq-block');
  add_theme_support('px-icon-block', 'v6');
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
 * Change the palette on ACF Color Picker
 * 
 * @action acf/input/admin_footer
 * @todo - don't forget to change accordingly if you use ACF Color Picker
 */
function my_acf_change_color_palette() { ?>
  <script>
  (function() {
    acf.add_filter('color_picker_args', function(args, $field) {
      args.palettes = [
        '#5C6BC0', '#D3D7EE',
        '#2ecc71', '#def7e8',
        '#e74c3c', '#fbdedb',
        '#252427', '#ffffff'
      ];
      return args;
    });
  })();
  </script>
<?php }
