<?php

class ARP_Site_Options {

  function __construct() {
    $this->register_options_page();
    add_action('init', array($this, 'register_options_field_group'));
  }

  function register_options_page() {
    if(function_exists('acf_add_options_sub_page')) {
      acf_add_options_sub_page(array(
        'title' => __('Site options', 'arp'),
        'parent' => 'options-general.php'
      ));
    }
  }

  function register_options_field_group() {
    if(function_exists("register_field_group")) {
      register_field_group(array (
        'id' => 'acf_site_options',
        'title' => __('Site options', 'arp'),
        'fields' => array (
          array (
            'key' => 'field_site_options_facebook',
            'label' => __('Facebook URL', 'arp'),
            'name' => 'site_options_facebook',
            'type' => 'text',
            'required' => 0,
            'column_width' => '',
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'formatting' => 'html',
            'maxlength' => '',
          ),
          array (
            'key' => 'field_site_options_twitter',
            'label' => __('Twitter URL', 'arp'),
            'name' => 'site_options_twitter',
            'type' => 'text',
            'required' => 0,
            'column_width' => '',
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'formatting' => 'html',
            'maxlength' => '',
          ),
          array (
            'key' => 'field_site_options_youtube',
            'label' => __('YouTube URL', 'arp'),
            'name' => 'site_options_youtube',
            'type' => 'text',
            'required' => 0,
            'column_width' => '',
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'formatting' => 'html',
            'maxlength' => '',
          ),
        ),
        'location' => array (
          array (
            array (
              'param' => 'options_page',
              'operator' => '==',
              'value' => 'acf-options-site-options',
              'order_no' => 0,
              'group_no' => 0,
            ),
          ),
        ),
        'options' => array (
          'position' => 'normal',
          'layout' => 'no_box',
          'hide_on_screen' => array (
          ),
        ),
        'menu_order' => 0,
      ));
    }

  }
}

new ARP_Site_Options();
