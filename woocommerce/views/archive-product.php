<?php
  $title = $args['title'] ?? '';
  $content = $args['content'] ?? '';

  $categories = $args['categories'] ?? null;
  $products = $args['products'] ?? [];
?>

<main>
  <header class="wp-block-group alignwide / shop-header">
    <h1 class="has-text-align-center">
      <?= $title ?>
    </h1>
    <div class="has-text-align-center">
      <?= $content ?>
    </div>
  </header>

  <?php if ($categories) {
    get_template_part('woocommerce/views/_categories', '', $args);
  } ?>

  <?php if ($products) {
    get_template_part('woocommerce/views/_products', '', $args);
    get_template_part('views/_pagination', '', $args);
  } ?>
</main>