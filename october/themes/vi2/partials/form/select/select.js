import Choices from 'choices.js';

export default new class Select {
  constructor() {
    this.selectSelector = 'select';
    this.selectNoBorderSelector = 'select_no-border';
    this.mediaQueryString = '(min-width: 769px)';

    this.isInit = false;
    this.customEventType = 'input';

    this.handler();
  }

  handler() {
    document.addEventListener('DOMContentLoaded', () => {
      this.checkSelect();
    });

    window.addEventListener('resize', () => {
      if (this.isDesktop() && !this.isInit) {
        this.checkSelect();
      }
    });
  }

  isDesktop() {
    return window.matchMedia(this.mediaQueryString).matches;
  }

  checkSelect() {
    const select = document.querySelectorAll(`.${this.selectSelector}`);

    if (!select) return;

    [...select].forEach(el => this.init(el));
  }

  init(el) {
    if (!this.isDesktop()) return;

    const border = el.classList.contains(this.selectNoBorderSelector) ? '_no-border' : '';

    this.select = new Choices(el, {
      searchEnabled: false,
      shouldSort: false,
      itemSelectText: '',
      classNames: {
        containerOuter: `choices select ${border}`,
        containerInner: `choices__inner select__inner ${border}`,
        listDropdown: 'choices__list--dropdown select__list_dropdown',
        list: 'choices__list webkit-scroll_select select__list',
        item: 'choices__item select__item',
      },
      callbackOnInit: this.isInit = true,
    });

    el.addEventListener('choice', () => {
      el.dispatchEvent(this.createCustomEvent());
    });
  }

  createCustomEvent() {
    const inputEvent = new Event(this.customEventType, { bubbles: true, cancelable: false });

    return inputEvent;
  }
}();
