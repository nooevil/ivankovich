import Swiper from '../../common/custom-swiper/custom-swiper';
import LazyLoad from '../../../js/lazy-load';

export default new class blogSlider {
  constructor() {
    this.sliderContainerSelector = 'news-slider__container';
    this.slideSelector = 'news-slider__slide';
    this.sliderAjaxWrapperSelector = 'news-slider__slider';
    this.preLoaderSelector = 'news-slider__preloader';
    this.tabBtnSelector = 'news-slider__btn';
    this.tabActiveRtnSelector = 'news-slider__btn_active';

    this.idSelector = 'data-id';

    this.navigation = {
      nextEl: '.news-slider__nav_next',
      prevEl: '.news-slider__nav_prev',
      disabledClass: 'news-slider__nav_disable',
      hiddenClass: 'news-slider__nav_hidden',
    };

    this.pagination = {
      el: '.news-slider__pagination',
      type: 'fraction',
      lockClass: 'news-slider__pagination_disable',
    };

    this.handler();
    this.changeSlider();
  }

  handler() {
    const slider = document.querySelector(`.${this.sliderContainerSelector}`);

    if (!slider) return;

    document.addEventListener('DOMContentLoaded', () => {
      this.init();
    });
  }

  init() {
    const { navigation, pagination } = this;
    const slider = document.querySelector(`.${this.sliderContainerSelector}`);

    if (!slider) return;

    const slides = slider.querySelectorAll(`.${this.slideSelector}`);

    this.blogSlider = new Swiper(`.${this.sliderContainerSelector}`, {
      slidesPerView: 2,
      spaceBetween: 15,
      breakpointsInverse: true,
      watchOverflow: true,
      watchSlidesVisibility: true,
      watchSlidesProgress: true,
      observer: true,
      navigation,
      pagination,
      loop: slides.length > 3,
      breakpoints: {
        768: {
          slidesPerView: 3,
          spaceBetween: 45,
        },
      },
      on: {
        init: () => {
          LazyLoad.update();
        },
      },
    });
  }

  changeSlider() {
    const btn = document.querySelectorAll(`.${this.tabBtnSelector}`);

    if (!btn) return;

    [...btn].forEach(el => el.addEventListener('click', () => {
      this.sliderTabHandler(el);
    }));
  }

  sliderTabHandler(el) {
    if (el.matches(`.${this.tabActiveRtnSelector}`)) return;

    const id = el.getAttribute(this.idSelector);
    const $this = this;

    if (!id) return;

    $.request('ArticleList::onAjaxRequest', {
      data: {
        category_id: id,
      },
      update: { 'article/news-slider/news-slider-ajax': `.${this.sliderAjaxWrapperSelector}` },
      success: function (res) { // eslint-disable-line object-shorthand, func-names
        this.success(res);
        $this.changeActiveTab(el);
        $this.init();
        LazyLoad.update();
      },
      loading: `.${this.preLoaderSelector}`,
    });
  }

  changeActiveTab(node) {
    const btn = document.querySelectorAll(`.${this.tabBtnSelector}`);

    [...btn].forEach(el => el.classList.remove(this.tabActiveRtnSelector));

    node.classList.add(this.tabActiveRtnSelector);
  }
}();
