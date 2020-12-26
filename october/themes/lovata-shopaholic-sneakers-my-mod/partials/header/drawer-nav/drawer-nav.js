import Helper from '@lovata/popup-helper';

export default new class NavigationDrawer {
  constructor() {
    this.hiddenSelector = 'drawer-nav__wrapper_hidden';
    this.drawerNavSelector = 'drawer-nav';
    this.drawerOpenNavSelector = 'drawer-nav_open';
    this.drawerBtnSelector = 'drawer__btn';
    this.drawerCloseBtnSelector = 'drawer-nav__btn';
    this.drawerControllerBtn = 'js-drawer-btn';
    this.drawerCloseBtnVisibleSelector = 'drawer-nav__btn_close';
    this.subNavHeaderSelector = 'header-nav__title';
    this.subNavHeaderOpenSelector = 'header-nav__title_open';
    this.subNavListSelector = 'drawer-nav__category';
    this.subNavListOpenSelector = 'drawer-nav__category_open';

    this.drawerWrapperSelector = 'drawer-nav__wrapper';

    this.handler();
  }

  handler() {
    $(document).on('click', `.${this.drawerControllerBtn}`, ({ currentTarget }) => {
      const isOpen = $(currentTarget).hasClass(this.drawerCloseBtnVisibleSelector);
      const wrapper = $(`.${this.drawerWrapperSelector}`);
      const modal = document.querySelector(`.${this.drawerNavSelector}`);
      const openBtn = document.querySelector(`.${this.drawerBtnSelector}`);
      const focusTarget = isOpen ? $(`.${this.drawerCloseBtnSelector}`)[0] : openBtn;

      Helper.overlayHandler(!isOpen, focusTarget, modal);
      Helper.setBodyScrollState(isOpen);

      $(`.${this.drawerControllerBtn}`).toggleClass(this.drawerCloseBtnVisibleSelector);
      wrapper.toggleClass(this.hiddenSelector);
      $(`.${this.drawerNavSelector}`).toggleClass(this.drawerOpenNavSelector);

      Helper.focusTrapManager(!isOpen, modal);
    });

    $(document).on('click', `.${this.subNavHeaderSelector}`, ({ currentTarget }) => {
      const list = $(currentTarget).siblings(`.${this.subNavListSelector}`);

      if (!list.length) return;

      $(currentTarget).toggleClass(this.subNavHeaderOpenSelector);
      list.toggleClass(this.subNavListOpenSelector);
    });
  }
}();
