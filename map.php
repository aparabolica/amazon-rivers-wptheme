<?php
/*
 * Template name: Map Template
 */
?>
<?php get_header(); ?>

<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
  <section id="main-map">
    <div class="arp-map">
      <?php echo do_shortcode(get_field('domegis_map')); ?>
    </div>
  </section>
<?php endwhile; endif; ?>

<?php //get_footer(); ?>
