<?php if (!defined('ABSPATH')) { exit; }

if (!is_admin()) {
  add_filter('body_class', 'my_body_class_cover_below_header');
}

/**
 * Add extra class if using Cover with Below Header style
 * 
 * @filter body_class
 */
function my_body_class_cover_below_header($classes) {
  global $post;
  if (!$post) { return $classes; }

  preg_match('/wp-block-cover.+is-style-(h|px)-below-header/', $post->post_content, $matches);

  $prefix = $matches[1] ?? '';
  if ($matches) {
    $classes[] = "{$prefix}-has-transparent-header";
  }
  return $classes;
}