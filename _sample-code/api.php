<?php

add_action('rest_api_init', 'my_init_api');

/**
 * @action rest_api_init
 */
function my_init_api() {
  // sample-get/:id
  register_rest_route(MY_NAMESPACE, '/sample-get/(?P<id>\d+)', [
    'methods' => 'GET',
    'permission_callback' => '__return_true',
    'callback' => '_my_api_sample_get'
  ]);

  // sample-post/:id
  register_rest_route(MY_NAMESPACE, '/sample-post/(?P<id>\d+)', [
    'methods' => 'POST',
    'permission_callback' => function() {
      return current_user_can('edit_posts'); // editor or above
      // return current_user_can('activate_plugins'); // admin
      // return is_user_logged_in(); // any role as long as logged-in
    },
    'callback' => '_my_api_sample_post'
  ]);
}

/**
 * @route GET /sample-get/:id
 * 
 * Header:
 * X-WP-Nonce xxxxxx
 * Cookie wordpress_logged_in_xxxxx=pixelstudio%xxxxxx
 */
function _my_api_sample_get($params) {
  $id = $params['id'];
  return 'you passed in ID ' . $id;
}


/**
 * @route POST /sample-post/:id
 * 
 * This route is only accessible by User with "edit_posts" capability.
 * You need to pass in this Header:
 * 
 *     X-WP-Nonce   xxxxxx
 *     Cookie       wordpress_logged_in_xxxxx=pixelstudio%xxxxxx
 * 
 * Get the nonce and cookie by logging in and visitting `mysite.com/wp-json/kotta/v1/token` (need to enable this endpoint from /_lib/helpers.php first)
 * 
 * or if you use JWT Auth plugin:
 * 
 *     Authorization: Bearer <jwt-token>
 * 
 * jwt-token is given by the response when you're logging in via JWT endpoint
 */
function _my_api_sample_post($request) {
  $params = $request->get_params();
  $params = wp_parse_args($params, [
    'id' => 0,
    'data1' => 'default value',
    'data2' => 'default value',
  ]);
  
  return 'post request';
}