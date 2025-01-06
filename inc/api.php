<?php
define('MY_NAMESPACE', 'my/v1');

add_action('wp_enqueue_scripts', 'my_localize_api_vars');
add_action('rest_api_init', 'my_init_api');

/**
 * @action wp_enqueue_scripts
 */
function my_localize_api_vars() {
  wp_localize_script('my-main', 'myApiSettings', [
    'nonce' => wp_create_nonce('wp_rest'),
    'myUrl' => esc_url_raw(rest_url()) . MY_NAMESPACE,
    'wpUrl' => esc_url_raw(rest_url()) . 'wp/v2',
  ]);
}

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
    'permission_callback' => '__return_true',
    'callback' => '_my_api_sample_post'
  ]);

  register_rest_route(MY_NAMESPACE, '/token', [
    'methods' => 'GET',
    'permission_callback' => '__return_true',
    'callback' => '_my_api_get_token'
  ]);
}

/**
 * Get header tokens for testing in Postman
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

/**
 * @route GET /sample-get/:id
 */
function _my_api_sample_get($params) {
  $id = $params['id'];
  return 'you passed in ID ' . $id;
}


/**
 * @route POST /sample-post/:id
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
 * Permission callback for registering API
 * 
 * WARNING: This assumes you haven't changed the capabilities of each role
 */
function __is_logged_in() {
  return is_user_logged_in();
}

function __is_admin_role() {
  return current_user_can('activate_plugins');
}