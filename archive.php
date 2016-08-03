<?php get_header(); ?>

<section id="archive">
  <header class="archive-header">
    <div class="container">
      <div class="twelve columns">
        <h1><?php
          if( is_tag() || is_category() || is_tax() ) :
            printf( __( '%s', 'arp' ), single_term_title() );
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
      </div>
    </div>
  </header>
  <section class="archive-content">
    <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
      <article id="post-<?php the_ID(); ?>">
        <div class="container">
          <div class="eight columns">
            <p class="type">
              <?php
              $type = get_post_type();
              if($type !== 'post')
                echo get_post_type();
              else
                the_category(' ');
              ?>
            </p>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <?php the_excerpt(); ?>
          </div>
          <?php if(has_post_thumbnail()) : ?>
            <div class="four columns">
              <?php the_post_thumbnail(); ?>
            </div>
          <?php endif; ?>
        </div>
      </article>
    <?php endwhile; endif; ?>
  </section>
</section>

<?php get_footer(); ?>
