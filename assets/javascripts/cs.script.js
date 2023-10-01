/* SHARED VARS */
var firstrun = true,
    touch = false,
    clickEv = 'click';


var isMobile = {
    Android: function() {
        return navigator.userAgent.match(/Android/i);
    },
    BlackBerry: function() {
        return navigator.userAgent.match(/BlackBerry/i);
    },
    iOS: function() {
        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    },
    Opera: function() {
        return navigator.userAgent.match(/Opera Mini/i);
    },
    Windows: function() {
        return navigator.userAgent.match(/IEMobile/i);
    },
    any: function() {
        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
    }
};

var switchImage = function(newImageSrc, newImage, mainImageDomEl) {
  
  jQuery(mainImageDomEl).attr('src', newImageSrc);
  $(mainImageDomEl).parents('a').attr('href', newImageSrc);

  
};

/* Fucntion get width browser */
function getWidthBrowser() {
	var myWidth;

	if( typeof( window.innerWidth ) == 'number' ) { 
		//Non-IE 
		myWidth = window.innerWidth;
		//myHeight = window.innerHeight; 
	} 
	else if( document.documentElement && ( document.documentElement.clientWidth || document.documentElement.clientHeight ) ) { 
		//IE 6+ in 'standards compliant mode' 
		myWidth = document.documentElement.clientWidth; 
		//myHeight = document.documentElement.clientHeight; 
	} 
	else if( document.body && ( document.body.clientWidth || document.body.clientHeight ) ) { 
		//IE 4 compatible 
		myWidth = document.body.clientWidth; 
		//myHeight = document.body.clientHeight; 
	}
	
	return myWidth;
}

/* Function: Refresh Zoom */
function alwaysUpdateZoom(){
  if(touch == false){
    
    if($('.elevatezoom').length){
      
      var zoomImage = $('.elevatezoom .img-zoom');

      zoomImage.elevateZoom({
        gallery:'gallery_main', 
        galleryActiveClass: 'active', 
        zoomType: 'window',
        cursor: 'pointer',
        zoomWindowFadeIn: 300,
        zoomWindowFadeOut: 300,
        scrollZoom: true,
        easing : true
      });
      
      
        //pass the images to Fancybox
        $(".elevatezoom .img-zoom").bind("click", function(e) {  
          var ez =   $('.elevatezoom .img-zoom').data('elevateZoom');	
          $.fancybox(ez.getGalleryList(),{
            closeBtn  : false,
            helpers : {
              buttons	: {}
            }
          });
          return false;
        });
      
    }
    
  }
       // is touch
       else{
         
       }
}

// handle Animate
function handleAnimate(){
  if(touch == false){
    $('[data-animate]').each(function(){
      
      var $toAnimateElement = $(this);
      
      var toAnimateDelay = $(this).attr('data-delay');
      
      var toAnimateDelayTime = 0;
      
      if( toAnimateDelay ) { toAnimateDelayTime = Number( toAnimateDelay ); } else { toAnimateDelayTime = 200; }
      
      if( !$toAnimateElement.hasClass('animated') ) {
        
        $toAnimateElement.addClass('not-animated');
        
        var elementAnimation = $toAnimateElement.attr('data-animate');
        
        $toAnimateElement.appear(function () {
          
          setTimeout(function() {
            $toAnimateElement.removeClass('not-animated').addClass( elementAnimation + ' animated');
          }, toAnimateDelayTime);
          
        },{accX: 0, accY: -100},'easeInCubic');
        
      }
    });
  }
}
      
function handleLogin(){
  $("#loginBox input").focus(function() {
    $(this).parents('#loginBox').addClass('focus');
  }).blur(function() {
    $(this).parents('#loginBox').removeClass('focus');
  });
}
 
// handle scroll-to-top button
function handleScrollTop() {
  
  function totop_button(a) {
    var b = $("#scroll-to-top");
    b.removeClass("off on");
    if (a == "on") { b.addClass("on") } else { b.addClass("off") }
  }
  
  $(window).scroll(function() {
    var b = $(this).scrollTop();
    var c = $(this).height();
    if (b > 0) { 
      var d = b + c / 2;
    } 
    else { 
      var d = 1 ;
    }
    
    if (d < 1e3 && d < c) { 
      totop_button("off");
    } 
    else {
      
      totop_button("on"); 
    }
  });
  
  $("#scroll-to-top").click(function (e) {
    e.preventDefault();
    $('body,html').animate({scrollTop:0},800,'swing');
  });
}
      
