import Helper from '@lovata/popup-helper';

export default new class wishList {
  constructor() {
    this.panelSelector = 'wish-list-info__panel';
    this.panelOpenSelector = 'wish-list-info__panel_visible';
    this.drawerBtnSelector = 'js-wish-list';
    this.drawerParentSelector = 'header';
    this.drawerOpenBtnSelector = 'wish-list-info';
    this.drawerDisableSelector = 'wish-list-info_empty';
    this.drawerCloseSelector = 'wish-list-panel__close';

    this.handler();
  }

  handler() {
    $(document).on('click', `.${this.drawerBtnSelector}`, ({ currentTarget }) => {
      if ($(currentTarget).hasClass(this.drawerDisableSelector)) return;

      const panel = $(currentTarget).parents(`.${this.drawerParentSelector}`).find(`.${this.panelSelector}`);
      const focusTarget = !panel.hasClass(this.drawerOpenBtnSelector)
        ? document.querySelector(`.${this.drawerCloseSelector}`)
        : document.querySelector(`.${this.drawerOpenBtnSelector}`);
      const isOpen = panel.hasClass(this.panelOpenSelector);

      Helper.setBodyScrollState(isOpen);
      Helper.overlayHandler(!isOpen, focusTarget, panel[0]);

      panel.toggleClass(this.panelOpenSelector);

      setTimeout(() => {
        Helper.focusTrapManager(!isOpen, panel[0]);
      }, 300);
    });
  }
}();
