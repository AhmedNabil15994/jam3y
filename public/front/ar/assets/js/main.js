;
(function ($) {
    "use strict";

    /*--------- WOW js-----------*/
    function wowAnimation() {
        new WOW({
            offset: 100,
            mobile: true
        }).init()
    }
    wowAnimation()



    $('.courses-carousel').owlCarousel({
        loop: true,
        autoplay: false,
        margin: 10,
        dots: false,
        nav: true,
        rtl: true,
        responsive: {
            0: {
                items: 1
            },
            480: {
                items: 1
            },
            768: {
                items: 2
            },
            992: {
                items: 3
            },
            1200: {
                items: 5
            }
        }
    });
    $('.courses-related-carousel').owlCarousel({
        loop: true,
        autoplay: false,
        margin: 10,
        dots: false,
        nav: true,
        rtl: true,
        responsive: {
            0: {
                items: 1
            },
            480: {
                items: 1
            },
            768: {
                items: 2
            },
            992: {
                items: 2
            },
            1200: {
                items: 3
            }
        }
    });

    /* Counter Js */
    function counterUp() {
        if ($('.counter').length) {
            $('.counter').counterUp({
                delay: 1,
                time: 500
            });
        }
        ;
    }
    ;
    counterUp();


    if ($(window).width() > 768) {
        $('.has-popover').webuiPopover({
            trigger: 'hover',
            placement: 'horizontal',
            delay: {
                show: 300,
                hide: null
            },
            width: 335
        });
    }
    else {
        $('.course-wrap').removeClass('has-popover');

    }

})(jQuery)


// mobile menu
moveElements();

function moveElements() {
    var desktop = checkWindowWidth(768);
    var signInBox = $('.sign-in-box');
    var userDMenu = $('li.user-dropdown-menu-item');
    var userdBox = $('.dropdown-user-info');

    if (desktop) {
        signInBox.detach();
        userDMenu.detach();
        userdBox.detach();

        signInBox.insertAfter('.signin-box-move-desktop-helper');
        $('ul.user-dropdown-menu').append(userDMenu);
        $('ul.user-dropdown-menu').prepend(userdBox);

    } else {
        signInBox.detach();
        userDMenu.detach();
        userdBox.detach();

        signInBox.insertBefore('.mobile-menu-helper-bottom');
        userDMenu.insertBefore('.mobile-menu-helper-bottom');
        userdBox.insertAfter('.mobile-menu-helper-top');
    }
}

function checkWindowWidth(MqL) {
//check window width (scrollbar included)
    var e = window,
            a = 'inner';
    if (!('innerWidth' in window)) {
        a = 'client';
        e = document.documentElement || document.body;
    }
    if (e[ a + 'Width' ] >= MqL) {
        return true;
    } else {
        return false;
    }
}

function viewMore(element, visibility) {
    if (visibility == 'hide') {
        $(element).parent('.view-more-parent').addClass('expanded');
        $(element).remove();
    }
    else if ($(element).hasClass('view-more')) {
        $(element).parent('.view-more-parent').addClass('expanded has-hide');
        $(element).removeClass('view-more').addClass('view-less').html('- اقرأ اقل');
    }
    else if ($(element).hasClass('view-less')) {
        $(element).parent('.view-more-parent').removeClass('expanded has-hide');
        $(element).removeClass('view-less').addClass('view-more').html('+ اقرأ المزيد');
    }
}


$(window).resize(function () {
    moveElements();
});


var courseSidebar = $('.course-sidebar');
var courseHeader = $('.course-header-area');
var margin = 10;

if ($('div').hasClass('course-sidebar')) {
    var offsetTop = courseSidebar.offset().top + (193 - margin);
}

$(window).scroll(function () {

    if (checkWindowWidth(1200)) {
        var scrollTop = $(window).scrollTop();
        if (scrollTop > offsetTop && courseSidebar.hasClass('natural')) {
            courseSidebar.removeClass('natural').addClass('fixed').css('top', margin);
            courseHeader.clone().addClass('duplicated').insertAfter(".course-header-area");
        }
        if (offsetTop > scrollTop && courseSidebar.hasClass('fixed')) {
            courseSidebar.removeClass('fixed').addClass('natural').css('top', 'auto');
            $(".course-header-area.duplicated").remove();
        }

    }

});



