let mySlider = document.querySelector('.mySlider')
let swiper_pagination =document.querySelector('.swiper-pagination')
let swiper_button_next = document.querySelector('.swiper-button-next')
let swiper_button_prev = document.querySelector('.swiper-button-prev')
var swiper = new Swiper(mySlider, {
    slidesPerView: 1,
    spaceBetween: 30,
    loop: true,
    pagination: {
        el: swiper_pagination,
        bulletClass: 'swiper-pagination-number',
        bulletActiveClass: 'swiper-pagination-number--active',
        clickable: true,
        renderBullet: function (index, className) {
            return '<h5 class="number-'+ (index + 1) + ' ' + className + '"' + 'index="' + (index + 1) +'">' + (index + 1) + '</h5>';
        },
    },
    navigation: {
        nextEl: swiper_button_next,
        prevEl: swiper_button_prev,
    },
});
