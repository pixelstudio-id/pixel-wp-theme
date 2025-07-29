<?php
global $wp_query;
$query = get_search_query();

// ?>

<header class="subheader">
  <ul class="subheader-items">
    <li></li>
    <li>
      <form role="search" method="get" class="subheader__search" action="<?= home_url() ?>">
        <label>
          <input type="search" placeholder="Cari …" value="<?= esc_attr($query) ?>" name="s">
        </label>
        <input type="submit" value="Cari">
      </form>
    </li>
  </ul>
</header>