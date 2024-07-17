<?php
global $wp_query;
$posts = $args['posts'] ?? $wp_query->get_posts();

// ?>

<?php if (count($posts) > 0): ?>
  <ul class="wp-block-latest-posts wp-block-latest-posts__list is-grid columns-3 has-dates has-author alignwide">
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

      <a href="<?php the_permalink(); ?>">
        <?php the_title(); ?>
      </a>

      <div class="wp-block-latest-posts__post-author">
        by <?php the_author(); ?>
      </div>
      <time class="wp-block-latest-posts__post-date">
        <?= get_the_date() ?>
      </time>
      <div class="wp-block-latest-posts__post-excerpt">
        <?php the_excerpt(); ?>
      </div>
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
