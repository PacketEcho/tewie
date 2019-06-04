// https://codepen.io/sonorangirl/pen/XmRBjq
jQuery(document).ready(function($) {
  $(window).scroll(function() {
    if($(this).scrollTop() > 50) { 
        $('.navbar').removeClass('bg-transparent').addClass('bg-primary');
    } else {
        $('.navbar').removeClass('bg-primary').addClass('bg-transparent');
    }
  });
});