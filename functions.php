<?php

require_once 'codes/helpers.php';
if( !MyHelper::has_required_plugins() ) { return false; }

add_action( 'wp_enqueue_scripts', 'my_enqueue_assets', 100 );
add_action( 'after_setup_theme', 'my_after_setup_theme' );

my_start();


/////

/**
 * Run first
 */
function my_start() {
  require_once 'codes/timber.php';
  require_once 'codes/hooks.php';
  require_once 'codes/shortcodes.php';
  require_once 'codes/blocks.php';
  require_once 'codes/api.php';

  if( class_exists('WooCommerce') ) {
    require_once 'functions-shop.php';
  }

  new MyAPI();
  new MyBlocks();
  new MyTimber();
  new MyHooks();
  new MyShortcodes();

  /**
   * Register custom post type
   * - Read how at https://github.com/hrsetyono/edje-wp-library/wiki/Custom-Post-Type
   */
  H::register_post_type( 'item', [ 'icon' => 'dashicons-cart' ] );
  // H::register_taxonomy( 'brand', [ 'post_type' => 'product' ] );

  /**
   * Create Gutenberg block for post listing
   */
  H::register_post_block( 'post' );
  // H::register_post_block( 'product' );
}


/**
 * Register all your CSS and JS here
 * @action wp_enqueue_scripts 100
 */
function my_enqueue_assets() {
  $css_dir = get_stylesheet_directory_uri() . '/assets/css';
  $js_dir = get_stylesheet_directory_uri() . '/assets/js';

  // Stylesheet
  wp_enqueue_style( 'my-framework', $css_dir . '/framework.css' );
  wp_enqueue_style( 'my-app', $css_dir . '/app.css' );
  wp_enqueue_style( 'dashicons', get_stylesheet_uri(), 'dashicons' ); // WP native icons
  
  // Edje Library
  wp_enqueue_script( 'h-lightbox' );
  wp_enqueue_script( 'h-slider' );
  wp_enqueue_style( 'h-lightbox' );
  wp_enqueue_style( 'h-slider' );

  // Javascript
  wp_enqueue_script( 'my-app', $js_dir . '/app.js', ['jquery'], false, true );
}


/**
 * Run after theme is loaded
 * @action after_setup_theme
 */
function my_after_setup_theme() {
  add_theme_support( 'post-thumbnails' );
  add_theme_support( 'menus' );
  add_theme_support( 'custom-logo' );
  add_theme_support( 'title_tag' );
  add_theme_support( 'html5', ['search-form', 'comment-form', 'gallery', 'caption'] );
  add_theme_support( 'automatic-feed-links' );
  add_post_type_support( 'page', 'excerpt' ); // allow page to have excerpt
  
  add_theme_support( 'widgets' );

  // Gutenberg support
  add_theme_support( 'align-wide' );
  add_theme_support( 'responsive-embeds' );

  /**
   * Each color will be outputted into 2 classes: `has-x-background-color` and `has-x-color`.
   * 
   * The values are turned into CSS Variable, such as `red` becoming `var(--red)`
   */
  $palette = H::register_colors([
    'Red' => 'red', // $label => $slug
    'Light Red' => 'red-light',
    'Orange' => 'orange',
    'Light Orange' => 'orange-light',
    'Yellow' => 'yellow',
    'Light Yellow' => 'yellow-light',
    'Green' => 'green',
    'Light Green' => 'green-light',
    'Blue' => 'blue',
    'Light Blue' => 'blue-light',

    'Black' => 'black',
    'Gray' => 'gray',
    'Light Gray' => 'gray-light',
    'White' => 'white'
  ]);
  add_theme_support( 'editor-color-palette', $palette );


  // Create Nav assignment
  register_nav_menu( 'main-nav', 'Main Nav' );
  register_nav_menu( 'social-nav', 'Social Nav' );
  register_nav_menu( 'blog-nav', 'Blog Nav' );

  
  // ACF Option page
  if( function_exists( 'acf_add_options_page' ) ) {
    acf_add_options_sub_page( [
  		'page_title' => 'Theme Options',
  		'parent_slug' => 'themes.php',
    ] );
  }
}