$(document).ready(function () {
    /*============================================
     FAQ
     ==============================================*/

    $('.faq-categories a').on('click', function (event) {
        event.preventDefault();

        $('html, body').animate({
            scrollTop: $($.attr(this, 'href')).offset().top
        }, 500);
        $('.faq-categories li').removeClass('active');
        $(this).parent().addClass('active');
    });
    function toggleIcon(e) {
        $(e.target)
                .prev('.panel-heading')
                .find(".more-less")
                .toggleClass('ti-minus ti-plus');
    }
    $('.panel-group').on('hidden.bs.collapse', toggleIcon);
    $('.panel-group').on('shown.bs.collapse', toggleIcon);
    //open search form
    $('.mobile-search-trigger').on('click', function (event) {
        event.preventDefault();
        toggleSearch();
    });

    //mobile - open lateral menu clicking on the menu icon
    $('.mobile-nav-trigger').on('click', function (event) {
        if (!checkWindowWidth(768))
            event.preventDefault();
        $('.mobile-main-nav').addClass('nav-is-visible');
        toggleSearch('close');
        $('.mobile-overlay').addClass('is-visible');
    });

    //submenu items - go back link
    $('.go-back').on('click', function (event) {
        event.preventDefault();
        $(this).parent('ul').addClass('is-hidden').parent('.has-children').parent('ul').removeClass('moves-out');
    });
    $('.go-back-menu').on('click', function (event) {
        event.preventDefault();
        $(this).parent('ul').addClass('is-hidden').parent('.has-children').parent('ul').removeClass('moves-out').addClass('is-hidden').parent('.has-children').parent('ul').removeClass('moves-out');
    });

    //open submenu
    $('.has-children').children('a').on('click', function (event) {
        event.preventDefault();
        var selected = $(this);
        if (selected.next('ul').hasClass('is-hidden')) {
            //desktop version only
            selected.addClass('selected').next('ul').removeClass('is-hidden').end().parent('.has-children').parent('ul').addClass('moves-out');
            selected.parent('.has-children').siblings('.has-children').children('ul').addClass('is-hidden').end().children('a').removeClass('selected');
            $('.mobile-overlay').addClass('is-visible');
        } else {
            selected.removeClass('selected').next('ul').addClass('is-hidden').end().parent('.has-children').parent('ul').removeClass('moves-out');
            $('.mobile-overlay').removeClass('is-visible');
        }
        toggleSearch('close');
    });
    //close lateral menu on mobile
    $('.mobile-overlay').on('click', function () {
        closeNav();
        $('.mobile-overlay').removeClass('is-visible');
    });

    //prevent default clicking on direct children of .mobile-main-nav
    $('.mobile-main-nav').children('.has-children').children('a').on('click', function (event) {
        event.preventDefault();
    });

    function toggleSearch(type) {
        if (type == "close") {
            //close serach
            $('.mobile-search').removeClass('is-visible');
            $('.mobile-search-trigger').removeClass('search-is-visible');
        } else {
            //toggle search visibility
            $('.mobile-search').toggleClass('is-visible');
            $('.mobile-search-trigger').toggleClass('search-is-visible');
        }
    }

    function closeNav() {
        // $('.mobile-nav-trigger').removeClass('nav-is-visible');
        $('.mobile-main-nav').removeClass('nav-is-visible');
        setTimeout(function () {
            $('.has-children ul').addClass('is-hidden');
        }, 600);
        $('.has-children a').removeClass('selected');
        $('.moves-out').removeClass('moves-out');
    }

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
    var isiPad = /ipad/i.test(navigator.userAgent.toLowerCase());
    if (isiPad)
    {
        $('.mobile-overlay.is-visible').on('click', function () {
            closeNav();
            $('.mobile-overlay').removeClass('is-visible');
        });
    }
    var isiPhone = /iphone/i.test(navigator.userAgent.toLowerCase());
    if (isiPhone)
    {
        $('.mobile-overlay.is-visible').on('click', function () {
            closeNav();
            $('.mobile-overlay').removeClass('is-visible');
        });
    }

});
