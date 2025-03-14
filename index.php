<?php
$page_id = get_queried_object_id();

the_post();
get_header();
///// ?>

<?php the_content() ?>

<?php get_template_part('parts/posts'); ?>
<?php get_template_part('parts/pagination'); ?>

<?php /////
get_footer();