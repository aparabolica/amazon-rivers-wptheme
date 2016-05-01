<?php

add_filter('show_admin_bar', '__return_false');

function arp_setup_theme() {

  add_theme_support( 'post-thumbnails' );

  add_image_size('wide-thumbnail', 400, 225, true);

  register_nav_menus(array(
    'header_nav' => __('Header navigation', 'arp'),
    'footer_nav' => __('Footer navigation', 'arp')
  ));

}
add_action('after_setup_theme', 'arp_setup_theme');

function arp_scripts() {

  wp_register_style('normalize', get_template_directory_uri() . '/assets/skeleton/css/normalize.css');
  wp_register_style('skeleton', get_template_directory_uri() . '/assets/skeleton/css/skeleton.css');
  wp_register_style('fontawesome', get_template_directory_uri() . '/assets/fontawesome/css/font-awesome.min.css');
  wp_register_style('main', get_template_directory_uri() . '/css/main.css', array('normalize', 'skeleton', 'fontawesome'));

  wp_register_script('fitvids', get_template_directory_uri() . '/assets/jquery.fitvids/jquery.fitvids.js', array('jquery'));
  wp_register_script('site', get_template_directory_uri() . '/js/site.js', array('jquery', 'fitvids'));

  wp_enqueue_style('main');
  wp_enqueue_script('site');
}
add_action('wp_enqueue_scripts', 'arp_scripts');

function arp_get_header_class() {
  $class = '';
  if(!is_home() && !is_front_page()) {
    $class .= ' collapsed';
  }
  if(is_page_template('basins.php') || is_page_template('map.php')) {
    $class .= ' transparent';
  }
  return $class;
}

function arp_get_brand_class() {
  $class = '';
  if(!is_home() && !is_front_page()) {
    $class .= ' small';
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
