<?php get_header(); ?>

<section id="welcome">
  <div class="container">
    <div class="six columns offset-by-three">
      <div class="welcome-content">
        <h2>Lorem ipsum dolor sit amet, consectetur adipiscing</h2>
        <p>Cras ut arcu volutpat, molestie purus id, tincidunt turpis.</p>
        <p><a class="button" href="#">Learn more</a></p>
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
        <h2>Connect with us</h2>
        <a class="fa fa-facebook"></a>
        <a class="fa fa-twitter"></a>
      </div>
    </section>
    <section id="latest" class="page-section clean">
      <h2 class="section-title">Latest news</h2>
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
        <h2>Amazon Water Basins</h2>
      </div>
    </div>
  </div>
  <?php get_template_part('parts/map'); ?>
</section>
<section id="basins" class="clearfix page-section">
  <header class="basins-section-header">
    <div class="container">
      <div class="twelve columns">
        <h2 class="section-title">Learn more</h2>
      </div>
    </div>
  </header>
  <div class="basin-item clearfix">
    <div class="container">
      <div class="six columns">
        <div class="info">
          <header class="basin-header clearfix">
            <h3>Tapajós</h3>
            <nav>
              <h4>Select another basin:</h4>
              <a href="#">
                <span class="fa fa-chevron-right"></span>
                Madeira
              </a>
              <a href="#">
                <span class="fa fa-chevron-right"></span>
                Marañón
              </a>
            </nav>
          </header>
          <p>A bacia do rio Tapajós abrange 492.000 km2 nos estados de Mato Grosso, Pará, Amazonas e uma pequena porção de Rondônia, no Brasil.</p>
        </div>
        <div class="posts clearfix">
          <?php
          query_posts('posts_per_page=2');
          if(have_posts()) :
            while(have_posts()) :
              the_post();
              ?>
              <div class="six columns">
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('wide-thumbnail'); ?></a>
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
              </div>
              <?php
            endwhile;
          endif;
          wp_reset_query();
          ?>
        </div>
        <p>
          <a class="button">More stories on Tapajós</a>
        </p>
      </div>
      <div class="six columns">
        <div class="map">
          <?php get_template_part('parts/map'); ?>
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
