/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    // All pages
    'common': {
      init: function() {
        var scrollFunction = function() { $(window).scrollTop(0); };
        // Begin hero scroll button.
        var controller = null;

        function setupPostAnimationAndFade() {
          $(window).on('scroll resize', function() {
            var posts = $('.post-wrapper .post');
            if (posts.length == 0) {
              return;
            }
            var currScroll = Math.max($(window).scrollTop(), $(document).scrollTop()),
              windowHeight = $(window).height(), // Needs to be here because window can resize
              overScroll = Math.ceil(windowHeight*.20),
              treshhold = (currScroll + windowHeight) - overScroll,
              stemWrapper = $('.stem-wrapper'),
              halfScreen = $(window).height() / 2,
              scrollSplit = currScroll + halfScreen;

            posts.removeClass('active')
            posts.each(function() {
              var post = $(this),
                postScroll = post.offset().top

              if(postScroll > treshhold) {
                post.addClass('hidden');
              } else {
                post.removeClass('hidden');
              }

              if(scrollSplit > postScroll) {
                // Add active class to fade in
                post.addClass('active');

                // Get post color
                var color = post.data('stem-color') ? post.data('stem-color') : null,
                  allColors = 'color-pink color-orange'

                stemWrapper.removeClass(allColors);

                if(color !== null) {
                  stemWrapper.addClass('color-' + color);
                }
              }
            });
          });
        }

        function makeController() {
          // If it's not visible, don't create a scene.
          if ($('#trigger1').length == 0) {
            return null;
          }
          var controller = new ScrollMagic.Controller();

          new ScrollMagic.Scene({triggerElement: "#trigger1", duration: 300})
                  .setPin("#pin1")
                  .triggerHook('0')
                  // .addIndicators({name: "1 (duration: 300)"}) // add indicators (requires plugin)
                  .addTo(controller);

          new ScrollMagic.Scene({triggerElement: "#trigger1", offset: 100})
                  .setClassToggle(".project-intro-image", "scrolled")
                  .triggerHook('0') // add class toggle
                  // .addIndicators() // add indicators (requires plugin)
                  .addTo(controller);
          new ScrollMagic.Scene({triggerElement: "#trigger1", offset: 100})
                  .setClassToggle(".project-intro-text p", "scrolled")
                  .triggerHook('0') // add class toggle
                  // .addIndicators() // add indicators (requires plugin)
                  .addTo(controller);
          new ScrollMagic.Scene({triggerElement: "#trigger1", offset: 100})
                  .setClassToggle(".project-intro-text h1", "scrolled")
                  .triggerHook('0') // add class toggle
                  // .addIndicators() // add indicators (requires plugin)
                  .addTo(controller);
          new ScrollMagic.Scene({triggerElement: "#trigger1", offset: 100})
                  .setClassToggle(".project-intro-text .section-divider", "scrolled")
                  .triggerHook('0') // add class toggle
                  // .addIndicators() // add indicators (requires plugin)
                  .addTo(controller);
          new ScrollMagic.Scene({triggerElement: "#trigger1", offset: 100})
                  .setClassToggle(".icon-down-wrapper", "scrolled")
                  .triggerHook('0') // add class toggle
                  // .addIndicators() // add indicators (requires plugin)
                  .addTo(controller);

          return controller;
        }

        function getInitialCardPosition(wrapper$, content$) {
          var gridItem$ = wrapper$.parent();
          var offset = gridItem$.position();

          // Clear the transform so the size calculation is correct.
          content$.css({
            transition: 'none',
            transform: 'none'
          });
          /* Set the initial state to make it overlap the current item. */
          var initialPosition = {
            /* Offsets from the relative parent to match it to the clicked image. */
            top: (offset.top || 0) + parseInt(gridItem$.css('padding-top'), 10),
            left: (offset.left || 0) + parseInt(gridItem$.css('padding-left'), 10),
            height: content$.css('height'),
            width: content$.css('width')
          };
          // Reset the styles.
          content$.css({
            transition: '',
            transform: ''
          });

          return initialPosition;
        }

        function getFinalCardPosition(grid$, placeholder$) {
          var gridOffset = grid$.offset();
          return {
            /* Offsets from the relative parent to set it at the upper left corner. */
            top: -(gridOffset.top - scrollY),
            left: -(gridOffset.left - scrollX),
            height: document.documentElement.clientHeight,
            width: document.documentElement.clientWidth
          };
        }

        function closePage() {
          $('#main-page-content-wrapper').removeClass('show-project');
          scrollFunction.call();
          if (controller) {
            controller.destroy(true);
            controller = null;
          }
          $('#project-page-content').empty();
          // Trigger page updates, now that it's visible again.
          $(window).resize();

          var placeholder$ = $('.page-card-grid .placeholder');

          // No placeholder, nothing to close.
          if (!placeholder$.length) {
            return;
          }

          var wrapper$ = $('.page-card-grid .page-card-target.active');
          var grid$ = wrapper$.parents('.page-card-grid');
          placeholder$.css('transitionDuration', '0s');
          placeholder$.css(getFinalCardPosition(grid$, placeholder$));
          var content$ = wrapper$.find('.page-card-content').addBack('.page-card-content');

          setTimeout(function() {
            placeholder$.css('transitionDuration', '');
            placeholder$.css(getInitialCardPosition(wrapper$, content$));

            placeholder$.removeClass('page-animate-in');

            function destroyPlaceholderFn(e) {
              if (e.target == e.currentTarget && e.originalEvent.propertyName == 'transform') {
                var grid$ = wrapper$.parents('.page-card-grid');
                placeholder$.off('transitionend', destroyPlaceholderFn);
                grid$.removeClass('active');
                wrapper$.removeClass('active');
                window.setTimeout(function() {
                  placeholder$.remove();
                }, 0);
              }
            }

            placeholder$.on('transitionend', destroyPlaceholderFn);
          }, 20);
        }

        function updateIntroImageRatio() {
          var windowWidth = $( window ).width();
          var windowHeight = $( window ).height();
          var windowRatio = windowWidth/windowHeight;
          $('.project-intro').css('width', windowWidth);
          $('.scrollmagic-pin-spacer').css('width', windowWidth);
          $('.project-intro-image').css('width', windowWidth);
          $('.project-intro-image').css('height', windowHeight);

          $('.project-intro-text').css('width', windowWidth/2);
          $('.project-intro-text').css('height', windowHeight/2);

          var imageHeight = $('.project-intro-image img').height();
          var imageWidth = $('.project-intro-image img').width();
          var imageRatio = imageWidth/imageHeight;

          if (windowRatio <= imageRatio){
            $('.project-intro-image img').css('height','100%');
            $('.project-intro-image img').css('width','auto');
          } else {
            $('.project-intro-image img').css('width','100%');
            $('.project-intro-image img').css('height','auto');
          }
        }

        function update() {
          $('.back-to-top').off('click').on('click', function (e) {
              e.preventDefault();
              $('html,body').animate({
                  scrollTop: 0
              }, 700);
          });

          $('.image-slider.mobile').slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            responsive: [
              {
                breakpoint: 767,
                settings: {
                  slidesToShow: 2,
                  slidesToScroll: 1
                }
              },
              {
                breakpoint: 550,
                settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1
                }
              }
              // You can unslick at a given breakpoint now by adding:
              // settings: "unslick"
              // instead of a settings object
            ]
          });

          $('.image-slider.full').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
          });

          $('#project-page-content-wrapper .close-icon').off('click').on('click', function(e) {
            var path = $(e.currentTarget).data('pagePath');
            history.pushState({
              path: path,
              isRoot: true,
              scrollTop: $(window).scrollTop()
            }, "", path);
            closePage();
          });

          $('#project-page-content-wrapper .icon-down-wrapper').off('click').on('click', function (e) {
              e.preventDefault();
              $('html, body').animate({
                  // Just past the scroll magic trigger.
                  scrollTop: $('#trigger1').offset().top + 100
              }, 700);
          });

          $('.post-wrapper .post .stem-overlay .icon').off('click').on('click', function(e) {
            e.preventDefault();

            var icon = $(this),
              post = icon.closest('.post'),
              postTopOffset = post.offset().top,
              postHeight = post.height(),
              halfScreen = $(window).height() / 2,
              scrollTo = postTopOffset - halfScreen + (postHeight/2);

            $('html, body').animate({
              scrollTop: scrollTo
            }, 750);
          });

          function hideBlocks(blocks, offset) {
            blocks.each(function(){
              if ($(this).offset().top > $(window).scrollTop()+$(window).height()*offset ) {
                $(this).find('.timeline-img, .timeline-content').addClass('is-hidden');
              }
            });
          }

          function showBlocks(blocks, offset) {
            blocks.each(function(){
              if($(this).offset().top <= $(window).scrollTop()+$(window).height()*offset
                  && $(this).find('.timeline-img').hasClass('is-hidden')) {
                $(this).find('.timeline-img, .timeline-content').removeClass('is-hidden').addClass('bounce-in');
              }
            });
          }

          var timelineBlocks = $('.timeline-block'),
            offset = 0.8;
          if (timelineBlocks.length > 0) {
            // Set on a delay in order to allow the page to render.
            window.setTimeout(function() {
              //hide timeline blocks which are outside the viewport
              hideBlocks(timelineBlocks, offset);

              //on scolling, show/animate timeline blocks when enter the viewport
              $(window).on('scroll.timeline', function(){
                (!window.requestAnimationFrame)
                  ? setTimeout(function(){ showBlocks(timelineBlocks, offset); }, 100)
                  : window.requestAnimationFrame(function(){ showBlocks(timelineBlocks, offset); });
              });
            }, 200);
          } else {
            $(window).off('scroll.timeline');
          }

          // Trigger the setup.
          $(window).resize();
          $(window).scroll();
        }

        function createPlaceholder(wrapper$) {
          var content$ = wrapper$.find('.page-card-content').addBack('.page-card-content');
          var clone$ = content$.clone();

          var back$ = $(document.createElement('div'));
          back$.addClass('back');
          back$.html('&nbsp;');

          var grid$ = wrapper$.parents('.page-card-grid');
          var placeholder$ = $(document.createElement('div'));
          placeholder$.addClass('placeholder');

          placeholder$.append(clone$);
          placeholder$.append(back$);

          placeholder$.css(getInitialCardPosition(wrapper$, content$));

          return placeholder$;
        }

        function maybeInitProjectPagePlaceholder() {
          if ($('#main-page-content-wrapper.show-project').length == 0) {
            return;
          }

          var path = location.pathname.slice(0, -1);
          var wrapper$ = $('[data-page-path*="' + path + '"]');

          if (wrapper$.length == 1) {
            var placeholder$ = createPlaceholder(wrapper$);
            placeholder$.addClass('page-animate-in');

            var grid$ = wrapper$.parents('.page-card-grid');
            wrapper$.addClass('active');
            grid$.addClass('active');
            grid$.append(placeholder$);

            scrollFunction = function() {
              var scrollElement = $('html, body');
              // Try to roughly center it in the viewport.
              scrollElement.scrollTop(wrapper$.offset().top - innerHeight / 2);
            };
          }
        }

        function initMainPage() {
          window.history.replaceState({
            path: window.location.href,
            isRoot: true,
            scrollTop: 0
          }, "", window.location.href);

          maybeInitProjectPagePlaceholder();

          // Begin MixItUp filtering for projects.
          var containerEl = document.querySelector('.portfolio-cards');
          var mixer = mixitup(containerEl, {
            load: {
                filter: '.featured'
            }
          });
          // End MixItUp filtering for projects.
          // Add hoverdir to project cards.
          $(' #portfolio-cards > .mix > .content-wrapper ').each( function() { $(this).hoverdir(); } );

          // Begin hero scroll button.
          $('.intro-scroll-wrapper').on('click', function (e) {
            e.preventDefault();
            var scrollLength = $('.jumbotron-wrapper').height();
            $('html,body').animate({
                scrollTop: scrollLength
            }, 700);
          });
          // End hero scroll button.

          // Begin intro fade animation.
          //update this value if you change this breakpoint in the style.css file (or _layout.scss if you use SASS)
          var MQ = 767;
          var introHidden = false;

          //bind the scale event to window scroll if window width > $MQ (unbind it otherwise)
          function setUpIntroAnimation(){
            if($(window).width()>= MQ) {
              $(window).off('scroll.animateIntro resize.animateIntro')
                  .on('scroll.animateIntro resize.animateIntro', function(){
                    window.requestAnimationFrame(animateIntro);
                  });
            } else {
              introSection = $('#jumbotron-content').css({
                '-moz-transform': 'none',
                '-webkit-transform': 'none',
                '-ms-transform': 'none',
                '-o-transform': 'none',
                'transform': 'none',
                'opacity': 1
              });
              $(window).off('scroll.animateIntro resize.animateIntro');
            }
          }
          //assign a scale transformation to the introSection element and reduce its opacity
          function animateIntro () {
            var introSection = $('#jumbotron-content'),
              introSectionHeight = introSection.height(),
              //change scaleSpeed if you want to change the speed of the scale effect
              scaleSpeed = 0.3,
              //change opacitySpeed if you want to change the speed of opacity reduction effect
              opacitySpeed = 1;

            var scrollPercentage = ($(window).scrollTop()/introSectionHeight).toFixed(5),
              scaleValue = 1 - scrollPercentage*scaleSpeed;
            //check if the introSection is still visible
            if(!introHidden || scrollPercentage < 1) {
              introHidden = scrollPercentage >= 1;
              introSection.css({
                '-moz-transform': 'scale(' + scaleValue + ') translateZ(0)',
                '-webkit-transform': 'scale(' + scaleValue + ') translateZ(0)',
                '-ms-transform': 'scale(' + scaleValue + ') translateZ(0)',
                '-o-transform': 'scale(' + scaleValue + ') translateZ(0)',
                'transform': 'scale(' + scaleValue + ') translateZ(0)',
                'opacity': 1 - scrollPercentage*opacitySpeed
              });
            }
          }
          // End intro fade animation.

          // Start typing animation.
          $('#typing-animation').typeIt({
            strings: ["UX Designer.", "Problem Solver.", "Creative Thinker.", "Prototyping Queen.", "Seahawks Fan.", "Coffee Addict."],
            speed: 150,
            breakLines: false,
            autoStart: false,
            loop: true,
            startDelay: 8500
          });
          // End typing animation.

          // Begin navbar links.
          $("#main-nav ul li a[href^='#']").on('click', function(e) {
           // prevent default anchor click behavior
           e.preventDefault();

           // store hash
           var hash = this.hash;

           // animate
           $('html, body').animate({
               scrollTop: $(hash).offset().top
             }, 300, function(){

               // when done, add hash to url
               // (default click behaviour)
               window.location.hash = hash;
             });

          });
          // End navbar links.

          // Begin navbar mobile menu toggle.
          $( ".navbar-toggler" ).click(function() {
            if ($(".navbar-collapse").hasClass("show")){
              $("#nav-icon").removeClass("open");
              $("#primary_navigation").removeClass("background");
            } else {
              $("#nav-icon").addClass("open");
              $("#primary_navigation").addClass("background");
            }
          });
          // End navbar mobile menu toggle.

          // Begin navbar sticky offset.
          function updateNavBar() {
            var headroom = nav.data('headroom');
            headroom.offset = nav.offset().top + 40;
            headroom.update();
          }
          var nav = $("#main-nav");
          nav.headroom({
            // Offset set in updateNavBar.
            "tolerance": 5,
            "classes": {
              "initial": "animated",
              "pinned": "slideDown",
              "unpinned": "slideUp"
            }
          });
          var navSticky = new Waypoint.Sticky({
            element: nav[0],
            stuckClass: 'fixed-top',
          });
          // End navbar sticky offset.

          // Begin page navigation handling.
          function loadPage(wrapper$, pagePath) {
            var pageLoaded = false;
            var animationComplete = false;
            var nextScrollFunction = scrollFunction;

            function loadMaybeComplete() {
              if(pageLoaded && animationComplete) {
                update();
                nextScrollFunction();
              }
            }

            if (pagePath) {
              if (controller) {
                controller.destroy(true);
                controller = null;
              }
              $('#project-page-content-wrapper').empty()
                  .load(pagePath + ' #project-page-content', function() {
                    pageLoaded = true;
                    loadMaybeComplete();
                  });
            }

            var placeholder$ = createPlaceholder(wrapper$);

            var grid$ = wrapper$.parents('.page-card-grid');

            grid$.append(placeholder$);
            wrapper$.addClass('active');
            grid$.addClass('active');

            /*
             * Set the new final values after a delay. The delay makes sure the rendering was completed,
             * otherwise the transition wouldn't register for the starting state.
             */
            setTimeout(function() {
              placeholder$.addClass('page-animate-in');
              placeholder$.css(getFinalCardPosition(grid$, placeholder$));
            }, 20);

            function showPageContentFn(e) {
              if (e.target == e.currentTarget && e.originalEvent.propertyName == 'transform') {
                placeholder$.off('transitionend', showPageContentFn);
                var returnScrollTop = $(window).scrollTop();
                scrollFunction = function() { $(window).scrollTop(returnScrollTop); };
                $('#main-page-content-wrapper').addClass('show-project');
                animationComplete = true;
                loadMaybeComplete();
              }
            }

            placeholder$.on('transitionend', showPageContentFn);
          }

          $('.page-card-grid .page-card-target').on('click', function(e) {
            var wrapper$ = $(e.currentTarget);
            var pagePath = wrapper$.data('pagePath');
            history.pushState({
                path: pagePath,
                isRoot: false,
                scrollTop: $(window).scrollTop()
              }, "", pagePath);
            scrollFunction = function() { $(window).scrollTop(0); };
            loadPage(wrapper$, pagePath);
          });

          if (history.scrollRestoration) {
            history.scrollRestoration = 'manual';
          }
          $(window).on('popstate', function(e) {
            var state = e.originalEvent.state;
            if (!state || !state.path) {
              return;
            }

            var returnScrollTop = state.scrollTop;
            scrollFunction = function() { $(window).scrollTop(returnScrollTop); };
            if (!state.isRoot) {
              var wrapper$ = $('[data-page-path="' + state.path + '"]');
              loadPage(wrapper$, state.path);
            } else {
              closePage();
            }
          });
          // End page navigation handling.

          // Allow user to cancel scroll animation by manually scrolling
          $('html, body').on('scroll mousedown DOMMouseScroll mousewheel keyup', function(e) {
            if ( e.which > 0 || e.type === 'mousedown' || e.type === 'mousewheel') {
              $(this).stop();
            }
          });

          setupPostAnimationAndFade();

          setUpIntroAnimation();
          updateNavBar();
          $(window).on('resize', function(){
            setUpIntroAnimation();
            updateNavBar();
            updateIntroImageRatio();

            if ($( window ).width() < MQ && controller != null){
              controller.destroy(true);
              controller = null;
            } else if ($( window ).width() >= MQ && controller == null){
              controller = makeController();
            }
          });

          var scrollHistoryDebounceId;
          $(window).on('scroll', function() {
            if (scrollHistoryDebounceId) {
              clearTimeout(scrollHistoryDebounceId);
            }
            scrollHistoryDebounceId = window.setTimeout(function() {
              var currentState = history.state;
              currentState.scrollTop = $(window).scrollTop();
              history.replaceState(currentState, '', currentState.path);
              scrollHistoryDebounceId = undefined;
            }, 500);
          });
        } // End initMainPage.
        initMainPage();

        update();
      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
      }
    },
    // Home page
    'home': {
      init: function() {

      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
    // About us page, note the change from about-us to about_us.
    'about_us': {
      init: function() {
        // JavaScript to be fired on the about us page
      }
    }
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
