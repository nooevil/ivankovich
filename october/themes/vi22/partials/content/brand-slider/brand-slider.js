import Swiper from '../../common/custom-swiper/custom-swiper';
import LazyLoad from '../../../js/lazy-load';

export default new class brandSlider {
  constructor() {
    this.sliderContainerSelector = 'brand-slider__container';
    this.slideSelector = 'brand-slider__slide';

    this.navigation = {
      nextEl: '.brand-slider__nav_next',
      prevEl: '.brand-slider__nav_prev',
      disabledClass: 'brand-slider__nav_disable',
      hiddenClass: 'brand-slider__nav_hidden',
    };

    this.pagination = {
      el: '.brand-slider__pagination',
      lockClass: 'brand-slider__pagination_disable',
      type: 'fraction',
    };

    this.handler();
  }

  handler() {
    const slider = document.querySelector(`.${this.sliderContainerSelector}`);

    if (!slider) return;

    document.addEventListener('DOMContentLoaded', () => {
      this.init(slider);
    });
  }

  init(slider) {
    const { navigation, pagination } = this;
    const slides = slider.querySelectorAll(`.${this.slideSelector}`);

    this.blogSlider = new Swiper(`.${this.sliderContainerSelector}`, {
      slidesPerView: 2,
      slidesPerGroup: 2,
      spaceBetween: 12,
      breakpointsInverse: true,
      watchOverflow: true,
      watchSlidesVisibility: true,
      watchSlidesProgress: true,
      observer: true,
      navigation,
      pagination,
      loop: slides.length > 2,
      breakpoints: {
        768: {
          slidesPerView: 4,
          spaceBetween: 67,
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
