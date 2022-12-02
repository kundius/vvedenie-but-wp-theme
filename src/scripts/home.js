import Swiper, { Pagination, EffectFade, Thumbs, Navigation } from "swiper";

const swiper = new Swiper(".gallery-swiper", {
  slidesPerView: 1,
  spaceBetween: 0,
  modules: [Navigation],
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  breakpoints: {
    640: {
      slidesPerView: 2,
    },
    768: {
      slidesPerView: 3,
    },
    1024: {
      slidesPerView: 4,
    },
  },
});
