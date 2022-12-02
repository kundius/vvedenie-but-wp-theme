import Swiper, { Pagination, EffectFade, Thumbs, Navigation } from "swiper";

const swiper = new Swiper(".gallery-swiper", {
  slidesPerView: 1,
  spaceBetween: 10,
  modules: [Navigation],
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  breakpoints: {
    640: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    768: {
      slidesPerView: 3,
      spaceBetween: 40,
    },
    1024: {
      slidesPerView: 4,
      spaceBetween: 50,
    },
  },
});
