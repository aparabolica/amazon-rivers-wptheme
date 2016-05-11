<?php
/*
 * Template name: Home
 */
?>
<?php get_header(); ?>

<?php if(have_posts()): while(have_posts()) : the_post(); ?>

  <section id="welcome">
    <div class="container">
      <div class="six columns offset-by-three">
        <div class="welcome-content">
          <h2><?php echo arp_get_headline(); ?></h2>
          <p><?php echo arp_get_headline_description(); ?></p>
          <p><a class="button" href="<?php echo arp_get_headline_url(); ?>"><?php _e('Learn more', 'arp'); ?></a></p>
        </div>
      </div>
    </div>
  </section>
  <div class="container">
    <div class="nine columns">
      <?php
      query_posts('post_type=carousel&posts_per_page=-1');
      if(have_posts()) :
        ?>
        <section id="carousel">
          <nav class="carousel-nav">
            <?php
            while(have_posts()) : the_post();
              ?>
              <a href="#" data-postid="<?php the_ID(); ?>"></a>
              <?php
            endwhile;
            ?>
          </nav>
          <?php
          while(have_posts()) : the_post();
            ?>
            <article class="carousel-item" data-postid="<?php the_ID(); ?>">
              <a href="<?php the_field('url'); ?>" <?php if(get_field('target_blank')) echo 'target="_blank"'; ?>><?php the_post_thumbnail('highlight'); ?></a>
              <div class="carousel-item-meta">
                <h2><a href="<?php the_field('url'); ?>" <?php if(get_field('target_blank')) echo 'target="_blank"'; ?>><?php the_title(); ?></a></h2>
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
    <div class="three columns">
      <section id="social">
        <div class="social-content">
          <h2><?php _e('Connect with us', 'arp'); ?></h2>
          <a class="fa fa-facebook"></a>
          <a class="fa fa-twitter"></a>
        </div>
      </section>
      <section id="latest" class="page-section clean">
        <h2 class="section-title"><?php _e('Latest news', 'arp'); ?></h2>
        <?php
        query_posts('posts_per_page=3');
        if(have_posts()) :
          while(have_posts()) :
            the_post();
            ?>
            <article class="post-item small clearfix">
              <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
              <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            </article>
            <?php
          endwhile;
        endif;
        wp_reset_query();
        ?>
      </section>
    </div>
  </div>
  <section id="map">
    <div class="map-info">
      <div class="container">
        <div class="twelve columns">
          <h2><?php _e('Amazon River Basins', 'arp'); ?></h2>
        </div>
      </div>
    </div>
    <?php get_template_part('parts/map'); ?>
  </section>

  <?php get_template_part('parts/basins', 'section'); ?>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
