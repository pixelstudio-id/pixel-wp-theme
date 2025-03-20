<?php
global $posts;
if (isset($args['posts'])) {
  $posts = $args['posts'];
}

$view = $args['view'] ?? 'grid'; // either 'list' or 'grid'
$columns = $args['columns'] ?? 3;

$has_author = $args['has_author'] ?? true;
$has_date = $args['has_date'] ?? true;
$has_excerpt = $args['has_excerpt'] ?? true;

// ?>

<?php if (count($posts) > 0): ?>
  <ul class="wp-block-latest-posts wp-block-latest-posts__list is-<?= esc_attr($view) ?> columns-<?= esc_attr($columns) ?> alignwide">
  <?php foreach ($posts as $post): ?>
    <?php setup_postdata($post); ?>

    <li>
      <div class="wp-block-latest-posts__featured-image">
        <a href="<?php the_permalink(); ?>">
          <?php if (has_post_thumbnail()): ?>
            <?php the_post_thumbnail('medium'); ?>
          <?php else: ?>
            <img loading="lazy" src="<?= get_template_directory_uri(); ?>/images/post-default-thumb.jpg">
          <?php endif; ?>
        </a>
      </div>

      <a class="wp-block-latest-posts__post-title" href="<?php the_permalink(); ?>">
        <?php the_title(); ?>
      </a>
      
      <?php if ($has_author): ?>
        <div class="wp-block-latest-posts__post-author">
          by <?php the_author(); ?>
        </div>
      <?php endif ?>

      <?php if ($has_date): ?>
        <time class="wp-block-latest-posts__post-date">
          <?= get_the_date() ?>
        </time>
      <?php endif ?>

      <?php if ($has_excerpt): ?>
        <div class="wp-block-latest-posts__post-excerpt">
          <?php the_excerpt(); ?>
        </div>
      <?php endif ?>
    </li>
  <?php endforeach; ?>
  </ul>

<?php else: ?>
  <div class="wp-block-group">
    <h1 class="has-text-align-center has-main-color">
      Posts Not Found
    </h1>
    <p class="has-text-align-center">
      Sorry, there are no posts that fit this category.
    </p>
  </div>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
