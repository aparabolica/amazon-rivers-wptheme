<?php

/*
 * ARP Video
 */

class ARP_Video {

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

  function get_video($post_id = false) {
    global $post;
    $post_id = $post_id ? $post_id : $post->ID;
    $video_url = get_field('video_url', $post_id);
    if($video_url)
      return apply_filters('the_content', $video_url);
    else
      return '';
  }

  function register_field_group() {
    if(function_exists("register_field_group")) {
      register_field_group(array (
        'id' => 'acf_video_url',
        'title' => __('Video URL', 'arp'),
        'fields' => array (
          array (
            'key' => 'field_video_url',
            'label' => __('Video URL', 'arp'),
            'name' => 'url',
            'type' => $this->get_text_field(),
            'instructions' => __('Enter the video url for this post. It can YouTube or Vimeo videos.', 'arp'),
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

$arp_video = new ARP_Video();

function arp_get_video($post_id = false) {
  global $arp_video;
  return $arp_video->get_video($post_id);
}
