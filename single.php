<?php
global $post;

$related_posts = get_posts([
  'post_type' => 'post',
  'posts_per_page' => '3',
  'post__not_in' => [ $post->ID ],
  'orderby' => 'rand',
  // 'category__in' => array_map(function($term) {
  //   return $term->term_id;
  // }, get_the_category()),
]);

the_post();

$terms = get_the_category();
if ($terms) {
  $terms = array_map(function($t) {
    $t->_link = get_category_link($t);
    return $t;
  }, $terms);
}

$tags = get_the_tags();
if ($tags) {
  $tags = array_map(function($t) {
    $t->_link = get_tag_link($t);
    return $t;
  }, $tags);
}

get_header();
///// ?>

<header class="post-hero | wp-block-cover alignfull" style="min-height:350px;">
  <span
    aria-hidden="true"
    class="wp-block-cover__background has-color-1-background-color has-background-dim"
  ></span>

  <?php if (has_post_thumbnail()): ?>
    <img
      class="wp-block-cover__image-background"
      loading="lazy"
      src="<?= esc_url(get_the_post_thumbnail_url(null, 'large')) ?>"
      alt="<?= esc_attr(get_the_title()) ?>"
    >
  <?php endif; ?>

  <div class="wp-block-cover__inner-container">
    <h1 class="has-color has-text-invert-color has-text-align-center">
      <?php the_title(); ?>
    </h1>

    <ul class="post-meta | is-style-px-inline">
      <li>
        By <?php the_author(); ?>
      </li>

      <li>
        <?= get_the_date() ?>
      </li>

      <?php if ($terms): ?>
      <li>
        <?php foreach ($terms as $term): ?>
          <a href="<?= esc_url($term->_link) ?>">
            <?= esc_html($term->name) ?>
          </a>
        <?php endforeach; ?>
      </li>
      <?php endif; ?>

      <?php if (get_comments_number() !== '0'): ?>
        <li>
          <a href="#comments">
            <?= sprintf(__('%d Comments'), get_comments_number()) ?>
          </a>
        </li>
      <?php endif; ?>

      <?php if ($tags): ?>
        <li>
          <?php foreach ($tags as $tag): ?>
            <a href="<?= esc_url($tag->_link) ?>">
              <?= esc_html($tag->name) ?>
            </a>
          <?php endforeach; ?>
        </li>
      <?php endif; ?>
    </ul>
  </div>
</header>

<?php the_content(); ?>

<?php if (function_exists('sharing_display')) {
  do_shortcode('[h-jetpack-sharing]');
} ?>

<?php get_template_part('parts/author', ''); ?>

<nav class="post-nav">
  <?php previous_post_link('%link', '%thumbnail <p>%label %title</p>'); ?>
  <?php next_post_link('%link', '%thumbnail <p>%label %title</p>'); ?>
</nav>

<footer class="related-posts / wp-block-group has-background has-text-invert-background-color alignfull">
  <h3 class="alignwide">
    <?= __('Related Posts') ?>
  </h3>
  <?php get_template_part('parts/posts', '', ['posts' => $related_posts]); ?>
</footer>

<?php
  if (comments_open() || get_comments_number()) {
    comments_template();
  }
?>

<?php /////
get_footer();