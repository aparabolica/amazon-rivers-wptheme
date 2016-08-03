<?php

/*
 * DomeGIS data
 */

class ARP_DomeGIS_Data {

  var $count = 0;
  var $data = array();

  function __construct() {
    add_action('init', array($this, 'register_data'));
  }

  function register_data() {

    $this->data = apply_filters('domegis_api_data', array());

    foreach($this->data as $data) {
      $this->register_data_fields($data);
      $this->count++;
    }

  }

  function register_data_fields($data) {
    if(function_exists("register_field_group") && isset($data['required_fields'])) {
      $config = array(
        'id' => 'acf_domegis_data_field_group_' . $data['name'],
        'title' => $data['title'],
        'fields' => array(),
        'location' => array(
          array(
            array(
              'param' => 'post_type',
              'operator' => '==',
              'value' => $data['post_type'],
              'order_no' => 0,
              'group_no' => 0,
            ),
          ),
        ),
        'options' => array (
          'position' => 'normal',
          'layout' => 'box',
          'hide_on_screen' => array(),
        ),
        'menu_order' => 0
      );
      foreach($data['required_fields'] as $field) {
        $config['fields'][] = array(
          'key' => 'field_domegis_data_' . $data['name'] . '_' . $field['key'],
          'label' => $field['name'],
          'name' => $field['key'],
          'type' => 'text',
          'required' => 0,
          'default_value' => '',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'formatting' => 'html',
          'maxlength' => ''
        );
      }
      register_field_group($config);
    }
  }

  function get_data($name, $post_id = false) {
    global $post;
    $post_id = $post_id ? $post_id : $post->ID;
    $domegis_options = get_domegis_options();

    foreach($this->data as $d) {
      if($d['name'] == $name) {
        $data = $d;
      }
    }

    if($post_id && $data) {
      $sql = $this->prepare_sql($post_id, $data);

      if($sql) {
        if(false === ($result = get_transient('domegis_data_' . md5($sql)))) {
          $url = $domegis_options['url'] . '/layers/preview?sql=' . urlencode($sql);
          $result = json_decode(file_get_contents($url), true)[0];
          set_transient('domegis_data_' . md5($sql), $result, HOUR_IN_SECONDS);
        }

        if(count($result) == 1) {
          return $result[0];
        } else {
          return $result;
        }
      } else {
        return null;
      }
    } else {
      return null;
    }
  }

  function get_fields() {
    return $this->data;
  }

  function prepare_sql($post_id, $data) {
    $sql = $data['sql'];
    if(isset($data['required_fields'])) {
      $fields_data = array();
      foreach($data['required_fields'] as $field) {
        $fields_data[$field['key']] = get_field($field['key'], $post_id);
      }
      foreach($fields_data as $key => $val) {
        if($val) {
          $sql = str_replace('%' . $key . '%', '"' . $val . '"', $sql);
        } else {
          return '';
        }
      }
    }
    $sql = str_replace('\n', '', $sql);
    return $sql;
  }

}

$arp_domegis_data = new ARP_DomeGIS_Data();

function arp_get_domegis_data($name, $post_id = false) {
  global $arp_domegis_data;
  return $arp_domegis_data->get_data($name, $post_id);
}

function arp_get_domegis_fields() {
  global $arp_domegis_data;
  return $arp_domegis_data->get_fields();
}

?>
