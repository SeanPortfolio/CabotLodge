(function(w, d, $){
  
  var REQUEST_URL = '/requests/service';

  // DEFINE GLOBAL FUNCTIONS, VARIABLES & CONSTANTS
  /**
   * @param string triggerElm event listener/trigger
   * @param string event the DOM event
   * @param hiddenElement selector the hidden element
   *   
   * @return object
   */
  w.displayHiddenElement = function(triggerElm, event, hiddenElement) {
    $(triggerElm).on(event, function(){
      $(hiddenElement).show();
    })
  };
  
  /**
   * This function use Slick Slider plugin to create slideshow
   * http://kenwheeler.github.io/slick/
   *
   * @param string selector Selector of a element to initialize slideshow on
   *
   * @param object options Object of config
   
   * @return object
   */
  w.initSlickSlideshow = function(selector, options, slideshowSpeed) {
    
    var defaultOptions = {
      dots: false,
      arrows: true,
      autoplay: true,
      infinite: true,
      speed: 500,
      autoplaySpeed: slideshowSpeed,
      fade: true,
      cssEase: 'linear',
      prevArrow: '<a href="#" class="slider__nav slider__nav--prev">'+
      '<i class="fa fa-angle-left"></i>'+
      '</a>',
      nextArrow: '<a href="#" class="slider__nav slider__nav--next">'+
      '<i class="fa fa-angle-right"></i>'+
      '</a>'
    };

    options = $.extend(true, defaultOptions, options);
    
    var slider = $(selector).slick(options);
    
    return slider;
  };

  /**
   * This function use Slick Slider plugin to create Carousel
   * http://kenwheeler.github.io/slick/
   *
   * @param string selector Selector of a element to initialize Carousel on
   *
   * @param object options Object of config
   
   * @return object
   */
  w.initSlickCarousel = function(selector, options) {
    
    if (!selector) {
      selector = '.showcase__carousel';
    }
    
    var defaultOptions = {
      dots: false,
      arrows: true,
      autoplay: false,
      infinite: true,
      speed: 300,
      //fade: true,
      //centerMode: true,
      lazyLoad: 'ondemand',
      prevArrow: '<a href="#" class="carousel__nav carousel__nav--prev">'+
      '<i class="fa fa-angle-left"></i>'+
      '</a>',
      nextArrow: '<a href="#" class="carousel__nav carousel__nav--next">'+
      '<i class="fa fa-angle-right"></i>'+
      '</a>',
      mobileFirst:true,
      adaptiveHeight:false,
      responsive: [
        {
            breakpoint: 340,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                
            }
        }, {
            breakpoint: 590,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
            }
        },{
            breakpoint: 991,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
            }
        },{
            breakpoint: 1200,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
            }
        }
    ]
    };

    var self = this;

    options = $.extend(true, defaultOptions, options);
    
    var slider = $(selector).slick(options);
    
    return slider;
    
  };
  
  /**
   * This function use Pikaday plugin to create datepicker on input field
   * https://github.com/dbushell/Pikaday
   *
   * Dependancy - Moment.js (http://momentjs.com/)
   *
   * @param string selector Selector of a input field on which
   * datepicker will be initialized
   *
   * @param object options Object of config
   
   * @return object
   */
  w.initDatepicker = function(selector, options) {
    
    if (typeof selector !== 'string') {
      console.error('selector is require for initDatepicker method');
      return false;
    }
    
    var defaults = {
      format: 'DD/MM/YYYY',
      minDate: new Date()
    };
    
    options = $.extend(true, defaults, options);
    
    $(selector).each(function(i, input){
      options.field = input;
      
      $(input).attr('autocomplete', 'off');
      
      var picker = new Pikaday(options);
      
    });
    
  };
  
  /**
   * Toggle the main navigation on mobile device when toggle button is clicked.
   *
   * @return void
   */
  
  function togglePrimaryNav() {
    
    var toggleBtnSel        = '.mobile__btn',
        toggleBtnActiveCls  = 'mobile__btn--active',
        targetActiveCls     = 'header__nav--active',
        currentHashValue    = window.location.hash,
        menuActiveBlock     = 'menu-active',
        menuTriggerElmBlock = 'sub-nav-trigger',
        menuElmSel          = '.header__nav-link, .header__nav-sub-menu-link';
        
    // if (currentHashValue == $(toggleBtnSel).attr('href')) {
    //   $(toggleBtnSel).addClass(toggleBtnActiveCls);
    // }
    
    // ADD/REMOVE MENU TOGGLE BLOCK FROM MENU ITEMS
    
    var toggleMenuBlock = function () {
      
      var menuItems = $(menuElmSel);
      
      if ($(window).width() < 992) {
        $(menuElmSel).addClass(menuTriggerElmBlock);
      } else if($(menuElmSel).hasClass(menuTriggerElmBlock)) {
        $('.'+menuTriggerElmBlock).removeClass(menuTriggerElmBlock);
      }
      
    };
    
    toggleMenuBlock();
    
    $(window).on('resize', function(){
      toggleMenuBlock();
    });

    $(d).on('click', toggleBtnSel, function(e){
      e.preventDefault();
      
      var self      = $(this),
          targetSel = self.attr('href'),
          hashVal   = '';
          
      if (!self.hasClass(toggleBtnActiveCls)) {
        
        $('body').addClass('no-scroll');
        self.addClass(toggleBtnActiveCls);
        $(targetSel).addClass(targetActiveCls);
        
        hashVal = targetSel;
        
      } else {
        
        $('body').removeClass('no-scroll');
        self.removeClass(toggleBtnActiveCls);
        $(targetSel).removeClass(targetActiveCls);
      }
      
      // window.location.hash = hashVal;
      
    // }).on('click', '.'+menuTriggerElmBlock, function(e) {
    //   e.preventDefault();
      
    //   var self = $(this);
      
    //   self.parents('li').addClass(menuActiveBlock);
      
    // }).on('click', '.header__nav-sub-menu-back', function(e){
    //   e.preventDefault();
    //   var self = $(this);
      
    //   self.closest('.'+menuActiveBlock).removeClass(menuActiveBlock);
    // });
    
    }).on('click', '.'+menuTriggerElmBlock, function(e) {
      e.preventDefault();
      
      var self = $(this);
      
      console.log('test');

      if (!self.parents('li').hasClass(menuActiveBlock)) {
        self.parents('li').addClass(menuActiveBlock);
      } else{
        self.parents('li').removeClass(menuActiveBlock);
      }

    });

  }
  
  /**
   * This function Hide/Show the taget element.
   *
   * @return void
   */
  
  function toggleElement() {
    
    var toggleBtnSel = '.toggle-elm';
        
    $(d).on('click', toggleBtnSel, function(e){
      e.preventDefault();
      
      var self         = $(this),
          targetSel    = self.attr('href'),
          btnActiveCls = self.attr('data-active-block');
          
          self.toggleClass(btnActiveCls);
          $(targetSel).toggleClass('hidden');
      
    });
    
  }
  
  
  /**
   * When element clicked page is scrolled to the top of given target
   *
   * @param string selector Selector of a element which is clicked
   *
   * @param string attr Selector of a target element defined as attribute value.
   *                    If left empty href will be default attribute
   
   * @return void
   */
  function triggerPageScroll(selector, attr) {
    
    if (!attr) attr = 'href';
    
    $(d).on('click', selector, function(e){
      e.preventDefault();
      
      var self      = $(this),
          targetSel = self.attr(attr);
          
      if (targetSel === '#') {
        
        $('html, body').delay(150).animate({
            scrollTop: 0
          }, {
            duration: 300, 
            easing: 'swing'
          }
        );
        
      } else {
        var target = $(targetSel);
        
        if (target.length > 0) {
          var scrollPoint = (target.offset().top - 150);
          
          $('html, body').delay(150).animate({
              scrollTop: scrollPoint
            }, {
              duration: 300, 
              easing: 'swing'
            }
          );
          
        }
            
      }
      
    });
    
  }

  /**

   * When element clicked a popup will show galleries of photos and videos
   *
   * @param string selector Selector of a element which is clicked
   *
   * @param string attr Selector of a target element defined as attribute value.
   *                    If left empty href will be default attribute
   
   * @return void
   */
  w.initSwipeBox = function(selector, options) {

    if (typeof selector !== 'string') {
      console.error('selector is required for initSwipeBox');
      return false;
    }

    var defaults = {
      selector: selector
    };

    options = $.extend(true, defaults, options);

    $(selector).swipebox(options);

  };

  
  
  /**
   * This function use Slick Slider plugin to create Gallery Slider
   * http://kenwheeler.github.io/slick/
   *
   * @param string selector Selector of a element to initialize Gallery Slider on
   *
   * @param object options Object of config
   
   * @return object
   */
  w.initSlickSlider = function(selector, options) {
    
    if (!selector) {
      selector = '.gallery__carousel';
    }
    
    var defaultOptions = {
      dots: false,
      infinite: true,
      speed: 300,
      slidesToShow: 1,
      slidesToScroll: 1,
      prevArrow: '<div class="gallery__carousel__prev"><i class="fa fa-angle-left"></i></div>',
      nextArrow: '<div class="gallery__carousel__next"><i class="fa fa-angle-right"></i></div>',
      mobileFirst: true,
      adaptiveHeight: false,
      responsive: [
          {
              breakpoint: 320,
              settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1,
              }
          }, {
              breakpoint: 768,
              settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1,
              }
          },
          {
              breakpoint: 991,
              settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1,
              }
          }
      ]
    };
    
    options = $.extend(true, defaultOptions, options);
    
    var slider = $(selector).slick(options);
    
    return slider;
    
  };

  /**
   * This function use Shuffle plugin to shuffle Gallery
   * https://vestride.github.io/Shuffle/
   *
   * @param string selector Selector of a element to initialize Gallery Shuffle on
   * @return object
   */

  w.initShuffle = function(selector){
    var jElm = $(selector),
    ths = this;

    if(jElm.length){
        jElm.shuffle({
            group:'all',
            itemSelector:'figure',
            speed:450,
            delimeter: ','
        });

        $('.shuffle-trigger').on('click', function(e) {

            e.preventDefault();

            console.log($(this).attr('data-group'));

            jElm.shuffle( 'shuffle', $(this).attr('data-group') );

            $('.shuffle-trigger').removeClass('active');
            $(this).addClass('active');
            
        });

        initSwipeBox('.filtered');
    }
  };

   /**
   * A selector will be an anchor tag and will provide the href value which will be the id of the content
   *
   * @param string selector Selector of a element which is the anchor tag href value
   *
   * @return void
   */
  w.initScrollToSection = function(selector) {

    $(selector).click(function(e) {
      e.preventDefault();

      var elemId    = $(this).attr('href'),
          offset    = $(elemId).offset().top,
          newOffset = parseInt(offset) - 120;

        $('html, body').animate({
            scrollTop: newOffset
        }, 1500);

    });

  };

  /**
   * A div will show and hide when the selector is toggled
   *
   * @param string selector Selector of a element which is the link to toggle
   * @param string selector Element of a element which is the hidden div to toggle
   *
   * @return void
   */
  w.initFolded = function(selector, element) {

    $(selector).click(function(e) {
      e.preventDefault();

      var ths         = $(this),
          selectorTxt = $(element).is(':visible') ? ths.data('more') : ths.data('less'),
          folder      = ths.closest('div').find(element);

      folder.toggleClass('hide');
      ths.text(selectorTxt);
    });

  };

  /**
   * Stop the scroll of an element in a specific position
   *
   * @param string Selector, the floating element
   * @param string Bottom, the bottom element were the floating element will stop
   * @param string Top, the top position of the floating element
   *
   * @return void
   */
  w.initStopScroll = function(selector, bottom, top){
    var $this = $(selector);
      if ($this.length == 1) {

        var $window      = $(window),
          $bottomElement = $(bottom).position(),
          $pos           = $bottomElement.top - 500;

        $window.scroll(function (e) {
          if ($window.scrollTop() > $pos) {
            $this.css({
              position: 'absolute',
              top: $pos
            });
          } else {
            $this.css({
              position: 'fixed',
              top: top
            });
          }
        });
      }
  };

   /* When element clicked page photo galley popup is opened
   *
   * @param string selector Selector of a element which is 
   * clicked
   
   * @return void
   */
  function initPageGallery(selector) {

    if (typeof selector !== 'string') {
      console.error('selector is required for initPageGallery');
      return false;
    }

    var slideElements = $('.banner-gallery__slide');

    var slides = [];

    slideElements.each(function(i, slideElement){
      slides.push({
        href: $(slideElement).attr('href')
      });      
    });

    $(d).on('click', selector, function(e){
      e.preventDefault();

      $.swipebox(slides);

    });

  }

  /* When element clicked page photo galley popup is opened
   *
   * @param string selector Selector of a element which is 
   * clicked
   
   * @return string
   */

  w.initNewsletterSignup = function(selector) {
        var jElm = $(selector);

        if(jElm.length)
        {
                $('.newsletter--input').keypress(function (e) {

                  if (e.which == 13) {
                    //e.preventDefault();

                    var emailAddress =  $.trim($('.newsletter--input').val()),
                    msg = '';

                    if(emailAddress && emailAddress !== 'TYPE YOUR EMAIL HERE')
                    {
                        var emailRegex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                        
                        if(emailRegex.test(emailAddress))
                        {
                            $('.newsletter-status').show();    
                            $.post(REQUEST_URL, 'action=sign-up&email='+emailAddress, function(response){
                              
                                if(response.msg)
                                {
                                     $(".form__input-grp").hide();
                                     $('.form--newsletter__msg').html(response.msg);  
                                     $('.form--newsletter__msg').fadeIn(400);
                                }

                                if(response.isValid)
                                {
                                    setTimeout(function(){
   
                                        $('.newsletter--input').val('');
                                        
                                    }, 5000);
                                }

                                $('.newsletter-status').hide();    
                                return false;

                            }, 'json');
                        }
                        else
                        {
                            $('.form--newsletter__msg').html('Your email is not valid.');  
                            $(".form--newsletter__msg").fadeIn(400);
                            $(".newsletter--input").addClass("error");    
                        }
                    }
                    else
                    {
                        $('.form--newsletter__msg').html('Your email is empty.');  
                        $(".form--newsletter__msg").fadeIn(400);
                        $(".newsletter--input").addClass("error");    
                    }

                    return false;   
                  }
                });
        }
    };

  /* Activate white header if not homepage or if scrolled
   *
   * @return none
   */

  w.initHeaderActivate = function() {
      var ths = this;

      //Activate the white header on load
      if($('.general-page').length == 1){
          $('.general-page .header').addClass("header--light header--fadein");
      }

      // Activate the white header if viewport is not on top
      if($('.home-page').length == 1){
          if ($(window).scrollTop() > 100) {
              $('.home-page .header').addClass("header--light header--fadein");
          }
      }

  };

  /* Activate light header if scrolled only on homepage
   *
   * @return none
   */

  w.headerScroll = function () {
      var ths = this;

      $(window).scroll(function () {
          
          if ($('.home-page').length) {
              if ($(window).width() < 991) {
                  $('.home-page .header').addClass("header--light animate--fade");
              } else {
                  if ($(this).scrollTop() > 100) {
                      $('.home-page .header').addClass("header--light animate--fade");
                  } else {
                      $('.home-page .header').removeClass("header--light animate--fade");
                  }
              }
          }
      });
  };

  w.initSlickReview = function (selector, options) {

    var defaultOptions = {
      dots: true,
      arrows: false,
      autoplay: true,
      infinite: true,
      speed: 200,
      fade: true,
      easing: 'swing',
      pauseOnHover: true,
      prevArrow: false,
      lazyLoad: 'progressive',
      nextArrow: false

    };
    
    options = $.extend(true, defaultOptions, options);
    
    var review = $(selector).slick(options);
    
    return review;
  }

  w.quickLinksHomeHover = function () {

    $('.expand-ql__item').bind('mouseover',function() {
        $('.expand-ql__item').addClass('expand-ql__darken');
        $(this).removeClass('expand-ql__darken');
    });
    
    $('.expand-ql__item').bind('mouseleave', function() {
        $('.expand-ql__item').removeClass('expand-ql__darken');
        
    });
    
  }

  w.quicklinkAnimationRows = function (elm) {

    var w        = $(window),
        jElm         = $(elm),
        totalCount   = jElm.length, 
        scrollPoint  = w.scrollTop(),
        windowHeight = w.height();

        jElm.each(function(i, elm){

            i++;

            var jElm        = $(elm),
                jElmStart   = jElm.offset().top - ( windowHeight/1.5 ),
                scrollPoint = $(window).scrollTop();

            if( scrollPoint > jElmStart )
            {
                jElm.addClass('active');
                
            }
    });
    
  }

  // DEFINE APP OBJECT & ITS CONSTRUCTOR METHOD
  w.app = {};
  
  w.app.init = function() {

    var slideshowSpeed = jsVars.globals.slideshowSpeed;

    

    togglePrimaryNav();
    
    toggleElement();

    initHeaderActivate();
    
    headerScroll();

    quickLinksHomeHover();

    quicklinkAnimationRows('.experence-desktop');

    initNewsletterSignup('.form--newsletter');
    
    initSlickSlideshow('.banner__slider__inner', '', slideshowSpeed);
    
    initSlickCarousel('.showcase__carousel');

    initSwipeBox('.showcase__carousel');

    initSlickReview('.review-item--slick');
    
    triggerPageScroll('.footer__lower__scroll-btn');

    initSwipeBox('.showcase__item');

    initPageGallery('.banner__gallery--btn');    
    
    initDatepicker('.has-datepicker');

    initSlickSlider('.gallery__carousel');

    initShuffle('#shuffle');

    initScrollToSection('.banner__scroll-to');  

    initFolded('.folded__link', '.folded__content');

    initStopScroll('.sidebar', '.bottom__content', 70);

    displayHiddenElement('.banner__photo-info__icon', 'click', '.banner__photo-info__text');
    
    initGoogleMap('map-canvas', jsVars.map);

    $(window).on('scroll',function(){
      quicklinkAnimationRows('.experence-desktop');
  });

  };
  
})(window, document, jQuery);

