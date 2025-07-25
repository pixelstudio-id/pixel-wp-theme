<?php

add_filter('render_block_core/gallery', '_px_setup_gallery_slider', 10, 2);
  
/**
 * Change the HTML tag to Swiper's elements
 * 
 * @filter render_block_core/gallery
 */
function _px_setup_gallery_slider($content, $block) {
  // add `columns-x` class if column is not set
  // if (!isset($block['attrs']['columns'])) {
  //   $items_count = count($block['innerBlocks']);
  //   $items_count = $items_count > 3 ? 3 : $items_count;
  //   $content = preg_replace('/(wp-block-gallery.+)(columns-default)/Uis', '$1columns-' . $items_count, $content);
  // }

  $is_slider_style = isset($block['attrs']['className']) && strpos($block['attrs']['className'], 'is-style-px-slider') !== false;
  if (!$is_slider_style) { return $content; }

  // change all image to <swiper-slide>
  $content = preg_replace('/<figure(\sclass="wp-block-image.+)<\/figure>/Ui', '<swiper-slide$1</swiper-slide>', $content);
  
  // change wrapper into <swiper-container>
  $content = preg_replace('/<figure(\sclass="wp-block-gallery.+)<\/figure>/Uis', '<swiper-container init="false" $1</swiper-container>', $content);

  return $content;
}