<?php

add_filter('show_admin_bar', '__return_false');

function arp_scripts() {

  wp_register_style('normalize', get_template_directory_uri() . '/assets/skeleton/css/normalize.css');
  wp_register_style('skeleton', get_template_directory_uri() . '/assets/skeleton/css/skeleton.css');
  wp_register_style('fontawesome', get_template_directory_uri() . '/assets/fontawesome/css/font-awesome.min.css');
  wp_register_style('main', get_template_directory_uri() . '/css/main.css', array('normalize', 'skeleton', 'fontawesome'));

  wp_enqueue_style('main');

}
add_action('wp_enqueue_scripts', 'arp_scripts');

function arp_get_header_class() {
  $class = '';
  if(!is_home() && !is_front_page()) {
    $class = 'collapsed';
  }
  return $class;
}

function arp_get_brand_class() {
  $class = '';
  if(!is_home() && !is_front_page()) {
    $class = 'small';
  }
  return $class;
}


/*
 * Required plugins
 */
require_once(TEMPLATEPATH . '/inc/class-tgm-plugin-activation.php');
function arp_register_required_plugins() {
  $plugins = array(
    array(
      'name' => 'Page Builder by SiteOrigin',
      'slug' => 'siteorigin-panels',
      'required' => true,
      'force_activation' => true
    )
  );
  $options = array(
    'default_path'  => '',
    'menu'      => 'arp-install-plugins',
    'has_notices'  => true,
    'dismissable'  => true,
    'dismiss_msg'  => '',
    'is_automatic'  => false,
    'message'    => ''
  );
  tgmpa($plugins, $options);
}
add_action('tgmpa_register', 'arp_register_required_plugins');

require_once(TEMPLATEPATH . '/inc/page-builder-hooks.php');