var tag = document.createElement('script');

tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

function onYouTubeIframeAPIReady() {
    // General
    var videoDOMID = 'ytplayer';
    var videoDOM = $('#'+videoDOMID);
    var youtubeVideoID = videoDOM.data('id');
    var autoplayFlag = parseInt(videoDOM.data('autoplay'));
    var mobilePlayButton = $('.play-video-btn');

    if (videoDOM && youtubeVideoID) {
        var player;
        player = new YT.Player(videoDOMID, {
            videoId: youtubeVideoID,
            playerVars: {
                autoplay: autoplayFlag,
                controls: false,
                rel: false,
                showinfo: false,
                modestbranding: true,
                loop: true,
                fs: false,
                cc_load_policy: true,
                iv_load_policy: 3,
                autohide: false,
                playlist: youtubeVideoID
            },
            events: {
                'onReady': onPlayerReady
            }
        });
    }
}

function onPlayerReady(event) {
    var parentElm = $('.banner--has-overlay');
    var videoDOM = $('#ytplayer');
    var autoplayFlag = parseInt(videoDOM.data('autoplay'));
    var mobilePlayButton = $('.play-video-btn');
    var frameWidth  = parentElm.width();
    var frameHeight = parentElm.height();

    console.log("Player ready");
    event.target.mute();

    if(autoplayFlag == 1) {
        console.log("Play video");
        event.target.playVideo();
    }

    // Mobile
    mobilePlayButton.on("click", function () {
        event.target.playVideo();
        $('.play-video-btn').hide();
    })

    newFrameWidth = frameHeight*1.77;
    if (newFrameWidth < frameWidth) {
      newFrameWidth   = frameWidth;
      newFrameHeight = ( frameWidth*0.565 );
    } else { 
      newFrameHeight = frameHeight;
    }

    $('.banner__video').css({
        'height': newFrameHeight,
        'width': newFrameWidth
    });
}