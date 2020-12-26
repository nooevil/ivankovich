import ShopaholicCartAdd from '@lovata/shopaholic-cart/shopaholic-cart-add';

export default new class ProductInfo {
  constructor() {
    this.detailSelector = 'product-info__detail-btn';
    this.detailOpenSelector = 'product-info__detail-btn_open';
    this.textSelector = 'product-info__detail-text';
    this.textHiddenSelector = 'product-info__detail-text_visually-hidden';
    this.sMiniCartWrapper = '_shopaholic-cart-mini-wrapper';
    this.preLoaderClass = 'product-info__preloader';
    this.wrapperSelector = '_shopaholic-product-wrapper';
    this.tooltipSelector = 'product-info__tooltip';
    this.tooltipVisibleSelector = 'product-info__tooltip_visible';

    this.obShopaholicCartAdd = new ShopaholicCartAdd();

    this.handler();
    this.initAddCart();
  }

  handler() {
    $(document).on('click', `.${this.detailSelector}`, ({ target }) => {
      const text = $(target).siblings(`.${this.textSelector}`);

      if (!text.length) return;

      $(target).toggleClass(this.detailOpenSelector);
      text.toggleClass(this.textHiddenSelector);
    });
  }

  initAddCart() {
    this.obShopaholicCartAdd.setAjaxRequestCallback((obRequestData, obButton) => {
      const wrapper = obButton.closest(`.${this.wrapperSelector}`);
      const tooltip = wrapper.querySelector(`.${this.tooltipSelector}`);
      if (tooltip) {
        clearTimeout(this.timer);
        tooltip.classList.remove(this.tooltipVisibleSelector);
      }
      /* eslint-disable  no-param-reassign */
      obRequestData.update = { 'product/cart/cart-mini/cart-info/cart-info': `.${this.sMiniCartWrapper}` };
      obRequestData.loading = `.${this.preLoaderClass}`;
      obRequestData.complete = ({ responseJSON }) => {
        this.obShopaholicCartAdd.completeCallback(responseJSON, obButton);
        if (tooltip) {
          tooltip.classList.add(this.tooltipVisibleSelector);
          this.timer = setTimeout(() => {
            tooltip.classList.remove(this.tooltipVisibleSelector);
          }, 2000);
        }
      };
      /* eslint-enable */

      return obRequestData;
    }).init();
  }
}();
