(function modifySearch() {

  var tl = new TimelineMax();
  var searchLink = $('a[href$="#search"]');
  var searchContainer = searchLink.parent();

  searchLink.html('<i class="search-menu-item searchMenuItem fas fa-search"></i>');


  searchLink.on('click', function(){
    var $this = $(this);
    var searchToggle = $('.searchToggle');

    if ($this.hasClass('openSearch')) {
      $this.removeClass('openSearch');
      tl.to(searchContainer, 0.1, {rotation:0, transformOrigin:'50% 50%'}, 'closeSearch');
      tl.to($this, 0.1, {color:'#585858'}, 'closeSearch');
      tl.to(searchToggle, 0.3, {top:'-100%', zIndex:-1});
    } else {
      $this.addClass('openSearch');
      tl.to(searchContainer, 0.1, {rotation:90, transformOrigin:'50% 50%'}, 'openSearch');
      tl.to($this, 0.1, {color:'#3E8B94'}, 'openSearch');
      tl.to(searchToggle, 0.3, {top:'100%'});
      tl.set(searchToggle, 0.3, {top:'100%'});

    }

  });
}());
