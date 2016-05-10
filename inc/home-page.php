<?php

/*
 * ARP Home Page
 */

class ARP_Home_Page {

  function __construct() {
    add_action('init', array($this, 'register_field_group'));
  }

  function get_text_field() {
    $field = 'text';
    if(function_exists('qtranxf_generateLanguageSelectCode')) {
      $field = 'qtranslate_text';
    }
    return $field;
  }

  function get_headline($post_id = false) {
    global $post;
    $post_id = $post_id ? $post_id : $post->ID;
    return get_field('headline', $post_id);
  }

  function get_description($post_id = false) {
    global $post;
    $post_id = $post_id ? $post_id : $post->ID;
    return get_field('headline_description', $post_id);
  }

  function get_url($post_id = false) {
    global $post;
    $post_id = $post_id ? $post_id : $post->ID;
    return get_field('headline_url', $post_id);
  }

  function register_field_group() {
    if(function_exists("register_field_group")) {
      register_field_group(array (
        'id' => 'acf_home_page_settings',
        'title' => __('Library Page Settings', 'arp'),
        'fields' => array (
          array (
            'key' => 'field_headline',
            'label' => __('Headline', 'arp'),
            'name' => 'headline',
            'type' => $this->get_text_field(),
            'instructions' => __('Enter the introduction title to your project (displayed on the home page header).', 'arp'),
            'required' => 0,
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'formatting' => 'html',
            'maxlength' => '',
          ),
          array (
            'key' => 'field_headline_description',
            'label' => __('Description', 'arp'),
            'name' => 'headline_description',
            'type' => $this->get_text_field(),
            'instructions' => __('Enter the headline description to your project (displayed on the home page header).', 'arp'),
            'required' => 0,
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'formatting' => 'html',
            'maxlength' => '',
          ),
          array (
            'key' => 'field_headline_url',
            'label' => __('"Learn more" URL', 'arp'),
            'name' => 'headline_url',
            'type' => $this->get_text_field(),
            'instructions' => __('Enter the url for the button displayed on the home page header.', 'arp'),
            'required' => 0,
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
              'param' => 'page_template',
              'operator' => '==',
              'value' => 'homepage.php',
              'order_no' => 0,
              'group_no' => 0,
            ),
          ),
        ),
        'options' => array (
          'position' => 'normal',
          'layout' => 'no_box',
          'hide_on_screen' => array (),
        ),
        'menu_order' => 0,
      ));
    }
  }
}

$arp_home_page = new ARP_Home_Page();

function arp_get_headline($post_id = false) {
  global $arp_home_page;
  return $arp_home_page->get_headline($post_id);
}
function arp_get_headline_description($post_id = false) {
  global $arp_home_page;
  return $arp_home_page->get_description($post_id);
}
function arp_get_headline_url($post_id = false) {
  global $arp_home_page;
  return $arp_home_page->get_url($post_id);
}
