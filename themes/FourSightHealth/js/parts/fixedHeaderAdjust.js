// UNCOMMENT FOR FIXED HEADER
(function fixedHeaderAdjust() {

  // Move the Main Section down based on header height
  function headerPadding() {
    var tl = new TimelineMax();
    var headerHeight = $('.header').height();

    tl.set($('main'), {paddingTop:headerHeight});
    tl.set($('.single-product-page'), {paddingTop:headerHeight});
  }

  // Set Up The Main Section Padding on Load
  headerPadding();

  // Readjust main padding when window is resized
  $(window).on('resize', function(){
    headerPadding();
  });

}());