/* Function update scroll product thumbs */
function updateScrollThumbs(){
  if($('#gallery_main').length){
    
    if(touch){
      $('#product-image .main-image').on('click', function() {
        var _items = [];
        var _index = 0;
        var product_images = $('#product-image .image-thumb');
        product_images.each(function(key, val) {
          _items.push({'href' : val.href, 'title' : val.title});
          if($(this).hasClass('active')){
            _index = key;
          }
        });
        $.fancybox(_items,{
          closeBtn: false,
          index: _index,
          openEffect: 'none',
          closeEffect: 'none',
          nextEffect: 'none',
          prevEffect: 'none',
          helpers: {
            buttons: {}
          }
        });
        return false;
      });
    }
    else{
      
    }

    $('#product-image').on('click', '.image-thumb', function() {

      var $this = $(this);
      var background = $('.product-image .main-image .main-image-bg');
      var parent = $this.parents('.product-image-wrapper');
      var src_original = $this.attr('data-image-zoom');
      var src_display = $this.attr('data-image');
      
      background.show();
      
      parent.find('.image-thumb').removeClass('active');
      $this.addClass('active');
      
      parent.find('.main-image').find('img').attr('data-zoom-image', src_original);
      parent.find('.main-image').find('img').attr('src', src_display).load(function() {
        background.hide();
      });
      
      return false;
    });
  }
}
    
/* Function update scroll product thumbs */
function updateScrollThumbsQS(){
  if($('#gallery_main_qs').length){
    
    $('#quick-shop-image .fancybox').on(clickEv, function() {
      var _items = [];
      var _index = 0;
      var product_images = $('#gallery_main_qs .image-thumb');
      product_images.each(function(key, val) {
        _items.push({'href' : val.href, 'title' : val.title});
        if($(this).hasClass('active')){
          _index = key;
        }
      });
      $.fancybox(_items,{
        closeBtn: true,
        index: _index,
        helpers: {
          buttons: {}
        }
      });
      return false;
    });

    $('#quick-shop-image').on(clickEv, '.image-thumb', function() {

      var $this = $(this);
      var background = $('.product-image .main-image .main-image-bg');
      var parent = $this.parents('.product-image-wrapper');
      var src_original = $this.attr('data-image-zoom');
      var src_display = $this.attr('data-image');
      
      background.show();
      
      parent.find('.image-thumb').removeClass('active');
      $this.addClass('active');
      
      parent.find('.main-image').find('img').attr('data-zoom-image', src_original);
      parent.find('.main-image').find('img').attr('src', src_display).load(function() {
        background.hide();
      });
      
      return false;
    });
  }
}
    
