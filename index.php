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
    <section id="carousel">
      <nav class="carousel-nav">
        <a href="#" class="active"></a>
        <a href="#"></a>
        <a href="#"></a>
      </nav>
      <div class="carousel-item">
        <img src="http://d2ouvy59p0dg6k.cloudfront.net/img/original/wwfbolivia_photo1_1.png" />
        <div class="carousel-item-meta">
          <h2>Bolivia improves decision making for sustainable hydropower planning</h2>
        </div>
      </div>
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
</div>
<section id="map">
  <div class="map-info">
    <div class="container">
      <div class="twelve columns">
        <h2>Amazon Water Basins</h2>
      </div>
    </div>
  </div>
  <iframe src="http://infoamazonia.org/embed/?zoom=5&map_only=1&map_id=3501" width="100%" height="600" frameborder="0"></iframe>
  <div class="tooltip">
    <div class="tooltip-content">
      <h2 class="label">Basin</h2>
      <p>Marañón</p>
      <h2 class="label">Lorem ipsum</h2>
      <p>2.00</p>
      <h2 class="label">Dolor</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut vehicula vulputate fermentum. Sed porttitor dui est, at pellentesque elit posuere at. Nunc vel elit eu purus accumsan fringilla. Etiam nec tempor mauris.</p>
    </div>
  </div>
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
          <iframe src="http://infoamazonia.org/embed/?map_only=1&map_id=12799&lat=-5.4082109285908295&lon=-58.06274414062499&zoom=5" frameborder="0"></iframe>
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
