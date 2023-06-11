import 'bootstrap';

import Swiper, { Navigation, Autoplay, EffectCoverflow, EffectFade, Thumbs } from 'swiper';
// import { escapeSelector } from "jquery";
Swiper.use([Navigation, Autoplay, EffectCoverflow, EffectFade, Thumbs]);

import SimpleScrollbar from 'simple-scrollbar';

$(document).on("ready", function () {

    const mainSlider = new Swiper('.main_slider', {
        effect: 'fade',
        fadeEffect: {
            crossFade: true
        },
        slidesPerView: 1,
        loop: true,
        centeredSlides: false,
        navigation: {
            nextEl: '.main_slider .swiper-button-next',
            prevEl: '.main_slider .swiper-button-prev',
        },
        speed: 1000,
        preloadImages: false,
        checkInView: false,
        lazy: true,

        observeParents: true,
        observer: true,

        // autoplay: {
        //     delay: 2500,
        //     disableOnInteraction: true,
        // },

    });

    // mainSlider.on('slideChange', function () {
    //     console.log('slide changed');
    // });


    function myPlugin({ swiper, extendParams, on }) {
        extendParams({
            debugger: false,
        });

        on('init', () => {
            if (!swiper.params.debugger) return;
            console.log('init');
        });
        on('click', (swiper, e) => {
            if (!swiper.params.debugger) return;
            console.log('click');
        });
        on('tap', (swiper, e) => {
            if (!swiper.params.debugger) return;
            console.log('tap');
        });
        on('doubleTap', (swiper, e) => {
            if (!swiper.params.debugger) return;
            console.log('doubleTap');
        });
        on('sliderMove', (swiper, e) => {
            if (!swiper.params.debugger) return;
            console.log('sliderMove');
        });
        on('slideChange', () => {
            if (!swiper.params.debugger) return;
            console.log(
                'slideChange',
                swiper.previousIndex,
                '->',
                swiper.activeIndex
            );
        });
        on('slideChangeTransitionStart', () => {
            if (!swiper.params.debugger) return;
            console.log('slideChangeTransitionStart');
        });
        on('slideChangeTransitionEnd', () => {
            if (!swiper.params.debugger) return;
            console.log('slideChangeTransitionEnd');
        });
        on('transitionStart', () => {
            if (!swiper.params.debugger) return;
            console.log('transitionStart');
        });
        on('transitionEnd', () => {
            if (!swiper.params.debugger) return;
            console.log('transitionEnd');
        });
        on('fromEdge', () => {
            if (!swiper.params.debugger) return;
            console.log('fromEdge');
        });
        on('reachBeginning', () => {
            if (!swiper.params.debugger) return;
            console.log('reachBeginning');
        });
        on('reachEnd', () => {
            if (!swiper.params.debugger) return;
            console.log('reachEnd');
        });
    }

    const newsSlider = new Swiper('.news_slider', {
        modules: [myPlugin],

        loop: true,
        // slidesPerGroupAuto: true,
        // slidesPerGroup: 3,
        centeredSlides: false,
        navigation: {
            nextEl: '.news_slider__swiper-navigation .swiper-button-next',
            prevEl: '.news_slider__swiper-navigation .swiper-button-prev',
        },
        speed: 1000,
        preloadImages: false,
        checkInView: false,
        lazy: true,
        // watchSlidesProgress: true,
        effect: 'coverflow',
        coverflowEffect: {
            rotate: 0,
            stretch: 1,
            depth: 1,
            modifier: 1,
            slideShadows: false,
        },
        slidesPerView: 1,
        centeredSlides: false,

        slidesPerView: 'auto',
        // breakpoints: {
        //     // when window width is >= 992px,... 
        //     992: {
        //         slidesPerView: 2,
        //         // centeredSlides: false,
        //     },
        //     1280: {
        //         slidesPerView: 3,
        //         // centeredSlides: true,
        //     },
        //     1600: {
        //         slidesPerView: 4,
        //         // centeredSlides: false,
        //     },
        // }
    });

    const recepieSlider = new Swiper('.recepie_slider', {

        loop: true,
        navigation: {
            nextEl: '.recepie_slider__swiper-navigation .swiper-button-next',
            prevEl: '.recepie_slider__swiper-navigation .swiper-button-prev',
        },
        speed: 1000,
        preloadImages: false,
        checkInView: false,
        lazy: true,
        // slidesOffsetBefore: 100
        // debugger: true,
        effect: 'coverflow',
        // centeredSlides: true,
        coverflowEffect: {
            rotate: 0,
            stretch: 1,
            depth: 1,
            modifier: 1,
            slideShadows: false,
        },
        slidesPerView: 1,
        // slidesPerView: 'auto',
        centeredSlides: false,

        on: {
            // init: function () {
            //     console.log('swiper initialized');
            // },
            resize: function () {
                var slideSize = this.slides[0].swiperSlideSize;
                var sliderSize = this.size;
                var decor = $('.home-section__recepie .animations__decor-left');
                var sliderMargin = -65;
                var slidePadding = 10;
                decor.css('left', slideSize - decor.width() + sliderMargin + slidePadding + 3);
                //console.log(slideSize);
            },
        },


        breakpoints: {
            // when window width is >= 992px,... 
            768: {
                slidesPerView: 2,
                // centeredSlides: false,
            },
            992: {
                slidesPerView: 3,
                // centeredSlides: false,
            },
            1280: {
                slidesPerView: 4,
                // centeredSlides: true,
            }
        }
    });





    var productDetailSliderThumbs = new Swiper(".catalog-detail__slider-thumbs", {
        spaceBetween: 10,
        slidesPerView: 4,
        // freeMode: true,
        slideToClickedSlide: true,
        watchSlidesProgress: true,
        breakpoints: {
            // when window width is >= 992px,... 
            // 768: {
            //     slidesPerView: 2,
            // },
            // 992: {
            //     slidesPerView: 3,
            // },
            1280: {
                slidesPerView: 5,
            },
            1400: {
                slidesPerView: 6,
            }
        }
    });
    var productDetailSlider = new Swiper(".catalog-detail__slider", {
        // spaceBetween: 10,
        // navigation: {
        //     nextEl: ".swiper-button-next",
        //     prevEl: ".swiper-button-prev",
        // },
        thumbs: {
            swiper: productDetailSliderThumbs,
        },
    });

    // Fire regular DSOS
    const scrollAnimate = new HumbleScroll({
        enableCallback: true,
        repeat: false,
        mirror: true,
        threshold: 0.25,
        // offset: {
        //     top: -64,
        //     bottom: -150,
        // },
    })


    const repeatAnim = new HumbleScroll({
        // root: document.querySelector('.header'),
        element: '.anim-repeat',
        repeat: true,
        mirror: true,
    })


    function getScrollBarWidth() {
        let el = document.createElement("div");
        el.style.cssText = "overflow:scroll; visibility:hidden; position:absolute;";
        document.body.appendChild(el);
        let width = el.offsetWidth - el.clientWidth;
        el.remove();
        return width;
    }

    function getBreakpoint(windowWidth) {
        var grid_breakpoints = [
            ['xxs', 0],
            ['xs', 360],
            ['sm', 576],
            ['md', 768],
            ['lg', 992],
            ['xl', 1280],
            ['xxl', 1400],
            ['xxxl', 1800],
            ['4xl', 2000]
        ];
        var breakpoint;
        $.each(grid_breakpoints, function (i, bp_item) {
            if (i + 1 < grid_breakpoints.length && windowWidth >= grid_breakpoints[i][1] && windowWidth <= grid_breakpoints[i + 1][1]) {
                breakpoint = bp_item[0];
            }
        });

        if (windowWidth >= grid_breakpoints[grid_breakpoints.length - 1][1])
            breakpoint = grid_breakpoints[grid_breakpoints.length - 1][0]

        return breakpoint;
    }

    function showBreakpoint() {
        $('body').append('<div id="show_breakpoint" style="position:fixed;top:2px;left:5px;z-index:1000;">sdf</div>');
        $('#show_breakpoint').text('up(' + getBreakpoint($(document).innerWidth()) + ')');
        $(window).on("resize", function () {
            $('#show_breakpoint').text('up(' + getBreakpoint($(document).innerWidth()) + ')');
        });
    }

    function scrollTopButton() {
        const btn = document.getElementById("scrollTopBtn");
        if (btn) {
            var isMouseWheelTop;
            var lastScrollTop = 0;
            addEventListener('mousewheel', (event) => {
                isMouseWheelTop = (event.wheelDelta >= 0) ? true : false;
            });
            addEventListener('scroll', (event) => {
                var scrollTop = document.documentElement.scrollTop;
                var isScrolledToTop = (scrollTop > lastScrollTop) ? false : true;
                lastScrollTop = scrollTop;

                if ((isScrolledToTop || isMouseWheelTop) &&
                    (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100)
                ) {
                    btn.style.display = "shown";
                    // btn.classList.add("block");
                } else {
                    btn.classList.remove("shown");
                    // btn.style.display = "none";
                }
            });

            btn.addEventListener("click", function () {


                if (document.querySelector("body").classList.contains('home-page')) {
                    document.querySelector(".parallax").scrollTo({ top: 0, behavior: 'smooth' });
                }
                else {
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                }

            });
        }
    }


    Array.prototype.forEach.call(document.querySelectorAll(".animate-in-view"), function (element) {
        const observer = new IntersectionObserver(entries => {
            element.classList.toggle('in-view', entries[0].isIntersecting);
        });
        observer.observe(element);
    });



    showBreakpoint();

    scrollTopButton();

    var scrollBarWidth = getScrollBarWidth();

    $('.menu_close').css('margin-right', scrollBarWidth);

    $('.menu_open').on("click", function () {

        $('body').addClass('menu_opened');
        $('body').css({ 'padding-right': scrollBarWidth, 'overflow': 'hidden' });
        $('.header').fadeIn(300);
        // setTimeout(function() { 

        // }, 300);


    });

    $('.menu_close').on("click", function () {

        $('body').removeClass('menu_opened');
        $('body').css({ 'padding-right': 0, 'overflow': 'auto' });
        $('.header').fadeOut(300);
    });



    var anim_letters_elem = $('.animations__speak');
    anim_letters_elem.each(function () {
        var s = $.trim($(this).text());

        var new_html = "";
        for (var i = 0; i < s.length; i++) {
            new_html += '<span>' + s.charAt(i) + '</span>';
        }
        $(this).html(new_html);
    });

    $(".parallax").on("scroll", function () {
        $('.main_slider .animations__decor').css({ 'bottom': $(this).scrollTop() * 0.3 })
    });

    $(window).on("scroll", function () {
        var footer_margin = 170;
        // var footer_margin = 0;
        var footer_full_height = $(".footer").outerHeight() + footer_margin;
        var is_scroll_on_footer = $(window).scrollTop() >= $(document).height() - $(window).height() - footer_full_height;
        var sticky = $('.sticky');
        var sticky_wrapper = $('.sticky-wrapper');
        if (is_scroll_on_footer) {
            sticky.css({ 'position': 'absolute' });
            // sticky_wrapper.css({'height':'100%'});
        } else {
            // $('.col-sticky .animations__decor').css({'bottom':-$(this).scrollTop()})
            sticky.css({ 'position': 'fixed' });
            // sticky_wrapper.css({'height':'calc(100vh - 118px)'});
        }


    });

    // function toggleProductIcons(container) {
    //     var i = 0;
    //     var anim_elem = container.find(".animate-fade:visible");
    //     anim_elem.eq(0).css("opacity", "1");
    //     anim_elem.eq(1).css("opacity", "0");
    //     setInterval(function () {
    //         anim_elem.css("opacity", "1");
    //         anim_elem.eq(i).css("opacity", "0");
    //         if (i == 1) {
    //             i = 0;
    //         } else {
    //             i++;
    //         }
    //     }, 3000);
    // }

    // $('.product-list__item').each(function () {
    //     toggleProductIcons($(this));
    // });
    




    $('.product-list__item-switcher button[data-bs-toggle="pill"]').on('show.bs.tab', function (event) {
        $(this).parents('.product-list__item').find('.product-list__item-code span').text($(this).data('barcode'));
    })



    window.onload = function () {
        window.setTimeout(function () {
            document.body.classList.add('loaded_hiding');
            window.setTimeout(function () {
                document.body.classList.add('loaded');
                document.body.classList.remove('loaded_hiding');
            }, 500);

            if(location.hash)
            {
                const element = document.querySelector(location.hash);
                if(element)
                {
                    const topPos = element.getBoundingClientRect().top + window.pageYOffset;
                    window.scrollTo({
                        top: topPos,
                        behavior: 'smooth'
                    });        
                }              
            }



        }, 800);
    }
});