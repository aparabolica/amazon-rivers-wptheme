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
        carousel.find('.carousel-item').hide();
        carousel.find('nav a').on('click', function(e) {
          e.preventDefault();
          clearInterval(rotateInterval);
          var postID = $(this).data('postid');
          carousel.find('nav a').removeClass('active');
          carousel.find('.carousel-item').hide();
          $(this).addClass('active');
          carousel.find('.carousel-item[data-postid="' + postID + '"]').show();
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
      });
    }
  })


  // Basin selector
  $(document).ready(function() {
    var selector = $('#basins-selector');
    if(selector.length) {
      selector.each(function() {
        var sel = $(this);
        sel.find('.basin-item h2').on('click', function() {
          if($(this).parents('.basin-item').hasClass('active')) {
            $(this).parents('.basin-item').removeClass('active');
            sel.removeClass('selected');
          } else {
            $(this).parents('.basin-item').addClass('active');
            sel.addClass('selected');
          }
        })
      });
    }
  });

  // FitVids
  $(document).ready(function() {
    if($('.article-media').length)
      $('.article-media').fitVids();
  });

})(jQuery);
