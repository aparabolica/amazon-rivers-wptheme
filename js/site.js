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

  // Basin
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
