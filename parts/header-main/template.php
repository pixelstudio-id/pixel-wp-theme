<?php

$logo_id = get_theme_mod('custom_logo');
$logo_src = wp_get_attachment_image_url($logo_id, 'medium');

$contact_button = get_field('contact_button', 'option');

$menu = wp_nav_menu([
  'theme_location' => 'main-menu',
  'menu_class' => 'header-menu menu',
  'echo' => false,
  'container' => false,
]);

$menu_offcanvas = wp_nav_menu([
  'theme_location' => 'main-menu',
  'menu_class' => 'offcanvas-menu menu',
  'echo' => false,
  'container' => false,
]);

///// ?>

<header class="header" role="navigation">
  <ul class="header-items">
    <li>
      <div class="wp-block-site-logo">
        <a href="<?= get_home_url(); ?>" class="custom-logo-link" rel="home">
          <img loading="lazy" src="<?= $logo_src ?>">
        </a>
      </div>
    </li>
    <li>
      <?= $menu ?>
    </li>
    <li>
      <div class="wp-block-button">
        <a href="#">
          CONTACT US
        </a>
      </div>
    </li>
  </ul>
</header>

<!-- Mobile Header -->
<header class="header-mobile" role="navigation">
  <ul class="header-items">
    <li>
      <div class="wp-block-site-logo">
        <a href="<?= get_home_url(); ?>" class="custom-logo-link" rel="home">
          <img loading="lazy" src="<?= $logo_src ?>">
        </a>
      </div>
    </li>
    <li>
      <a class="toggle-offcanvas" href="#menu">
        <span>Menu</span>
      </a>
    </li>
  </ul>
</header>

<!-- Offcanvas -->
<aside class="offcanvas" role="navigation">
  <a class="toggle-offcanvas" href="#menu">
    <span>Close</span>
  </a>

  <ul class="offcanvas__inner">
    <li>
      <?= $menu_offcanvas ?>
    </li>
    <li>
      <div class="wp-block-button">
        <a href="#">
          CONTACT US
        </a>
      </div>
    </li>
  </ul>
</aside>