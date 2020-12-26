import Helper from '@lovata/popup-helper';

export default new class cartMini {
  constructor() {
    this.panelSelector = 'cart-info__panel';
    this.panelOpenSelector = 'cart-info__panel_visible';
    this.drawerBtnSelector = 'js-cart-mini';
    this.drawerParentSelector = 'header';
    this.drawerDisableSelector = 'cart-info_empty';
    this.drawerCloseSelector = 'cart-mini-panel__close';

    this.preLoaderSelector = 'cart-mini-panel__preloader';

    this.panelPartialSelector = 'product/cart/cart-mini/cart-mini-panel/cart-mini-panel-ajax';
    this.listWrapperSelector = '_shopaholic-cart-list';

    this.pageIdAttr = 'data-page-id';
    this.cartPageId = 'checkout';

    this.disableMiniCart();
    this.handler();
  }

  disableMiniCart() {
    const isCartPage = document.body.getAttribute(this.pageIdAttr) === this.cartPageId;

    if (!isCartPage) return;

    document.querySelector(`.${this.drawerBtnSelector}`).classList.add(this.drawerDisableSelector);
  }

  handler() {
    $(document).on('click', `.${this.drawerBtnSelector}`, ({ currentTarget }) => {
      const isDisable = $(currentTarget).hasClass(this.drawerDisableSelector);

      if (isDisable) return;

      const panel = $(currentTarget).parents(`.${this.drawerParentSelector}`).find(`.${this.panelSelector}`);
      const isOpen = panel.hasClass(this.panelOpenSelector);
      const closeBtnNode = document.querySelector(`.${this.drawerCloseSelector}`);
      Helper.setBodyScrollState(isOpen);
      Helper.overlayController(!isOpen);

      panel.toggleClass(this.panelOpenSelector);
      Helper.overlayHandler(!isOpen, closeBtnNode, panel[0]);

      setTimeout(() => {
        Helper.focusTrapManager(!isOpen, panel[0]);
      }, 300);

      if (!isOpen) {
        // this.loadCart();
      }
    });
  }

  loadCart() {
    $.request('onAjax', {
      update: {
        [this.panelPartialSelector]: `.${this.listWrapperSelector}`,
      },
      success: function (res) { // eslint-disable-line object-shorthand, func-names
        this.success(res);
      },
      loading: `.${this.preLoaderSelector}`,
    });
  }
}();
