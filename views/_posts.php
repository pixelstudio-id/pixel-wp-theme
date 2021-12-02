<?php if ($args['posts']->have_posts()): ?>
  <ul class="wp-block-latest-posts wp-block-latest-posts__list is-grid columns-3 has-dates has-author alignwide">
  <?php while ($args['posts']->have_posts()): ?>
    <?php $args['posts']->the_post(); ?>

    <li>
      <?php if (has_post_thumbnail()): ?>
        <div class="wp-block-latest-posts__featured-image">
          <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('medium'); ?>
          </a>
        </div>
      <?php endif; ?>

      <a href="<?php the_permalink(); ?>">
        <?php the_title(); ?>
      </a>

      <div class="wp-block-latest-posts__post-author">
        by <?php the_author(); ?>
      </div>
      <time datetime="{{ post.post_date }}" class="wp-block-latest-posts__post-date">
        <?php echo get_the_date(); ?>
      </time>
      <div class="wp-block-latest-posts__post-excerpt">
        <?php the_excerpt(); ?>
      </div>
    </li>
  <?php endwhile; ?>
  </ul>

<?php else: ?>
  <div class="wp-block-group">
    <div class="wp-block-group__inner-container">
      <h1 class="has-text-align-center has-main-color">
        Posts Not Found
      </h1>
      <p class="has-text-align-center">
        Sorry, there are no posts that fit this category.
      </p>
    </div>
  </div>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
