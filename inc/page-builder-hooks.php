<?php

class ARP_Page_Builder {

  function __construct() {

    add_filter('siteorigin_panels_row_classes', array($this, 'panels_row_classes'), 10, 2);

  }

  function panels_row_classes($grid_classes, $grids_gi) {
    // print_r($grid_classes);
    // print_r($grids_gi);
    return $grid_classes;
  }

}

new ARP_Page_Builder();
