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

<div class="post-wrapper">
  <main class="post-main" role="main">
    <header class="post-header">
      <?php if (has_post_thumbnail()): ?>
        <img
          loading="lazy"
          src="<?= esc_url(get_the_post_thumbnail_url(null, 'large')) ?>"
          alt="Banner of <?= esc_attr(get_the_title()) ?>"
        >
      <?php endif; ?>
      <h1>
        <?php the_title() ?>
      </h1>
      <ul class="post-header__meta">
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
    </header>

    <?php the_content() ?>

    <?php get_template_part('parts/author', ''); ?>

    <nav class="post-nav">
      <?php previous_post_link('%link', '%thumbnail <p>%label %title</p>'); ?>
      <?php next_post_link('%link', '%thumbnail <p>%label %title</p>'); ?>
    </nav>
  </main>
  <aside class="post-sidebar">
    <div class="post-sidebar__widget">
      <h5>
        <?= __('Related Posts') ?>
      </h5>
      <?php get_template_part('parts/posts', '', [
        'posts' => $related_posts,
        'view' => 'list',
        'has_date' => false,
        'has_author' => false,
        'has_excerpt' => false,
      ]); ?>
    </div>
  </aside>
</div>

<?php
  if (comments_open() || get_comments_number()) {
    comments_template();
  }
?>

<?php /////
get_footer();