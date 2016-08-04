<?php

/*
 * ARP Library Page
 */

class ARP_Library_Page {

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

  function get_story_map_url($post_id = false) {
    global $post;
    $post_id = $post_id ? $post_id : $post->ID;
    return get_field('story_map_url', $post_id);
  }

  function register_field_group() {
    if(function_exists("register_field_group")) {
      register_field_group(array (
        'id' => 'acf_library_page_settings',
        'title' => __('Library Page Settings', 'arp'),
        'fields' => array (
          array (
            'key' => 'field_story_map_url',
            'label' => __('Story Map URL', 'arp'),
            'name' => 'story_map_url',
            'type' => $this->get_text_field(),
            'instructions' => __('Enter the story map url for embed on the library page.', 'arp'),
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
              'value' => 'library.php',
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

$arp_library_page = new ARP_Library_Page();

function arp_get_story_map_url($post_id = false) {
  global $arp_library_page;
  return $arp_library_page->get_story_map_url($post_id);
}