/* Handle Carousel */
function handleCarousel(){

  /* Handle main slideshow */
  if($('#home-slider').length){
    var k;
    if($(window),innerWidth>=1200)
      k = $(window).innerHeight()+'px';
    else
      if($(window),innerWidth>=768)
        k = "50%";
      else
        k = "30%";
      $('#home-slider').camera({
        height: k,
		time:2000,
		pagination: false,
        thumbnails: false,
        autoAdvance: true,
        playPause: false,
		fx: 'mosaicRandom'
      });
  }
  
  /* Handle Popular Collections */
  if($('#home_collections').length){
    imagesLoaded('#home_collections', function() {
      $("#home_collections").owlCarousel({
        navigation : true,
        pagination: false,
        autoPlay: true,
        stopOnHover: true,
        items: 4,
        itemsDesktop : [1199,4],
        itemsDesktopSmall : [979,3],
        itemsTablet: [768,3],
        itemsTabletSmall: [540,2],
        itemsMobile : [360,1],
        scrollPerPage: true,
        navigationText: ['<span class="btooltip" title="Previous"></span>', '<span class="btooltip" title="Next"></span>'],
        afterInit: function(elem){
          if(touch == false){
          elem.find('.btooltip').tooltip();
          }
        }
      });
    });
  }
  
  /* Handle Promotion */
  if($('#home_promotion').length){
    imagesLoaded('#home_promotion', function() {
      $("#home_promotion").owlCarousel({
        navigation : true,
        pagination: true,
        autoPlay: true,
        stopOnHover: true,
        items: 1,
        itemsDesktop : [1199,1],
        itemsDesktopSmall : [979,1],
        itemsTablet: [768,1],
        itemsTabletSmall: [540,1],
        itemsMobile : [360,1],
        scrollPerPage: true,
        navigationText: ['<span class="btooltip" title="Previous"></span>', '<span class="btooltip" title="Next"></span>']
      });
    });
  }
  
  /* Handle Popular Partners */
  if($('#partners').length){
    imagesLoaded('#partners', function() {
      $("#partners").owlCarousel({
        navigation : true,
        pagination: false,
        autoPlay: true,
        stopOnHover: true,
        items: 6,
        itemsDesktop : [1199,6],
        itemsDesktopSmall : [979,5],
        itemsTablet: [768,4],
        itemsTabletSmall: [540,3],
        itemsMobile : [360,2],
        scrollPerPage: true,
        navigationText: ['<span class="btooltip" title="Previous"></span>', '<span class="btooltip" title="Next"></span>'],
        afterInit: function(elem){
          if(touch == false){
          elem.find('.btooltip').tooltip();
          }
        }
      });
    });
  }
  
  /* Handle Featured Products */
  if($('#home_fp').length){
    imagesLoaded('#home_fp', function() {
      $("#home_fp").owlCarousel({
        navigation : true,
        pagination: false,
        autoPlay: true,
        stopOnHover: true,
        items: 4,
        itemsDesktop : [1199,4],
        itemsDesktopSmall : [979,3],
        itemsTablet: [768,3],
        itemsTabletSmall: [540,2],
        itemsMobile : [360,1],
        scrollPerPage: true,
        navigationText: ['<span class="btooltip" title="Previous"></span>', '<span class="btooltip" title="Next"></span>'],
        afterInit: function(elem){
          if(touch == false){
          elem.find('.btooltip').tooltip();
          }
        }
      });
    });
  }
  
  /* Handle Moreview in Quickview */
  if($('#gallery_main_qs').length){
    imagesLoaded('#gallery_main_qs', function() {
      $("#gallery_main_qs").owlCarousel({
        navigation : true,
        pagination: false,
        autoPlay: true,
        stopOnHover: true,
        items: 4,
        itemsDesktop : [1199,4],
        itemsDesktopSmall : [979,3],
        itemsTablet: [768,3],
        itemsTabletSmall: [540,2],
        itemsMobile : [360,1],
        scrollPerPage: true,
        navigationText: ['<span class="btooltip" title="Previous"></span>', '<span class="btooltip" title="Next"></span>'],
        afterInit: function(elem){
          if(touch == false){
          elem.find('.btooltip').tooltip();
          }
        }
      });
    });
  }
  /* Handle product thumbs */
  
  $('.full_width .slide-product-image').bxSlider({
    mode: 'vertical',
    slideWidth: 100,
    minSlides: 4,
    nextText: '<i class="fa fa-chevron-down btooltip" title="down"></i>',
    prevText: '<i class="fa fa-chevron-up btooltip" title="up"></i>',
    hideControlOnEnd: true,
    infiniteLoop: false,
    pager: false,
    slideMargin: 0,
    adaptiveHeight:true
  });

  /* Handle gallery products mobile full*/
  if($(".mobile_full_width .slide-product-image").length){
    $(".mobile_full_width .slide-product-image").owlCarousel({
      navigation : true,
      pagination: false,
      items: 4,
      slideSpeed : 200,
      paginationSpeed : 800,
      rewindSpeed : 1000,
      itemsDesktop : [1199,4],
      itemsDesktopSmall : [979,4],
      itemsTablet: [768,4],
      itemsTabletSmall: [540,3],
      itemsMobile : [360,3],
      touchDrag:true,
      //scrollPerPage: true,
      navigationText: ['<span class="btooltip" title="Previous"></span>', '<span class="btooltip" title="Next"></span>']
    });
  }
  
  /* Handle gallery products no full*/
  if($(".no_full_width .slide-product-image").length){
    $(".no_full_width .slide-product-image").owlCarousel({
      navigation : true,
      pagination: false,
      items: 4,
      slideSpeed : 200,
      paginationSpeed : 800,
      rewindSpeed : 1000,
      itemsDesktop : [1199,4],
      itemsDesktopSmall : [979,4],
      itemsTablet: [768,4],
      itemsTabletSmall: [540,3],
      itemsMobile : [360,3],
      //scrollPerPage: true,
      navigationText: ['<span class="btooltip" title="Previous"></span>', '<span class="btooltip" title="Next"></span>']
    });
  }
  
  /* Handle related products */
  if($(".prod-related").length){
    if($("#col-main").hasClass("no_full_width")){
      $(".prod-related").owlCarousel({
        navigation : true,
        pagination: false,
        items: 3,
        slideSpeed : 200,
        paginationSpeed : 800,
        rewindSpeed : 1000,
        itemsDesktop : [1199,3],
        itemsDesktopSmall : [979,3],
        itemsTablet: [768,2],
        itemsTabletSmall: [540,2],
        itemsMobile : [360,1],
        //scrollPerPage: true,
        navigationText: ['<span class="btooltip" title="Previous"></span>', '<span class="btooltip" title="Next"></span>'],
        beforeMove: function(elem) {
          if(touch == false){
            var items = elem.find('.not-animated');
            items.removeClass('not-animated').unbind('appear');
          }
        },
        afterInit: function(elem){
          if(touch == false){
          elem.find('.btooltip').tooltip();
          }
        }
      });
    }
    else{
      $(".prod-related").owlCarousel({
        navigation : true,
        pagination: false,
        items: 4,
        slideSpeed : 200,
        paginationSpeed : 800,
        rewindSpeed : 1000,
        itemsDesktop : [1199,4],
        itemsDesktopSmall : [979,3],
        itemsTablet: [768,2],
        itemsTabletSmall: [540,2],
        itemsMobile : [360,1],
        //scrollPerPage: true,
        navigationText: ['<span class="btooltip" title="Previous"></span>', '<span class="btooltip" title="Next"></span>'],
        beforeMove: function(elem) {
          if(touch == false){
            var items = elem.find('.not-animated');
            items.removeClass('not-animated').unbind('appear');
          }
        },
        afterInit: function(elem){
          if(touch == false){
          elem.find('.btooltip').tooltip();
          }
        }
      });
    }
  }
}

