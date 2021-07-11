$(document).ready(function(){

  // Scroll To Top ..
  $('.scrollTop').click(function(){
    $('html,body').animate({
      scrollTop : 0
    },1000);
  });

  // The Header Height ..
  var upperHeight = $('.upperbar').innerHeight();
  var navHeight = $('.navbar').innerHeight();
  var WinHeight = $(window).height();
  var upperPlusNav = upperHeight + navHeight;

  $('.header').innerH(WinHeight - upperPlusNav);



});
