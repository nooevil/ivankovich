import Swiper from '../../common/custom-swiper/custom-swiper';
import LazyLoad from '../../../js/lazy-load';

export default new class HeroSlider {
  constructor() {
    this.sliderContainerSelector = 'main-slider';
    this.slideSelector = 'main-slider__item';
    this.pagination = {
      el: '.main-slider__pagination',
      lockClass: 'main-slider__pagination_disable',
      type: 'fraction',
    };
    this.navigation = {
      nextEl: '.main-slider__btn_next',
      prevEl: '.main-slider__btn_prev',
      disabledClass: 'main-slider__btn_disable',
      hiddenClass: 'main-slider__btn_hidden',
    };

    this.handler();
  }

  handler() {
    document.addEventListener('DOMContentLoaded', () => {
      this.init();
    });
  }

  init() {
    const slider = document.querySelector(`.${this.sliderContainerSelector}`);

    if (!slider) return;

    const slides = slider.querySelectorAll(`.${this.slideSelector}`).length;
    const { navigation, pagination } = this;

    this.HeroSlider = new Swiper(`.${this.sliderContainerSelector}`, {
      slidesPerView: 1,
      spaceBetween: 0,
      watchOverflow: true,
      watchSlidesVisibility: true,
      watchSlidesProgress: true,
      observer: true,
      pagination,
      navigation,
      loop: slides > 1,
      on: {
        init: () => {
          LazyLoad.update();
        },
      },
    });
  }
}();
