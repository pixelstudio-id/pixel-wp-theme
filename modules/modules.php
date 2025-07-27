<?php

require_once __DIR__ . '/blog/blog.php';

add_action('wp_enqueue_scripts', 'my_enqueue_public_assets', 99);
add_action('admin_enqueue_scripts', 'my_enqueue_admin_assets', 100);

/**
 * Front-end CSS and JS
 * @action wp_enqueue_scripts 100
 */
function my_enqueue_public_assets() {
  wp_enqueue_style('my-parts', MY_DIST . '/my-parts.css', [], MY_VERSION);
  wp_enqueue_script('my-parts', MY_DIST . '/my-parts.js', [], MY_VERSION, true);
  
  wp_enqueue_style('my-main', MY_DIST . '/my-main.css', [], MY_VERSION);
  wp_enqueue_script('my-main', MY_DIST . '/my-main.js', [], MY_VERSION, true);

  wp_enqueue_script('ltl-swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js', [], '', true);
  // wp_enqueue_script('h-scroll'); // enable if using Animation

  // @todo - enable this if you need to use AJAX with PixelFetch.js
  // wp_localize_script('my-main', 'myApiSettings', [
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

  // @todo - enable this if you need to use AJAX with PixelFetch.js within admin panel
  // wp_localize_script('my-admin', 'myApiSettings', [
  //   'nonce' => wp_create_nonce('wp_rest'),
  //   'myUrl' => esc_url_raw(rest_url()) . MY_NAMESPACE,
  //   'wpUrl' => esc_url_raw(rest_url()) . 'wp/v2',
  // ]);
}