/* Handle search box on mobile */
function callbackSearch(){
   $('.header-search i').mouseup(function(search){
     $(this).parent().find('.search-form').addClass('focus');
   });
  
  $('.header-search i').mouseup(function(search){
     if(!($(search.target).parent().find('.search-form').length > 0)) {
      $(this).parent().find('.search-form').removeClass('focus');
    }
   });
  
}
/* Handle search box on pc */
function handleBoxSearch(){
  if($('#header-search input').length){
    $('#header-search input').focus(function() {
      $(this).parent().addClass('focus');
    }).blur(function() {
      $(this).parent().removeClass('focus');
    });
  }
}
    
/* Handle Map with GMap */
function handleMap(){
  if(jQuery().gMap){
    if($('#contact_map').length){
      $('#contact_map').gMap({
        zoom: 17,
        scrollwheel: false,
        maptype: 'ROADMAP',
        markers:[
          {
            address: '249 Ung Văn Khiêm, phường 25, Ho Chi Minh City, Vietnam',
            html: '_address'
          }
        ]
      });
    }
  }
}
    
/* Handle Grid - List */
function handleGridList(){
  if($('#goList').length){
    $('#goList').on(clickEv, function(e){
      $(this).parent().find('li').removeClass('active');
      $(this).addClass('active');
      
      $('#sandBox .element').removeClass('no_full_width');
      $('#sandBox .element').addClass('full_width');
      $('#sandBox .element .row-left').addClass('col-md-8');
      //$('#sandBox .element .row-left').addClass('col-sm-8');
      $('#sandBox .element .row-right').addClass('col-md-16');
      //$('#sandBox .element .row-right').addClass('col-sm-16');
      
      $('#sandBox').isotope('reLayout');
      if(clickEv == 'touchstart'){
      $(this).click();
      return true;
    }
      
    });
  }
  
  if($('#goGrid').length){
    $('#goGrid').on(clickEv, function(e){
      $(this).parent().find('li').removeClass('active');
      $(this).addClass('active');
      
      $('#sandBox .element').removeClass('full_width');
      $('#sandBox .element').addClass('no_full_width');
      $('#sandBox .element .row-left').removeClass('col-md-8');
      //$('#sandBox .element .row-left').removeClass('col-sm-8');
      $('#sandBox .element .row-right').removeClass('col-md-16');
      //$('#sandBox .element .row-right').removeClass('col-sm-16');
      
      $('#sandBox').isotope('reLayout');
      if(clickEv == 'touchstart'){
      $(this).click();
      return true;
    }
      
    });
  }
}
function handleGridListajax(){
  if($('#goList').length){
    $('#goList').on(clickEv, function(e){
      $(this).parent().find('li').removeClass('active');
      $(this).addClass('active');
      
      $('#sandBox .element').removeClass('no_full_width');
      $('#sandBox .element').addClass('full_width');
      $('#sandBox .element .row-left').addClass('col-md-8');
      //$('#sandBox .element .row-left').addClass('col-sm-8');
      $('#sandBox .element .row-right').addClass('col-md-16');
      //$('#sandBox .element .row-right').addClass('col-sm-16');
      if(clickEv == 'touchstart'){
      $(this).click();
      return true;
    }
      
    });
  }
  
  if($('#goGrid').length){
    $('#goGrid').on(clickEv, function(e){
      $(this).parent().find('li').removeClass('active');
      $(this).addClass('active');
      
      $('#sandBox .element').removeClass('full_width');
      $('#sandBox .element').addClass('no_full_width');
      $('#sandBox .element .row-left').removeClass('col-md-8');
      //$('#sandBox .element .row-left').removeClass('col-sm-8');
      $('#sandBox .element .row-right').removeClass('col-md-16');
      //$('#sandBox .element .row-right').removeClass('col-sm-16');
      if(clickEv == 'touchstart'){
      $(this).click();
      return true;
    }
      
    });
  }
}

