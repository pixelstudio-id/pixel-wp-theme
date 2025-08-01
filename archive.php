<?php
global $wp_query;
$query = get_queried_object();

$title = $query->name;
$description = $query->description;
$posts = $wp_query->get_posts();

get_header();
///// ?>

<main role="main">
  <?php get_template_part('parts/blog-header', '', [
    'title' => $title,
    'description' => $description,
  ]); ?>
  <?php get_template_part('parts/posts', '', $posts); ?>
  <?php get_template_part('parts/pagination'); ?>
</main>

<?php /////
get_footer();