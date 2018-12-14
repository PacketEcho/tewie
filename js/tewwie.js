jQuery(document).ready(function($) {
	$.cookieBanner({
		cookiePageUrl: {
			en: '/privacy-policy/'
		},
	});
});

jQuery(document).ready(function($) {
  var lastScrollTop = 0;
  var $navbar = $('.navbar');

  $(window).scroll(function(event){
    var st = $(this).scrollTop();

    if (st == 0) {
      $navbar.removeClass("bg-primary").addClass("bg-transparent");
    }

    if (st > lastScrollTop) { // scroll down
      $navbar.slideUp()

      $navbar.removeClass("bg-transparent");
    } else { // scroll up
      $navbar.slideDown()

      $navbar.addClass("bg-primary");
    }
    lastScrollTop = st;
  });
});
