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

  register_rest_route(MY_NAMESPACE, '/token', [
    'methods' => 'GET',
    'permission_callback' => '__return_true',
    'callback' => '_my_api_get_token'
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
 *     X-WP-Nonce xxxxxx
 *     Cookie wordpress_logged_in_xxxxx=pixelstudio%xxxxxx
 * 
 * Get the nonce and cookie by logging in and visitting `mysite.com/wp-json/<namespace>/token`
 * 
 * or if you use JWT Auth plugin:
 * 
 *     Authorization: Bearer <token>
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

/**
 * Get the Cookie and Nonce by visiting this endpoint while logged-in in your browser.
 * For use in Postman or other API testing tools.
 * 
 * @route GET /token
 */
function _my_api_get_token() {
  $nonce = wp_create_nonce('wp_rest');
  $cookie = '';

  foreach ($_COOKIE as $key => $value) {
    $is_login_cookie = preg_match('/^wordpress_logged_in_/', $key);

    if ($is_login_cookie) {
      $cookie = "{$key}={$value}";
      break;
    }
  }

  return [
    'X-WP-Nonce' => $nonce,
    'Cookie' => $cookie,
  ];
}