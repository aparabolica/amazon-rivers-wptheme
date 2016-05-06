<?php

/*
* ARP Carousel
*/

class ARP_Carousel {

  function __construct() {
    add_action('init', array($this, 'register_post_type'));
    add_action('init', array($this, 'register_field_group'));
  }

  function register_post_type() {

    $labels = array(
      'name'               => _x( 'Carousel', 'post type general name', 'arp' ),
      'singular_name'      => _x( 'Carousel item', 'post type singular name', 'arp' ),
      'menu_name'          => _x( 'Carousel', 'admin menu', 'arp' ),
      'name_admin_bar'     => _x( 'Carousel item', 'add new on admin bar', 'arp' ),
      'add_new'            => _x( 'Add new', 'book', 'arp' ),
      'add_new_item'       => __( 'Add new carousel item', 'arp' ),
      'new_item'           => __( 'New carousel item', 'arp' ),
      'edit_item'          => __( 'Edit carousel item', 'arp' ),
      'view_item'          => __( 'View carousel item', 'arp' ),
      'all_items'          => __( 'All carousel items', 'arp' ),
      'search_items'       => __( 'Search carousel items', 'arp' ),
      'parent_item_colon'  => __( 'Parent carousel items:', 'arp' ),
      'not_found'          => __( 'No carousel items found.', 'arp' ),
      'not_found_in_trash' => __( 'No carousel items found in Trash.', 'arp' )
    );

    $args = array(
      'labels'             => $labels,
      'description'        => __( 'ARP Carousel', 'arp' ),
      'public'             => false,
      'show_ui'            => true,
      'show_in_menu'       => true,
      'query_var'          => true,
      'capability_type'    => 'post',
      'hierarchical'       => false,
      'menu_position'      => 3,
      'supports'           => array( 'title', 'author', 'thumbnail', 'excerpt' )
    );

    register_post_type( 'carousel', $args );

  }

  function register_field_group() {
    if(function_exists("register_field_group")) {
      register_field_group(array (
        'id' => 'acf_carousel-item-meta',
        'title' => __('Carousel item meta', 'arp'),
        'fields' => array (
          array (
            'key' => 'field_carousel_url',
            'label' => 'URL',
            'name' => 'url',
            'type' => 'text',
            'instructions' => __('Enter the destination url for this carousel item', 'arp'),
            'required' => 1,
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'formatting' => 'html',
            'maxlength' => '',
          ),
          array (
            'key' => 'field_new_window',
            'label' => __('Open in new window', 'arp'),
            'name' => 'target_blank',
            'type' => 'true_false',
            'message' => '',
            'default_value' => 1,
          ),
        ),
        'location' => array (
          array (
            array (
              'param' => 'post_type',
              'operator' => '==',
              'value' => 'carousel',
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

new ARP_Carousel();
