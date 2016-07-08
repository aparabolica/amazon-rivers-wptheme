<?php

/*
 * DomeGIS data
 */

class ARP_DomeGIS_Data {

  function register_data() {
    $api = apply_filters('domegis_api_data', array());

    foreach($api as $data) {

    }

  }

}

function register_domegis_data($data) {
  $data[] = array(
    'title' => __('Percentage of deforested area inside basin', 'arp'),
    'type' => 'percentage',
    'required_fields' => array(
      array(
        'key' => 'deforestation_layer',
        'name' => __('Deforestation layer ID', 'arp')
      ),
      array(
        'key' => 'basin_layer',
        'name' => __('Basin layer ID', 'arp')
      )
    ),
    'sql' => 'SELECT layer1.geometry,
      ROUND(
        CAST(100.00 * (
          ST_Area(
            ST_Intersection(
              ST_Multi(ST_Union(layer0.geometry)), ST_Multi(ST_Union(layer1.geometry))
            )::geography
          ) /
          ST_Area(
            ST_Multi(ST_Union(layer1.geometry))::geography
          )
        ) as numeric), 2) as percentage
      FROM %deforestation_layer% as layer0,
        %basin_layer% as layer1
      WHERE ST_Intersects(layer0.geometry, layer1.geometry)
      GROUP BY layer1.domegis_id;'
  );
  return $data;
}
add_filter('domegis_api_data', 'register_domegis_data');

?>
