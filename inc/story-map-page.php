<?php

/*
 * ARP Home Page
 */

class ARP_Story_Map_Page {

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
        'id' => 'acf_story_map_page_settings',
        'title' => __('Story Map Settings', 'arp'),
        'fields' => array (
          array (
            'key' => 'field_story_map_page',
            'label' => __('Story Map URL', 'arp'),
            'name' => 'story_map_url',
            'type' => $this->get_text_field(),
            'instructions' => __('Enter the story map url or YouTube video url for embed on the library page.', 'arp'),
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
              'value' => 'story-map.php',
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

$arp_story_map_page = new ARP_Story_Map_Page();
