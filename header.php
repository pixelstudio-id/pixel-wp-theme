<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="main-container">

  <?php get_template_part('parts/notice/notice') ?>
  <?php get_template_part('parts/header-sub/header-sub') ?>
  <?php get_template_part('parts/header-main/header-main') ?>
