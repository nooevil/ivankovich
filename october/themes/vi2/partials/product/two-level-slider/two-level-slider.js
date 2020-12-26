import Swiper from '../../common/custom-swiper/custom-swiper';
import LazyLoad from '../../../js/lazy-load';

export default new class TwoLevelSlider {
  constructor() {
    this.sliderAjaxWrapper = 'two-level-slider__slider';
    this.sliderContainerSelector = 'two-level-slider__container';
    this.wrapperSelector = 'two-level-slider__wrapper';
    this.wrapperFlexSelector = 'two-level-slider__wrapper_flex';
    this.preLoaderSelector = 'two-level-slider__preloader';

    this.tabBtnSelector = 'two-level-slider__btn';
    this.tabActiveRtnSelector = 'two-level-slider__btn_active';

    this.idSelector = 'data-id';

    this.navigation = {
      nextEl: '.two-level-slider__nav_next',
      prevEl: '.two-level-slider__nav_prev',
      disabledClass: 'two-level-slider__nav_disable',
      hiddenClass: 'two-level-slider__nav_hidden',
    };

    this.pagination = {
      el: '.two-level-slider__pagination',
      type: 'fraction',
      lockClass: 'two-level-slider__pagination_disable',
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

    this.TwoLevelSlider = new Swiper(`.${this.sliderContainerSelector}`, {
      slidesPerView: 2,
      slidesPerColumn: 2,
      slidesPerGroup: 4,
      spaceBetween: 15,
      breakpointsInverse: true,
      watchOverflow: true,
      watchSlidesVisibility: true,
      watchSlidesProgress: true,
      observer: true,
      navigation,
      pagination,
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
          const slider = document.querySelector(`.${this.sliderContainerSelector}`);
          const wrapper = slider.querySelector(`.${this.wrapperSelector}`);

          wrapper.classList.add(this.wrapperFlexSelector);
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

    $.request('ProductList::onAjaxRequest', {
      data: {
        category_id: id,
      },
      update: { 'product/two-level-slider/two-level-slider-ajax': `.${this.sliderAjaxWrapper}` },
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
