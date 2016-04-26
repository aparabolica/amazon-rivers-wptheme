<!doctype html>
<html lang="en-US">
<head>
  <meta charset="utf-8" />
  <title><?php wp_title(); ?></title>
  <meta name="viewport" content="width=device-width,initial-scale=1, user-scalable=no">
  <?php wp_head(); ?>
</head>
<body>
  <header id="masthead" class="<?php echo arp_get_header_class(); ?>">
    <div class="container">
      <div class="twelve columns">
        <div class="brand <?php echo arp_get_brand_class(); ?>">
          <img src="<?php echo get_template_directory_uri(); ?>/img/wwf.png" />
          <h1 class="title">
            <a href="<?php echo home_url('/'); ?>">
              <span class="subject">Amazon Rivers</span>
              <span class="product">Platform</span>
            </a>
          </h1>
        </div>
        <nav>
          <a href="#">Library</a>
          <a href="#">Pan Amazon</a>
          <a href="#">Basins</a>
          <a href="#"><span class="fa fa-search"></span></a>
        </nav>
      </div>
    </div>
  </header>
