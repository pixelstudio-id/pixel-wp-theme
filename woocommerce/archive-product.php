<?php
global $wp_query;
$term = get_queried_object();

$display_mode = woocommerce_get_loop_display_mode();

$title = $term->name;
$content = wpautop($term->description);
$pagination = H::get_pagination();

$categories = null;
$products = [];

// if display products
if ($display_mode === 'both' || $display_mode === 'products') {
  $products = $wp_query->get_posts();
}

// if display categories
if ($display_mode === 'both' || $display_mode === 'subcategories') {
  $raw_cats = woocommerce_get_product_subcategories($term->term_id);

  $categories = array_map(function($c) {
    // get thumbnail image
    $thumb_id = get_term_meta($c->term_id, 'thumbnail_id', true);
    $image = wp_get_attachment_image_src($thumb_id, 'medium');
    $c->image = $image ? $image[0] : wc_placeholder_img_src();

    // get permalink
    $c->link = get_term_link($c->term_id, 'product_cat');

    return $c;
  }, $raw_cats);
}

// disable pagination
if ($display_mode === 'subcategories') {
  wc_set_loop_prop('total', 0);
}

get_header();
///// ?>

<header
  class="wp-block-cover alignfull"
  style="min-height:200px;"
>
  <span
    aria-hidden="true"
    class="wp-block-cover__background has-color-1-light-background-color"
  ></span>
  <div class="wp-block-cover__inner-container">
    <h1 class="has-color has-text-color has-text-align-center">
      <?= $title ?>
    </h1>

    <?php if ($content): ?>
      <?= H::markdown($content) ?>
    <?php endif; ?>
  </div>
</header>

<?php if ($categories) {
  get_template_part('woocommerce/parts/categories', '', $args);
} ?>

<?php get_template_part('woocommerce/parts/products', '', ['products' => $products]); ?>
<?php get_template_part('parts/pagination', '', $pagination); ?>

<?php /////
get_footer();