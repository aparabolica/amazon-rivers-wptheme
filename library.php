<?php
/*
 * Template name: Library page
 */
?>
<?php get_header(); ?>

<article id="page">
  <header class="page-header">
    <div class="container">
      <div class="twelve columns">
        <section id="story-map">
          <iframe frameborder="0" src="http://panda.maps.arcgis.com/apps/MapSeries/index.html?appid=7919d0e1e962438d8824b726c90ab4a6&webmap=e336462261924c2b8a0307d740ebb35d"></iframe>
          <div class="example">
            <p>Example story map</p>
          </div>
        </section>
      </div>
    </div>
  </header>
  <section id="latest" class="page-section">
    <div class="container">
      <div class="twelve columns">
        <h2 class="section-title">Latest news</h2>
      </div>
    </div>
    <div class="post-list latest-list">
      <div class="container">
        <div class="four columns">
          <article class="post-item">
            <img src="http://lorempixum.com/400/225?1" />
            <h3>Phasellus pellentesque fringilla odio, sed gravida metus congue in. Nulla facilisi.</h3>
          </article>
        </div>
        <div class="four columns">
          <article class="post-item">
            <img src="http://lorempixum.com/400/225?2" />
            <h3>Phasellus pellentesque fringilla odio, sed gravida metus congue in. Nulla facilisi.</h3>
          </article>
        </div>
        <div class="four columns">
          <article class="post-item">
            <img src="http://lorempixum.com/400/225?3" />
            <h3>Phasellus pellentesque fringilla odio, sed gravida metus congue in. Nulla facilisi.</h3>
          </article>
        </div>
      </div>
    </ul>
  </section>
  <div class="container">
    <div class="six columns">
      <section id="publications" class="page-section">
        <h2 class="section-title">Publications</h2>
        <article class="post-item clearfix">
          <div class="three columns">
            <img src="http://lorempixum.com/400/400?1" />
          </div>
          <div class="nine columns">
            <h3>Phasellus pellentesque fringilla odio, sed gravida metus congue in. Nulla facilisi.</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut vehicula vulputate fermentum. Sed porttitor dui est, at pellentesque elit posuere at.</p>
          </div>
        </article>
        <article class="post-item clearfix">
          <div class="three columns">
            <img src="http://lorempixum.com/400/400?2" />
          </div>
          <div class="nine columns">
            <h3>Phasellus pellentesque fringilla odio, sed gravida metus congue in. Nulla facilisi.</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut vehicula vulputate fermentum. Sed porttitor dui est, at pellentesque elit posuere at.</p>
          </div>
        </article>
        <article class="post-item clearfix">
          <div class="three columns">
            <img src="http://lorempixum.com/400/400?3" />
          </div>
          <div class="nine columns">
            <h3>Phasellus pellentesque fringilla odio, sed gravida metus congue in. Nulla facilisi.</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut vehicula vulputate fermentum. Sed porttitor dui est, at pellentesque elit posuere at.</p>
          </div>
        </article>
      </section>
    </div>
    <div class="two columns">
      <section id="share" class="page-section">
        <h2 class="section-title">Stay tuned</h2>
        <div class="section-box">
          <a href="#" class="fa fa-facebook"></a>
          <a href="#" class="fa fa-twitter"></a>
        </div>
      </section>
      <section id="join" class="page-section">
        <h2 class="section-title">Join us</h2>
        <div class="section-box">
          <p>Sed porttitor dui est, at pellente elit posuere at.</p>
          <a class="button" href="#">Join now</a>
        </div>
    </div>
    <div class="four columns">
      <section id="videos" class="page-section">
        <h2 class="section-title">Videos</h2>
        <article class="post-item">
          <img src="http://lorempixum.com/400/225?4" />
          <h3>Phasellus pellentesque fringilla odio, sed gravida metus congue in. Nulla facilisi.</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut vehicula vulputate fermentum. Sed porttitor dui est, at pellentesque elit posuere at.</p>
        </article>
      </section>
    </div>
  </div>
</article>

<?php get_footer(); ?>
