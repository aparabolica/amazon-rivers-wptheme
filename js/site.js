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

  // FitVids
  $(document).ready(function() {
    if($('.article-media').length)
      $('.article-media').fitVids();
  });

})(jQuery);
