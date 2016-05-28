<?php
/*
 * Template name: Library page
 */
?>
<?php get_header(); ?>

<article id="page">
  <header class="page-header">
    <div class="container">
      <div class="twelve columns">
        <section id="story-map">
          <iframe frameborder="0" src="<?php echo arp_get_story_map_url(); ?>"></iframe>
        </section>
      </div>
    </div>
  </header>
  <?php
  query_posts('posts_per_page=3&category_name=news');
  if(have_posts()) :
    ?>
    <section id="latest" class="page-section">
      <div class="container">
        <div class="twelve columns">
          <h2 class="section-title"><?php _e('Latest news', 'arp'); ?></h2>
        </div>
      </div>
      <div class="post-list latest-list">
        <div class="container">
          <?php
          while(have_posts()) :
            the_post();
            ?>
            <div class="four columns">
              <article class="post-item">
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('wide-thumbnail'); ?></a>
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
              </article>
            </div>
            <?php
          endwhile;
          ?>
        </div>
      </div>
    </section>
    <?php
  endif;
  wp_reset_query();
  ?>
  <div class="container">
    <div class="six columns">
      <?php
      query_posts('posts_per_page=3&category_name=publications');
      if(have_posts()) :
        ?>
        <section id="publications" class="page-section">
          <h2 class="section-title"><?php _e('Publications', 'arp'); ?></h2>
          <?php
          while(have_posts()) :
            the_post();
            ?>
            <article class="post-item clearfix">
              <div class="three columns">
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
              </div>
              <div class="nine columns">
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <?php the_excerpt(); ?>
              </div>
            </article>
            <?php
          endwhile;
          ?>
        </section>
        <?php
      endif;
      wp_reset_query();
      ?>
    </div>
    <div class="two columns">
      <section id="share" class="page-section">
        <h2 class="section-title">Stay tuned</h2>
        <div class="section-box">
          <a class="fa fa-facebook" href="https://www.facebook.com/WWFLivingAmazonInitiative/" target="_blank" rel="extenal" title="Facebook"></a>
          <a class="fa fa-youtube" href="https://www.youtube.com/user/LivingAmazon" target="_blank" rel="external" title="YouTube"></a>
        </div>
      </section>
      <section id="join" class="page-section">
        <h2 class="section-title">WWF</h2>
        <div class="section-box">
          <p><?php _e('Help stop the degradation of our planet\'s natural environment, and build a future in which people live in harmony with nature.', 'arp'); ?></p>
          <a class="button" href="#">Take action</a>
        </div>
    </div>
    <div class="four columns">
      <?php
      query_posts('posts_per_page=1&category_name=videos');
      if(have_posts()) :
        ?>
        <section id="videos" class="page-section">
          <h2 class="section-title"><?php _e('Videos', 'arp'); ?></h2>
          <?php
          while(have_posts()) :
            the_post();
            ?>
            <article class="post-item">
              <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('wide-thumbnail'); ?></a>
              <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
              <?php the_excerpt(); ?>
            </article>
            <?php
          endwhile;
          ?>
        </section>
        <?php
      endif;
      wp_reset_query();
      ?>
    </div>
  </div>
</article>

<?php get_footer(); ?>
