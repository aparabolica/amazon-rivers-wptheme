<?php get_header(); ?>

<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

<article id="single">
  <header class="article-header">
    <div class="container">
      <div class="nine columns">
        <h2>Video</h2>
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
              <div class="fb-like" data-href="http://wwf.org.br" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
            </li>
            <li>
              <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://wwf.org.br" data-via="wwf">Tweet</a>
              <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
            </li>
        </aside>
      </div>
    </div>
  </header>
  <section class="article-media">
    <div class="container">
      <div class="twelve columns">
        <div class="media-content">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/1gJNumoh7HY" frameborder="0" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </section>
  <section class="article-content">
    <div class="container">
      <div class="eight columns offset-by-two">
        <p>Maecenas dui magna, condimentum in metus id, lacinia condimentum libero. Suspendisse sodales risus non lacus interdum ornare. Proin ex elit, suscipit sed massa et, tristique iaculis mi. Integer in lacus elementum, euismod mauris ut, finibus diam. Mauris fermentum vehicula ex sit amet placerat. Proin vitae tellus id ligula suscipit sollicitudin vitae at felis. In eu felis diam. Aliquam tempor diam eros, sit amet venenatis velit venenatis et.</p>
      </div>
    </div>
    <div class="container">
      <div class="twelve columns">
        <section id="map">
          <iframe src="http://infoamazonia.org/embed/?zoom=5&map_only=1&map_id=3501" width="100%" height="600" frameborder="0"></iframe>
        </section>
      </div>
    </div>
    <div class="container">
      <div class="seven columns offset-by-two">
        <p>Cras quis quam eu turpis fringilla ultricies sit amet at libero. Nulla sed nisi vitae purus dictum aliquam a nec risus. Praesent a magna congue, efficitur leo id, tincidunt sapien. Sed eu nisl id tortor iaculis malesuada. Vivamus id dignissim arcu, et sodales leo. Phasellus sodales elementum augue. Nullam euismod volutpat odio, sit amet euismod velit dictum ut.</p>
        <p>Nam posuere pulvinar urna sit amet blandit. Etiam id imperdiet elit, in pulvinar nulla. Proin metus nunc, imperdiet fringilla urna tempor, ultrices aliquet nisi. Cras lobortis odio et ipsum porta, nec posuere magna scelerisque. Pellentesque interdum aliquet arcu, ac porttitor lacus sollicitudin vitae. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nam leo purus, facilisis ut ante vel, hendrerit sagittis ligula. Pellentesque eu mattis magna. Nunc porta feugiat quam, id viverra sapien pulvinar ut.</p>
      </div>
      <div class="three columns">
        <aside class="article-related">
          <h3>Also</h3>
          <ul>
            <li>
              <a href="#">Nam posuere pulvinar urna sit amet blandit.</a>
            </li>
            <li>
              <a href="#">Etiam id imperdiet elit, in pulvinar nulla.</a>
            </li>
            <li>
              <a href="#">Vivamus id dignissim arcu, et sodales leo. Phasellus sodales elementum augue.</a>
            </li>
          </ul>
        </aside>
      </div>
    </div>
  </section>
</article>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
