<?php get_header(); ?>

<section id="archive">
  <header class="archive-header">
    <div class="container">
      <div class="twelve columns">
        <h1><?php
          if( is_tag() || is_category() || is_tax() ) :
            $term = get_queried_object();
            $link = get_term_link($term);
            if($term->parent) :
              $parent = get_term($term->parent);
              $link = get_term_link($parent);
              $title = sprintf( __( '%s', 'arp' ), $parent->name );
            else :
              $title = sprintf( __( '%s', 'arp' ), single_term_title() );
            endif;
            echo '<a href="' . $link . '">' . $title . '</a>';
          elseif( is_search() ) :
            printf( __( 'Search results for: %s', 'arp' ), $_GET['s'] );
          elseif ( is_day() ) :
            printf( __( 'Daily Archives: %s', 'arp' ), get_the_date() );
          elseif ( is_month() ) :
            printf( __( 'Monthly Archives: %s', 'arp' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'arp' ) ) );
          elseif ( is_year() ) :
            printf( __( 'Yearly Archives: %s', 'arp' ), get_the_date( _x( 'Y', 'yearly archives date format', 'arp' ) ) );
          else :
            _e( 'Archives', 'arp' );
          endif;
        ?></h1>
        <?php
        if(is_category() || is_tax()) :
          if($term->description) :
            ?>
            <div class="term-description">
              <?php echo apply_filters('the_content', $term->description); ?>
            </div>
            <?php
          endif;
          if($parent)
            $children = get_term_children($parent->term_id, $term->taxonomy);
          else
            $children = get_term_children($term->term_id, $term->taxonomy);
          if($children) :
            ?>
            <nav id="term-children">
              <ul>
                <?php foreach($children as $child) :
                  $child_term = get_term($child, $term->taxonomy);
                  $active = $child_term->term_id == $term->term_id;
                  ?>
                  <li class="<?php if($active) echo 'active'; ?>"><a href="<?php echo get_term_link($child); ?>"><?php echo $child_term->name; ?></a></li>
                <?php endforeach; ?>
              </ul>
            </nav>
            <?php
          endif;
        endif;
        ?>
      </div>
    </div>
  </header>
  <section class="archive-content">
    <div class="container">
      <div class="eight columns offset-by-two">
        <?php if(have_posts()) : ?>
          <?php while(have_posts()) : the_post(); ?>
            <?php get_template_part('post', 'list-item'); ?>
          <?php endwhile; ?>
          <nav class="posts-nav">
            <?php posts_nav_link(); ?>
          </nav>
        <?php else : ?>
          <div class="container">
            <h3 style="text-align:center;text-transform:uppercase"><?php _e('No content was found', 'arp'); ?></h3>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </section>
</section>

<?php get_footer(); ?>
