<?php if (!defined('WPINC')) { die; } // exit if accessed directly


add_action('acf/init', 'my_acf_xxx_block');
add_filter('acf/format_value/name=sample', 'my_acf_format_sample', 10, 3);
add_filter('acf/settings/load_json', 'my_acf_xxx_block_json', 20);

/**
 * You need to create a new ACF Fields and set the appearance to Block > this block.
 * 
 * @action acf/init
 */
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

/**
 * Customize the return value of ACF field by the name of 'sample'
 * 
 * @filter acf/format_value/name=sample 10
 */
function my_acf_format_sample($value, $post_id, $field) {
  return $value;
}


/**
 * Render ACF xxx block
 */
function my_acf_render_xxx_block($block, $content='', $is_preview=false, $post_id=0) {
  $fields = get_fields();
  $title = $fields['title'] ?? '';
  $content = $fields['content'] ?? '';

  $atts = get_block_wrapper_attributes([
    'class' => 'acf-block-custom'
  ]);

  /// ?>

  <div <?= esc_attr($atts) ?>>
    <h2>
      <?= esc_html($title) ?>
    </h2>
    <?= wp_kses_attr($content) ?>
  </div>

  <?php ///
}

/**
 * Allow this folder to contain ACF JSON files
 * 
 * @filter acf/settings/load_json
 */
function my_acf_xxx_block_json($paths) {
  $paths[] = plugin_dir_path(__FILE__);
  return $paths;
}
