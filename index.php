<?php
$title = 'Blog';

get_header();
///// ?>

<?php get_template_part('parts/blog-header', '', [ 'title' => $title ]); ?>
<?php get_template_part('parts/posts'); ?>
<?php get_template_part('parts/pagination'); ?>

<?php /////
get_footer();