/* Handle detect platform */
function handleDetectPlatform(){
  /* DETECT PLATFORM */
  $.support.touch = 'ontouchend' in document;
  
  if ($.support.touch) {
    touch = true;
    $('body').addClass('touch');
    clickEv = 'touchstart';
  }
  else{
    $('body').addClass('notouch');
    if (navigator.appVersion.indexOf("Mac")!=-1){
      if (navigator.userAgent.indexOf("Safari") > -1){
        $('body').addClass('macos');
      }
      else if (navigator.userAgent.indexOf("Chrome") > -1){
        $('body').addClass('macos-chrome');
      }
        else if (navigator.userAgent.indexOf("Mozilla") > -1){
          $('body').addClass('macos-mozilla');
        }
    }
  }
}
    
/* Handle tooltip */
function handleToolTip(){
  if(touch == false){
    if($('.btooltip').length){
      $('.btooltip').tooltip();
    }
  }
}
    
/* Handle product quantity */
function handleQuantity(){
  if($('.quantity-wrapper').length){
    $('.quantity-wrapper').on(clickEv, '.qty-up', function() {
      var $this = $(this);
      
      var qty = $this.data('src');
      $(qty).val(parseInt($(qty).val()) + 1);
    });
    $('.quantity-wrapper').on(clickEv, '.qty-down', function() {
      var $this = $(this);
      
      var qty = $this.data('src');
      
      if(parseInt($(qty).val()) > 1)
        $(qty).val(parseInt($(qty).val()) - 1);
    });
  }
}
    
/* Handle sidebar */
function handleSidebar(){
  /* Add class first, last in sidebar */
  if($('.sidebar').length){
    $('.sidebar').children('.row-fluid').first().addClass('first');
    $('.sidebar').children('.row-fluid').last().addClass('last');
  }
}
    
/* Handle sort by */
function handleSortBy(){
  if($('#sortForm li.sort').length){
    $('#sortForm li.sort').click(function(){
      
      var button = $('#sortButton');
      var box = $('#sortBox');
      
      $('#sortButton .name').html($(this).html());
      
      button.removeClass('active');
      box.hide().parent().removeClass('open');
    });
  }
}
    
