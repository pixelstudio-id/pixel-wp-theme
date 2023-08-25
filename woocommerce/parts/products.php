<?php
  $products = $args['products'];
  $product_ids = array_map(function($p) {
    return $p->ID;
  }, $products);

  $catalog_columns = $args['catalog_columns'] ?? get_option('woocommerce_catalog_columns');

///// ?>

<?php if ($products): ?>
  <?= render_block([
    'blockName' => 'woocommerce/handpicked-products',
    'attrs' => [
      'align' => 'wide',
      'columns' => $catalog_columns,
      'contentVisibility' => [
        'image' => true,
        'title' => true,
        'price' => true,
        'rating' => true,
        'button' => false,
      ],
      'products' => $product_ids,
    ],
  ]) ?>
<?php else: ?>
  <div class="wp-block-group">
    <h2 class="has-text-align-center">
      Product Not Found
    </h2>
    <p class="has-text-align-center">
      Sorry, there is no product in this category
    </p>
  </div>
<?php endif; ?>
<?php wp_reset_postdata(); ?>