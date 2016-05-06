<?php
query_posts('post_type=basin&posts_per_page=-1&orderby=rand');
if(have_posts()) :
    ?>
  <section id="basins" class="clearfix page-section">
    <header class="basins-section-header">
      <div class="container">
        <div class="twelve columns">
          <h2 class="section-title"><?php _e('Learn more', 'arp'); ?></h2>
        </div>
      </div>
    </header>
    <div class="basin-item clearfix">
      <div class="container">
        <div class="six columns">
          <div class="info">
            <header class="basin-header clearfix">
              <h3></h3>
              <nav>
                <h4><?php _e('Select another basin:', 'arp'); ?></h4>
                <?php while(have_posts()) : the_post(); ?>
                  <a href="<?php the_permalink(); ?>" data-postid="<?php the_ID(); ?>">
                    <span class="fa fa-chevron-right"></span>
                    <span class="title"><?php the_title(); ?></span>
                  </a>
                <?php endwhile; ?>
              </nav>
            </header>
            <?php while(have_posts()) : the_post(); ?>
              <div class="excerpt" data-postid="<?php the_ID(); ?>">
                <?php the_excerpt(); ?>
              </div>
            <?php endwhile; ?>
          </div>
          <?php while(have_posts()) : the_post();
            $basin_posts_query = new WP_Query(array(
              'posts_per_page' => '2',
              'post_type' => 'post',
              'meta_query' => array(
                array(
                  'key' => 'related_basins',
                  'value' => get_the_ID(),
                  'compare' => 'LIKE'
                )
              )
            ));
            if($basin_posts_query->have_posts()) :
              ?>
              <div class="posts clearfix" data-postid="<?php the_ID(); ?>">
                <?php
                while($basin_posts_query->have_posts()) :
                  $basin_posts_query->the_post();
                  ?>
                  <div class="six columns">
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('wide-thumbnail'); ?></a>
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                  </div>
                  <?php
                endwhile;
                ?>
              </div>
              <?php
            endif;
            ?>
          <?php endwhile; ?>
          <p>
            <a class="button more"><?php _e('More stories on', 'arp'); ?> <span class="current-name"></span></a>
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
  <?php
endif;
wp_reset_query();
?>
