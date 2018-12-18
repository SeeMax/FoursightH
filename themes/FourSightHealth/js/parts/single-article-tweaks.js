(function hideCategoryBar() {
  var str = $('.insight-category-bar').text();
  if($.trim(str) === "") {
   $('.insight-category-bar').hide();
  }
}());
