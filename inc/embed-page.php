<?php

/*
 * ARP Embed Page
 */

class ARP_Embed_Page {

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

  function register_field_group() {
    if(function_exists("register_field_group")) {
      register_field_group(array (
        'id' => 'acf_embed_page_settings',
        'title' => __('Embed Page Settings', 'arp'),
        'fields' => array (
          array (
            'key' => 'field_embed_page_url',
            'label' => __('Embed Page URL', 'arp'),
            'name' => 'embed_url',
            'type' => 'text',
            'instructions' => __('Enter the web page url for embed.', 'arp'),
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
              'value' => 'embed-page.php',
              'order_no' => 0,
              'group_no' => 0,
            ),
          ),
        ),
        'options' => array (
          'position' => 'normal',
          'layout' => 'no_box',
          'hide_on_screen' => array (
            0 => 'the_content',
            1 => 'excerpt',
            2 => 'custom_fields',
            3 => 'discussion',
            4 => 'comments',
            5 => 'revisions',
            6 => 'author',
            7 => 'format',
            8 => 'featured_image',
            9 => 'categories',
            10 => 'tags',
            11 => 'send-trackbacks',
          ),
        ),
        'menu_order' => 0,
      ));
    }
  }
}

$arp_embed_page = new ARP_Embed_Page();
