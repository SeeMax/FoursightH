$('.singleBio').each(function() {

  var $this = $(this);
  var excerpt = $this.find('.bioExcerpt');
  var fullText = $this.find('.bioFullcerpt');
  var readLess = $this.find('.readLess');
  var readMore = $this.find('.readMore');

  $(fullText).hide();
  // readMore.on('click', funtion() {
  //   excerpt.hide();
  // });

  $( readMore ).on( "click", function() {
    $(excerpt).slideUp(200);
    $(fullText).slideDown(200);
  });

  $( readLess).on( "click", function() {
    $(fullText).slideUp(200);
    $(excerpt).slideDown(200);
  });
});