/* Handle dropdown box */
function handleDropdown(){
  if($('.dropdown-toggle').length){
    $('.dropdown-toggle').parent().hover(function (){
      if(touch == false && getWidthBrowser() > 767 ){
        $(this).find('.dropdown-menu').stop(true, true).slideDown(300);
      }
    }, function (){
      if(touch == false && getWidthBrowser() > 767 ){
        $(this).find('.dropdown-menu').hide();
      }
    });
  }
  
  $('nav .dropdown-menu').each(function(){
    $(this).find('li').last().addClass('last');
  });
  
  $('.dropdown').on('click', function() {
      if(touch == false && getWidthBrowser() > 767 ){
        var href = $(this).find('.dropdown-link').attr('href');
        window.location = href;
    }
  });
  
  $('.cart-link').on('click', function() {
      if(touch == false && getWidthBrowser() > 767 ){
        var href = $(this).find('.dropdown-link').attr('href');
        window.location = href;
    }
  });
}
    
/* Handle collection tags */
function handleCollectionTags(){
  if($('#collection_tags').length){
    $('#collection_tags').on('change', function() {
      window.location = $(this).val();
    });
  }
}


/* Handle when window resize */
$(window).resize(function() {
  
  
  /* reset menu with condition */
  if(touch == true || getWidthBrowser() < 1024){
    if($('#top').hasClass('on')){
      $('#top').prev().remove();
      $('#top').removeClass('on').removeClass('animated');
    }
    
    $('#goGrid').trigger('click');
  }
});

function top_other(){
  $.cookie('topother', 'true', { expires: 1});
  $('.top-other').hide();
}

/* handle when window loaded */
$(window).load(function() {
  if(touch == false){
    skrollr.init();
  }

});

jQuery(document).ready(function($) {
	 
  /* Cokkies Popup */
  if ($.cookie('mycookie')) {
    // it hasn't been one days yet
  } else {
    $.fancybox(
      $('.newsletter-popup'),
      {
        'autoDimensions'    : false,
        'width'             : 870,
        'height'            : 410,
        'autoSize' : false,
        'transitionIn'      : 'none',
        'transitionOut'     : 'none',
        afterLoad: function(){
          setTimeout( function() {$.fancybox.close(); },500000);
        }
      }
    );
  }
  $.cookie('mycookie', 'true', { expires: 1});
       
  if ($.cookie('topother')) {}
  else{  $('.top-other').show(); }
    
  /*Popup tabs panel on detail page*/
  $('#tabs_detail .fancybox').fancybox({
    'autoDimensions'    : false,
    'width'             : 850,
    'height'            : 'auto',
    'autoSize' : false,

    beforeShow: function(){
      $(".fancybox-skin").css("background-image","none");
      $(".fancybox-skin").css("background-color","#fff");
    }
  }); 
     
  /* SwitchImage */
  $('#product .thumbs a').on('click', function(e) {
    var $this = $(this);
    var parent = $this.parents('.product-image');
    e.preventDefault();
    parent.find('.cloud-zoom-gallery').removeClass('active');
    $this.addClass('active');
    switchImage($(this).attr('href'), null, $('.featured img')[0]);
  });
  
  /* DETECT PLATFORM */
  handleDetectPlatform();
  
  
  /* Handle Animate */
  handleAnimate();
  
  /* Handle Carousel */
  handleCarousel();
  
  /* Handle search box on pc */
  handleBoxSearch();
  
  /* Handle focus */
  handleLogin();
  

  /* Handle scroll to top */
  handleScrollTop();
  
  /* Handle dropdown box */
  handleDropdown();
  
  /* Handle tooltip */
  handleToolTip();
  
  /* Handle Map with GMap */
  handleMap();
  
  /* Handle sidebar */
  handleSidebar();
  
  /* Handle zoom for product image */
  alwaysUpdateZoom();
  
  /* Handle quantity */
  handleQuantity();
  
  /* Handle product thumbs */
  if(touch){
    updateScrollThumbs();
  }
  else{
    
  }

  /* Handle sort by */
  handleSortBy();
     
     
  /* Handle grid - list */
  handleGridList();
  
  /* Handle collection tags */ 
  handleCollectionTags();
     
  $('.dropdown-menu').on(clickEv, function (e) {
    e.stopPropagation();
  });
  $('.dropdown-menu').on('click', function (e) {
    e.stopPropagation();
  });
  $('.btn-navbar').on('click', function() {
    return true;
  });
   
  
});