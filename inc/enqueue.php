<?php

add_action('wp_enqueue_scripts', 'my_public_assets', 99);
add_action('admin_enqueue_scripts', 'my_admin_assets', 100);

/**
 * Front-end CSS and JS
 * @action wp_enqueue_scripts 100
 */
function my_public_assets() {
  wp_enqueue_style('my-parts', MY_DIST . '/parts.css', [], MY_VERSION);
  wp_enqueue_script('my-parts', MY_DIST . '/parts.js', [], MY_VERSION, true);
  
  wp_enqueue_style('my-main', MY_DIST . '/main.css', [], MY_VERSION);
  wp_enqueue_script('my-main', MY_DIST . '/main.js', [], MY_VERSION, true);
  
  wp_enqueue_style('my-plugins', MY_DIST . '/plugins.css', [], MY_VERSION);
  wp_enqueue_script('my-plugins', MY_DIST . '/plugins.js', [], MY_VERSION, true);

  // wp_enqueue_script('h-scroll'); // enable if using Animation
}

/**
 * WP Admin assets
 * @action admin_enqueue_scripts 100
 */
function my_admin_assets() {
  wp_enqueue_script('my-admin', MY_DIST . '/admin.js', [], MY_VERSION , true);
  wp_enqueue_style('my-admin', MY_DIST . '/admin.css', [], MY_VERSION);
}