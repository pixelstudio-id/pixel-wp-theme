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

///// IF USING ACF BLOCK

/*
add_action('acf/init', 'my_acf_xxx_block');
add_filter('acf/settings/load_json', 'my_acf_xxx_block_json', 20);

function my_acf_xxx_block() {
  acf_register_block_type([
    'name' => 'example',
    'title' => __('ACF Example'),
    'description' => __('A custom ACF Block'),
    'category' => 'design',
    'icon' => 'admin-comments',
    'mode' => 'edit',
    'render_callback' => 'my_acf_render_xxx_block'
  ]);
}

function my_acf_xxx_block_json($paths) {
  $paths[] = plugin_dir_path(__FILE__);
  return $paths;
}

function my_acf_render_xxx_block($block, $content='', $is_preview=false, $post_id=0) {
  $fields = get_fields();
  $title = $fields['title'] ?? '';
  $content = $fields['content'] ?? '';

  $atts = get_block_wrapper_attributes([
    'class' => 'acf-block-custom'
  ]);

  /// ?>

  <div <?= $atts ?>>
    <h2>
      <?= esc_html($title) ?>
    </h2>
    <?= wp_kses_attr($content) ?>
  </div>

  <?php ///
}
*/