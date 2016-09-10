(function($) {

  // Fixed header
  $(document).ready(function() {
    if($('#masthead').hasClass('collapsed')) {

      $(window).bind('scroll', function() {

        if($(window).scrollTop() >= 50) {
          $('#masthead').addClass('fixed');
        } else {
          $('#masthead').removeClass('fixed');
        }

      });

    }
  });

  // Search
  $(document).ready(function() {
    var $search = $('#masthead .search');
    if($search.length) {
      $search.find('a').on('click', function(e) {
        e.preventDefault();
        $search.addClass('active');
        $search.find('input').focus();
      });
      $search.find('a').on('focusin', function() {
        $search.addClass('active');
        $search.find('input').focus();
      });
      $search.find('input').on('focusout', function() {
        $search.removeClass('active');
      });
    }
  });

  // Carousel
  $(document).ready(function() {
    var carousels = $('#carousel');
    if(carousels.length) {
      carousels.each(function() {
        var carousel = $(this);
        var updateHeight = function() {
          var heights = [];
          carousel.find('.carousel-item').each(function() {
            heights.push($(this).height());
          });
          carousel.find('.carousel-items').height(Math.max.apply(Math, heights));
        };
        // carousel.on('load', function() {
        window.onload = function() {
          updateHeight();
          $(window).resize(updateHeight);
          carousel.find('.carousel-item').removeClass('active');
          carousel.find('nav a').on('click', function(e) {
            e.preventDefault();
            clearInterval(rotateInterval);
            var postID = $(this).data('postid');
            carousel.find('nav a').removeClass('active');
            carousel.find('.carousel-item').removeClass('active');
            $(this).addClass('active');
            carousel.find('.carousel-item[data-postid="' + postID + '"]').addClass('active');
            rotateInterval = setInterval(rotate, 8000);
          });
          var rotate = function() {
            if(carousel.find('nav a.active').next('a').length)
            carousel.find('nav a.active').next('a').click();
            else
            carousel.find('nav a:first').click();
          };
          var rotateInterval = setInterval(rotate, 8000);
          carousel.find('nav a:first').click();
        };
      });
    }
  });

  // Social bg
  $(document).ready(function() {
    var $social = $('#social');
    if($social.length) {
      $social.each(function() {
        var social = $(this);
        $(window).resize(function() {
          var winWidth = $(window).width();
          var offset = social.offset();
          social.find('.social-bg').css({
            left: -offset.left,
            right: -(winWidth - offset.left - social.width())
          });
        }).resize();
      });
    }
  });

  // Basin home section
  $(document).ready(function() {

    var $section = $('#basins.page-section');

    if($section.length) {
      $section.each(function() {
        var basins = $(this);

        var maps = basins.find('.basin-map');

        basins.on('click', '.basin-header nav a', function(e) {

          e.preventDefault();

          var id = $(this).data('postid');

          basins.find('.basin-header nav a').removeClass('active').show();

          basins
            .find('.excerpt, .posts, .basin-map')
            .removeClass('active')
            .hide();
          basins
            .find('.basin-map')
            .detach();

          basins
            .find('.excerpt[data-postid="' + id + '"], .posts[data-postid="' + id + '"], .basin-map[data-postid="' + id + '"]')
            .addClass('active')
            .show();
          maps
            .filter('.basin-map[data-postid="' + id + '"]')
            .appendTo(basins.find('.map'))
            .addClass('active')
            .show();

          $(this).hide().addClass('active');

          basins.find('.basin-header h3, .current-name').text(basins.find('.basin-header nav a.active .title').text());

          basins.find('.button.more').attr('href', $(this).attr('href'));

        });
        basins.find('.basin-header nav a:first').click();

      });
    }

  });

  // Basin selector
  $(document).ready(function() {
    var selector = $('#basins-selector');
    var basin = window.location.hash.substr(1);
    if(selector.length) {
      selector.each(function() {
        var sel = $(this);
        var maps = $('.basin-map');
        sel.find('.basin-item h2').on('click', function() {
          sel.removeClass('selected');
          var name = $(this).text();
          var id = $(this).parents('.basin-item').attr('id');
          $('.related-stories .basin-posts').hide();
          $('.domegis-data .basin-data').hide();
          $('.related-stories #basin-' + id + '-posts').show();
          $('.domegis-data #basin-' + id + '-data').show();
          $('.basin-map')
            .detach();
          maps
            .filter('.basin-map[data-postid="' + id + '"]')
            .appendTo($('#main-map'));

          $('body').find('.basin-name').text(name);
          if(!$(this).parents('.basin-item').hasClass('active')) {
            sel.find('.basin-item').removeClass('active');
            $(this).parents('.basin-item').addClass('active');
            sel.addClass('selected');
          } else {
            sel.find('.basin-item').removeClass('active');
          }
          updateHeight();
        });
        if(basin) {
          sel.find('#' + basin + ' h2').click();
        }
      });
    }
    $(window).resize(updateHeight);
    function updateHeight() {
      $('.basin-item .basin-description').css({
        height: 0
      });
      $('.basin-item.active .basin-description').css({
        height: $(window).height() - 415
      });
    }
  });

  /*
   * Basin content sections
   */
  $(document).ready(function() {
    var $container = $('#basin-content');
    $container.each(function() {
      var content = $(this);
      var sections = $(this).find('.basin-content-section');
      var nav = $(this).find('.basin-content-header h2');
      sections.hide().first().show();
      var selectedId = sections.first().attr('id');
      nav.filter('[data-section="' + selectedId + '"]').addClass('active');
      nav.on('click', function() {
        var id = $(this).data('section');
        nav.removeClass('active');
        sections.hide();
        $(this).addClass('active');
        sections.filter('#' + id).show();
        if(id == 'basin-domegis-data') {
          content.addClass('dark expanded');
        } else {
          content.removeClass('dark expanded');
        }
      });
    });
  });

  // FitVids
  $(document).ready(function() {
    if($('.article-media').length)
      $('.article-media').fitVids();
    if($('#story-map').length)
      $('#story-map').fitVids();
    if($('.article-content').length)
      $('.article-content').fitVids();
  });

})(jQuery);
