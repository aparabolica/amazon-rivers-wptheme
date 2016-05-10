<?php get_header(); ?>

<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

  <article id="single">
    <header class="article-header">
      <div class="container">
        <div class="nine columns">
          <h2><?php the_category(' '); ?></h2>
          <h1><?php the_title(); ?></h1>
          <div class="post-meta">
            <p class="date"><?php the_date(); ?></p>
          </div>
        </div>
        <div class="three columns">
          <aside class="article-share">
            <h3>Share this story</h3>
            <ul>
              <li>
                <div class="fb-like" data-href="<?php the_permalink(); ?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
              </li>
              <li>
                <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://wwf.org.br" data-via="wwf">Tweet</a>
                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
              </li>
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
          <div class="twelve columns">
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
          <?php the_content(); ?>
        </div>
      </div>
    </section>
  </article>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
