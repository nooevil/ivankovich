import Swiper from '../../common/custom-swiper/custom-swiper';

export default new class productSlider {
  constructor() {
    this.sliderContainerSelector = 'product-slider__container';
    this.paginationSelector = 'product-slider__pagination';
    this.bulletSelector = 'product-slider__bullet';
    this.activeBulletSelector = 'product-slider__bullet_active';

    this.navSliderContainerSelector = 'product-nav-slider';
    this.navSliderContainerHiddenSelector = 'product-nav-slider_visually-hidden';

    this.mqString = '(min-width: 769px)';
    this.delay = 200;

    this.handler();
  }

  handler() {
    const slider = document.querySelector(`.${this.sliderContainerSelector}`);

    if (!slider) return;

    document.addEventListener('DOMContentLoaded', () => {
      this.changeNavVisibility();
      this.init();
    });

    window.addEventListener('resize', () => {
      this.changeNavVisibility();
    });
  }

  init() {
    const el = `.${this.paginationSelector}`;
    this.initNavSlider();

    this.productMainSlider = new Swiper(`.${this.sliderContainerSelector}`, {
      slidesPerView: 1,
      watchOverflow: true,
      watchSlidesVisibility: true,
      watchSlidesProgress: true,
      observer: true,
      pagination: {
        el,
        type: 'bullets',
        bulletClass: this.bulletSelector,
        bulletActiveClass: this.activeBulletSelector,
      },
      loop: false,
      thumbs: {
        swiper: this.productNavSlider,
      },
      controller: {
        control: this.productNavSlider,
      },
    });
  }

  changeNavVisibility() {
    const vpState = this.checkViewport();

    if (vpState) {
      $(`.${this.navSliderContainerSelector}`).removeClass(this.navSliderContainerHiddenSelector);
    } else {
      $(`.${this.navSliderContainerSelector}`).addClass(this.navSliderContainerHiddenSelector);
    }
  }

  initNavSlider() {
    this.productNavSlider = new Swiper(`.${this.navSliderContainerSelector}`, {
      slidesPerView: 7,
      spaceBetween: 15,
      watchOverflow: true,
      observer: true,
      watchSlidesVisibility: true,
      watchSlidesProgress: true,
      controller: {
        control: this.productSlider,
      },
    });
  }

  checkViewport() {
    return window.matchMedia(this.mqString).matches;
  }
}();
