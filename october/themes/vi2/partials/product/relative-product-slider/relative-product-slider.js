import Swiper from '../../common/custom-swiper/custom-swiper';
import LazyLoad from '../../../js/lazy-load';

export default new class RelativeSlider {
  constructor() {
    this.sectionSelector = 'relative-product-slider';
    this.sliderContainerSelector = 'relative-product-slider__container';
    this.nextElBtnSelector = 'relative-product-slider__nav_next';
    this.prevElBtnSelector = 'relative-product-slider__nav_prev';
    this.paginationSelector = 'relative-product-slider__pagination';

    this.handler();
  }

  handler() {
    const slider = document.querySelector(`.${this.sliderContainerSelector}`);

    if (!slider) return;

    document.addEventListener('DOMContentLoaded', () => {
      this.init();
    });
  }

  init() {
    const sliderList = document.querySelectorAll(`.${this.sliderContainerSelector}`);

    [...sliderList].forEach(el => this.initSlider(el));
  }

  initSlider(el) {
    const wrapper = el.closest(`.${this.sectionSelector}`);
    const nextEl = wrapper.querySelector(`.${this.nextElBtnSelector}`);
    const prevEl = wrapper.querySelector(`.${this.prevElBtnSelector}`);
    const pagination = wrapper.querySelector(`.${this.paginationSelector}`);

    this.RelativeSlider = new Swiper(el, {
      slidesPerView: 2,
      spaceBetween: 15,
      breakpointsInverse: true,
      watchOverflow: true,
      watchSlidesVisibility: true,
      watchSlidesProgress: true,
      observer: true,
      navigation: {
        nextEl,
        prevEl,
        disabledClass: 'relative-product-slider__nav_disable',
        hiddenClass: 'relative-product-slider__nav_hidden',
      },
      pagination: {
        el: pagination,
        type: 'fraction',
        lockClass: 'relative-product-slider__pagination_disable',
      },
      loop: false,
      breakpoints: {
        769: {
          slidesPerView: 3,
          spaceBetween: 45,
          loopedSlides: 8,
        },
      },
      on: {
        init: () => {
          LazyLoad.update();
        },
      },
    });
  }
}();
