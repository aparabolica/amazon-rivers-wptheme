<?php get_header(); ?>

<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

  <article id="single">
    <header class="article-header">
      <div class="container">
        <div class="nine columns">
          <h2><?php the_category(' '); ?></h2>
          <h1><?php the_title(); ?></h1>
          <div class="post-meta">
            <?php do_action('arp_pre_single_post_meta'); ?>
            <?php do_action('arp_post_single_post_meta'); ?>
            <p class="date"><span class="fa fa-calendar"></span><?php the_date(); ?></p>
          </div>
        </div>
        <div class="three columns">
          <aside class="article-share">
            <h3><?php _e('Share this story', 'arp'); ?></h3>
            <ul>
              <li>
                <div class="fb-like" data-href="<?php the_permalink(); ?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
              </li>
              <li>
                <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://wwf.org.br" data-via="wwf">Tweet</a>
                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
              </li>
          </aside>
          <aside class="social">
            <div class="social-content">
              <h3><?php _e('Connect with us', 'arp'); ?></h3>
              <?php
              $fb = get_field('site_options_facebook', 'option');
              $tw = get_field('site_options_twitter', 'option');
              $yt = get_field('site_options_youtube', 'option');
              ?>
              <?php if($fb) : ?>
                <a class="fa fa-facebook" href="<?php echo $fb; ?>" target="_blank" rel="extenal" title="Facebook"></a>
              <?php endif; ?>
              <?php if($yt) : ?>
                <a class="fa fa-youtube" href="<?php echo $yt; ?>" target="_blank" rel="external" title="YouTube"></a>
              <?php endif; ?>
              <?php if($tw) : ?>
                <a class="fa fa-twitter" href="<?php echo $tw; ?>" target="_blank" rel="external" title="Twitter"></a>
              <?php endif; ?>
            </div>
          </aside>
        </div>
      </div>
    </header>
    <?php
    $video = arp_get_video();
    if($video || has_post_thumbnail()) :
      ?>
      <section class="article-media">
        <div class="container">
          <div class="ten columns offset-by-one">
            <div class="media-content">
              <?php
              if($video) :
                echo $video;
              elseif(has_post_thumbnail()) :
                the_post_thumbnail();
              endif;
              ?>
            </div>
          </div>
        </div>
      </section>
      <?php
    endif;
    ?>
    <section class="article-content">
      <div class="container">
        <div class="eight columns offset-by-two">
          <?php
          $src = arp_get_source_url();
          if($src) :
            ?>
            <p class="arp-src"><a href="<?php echo $src; ?>" rel="external" target="_blank"><?php _e('Go to the original post', 'arp'); ?></a></p>
            <?php
          endif;
          ?>
          <?php the_content(); ?>
          <?php
          $src = arp_get_source_url();
          if($src) :
            ?>
            <p class="arp-src"><a href="<?php echo $src; ?>" rel="external" target="_blank"><?php _e('Go to the original post', 'arp'); ?></a></p>
            <?php
          endif;
          ?>
        </div>
      </div>
    </section>
  </article>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
