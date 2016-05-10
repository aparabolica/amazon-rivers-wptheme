<?php

/*
 * ARP Video
 */

class ARP_External_Src {

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

  function get_source_url($post_id = false) {
    global $post;
    $post_id = $post_id ? $post_id : $post->ID;
    return get_field('source_url', $post_id);
  }

  function register_field_group() {
    if(function_exists("register_field_group")) {
      register_field_group(array (
        'id' => 'acf_external_src',
        'title' => __('External source URL', 'arp'),
        'fields' => array (
          array (
            'key' => 'field_source_url',
            'label' => __('External source URL', 'arp'),
            'name' => 'source_url',
            'type' => $this->get_text_field(),
            'instructions' => __('Enter the URL in which this content has been originally published.', 'arp'),
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
              'param' => 'post_type',
              'operator' => '==',
              'value' => 'post',
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

$arp_external_src = new ARP_External_Src();

function arp_get_source_url($post_id = false) {
  global $arp_external_src;
  return $arp_external_src->get_source_url($post_id);
}
