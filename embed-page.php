<?php
/*
 * Template name: Embed page
 */
?>
<?php get_header(); ?>

<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
  <div class="embed-page-container">
    <iframe class="embed-page-content" src="<?php the_field('embed_url'); ?>" frameborder="0" />
  </div>
<?php endwhile; endif; ?>

<?php get_footer(); ?>
