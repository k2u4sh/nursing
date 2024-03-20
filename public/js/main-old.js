$('.fd-carousel.owl-carousel').owlCarousel({
    loop:true,
    margin:30,
    responsiveClass:true,
    smartSpeed: 1500,
    dots: false,
    autoplay: true,
    responsive:{
        0:{
            items:1.5,
            nav:false
        },
        600:{
            items:3,
            nav:false
        },
        1000:{
            items:4.9,
            nav:true,
            loop:false
        }
    }
});

$('.mos-carousel.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    smartSpeed: 1500,
    autoplay: true,
    dots: false,
    responsive:{
        0:{
            items:1.5,
            nav:false
        },
        600:{
            items:3,
            nav:false
        },
        1000:{
            items:4.9,
            nav:true,
            loop:false
        }
    }
});

$( ".owl-prev").html('<i class="fa fa-chevron-left"></i>');
 $( ".owl-next").html('<i class="fa fa-chevron-right"></i>');


function onTabClick1(evt1) {
    setLineStyle1(evt1.target)
  }

  function setLineStyle1(tab1) {
    let line = document.querySelector('.tab-scrollable-view-1 > .line')
    line.style.left = tab1.offsetLeft + "px";
    line.style.width = tab1.clientWidth + "px";
  }


  function onTabClick2(evt2) {
    setLineStyle2(evt2.target)
  }

  function setLineStyle2(tab2) {
    let line2 = document.querySelector('.tab-scrollable-view-2 > .line')
    line2.style.left = tab2.offsetLeft + "px";
    line2.style.width = tab2.clientWidth + "px";
  }

  /* bind events on load */
  window.onload = function() {
    const tabs1 = document.querySelectorAll('.tab-scrollable-view-1 > .nav > .nav-item')
    tabs1.forEach((tab1, index1) => {
      tab1.onclick = onTabClick1;

      if(index1 == 0) setLineStyle1(tab1);
    });

    const tabs2 = document.querySelectorAll('.tab-scrollable-view-2 > .nav > .nav-item')
    tabs2.forEach((tab2, index2) => {
      tab2.onclick = onTabClick2;

      if(index2 == 0) setLineStyle2(tab2);
    })
  }

  $('.zoom-gallery').magnificPopup({
    delegate: 'a',
    type: 'image',
    closeOnContentClick: false,
    closeBtnInside: false,
    mainClass: 'mfp-with-zoom mfp-img-mobile',
    image: {
        verticalFit: true,
        // titleSrc: function(item) {
        //     return item.el.attr('title') + ' &middot; <a class="image-source-link" href="'+item.el.attr('data-source')+'" target="_blank">image source</a>';
        // }
    },
    gallery: {
        enabled: true
    },
    zoom: {
        enabled: true,
        duration: 300, // don't foget to change the duration also in CSS
        opener: function(element) {
            return element.find('img');
        }
    }

});


// Show more and Less more
$('.read-more').click(function() {
    $(this).prev('.more-text').toggle();
     $(this).parent('p').toggleClass('opened');
    if ($(this).text() == "Read More...") {
      $(this).text("Read Less")
    } else {
      $(this).text("Read More...")
    }


    $(this).attr("type","current");
    var current = this;

    $(".read-more").each(function() {
      var ele = this;
      if(!ele.type){
      if ($(this).text() == "Read Less") {
        $(this).prev('.more-text').toggle();
     $(this).parent('p').toggleClass('opened');
    if ($(this).text() == "Read More...") {
      $(this).text("Read Less")
    } else {
      $(this).text("Read More...")
    }
      }
    }

    });

    $(current).attr("type","");
  });

  var colWidth = $(".grid-item").width();

window.onresize = function(){
  var colWidth = $(".grid-item").width();
}
console.log(colWidth);

var $grid = $(".grid").masonry({
  // options
  itemSelector: ".grid-item",
  columnWidth: ".grid-item",
  // percentPosition: true,
  gutter: 20,
  fitWidth: true
});

$grid.imagesLoaded().progress(function() {
  $grid.masonry("layout");
});

jQuery('.menu-close').click(function () {
  jQuery('.navbar-collapse').removeClass('show');
});

$('.hs-icon-block').click(function () {
  $('.hs-input-block').toggleClass('d-flex');
});





      $('.top-to-bottom').click(function () {
        $("html, body").animate({ scrollTop: "0" },  100);
      });

      // Select 2

	if ($('.select').length > 0) {
		$('.select').select2({
			minimumResultsForSearch: -1,
			width: '100%'
		});
	}

  if ($(window).width() < 767) {
    $(window).scroll(function() {
      if ($(this).scrollTop() > 100) {
        $('.enquiry-now-block').addClass('d-flex');
      } else {
        $('.enquiry-now-block').removeClass('d-flex');
      }
    });
  }
