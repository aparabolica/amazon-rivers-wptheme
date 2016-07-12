<?php get_header(); ?>

<section id="main-map">
  <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
    <div class="basin-map" data-postid="<?php echo $post->post_name; ?>">
      <?php echo do_shortcode('[domegis_map]'); ?>
    </div>
  <?php endwhile; endif; ?>
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

<section id="basin-domegis-data" class="domegis-data page-section">
  <h2 class="section-title"><?php _e('Relevant data on', 'arp'); ?> <span class="basin-name"></span></h2>
  <div class="domegis-data-items">
    <?php
    if(have_posts()) : while(have_posts()) : the_post();
      ?>
      <div id="basin-<?php echo $post->post_name; ?>-data" class="basin-data">
        <?php
        $fields = arp_get_domegis_fields();
        foreach($fields as $field) :
          if($field['post_type'] == 'basin') :
            ?>
            <div class="basin-data-item">
              <h3><?php echo $field['title']; ?></h3>
              <div class="field-data">
                <?php if($field['type'] == 'percentage') : ?>
                  <div class="percentage">
                    <?php echo arp_get_domegis_data($field['name'])['percentage']; ?>%
                  </div>
                <?php elseif($field['type'] == 'list') :
                  $list = arp_get_domegis_data($field['name']);
                  if(!empty($list)) :
                    ?>
                    <ul class="data-list">
                      <?php
                      foreach($list as $item) :
                        ?>
                        <li>
                          <?php if(count($item) == 1) : ?>
                            <?php echo array_shift($item); ?>
                          <?php else : ?>
                            <!-- Aqui vai listagem com mais de uma propriedade -->
                          <?php endif; ?>
                        </li>
                        <?php
                      endforeach; ?>
                    </ul>
                    <?php
                  endif;
                  ?>
                <?php endif; ?>
              </div>
            </div>
            <?php
          endif;
        endforeach;
        ?>
      </div>
    <?php endwhile; endif; ?>
  </div>
</section>

<section id="basin-related-stories" class="related-stories page-section">
  <h2 class="section-title"><?php _e('Stories on', 'arp'); ?> <span class="basin-name"></span></h2>
  <div class="posts">
    <?php
    if(have_posts()) : while(have_posts()) : the_post();
      $basin_posts_query = new WP_Query(array(
        'posts_per_page' => '3',
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
        <div id="basin-<?php echo $post->post_name; ?>-posts" class="basin-posts">
          <?php
          while($basin_posts_query->have_posts()) :
            $basin_posts_query->the_post();
            ?>
            <article>
              <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
              <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            </article>
            <?php
          endwhile;
          ?>
        </div>
        <?php
      endif;
      ?>
    <?php endwhile; endif; ?>
  </div>
</section>

<?php //get_footer(); ?>
