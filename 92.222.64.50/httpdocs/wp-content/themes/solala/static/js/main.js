jQuery(function($) {
    "use strict";

    var solala = window.solala || {};

    solala.mainFunction = function() {
        if ($('.back-to-top').length) {
            var scrollTrigger = 100; // px
            var backToTop = function() {
                var scrollTop = $(window).scrollTop();
                if (scrollTop > scrollTrigger) {
                    $('.back-to-top').addClass('show');
                } else {
                    $('.back-to-top').removeClass('show');
                }
            };

            backToTop();

            $(window).on('scroll', function() {
                backToTop();
            });

            $('.back-to-top').on('click', function(e) {
                e.preventDefault();
                $('html,body').animate({
                    scrollTop: 0
                }, 700);
            });
        }

        // Button Hover
        // if($('.slz-btn').length) {
        //     $('.slz-btn').each(function(){
        //         $(this)
        //         .mouseenter(function(){
        //             $(this).css('background-position-x', $(this).outerWidth() - 0 );
        //         })
        //         .mouseleave(function(){
        //             $(this).css('background-position-x', 0);
        //         });
        //     });

        //     $('.wpb_revslider_element .slz-btn').each(function(){ 
        //         $(this)
        //         .mouseenter(function(){
        //             $(this).css('transition', 'all 0.5s ease');
        //             $(this).css('-webkit-transition', 'all 0.5s ease');
        //             $(this).css('-ms-transition', 'all 0.5s ease');
        //             $(this).css('-o-transition', 'all 0.5s ease');
        //             setTimeout(function() {
        //                 $(this).css('background-position-x', $(this).outerWidth() - 0 );
        //             }, 300);
        //         })
        //         .mouseleave(function(){
        //             $(this).css('background-position-x', 0);
        //             setTimeout(function() {
        //                 $(this).css('transition', 'none');
        //                 $(this).css('-webkit-transition', 'none');
        //                 $(this).css('-ms-transition', 'none');
        //                 $(this).css('-o-transition', 'none');
        //             }, 300);
        //         });
        //     });
        // }

        // Detect IE
        var isIE = /*@cc_on!@*/false || !!document.documentMode;
        if( isIE ) {
            $('head').append('<style>.slz-album-01 .bar-wrapper {display: none;}</style>');
        }

        // Disable scroll event when fancybox active ONLY USE FOR Gallery Carousel Syncing
        var stopScrolling = false;
        $('.slz-carousel-syncing .fancybox-thumb').each(function() {
            $(this).on('click', function() {
                setTimeout(function() {
                    if($('.fancybox-overlay').length) {
                        stopScrolling = true;
                    }
                    $('.fancybox-close').on('click', function() {
                        stopScrolling = false;
                    });
                    $('.fancybox-overlay').on('click', function() {
                        stopScrolling = false;
                    });
                    $(document).keyup(function(e) {
                        if(e.keyCode == 27) {
                            stopScrolling = false;
                        }
                    });
                }, 300);

            });
        });

        $('html').on('scroll mousewheel touchmove', function(e) {
            if(stopScrolling) {
                e.preventDefault();
                e.stopPropagation();
                return false;
            }
            return true;
        });

    }

    solala.headerFunction = function() {

        //sub header
        $('.slz-header-main .slz-menu-icon').on('click', function(e) {
            e.preventDefault();
            $(this).parents('.slz-header-wrapper').find('.slz-menu-wrapper').addClass('open');
            $('.subheader-mask').addClass('active');
        });
        $('.slz-sub-header .slz-menu-icon').on('click', function(e) {
            e.preventDefault();
            $(this).parents('.slz-header-wrapper').find('.slz-menu-wrapper').removeClass('open');
            $('.subheader-mask').removeClass('active');
        });
        // slz-header-main

        // Show - hide box search on menu
        $('.slz-button-search').on('click', function () {
            $(this).toggleClass('active');
            $(this).next().toggleClass('hide');
            $(this).next().toggleClass('active');
            //$('.nav-search-full .nav-wrapper').toggleClass('addHeight');
            $('.nav-search input').focus();
        });

        //hide box seach when click outside
        $('body').on('click', function (event) {
            if ($('.slz-button-search').has(event.target).length == 0 && !$('.slz-button-search').is(event.target) && $('.nav-search').has(event.target).length == 0 && !$('.nav-search').is(event.target)) {
                if ($('.slz-main-menu .nav-wrapper').hasClass('hide') == false) {
                    $('.slz-main-menu .nav-wrapper').toggleClass('hide');
                    $('.slz-button-search').toggleClass('active');
                    $('.nav-search-full').toggleClass('active');
                }
            }
        });

        // Menu fixded
        if ($('header .slz-header-main').length && $('header .slz-header-main').hasClass('slz-header-sticky')) {
            var header_position = $('header .slz-header-main').offset(),
                lastScroll = 50;
            var window_height = $(window).height();
            $(window).on('scroll load', function (event) {
                var st = $(this).scrollTop();
               if (st > header_position.top) {
                    if($(".slz-header-table").length)
                        $('header .slz-header-table').addClass("slz-header-fixed");
                    else
                        $('header .slz-header-main').addClass("slz-header-fixed");
                }
                else {
                    if($(".slz-header-table").length)
                        $('header .slz-header-table').removeClass("slz-header-fixed");
                    else
                        $('header .slz-header-main').removeClass("slz-header-fixed");
                }

                if (st > lastScroll && st > header_position.top) {
                    if($(".slz-header-table").length)
                        $('header .slz-header-table').addClass("slz-hidden-menu");
                    else
                        $('header .slz-header-main').addClass("slz-hidden-menu");
                }
                else if (st <= lastScroll){
                    if($(".slz-header-table").length)
                        $('header .slz-header-table').removeClass("slz-hidden-menu");
                    else
                        $('header .slz-header-main').removeClass("slz-hidden-menu");
                }

                lastScroll = st;

                if(st == 0) {
                    if($(".slz-header-table").length)
                        $('header .slz-header-table').removeClass("slz-header-fixed");
                    else
                        $('header .slz-header-main').removeClass("slz-header-fixed");
                }
            });
        }

        if ($("#wpadminbar").length) {
            $(".slz-header-main").addClass("slz-wpadminbar");
        }


        // Menu mobile
        $('.slz-hamburger-menu').on('click', function() {
            $('.slz-hamburger-menu .bar').toggleClass('animate');
            $(".slz-main-menu-mobile").toggleClass('slz-open-menu-mobile');
            $(".slz-header-main").toggleClass('slz-unhidden-menu');

            // delete dropdown open
            $('.menu-item-has-children').removeClass('mb-dropdown-open');
            $('.menu-item-has-mega-menu').removeClass('mb-dropdown-open');
        })

        
        $('.slz-main-menu-mobile .slz-menu-wrapper .menu-item-has-children > .icon-dropdown-mobile').on('click', function(){
            if ($(this).closest('.menu-item-has-children').hasClass('mb-dropdown-open') === true) {
                $(this).closest('.menu-item-has-children').removeClass('mb-dropdown-open');
            }
            else {
                $(this).closest('.menu-item-has-children').addClass('mb-dropdown-open');
            }
        });


        // CTA for sub header
        if($('.slz-sub-header').length>0){
            if($('.btn-contact-toggle').length>0){
                $('.btn-contact-toggle').on('click', function(e) {
                    e.preventDefault();
                    // alert("a");
                    $(this).parents('.slz-sub-header').find('.contact').addClass('open');
                    $(this).parents('.slz-sub-header').find('.menu-body').addClass('inactive');
                    $(this).parents('.slz-sub-header').find('.action-top').addClass('inactive');
                    $(this).parents('.slz-sub-header').find('.app-post').addClass('inactive');
                });
                $('.slz-close-contact').on('click', function(e) {
                    e.preventDefault();
                    // alert("a");
                    $(this).parents('.slz-sub-header').find('.contact').removeClass('open');
                    $(this).parents('.slz-sub-header').find('.menu-body').removeClass('inactive');
                    $(this).parents('.slz-sub-header').find('.action-top').removeClass('inactive');
                    $(this).parents('.slz-sub-header').find('.app-post').removeClass('inactive');
                });
            }
            $('.subheader-mask').click(function(event) {
                /* Act on the event */
                $(this).removeClass('active');
                $('.contact').removeClass('open');
                $('.menu-body').removeClass('inactive');
                $('.action-top').removeClass('inactive');
                $('.app-post').removeClass('inactive');
                $('.slz-menu-wrapper').removeClass('open');
            });
        }

        //hide menu mobile when click outside
        $('body').on('click', function (event) {
            if ($('.slz-hamburger-menu').has(event.target).length === 0 && !$('.slz-hamburger-menu').is(event.target) && $('.slz-main-menu-mobile').has(event.target).length === 0 && !$('.slz-main-menu-mobile').is(event.target)) {
                if ($('.slz-main-menu-mobile').hasClass('slz-open-menu-mobile')) {
                    $('.slz-hamburger-menu .bar').toggleClass('animate');
                    $('.slz-main-menu-mobile').toggleClass('slz-open-menu-mobile');
                    $('.slz-header-main').toggleClass('slz-unhidden-menu');

                    // delete dropdown open
                    $('.menu-item-has-children').removeClass('mb-dropdown-open');
                    //$('.menu-item-has-mega-menu').removeClass('mb-dropdown-open');
                }
            }
        });
        $(function() {
            $('.slz-header-wrapper a[href*="#"]:not([href="#"])').click(function() {
                if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
                    var target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
                    if (target.length) {
                        $('html, body').animate({
                            scrollTop: target.offset().top
                        }, 1000);
                        return false;
                    }
                }
            });
        });
    }
    /*======================================
    =            INIT FUNCTIONS            =
    ======================================*/

    $(document).ready(function() {
        solala.mainFunction();
        solala.headerFunction();
    });

    /*=====  End of INIT FUNCTIONS  ======*/


});
