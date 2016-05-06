<?php get_header(); ?>

<section id="main-map">
  <?php get_template_part('parts/map'); ?>
</section>

<section id="basins-selector">
  <div class="basins-selector-content">
    <h3><?php _e('Select a basin for details:', 'arp'); ?></h3>
    <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
      <div id="<?php echo $post->post_name; ?>" class="basin-item">
        <h2><a href="#<?php echo $post->post_name; ?>"><?php the_title(); ?></a></h2>
        <div class="basin-description">
          <?php the_content(); ?>
        </div>
      </div>
    <?php endwhile; endif; ?>
  </div>
</section>

<?php //get_footer(); ?>
