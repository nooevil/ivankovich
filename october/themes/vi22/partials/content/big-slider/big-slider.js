import Swiper from '../../common/custom-swiper/custom-swiper';
import LazyLoad from '../../../js/lazy-load';

export default new class BigSlider {
  constructor() {
    this.sliderContainerSelector = 'big-slider';
    this.slideSelector = 'big-slider__item';

    this.navigation = {
      nextEl: '.big-slider__btn_next',
      prevEl: '.big-slider__btn_prev',
      disabledClass: 'big-slider__btn_disable',
      hiddenClass: 'big-slider__btn_hidden',
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
    const { navigation } = this;

    this.BigSlider = new Swiper(`.${this.sliderContainerSelector}`, {
      slidesPerView: 1,
      spaceBetween: 0,
      loopedSlides: 4,
      watchOverflow: true,
      watchSlidesVisibility: true,
      watchSlidesProgress: true,
      observer: true,
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
