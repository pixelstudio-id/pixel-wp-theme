<?php
$logo_id = get_theme_mod('custom_logo');
$logo_src = wp_get_attachment_image_url($logo_id, 'medium');

$footer_text = get_field('footer_text', 'option') ?: '';
$footer_menu = wp_nav_menu([
  'theme_location' => 'footer-menu',
  'menu_class' => 'footer-menu menu',
  'echo' => false,
]);

///// ?>

<footer class="main-footer">

  <div class="footer-mid">
    <ul class="footer-items">
      <li>
        <div class="wp-block-site-logo">
          <a href="<?= get_home_url() ?>" class="custom-logo-link" rel="home">
            <img loading="lazy" src="<?= esc_attr($logo_src) ?>">
          </a>
        </div>
        <?= wp_kses_post(H::markdown($footer_text)) ?>
      </li>
      <li>
        <?= wp_kses_post($footer_menu) ?>
      </li>
      <li>
        Address
      </li>
    </ul>
  </div>

  <div class="footer-bottom">
    <ul class="footer-items">
      <li>
        <p class="footer-copyright">
          Copyright &copy; <?= date('Y') ?></span> - All Rights Reserved 
        </p>
      </li>
      <li>
        <p class="footer-credit">
          Created by <a href="https://pixelstudio.id" target="_blank">Pixel Studio</a>
        </p>
      </li>
    </ul>
  </div>
</footer>