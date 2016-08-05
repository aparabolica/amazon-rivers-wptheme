<?php

/*
* ARP Basins
*/

class ARP_Basins {

  function __construct() {
    add_action('init', array($this, 'register_post_type'));
    add_action('init', array($this, 'register_field_group'));
    add_filter('the_permalink', array($this, 'the_permalink'));
  }

  function get_wysiwyg_field() {
    $field = 'wysiwyg';
    if(function_exists('qtranxf_generateLanguageSelectCode')) {
      $field = 'qtranslate_wysiwyg';
    }
    return $field;
  }

  function register_post_type() {

    $labels = array(
      'name'               => _x( 'Basins', 'post type general name', 'arp' ),
      'singular_name'      => _x( 'Basin', 'post type singular name', 'arp' ),
      'menu_name'          => _x( 'Basins', 'admin menu', 'arp' ),
      'name_admin_bar'     => _x( 'Basin', 'add new on admin bar', 'arp' ),
      'add_new'            => _x( 'Add new', 'basin', 'arp' ),
      'add_new_item'       => __( 'Add new basin', 'arp' ),
      'new_item'           => __( 'New basin', 'arp' ),
      'edit_item'          => __( 'Edit basin', 'arp' ),
      'view_item'          => __( 'View basin', 'arp' ),
      'all_items'          => __( 'All basins', 'arp' ),
      'search_items'       => __( 'Search basins', 'arp' ),
      'parent_item_colon'  => __( 'Parent basins:', 'arp' ),
      'not_found'          => __( 'No basins found.', 'arp' ),
      'not_found_in_trash' => __( 'No basins found in Trash.', 'arp' )
    );

    $args = array(
      'labels'             => $labels,
      'description'        => __( 'ARP Basins', 'arp' ),
      'public'             => true,
      'publicly_queryable' => true,
      'show_ui'            => true,
      'show_in_menu'       => true,
      'query_var'          => true,
      'rewrite'            => array( 'slug' => 'basins' ),
      'capability_type'    => 'post',
      'has_archive'        => true,
      'hierarchical'       => false,
      'menu_position'      => 5,
      'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' )
    );

    register_post_type( 'basin', $args );

  }

  function the_permalink($url) {
    global $post;
    if(get_post_type() == 'basin') {
      $url = get_post_type_archive_link('basin') . '#' . $post->post_name;
    }
    return $url;
  }

  function register_field_group() {
    if(function_exists("register_field_group")){
      register_field_group(array (
        'id' => 'acf_related-basins',
        'title' => 'Related basins',
        'fields' => array (
          array (
            'key' => 'field_related_basins',
            'label' => 'Related basins',
            'name' => 'related_basins',
            'type' => 'post_object',
            'post_type' => array (
              0 => 'basin',
            ),
            'taxonomy' => array (
              0 => 'all',
            ),
            'allow_null' => 0,
            'multiple' => 1,
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

      register_field_group(array (
        'id' => 'acf_basin-meta',
        'title' => 'Basin Meta',
        'fields' => array (
          // array (
          //   'key' => 'field_data_description',
          //   'label' => __('Data description', 'arp'),
          //   'name' => 'data_description',
          //   'type' => $this->get_wysiwyg_field(),
          //   'instructions' => __('Describe this basin data aggregates and other useful information.', 'arp'),
          //   'required' => 0,
          //   'default_value' => '',
          //   'placeholder' => '',
          //   'prepend' => '',
          //   'append' => '',
          //   'formatting' => 'html',
          //   'maxlength' => '',
          // )
        ),
        'location' => array (
          array (
            array (
              'param' => 'post_type',
              'operator' => '==',
              'value' => 'basin',
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

$arp_basins = new ARP_Basins();
