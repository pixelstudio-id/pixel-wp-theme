<?php

add_filter('excerpt_length', 'my_custom_excerpt_length', 999);
add_action('pre_get_posts', 'my_exclude_pages_from_search');

add_filter('previous_post_link', 'my_adjacent_post_link', 10, 5);
add_filter('next_post_link', 'my_adjacent_post_link', 10, 5);

/**
 * @action pre_get_posts
 */
function my_exclude_pages_from_search($query) {
  if ($query->is_search() && $query->is_main_query() && !isset($_GET['post_type'])) {
    $query->set('post_type', 'post');
  }
}


/**
 * @filter excerpt_length
 */
function my_custom_excerpt_length($length) {
  return 24;
}

/**
 * @filter prev_post_link
 */
function my_adjacent_post_link($output, $format, $link, $post, $adjacent) {
  if (strpos($output, '%thumbnail') && $post) {
    $thumbnail_url = get_the_post_thumbnail_url($post->ID, 'thumbnail');
    $thumbnail = $thumbnail_url ? "<img src='{$thumbnail_url}'>"  : '';

    $output = str_replace('%thumbnail', $thumbnail, $output);
  }

  if (strpos($output, '%label')) {
    $label = $adjacent === 'next' ? __('Next Post') : __('Previous Post');
    $label = "<em>{$label}</em>";

    $output = str_replace('%label', $label, $output);
  }

  return $output;
}
