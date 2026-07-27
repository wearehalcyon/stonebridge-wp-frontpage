'use strict';

jQuery(document).ready(function($) {
    //Add class to header on scroll
    $(window).on('scroll', function () {
        if ($(this).scrollTop() > 50) {
            $('header').addClass('bg-[#2D2A26]');
        } else {
            $('header').removeClass('bg-[#2D2A26]');
        }
    });

    // Testimonials Slider
    const swiper = new Swiper('.reviews-slider', {
        slidesPerView: 1.5,
        spaceBetween: 20,
        loop: false,

        breakpoints: {
            768: {
                slidesPerView: 1.5,
                spaceBetween: 20,
            },
            1024: {
                slidesPerView: 2.5,
                spaceBetween: 24,
            }
        },

        navigation: {
            nextEl: '.btn-next',
            prevEl: '.btn-prev',
        },

        pagination: {
            el: '.custom-pagination',
            clickable: true,
            bulletClass: 'page-num',
            bulletActiveClass: 'active',
            renderBullet: function (index, className) {
                const formattedNumber = (index + 1 < 10 ? '0' : '') + (index + 1);
                return `<span class="${className}">${formattedNumber}</span>`;
            },
        },

        scrollbar: {
            el: '.swiper-scrollbar',
            draggable: true,
        },
    });

    // Bridge slider
    const cardsSlider = new Swiper('.process-cards-slider', {
        slidesPerView: 1.5,
        spaceBetween: 0,
        speed: 600,
        breakpoints: {
            640: { slidesPerView: 2 },
            1024: { slidesPerView: 3 }
        }
    });

    const textSlider = new Swiper('.process-text-slider', {
        slidesPerView: 1,
        spaceBetween: 30,
        speed: 500,

        navigation: {
            nextEl: '.process-next',
            prevEl: '.process-prev',
        },

        pagination: {
            el: '.process-pagination',
            clickable: true,
            bulletClass: 'page-num',
            bulletActiveClass: 'active',
            renderBullet: function (index, className) {
                const num = (index + 1 < 10 ? '0' : '') + (index + 1);
                return `<span class="${className}">${num}</span>`;
            },
        },

        scrollbar: {
            el: '.process-scrollbar',
            draggable: true,
        }
    });

    textSlider.controller.control = cardsSlider;
    cardsSlider.controller.control = textSlider;

    // FAQs tabs
    let tab_window = $('[data-window]'),
        faq_question = $('[data-faq-question]');
    tab_window.on('click', function (event) {
        event.preventDefault();

        let target = $(this).data('window'),
            target_window = $('[data-window-id="' + target + '"]');

        $('[data-window]').removeClass('opacity-100').addClass('opacity-40');
        $(this).removeClass('opacity-40').addClass('opacity-100');

        $('[data-window-id]').removeClass('block').addClass('hidden');
        target_window.removeClass('hidden').addClass('block');
    });

    faq_question.on('click', function (event) {
        event.preventDefault();

        let $this = $(this);
        let $parent = $this.closest('.group');
        let $answer = $parent.find('[data-faq-answer]');
        let $symbol = $this.find('[data-faq-question-symbol]');

        let isOpen = $answer.is(':visible');

        $('[data-faq-answer]').not($answer).slideUp(300);
        $('[data-faq-question-symbol]').not($symbol).text('+');

        $answer.slideToggle(300);
        $symbol.text(isOpen ? '+' : '-');
    });
});