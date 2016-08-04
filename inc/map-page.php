<?php

/*
 * ARP Map Page
 */

class ARP_Map_Page {

  function __construct() {
    add_action('init', array($this, 'register_field_group'));
  }

  function register_field_group() {
    if(function_exists("register_field_group")) {
    	register_field_group(array (
    		'id' => 'acf_domegis-map',
    		'title' => 'DomeGIS Map',
    		'fields' => array (
    			array (
            'key' => 'field_domegis_map',
            'label' => __('DomeGIS Map', 'arp'),
            'name' => 'domegis_map',
            'type' => 'textarea',
            'instructions' => __('Paste the shortcode for a DomeGIS Map.', 'arp'),
            'required' => 1,
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
    					'value' => 'map.php',
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

$arp_map_page = new ARP_Map_Page();
