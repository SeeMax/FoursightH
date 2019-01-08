(function ($, root, undefined) {$(function () {
'use strict';
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

$(function featureSlider() {

	$('.featuredSlider').imagesLoaded(function () {

		if (screen.width >= 767){

			$('.featuredSlider').slick({
		    slidesToShow: 1,
			  slidesToScroll: 1,
			  autoplay: true,
			  infinite: true,
			  dots: false,
			  arrows: true,
				prevArrow: $('.featuredPrevArrow'),
				nextArrow: $('.featuredNextArrow'),
			  autoplaySpeed: 3000,
			  pauseOnHover:true,
			  cssEase: 'linear',
			  appendDots:$('.featuredDots')
			});
		} else {
			$('.featuredSlider').slick({
		    slidesToShow: 1,
			  slidesToScroll: 1,
			  autoplay: true,
			  infinite: true,
			  dots: false,
			  arrows: false,
			  autoplaySpeed: 3000,
			  pauseOnHover:true,
			  cssEase: 'linear',
			});
		}
	});
}());

// UNCOMMENT FOR FIXED HEADER
(function fixedHeaderAdjust() {

  // Move the Main Section down based on header height
  function headerPadding() {
    var tl = new TimelineMax();
    var headerHeight = $('.header').height();

    tl.set($('main'), {paddingTop:headerHeight});
  }

  // Set Up The Main Section Padding on Load
  headerPadding();

  // Readjust main padding when window is resized
  $(window).on('resize', function(){
    headerPadding();
  });

}());

// Hide The Last Category Divider on Insight previews
$('.single-insight').each(function(){
  $(this).find('.category-divider').last().hide();
});

$(function mobileMenu() {

	$(".menuToggle").on('click', function() {
		// console.log("click")

		var tl = new TimelineMax(),
				$this = $(this),
				fullMenu = $(".nav"),
				links = $(".nav li"),
				ham1 = $(".hamTop"),
				ham2 = $(".hamMid"),
				ham3 = $(".hamBot"),
				uniTime2 = 0.15;

		if ($this.hasClass("navOpen")) {
			$this.removeClass("navOpen");
			tl.set($(".wrapper"), {height:"auto",overflow:"visible"})
				.to(fullMenu, 0.3, {left:"101%"}, "menuClose")
				.staggerTo(links, 0.3, {opacity:0, x:"50%"}, 0.03, "menuClose")
				.to(ham1, uniTime2, {width:"100%", rotation:0, y:0}, "menuClose")
				.to(ham2, uniTime2, {width:"100%", x:0, opacity:1}, "menuClose")
				.to(ham3, uniTime2, {width:"100%", rotation:0, y:0}, "menuClose");


		} else {
			$this.addClass("navOpen");
			tl.set($(".wrapper"), {height:"100%", overflow:"hidden"})
				.set(links, {opacity:0, x:"50%"})
				.to(fullMenu, 0.3, {left:"0%"}, "menuOpen")
				.staggerTo(links, 0.1, {opacity:1, x:"0%"}, 0.03, "menuOpen")
				.to(ham1, uniTime2, {rotation:227, y:5, width:"50%"}, "menuOpen")
				.to(ham2, uniTime2, {width:"70%", x:5, opacity:0}, "menuOpen")
				.to(ham3, uniTime2, {rotation:-227, y:-5, width:"50%"}, "menuOpen");
		}
	});

});

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
  if (/#/.test(this.href)) {
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

// (function ($, root, undefined) {$(function () {
//
//
// $("p:contains('4sight Health')").html(function(_, html) {
//    return html.replace(/(4sight Health)/g, '<span style="white-space:nowrap;">$1</span>');
// });
//
// });})(jQuery, this);

$(function preLoaderOn() {
	$(window).load(function(){
		$('#preloader').fadeOut('slow',function(){$(this).remove();});
	});
});

(function ($, root, undefined) {

// (function searchToggle() {
//
//   // $('.searchIcon').on('click', function(event) {
//   //   event.preventDefault();
//   //
//   //   if ($(this).hasClass('searchOpen')) {
//   //     closeSearch();
//   //   } else {
//   //     openSearch();
//   //   }
//   // });
//   //
//   // var tl = new TimelineMax();
//   // var searchForm = $('.searchForm');
//   // var formHeight = $('.searchForm').height();
//   //
//   // tl.set(searchForm, {top:-formHeight});
//   //
//   // function closeSearch() {
//   //   var tl = new TimelineMax();
//   //   var $this = $('.searchIcon');
//   //   var icon = $this.parent();
//   //   var searchForm = $('.searchForm');
//   //   var formHeight = $('.searchForm').height();
//   //   var uniTime = 0.3;
//   //   var UniEase1 = Power4.easeOut;
//   //   var UniEase2 = Power4.easeIn;
//   //
//   //   $this.removeClass('searchOpen');
//   //   tl.to($this, uniTime, {rotation:0, transformOrigin:'50% 50%', ease: UniEase2}, 'openSearch');
//   //   tl.to(searchForm, uniTime, {top:-formHeight, ease: UniEase2}, 'openSearch');
//   // }
//
//   // function openSearch() {
//   //   var tl = new TimelineMax();
//   //   var $this = $('.searchIcon');
//   //   var icon = $this.parent();
//   //   var searchForm = $('.searchForm');
//   //   var uniTime = 0.3;
//   //   var UniEase1 = Power4.easeOut;
//   //   var UniEase2 = Power4.easeIn;
//   //
//   //   $this.addClass('searchOpen');
//   //   tl.to($this, uniTime, {rotation:90, transformOrigin:'50% 50%', ease: UniEase1}, 'openSearch');
//   //   tl.to(searchForm, uniTime, {top:'100%', ease: UniEase1}, 'openSearch');
//   // }
//   //
//   // $(document).keyup(function(e) {
//   //     if (e.keyCode == 27  || e.keyCode == 13) { // Esc
//   //       closeSearch();
//   //     }
//   // });
//
//
//   // if ($(window).width() < 1025) {
//   //
//   //   $('.left-menu-list li').on('click', function(event) {
//   //
//   //     var tl = new TimelineMax();
//   //     var $this = $(this);
//   //     var carat = $this.find('.menu-carat');
//   //     var subMenu = $this.find('.sub-menu');
//   //     var subLI = subMenu.find('li');
//   //
//   //     if ($this.hasClass("openMenu")) {
//   //         tl.to(subMenu, 0.3, {height:0}, 'closeUp');
//   //         tl.to(carat, 0.3, {rotation:135,borderColor:colorBlue}, 'closeUp');
//   //      	  $this.removeClass("openMenu");
//   //     } else {
//   //       tl.set(subMenu, {height:'auto'});
//   //       tl.from(subMenu, 0.3, {height:0}, 'openUp');
//   //       tl.to(carat, 0.3, {rotation:-45, borderColor:colorLightBlue}, 'openUp');
//   // 			$this.addClass("openMenu");
//   //     }
//   //
//   //   });
//   //
//   // }
// }());
})(jQuery, this);

(function hideCategoryBar() {
  var str = $('.insight-category-bar').text();
  if($.trim(str) === "") {
   $('.insight-category-bar').hide();
  }
}());

// (function ($, root, undefined) {
//   jQuery(function () {
//
//       // ONLY IF ITS THE HOME PAGE
//       if($('main').is('.home-page') && jQuery('iframe').length > 0){
//
//         jQuery("iframe")[0].src += "?&controls=0&&showinfo=0&rel=0&enablejsapi=1&html5=1";
//         jQuery("iframe").attr('id', 'video');
//       }
//
//    });
// })(jQuery, this);
//
// // Called Asynch-ly
// // https://developers.google.com/youtube/iframe_api_reference
//
// // global variable for the player
// var player;
//
// // this function gets called when API is ready to use
// function onYouTubePlayerAPIReady() {
//   // create the global player from the specific iframe (#video)
//   player = new YT.Player('video', {
//     events: {
//       // call this function when player is ready to use
//       'onReady': onPlayerReady
//     }
//   });
// }
//
//
//
//   function onPlayerReady(event) {
//
//   if (screen.width >= 1025) {
//     // bind events
//     var playButton = jQuery(".playVideo");
//         vidPreview = jQuery(".vidPreview")
//         video = jQuery(".vid-frame iframe")
//         vBack = jQuery(".vidCircle")
//         closeBtn = jQuery(".closeVideo")
//         pauseBtn = jQuery(".vidBackground");
//         bod = jQuery("body")
//
//     playButton.on("click", function() {
//       var tl = new TimelineMax();
//
//       tl.set(pauseBtn, {zIndex:1})
//         // .set(bod, {height:"100%", overflow:"hidden"})
//         .to(vBack, .7, {width:"110%", height:"110%"}, "play")
//         .to( jQuery(this), .13, {rotationY:90}, "play")
//         .to(closeBtn, .3, {scale:1}, "play")
//         .to( vidPreview, .5, {opacity:0}, "play+=.15")
//       // PLAY THE VIDEO
//       player.playVideo();
//     });
//
//     closeBtn.on("click", function() {
//       var tl = new TimelineMax();
//
//       tl// .set(bod, {height:"auto",overflow:"visible"})
//         .to(vBack, .5, {width:"0%", height:"0%", onComplete: backGoBack}, "stop")
//         .to( jQuery('.playVideo'), .13, {rotationY:0}, "stop")
//         .to(closeBtn, .2, {scale:0}, "stop")
//         .to( vidPreview, .5, {opacity:1}, "stop+=.15")
//       // STOP THE VIDEO
//       player.stopVideo();
//     });
//
//     pauseBtn.on("click", function() {
//       var tl = new TimelineMax();
//
//       tl.to( jQuery('.playVideo'), .13, {rotationY:0})
//       // PAUSE THE VIDEO
//       player.pauseVideo();
//     });
//
//     function backGoBack() {
//       var tl = new TimelineMax();
//       tl.set(pauseBtn, {zIndex:0})
//     }
//
//
//
//   }//End > 1024px
//   else {
//
//     jQuery(".playVideo").on("click", function() {
//       player.playVideo();
//     });
//   }
// }
//
//
// // Inject YouTube API script
// var tag = document.createElement('script');
// tag.src = "//www.youtube.com/player_api";
// var firstScriptTag = document.getElementsByTagName('script')[0];
// firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
//
//
//

});})(jQuery, this);
