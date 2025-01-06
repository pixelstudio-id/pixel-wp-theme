<?php

// ACF Blocks
add_filter('acf/format_value/name=sample', 'my_acf_format_sample', 10, 3);
add_action('acf/input/admin_footer', 'my_acf_change_color_palette');


/**
 * Customize the return value of ACF field by the name of 'sample'
 * 
 * @filter acf/format_value/name=sample 10
 */
function my_acf_format_sample($value, $post_id, $field) {
  return $value;
}


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
        '#2c3e50', '#ffffff',
        '#3498db', '#deedf8',
        '#2ecc71', '#def7e8',
        '#e74c3c', '#fbdedb'
      ];
      return args;
    });
  })();
  </script>
<?php }
