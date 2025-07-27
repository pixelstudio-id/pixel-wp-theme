<?php if (!defined('WPINC')) { die; } // exit if accessed directly

add_filter('render_block_core/xxx', 'my_render_xxx_block', 10, 2);
add_action('admin_init', 'my_register_xxx_pattern');

/**
 * 
 */
function my_render_xxx_block($content, $block) {
  $is_custom_style = isset($block['attrs']['className']) && strpos($block['attrs']['className'], 'is-style-my-custom') !== false;
  if (!$is_custom_style) { return $content; }

  // do something

  return $content;
}

/**
 * How to format: Create the block in editor, copy it, paste it in https://codebeautify.org/javascript-escape-unescape
 * 
 * @action admin_init
 */
function my_register_xxx_pattern() {
  register_block_pattern('my/custom', [
    'title' => 'Custom',
    'categories' => [],
    'description' => '',
    'content' => "",
  ]);
}