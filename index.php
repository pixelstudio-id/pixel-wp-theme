<?php
$page_id = get_queried_object_id();
$content = get_the_content(null, false, $page_id);

get_header();
///// ?>

<?= apply_filters('the_content', $content); ?>

<?php get_template_part('parts/posts'); ?>
<?php get_template_part('parts/pagination'); ?>

<?php /////
get_footer();