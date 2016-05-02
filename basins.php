<?php
/*
 * Template name: Basins Template
 */
?>
<?php get_header(); ?>

<section id="main-map">
  <?php get_template_part('parts/map'); ?>
</section>

<section id="basins-selector">
  <div class="basins-selector-content">
    <h3><?php _e('Select a basin for details:', 'arp'); ?></h3>
    <div class="basin-item">
      <h2>Madeira</h2>
    </div>
    <div class="basin-item">
      <h2>Tapajós</h2>
    </div>
    <div class="basin-item">
      <h2>Marañón</h2>
    </div>
  </div>
</section>

<?php //get_footer(); ?>
