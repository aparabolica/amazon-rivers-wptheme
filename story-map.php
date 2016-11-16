<?php
/*
 * Template name: Story Map Page
 */
?>
<?php get_header(); ?>

<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
  <div class="story-map-container">
    <iframe class="story-map" src="<?php the_field('story_map_url'); ?>" frameborder="0" />
  </div>
<?php endwhile; endif; ?>

<?php get_footer(); ?>
