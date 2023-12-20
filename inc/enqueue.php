<?php

$THEME = wp_get_theme();
define('THEME_VERSION', $THEME->get('Version'));

add_action('wp_enqueue_scripts', 'my_public_assets', 99);
add_action('admin_enqueue_scripts', 'my_admin_assets', 100);
add_action('enqueue_block_editor_assets', 'my_editor_assets', 100);


/**
 * Front-end CSS and JS
 * @action wp_enqueue_scripts 100
 */
function my_public_assets() {
  wp_enqueue_style('my-app', MY_DIST . '/app.css', [], THEME_VERSION);
  wp_enqueue_style('my-gutenberg', MY_DIST . '/gutenberg.css', [], THEME_VERSION);

  // wp_enqueue_script('h-scroll'); // enable if using Animation

  // Disable gutenberg default styling
  wp_dequeue_style('wp-block-library');
  wp_dequeue_style('wp-block-library-theme');
  wp_dequeue_style('global-styles');

  // Javascript
  wp_enqueue_script('my-app', MY_DIST . '/app.js', [], THEME_VERSION, true);
}

/**
 * WP Admin assets
 * @action admin_enqueue_scripts 100
 */
function my_admin_assets() {
  wp_dequeue_style('global-styles-css-custom-properties');

  wp_enqueue_script('my-admin', MY_DIST . '/my-admin.js', [], THEME_VERSION , true);
  wp_enqueue_style('my-admin', MY_DIST . '/my-admin.css', [], THEME_VERSION);
}


/**
 * Gutenberg editor assets
 * @action enqueue_block_editor_assets 100
 */ 
function my_editor_assets() {
  if (!is_admin()) { return; }

  wp_enqueue_script('my-editor', MY_DIST . '/my-editor.js', [ 'wp-blocks', 'wp-dom' ] , THEME_VERSION, true);
  wp_enqueue_style('my-editor', MY_DIST . '/my-editor.css', [ 'wp-edit-blocks' ], THEME_VERSION);
}