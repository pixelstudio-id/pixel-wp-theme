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

