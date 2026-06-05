<?php

class Helper {
  /**
   * Check if required plugins are activated
   */
  static function has_required_plugins() {
    if (!class_exists('H')) {
      add_action('admin_notices', function() {
        $text = sprintf(
          __('You need to activate all Library plugins. <a href="%s">Activate now »</a>.'),
          admin_url('plugins.php') . '?s=library'
        );
        echo "<div class='notice notice-error'><p>{$text}</p></div>";
      });

      return false;
    }
    return true;
  }

  /**
   * Format the number and text to fit https://wa.me/ format for Indonesian number
   * 
   * @param string $number - can contain dash and space
   * @param string? $text
   * 
   * @return string - the wa.me link
   */
  static function create_whatsapp_link($number, $text = '') {
    $is_phone_number = preg_match('/^\s*(\+?\d[\d\s-]{6,})$/', $number);
    if (!$is_phone_number) { return ''; }

    // sanitize
    $wa_number = preg_replace('/[^0-9]/', '', $number);
    $wa_number = preg_replace('/^0/', '62', $wa_number);
    $wa_link = 'https://wa.me/' . $wa_number;

    if ($text) {
      $wa_link .= '?text=' . urlencode($text);
    }

    return $wa_link;
  }
}

/**
 * Get the Cookie and Nonce by visiting this endpoint while logged-in in your browser.
 * For use in Postman or other API testing tools.
 * 
 * @route GET /token
 */
/*
add_action('rest_api_init', 'my_api_helpers');
function my_api_helpers() {
  register_rest_route(MY_NAMESPACE, '/token', [
    'methods' => 'GET',
    'permission_callback' => '__return_true',
    'callback' => function() {
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
  ]);
}
*/