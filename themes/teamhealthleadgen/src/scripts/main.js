import './google-analytics';

$('.js-featured-profile').on('click', function () {
    $(this).toggleClass('is-active');
});

$('.js-sign-up-trigger').on('click', function () {
    $('.js-sign-up-block').removeClass('is-active');
    $(this).parents('.js-sign-up-block').addClass('is-active');
});

$('.js-menu-trigger').on('click', function () {
    $('body').addClass('menu-is-open');
});

$('.js-jobs-load-more').on('click', function () {
    $('.js-jobs-col').addClass('show-more');
    $(this).hide();
});

$('.js-menu-close').on('click', function () {
    $('body').removeClass('menu-is-open');
});