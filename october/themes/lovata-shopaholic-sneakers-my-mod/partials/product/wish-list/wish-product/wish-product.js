import ShopaholicAddWishList from '@lovata/shopaholic-wish-list/shopaholic-add-wish-list';
import ShopaholicRemoveWishList from '@lovata/shopaholic-wish-list/shopaholic-remove-wish-list';

export default new class wishProduct {
  constructor() {
    this.cardSelector = 'wish-product';
    this.restoreHiddenNodeSelector = 'wish-list-panel__restore_visually-hidden';
    this.restoreNodeSelector = 'wish-list-panel__restore';
    this.cardHiddenSelector = 'wish-product_hidden';
    this.removeBtnSelector = 'wish-product__remove';
    this.restoreBtnSelector = 'wish-list-panel__restore-btn';
    this.sWishListCounterWrapper = 'wish-list-info-wrapper';

    this.productPageWrapper = 'product-info';
    this.productPageIconClass = '_favorite';
    this.productPageIconSelector = 'wish-list-add__icon';

    this.obRemoveHelper = new ShopaholicRemoveWishList();
    this.obAddHelper = new ShopaholicAddWishList();

    this.removeDelay = 3000;

    this.init();
  }

  init() {
    this.removeHandler();
    this.restoreHandler();
  }

  removeHandler() {
    this.obRemoveHelper.setButtonSelector(`.${this.removeBtnSelector}`)
      .setAjaxRequestCallback((obRequestData, obButton) => {
        /* eslint-disable no-param-reassign */
        obRequestData.update = { 'product/wish-list/wish-list-info/wish-list-info-button': `.${this.sWishListCounterWrapper}` };
        obRequestData.complete = () => {
          const obCard = $(obButton).parents(`.${this.cardSelector}`);
          const iProductID = this.obRemoveHelper.getProductID(obButton);

          this.showRestoreSection(obCard);

          const obProductPageButton = $(`.${this.productPageWrapper}.${this.obRemoveHelper.sDefaultWrapperClass}[${this.obRemoveHelper.sAttributeName}=${iProductID}]`)
            .find(`.${this.obRemoveHelper.sDefaultButtonClass}`);

          obProductPageButton.removeClass(this.obRemoveHelper.sDefaultButtonClass);
          obProductPageButton.addClass(this.obAddHelper.sDefaultButtonClass);
          obProductPageButton.find(`.${this.productPageIconSelector}`).removeClass(this.productPageIconClass);
        };

        return obRequestData;
      }).init();
  }

  restoreHandler() {
    this.obAddHelper.setButtonSelector(`.${this.restoreNodeSelector}`)
      .setAjaxRequestCallback((obRequestData, obButton) => {
        obRequestData.update = { 'product/wish-list/wish-list-info/wish-list-info-button': `.${this.sWishListCounterWrapper}` };
        obRequestData.complete = () => {
          const iProductID = this.obAddHelper.getProductID(obButton);

          this.hideRestoreSection(obButton);
          /* eslint-enable */
          const obProductPageButton = $(`.${this.productPageWrapper}.${this.obAddHelper.sDefaultWrapperClass}[${this.obAddHelper.sAttributeName}=${iProductID}]`)
            .find(`.${this.obAddHelper.sDefaultButtonClass}`);

          obProductPageButton.removeClass(this.obAddHelper.sDefaultButtonClass);
          obProductPageButton.addClass(this.obRemoveHelper.sDefaultButtonClass);
          obProductPageButton.find(`.${this.productPageIconSelector}`).addClass(this.productPageIconClass);
        };

        return obRequestData;
      }).init();
  }

  hideRestoreSection(restoreNode) {
    clearTimeout(this.removeTimer);
    const card = restoreNode.siblings(`.${this.cardSelector}`);

    card.removeClass(this.cardHiddenSelector);
    restoreNode
      .addClass(this.restoreHiddenNodeSelector)
      .attr('aria-hidden', true)
      .find(`.${this.restoreBtnSelector}`)
      .attr('tabindex', '-1');
  }

  showRestoreSection(card) {
    card.addClass(this.cardHiddenSelector);
    const restoreNode = card.siblings(`.${this.restoreNodeSelector}`);

    restoreNode
      .removeClass(this.restoreHiddenNodeSelector)
      .attr('aria-hidden', false)
      .find(`.${this.restoreBtnSelector}`)
      .attr('tabindex', '0')
      .focus();

    this.removeTimer = setTimeout(() => {
      restoreNode.parent().remove();
    }, this.removeDelay);
  }
}();
