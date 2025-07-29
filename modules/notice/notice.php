<?php

$is_closed = isset($_COOKIE['my_notice_closed']);
if ($is_closed) { return; }

$is_enabled = get_field('notice_enable', 'option');
if (!$is_enabled) { return; }

$text = get_field('notice_text', 'option');
if (!$text) { return; }

$color = get_field('notice_color', 'option') ?: 'color-alert';

// ?>

<div class="notice has-background has-<?= esc_attr($color) ?>-background-color">
  <div class="notice__inner">
    <p>
      <?= H::markdown_no_p($text) ?>
    </p>
    <a class="notice__close" href="#close-notice" title="Close Notice"></a>
  </div>
</div>