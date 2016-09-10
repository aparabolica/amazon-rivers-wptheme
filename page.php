<?php get_header(); ?>

<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
  <article id="page">
    <header class="page-header">
      <div class="container">
        <div class="nine columns">
          <h1><?php the_title(); ?></h1>
        </div>
        <div class="three columns">
          <aside class="page-share">
            <h3>Share this page</h3>
            <ul>
              <li>
                <div class="fb-like" data-href="<?php the_permalink(); ?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
              </li>
              <li>
                <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink(); ?>" data-via="wwf">Tweet</a>
                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
              </li>
          </aside>
        </div>
      </div>
    </header>
    <section class="page-content">
      <div class="container">
        <div class="eight columns offset-by-two">
          <?php the_content(); ?>
        </div>
      </div>
    </section>
  </article>
<?php endwhile; endif; ?>

<?php get_footer(); ?>
