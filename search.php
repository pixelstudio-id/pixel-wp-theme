<?php
global $wp_query;
$query = get_search_query();

get_header();
///// ?>

<div
  class="wp-block-cover alignfull"
  style="min-height:240px;"
>
  <span
    aria-hidden="true"
    class="wp-block-cover__background has-gray-light-background-color"
  ></span>
  <div class="wp-block-cover__inner-container">
    <h1 class="has-color has-text-color alignwide" style="font-weight:400">
      Search result for: "<?= $query ?>"
    </h1>

    <form class="wp-block-search__button-inside wp-block-search__icon-button wp-block-search alignwide" role="search" method="get" action="<?= home_url() ?>">
      <div class="wp-block-search__inside-wrapper ">
        <input type="search" class="wp-block-search__input " name="s" value="<?= $query ?>" placeholder="Search for keywords...">
        <button type="submit" class="wp-block-search__button  has-icon">
          <svg id="search-icon" class="search-icon" viewBox="0 0 24 24" width="24" height="24">
            <path d="M13.5 6C10.5 6 8 8.5 8 11.5c0 1.1.3 2.1.9 3l-3.4 3 1 1.1 3.4-2.9c1 .9 2.2 1.4 3.6 1.4 3 0 5.5-2.5 5.5-5.5C19 8.5 16.5 6 13.5 6zm0 9.5c-2.2 0-4-1.8-4-4s1.8-4 4-4 4 1.8 4 4-1.8 4-4 4z"></path>
          </svg>
        </button>
      </div>
    </form>

  </div>
</div>

<?php get_template_part('parts/posts'); ?>

<?php /////
get_footer();