import ShopaholicCartUpdate from '@lovata/shopaholic-cart/shopaholic-cart-update';
import ShopaholicCartRemove from '@lovata/shopaholic-cart/shopaholic-cart-remove';
import ShopaholicCartRestore from '@lovata/shopaholic-cart/shopaholic-cart-restore';

export default new class cartProduct {
  constructor() {
    this.obShopaholicCartUpdate = new ShopaholicCartUpdate();
    this.obShopaholicCartRemove = new ShopaholicCartRemove();
    this.obShopaholicCartRestore = new ShopaholicCartRestore();

    this.positionNodeSelector = '_shopaholic-product-wrapper';
    this.cardNodeSelector = 'cart-product';
    this.restoreHiddenNodeSelector = '_visually-hidden';
    this.restoreNodeSelector = 'js-item-restore';
    this.cardHiddenSelector = 'cart-product_hidden';
    this.sShippingTypeWrapper = '_cart_delivery_wrapper';
    this.sShippingTypePartial = 'product/cart/cart-delivery';
    this.sMiniCartWrapper = '_shopaholic-cart-mini-wrapper';

    this.isCartPage = document.body.getAttribute('data-page-id') === 'checkout';

    this.init();
  }

  init() {
    this.initUpdateButton();
    this.initRemoveButton();
    this.initRestoreButton();
  }

  initUpdateButton() {
    if (this.isCartPage) {
      this.obShopaholicCartUpdate.setAjaxRequestCallback((obRequestData) => {
        /* eslint-disable  no-param-reassign */
        obRequestData.update = {};
        obRequestData.update[this.sShippingTypePartial] = `.${this.sShippingTypeWrapper}`;
        /* eslint-enable */

        return obRequestData;
      });
    }
    this.obShopaholicCartUpdate.init();
  }

  initRemoveButton() {
    this.obShopaholicCartRemove.setAjaxRequestCallback((obRequestData, obButton) => {
      /* eslint-disable  no-param-reassign */
      if (this.isCartPage) {
        obRequestData.update = { 'product/cart/cart-mini/cart-info/cart-info': `.${this.sMiniCartWrapper}` };
        obRequestData.update[this.sShippingTypePartial] = `.${this.sShippingTypeWrapper}`;
      }

      obRequestData.complete = ({ responseJSON }) => {
        const obCard = $(obButton).parents(`.${this.positionNodeSelector}`);
        this.showRestoreSection(obCard);
        this.obShopaholicCartRemove.completeCallback(responseJSON, obButton);
      };
      /* eslint-enable */

      return obRequestData;
    }).init();
  }

  initRestoreButton() {
    this.obShopaholicCartRestore.setAjaxRequestCallback((obRequestData, obButton) => {
      /* eslint-disable  no-param-reassign */
      if (this.isCartPage) {
        obRequestData.update = { 'product/cart/cart-mini/cart-info/cart-info': `.${this.sMiniCartWrapper}` };
        obRequestData.update[this.sShippingTypePartial] = `.${this.sShippingTypeWrapper}`;
      }

      obRequestData.complete = ({ responseJSON }) => {
        const obCard = $(obButton).parents(`.${this.positionNodeSelector}`);
        this.hideRestoreSection(obCard);
        this.obShopaholicCartRemove.completeCallback(responseJSON, obButton);
      };
      /* eslint-enable */

      return obRequestData;
    }).init();
  }

  hideRestoreSection(obCard) {
    const restoreNode = $(obCard).find(`.${this.restoreNodeSelector}`);
    const cartNode = $(obCard).find(`.${this.cardNodeSelector}`);

    cartNode.removeClass(this.cardHiddenSelector);
    restoreNode
      .addClass(this.restoreHiddenNodeSelector)
      .attr('aria-hidden', true)
      .find(`.${this.obShopaholicCartRestore.sDefaultButtonClass}`)
      .attr('tabindex', '-1');
  }


  showRestoreSection(obCard) {
    const restoreNode = $(obCard).find(`.${this.restoreNodeSelector}`);
    const cartNode = $(obCard).find(`.${this.cardNodeSelector}`);

    cartNode.addClass(this.cardHiddenSelector);
    restoreNode
      .removeClass(this.restoreHiddenNodeSelector)
      .attr('aria-hidden', false)
      .find(`.${this.obShopaholicCartRestore.sDefaultButtonClass}`)
      .attr('tabindex', '0')
      .focus();
  }
}();
