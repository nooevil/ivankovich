import Swiper from '../../common/custom-swiper/custom-swiper';

export default new class blogSlider {
  constructor() {
    this.sliderContainerSelector = 'news-simple-slider__container';
    this.slideSelector = 'news-simple-slider__slide';

    this.navigation = {
      nextEl: '.news-simple-slider__nav_next',
      prevEl: '.news-simple-slider__nav_prev',
      disabledClass: 'news-simple-slider__nav_disable',
      hiddenClass: 'news-simple-slider__nav_hidden',
    };

    this.pagination = {
      el: '.news-simple-slider__pagination',
      type: 'fraction',
      lockClass: 'news-simple-slider__pagination_disable',
    };

    this.mediaQueryList = window.matchMedia('(min-width: 769px)');

    this.handler();
  }

  handler() {
    const slider = document.querySelector(`.${this.sliderContainerSelector}`);

    if (!slider) return;

    this.init();

    this.mediaQueryList.addListener(() => {
      this.init();
    });
  }

  init() {
    const { navigation, pagination } = this;

    this.blogSlider = new Swiper(`.${this.sliderContainerSelector}`, {
      slidesPerView: 2,
      spaceBetween: 15,
      breakpointsInverse: true,
      watchOverflow: true,
      watchSlidesVisibility: true,
      watchSlidesProgress: true,
      observer: true,
      pagination,
      navigation,
      breakpoints: {
        768: {
          slidesPerView: 3,
          spaceBetween: 45,
        },
      },
    });
  }
}();
