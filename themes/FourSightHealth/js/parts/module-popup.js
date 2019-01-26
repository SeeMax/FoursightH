(function modulePopup(){

  var modClose = $('.modulePopUpClose');
  var modPop = $('.modulePopUp');
  var daveOpen = $('a[href*="askdave"]');
  var daveCard = $('.askDaveCard');
  // var mailOpen = $('a[href*="mailchimp"]');
  var mailCard = $('.mailChimpCard');
  var allParts = [modClose, daveCard, mailCard];
  var tl = new TimelineMax();

  tl.set(modPop, {opacity:0, display:'none'});
  tl.set(allParts, {opacity:0, scale:0, display:'none'});

  // Open The Ask Dave Module
  daveOpen.on('click',function() {
    var tl = new TimelineMax();
    tl.set([modPop, modClose, daveCard], {display:'block'});
    tl.set([modClose], {display:'flex'});
    tl.to(modPop, 0.15, {opacity:1});
    tl.to(modClose, 0.2, {opacity:1, scale:1}, 'partsUp');
    tl.to(daveCard, 0.2, {opacity:1, scale:1}, 'partsUp');
  });

$('body').on('click', 'a', function (e) {
  if (/#/.test(this.href) && $(this).attr('href') != '#tab-description' && $(this).attr('href') != '#tab-additional_information' && $(this).attr('href') != '#' && $(this).attr('href') != '#search') {
    var thisOneLink = ($(this).attr("href"));
    var mailCard2 = $("*[data-form="+ thisOneLink +"]");

    var tl = new TimelineMax();
    tl.set([modPop, mailCard2], {display:'block'});
    tl.set([modClose], {display:'flex'});
    tl.to(modPop, 0.15, {opacity:1});
    tl.to(modClose, 0.2, {opacity:1, scale:1}, 'partsUp');
    tl.to(mailCard2, 0.2, {opacity:1, scale:1}, 'partsUp');

    console.log($(this).attr('href'));
  }
});


$('body').on('click', '#mc-embedded-subscribe', function (e) {
  var tl = new TimelineMax();
  tl.to(daveCard, 0.2, {opacity:0, scale:0}, 'partsDown');
  tl.to(mailCard, 0.2, {opacity:0, scale:0}, 'partsDown');
  tl.to(modClose, 0.2, {opacity:0, scale:0}, 'partsDown');
  tl.to(modPop, 0.15, {opacity:0});
  tl.set(allParts, {display:'none'});
  tl.set(modPop, {display:'none'});
});


  // Close The Ask Dave Module
  modClose.on('click',function() {
    var tl = new TimelineMax();
    tl.to(daveCard, 0.2, {opacity:0, scale:0}, 'partsDown');
    tl.to(mailCard, 0.2, {opacity:0, scale:0}, 'partsDown');
    tl.to(modClose, 0.2, {opacity:0, scale:0}, 'partsDown');
    tl.to(modPop, 0.15, {opacity:0});
    tl.set(allParts, {display:'none'});
    tl.set(modPop, {display:'none'});
  });

}());
