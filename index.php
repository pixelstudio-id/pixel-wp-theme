<?php
$page_id = get_queried_object_id();
$content = get_the_content(null, false, $page_id);
$content = apply_filters('the_content', $content);

get_header();
///// ?>

<main role="main">
  <?= wp_kses_post($content) ?>

  <?php get_template_part('parts/posts'); ?>
  <?php get_template_part('parts/pagination'); ?>
</main>

<?php /////
get_footer();